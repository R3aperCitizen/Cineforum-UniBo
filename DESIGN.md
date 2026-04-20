# Design System Strategy: The Modern Monograph

## 1. Overview & Creative North Star
This design system is built upon the prestigious heritage of the Western world's oldest university, translating centuries of academic authority into a high-end digital experience. 

**Creative North Star: The Modern Monograph.**
The aesthetic identity is driven by the logic of premium editorial design. We treat the screen not as a software interface, but as a living document. We break the "template" look through **intentional asymmetry**, strong typographic scales, and a rejection of standard UI borders. By utilizing the "Academic Red" against expansive, breathable light-mode surfaces, we create a rhythmic flow that feels both authoritative and contemporary.

---

## 2. Colors: Tonal Depth vs. Structural Lines
Our palette is rooted in a deep, scholarly red and a series of sophisticated neutrals, optimized for a light-mode environment to maintain a clean, high-contrast editorial aesthetic.

### Color Palette
*   **Primary (#B31E24):** The brand's signature Academic Red, used for high-impact CTAs and branding.
*   **Secondary (#333333):** A deep charcoal for secondary actions and structural depth.
*   **Tertiary (#737373):** A mid-tone neutral for supporting elements and badges.
*   **Neutral (#333333):** The base for our text and architectural hierarchy.

### The "No-Line" Rule
**Explicit Instruction:** Traditional 1px solid borders are prohibited for sectioning. Boundaries must be defined solely through background color shifts or subtle tonal transitions. 
*   Use `surface` for the main canvas.
*   Use `surface-container-low` to define distinct content blocks.
*   Use `surface-container-lowest` to make foreground elements "pop" against the canvas.

---

## 3. Typography: The Voice of Authority
The system utilizes a unified, contemporary sans-serif approach to project a sense of modern precision and academic rigor.

*   **Display & Headlines (publicSans):** These are the "anchors" of the page. Use `display-lg` and `headline-md` to establish a clear editorial hierarchy. Public Sans provides a neutral but strong foundation that feels institutional yet accessible.
*   **Body & Titles (epilogue):** A contemporary sans-serif with distinct personality that provides a modern, premium feel for long-form reading and significant titling.
*   **Labels (epilogue):** Maintaining consistency with the body font for labels ensures a streamlined and cohesive visual language, keeping secondary UI information organized and clean.

---

## 4. Elevation & Depth
We convey hierarchy through **Tonal Layering** rather than traditional shadows or lines.

*   **The Layering Principle:** Place a `surface-container-lowest` card on a `surface-container-low` section to create a soft, natural lift. This mimics light hitting different weights of paper in a bright, scholarly environment.
*   **Roundedness:** We utilize a subtle corner radius (Level 1) to maintain a professional, sharp-edged academic feel without being aggressive.
*   **The "Ghost Border" Fallback:** For accessibility in forms, use the `outline-variant` token at **20% opacity**. Never use 100% opaque, high-contrast borders.

---

## 5. Components

### Buttons
*   **Primary:** Utilizing the `primary` color (#B31E24). Border radius: Level 1. This slight rounding maintains a structured, professional silhouette.
*   **Secondary:** `surface-container-highest` background with `on-surface` text. No border.
*   **Tertiary:** Pure text with a 2px `primary` underline that expands on hover.

### Layout & Spacing
*   **Spacing Strategy:** We use a "Normal" spacing scale (Level 2) to balance density with editorial breathing room.
*   **The Divider Ban:** Do not use line dividers between list items. Use vertical white space or alternating background tones.

### Input Fields
*   **Styling:** Avoid the "box" look. Use a `surface-container-high` background with a `primary` 2px bottom-accent that activates on focus.
*   **Labels:** Use `label-md` in `on-surface-variant` (epilogue) for a muted, sophisticated secondary hierarchy.

---

## 6. Do's and Don'ts

### Do:
*   **Do** use asymmetrical layouts (e.g., a 60/40 split grid) to create visual interest.
*   **Do** prioritize whitespace. In this system, "empty" space is a luxury asset that denotes premium quality.
*   **Do** use the `primary` red (#B31E24) sparingly as a "surgical" accent to guide the eye.

### Don't:
*   **Don't** use saturated or neon colors. Always stick to the scholarly palette to maintain the "ink-on-paper" feel.
*   **Don't** use heavy rounded corners (Level 2 or 3). Keep to Level 1 to preserve the professional, structured silhouette.
*   **Don't** use centered text for body copy. Stick to left-aligned editorial standards to maintain the Monograph aesthetic.