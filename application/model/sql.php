<?
class sql_model 
{

	public function get_100 ()
	{
		$config = config::get('db');

		try {
			$pdo = new pdo("{$config['default']['driver']}:dbname={$config['default']['database']};host={$config['default']['host']}",$config['default']['username'],$config['default']['password']);
		} catch(PDOException $e) {
			dingo_error(E_USER_ERROR,'DB Connection Failed. '.$e->getMessage());
		}

		# Build Schema
		# ------------------------------------------------------------
		$build = $pdo->exec( "CREATE TABLE IF NOT EXISTS `options` (
								  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
								  `key` varchar(64) NOT NULL DEFAULT '',
								  `value` longtext NOT NULL,
								  `autoload` varchar(20) NOT NULL,
								  PRIMARY KEY (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=utf8" );


		$build = $pdo->exec( "CREATE TABLE IF NOT EXISTS `sessions` (
								  `name` varchar(25) NOT NULL,
								  `cookie` varchar(25) NOT NULL,
								  `value` text NOT NULL,
								  `expire` int(11) NOT NULL
								) ENGINE=MyISAM DEFAULT CHARSET=utf8" );


		$build = $pdo->exec( "CREATE TABLE `term_relationships` (
								  `page_id` bigint(20) unsigned NOT NULL DEFAULT '0',
								  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
								  `term_order` int(11) DEFAULT NULL,
								  PRIMARY KEY (`page_id`,`term_id`),
								  KEY `term_id` (`term_id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;" );


		$build = $pdo->exec( "CREATE TABLE IF NOT EXISTS `term_taxonomy` (
								  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
								  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
								  `taxonomy` varchar(32) NOT NULL DEFAULT '',
								  `description` longtext NOT NULL,
								  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
								  `count` int(11) NOT NULL,
								  PRIMARY KEY (`id`),
								  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
								  KEY `taxonomy` (`taxonomy`)
								) ENGINE=MyISAM  DEFAULT CHARSET=utf8" );
							  

		$build = $pdo->exec( "CREATE TABLE IF NOT EXISTS `terms` (
								  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
								  `name` varchar(40) NOT NULL DEFAULT '',
								  `slug` varchar(40) NOT NULL DEFAULT '',
								  PRIMARY KEY (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=utf8" );


		$build = $pdo->exec( "CREATE TABLE IF NOT EXISTS `users` (
								  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
								  `email` varchar(100) NOT NULL DEFAULT '',
								  `username` varchar(60) NOT NULL DEFAULT '',
								  `password` varchar(64) NOT NULL DEFAULT '',
								  `type` varchar(25) DEFAULT NULL,
								  `data` text,
								  `registered` int(11) NOT NULL DEFAULT '0',
								  `status` int(11) NOT NULL DEFAULT '0',
								  PRIMARY KEY (`id`)
								) ENGINE=MyISAM  DEFAULT CHARSET=utf8" );
								
								
		# Build Data
		# ------------------------------------------------------------
		$build = $pdo->exec( "INSERT INTO `terms` (`id`, `name`, `slug`)
									VALUES
										(1,'Default','default'),
										(2,'Design','design'),
										(3,'Category','category'),
										(4,'Books','books'),
										(5,'Music','music'),
										(6,'Bikes','bikes')" );


		$build = $pdo->exec( "INSERT INTO `term_taxonomy` (`id`, `term_id`, `taxonomy`, `description`, `parent`, `count`)
									VALUES
										(1,1,'category','',0,0),
										(2,2,'category','',0,0),
										(3,3,'category','',0,0),
										(4,4,'category','',0,0),
										(5,5,'category','',0,0),
										(6,5,'category','',0,0)" );

		# Options
		# ------------------------------------------------------------
		$build = $pdo->exec( "INSERT INTO `options` (`id`, `key`, `value`, `autoload`)
									VALUES
										(1, 'appearance', 'default', 'yes'),
										(2, 'blogname', 'Tentacle CMS', 'yes'),
										(3, 'blogdescription', 'Just another tentacle in the sea.', 'yes'),
										(4, 'siteurl', '', 'yes'),
										(5, 'admin_email', 'admin@email.com', 'yes'),
										(6, 'image_thumb_size_w', '150', 'yes'),
										(7, 'image_medium_size_w', '300', 'yes'),
										(8, 'image_medium_size_h', '300', 'yes'),
										(9, 'image_large_size_w', '600', 'yes'),
										(10, 'image_large_size_h', '600', 'yes'),
										(11, 'image_thumb_size_h', '150', 'yes'),
										(12, 'db_version', '100', 'yes')" );
	}
	
	public function set_db ( $version )
	{
		$config = config::get('db');
		
		try {
			$pdo = new pdo("{$config['default']['driver']}:dbname={$config['default']['database']};host={$config['default']['host']}",$config['default']['username'],$config['default']['password']);
		} catch(PDOException $e) {
			dingo_error(E_USER_ERROR,'DB Connection Failed. '.$e->getMessage());
		}
		
		$build = $pdo->exec( "UPDATE  `options` SET  `value` =  '{$version}' WHERE  `options`.`key` ='db_version';" );
	}
}