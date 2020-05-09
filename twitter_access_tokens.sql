CREATE TABLE `twitter_access_tokens` (
  `no` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `oauth_token` varchar(100) NOT NULL,
  `oauth_token_secret` varchar(100) NOT NULL,
  PRIMARY KEY  (`no`),
  KEY `id` (`id`,`username`,`oauth_token`,`oauth_token_secret`),
  KEY `username` (`username`,`oauth_token`,`oauth_token_secret`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;