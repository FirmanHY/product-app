# F-SHOP

E-commerce web application built with Laravel 12 and PostgreSQL.

**Live Demo:** https://f-shop-production.up.railway.app/

## Tech Stack

- **Backend:** Laravel 12, PHP 8.4
- **Database:** PostgreSQL (Neon)
- **Frontend:** Bootstrap, jQuery, Vanilla JS
- **Payment:** PayPal
- **Deployment:** Railway (Docker), Neon (Database)

## Features

- Product catalog with categories, brands, and filters
- Shopping cart & wishlist
- Checkout with COD and PayPal payment
- Coupon/discount system
- Order management & PDF invoice
- Admin dashboard with sales chart
- Banner & product management via admin panel
- User authentication

## Local Development

### Requirements

- PHP 8.4+
- Composer
- Node.js & NPM
- PostgreSQL (or Neon account)

### Setup

```bash
# Clone the repo
git clone <repo-url>
cd product-app

# Install dependencies
composer install
npm install

# Copy and configure environment
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_CONNECTION=pgsql
DB_HOST=your-neon-host
DB_PORT=5432
DB_DATABASE=neondb
DB_USERNAME=your-username
DB_PASSWORD=your-password
DB_SSLMODE=require
```

```bash
# Run migrations and seeders
php artisan migrate
php artisan db:seed

# Build assets and run server
npm run build
PHP_CLI_SERVER_WORKERS=4 php artisan serve
```

### Default Accounts (after seeding)

| Role  | Email             | Password |
|-------|-------------------|----------|
| Admin | admin@gmail.com   | 1111     |
| User  | user@gmail.com    | 1111     |

## Deployment

This project is deployed on [Railway](https://railway.app) using Docker with [Neon](https://neon.tech) as the PostgreSQL database.

### Environment Variables (set on Railway)

| Key | Description |
|-----|-------------|
| `APP_KEY` | Laravel application key |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `DB_CONNECTION` | `pgsql` |
| `DB_HOST` | Neon database host |
| `DB_DATABASE` | Neon database name |
| `DB_USERNAME` | Neon username |
| `DB_PASSWORD` | Neon password |
| `DB_SSLMODE` | `require` |
| `PAYPAL_SANDBOX_CLIENT_ID` | PayPal sandbox client ID |
| `PAYPAL_SANDBOX_CLIENT_SECRET` | PayPal sandbox secret |

Migrations run automatically on each deployment via `start.sh`.

## License

MIT
