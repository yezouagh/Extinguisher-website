<?php
session_start();// Starting Session
if(!isset($_SESSION['login_user'])){
header('Location: login.php'); // Redirecting To Home Page
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
function UpdateP(el)
{
    if (confirm("Voulez-vous vraiment Changer l'etat de ce produit?")==true) {
	var id=el.value;
     var bool="1";
     if(el.checked!=true)
      {
     	bool="0";
      }
        window.location.assign("updateP.php?Id="+id+"&bool="+bool);
    }
	else
	{
		el.checked=!el.checked;
	}
}
function UpdateN(el)
{
    if (confirm("Voulez-vous vraiment Changer l'etat de ce produit?") == true) {
	var id=el.value;
     var bool="1";
     if(el.checked!=true)
      {
     	bool="0";
      }
        window.location.assign("updateN.php?Id="+id+"&bool="+bool);
    }
	else
	{
		el.checked=!el.checked;
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
  <div class="content" >

<h2  style="text-align:center;margin-top: 40px;color: #4A4C49; ">Admin Espace</h2>
  <?php
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
 error_reporting(E_ALL);
$msg=''; // Variable To Store Error Message
if(isset($_POST['I'])){
include('newPro.php');
}
?>
<div class="SearchBloc" style=" margin-top: 25px;">
 <form id="form-id" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data"  method="POST" name="formulaire">
 <h2 style="margin-bottom: auto;padding-left: 0px;">Insérer un nouveau produit</h2>
 <div class="Type" >
 <select id="input1" name="Type" class="extincteurtitle">
<option value=""  >TYPE ...</option>
<option  value="E" >Extincteur</option>
<option value="S">Systéme d'alarme</option>
</select>
</div>
<div class="Qte" >
 <h4>Titre</h4>
<input  class="inputNum"  type="text" name="Titre"/>
</div>
<div class="Prix" >
<h4 >PRIX</h4>
<input  class="inputNum"  type="number" min="0" name="Prix"/>
</div>
<div class="Prix" >
<input type="checkbox" name="Promo" value="1"><h4>Promotion ?</h4><br>
</div>
<div class="Prix" >
<h4 >Quantite</h4>
<input style="padding-left: 0px;"  class="inputNum"  type="number" min="0" name="Qte"/>
</div>
<div class="Prix" >
<h4 >Image</h4>
<input  class="inputNum"  type="file" name="Image" accept="image/jpeg"/>
</div>
<input  class="search" type="submit" name="I" class="myButton" value="Insérer"/>
<h4 style="padding-left: 0px;color:red;"><?php echo $msg;?></h4>
</form>
 </div>
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
 
 
 
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------->

<h2  style="text-align:center;margin-top: 40px;color: #4A4C49; ">Changer l'Etat du Produit</h2>
<table width="100%" style="border-spacing: 35px;border: 5px solid #27B5E8;border-radius: 10px;margin: 10px 0;">
<?php
 $sql = "SELECT Id,Image,Title,Prix,Qte,Promo,Nouveau FROM Extincteurs;";
 $Per="88";
// the result of the query
$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
if (!empty($result)) 
{
$Count=mysql_num_rows($result);
if ($Count > 0)
{
if($Count==1)
{
	$Per="30";
}
elseif($Count==2)
{
	$Per="70";
}
$tr=ceil($Count/3);
for($i=0;$i<$tr;$i++)
{
echo '<tr align="center" valign="middle">';

for($j=0;$j<3;$j++)
{
$row = mysql_fetch_array($result);
if($row)
{
?>

<td>
<table width="<?php $Per ?>%" >
  <tr align="center" valign="middle">
	<td ><img class="extincteurImg" style="cursor:pointer;" onclick=" window.location.assign('updateProduit.php?Id=<?php echo $row["Id"]; ?>');" src="image.php?id=<?php echo $row['Id']; ?>" width="100%" height="100%" /></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="40"><?php echo $row['Title']; ?></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurPrix" height="40">Prix: <?php echo $row['Prix']; ?>DH HT</td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="40">Promotion
	<input type="checkbox" onclick="UpdateP(this)" name="Promo" <?=$row['Promo']=='1' ? 'checked' : '';?> value="<?php echo $row['Id']; ?>"></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurPrix" height="40">Nouveau 
	<input type="checkbox" onclick="UpdateN(this)" name="Nouveau" <?=$row['Nouveau']=='1' ? 'checked' : '';?> value="<?php echo $row['Id']; ?>"></td>
  </tr>
   <tr align="center" valign="middle">
	<td class="extincteurPrix" height="40">
	<input id="<?php echo $row['Id']; ?>" onclick="Sup(this)" class="search" type="button"  name="S" value="Supprimer"/>
</td>
  </tr>
</table>
</td>
<?php
}
}
}
}
else
{
	echo "<tr><td><center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Il n'y a Aucun Produit Pour Le Moment, Revenez Plus Tard !</h4></b></center></td></tr>";
}
}
else
{
	echo "<tr><td><center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Il n'y a Aucun Produit Pour Le Moment, Revenez Plus Tard !</h4></b></center></td></tr>";
}
?>
</tr>
</table>
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
