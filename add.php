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
    <?php 
        require('navbar.php'); 
        
        //Controller
        if (isset($_GET['action'])){
            if ($_GET['action'] == 'add') {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $fileName = '';
                if ($_FILES['image']['tmp_name'] != '') {
                    $fileName = str_replace(' ', '', $_FILES['image']['name']);
                    copy($_FILES['image']['tmp_name'], "images/".$fileName);
                }

                try {
                    $connection = dbConnection();


                    // prepare sql and bind parameters
                    $stmt = $connection->prepare("INSERT INTO game (Name, Description, Price, Image)
                    VALUES (:name, :description, :price, :image)");
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':image', $fileName);

                    $stmt->execute();
                }
                catch (PDOException $e){
                    echo "Error: " . $e->getMessage();
                }
            }
        }
    ?>

    <h1 class="text-center my-5">Ajouter un jeu</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?action=add';?>" method="POST" enctype="multipart/form-data">
                    <label for="name">Nom</label>
                    <input class="form-control mb-1" name="name" type="text" id="name" required>
                    <label for="description">Description</label>
                    <input class="form-control mb-1" name="description" type="text" id="description" required>
                    <label for="price">Prix</label> 
                    <input class="form-control mb-1" name="price" type="number" id="price" required>
                    <label for="image">Image</label>
                    <input class="form-control mb-1" name="image" type="file" id="image">
                    <input class="btn btn-success mb-1" type="submit" value="Valider">
                </form>
            </div>
        </div>
    </div>
</body>
</html>