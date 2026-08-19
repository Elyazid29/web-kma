<?php
require_once __DIR__ . '/auth_config.php';
logoutUser();
header('Location: login.php');
exit;