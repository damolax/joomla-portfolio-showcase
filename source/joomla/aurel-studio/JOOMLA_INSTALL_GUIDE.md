# AUREL Studio — Joomla CMS Integration Guide

## Scope and status
The live Vercel site under /docs/aurel-studio/ is static, but demonstrates all front-end pages. This directory includes a Joomla 5/6 custom template foundation based on those assets. It is **not** itself a deployed or verified Joomla CMS. A complete migration requires PHP/MySQL hosting, content entry and QA.

## Install template
1. Zip the contents of `template/` (not its containing directory), ensuring `templateDetails.xml` appears at ZIP root.
2. Install Joomla 5/6 on a PHP/MySQL host; configure HTTPS and secure administration.
3. In Joomla administrator: System > Install > Extensions, upload the ZIP.
4. Set AUREL Studio as the default template style and check template options.

## Modules and menu
- Position `menu`: Joomla Menu module configured for primary desktop navigation.
- Position `mobile-menu`: same Menu module for mobile display.
- Position `search`: Joomla Smart Search module (optional).
- Position `hero`: homepage hero Custom HTML module with professional imagery.
- Positions `breadcrumbs`, `sidebar`, `bottom`: optional core content/modules.
- Positions `footer-1` to `footer-3`: menus, studio description, contact details. Use real content only.

## Pages and articles
Create Joomla menu entries for Home, Studio, Services, Projects, Process, Journal, Contact, Materials and Project Brief. For articles, set appropriate category and image. To achieve exact front-end section parity, migrate the corresponding HTML as controlled Custom HTML modules or create Joomla component/category overrides.

Suggested article categories: Projects, Journal, Services. Suggested custom fields:
- Projects: type, year, hero image, supporting images, design challenge, design response, material palette, publication state.
- Journal: topic, hero image, excerpt, related article IDs.
Set Joomla menu aliases and SEO metadata per content page.

## Contact and other backend features
Joomla's core Contacts or a vetted form extension must be configured for **real** submissions, email delivery, validation, consent, rate limiting and spam protection. The static preview form intentionally prepares a local text draft only. The downloadable brief builder also runs locally. An actual booking workflow requires a separately connected booking provider.

## QA before selling this as a Joomla build
Verify PHP compatibility, template installation, modules, all content, menu routing, SEO URLs, 404 behavior, keyboard navigation, mobile views, real form delivery, anti-spam, file uploads, caching and backups. Replace any sample concept team, pricing and stock imagery with accurate client-provided information. Do not claim a Joomla CMS site has been launched based on the Vercel preview alone.
