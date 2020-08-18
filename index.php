<?php include('connexion.php');

/*--------------------------------Requête n°4 : afficher tous les emails qui contiennent le mot « google »--------------------------------*/

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRowsA extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

  $stmt = $conn->prepare("SELECT * FROM `datas` WHERE `email` LIKE '%google%'");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRowsA(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }

echo "</table>";

/*--------------------------------Requête n°6 : mettre à jour l'adresse email de la nouvelle personne--------------------------------*/

  $sql = "UPDATE `datas` SET `email` = 'swilliams@gmail.com' WHERE `first_name` = 'Sara' AND `last_name` = 'Williams'";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";

?>
