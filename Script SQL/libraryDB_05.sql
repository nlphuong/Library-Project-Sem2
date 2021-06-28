-- table: gói thành viên và phí phạt
CREATE TABLE `Membership` (
 `id` int PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int not null,
  `start_date` datetime DEFAULT null,
  `expiration_Date` datetime DEFAULT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-cho thanh toan 2-kich hoat',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE TABLE `penalty_fee` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int not null,
  `book_isbn` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `Membership` ADD FOREIGN KEY (`customer_id`) REFERENCES `Accounts` (`id`);

ALTER TABLE `penalty_fee` ADD FOREIGN KEY (`book_isbn`) REFERENCES `Books` (`isbn`);

ALTER TABLE `penalty_fee` ADD FOREIGN KEY (`customer_id`) REFERENCES `Accounts` (`id`);
