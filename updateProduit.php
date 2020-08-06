<?php
session_start();// Starting Session
if(!isset($_SESSION['login_user'])){
header('Location: login.php'); // Redirecting To Home Page
}
if(!isset($_GET['Id'])){
header('Location: Admin.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/ic.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extincteur Al Khair</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/mystyle.css" />
<script type="text/javascript">
function Sup(el)
{
  var id=el.id;
    if (confirm("Voulez-vous vraiment supprimer ce produit?") == true) {
        window.location.assign("Supprimer.php?Id="+id);
    }
}
</script>
<script type="text/javascript" src="http://static.tumblr.com/ikeq9mi/DfYl6o46t/scrolltotop.min.js"></script>
<a href="javascript:;" id="scrollToTop" rel="nofollow" title="Go to Top"><img src="images/top.png" title="Go to Top" alt="Go to Top"/></a>
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
  <div class="content" align="center">

<h2  style="text-align:center;margin-top: 40px;color: #4A4C49; ">Admin Espace</h2>
  <?php
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
 error_reporting(E_ALL);
$msg=''; // Variable To Store Error Message
if(isset($_POST['M'])){
include('updatePro.php');
}

?>
<div class="SearchBloc" style=" margin-top: 25px;">
 <form id="form-id" action="<?php echo $_SERVER['PHP_SELF']."?Id=".$_GET['Id'];?>" enctype="multipart/form-data"  method="POST" name="formulaire">
 <h2 style="margin-bottom: auto;padding-left: 0px;text-align:center;">Mettre à jour ce produit</h2>
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
<?php
$Id=$_GET['Id'];
 $sql = "SELECT * FROM Extincteurs  WHERE Id='$Id';";
// the result of the query
$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
if (!empty($result))
{
$row = mysql_fetch_array($result);
if($row)
{
?>
<h4 style="padding-left: 0px;color:red;"><?php echo $msg;?></h4>
<table  align="center">
  <tr align="center" valign="middle">
	<td ><img class="extincteurImg" src="image.php?id=<?php echo $row['Id']; ?>" width="100%" height="100%" /></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="40"><?php echo $row['Title']; ?></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurPrix" height="40">Prix: <?php echo $row['Prix']; ?>DH HT</td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="40">Promotion
	<input type="checkbox" name="Promo" <?=$row['Promo']=='1' ? 'checked' : '';?> ></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurPrix" height="40">Nouveau 
	<input type="checkbox" name="Nouveau" <?=$row['Nouveau']=='1' ? 'checked' : '';?> ></td>
  </tr>
   <tr align="center" valign="middle">
	<td class="extincteurPrix" height="40">
	<input id="<?php echo $row['Id']; ?>" onclick="Sup(this)" class="search" type="button"  name="S" value="Supprimer"/>
</td>
  </tr>
</table>
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
 <div  class="Type">
 <select id="input1" name="Type" class="extincteurtitle">
<option value=""   >TYPE ...</option>
<option  value="E" <?=$row['Type']=='E' ? ' selected="selected"' : '';?> >Extincteur</option>
<option value="S" <?=$row['Type']=='S' ? ' selected="selected"' : '';?>>Systéme d'alarme</option>
</select>
</div>
<div class="Qte" >
 <h4>Titre</h4>
<input  class="inputNum"  type="text" name="Titre" value="<?php echo $row['Title']; ?>"/>
</div>
<div class="Prix">
<h4 >PRIX</h4>
<input  class="inputNum"  type="number" min="0" name="Prix" value="<?php echo $row['Prix']; ?>"/>
</div>
<div class="Prix" >
<h4 >Quantite</h4>
<input style="padding-left: 0px;"  class="inputNum" min="0" type="number" name="Qte" value="<?php echo $row['Qte']; ?>"/>
</div>
<div class="Prix" >
<h4 >Image</h4>
<input  class="inputNum"  type="file" name="Image" accept="image/jpeg"/>
</div>
</br>
<div class="Prix" >
<h4 style="display: inline;">Info</h4></br>
<textarea style="border-radius:5px;max-width: 900px;padding: 10px;"  class="inputNum" cols="65" rows="10" name="Info" ><?php echo $row['Info']; ?></textarea>
</div>
<input  class="search" style="display: block;margin-top: 10px;" type="submit" name="M" class="myButton" value="Mettre à jour"/>
</form>
 </div>

<?php
}
else
{
	echo "<center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Il n'y a Aucun Produit Avec ce Id !</h4></b></center>";
}
}
else
{
	echo "<center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Il n'y a Aucun Produit Avec ce Id !</h4></b></center>";
}
?>
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
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
<td width="50%" align="right" class="footerlinks"><a href="logout.php">Deconnecter</a></td>
</tr>
</table></div>
<!-- end .container --></div>
</body>
</html>
