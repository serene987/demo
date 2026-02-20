CREATE DATABASE IF NOT EXISTS demo_db;
USE demo_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email, username, password) VALUES 
('Admin User', 'admin@example.com', 'admin', 'admin123'),
('Test User', 'test@example.com', 'testuser', 'password123');
