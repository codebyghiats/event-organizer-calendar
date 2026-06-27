---
target: resources/views/dashboard.blade.php
total_score: 17
p0_count: 0
p1_count: 3
timestamp: 2026-06-15T23-23-51Z
slug: resources-views-dashboard-blade-php
---
## Design Health Score

| # | Heuristic | Score | Key Issue |
|---|-----------|-------|-----------|
| 1 | Visibility of System Status | 2 | Flash alert messages exist but no loading state on form submit or join action; the logout button gives zero feedback |
| 2 | Match System / Real World | 3 | Language is mostly natural (Indonesian, appropriate for audience); "Buka Kalender" and "Review Proposal" are clear. Role labels ("admin", "organisasi") are raw database values, not user-friendly titles |
| 3 | User Control and Freedom | 2 | The "Buat Unit" form has no cancel/reset. Modal close works (click-away + X button) but Escape key is not wired. No undo for unit creation |
| 4 | Consistency and Standards | 2 | Three different button shapes coexist: `rounded-2xl` pill action buttons, `rounded-xl` copy buttons in modal, `rounded-lg` in DESIGN.md spec. Cards use `rounded-3xl` and `rounded-[2.5rem]` interchangeably. The "Gabung" button uses orange but orange is not the primary brand color |
| 5 | Error Prevention | 1 | The join form accepts any free-text string and redirects blindly — no format validation, no confirmation. The "Buat Unit" form has no length constraints visible. No confirm-before-submit for unit creation |
| 6 | Recognition Rather Than Recall | 2 | The "Kelola Kategori" link is icon-only (tag icon + title tooltip) — users must hover to discover it. The invite button is icon-only. No visible help explaining what "Organisasi" vs "Viewer" invitation types mean to a first-time admin |
| 7 | Flexibility and Efficiency | 1 | No keyboard shortcuts. No quick-access links to the calendar from the header. Power users managing multiple units must scroll and click per unit. No search or filter for unit list |
| 8 | Aesthetic and Minimalist Design | 2 | The blue gradient "Buat Unit" card violates the DESIGN.md Border-First Rule and the No-Cream/no-hype ethos — a heavy `shadow-2xl shadow-blue-900/20` and gradient are exactly the "SaaS boilerplate hype" the design system rejects. Body background is `bg-gray-50` not the specified `#F4F8FF` off-white tint |
| 9 | Error Recovery | 1 | Copy action uses `alert()` (blocking browser dialog — jarring UX, especially on Safari/iOS). No inline toast/feedback. The join redirect on bad code shows the raw Laravel 404 or join-failure page with no recovery path |
| 10 | Help and Documentation | 0 | No tooltips explaining what a "Unit" is, no onboarding hint for first-time users with zero organizations, no explanation of role differences on invitation links |
| **Total** | | **17/40** | **Poor** |

---

## Anti-Patterns Verdict

**Does this look AI-generated?**

**LLM Assessment**: Yes — moderately. The layout follows the classic two-column "dashboard hero + action sidebar" template that LLM-generated UIs converge on. The blue gradient card on the right sidebar (`from-blue-600 to-indigo-700`) is the single strongest AI-slop tell: it is visually heavy, inconsistent with the rest of the design, and identical in feel to thousands of AI-generated SaaS landing pages. The card hover animation (`hover:-translate-y-1 hover:shadow-xl`) is fine in principle but the `rounded-3xl` / `rounded-[2rem]` / `rounded-[2.5rem]` mix signals no unified decision was made about corner radii. The empty state is adequate but generic. The overall composition has competence without character.

**Deterministic Scan**: 4 findings across 2 rules, exit code 2 (findings present):
- **`overused-font` × 2** (lines 11–12): Inter imported twice — once via Google Fonts `@import`, once declared in `body`. The detector flags Inter as an overused AI-slop font. In context of the DESIGN.md, Inter was deliberately chosen for "Academic Beacon" clarity — this is a **false positive** against the project's established design system, but the double-import is a real implementation redundancy.
- **`gray-on-color` × 2** (lines 31, 88): 
  - Line 31: `text-gray-400` on `bg-red-50` (logout button hover state). `text-gray-400` (#9CA3AF) on red-50 (#FEF2F2) fails WCAG AA contrast.
  - Line 88: `text-gray-700` on `bg-indigo-100` (role badge). This is borderline — likely passes AA at 4.5:1 for normal text but is flagged as a visual quality concern.

**Browser Visualization**: Quota exhausted — browser subagent unavailable. No live overlay could be injected. Assessment B relied on CLI scan only.

---

## Overall Impression

The dashboard is functional and demonstrates real implementation effort, but it reads as a competent first draft rather than a finished product. The most damaging single issue is the **blue gradient sidebar card**, which directly violates the DESIGN.md ethos ("no SaaS hype decorations") while simultaneously carrying the only primary call-to-action on the screen. Accessibility is the deeper structural problem: zero `aria-label` attributes, zero `<label>` elements on form inputs, and no Escape-key dismissal for the modal put the entire interface below WCAG 2.1 AA compliance. The cognitive load is moderate — the 2-column layout is sensible — but icon-only admin controls and a free-text join URL input create unnecessary friction for both new and expert users.

---

## What's Working

1. **Empty state is thoughtful**: The dashed-border placeholder when zero organisations exist (lines 127–133) is well-structured: icon, heading, and actionable instruction text. It avoids the "No results" anti-pattern.
2. **Role-conditional UI branching is clear**: The admin vs. member path (lines 106–120) correctly surfaces different actions per role. The indigo badge for admin and gray for member creates a quick visual distinction.
3. **Modal dismiss UX**: The invitation modal supports `@click.away` and an explicit × button — two escape paths for the same action, which is good. The slide-in/out transition via Alpine is smooth and non-jarring.

---

## Priority Issues

**[P1] Blue gradient sidebar card violates the design system and misleads the visual hierarchy**
- **Why it matters**: The `from-blue-600 to-indigo-700` gradient card is the heaviest visual element on the page. It draws the eye away from the organisation list — the primary content — and toward a secondary action (creating a new unit). This is backwards for returning users who have units already. It also directly contradicts DESIGN.md's "Border-First Rule" and the explicit ban on "hype visual effects."
- **Fix**: Replace the gradient with a flat white card using the standard `border border-gray-200` treatment. Promote "Buat Unit" to a primary button (`bg-[#3461DF]`) inside the flat card, not a gradient container. Move the form below the join-unit form or restructure as a FAB/top-right button.
- **Suggested command**: `/impeccable distill`

**[P1] All form inputs have no `<label>` elements — keyboard and screen-reader inaccessible**
- **Why it matters**: The "Nama Unit", "Deskripsi Singkat", and "Masukkan Kode Undangan" inputs have zero associated labels. Screen readers will announce them as empty. VoiceOver users cannot identify what to type. WCAG 2.1 SC 1.3.1 (Info and Relationships) and SC 4.1.2 (Name, Role, Value) are both violated.
- **Fix**: Add `<label for="unit-name">Nama Unit</label>` and matching `id="unit-name"` to every input. Use `sr-only` if labels must remain visually hidden but are required for compliance.
- **Suggested command**: `/impeccable harden`

**[P1] The Escape key does not close the invite modal**
- **Why it matters**: Users expect modals to close on Escape (browser convention, WCAG 2.1 SC 2.1.2). The current modal only supports click-away and the × button. Keyboard-only users are trapped inside the modal focus context.
- **Fix**: Add `@keydown.window.escape="showInviteModal = false"` to the modal wrapper div.
- **Suggested command**: `/impeccable harden`

**[P2] Join-unit input accepts any string and redirects blindly**
- **Why it matters**: A user who pastes a malformed URL or types a random string gets silently redirected to a non-existent route (or an unhandled 404/error page). There is no client-side validation or format hint. "Riley" (the stress tester) will hit this immediately.
- **Fix**: Add a URL or UUID format hint below the input. Validate the string format before `window.location.href` redirect — at minimum check for a recognizable invite code pattern. Show an inline error if the format is wrong.
- **Suggested command**: `/impeccable harden`

**[P2] Copy feedback uses blocking `alert()` dialog**
- **Why it matters**: `alert('Link berhasil disalin!')` produces a browser-native blocking dialog that requires a click to dismiss. On Safari iOS it can prevent the clipboard write from completing. It interrupts the flow and feels unpolished — the exact opposite of the "academic, professional" brand promise.
- **Fix**: Replace with an inline toast or transient state indicator (e.g., Alpine `copied: false` toggled to true for 2 seconds, showing "✓ Disalin!" next to the copy button).
- **Suggested command**: `/impeccable polish`

---

## Persona Red Flags

**Alex (Power User / OSIS Admin managing 5+ units)**
- No keyboard shortcut to create a new unit or open a calendar.
- Scrolling through a 6-card grid to find a specific unit takes longer than it should — no search, no filter, no sort.
- The icon-only "Kelola Kategori" button requires a mouse hover to discover (`title` attribute only). Alex will miss it during a fast keyboard scan.
- Invite link generation requires 2 clicks (invite button → modal), with no way to copy both links at once.

**Sam (Accessibility-Dependent User / Teacher reviewing proposals on assistive tech)**
- 0 `aria-label` attributes found. Every icon-only button is announced as an empty button or its icon glyph name by VoiceOver.
- No `<label>` elements: both form inputs will be announced as "text field" with no description.
- The modal has no `role="dialog"`, no `aria-modal="true"`, and no focus trap — screen reader focus will continue to the background content behind the modal.
- `text-gray-400` on `bg-red-50` for the logout hover state fails WCAG AA contrast (estimated ~2.1:1).
- Logo image: `alt="Logo"` is technically present but meaninglessly generic — "School Planner logo" would be better.

**Academic Organizer (Project-Specific Persona): "Budi" — The Busy School Advisor**
- **Profile**: Teacher, 40s, reviews 10–20 event proposals per month, uses the app on a school-issued Windows laptop. Rarely creates new units; mostly accesses existing ones.
- **Behaviors**: Goes directly to "Review Proposal" each session. Prefers predictable layouts. Treats any ambiguity as a blocker and calls IT.
- **Red Flags**:
  - The "Review Proposal" link is buried in a card as a secondary button, visually equal to "Buka Kalender" — Budi's primary action has no visual emphasis.
  - No persistent navigation (e.g., a sidebar link to "My Proposals") means Budi must return to the dashboard every session to find the entry point.
  - The Indonesian language is correct, but "Monitor Pengajuan" vs "Review Proposal" are used for the same concept depending on role — Budi may not connect them.

---

## Minor Observations

- **Double Inter import** (lines 11–12): `@import url(…Inter…)` inside `<style>` is redundant when `app.css` likely imports it via Vite. This adds a render-blocking request.
- **`bg-gray-50` body background** (line 15): Should be `#F4F8FF` per DESIGN.md's "Off-White Tint" specification. `gray-50` is `#F9FAFB` — a warm-neutral that subtly drifts from the cool blue-tinted canvas.
- **`h1` says "Dashboard"** (line 22): This is an opportunity wasted. "Dashboard – School Planner" or a personalized greeting ("Selamat datang, [Name]") better anchors the user's context.
- **Role badge raw values** (line 90): The badge renders the raw pivot role string ("admin", "organisasi", "viewer"). These should map to display names: "Pembina / Admin", "Anggota Organisasi", "Pemantau".
- **`active:scale-95`** on submit button (line 160): This micro-animation is fine and consistent with DESIGN.md. But it is missing on the "Gabung Sekarang" button (line 179) — inconsistency.
- **No `<footer>`**: The page uses `flex-col min-h-screen` but has no footer content. Not a bug, but consider whether a version/copyright line is expected in an academic institutional tool.
