<?php
require "header.php";
?>
<main>
<p>
<?php
if(isset($_SESSION['usersid'])){
    echo '<p>You are logged in!</p>';
}
else {
    echo '<p>You are logged out!</p>';
}


?>

</p>

</main>

<?php
require "footer.php";
?>
