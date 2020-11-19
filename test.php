<?php
session_start();
$_SESSION['user1'] = 'Ahmad Azri';
$_SESSION['user2'] = 'Abd Razak';

print_r($_SESSION);

unset($_SESSION['user1']);
print_r($_SESSION);