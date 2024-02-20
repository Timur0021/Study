<?php
include SITE_ROOT . '/srt/controller/db.php';
if(!$_SESSION){
    header('location: ' . BASE_URL . 'log.php');
}

$errmsg = '';
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';
$categ = selectAll('categ');
$postsAdm = selectAllFromPost('posts', 'users');
//Код для створення категорій
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-post'])) {

    if(!empty($_FILES['img']['name'])){
        $imagname = $_FILES['img']['name'];
        $filetmp = $_FILES['img']['tmp_name'];
        $way = ROOT_PATH . '/images/foto/' . $imagname;

            $result = move_uploaded_file($filetmp, $way);
            if ($result) {
                $_POST['img'] = $imagname;
            } else {
                $errmsg = 'Помилка картинка не загрузилась на сервер!';
            }
    }else{
        $errmsg = 'Помилка отримання фото!';
    }



    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = trim($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        $errmsg = 'Не всі поля заповнені!';
    }elseif(mb_strlen($title, 'UTF8') < 2){
        $errmsg = 'Назва статі повина бути більшим ніж два символи!';
    }else{
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'id_topic' => $topic


            ];

            $post = insert('posts', $post);
            $post = selectOne('posts', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }
}else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic =  '';
}

//Редагувати поста

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-edit'])){
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = trim($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        $errmsg = 'Не всі поля заповнені!';
    }elseif(mb_strlen($title, 'UTF8') < 2){
        $errmsg = 'Назва статі повина бути більшим ніж два символи!';
    }else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic


        ];

        $post = update('posts', $id, $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
}else{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish = isset($_POST['publish']) ? 1 : 0;
    $topic =  $_POST['id_topic'];
}

//Керування блогами publish and unpublish
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['public_id'])){
    $id = $_GET['public_id'];
    $publish = $_GET['publish'];

    $postid = update('posts', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}

//Видалити поста

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');

}