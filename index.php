<?php include('connexion.php');

/*--------------------------------Requête n°5 : Insérer une nouvelle personne dans la liste--------------------------------*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_exercices";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `datas`(`first_name`, `last_name`, `email`, `gender`)
          VALUES ('Sara', 'Williams', 'swilliams@icloud.com', 'Female')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
