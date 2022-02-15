CREATE TABLE IF NOT EXISTS `users` (
`user_id` INT AUTO_INCREMENT NOT NULL,
`username` varchar(200) NOT NULL,
`password` varchar(200) NOT NULL,
PRIMARY KEY (`user_id`)) 
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO users (username, password) VALUES ('admin', 'admin');