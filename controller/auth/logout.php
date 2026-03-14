<?php

require_once '../../classes/db.php';
require_once '../../classes/auth.php';
$auth = new Auth();
$auth->logout();
header("Location: /fabdul/auth/login.php");
exit();