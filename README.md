# Security Demo - Login/Signup System

## ⚠️ WARNING
This code contains INTENTIONAL security vulnerabilities for educational purposes only.
**NEVER use this code in production environments.**

## Vulnerabilities Demonstrated

### 1. SQL Injection
- Login and signup forms are vulnerable to SQL injection attacks
- Example payloads:
  - Username: `admin' OR '1'='1' --`
  - Username: `' OR 1=1 --`

### 2. Phishing
- The HTML pages can be cloned and hosted for phishing demonstrations
- Forms capture credentials without proper security measures

## Setup

1. Install XAMPP or similar PHP/MySQL environment
2. Import `database.sql` into MySQL
3. Place files in web server directory (e.g., htdocs)
4. Access via `http://localhost/signuplogin/`

## Testing SQL Injection

Try these in the login form:
- Username: `admin' OR '1'='1' --`
- Password: (anything)

## Educational Use Only
This is for security training and penetration testing demonstrations in controlled environments.
