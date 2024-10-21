CREATE DATABASE IF NOT EXISTS `ztraty_nalezy`;

USE `ztraty_nalezy`;

CREATE TABLE IF NOT EXISTS `users`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

ALTER TABLE
    users
ADD
    COLUMN role ENUM('user', 'admin') NOT NULL DEFAULT 'user';

ALTER TABLE
    users
ADD
    COLUMN password_not_hashed VARCHAR(255) NOT NULL;

CREATE TABLE IF NOT EXISTS `lost_items` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    found_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    founder VARCHAR(255) NOT NULL,
    approved INT DEFAULT 0
);

/* set id to admin/user:
 
 UPDATE users 
 SET role = 'admin'/'user'
 WHERE id = number; 
 
 /*