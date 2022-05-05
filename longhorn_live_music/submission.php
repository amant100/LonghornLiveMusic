<?php
  error_reporting(E_ALL);
  ini_set("display_errors", "on");

  $server = "spring-2022.cs.utexas.edu";
  $user = "cs329e_bulko_reyap";
  $pwd = "Farce-Idea=Duel";
  $dbName = "cs329e_bulko_reyap";
  $mysqli = new mysqli($server, $user, $pwd, $dbName);
  if ($mysqli->connect_errno) {
    die("Connect Error: " . $mysqli->connect_errno . ": " . $mysqli->connect_error);
  }
  $mysqli->select_db($dbName) or die($mysqli->error);

  $content            = $_GET["content"];
  $contributor_name   = $_GET["contributor_name"];
  $source             = $_GET["source"];

  $query = "INSERT INTO submissions (content, contributor_name, source) VALUES ('$content', '$contributor_name', '$source')";
  $mysqli->query($query) or die($mysqli->error);
  echo "Thank you for your fact!";
  mysqli_close($mysqli);
?>
