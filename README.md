# AppLlibre — TALL Library

A simplified version of the original Library project, migrated to Laravel 13 with Livewire 4, Tailwind CSS 4 and Alpine.js.

## What is included from the original project

- Book catalogue
- Categories
- Book details page
- Favourites / wishlist
- Users and administration
- The three demo books and their covers
- Visual style based on the original project: dark blue + cream background

## Minimum requirements covered

- Tailwind CSS for the whole interface and responsive design.
- Alpine.js for small browser interactions, such as the mobile menu and showing/hiding passwords.
- Laravel with Eloquent, migrations, seeders, validation, named routes and middleware.
- Main models: User, Category and Book, plus the Wishlist relationship model.
- Relationships: Category -> hasMany Books, Book -> belongsTo Category, User <-> Book many-to-many through wishlists.
- CRUD functionality from the frontend for books, categories and users.
- More than 5 dynamic full-page sections built with Livewire.
- More than 5 reusable Blade components.
- Authentication: registration, login, logout and password recovery using Laravel's authentication features.
- Two roles: user and admin, with admin middleware.
- Search + category filter + availability filter in the catalogue.

## Test accounts

### Administrator
- Email: `admin@appllibre.local`
- Password: `Admin123!`

### User
- Email: `usuari@appllibre.local`
- Password: `Usuari123!`

## Installation

Requirements: PHP 8.3+, Composer, Node.js and npm.

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000`.

### MySQL database

The `.env.example` file is already configured to use SQLite, which makes the project easier to test. If you prefer MySQL, change `DB_CONNECTION` to `mysql` and fill in `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`.

## Password recovery

During development, the project uses `MAIL_MAILER=log`, so there is no need to configure SMTP. Laravel writes the password recovery link to the log.

## Important files for the presentation

- `routes/web.php` — routes and middleware.
- `app/Models/` — models and relationships.
- `database/migrations/` — database schema.
- `database/seeders/DatabaseSeeder.php` — demo data.
- `app/Livewire/` — dynamic pages and CRUD.
- `resources/views/components/` — reusable components.
- `resources/css/app.css` — Tailwind entry point.
- `resources/views/components/navbar.blade.php` — example of Alpine.js.

## Note

The project leaves out some extra features from the old version (reservations, loans, SMTP emails, etc.) because the goal is to meet the minimum requirements for the assignment with a codebase that is easy to understand and present.
