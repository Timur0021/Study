<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Links -->
    <title>TEST</title>
</head>
<body style="background-color: silver;">
    <div class="container" style="display:flex;justify-content:center;padding:15rem 10rem;margin-top:10rem;;background-color:white;box-sizing:border-box;border-radius:10px;">
        
        <form method="POST">
            <h1 style="text-align:center;">
                Логін
            </h1>
            <hr>
            <span class="success">
                Ви спробували залогінитись під емейлом:<br> <?= $_POST['email']?>
            </span>
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
    </div>
</body>
</html>