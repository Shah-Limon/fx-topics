# Market Pulse — Financial News & Forex Platform

A premium, production-ready static website for a financial news publication and Forex broker comparison platform. Built as an original design inspired by editorial financial media (FinanceFeeds, Bloomberg-style hierarchy) and Forex affiliate portals (FXDailyInfo-style broker cards, bonuses, awards).

## Project Structure

```
/
├── index.html              # Homepage (all main sections)
├── article.html            # Article detail with sidebar
├── broker-review.html       # In-depth broker review page
├── search.html             # Search results page
├── css/
│   └── styles.css          # All custom CSS (variables, components, responsive)
├── js/
│   └── main.js             # Vanilla JS interactivity
└── README.md
```

## Tech Stack

- **HTML5** — semantic, accessible markup
- **Tailwind CSS 3** (CDN) — layout, spacing, responsive utilities
- **Custom CSS** — design system, components, animations, financial UI
- **Vanilla JavaScript** — sticky nav, mobile menu, ticker, newsletter
- **No frameworks** — easy to convert to any backend (WordPress, Next.js, Astro, etc.)

## Design System

### Typography

- **Display & Headlines:** Spectral (serif) — editorial, financial publication feel
- **Body & UI:** Inter — clean, neutral, professional
- **Data & Labels:** JetBrains Mono — terminal-style ticker, percentages, market data

### Color Palette

| Token | Hex | Use |
|-------|-----|-----|
| Ink | `#0A1628` | Headers, primary text |
| Navy | `#0F1E3A` | Dark sections |
| Blue | `#1E3A8A` | Links, accents |
| Accent (gold) | `#C9A961` | Premium highlights, awards |
| Paper | `#FFFFFF` | Backgrounds |
| Up | `#047857` | Positive market moves |
| Down | `#B91C1C` | Negative market moves |

### Sections (Homepage)

1. Top utility bar (date, market status, social)
2. Advertisement leaderboard
3. Main header (logo, search, subscribe)
4. Sticky primary navigation
5. Live market ticker (15 instruments, infinite scroll)
6. Hero news (large article + 3 side stories)
7. Featured stories grid (3 cards)
8. Editorial campaign banner
9. Market overview grid (12 instruments)
10. Latest news + sidebar (most read, trending)
11. Stocks & Equities section
12. Crypto & Digital Assets section
13. Commodities section
14. FinTech & Innovation section
15. Top Forex Brokers (3 featured broker cards)
16. Broker comparison table (6 brokers)
18. Finance Awards 2026 (5 award cards)
19. Active Promotions (4 bonus cards)
20. Trading Education (6 courses)
21. Newsletter signup
22. Comprehensive footer
23. Compliance disclaimer

## Pages

- **`index.html`** — Complete homepage
- **`article.html`** — Article detail with author bio, related stories, share buttons, sidebar
- **`broker-review.html`** — Broker review with rating summary, pros/cons, fees table, regulation, account types, verdict
- **`search.html`** — Search results with category chips, pagination, trending searches

## Responsive Breakpoints

Tested and working at:

- 320px, 375px, 414px (mobile)
- 480px, 640px (large mobile)
- 768px (tablet)
- 1024px (small desktop)
- 1280px, 1440px, 1920px (desktop)

Key responsive behaviors:

- Multi-column hero collapses to single column at 1024px
- Sticky navigation becomes off-canvas mobile menu at 768px
- Market data grid collapses from 4 → 2 → 1 columns
- Broker comparison table horizontally scrollable on mobile
- Article sidebar moves below content on tablet

## Accessibility

- Semantic HTML5 landmarks (`<header>`, `<nav>`, `<main>`, `<aside>`, `<article>`, `<footer>`)
- ARIA labels on interactive icons
- Visible keyboard focus states
- `prefers-reduced-motion` support disables ticker animation
- Sufficient color contrast (WCAG AA on text)
- Skip-friendly heading hierarchy
- Form labels properly associated

## SEO

Each page includes:

- Title and meta description
- Canonical link
- Open Graph tags
- Twitter Card metadata
- Schema.org JSON-LD:
  - `WebSite` on homepage
  - `NewsArticle` on article page
  - `Review` on broker-review page

## Performance

- Lazy-loaded images (`loading="lazy"`)
- No build step required — open `index.html` directly
- Minimal JavaScript (under 5 KB gzipped)
- Inline critical CSS via Tailwind CDN
- Web fonts with `display=swap`
- No external image assets — all images are Unsplash CDN URLs

## Converting to a Dynamic Application

The HTML structure is designed for easy templating. Suggested integrations:

- **WordPress / Ghost** — Each page becomes a template; broker data moves to custom fields/posts
- **Astro / Next.js** — Map each HTML section to a component; use the existing classes verbatim
- **Django / Rails / Laravel** — Generate HTML server-side from the existing structure
- **CMS-driven content** — Replace hardcoded articles with `<article>` blocks from a CMS API

## Compliance Notes

- All broker promotions are clearly labeled "Sponsored"
- Risk disclosure is included in the footer
- Newsletter forms have consent disclaimer text
- Sample market data is labeled as such (not real-time data)

## Browser Support

Tested in modern Chromium, Firefox and Safari. Uses:

- CSS Grid + Flexbox (no IE)
- `aspect-ratio` (graceful fallback to padding-bottom hack)
- `clamp()` for fluid typography
- CSS custom properties
- Native lazy loading with IntersectionObserver fallback

## License

This is a portfolio / demonstration project. All fictional content, sample data and placeholder branding.

---

For questions or to extend the platform, the cleanest places to start are:

- `css/styles.css` — design tokens at the top (`:root`)
- `index.html` — homepage sections in order
- `js/main.js` — single IIFE with all interactivity