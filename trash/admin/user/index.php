<?php
include ('../../path.php');
include ('../controller/users.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!--  REQUIRED META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> project </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/681833e5f2.js" crossorigin="anonymous"></script>
    <!-- Custom styling -->
    <link rel="stylesheet" href="../../style/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Rubik+Dirt&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
<?php
include ('../include/sidebar.php');
?>
        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/user/index.php";?>" class="col-3 btn btn-danger">Керувати</a>
            </div>
            <div class="row title-table">
                <h2>Користувачі</h2>
                <div class="id col-1">ID</div>
                <div class="title col-2">Логін</div>
                <div class="title col-4">Емейл</div>
                <div class="author col-2">Роль</div>
                <div class="author col-3">Керувати</div>

            </div>
            <?php foreach ($users as $key => $user):?>
            <div class="row post">
                <div class="col-1"><?=$user['id'];?></div>
                <div class="col-2"><?=$user['username'];?></div>
                <div class="col-4"><?=$user['email'];?></div>
                <?php if ($user['admin'] == 1):?>
                <div class="col-2">Admin</div>
                <?php else:?>
                <div class="col-2">User</div>
                <?php endif;?>
                <div class="col-2"><a href="index.php?delete_id=<?=$user['id'];?>">delete</a></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>




<!-- Optional JavaScript: choose one of the two -->

<!-- Optional 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>




<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
-->
</body>
</html>
