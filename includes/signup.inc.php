<?php
if(isset($_POST['keke'])) {

require 'baza.inc.php';
$username=$_POST['user'];
$email=$_POST['mail'];
$password=$_POST['pass'];
$passwordRepeat=$_POST['r-pass'];

 if(empty($username)||empty($email)|| empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&user=".$username."&mail=".$email);
exit();
 }
 else if (!filter_var($email,FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../signup.php?error=invalidmailuser");
    exit();
 }
 elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmails&user=".$username);
    exit();

 }
 elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
    header("Location: ../signup.php?error=invalidusers&mail".$email);
    exit();

 }
 else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passworcheck&id=".$username."&mail=".$email);                       
     exit();

 }
 else {
     $sql="SELECT usersid FROM users WHERE usersid=?";
     $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror1");
        exit();
 }
 else {
     mysqli_stmt_bind_param($stmt, "s",$username);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
     $resultCheck=mysqli_stmt_num_rows($stmt);
     if($resultCheck > 0 ){
         header("Location: ../signup.php?error=usertaken&mail="); 
         exit();
     }
     else {
        $sql="INSERT INTO users (usersid,email,passwordd) VALUES(?,?,?)"; 
        $stmt=mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
     }
     else {
         $hashpass=password_hash($password,PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashpass);
        mysqli_stmt_execute($stmt);
        header("Location: ../signup.php?signup=success");
        exit();

     }

     }
 }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
    header("Location: ../signup.php");
        exit();

}