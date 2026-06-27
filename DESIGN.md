---
name: School Planner
description: An academic, professional, and trustworthy calendar and event proposal system.
colors:
  primary: "#3461DF"
  primary-dark: "#274BC8"
  primary-medium: "#79ACFF"
  primary-light: "#B8D9FF"
  neutral-bg: "#F4F8FF"
  text-primary: "#0F172A"
  text-secondary: "#64748B"
  border: "#E2E8F0"
typography:
  display:
    fontFamily: "Inter Variable, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(2rem, 5vw, 3.5rem)"
    fontWeight: 900
    lineHeight: 1.1
    letterSpacing: "-0.02em"
  body:
    fontFamily: "Inter Variable, ui-sans-serif, system-ui, sans-serif"
    fontSize: "0.875rem"
    fontWeight: 400
    lineHeight: 1.5
    letterSpacing: "normal"
rounded:
  sm: "8px"
  md: "12px"
  lg: "16px"
  xl: "24px"
  full: "9999px"
spacing:
  xs: "4px"
  sm: "8px"
  md: "16px"
  lg: "24px"
  xl: "32px"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "#FFFFFF"
    rounded: "{rounded.lg}"
    padding: "10px 24px"
  button-primary-hover:
    backgroundColor: "{colors.primary-dark}"
  button-secondary:
    backgroundColor: "#0F172A"
    textColor: "#FFFFFF"
    rounded: "{rounded.lg}"
    padding: "10px 24px"
  button-secondary-hover:
    backgroundColor: "#1E293B"
  input-field:
    backgroundColor: "#F9FAFB"
    textColor: "#0F172A"
    rounded: "{rounded.lg}"
    padding: "14px 20px"
---

# Design System: School Planner

## 1. Overview

**Creative North Star: "The Academic Beacon"**

"The Academic Beacon" design system emphasizes structured clarity, clean lines, and trust-inspiring grids. Designed to coordinate and track events and proposals, it prioritizes clear layout structures and functional color systems over decorative hype. It is tailored for teachers, school advisors, and student representatives who require a reliable and efficient administrative tool.

This design system explicitly rejects playful, childish aesthetics, complex modern SaaS "hype" decorations (such as heavy glassmorphic blurs and glow effects), and warm cream/beige tones. Instead, it relies on high-contrast cool-gray and primary blue accents.

**Key Characteristics:**
- Crisp borders and grid-based event calendar layouts.
- Clear structural layout density for rapid review tasks.
- High contrast typography optimized for administrative reading.

## 2. Colors

The color palette uses structured, high-contrast cool-gray and primary blue accents to convey stability, reliability, and academic professionalism.

### Primary
- **Academic Royal Blue** (#3461DF): Used for primary interactive actions, active navigational indicators, and critical calendar highlights.
- **Deep Slate Blue** (#274BC8): Primary button hover state color.
- **Focus Light Blue** (#79ACFF): Active input borders and focus indicators.
- **Soft Accent Blue** (#B8D9FF): Highlight badges, pending event states, and soft background panels.

### Neutral
- **Off-White Tint** (#F4F8FF): Core background tone for the body, establishing a clean, cool slate canvas.
- **Ink Primary** (#0F172A): High-contrast text color for display headings and body copy, ensuring strict readability.
- **Ink Secondary** (#64748B): Muted text color for labels, secondary descriptors, and auxiliary details.
- **Border Light** (#E2E8F0): Structured borders and table/grid dividers.

### Named Rules
**The Rarity Rule.** The primary accent (#3461DF) is used on ≤10% of any given screen. Its rarity directs the user's attention to primary call-to-actions and pending approvals.
**The No-Cream Rule.** Never use warm-sand, cream, or beige tones (hue 40-100 in OKLCH) for backgrounds or cards. The theme must remain anchored in neutral off-whites and cool blue tints.

## 3. Typography

**Display Font:** "Inter Variable" (with fallbacks ui-sans-serif, system-ui, sans-serif)
**Body Font:** "Inter Variable" (with fallbacks ui-sans-serif, system-ui, sans-serif)

The typeface pairing utilizes a single, high-performance sans-serif family in varying weights to maintain a clean, administrative aesthetic.

### Hierarchy
- **Display** (Extra Bold (900), clamp(2rem, 5vw, 3.5rem), 1.1): Used for page headers and hero sections.
- **Headline** (Bold (700), 1.5rem, 1.2): Used for sections and dashboard cards.
- **Title** (Semi-Bold (600), 1.125rem, 1.3): Used for subheadings and list entries.
- **Body** (Regular (400), 0.875rem, 1.5): Used for general content and reviews. Line length is capped at 75ch.
- **Label** (Semi-Bold (600), 0.75rem, letter-spacing: 0.1em, uppercase): Used for eyebrows, system indicators, and metadata keys.

### Named Rules
**The Balance Rule.** Headings (h1–h3) must always employ `text-wrap: balance` to prevent awkward line breaks and orphaned words.

## 4. Elevation

The system is flat by default with high-contrast borders. Subtle elevation shadows are reserved strictly for floating components (such as the navigation bar) and interactive states.

### Shadow Vocabulary
- **Floating Nav Shadow** (`box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.05)`): Applied to sticky navigation and overlay dialogs to separate them from the primary grid canvas.
- **Interactive Soft Shadow** (`box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.05)`): Applied to clickable items and cards on hover.

### Named Rules
**The Border-First Rule.** Depth and section division must be established with clean borders (`#E2E8F0` at 1px) rather than overlapping shadows.

## 5. Components

Components are designed to look clean, stable, and highly legible, using standard 12px or 16px corner roundness.

### Buttons
- **Shape:** Rounded corner style (16px / `rounded-2xl`).
- **Primary:** Background (#3461DF), text (#FFFFFF), padding (10px 24px), transition active scale 95%.
- **Secondary:** Background (#0F172A), text (#FFFFFF), padding (10px 24px), hover bg (#1E293B).

### Cards / Containers
- **Corner Style:** Rounded corner style (24px / `rounded-3xl`).
- **Background:** Solid white (#FFFFFF).
- **Shadow Strategy:** Flat at rest with `border border-gray-100`. Interactive hover transitions to `shadow-xl hover:-translate-y-2` (duration 500ms).
- **Internal Padding:** Comfort scale (32px / `p-8`).

### Inputs / Fields
- **Style:** Background (#F9FAFB), border (#F3F4F6), radius (16px / `rounded-2xl`).
- **Focus:** Border-color (#79ACFF), ring focus shadow (#3461DF at 20% opacity).

### Navigation
- **Style:** Floating header style with 32px (`rounded-[2rem]`) radius. Background is translucent white (`rgba(255, 255, 255, 0.7)`) with a `backdrop-blur-xl` filter and subtle white border.

## 6. Do's and Don'ts

### Do:
- **Do** maintain strict text contrast ratios of ≥4.5:1 for body copy against light backgrounds.
- **Do** align all dashboard panels and calendars to a strict, border-based grid layout.
- **Do** limit card heights and layout configurations to standard uniform grids.

### Don't:
- **Don't** use warm-cream/beige "SaaS boilerplate" templates or background colors.
- **Don't** add complex modern "hype" visual effects like glowing borders, neon accents, or glassmorphic panel blurs.
- **Don't** employ side-stripe borders (e.g. `border-left` thicker than 1px) on status panels or callout alerts.
- **Don't** use gradient text effects. Titles must remain solid colors for professional clarity.
- **Don't** place tiny uppercase tracked eyebrows above *every* single section; limit their use to form input headers.
- **Don't** use arbitrary numbers (like 01 / 02 / 03) to label landing page sections unless it is an explicit multi-step tutorial.
- **Don't** animate image assets on hover states. Animation is reserved for background shifts or border transitions.
