<?php

// $server = "spring-2022.cs.utexas.edu";
// $user = "cs329e_bulko_reyap";
// $pwd = "Farce-Idea=Duel";
// $dbName = "cs329e_bulko_reyap";
// $mysqli = new mysqli($server, $user, $pwd, $dbName);

// if ($mysqli->connect_errno) {
//   die("Connect Error: " . $mysqli->connect_errno . ": " . $mysqli->connect_error);
// }
echo '<script type="text/javascript">alert("Your grade is 5/6");</script>';

echo "<script type='text/javascript'>alert('Thank trgfdbsfgdyou for your post!');</script>";
if (isset($_POST["content"]) and isset($_POST["name"]) and isset($_POST["source"])) {
    $content = $_POST["content"];
    $name = $_POST["name"];
    $source = $_POST["source"];

    $query = "INSERT INTO submissions VALUES ('$content', '$name', '$source')";
    echo $query;
    echo "<script type='text/javascript'>alert('Thank trgfdbsfgdyou for your post!');</script>";
    // // Make the messages show up with AJAX
    // if (mysqli_query($mysqli, $query)) {
    //     echo "<script type='text/javascript'>alert('Thank you for your post!');</script>";
    //     // echo "Thank you for your post!";
    // } else {
    //     //echo "<script type='text/javascript'>alert('"Error: " . $sql . mysqli_error($mysqli)');</script>";
    //     // echo "Error: " . $sql . mysqli_error($mysqli);
    // }
    // mysqli_close($mysqli);
}

?>
