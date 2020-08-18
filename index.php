<?php include('connexion.php');

/*--------------------------------Requête n°5 : Insérer une nouvelle personne dans la liste--------------------------------*/

  $sql = "INSERT INTO `datas`(`first_name`, `last_name`, `email`, `gender`)
          VALUES ('Sara', 'Williams', 'swilliams@icloud.com', 'Female')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";

?>
