<?php
if(isset($_POST['loginn'])){
    require 'baza.inc.php';
    $mail = $_POST['maill'];
    $password = $_POST['passs'];
    if(empty($mail)||empty($password)){
        header("Location:..//index.php?error=emptyfields");
        exit();
    }
  


else {
    $sql="SELECT * FROM users WHERE usersid=? OR email=?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location:..//index.php?error=sqlerror");
    exit();
    }
else {
    mysqli_stmt_bind_param($stmt,"ss", $mail,$mail);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($result)){
        $pwdCheck=password_verify($password,$row['passwordd']);
        if($pwdCheck==false) {
            header("Location:../index.php?error=wrongpwd");
            exit();

        }
        else if($pwdCheck==true) 
            session_start();
            $_SESSION['usersid']=$row['id'];
            $_SESSION['userUid']=$row['usersid'];
            header("Location:../index.php?error=success");
            exit();
        }
        else{
            header("Location:../index.php?error=nouser");
       exit();
        
}
}

}
}


