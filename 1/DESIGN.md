---
name: Architecto Professional
colors:
  surface: '#f8f9ff'
  surface-dim: '#ccdbf5'
  surface-bright: '#f8f9ff'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#eff4ff'
  surface-container: '#e6eeff'
  surface-container-high: '#dde9ff'
  surface-container-highest: '#d5e3fe'
  on-surface: '#0d1c2f'
  on-surface-variant: '#444653'
  inverse-surface: '#233145'
  inverse-on-surface: '#ebf1ff'
  outline: '#757684'
  outline-variant: '#c4c5d5'
  surface-tint: '#3d57ba'
  primary: '#00175c'
  on-primary: '#ffffff'
  primary-container: '#1e40af'
  on-primary-container: '#7e97fe'
  inverse-primary: '#b8c4ff'
  secondary: '#505f76'
  on-secondary: '#ffffff'
  secondary-container: '#d4e3ff'
  on-secondary-container: '#56657c'
  tertiary: '#440900'
  on-tertiary: '#ffffff'
  tertiary-container: '#691401'
  on-tertiary-container: '#f47a5c'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#dde1ff'
  primary-fixed-dim: '#b8c4ff'
  on-primary-fixed: '#001453'
  on-primary-fixed-variant: '#213da0'
  secondary-fixed: '#d4e3ff'
  secondary-fixed-dim: '#b8c7e2'
  on-secondary-fixed: '#0c1c30'
  on-secondary-fixed-variant: '#39485e'
  tertiary-fixed: '#ffdad2'
  tertiary-fixed-dim: '#ffb4a2'
  on-tertiary-fixed: '#3d0700'
  on-tertiary-fixed-variant: '#822610'
  background: '#f8f9ff'
  on-background: '#0d1c2f'
  surface-variant: '#d5e3fe'
  success-green: '#4ade80'
typography:
  headline-display:
    fontFamily: Plus Jakarta Sans
    fontSize: 96px
    fontWeight: '800'
    lineHeight: '1.0'
    letterSpacing: -0.04em
  headline-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 64px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-sm:
    fontFamily: Plus Jakarta Sans
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
  body-lg:
    fontFamily: Manrope
    fontSize: 20px
    fontWeight: '500'
    lineHeight: '1.6'
  body-md:
    fontFamily: Manrope
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.5'
  label-bold:
    fontFamily: Manrope
    fontSize: 14px
    fontWeight: '700'
    lineHeight: '1.2'
  label-caps:
    fontFamily: Manrope
    fontSize: 12px
    fontWeight: '800'
    lineHeight: '1.0'
    letterSpacing: 0.2em
rounded:
  sm: 0.5rem
  DEFAULT: 1rem
  md: 1.5rem
  lg: 2rem
  xl: 3rem
  full: 9999px
spacing:
  container-max: 1280px
  section-padding-y: 6rem
  inline-margin: 2rem
  gutter-md: 2rem
  stack-lg: 2.5rem
  stack-md: 1.5rem
---

## Brand & Style
The brand identity is rooted in **Professional Reliability** and **Technical Precision**. It targets the premium Nigerian service market, balancing a high-trust corporate feel with modern, accessible energy. 

The design style is **Corporate / Modern** with a focus on high-impact typography and clean, structural layouts. It utilizes large, bold headlines to establish authority and subtle gradients to suggest premium quality. The emotional response should be one of "Peace of Mind" — replacing the uncertainty of the local service market with a systematic, verified experience.

## Colors
The palette is dominated by **Architecto Blue** (`#00288e`), a deep, authoritative navy that signifies trust and institutional stability. 

- **Primary & Gradients:** The core action color is a vibrant navy, often used in a 135-degree linear gradient transitioning to a slightly lighter blue (`#1e40af`) to add depth to buttons and hero sections.
- **Surface System:** The UI uses a sophisticated tiered blue-grey scale for backgrounds. `surface-container-low` (`#eff4ff`) provides a soft alternative to pure white for section grouping, while `surface-container-high` (`#dde9ff`) is used for featured cards and carousels.
- **Functional Colors:** Success states utilize a bright green (`#4ade80`) for status indicators, typically paired with a pulse animation to signify "live" or "verified" status.

## Typography
The system employs a dual-font strategy to balance character with readability.

- **Headlines:** Uses **Plus Jakarta Sans**. For the largest display sizes, use the "Satoshi-style" treatment: Extra Bold (800 weight), tight tracking (-0.04em), and a leading of 1.0 to create a high-impact, editorial look.
- **Body & UI:** Uses **Manrope**. This provides a clean, geometric sans-serif that remains highly legible in functional contexts like search inputs and descriptions.
- **Mobile Scaling:** Display headlines (96px) must scale down to `headline-lg` (64px) or `headline-md` (48px) on mobile devices to maintain visual hierarchy without breaking the layout.

## Layout & Spacing
The layout follows a **Fixed Grid** philosophy with generous vertical breathing room. 

- **Grid:** A standard 12-column grid is used for content, maxing out at 1280px. Gutters are consistently 32px (`2rem`).
- **Vertical Rhythm:** Sections are separated by a consistent `96px` (6rem) padding to maintain an airy, premium feel. 
- **Responsive Behavior:** On mobile, margins reduce to `24px` (1.5rem). The 3-column "How It Works" grid reflows into a single-column vertical stack.
- **Search Bar:** The primary search utility uses a unique internal vertical divider on desktop that disappears on mobile as the inputs stack.

## Elevation & Depth
Elevation is achieved through a mix of **Tonal Layering** and **Soft Ambient Shadows**.

- **Shadows:** The "Hero Search" and "Focal Carousel" items use an extra-diffused shadow (`shadow-2xl`) with a hint of the primary color in the shadow's tint (`rgba(0,40,142,0.12)`) to prevent a "dirty" look.
- **Glassmorphism:** Metric cards and badges within high-contrast sections (like the "Technical Precision" block) use `backdrop-blur-xl` and semi-transparent white borders (`white/10`) to create depth without adding heavy shadows.
- **Borders:** Low-contrast outlines (`outline-variant/20`) are used to define search inputs and containers on white backgrounds.

## Shapes
The shape language is consistently **Pill-shaped** and highly rounded, reinforcing the "friendly but professional" brand personality.

- **Large Containers:** Hero cards and major sections use `2.5rem` (40px) corner radii.
- **Buttons & Toggles:** Primary actions and search bars utilize `1.5rem` (24px) or fully rounded (pill) ends.
- **Images:** Service and portfolio images always feature a `1.5rem` to `2rem` radius, often paired with a subtle zoom/translate transition on hover.

## Components
- **Buttons:** Primary buttons use the `hero-gradient` with white text and a `2xl` roundedness. They should include a subtle scale-down (`active:scale-95`) and shadow expansion on hover.
- **Selection Toggles:** Used for "Hire vs Get Hired". These are pill-shaped containers with a white "floating" active state that uses a medium shadow to indicate elevation above the track.
- **Input Fields:** Search inputs are borderless, relying on the parent container's styling. Placeholders use `outline/60` and icons are consistently `primary` color.
- **Metric Cards:** Use a `3xl` radius with a semi-transparent background (`white/5`) and a 1px border. They should exhibit a slight upward translation on hover.
- **Badges:** Use all-caps, bold tracking, and a background color that is 10-20% opacity of the text color (e.g., green text on light green background).