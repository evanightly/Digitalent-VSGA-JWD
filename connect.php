<?php
define('host', 'localhost');
define('database', 'digitalent_vsga_jwd');
define('username', 'root');
define('password', '');
$mysqli = mysqli_connect(host, username, password, database) or die('database connection failed');
