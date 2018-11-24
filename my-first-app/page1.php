<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
print_r($_SESSION);
echo "<p>My favorite color is: " . $_SESSION['favcolor'] . "</p>";
echo "<P>My favorite pet is: " . $_SESSION['favpet'] . "</p>";
?>

</body>
</html>