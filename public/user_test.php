<?php

require_once '../Model.php';
require_once '../User.php';

$user = new User();
$user->first_name='Gaston';
$user->last_name='Lenotre';
$user->email_address='67lenotre@cua.edu';
$user->save();
var_dump($user);

$firstUser = User::find(1);

echo $firstUser->id;
echo $firstUser->id;

$firstUser->first_name='Bobby';
$firstUser->save();