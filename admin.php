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
            if ($_GET['action'] == 'delete' && isset($_GET['gameid'])) {
                $id = $_GET['gameid'];

                // $connection = dbConnection();

                //     // prepare sql and bind parameters
                //     $stmt = $connection->prepare("DELETE  from geame WHERE Id = :id");
                //     $stmt->bindParam(':id', $id);
                // print $id;

                    // $stmt->execute();
                try {
                    $pdo = dbConnection();

                    $sql = "DELETE FROM game WHERE id=?";
                    $stmt= $pdo->prepare($sql);
                    $res = $stmt->execute([$id]);

                    if ($res) {
                        print '<div class="alert alert-success" role="alert">
                        Supprimé !
                      </div>';
                    }
                }
                catch (PDOException $e){
                    echo "<div class='alert alert-danger' role='alert'>
                    error : ".$e->getMessage()."
                  </div>: ";
                }
            }
        }
    ?>

    <h1 class="text-center my-5">Admin</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>

                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jeux = getAll();
                        // print_r($jeux);
                        foreach ($jeux as $jeu) {
                            $jeu = (object)$jeu;
                            print "<tr>
                            <th scope='row'>$jeu->Id</th>
                            <td>$jeu->Name</td>
                            <td>$jeu->Description</td>
                            <td>$jeu->Price €</td>

                            <td><button class='btn btn-sm btn-warning'>Modifier</button></td>
                            <td><a href='admin.php?action=delete&gameid=$jeu->Id' class='btn btn-sm btn-danger'>Supprimer</a></td>
                            </tr>";
                        }

                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>