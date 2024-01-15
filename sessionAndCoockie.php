<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SessionAndCoockie</title>
</head>
<body style="background-color: silver;">
    <div class="container" style="display:flex;justify-content:center;padding:15rem 10rem;margin-top:10rem;;background-color:white;box-sizing:border-box;border-radius:10px;">
        
        <form method="POST">
            <h1 style="text-align:center;">
                Логін
            </h1>
            <hr> 
            
            <?php 
                if (!empty($_POST)) { 
                    if (empty($_SESSION['user'])) { 
                        $_SESSION['user'] = [];
                    }
                    $_SESSION['is_auth'] = true;
                    $countUser = count($_SESSION['user'] );
                    $_SESSION['is_auth'] = $countUser;
                    $_SESSION['user'][$countUser] = [
                        'email' => $_POST['email'],
                        'password' => $_POST['password']
                    ];
            ?>
                <div class="alert alert-success" role="alert">
                    Ви спробували залогінитись під емейлом: <?= $_POST['email'];?>
                </div>
            <?php } ?>
            <?php
            if (![$_SESSION['is_auth'] ?? false]):
            ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
            else:
        ?>
        <h1>You registred:
        <span style="background-color: gray;color: #fff;">
            <?=
            $_SESSION['user'][$_SESSION['is_auth']]['email'];
            ?>
        </span>
        <a href="logout.php">Log out</a>
        </h1>

        <form method="POST">
            <hr> 
            <?php 
            var_dump($_SESSION);
            ?>
            
                <div class="alert alert-success" role="alert">
                    Ви спробували залогінитись під емейлом: <?= $_POST['email'];?>
                </div>
          
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
            endif; 
        ?>
    </div>
</body>
</html>