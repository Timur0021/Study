<?php
include ('../../path.php');
include ('../controller/post.php');
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
<!--HEADER -->
<?php
include ('../include/header.php');
?>
<!--HEADER-->
<div class="container">
    <?php
    include ('../include/sidebar.php');
    ?>
    <div class="posts col-8">
        <div class="button row">
            <a href="<?php echo BASE_URL . "admin/posts/create.php";?>" class="col-3 btn btn-success">Додати</a>
            <a href="<?php echo BASE_URL . "admin/posts/index.php";?>" class="col-3 btn btn-danger">Керувати</a>
        </div>
        <div class="row row title-table">
            <h2>Створити пост</h2>
        </div>
        <div class="row add-post">
            <form action="create.php" method="post">
                <div class="col mb-4">
                    <input value="<?=$title;?>" name="title" type="text" class="form-control" placeholder="title" aria-label="Назва статті...">
                </div>
                <div class="col">
                    <label  for="editor" class="form-label">Вмст поста...</label>
                    <textarea name="content" id="editor" class="form-control" rows="6"><?=$content;?></textarea>
                </div>
                <div class="input-group col mb-4 mt-4">
                    <input name="img" type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <select name="topic" class="form-select mb-2" aria-label="Default select example">
                    <option selected>Категорії:</option>
                    <?php foreach ($categ as $key => $topic):?>
                        <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                    <?php endforeach;?>
                </select>
                <div class="form-check">
                    <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Publish
                    </label>
                </div>
                <div class="col col-6">
                    <button name="button-post" class="btn btn-info" type="submit">Створити</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- FOOTER -->
<?php
include ('../include/footer.php');
?>
<!-- FOOTER -->



<!-- Optional JavaScript: choose one of the two -->

<!-- Optional 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>



<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
-->
<script src="../../js/scripnt.js"></script>
</body>
</html>

