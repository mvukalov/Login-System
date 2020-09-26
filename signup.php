<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    
    <link rel="stylesheet"  type="text/css" href="boot.css">
    <link rel="stylesheet"  type="text/css" href="css.css">
    <style>
.btn1{
  border:none;
  outline:none;
  height:50px;
  width:300px;
  background-color:black;
  color:white;
  border-radius:4px;
}
  .btn1:hover{
    background: white;
    border:1px solid;
    color:black;


  }
}
h4{
 text-align:left;
}





</style>

</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<br>


</form>
</div>



</header>
</body>


<main>
<?php
if(isset($_GET['error'])){
    if($_GET['error']=="emptyfields") {
       echo '<p class="signuperror">Fill in all fields!</p>';
    }
    else if($_GET["error"]=="invalidmailuser") {
        echo '<p class="signuperror">invalid mail and user</p>';
        
    }
    else if($_GET["error"]=="invalidmails") {
        echo '<p class="signuperror">krivi mail</p>';
        
    }
    else if($_GET["error"]=="invalidusers") {
        echo '<p class="signuperror">Fill in all fields!</p>';
        
    }
  else if($_GET['error']=="passworcheck") {
    echo '<p class="signuperror">your password repeeta isnt the same</p>';
        
    }
   
}
 if(isset($_GET['signup'])) {
    if($_GET['signup']=="success") {
    echo '<p class="signuperror">success!</p>';
 }

}
?>


    
  
    <div class="login">
    <div class="form">
    <h4> Register</h4> <br>
    <form action="includes/signup.inc.php" style="width:300px; margin-auto;" method="post">
<input type="text" name="user" class="form-control" placeholder="Username">
<input type="text" name="mail" class="form-control" placeholder="Email">
<input type="password" name="pass" class="form-control"placeholder="Password">
<input type="password" name="r-pass" class="form-control" placeholder="Repeat password">
<button type="submit" class="btn1" name="keke">Register</button>
    </form>
    <br>
    <a href="index.php">  Signup </a></p>
    </div>
    </div>






</form>
</main>

<?php
require "footer.php";
?>
