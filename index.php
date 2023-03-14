<?php
    require('connect.php');
    require('function.lib.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Game Site</title>
</head>
<body>

<?php require('navbar.php'); ?>

    <h1 class="text-center my-5">Game Site</h1>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto d-flex flex-wrap justify-content-center">
                <?php showAll(); ?>
            </div>
        </div>
    </div>
</html>