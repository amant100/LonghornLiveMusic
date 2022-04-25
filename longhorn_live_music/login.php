<?php
  session_start();

  ob_start();
  loginPage();
  verifyLogin();

  if (isset($_COOKIE["accessed"])) {
    echo "<script type='text/javascript'>alert('You have already logged in!');</script>";
    header("location:home.html");
  } elseif (isset($_POST["create-account"])) {
    ob_end_clean();
    createAccountPage();
    createAccount();
  }

  function loginPage() {
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<title>Log In</title>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="description" content="Log In">';
    echo '<link rel="stylesheet" href="styles.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '</head>';
    echo '<body>';
    echo '<form method="POST" action="">';
    echo '<h1>Log In</h1>';
    echo '<table style="border-spacing: 0px; width: 0%; float: left;">';
    echo '<tr>';
    echo '<td>Username:</td>';
    echo '<td><input type="text" size="30" name="username"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Password:</td>';
    echo '<td><input type="password" size="30" name="password"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><input type="submit" name="log-in" value="Log In"></td>';
    echo '<td><input type="reset" value="Clear"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><p>Create an account here!</p></td>';
    echo '<td><input type="submit" name="create-account" value="Create Account"></td>';
    echo '</tr>';
    echo '</table>';
    echo '</form>';
    echo '</body>';
    echo '</html>';
  }

  function verifyLogin() {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $account = $username . ":" . $password;

    $_SESSION["username"] = $username;

    $file = fopen("passwd.txt", "r");

    while (!feof($file)) {
      $login = fgets($file);
      if ($account == trim($login)) {
        $_SESSION["verified"] = TRUE;
        setcookie("accessed", $username, time() + 60);
        header("location:home.html");
      }
    }
    fclose($file);
  }

  function createAccountPage() {
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<title>Create An Account</title>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="description" content="Create An Account">';
    echo '<link rel="stylesheet" href="styles.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '</head>';
    echo '<body>';
    echo '<form method="POST" action="">';
    echo '<h1>Create An Account</h1>';
    echo '<table style="border-spacing: 0px; width: 0%; float: left;">';
    echo '<tr>';
    echo '<td>Username:</td>';
    echo '<td><input type="text" size="30" name="createUsername" required></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Password:</td>';
    echo '<td><input type="password" size="30" name="createPassword" required></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Reenter Password:</td>';
    echo '<td><input type="password" size="30" name="passwordReenter" required></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><input type="submit" value="Create Account"></td>';
    echo '<td><input type="reset" value="Clear"></td>';
    echo '</tr>';
    echo '</table>';
    echo '</form>';
    echo '</body>';
    echo '</html>';
  }

  function createAccount() {
    $file = fopen("passwd.txt", "a");

    $newUsername = $_POST["createUsername"];
    $newPassword = $_POST["createPassword"];

    $entry = $newUsername . ":" . $newPassword . "\n";

    if ($newPassword == $_POST["passwordReenter"]) {
      fwrite($file, $entry); 
    }
 
    fclose($file);  
  }
?>