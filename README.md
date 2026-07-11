# Kishore Kumar — PHP Portfolio

Personal portfolio built with **Core PHP** and **MySQL**, with contact form storage and email notifications.

## Features

- Single-page portfolio (About, Skills, Experience, Projects, Contact)
- Content sourced from your resume
- Contact form saves to MySQL and sends email via PHP `mail()`
- Responsive modern UI with animations
- AJAX form submission with validation

## Setup

### 1. Database

```bash
mysql -u root -p < database/schema.sql
```

### 2. Configuration

Copy and edit config if needed:

```bash
cp config/config.example.php config/config.php
```

Update database credentials and `site.url` in `config/config.php`.

### 3. Email (optional)

For contact emails to work, configure PHP mail or SMTP on your server. The recipient is set in `config.php` → `mail.to` (default: `kishormdu.kumar@gmail.com`).

On Ubuntu you may install and use Postfix, or point `mail()` to an SMTP relay.

### 4. Open in browser

```
http://localhost/php/kishore-portfolio/
```

## Project structure

```
kishore-portfolio/
├── index.php           # Main page
├── contact.php         # Contact API (JSON)
├── config/
├── database/schema.sql
├── includes/
│   ├── bootstrap.php
│   ├── data.php        # Resume content
│   ├── ContactService.php
│   └── Database.php
└── assets/
    ├── css/style.css
    └── js/main.js
```

## Requirements

- PHP 8.0+
- MySQL 5.7+ / MariaDB
- Apache with mod_rewrite (optional)
