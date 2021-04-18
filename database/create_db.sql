DROP DATABASE IF EXISTS `php_auth`;

CREATE DATABASE `php_auth`;

USE `php_auth`;

CREATE TABLE `users` (
  `user_id` INT AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(30) NOT NULL,
  `last_name` VARCHAR(30) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT NOW(),
  `updated_at` TIMESTAMP DEFAULT NOW()
);

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`)
VALUES (
    "John",
    "Doe",
    "john-dw@gmail.com",
    "$2y$10$guuP.eEUbmlNI5x8ZVvu5OWDsaeCufaNXbZwuEmVp0quqicUNT4oa"
  );