-- =========================================
-- DATABASE: crud_db (UPDATED WITH INVENTORY)
-- =========================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- =========================================
-- USERS TABLE (ADMIN ONLY)
-- =========================================
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(36) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'admin',
  `status` varchar(50) DEFAULT 'Active',
  `name` varchar(255) DEFAULT 'Administrator',
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB;

-- INSERT DEFAULT ADMIN USER
INSERT INTO `users` (`email`, `password`, `role`, `status`, `name`)
VALUES (
  'admin@gmail.com',
  '$2y$10$aitqcz/yYmTPfmMGbMbnXuGEdwNG63RI1qbTF9IM0cg5SrUg4P/iu',
  'admin',
  'Active',
  'System Admin'
);

-- =========================================
-- LOGIN ATTEMPTS
-- =========================================
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `attempt_time` datetime NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- =========================================
-- SYSTEM LOGS
-- =========================================
CREATE TABLE IF NOT EXISTS `tbl_logs` (
  `LOGID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` varchar(30),
  `ACTION` text,
  `DATELOG` varchar(30),
  `TIMELOG` varchar(30),
  `user_ip_address` text,
  `device_used` text,
  `USER_NAME` varchar(100),
  `identifier` varchar(100),
  PRIMARY KEY (`LOGID`)
) ENGINE=InnoDB;

-- =========================================
-- INVENTORY TABLES
-- =========================================

-- CATEGORIES
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- PRODUCTS
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text,
  `sku` varchar(50) UNIQUE,
  `category_id` int(11),
  `price` decimal(10,2) DEFAULT 0.00,
  `stock` int(11) DEFAULT 0,
  `created_by` int(11),
  `created_at` timestamp DEFAULT current_timestamp(),
  `updated_at` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- SUPPLIERS
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150),
  `contact_person` varchar(100),
  `phone` varchar(20),
  `email` varchar(100),
  `address` text,
  `created_at` timestamp DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- PURCHASES (STOCK IN)
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11),
  `total_amount` decimal(10,2),
  `purchase_date` date,
  `created_by` int(11),
  `created_at` timestamp DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- PURCHASE ITEMS
CREATE TABLE `purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11),
  `product_id` int(11),
  `quantity` int(11),
  `price` decimal(10,2),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`purchase_id`) REFERENCES `purchases`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- SALES (STOCK OUT)
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` decimal(10,2),
  `sale_date` date,
  `created_by` int(11),
  `created_at` timestamp DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- SALE ITEMS
CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11),
  `product_id` int(11),
  `quantity` int(11),
  `price` decimal(10,2),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sale_id`) REFERENCES `sales`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- INVENTORY LOGS
CREATE TABLE `inventory_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11),
  `type` ENUM('IN','OUT'),
  `quantity` int(11),
  `reference_id` int(11),
  `reference_type` varchar(50),
  `created_by` int(11),
  `created_at` timestamp DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

COMMIT;