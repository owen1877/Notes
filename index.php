<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php");?>
<?php
  session_start();
?>

  <?php require_once("includes/connection.php"); ?>   
<?php
  
  if(isset($_SESSION["session_username"])){
  // вывод "Session is set"; // в целях проверки
 header("Location: notes.php");
  }

  if(isset($_POST["login"])){

  if(!empty($_POST['username']) && !empty($_POST['password'])) {
  $username=htmlspecialchars($_POST['username']);
  $password=htmlspecialchars($_POST['password']);
  $query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
  $numrows=mysql_num_rows($query);
  if($numrows!=0)
 {
while($row=mysql_fetch_assoc($query))
 {
  $dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
  // старое место расположения
  //  session_start();
   $_SESSION['session_username']=$username;  
 /* Перенаправление браузера */
   header("Location: notes.php");
  }
  } else {
  
  echo  "Неверное имя пользователя или пароль!";
 }
  } else {
    $message = "Все поля обязательны для заполнения!";
  }
  }
?>

<div class="container mlogin">
<div id="login">
<h1>Вход</h1>
<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">Имя опльзователя<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
 <input class="input" id="password" name="password"size="20"
  type="password" value=""></label></p> 
  <p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
  <p class="regtext">Еще не зарегистрированы?<a href= "register.php">Регистрация</a>!</p>
   </form>
 </div>
  </div>
</body>
</html>