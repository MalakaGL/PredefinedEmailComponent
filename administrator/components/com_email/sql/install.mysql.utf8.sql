DROP TABLE IF EXISTS `#__email_templates`;

CREATE TABLE `#__email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_title` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_email` varchar(64) DEFAULT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__email_templates`(`email_title`,`email_subject`,`body`,`sender_name`,`sender_email`) VALUES
        ('Registration Confirmation','Registration Confirmation','Your account was successfully registered.','admin','admin@myhost.com'),
        ('Password Renewal','Password was renewed','Your password was successfully changed.','admin','admin@myhost.com'),
        ('Thanking To Donations','Thank you for your donation','Hello friend we received your donation. Thank you very much for your kindness.','admin','admin@myhost.com'),
        ('Login Notification','Login notification','Your account was recently accessed by an unusual access point.','admin','admin@myhost.com'),
        ('Membership Renewal','Reminder to membership renewal','Your membership period is over. Please renew membership.','admin','admin@myhost.com');