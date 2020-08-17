<?php include('connexion.php');

/*--------------------------------Requête n°7 : supprimer la nouvelle personne--------------------------------*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_exercices";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = "DELETE FROM `datas` WHERE `first_name` = 'Sara' AND `last_name` = 'Williams'";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
