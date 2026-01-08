# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

CEIQ Landing Page is a static marketing landing page for CEIQ, a community engagement intelligence platform for K-12 education. The site targets school and district leaders with messaging around data-driven community engagement.

## Development Commands

```bash
npm run dev      # Start dev server on http://localhost:3000
npm run build    # Build for production (outputs to dist/)
npm run preview  # Preview production build
```

## Architecture

This is a simple static site using Vite as the build tool:

- **index.html**: Single-page landing site with all HTML, CSS (inline in `<style>` tags), and JavaScript (inline `<script>` tags)
- **vite.config.ts**: Vite configuration with port 3000, environment variable handling for GEMINI_API_KEY
- **images/**: Static assets including logo, hero images, and dashboard screenshots

The page structure includes: header with mobile menu, hero section with image carousel, storyline/problem-solution section, features grid, weekly resources/newsletter signup, CTA, and footer.

## Key Implementation Details

- CSS uses custom properties (CSS variables) defined in `:root` for theming (colors, fonts)
- Mobile-first responsive design with breakpoints at 640px, 768px, and 1024px
- Image carousel in features section with auto-advance (5s interval)
- Video modal for YouTube embed with autoplay
- No external CSS or JS frameworks - vanilla implementation
