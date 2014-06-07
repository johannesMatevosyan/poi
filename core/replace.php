<?php
include_once 'CRUD.php';

$db = new CRUD('users');
echo is_object($db->replace($_GET));
