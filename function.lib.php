<?php

function showAll()
{
    $connection = dbConnection();
    $sql = "select * from game";
    $query = $connection->prepare($sql);
    $query->execute();
    $res = $query->fetchAll();
    // print_r($res);

    // print '<div class="col-md-4">';
    foreach ($res as $jeu){
        print '<div class="card m-2" style="width: 18rem;">';
        if ($jeu['Image']) {print '<img src=images/'.$jeu['Image'].' class="card-img-top" alt="...">';}
        print '<div class="card-body">
          <h5 class="card-title">'.$jeu['Name'].'</h5>
          <p class="card-text">'.$jeu['Description'].'</p>
          <p class="card-text font-weight-bold">'.$jeu['Price'].' €</p>
        </div>
      </div>';
    }
    // print '</div>';
}

function getAll() {
  $connection = dbConnection();
    $sql = "select * from game";
    $query = $connection->prepare($sql);
    $query->execute();
    $res = $query->fetchAll();

    return $res;
}

function getById($id) {
  $connection = dbConnection();
    $sql = "select * from game where Id=?";
    $query = $connection->prepare($sql);
    $query->execute([$id]);
    $res = $query->fetch();

    return $res;
}