<?php include('connexion.php');

/*--------------------------------Requête n°5 : Insérer une nouvelle personne dans la liste--------------------------------*/

  $sql = "INSERT INTO `datas_2`(`name`, `lastname`, `birth_date`)
          VALUES ('John', 'Doe', 2000-08-18)";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";

?>
