<?php

session_start();

$_SESSION['name'] = 'First Last';
$_SESSION['user_id'] = 3;

echo '<h1>Session Set</h1>';