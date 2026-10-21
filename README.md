# Internet Asset Manager

A centralized management platform for tracking and organizing internet infrastructure assets including domains, hosting services, and virtual private servers.

<p align="center">
  <img src="https://img.shields.io/badge/version-1.1.0-blue" />
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4" />
  <img src="https://img.shields.io/badge/Laravel-13-red" />
  <a href="LICENSE">
    <img alt="License" src="https://img.shields.io/badge/license-MIT-yellow" target="_blank" />
  </a>
</p>

## Description

Internet Asset Manager provides a structured approach to monitoring domain portfolios, hosting subscriptions, and VPS instances from a single administrative interface. The platform addresses the operational challenge of tracking renewal dates, costs, and credentials across multiple service providers.

Designed for agencies, freelancers, and organizations managing multiple client assets, the system consolidates infrastructure data with encrypted storage for sensitive credentials and automated status tracking for active and expired services.

## Features

- **Domain Portfolio Management** - Track domain names, registrars, linked hosting, registration and expiry dates, renewal costs, and status with encrypted notes
- **Hosting Subscription Tracking** - Manage hosting packages with server IPs, credentials, provider associations, and billing cycles
- **VPS Instance Management** - Monitor virtual private servers including operating systems, access credentials, and subscription lifecycles
- **Provider and Registrar Directory** - Maintain a centralized database of service providers and domain registrars for consistent referencing
- **Encrypted Credential Storage** - Sensitive data including passwords and notes are encrypted at rest using Laravel's encryption services
- **Administrative Dashboard** - Overview widgets displaying domain distribution by hosting provider and registrar
- **Authentication System** - Secure admin access with login, profile management, password reset, and email verification
- **UUID-Based Records** - All assets use UUID primary keys for enhanced security and API-friendly identifiers
- **Status Monitoring** - Visual indicators for active and expired assets with navigation badges showing active domain counts

## Tech Stack

- **Backend**: Laravel 13, PHP 8.3+
- **Admin Panel**: Filament 5.0
- **Database**: MariaDB (configurable to MySQL/PostgreSQL)
- **Frontend**: Tailwind CSS 4, Vite 8
- **Testing**: Pest PHP 5
- **Development Tools**: Laravel Sail, Laravel Pint, Laravel Pail

## Installation

### Prerequisites

- PHP 8.3 or higher
- Composer
- MariaDB or MySQL
- Node.js and npm

### Steps

1. Clone the repository

```bash
git clone https://github.com/Akselerasi-Prima-Digital/internet-asset-manager-filament.git
cd internet-asset-manager-filament
```

2. Install PHP dependencies

```bash
composer install
```

3. Install JavaScript dependencies

```bash
npm install
```

4. Create environment file

```bash
cp .env.example .env
```

5. Generate application key

```bash
php artisan key:generate
```

6. Configure database connection in `.env`

```
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations

```bash
php artisan migrate
```

8. Build frontend assets

```bash
npm run build
```

9. Start the development server

```bash
php artisan serve
npm run dev
```

10. Access the admin panel at `http://localhost:8000/admin`

## Configuration

The application uses a standard Laravel `.env` file for configuration. Key variables include:

### Application

| Variable | Description | Default |
|----------|-------------|---------|
| `APP_NAME` | Application name displayed in admin panel | Laravel |
| `APP_ENV` | Environment mode (local, production) | local |
| `APP_DEBUG` | Enable debug mode | true |
| `APP_URL` | Base application URL | http://localhost |

### Database

| Variable | Description | Default |
|----------|-------------|---------|
| `DB_CONNECTION` | Database driver | mariadb |
| `DB_HOST` | Database host | 127.0.0.1 |
| `DB_PORT` | Database port | 3306 |
| `DB_DATABASE` | Database name | example |
| `DB_USERNAME` | Database username | root |
| `DB_PASSWORD` | Database password | (empty) |

### Session and Cache

The application uses database-driven sessions and cache storage by default. Ensure the database migrations have been run to create the required tables.

## Usage

### Accessing the Admin Panel

Navigate to `/admin` on your installed instance. The application redirects unauthenticated users to the login page.

### Managing Domains

1. Navigate to **Infrastructure > Domain** in the sidebar
2. Click **Create Domain** to add a new domain
3. Fill in the domain details including registrar, hosting association, dates, and renewal cost
4. Use the **Notes** field for sensitive information - it is encrypted before storage

### Managing Hosting and VPS

1. Navigate to **Infrastructure > Hosting** or **Infrastructure > Vps**
2. Add new hosting packages or VPS instances with provider associations
3. Server IPs, usernames, and passwords are stored with encryption

### Dashboard Overview

The admin dashboard provides:
- **Domains Per Hosting** - Distribution of domains across hosting providers
- **Domains Per Registrar** - Domain counts grouped by registrar
- **Dashboard Overview** - Summary statistics for all assets

### Artisan Commands

```bash
# Run database migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed

# Create an admin user (via Filament)
php artisan make:filament-user

# Upgrade Filament components
php artisan filament:upgrade
```

## Project Structure

```
app/
├── Filament/
│   ├── Resources/
│   │   ├── Domains/          # Domain management (Resource, Pages, Schemas, Tables)
│   │   ├── Hostings/         # Hosting management
│   │   ├── Vps/              # VPS management
│   │   ├── Providers/        # Service provider management
│   │   └── Registrars/       # Domain registrar management
│   └── Widgets/              # Dashboard widgets
├── Models/                   # Eloquent models (Domain, Hosting, Vps, Provider, Registrar)
└── Providers/                # Service providers including Filament AdminPanelProvider
database/
├── migrations/               # Database schema migrations
├── factories/                # Model factories for testing
└── seeders/                  # Database seeders
resources/
├── css/                      # Stylesheets
└── js/                       # JavaScript assets
```

## Scripts / Commands

### NPM Scripts

| Command | Description |
|---------|-------------|
| `npm run dev` | Start Vite development server with hot reload |
| `npm run build` | Compile and optimize assets for production |

### Composer Scripts

| Command | Description |
|---------|-------------|
| `composer install` | Install PHP dependencies |
| `composer update` | Update PHP dependencies |
| `composer test` | Run Pest test suite |

### Artisan Commands

| Command | Description |
|---------|-------------|
| `php artisan serve` | Start Laravel development server |
| `php artisan migrate` | Run database migrations |
| `php artisan migrate:fresh --seed` | Reset database and seed with sample data |
| `php artisan filament:upgrade` | Upgrade Filament components |
| `php artisan make:filament-user` | Create a new admin user |

## Contributing

Contributions are welcome. To contribute:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add your feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a Pull Request

### Development Guidelines

- Follow PSR-12 coding standards (enforced by Laravel Pint)
- Write tests for new features using Pest PHP
- Ensure all migrations are reversible
- Use Filament's schema and table patterns for consistency
- Encrypt sensitive fields using Laravel's `$casts = ['field' => 'encrypted']`

## License

This project is open-sourced software licensed under the MIT License.

## Author

Akselerasi Prima Digital
