<?php 
declare(strict_types=1);

require_once(__DIR__ . '/../utils/Session.php');
require_once(__DIR__ . '/../utils/Request.php');

$session = new Session();
$request = new Request();

if(!$session->isLoggedIn()) die(header('Location: /'));

require_once(__DIR__.'/../database/user.db.php');
require_once(__DIR__.'/../database/connection.db.php');
require_once(__DIR__ . '/../core/User.php');

$db = getDatabaseConnection();

if($request->isPost()) {
    $user = getUser($db, $request->post('username'));
    var_dump($request->post('username'));
    var_dump($user);
    $user->admin_flag = 1;
    updateUser($db,$user);
}

header('Location: ../pages/admin.php?value=users');
exit;