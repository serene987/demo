CREATE USER IF NOT EXISTS 'phpuser'@'localhost' IDENTIFIED BY 'phppassword';
GRANT ALL PRIVILEGES ON demo_db.* TO 'phpuser'@'localhost';
FLUSH PRIVILEGES;