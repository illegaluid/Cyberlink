<?php

declare(strict_types=1);

if (isset($_POST['deletePost'])) {
  $pdo = new PDO('sqlite:../includes/databas.sql');
  $linkId = filter_var($_POST['deletePost'], FILTER_SANITIZE_STRING);
  $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');
  $statement->bindParam(':id', $linkId, PDO::PARAM_INT);
  $statement->execute();

  // if (!$statement) {
  //     die(var_dump($pdo->errorInfo()));
  //   }

  header('Location: ../feed.php');
}
