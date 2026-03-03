<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'family_id',
        'organization_id',
        'submitted_by',
        'title',
        'description',
        'objectives',
        'proposed_start_date',
        'proposed_end_date',
        'budget',
        'location',
        'expected_participants',
        'attachments',
        'status',
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
        'submitted_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | STATUS CHECKERS
    |--------------------------------------------------------------------------
    */

    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    public function isSubmitted(): bool
    {
        return $this->status === 'submitted';
    }

    public function isUnderReview(): bool
    {
        return $this->status === 'under_review';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /*
    |--------------------------------------------------------------------------
    | STATE TRANSITIONS
    |--------------------------------------------------------------------------
    */

    public function submit(): void
    {
        if (!$this->isDraft() && !$this->isRejected()) {
            throw new \Exception('Proposal cannot be submitted from current state.');
        }

        $this->update([
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);
    }

    public function markUnderReview(int $adminId): void
    {
        if (!$this->isSubmitted()) {
            throw new \Exception('Only submitted proposals can be reviewed.');
        }

        $this->update([
            'status' => 'under_review',
            'reviewed_by' => $adminId,
            'reviewed_at' => now(),
        ]);
    }

    public function approve(int $adminId): void
    {
        if (!$this->isUnderReview()) {
            throw new \Exception('Only under review proposals can be approved.');
        }

        $this->update([
            'status' => 'approved',
            'reviewed_by' => $adminId,
            'reviewed_at' => now(),
        ]);

        // Auto create event
        $this->createEvent();
    }

    public function reject(int $adminId, ?string $note = null): void
    {
        if (!$this->isUnderReview()) {
            throw new \Exception('Only under review proposals can be rejected.');
        }

        $this->update([
            'status' => 'rejected',
            'reviewed_by' => $adminId,
            'reviewed_at' => now(),
            'admin_notes' => $note,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | EVENT CREATION
    |--------------------------------------------------------------------------
    */

    protected function createEvent(): void
    {
        $this->event()->create([
            'family_id' => $this->family_id,
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->proposed_start_date,
            'end_date' => $this->proposed_end_date,
            'location' => $this->location,
            'source_proposal_id' => $this->id,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function event()
    {
        return $this->hasOne(Event::class, 'source_proposal_id');
    }
}