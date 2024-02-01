<?php
include SITE_ROOT . '/src/controller/db.php';


$errmsg = '';

function usersout($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if ($_SESSION['admin']){
        header('location: ' . BASE_URL . "admin/posts/index.php");
    }else{
        header('location: ' . BASE_URL);
    }
}

$users = selectAll('users');
//Код для форми реєстрації
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-create'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''){
        $errmsg = 'Не всі поля заповнені!';
    }elseif(mb_strlen($login, 'UTF8') < 2){
      $errmsg = 'Логін повинен бути більшим ніж два символи!';
    }elseif($passF !== $passS){
        $errmsg = 'Паролі в обох полях повинні бути однаковими!';
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if(!empty($existence)){
           $errmsg = 'Користувач з такою поштою вже зареєстрований!';
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin =1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            usersout($user);
        }
    }
}else{
    $login = '';
    $email = '';
}