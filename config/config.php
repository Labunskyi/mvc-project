<?php

Config::set('site_name', 'Books');

Config::set('routes', array(
	'default' => '',
	'admin' => 'admin_',
));

Config::set('default_route', 'default');

Config::set('default_controller', 'books');

Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'v50425oh_db');
Config::set('db.password', '637102');
Config::set('db.db_name', 'v50425oh_db');

Config::set('salt', 'wqjd34liewj834jjnd');