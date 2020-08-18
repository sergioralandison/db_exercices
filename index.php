<?php include('connexion.php');

/*--------------------------------Requête n°2 : afficher toutes les femmes (et uniquement les femmes)--------------------------------*/

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

$stmt = $conn->prepare("SELECT * FROM `datas` WHERE `gender` = 'Female'");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRowsA(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

/*--------------------------------Requête n°8 : afficher le nombre de femmes et le nombre d’hommes--------------------------------*/

class TableRowsB extends RecursiveIteratorIterator {
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

$stmt = $conn->prepare("SELECT
                        (SELECT COUNT(*) FROM `datas` WHERE `gender` = 'Male'),
                        (SELECT COUNT(*) FROM `datas` WHERE `gender` = 'Female')");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRowsB(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
  echo $v;
}

echo "</table>";

?>
