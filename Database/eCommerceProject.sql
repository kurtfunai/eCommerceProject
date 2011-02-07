DROP database if exists eCommerceProject;
CREATE DATABASE eCommerceProject default character set utf8;
use eCommerceProject;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(255),
  `productPrice` decimal(5,2),
  `productDescription` varchar(500),
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


GRANT SELECT, INSERT, UPDATE, DELETE ON eCommerceProject.* TO 'eCommerceUser'@'localhost' IDENTIFIED BY 'eCommerce';

INSERT INTO `products` (`id`, `productName`, `productPrice`, `productDescription`, `dateCreated`) VALUES (1, 'Image Uploader', 15.00, 'This application will make your wildest dreams come true','2011-02-07 16:25:46');