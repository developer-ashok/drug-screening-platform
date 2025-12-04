# DS CodeRubix - Background Screening Platform

A secure, professional Laravel-based website for submitting background check and drug screening requests. Built with Laravel 12 and Bootstrap 5.

## Features

- **Public Pages**: Home, Services, Contact, Privacy Policy, Terms of Service
- **Two Secure Forms**:
  - Background Check Request Form
  - Drug Screening Request Form
- **Email Notifications**: Automatic email notifications on form submission
- **Admin Dashboard**: Secure admin panel to view submissions and export data
- **Data Export**: CSV export functionality for both request types
- **File Uploads**: Support for document uploads (consent forms, resumes, etc.)
- **Mobile Responsive**: Bootstrap 5 design that works on all devices
- **Authentication**: Laravel Breeze authentication for admin access

## Requirements

- PHP >= 8.2
- Composer
- Node.js >= 20.19.0 (for asset compilation)
- MySQL/PostgreSQL/SQLite database

## Installation

1. **Clone or navigate to the project directory:**
   ```bash
   cd drug-screening
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies:**
   ```bash
   npm install
   ```

4. **Set up environment file:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your `.env` file:**
   ```env
   APP_NAME="Background Screening Platform"
   APP_URL=http://localhost:8000
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   
   MAIL_MAILER=smtp
   MAIL_HOST=your_smtp_host
   MAIL_PORT=587
   MAIL_USERNAME=your_email@example.com
   MAIL_PASSWORD=your_email_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email@example.com
   MAIL_FROM_NAME="${APP_NAME}"
   MAIL_ADMIN_EMAIL=admin@example.com
   ```

6. **Run migrations:**
   ```bash
   php artisan migrate
   ```

7. **Create storage link:**
   ```bash
   php artisan storage:link
   ```

8. **Create an admin user:**
   ```bash
   php artisan tinker
   ```
   Then in tinker:
   ```php
   $user = \App\Models\User::create([
       'name' => 'Admin User',
       'email' => 'admin@example.com',
       'password' => bcrypt('your-secure-password'),
   ]);
   ```

9. **Build assets (for development):**
   ```bash
   npm run dev
   ```
   Or for production:
   ```bash
   npm run build
   ```

10. **Start the development server:**
    ```bash
    php artisan serve
    ```

## Usage

### Public Access

- Visit `http://localhost:8000` to access the public website
- Navigate to "Request Forms" in the menu to access:
  - Background Check Request Form
  - Drug Screening Request Form

### Admin Access

1. Visit `http://localhost:8000/login`
2. Log in with your admin credentials
3. Access the admin dashboard at `http://localhost:8000/admin/dashboard`

### Admin Features

- **Dashboard**: Overview of recent submissions
- **View Submissions**: Browse all background check and drug screening requests
- **Export Data**: Download CSV files of all submissions
- **View Details**: Click "View Details" to see complete request information

## Form Fields

### Background Check Request Form

- Company Information (name, contact person, email, phone)
- Position/Job Title
- Candidate Information (name, email, phone)
- Background Check Types (checkboxes):
  - Criminal History Check
  - Employment Verification
  - Education Verification
  - Credit History Check
  - Reference Check
  - Identity Verification
- Turnaround Time (Standard or Rush)
- Number of Candidates
- File Upload (optional)
- Notes

### Drug Screening Request Form

- Company Information (name, contact person, email, phone)
- Candidate Information (name, email, phone)
- Drug Test Type (dropdown)
- Preferred Collection Date/Time
- Preferred Testing Location (city, zip)
- Special Instructions
- Notes

## Email Configuration

Email notifications are sent when forms are submitted. Configure your email settings in the `.env` file. The system will send notifications to the email address specified in `MAIL_ADMIN_EMAIL`.

For development, you can use the `log` mailer to view emails in `storage/logs/laravel.log`:
```env
MAIL_MAILER=log
```

## File Storage

Uploaded files are stored in `storage/app/public/uploads/background-checks/`. Make sure the storage link is created (`php artisan storage:link`) and the directory is writable.

## Security Features

- CSRF protection on all forms
- Input validation and sanitization
- Secure file upload handling
- Authentication required for admin access
- Password hashing for user accounts

## Database Structure

### Tables

- `users` - Admin users (Laravel Breeze)
- `background_check_requests` - Background check submissions
- `drug_screening_requests` - Drug screening submissions

## Production Deployment

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Ensure proper file permissions:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```
7. Configure your web server (Apache/Nginx) to point to the `public` directory

## Support

For issues or questions, please refer to the Laravel documentation or contact the development team.

## License

This project is proprietary software.
