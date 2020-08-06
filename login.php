<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/ic.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extincteur Al Khair</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/mystyle.css" />
<link rel="stylesheet" href="css/login.css" />
</head>

<body>

<div class="container">
 <div class="header">  
  </div>	
  <div align="center">
  <ul style="display: inline-block;">
  <li><a class="menuItem active"  href="index.php">Acceuil</a></li>
  <li><a class="menuItem"  style="padding-left: 20px;padding-right: 20px;"  href="Extincteurs.php">Extincteurs</a></li>
  <li  style=""><a class="menuItem"  href="sysalarm.php" style="padding-left: 22px;padding-right: 22px;">Sys.Alarm</a></li>
  <li><a class="menuItem"  href="Agents.html">Agents</a></li>
   <li><a class="menuItem"  href="Entretien.html">Entretien</a></li>
  <li style="margin-right: 0px;"><a class="menuItem"   href="Contact.html">Contact</a></li>
  </ul>
  </div>
  <div style="margin-top: 2px;" class="bar"><img src="images/autre.png" width="100%" height="20" /> </div>
<div class="content">
  <?php
include('login1.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: Admin.php");
}
?>
<div id="main" align="center">
<h2  style="text-align: center;">Bienvenu chez ALKAIR Extincteurs</h2>
<div id="login" style="text-align: left;">
<h2>Connecter</h2>
<form action="" method="post">
<label>Nom d'utilisateur:</label>
<input id="name" name="username" placeholder="Nom d'utilisateur" type="text">
<label>Mot de passe :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Connecter ">
<span><?php echo $error;?></span>
</form>
</div>
</div>
<!-- end .content --></div>
   <div class="footer SearchBloc">
<table class="footerTable" align="center" valign="middle">
<tr >
<td width="50%" align="left" class="footerlinks2">Extincteur Al khair</td>
<td width="50%" align="right" class="footerlinks"><a href="Promotions.php">Promotions</a></td>
</tr>
<tr >
<td align="left" class="footerlinks2">Route de Tétouan Mghogha Kbira</td>
<td class="footerlinks" align="right"><a href="Nouveau-Produits.php">Nouveau Produits</a></td>
</tr>
<tr >
<td align="left" class="footerlinks2">Av.Ben Aajiba Tanger</td>
</tr>
<tr >
<td align="left" class="footerlinks2">Tél:0539954150-0661718022-0638597097</td>
</tr>
<tr >
<td align="left" class="footerlinks2">Email: extincteurs.alkhair@gmail.com</td>
<td width="50%" align="right" class="footerlinks"><a href="Admin.php">Admin-Login</a></td>
</tr>
</table></div>
<!-- end .container --></div>
</body>
</html>
