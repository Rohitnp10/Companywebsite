# Softrix International — Corporate Website (Static, Dynamic-Ready)

A production-quality **static** corporate website for Softrix International
Pvt. Ltd., architected so it can become a **fully dynamic, database-backed
website later with minimal changes** to the frontend.

---

## 1. Getting Started

This project was scaffolded outside of an environment with Composer/npm
registry access to install dependencies, so you'll need to run the
install steps yourself locally:

```bash
# 1. Install PHP dependencies
composer install

# 2. Copy the environment file and generate an app key
cp .env.example .env
php artisan key:generate

# 3. Install JS dependencies
npm install

# 4. Run the dev servers (two terminals, or use the combined script below)
php artisan serve
npm run dev
```

Then visit `http://127.0.0.1:8000`.

> No database setup is required for this phase — the site has no
> models, migrations, or admin panel. It reads all content from static
> PHP classes in `app/Content/`.

---

## 2. Architecture at a Glance

```
Static Content Class  →  Controller  →  Blade Component  →  UI
   (app/Content/*)        (app/Http/Controllers/*)   (resources/views/**)
```

- **Presentation layer** — `resources/views/` (layouts, components, pages)
- **Content layer** — `app/Content/*.php` (plain PHP arrays, shaped like future DB rows)
- **Configuration layer** — `config/company.php`, `config/navigation.php`, `config/seo.php`
- **Routing layer** — `routes/web.php` (named routes, controller-backed)

Nothing in a Blade file contains hard-coded company copy, addresses, or
navigation links — everything flows in through a controller or a config
call, e.g. `config('company.address_line')` or `ServicesContent::active()`.

### Why this matters

When you're ready to go dynamic, the migration path is:

1. Create migrations + Eloquent models (`Service`, `Product`, `Industry`, `Project`, `Job`, etc.)
2. Replace the static content classes' method bodies with Eloquent queries, e.g.:
   ```php
   // Before
   public static function active(): array { /* static array */ }

   // After
   public static function active(): array
   {
       return Service::where('is_active', true)->orderBy('sort_order')->get()->toArray();
   }
   ```
3. Add an admin/CMS interface (Filament, Nova, or a custom panel) to manage those models.
4. **The Blade components, layouts, and routes do not need to change**, because
   they were always fed arrays/collections with the same field names.

---

## 3. Key Directories

```
app/
├── Content/                  Static "content provider" classes (one per section)
│   ├── CompanyContent.php    Wraps config/company.php
│   ├── HomeContent.php
│   ├── AboutContent.php
│   ├── ServicesContent.php
│   ├── SolutionsContent.php  (Products/Solutions)
│   ├── IndustriesContent.php
│   ├── ProjectsContent.php
│   ├── CareersContent.php
│   └── ContactContent.php
└── Http/Controllers/
    ├── HomeController.php
    ├── AboutController.php
    ├── ServicesController.php
    ├── SolutionsController.php
    ├── IndustriesController.php
    ├── ProjectsController.php
    ├── CareersController.php
    └── ContactController.php  (has index() + a demo-only store())

config/
├── company.php     Single source of truth: name, tagline, email, phone,
│                   address/city/country, social links, logo paths
├── navigation.php  Primary nav, CTA, and footer link columns (uses route names)
└── seo.php         Default SEO fallbacks used by <x-layout.seo>

resources/views/
├── layouts/app.blade.php          Root HTML layout
├── components/
│   ├── layout/seo.blade.php       <x-layout.seo :seo="$seo" />
│   ├── navigation/                Navbar (Alpine mobile menu), footer, social links
│   ├── buttons/                   Primary / secondary buttons
│   ├── sections/                  Section heading, CTA band, page header, hero visual
│   ├── cards/                     Service / product / industry / project / job / feature cards
│   ├── forms/contact-form.blade.php
│   └── icons/icon.blade.php       Self-contained SVG icon registry (no external icon package)
└── pages/                         home, about, services, solutions, industries,
                                    projects, careers, contact
```

---

## 4. Changing the Company Location (or Any Company Info)

Everything lives in **one file**: `config/company.php`. For example, to
move from Kathmandu to Dubai:

```php
'address_line' => 'Dubai, UAE',
'city' => 'Dubai',
'country' => 'UAE',
'map_embed_url' => 'https://maps.google.com/maps?q=Dubai,UAE&output=embed',
```

No Blade file needs to be touched — the footer, contact page, and any
future page that shows the address all read from this config.

---

## 5. Editing Content

To change site copy, edit the relevant class in `app/Content/`. For example,
to add a 9th service, add a new array entry to `ServicesContent::all()`
with the next `id`/`sort_order` — the Blade view (`pages/services.blade.php`)
and `<x-cards.service-card>` component require no changes.

---

## 6. Contact Form — Current State

The contact form (`resources/views/components/forms/contact-form.blade.php`)
is fully wired for CSRF protection and posts to `POST /contact`
(`routes/web.php` → `ContactController@store`). **It currently validates
input but does not persist messages or send email** — see the `TODO`
comments in `ContactController::store()` for the exact change needed
once a `ContactMessage` model/mailable exists. The UI already shows a
"demo submission" confirmation state so visitors aren't misled about
what happens to their message.

---

## 7. Design Tokens

Colors, typography, spacing, and animation are centralized in
`tailwind.config.js` (`theme.extend.colors.brand`) and
`resources/css/app.css` (typography utility classes like `.h-hero`,
`.h-section`, `.text-body`). Change the palette or type scale in one
place and it propagates everywhere.

---

## 8. What's Intentionally Not Included (Yet)

Per the project brief, this phase deliberately excludes:

- Admin panel / CMS
- Database models or migrations for website content
- User authentication
- Real contact-form persistence or email delivery
- Fabricated client logos, testimonials, or usage statistics

All of the above are designed to slot in later without reworking the
frontend — see Section 2.
