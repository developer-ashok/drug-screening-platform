# Quick Setup Guide

## Initial Setup Steps

1. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

2. **Configure environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   
   Edit `.env` and set:
   - Database credentials
   - Mail configuration (or use `MAIL_MAILER=log` for development)
   - `MAIL_ADMIN_EMAIL` - Email address to receive form submission notifications

3. **Run migrations:**
   ```bash
   php artisan migrate
   ```

4. **Create storage link:**
   ```bash
   php artisan storage:link
   ```

5. **Create admin user:**
   ```bash
   php artisan tinker
   ```
   Then:
   ```php
   \App\Models\User::create([
       'name' => 'Admin',
       'email' => 'admin@example.com',
       'password' => bcrypt('password'),
   ]);
   ```

6. **Start development server:**
   ```bash
   php artisan serve
   ```

7. **Access the site:**
   - Public site: http://localhost:8000
   - Admin login: http://localhost:8000/login

## Default Routes

- `/` - Home page
- `/services` - Services page
- `/contact` - Contact page
- `/privacy` - Privacy Policy
- `/terms` - Terms of Service
- `/background-check` - Background Check Request Form
- `/drug-screening` - Drug Screening Request Form
- `/login` - Admin Login
- `/admin/dashboard` - Admin Dashboard (requires authentication)
- `/admin/background-checks` - View all background check requests
- `/admin/drug-screenings` - View all drug screening requests

## Email Configuration

For development, use the log driver to view emails in `storage/logs/laravel.log`:
```env
MAIL_MAILER=log
```

For production, configure SMTP settings in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_email@example.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="Background Screening Platform"
MAIL_ADMIN_EMAIL=admin@example.com
```

## File Uploads

Uploaded files are stored in `storage/app/public/uploads/background-checks/`. Ensure the directory is writable:
```bash
chmod -R 775 storage
```

## Troubleshooting

- **Storage link not working**: Run `php artisan storage:link` again
- **Email not sending**: Check `.env` mail configuration and logs
- **Permission errors**: Ensure `storage` and `bootstrap/cache` are writable
- **Routes not working**: Run `php artisan route:clear` and `php artisan config:clear`

