DROP database if exists eCommerceProject;
CREATE DATABASE eCommerceProject default character set utf8;
use eCommerceProject;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(255)  NOT NULL,
  `productAuthor` varchar(100)  NOT NULL,
  `productPrice` decimal(5,2)  NOT NULL,
  `productDescription` varchar(500)  NOT NULL,
  `productImage` varchar(200),
  `productLanguages` varchar(200)  NOT NULL,
  `featured` boolean NOT NULL DEFAULT FALSE,
  `productType` varchar(10) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


GRANT SELECT, INSERT, UPDATE, DELETE ON eCommerceProject.* TO 'eCommerceUser'@'localhost' IDENTIFIED BY 'eCommerce';

INSERT INTO `eCommerceProject`.`products` (`id`, `productName`, `productAuthor`, `productPrice`, `productDescription`, `productImage`, `productLanguages`, `featured`, `productType`, `dateCreated`) VALUES (1, 'Image Uploader', 'Kurtis Funai', 50.00, 'This application will make your wildest dreams come true', 'imageuploader.jpg', 'PHP, JavaScript', true, 'product', '2011-02-07 16:25:46');
INSERT INTO `eCommerceProject`.`products` (`id`, `productName`, `productAuthor`, `productPrice`, `productDescription`, `productImage`, `productLanguages`, `featured`, `productType`, `dateCreated`) VALUES (NULL, 'Development Bundle #1', 'Kurtis Funai', '800', 'Purchase 40 hours of web development and receive the Image Uploader free & installed on your website.', '', 'PHP, JavaScript, HTML, CSS, MySQL', '0', 'bundle', '2011-02-06 23:33:20');
INSERT INTO `eCommerceProject`.`products` (`id`, `productName`, `productAuthor`, `productPrice`, `productDescription`, `productImage`, `productLanguages`, `featured`, `productType`, `dateCreated`) VALUES (NULL, 'Development Bundle #2', 'Kurtis Funai', '200', 'Purchase 10 hours of web development and receive the Image Uploader free & installed on your website.', '', 'PHP, JavaScript, HTML, CSS, MySQL', '0', 'bundle', '2011-02-06 23:31:20');