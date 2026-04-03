CREATE DATABASE `turbo`;
USE `turbo`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(20) NOT NULL UNIQUE,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` ENUM('admin', 'user','seller') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(10) NOT NULL UNIQUE,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `market`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uuid` varchar(10) NOT NULL UNIQUE,
    `name` varchar(255) NOT NULL,
     PRIMARY KEY (`id`),
    `location` varchar(255) NOT NULL
);

CREATE TABLE `boutiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(20) NOT NULL UNIQUE,
  `name` varchar(255) NOT NULL,
  `description` TEXT,
  `seller_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,

  PRIMARY KEY (`id`),
  FOREIGN KEY (`seller_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `market`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(10) NOT NULL UNIQUE,
  `name` varchar(255) NOT NULL,
  `description` TEXT,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `boutique_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,

  PRIMARY KEY (`id`),
  FOREIGN KEY (`boutique_id`) REFERENCES `boutiques`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `avis`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uuid` varchar(10) NOT NULL UNIQUE,
    `comment` TEXT,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
);

CREATE TABLE `favorites`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uuid` varchar(10) NOT NULL UNIQUE,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `rating` int(1) NOT NULL,
    
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
);
