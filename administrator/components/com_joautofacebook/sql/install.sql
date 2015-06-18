DROP TABLE IF EXISTS `#__joat_settings`;
CREATE TABLE `#__joat_settings` (
  `key` varchar(255) NOT NULL,
  `value` longtext,
  PRIMARY KEY  (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#__joat_settings` (`key`, `value`) VALUES
('limitcharacted', '300'),
('shorturl', '1');
	
DROP TABLE IF EXISTS `#__joat_accounts`;
CREATE TABLE `#__joat_accounts` (
  `id` int(11) NOT NULL auto_increment,
  `app_id` varchar(255) NOT NULL,
  `app_secret` varchar(255) NOT NULL,
  `facebook_name` varchar(255) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `accesstoken` text NOT NULL,
  `post_to_page` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `created` date NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__joat_postmanager`;
CREATE TABLE `#__joat_postmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_published` datetime NOT NULL,
  `post_to` text NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
