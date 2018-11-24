<?php
session_start();
?>

<!DOCTYPE html>
<?php
$cookie_name = 'user';
$cookie_value = 'John Doe';
setcookie($cookie_name, $cookie_value, time() + 86400 * 30, '/');
?>
<html>
<body>

<?php

$_SESSION['favcolor'] = 'red';
$_SESSION['favpet'] = 'cat';
echo "<p>Session variables are set</p>";
echo "<a href='page1.php'>Page 1</a><hr>";

if(isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is set!<br>";
  echo "Value is '" . $_COOKIE[$cookie_name] . "'.";
} else {
  echo "Cookie named '" . $cookie_name . "' is not set!";
}

$email = '';
$emailErr = '';

if ($_POST) {
  $email = input_test($_POST['email']);
  if (empty($email)) {
    $emailErr = 'field is required';
  }
}

if ($_GET) {
  echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
}

function input_test($data) {
  $data = trim($data);
  $data = str_replace('\\', '', $data);
  $data = str_replace('//', '', $data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  Email: <input type="text" name="email" value="<?php echo $email ?>">
  <input type="submit">
  <span><?php echo $emailErr ?></span>
</form>

<p>
  <a href="index.php?subject=PHP&web=W3schools.com">Test $GET</a>
</p>

<?php
// fopen('textfile.txt', 'w');
if (!empty($email)) {
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo $email . ' is not a valid email.';
  } else {
    echo $email . ' is a valid email.';
  }
}
?>

<hr>
<?php
function customError($errno, $errstr) {
  echo "<strong>Error:</strong> [$errno] $errstr";
  // error_log("Error: [$errno] $errstr",1,"rodrake@gmail.com","From: rodrigo@fluxoempreendedor.com");
}

set_error_handler('customError');

echo $test;
?>

<hr>
<?php
$servername = "localhost";
$username = "root";
$password = "test";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE myW3SchoolsDb";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

</body>
</html>