<?php
require_once 'dao.php';
class userDao extends dao {
  function createUser($name, $username, $password) {
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare("INSERT INTO users (name, username, password) VALUES (:name, :username, :password);");
    $val = $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $val = $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $val = $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $val = $stmt->execute();
    $error = $stmt->errorInfo();
    $x = 4;
  }
}