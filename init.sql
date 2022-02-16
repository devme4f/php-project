CREATE TABLE IF NOT EXISTS `users` (
`user_id` INT AUTO_INCREMENT NOT NULL,
`username` varchar(60) NOT NULL,
`password` varchar(60) NOT NULL,
`secret` varchar(20), # secret add sau directory chứa file của user(authorization 1 tí) - update next version!!
PRIMARY KEY (`user_id`)) 
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO users (username, password) VALUES ('admin', 'admin');