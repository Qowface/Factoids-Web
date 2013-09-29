<?php

class DBHandler
{
  public function connect($_)
  {
    try {
      $pdo = new PDO('mysql:host=' . $_['host'] . ';dbname=' . $_['name'], $_['user'], $_['pass']);
      //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //For debugging ONLY!
    } catch(PDOException $e) {
      die('Error: ' . $e->getMessage());
    }
    return $pdo;
  }
  
  public function getFactoids($_)
  {
    $pdo = self::connect($_);
    $stmt = $pdo->query('SELECT id, title, factoid FROM factoids ORDER BY id ASC;');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt;
  }
}

?>
