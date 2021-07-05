-- table: lưu tiền thành viên để tính doanh thu
CREATE TABLE `membership_fee` (
 `id` int PRIMARY KEY AUTO_INCREMENT,
  `membership_id` int not null,
  `price` float DEFAULT null,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--table: muon sách
CREATE TABLE `borrows` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `customer_id` int not null,
  `status` tinyint not null DEFAULT 1 COMMENT '1-cho duyet 2-da duyet 3-tu choi do het sach/ly do khac',
  `book_isbn` varchar(50) not null,
  `issued_by` int,
  `borrowed_From` datetime,
  `expiration_Date` datetime,
  `return_Date` datetime,
  `note` text,
  `created_at` datetime DEFAULT current_timestamp() ,
  `updated_at` datetime DEFAULT current_timestamp()
);

ALTER TABLE `membership_fee` ADD FOREIGN KEY (`membership_id`) REFERENCES `Membership` (`id`);
ALTER TABLE `borrows` ADD FOREIGN KEY (`book_isbn`) REFERENCES `books` (`isbn`);
ALTER TABLE `borrows` ADD FOREIGN KEY (`customer_id`) REFERENCES `accounts` (`id`);

