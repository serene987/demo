# Security Demo - SQL Injection & Phishing

## 📁 Folder Structure
- `/demo/` - SQL Injection vulnerable application
- `/phishing/` - Phishing credential harvester

## 🔵 SQL Injection Demo
**Location:** `http://localhost/demo/`
**Working Payloads:**
- `admin' OR '1'='1` - Login as admin (any password)
- `' OR '1'='1` - Login as first user (any password)
- `admin` / `admin123` - Normal login

## 🔴 Phishing Demo
**Location:** `http://localhost/phishing/`
**Captured credentials:** `/var/www/html/phishing/creds.txt`

## 🗄️ Database Setup
```bash
sudo mysql < database.sql
sudo mysql < setup.sql


## 📋 Quick Setup Commands
```bash
# Database setup
sudo mysql < /var/www/html/demo/database.sql
sudo mysql < /var/www/html/demo/setup.sql

# Permissions
sudo chmod 755 /var/www/html/demo/*.php
sudo chmod 755 /var/www/html/phishing/*.php
sudo chmod 666 /var/www/html/phishing/creds.txt
sudo chown -R www-data:www-data /var/www/html/

/var/www/html/
├── demo/
│   ├── index.html (points to login.php)
│   ├── login.php (SQL injection demo)
│   ├── signup.html (points to signup.php)
│   ├── signup.php (vulnerable signup)
│   ├── style.css
│   ├── script.js.BACKUP (disabled)
│   ├── database.sql
│   └── setup.sql
└── phishing/
    ├── index.html (points to post.php)
    ├── post.php (credential harvester)
    ├── style.css
    └── logs/
        └── captured_creds.txt (stolen credentials)