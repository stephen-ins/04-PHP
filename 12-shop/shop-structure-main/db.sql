CREATE DATABASE IF NOT EXISTS shop;

USE shop;

CREATE TABLE `user` (
  id_user int(11) NOT NULL AUTO_INCREMENT,
  password VARCHAR(255) NOT NULL,
  firstName VARCHAR(255) NOT NULL,
  lastName VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  zipcode int(5) UNSIGNED ZEROFILL NOT NULL,
  address VARCHAR(255) NOT NULL,
  roles VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `product` (
  id_product int(11) NOT NULL AUTO_INCREMENT,
  reference VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  description LONGTEXT NOT NULL,
  color VARCHAR(255) NOT NULL,
  size VARCHAR(5) NOT NULL,
  public enum('homme','femme','mixte') NOT NULL,
  picture VARCHAR(250) DEFAULT NULL,
  price NUMERIC(5, 5) NOT NULL,
  stock INT(5) NOT NULL,
  PRIMARY KEY (id_product)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `order` (
  id_order INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  rising NUMERIC(5, 5) NOT NULL,
  date DATETIME NOT NULL,
  state ENUM('treatment','sent','delivered') NOT NULL,
  PRIMARY KEY (id_order),
  INDEX (user_id),
  FOREIGN KEY(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `order` ADD CONSTRAINT FK_UserOrder FOREIGN KEY (user_id) REFERENCES user(id_user) ON UPDATE RESTRICT ON DELETE RESTRICT;

CREATE TABLE `order_details` (
  id_order_details INT(11) NOT NULL AUTO_INCREMENT,
  order_id INT(11) NOT NULL,
  product_id int(11) DEFAULT NULL,
  quantity INT(3) NOT NULL,
  price NUMERIC(5, 5) NOT NULL,
  PRIMARY KEY (id_order_details),
  INDEX (order_id, product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `order_details` ADD CONSTRAINT FK_OrderDetails FOREIGN KEY (order_id) REFERENCES `order`(id_order) ON UPDATE RESTRICT ON DELETE RESTRICT;

ALTER TABLE `order_details` ADD CONSTRAINT FK_ProductDetails FOREIGN KEY (product_id) REFERENCES product(id_product) ON UPDATE SET NULL ON DELETE SET NULL;

CREATE TABLE `testimonial` (
  id_testimonial int(11) NOT NULL AUTO_INCREMENT,
  message LONGTEXT NOT NULL,
  date DATETIME NOT NULL,
  PRIMARY KEY (id_testimonial)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `contact` (
  id_contact int(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message LONGTEXT NOT NULL,
  date DATETIME NOT NULL,
  PRIMARY KEY (id_contact)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;