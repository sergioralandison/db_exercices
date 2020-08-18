<?php include('connexion.php');

/*--------------------------------Requête n°7 : supprimer la nouvelle personne--------------------------------*/

  // sql to delete a record
  $sql = "DELETE FROM `datas` WHERE `first_name` = 'Sara' AND `last_name` = 'Williams'";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";

?>
