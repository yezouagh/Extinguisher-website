<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ic.ico">
<title>Extincteur Al Khair</title>
<link rel="stylesheet" href="css/mystyle.css" />
<link rel="stylesheet" href="css/blueberry.css" />
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
 <script src="js/jquery.blueberry.js"></script>
<script>
$(window).load(function() {
	$('.blueberry').blueberry();
});
$(document).ready(function() {
	var hp=$('.Promo0').height();
	var hn=$('.Nouveau0').height();
	var rowCountp = $('#promo >tbody >tr').length;
	var rowCountn = $('#nouveau >tbody >tr').length;
	var corp=(rowCountp*2)+2;
	var corn=(rowCountn*2)+2;
	$('#promodiv').height(hp-corp);
	$('#nouveaudiv').height(hn-corn);
	var i=0;
	var j=0;
	var dirp=true;
	var dirn=true;
	animatep_loop = function() {
	if(i==rowCountp-1)
	{
	   dirp=false;
	}
	else 
	if(i==0)
	{
		dirp=true;
	}
	if(dirp)
	{
	 i++;
	}
	else
	{
	 i--;
	}
	 $('#promodiv').animate({scrollTop: hp*i},rowCountp*1500,function(){
	 	setTimeout(function(){ animatep_loop() }, 1000)
	 });
 }
 animaten_loop = function() {
	if(j==rowCountn-1)
	{
	dirn=false;
	}
	else 
	if(j==0)
	{
		dirn=true;
	}
	if(dirn)
	{
	 j++;
	}
	else
	{
	 j--;
	}
	 $('#nouveaudiv').animate({scrollTop: hn*j},rowCountn*1500,function(){
	 	setTimeout(function(){ animaten_loop() }, 1000)
	 });
 }
	animatep_loop();
	animaten_loop();
});
</script>
<script>
$(document).ready(function() {
var imgwidth=$('#ref img').width();
var count=7;
var pos=0-imgwidth*count;
var left=pos;
 loop=function()
{
if(left==$('#ref').width())
{
	left=pos;
}
	$('#ref img').animate({left:left++},10,function(){
	 	loop();
	 });
}
loop();
});
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
  <li><a class="menuItem active"  href="#">Acceuil</a></li>
  <li><a class="menuItem"  style="padding-left: 20px;padding-right: 20px;"  href="Extincteurs.php">Extincteurs</a></li>
  <li  style=""><a class="menuItem"  href="sysalarm.php" style="padding-left: 22px;padding-right: 22px;">Sys.Alarm</a></li>
  <li><a class="menuItem"  href="Agents.html">Agents</a></li>
   <li><a class="menuItem"  href="Entretien.html">Entretien</a></li>
  <li style="margin-right: 0px;"><a class="menuItem"   href="Contact.html">Contact</a></li>
  </ul>
  </div>
  <div style="margin-top: 2px;" class="bar"><img src="images/autre.png" width="100%" height="20" /> </div>
  <div class="content">
<!-- Slider -->
 <div class="blueberry">
      <ul class="slides">
        <li style="margin-right: 0px;height: 100%;"><img src="images/banner1.jpg" id="simg" /></li>
        <li style="margin-right: 0px;height: 100%;"><img src="images/banner2.jpg" id="simg" /></li>
      </ul>
    </div>
<!-- Slider -->

  <div class="bar"><img src="images/autre.png" width="100%" height="20" /> </div>
  <table style="font: 100%/1.3 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; width:100%;margin-bottom: 30px;margin-top: 40px;" align="center" valign="middle">
  <tr>
  <td style="padding-bottom: 10px;background-color: aliceblue;" valign="top">
  <h2  style="text-align:center;color: #4A4C49;margin-top: 10px; ">Promotions</h2>
  <div id="promodiv" style="overflow: hidden;">
    <table id="promo" align="center">
<?php
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
 error_reporting(E_ALL);
 $sql = "SELECT * FROM Extincteurs WHERE Promo='1';";
// the result of the query
$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
if (!empty($result)) 
{
$Count=mysql_num_rows($result);
if ($Count > 0) 
{
for($i=0;$i<$Count;$i++)
{
$row = mysql_fetch_array($result);
if($row)
{
?>
<tr align="center" valign="middle">
<td>
<table align="center" width="60%" valign="top" class="Promo<?php echo $i;?>">
<tr align="center" valign="middle">
	<td height="40"><img src="images/promo.gif"  width="100%" height="100%"></td>
  </tr>
  <tr align="center" valign="middle">
	<td  height="150"><img class="extincteurImg" src="image.php?id=<?php echo $row['Id']; ?>" width="100%" height="100%" /></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="30"><?php echo $row['Title']; ?></td>
  </tr>
 <!--- <tr align="center" valign="middle">
	<td class="extincteurPrix" height="30">Prix: <?php echo $row['Prix']; ?>DH HT</td>
  </tr>
  -->
</table>
</td>
</tr>
<?php
}
}
}
else
{
	echo "<tr><td><center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Il n'y a Aucun Promotion Pour Le Moment, Revenez Plus Tard !</h4></b></center></td></tr>";
}
}
else
{
	echo "<tr><td><center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Il n'y a Aucun Promotion Pour Le Moment, Revenez Plus Tard !</h4></b></center></td></tr>";
}
?>
</table>
</div>
  </td>
  <td style="padding-bottom: 10px;    background-color: aliceblue;" valign="top">
  <h2  style="text-align:center;color: #4A4C49;margin-top: 10px;">Nouveau Produits</h2>
  <div id="nouveaudiv" style="overflow: hidden;">
  <table id="nouveau" align="center">
<?php
 $sql = "SELECT Id,Image,Title,Prix,Qte FROM Extincteurs WHERE Nouveau='1';";
// the result of the query
$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
if (!empty($result)) 
{
$Count=mysql_num_rows($result);
if ($Count > 0) 
{
for($i=0;$i<$Count;$i++)
{

$row = mysql_fetch_array($result);
if($row)
{
?>
<tr align="center" valign="middle">
<td>
<table align="center" width="60%" valign="top" class="Nouveau<?php echo $i;?>">
<tr align="center" valign="middle">
	<td height="40"><img src="images/new.gif"  width="100%" height="100%"></td>
  </tr>
  <tr align="center"  valign="middle">
	<td  height="150"><img class="extincteurImg" src="image.php?id=<?php echo $row['Id']; ?>" width="100%" height="100%" /></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="30"><?php echo $row['Title']; ?></td>
  </tr>
  <!--<tr align="center" valign="middle">
	<td class="extincteurPrix" height="30">Prix: <?php echo $row['Prix']; ?>DH HT</td>
  </tr>-->
</table>
</td>
</tr>
<?php
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
</table>
</div>
  </td>
   </tr>
  </table>
  <table style="font: 100%/1.8 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; width:100%;margin-bottom: 45px;" align="center" valign="middle">
  <tr>
  <td style="padding-bottom: 10px;padding-top: 25px;" valign="top" width="50%" class="td1" >
  <h2>Extincteur ALKHAIR</h2>
  <p>La société ALKHAIR est une entreprise marocaine spécialisée dans le domaine de la protection incendie. Sa vocation est celle d'un entrepreneur 
  fournissant des matériaux et services répondant aux normes d'assurances en apportant à son client l'investissement gagnant.
</p>
  <p>ALKAIR compte plus de 50 personnes à votre service dans les domaines de la sécurité incendie.</p>
  <p>Reconnue pour son savoir-faire, ALKHAIR est le partenaire sécurité d'entreprises issues de l'industrie, du tertiaire ou des Etablissements Recevant du Public.
   ALKHAIR  c'est plus de 1000 sites visités par an et des références parmi les plus grandes entreprises marocaines.
ALKHAIR  propose une large gamme de produits et services qui couvrent les domaines suivants : </p>
<p>
"    Désenfumage naturel et mécanique (installation et entretien),
"    Détection incendie (Installation et entretien),
"    Extincteurs, installation, recharge  et maintenance 
"    Formation, prévention (audits de sécurité, études de conformité…),
"    Génie hydraulique (robinets d'incendie armés RIA, colonnes sèches,…),
"    Plans et signalisation
</p>
<p>
Nous sommes toujours à la pointe de la technologie, en développement permanent et en mises à jours régulières par rapports aux 
exigences Européennes tout en s'adaptant au nouvel élan en matière de sécurité que connaît le Maroc.
</p>
<p>
Nos actions commerciales sont toujours précédées par un conseil qui est notre principale préoccupation et un atout majeur.
</p>
  </td>
  <td  width="50%" class="td1" valign="top" >
  <h2 style="margin-top: 20px;">Definition Extincteur</h2>
  <p>Un extincteur est un équipement en matière de protection incendie, qui projette une substance appelée : agent extincteurs capable de maîtriser un début
   d’incendie. Un départ d’incendie se définit par un feu encore limité à l’objet d’origine.</p>
  <h3>Trois Catégories d'Extincteurs:</h3>
  <p>Extincteur d’incendie Portatif : c’est un extincteur qui est conçu pour être porté et utilisé à la main. Masse égale ou inférieure à 20kg. Type d’extincteur le 
  plus courant.
Extincteur d’incendie Mobile : c’est un extincteur qui est conçu pour être transporté et actionnée manuellement. Masse supérieure à 20kg
Extincteur d'incendie Fixe:Comme son nom l’indique, ce type d’extincteur est fixé et ne peut être déplacé. L’extincteur fixe est placé et protège une zone bien 
déterminée où il y a un risque d’incendie. Déclenchement automatique ou manuel.</p>

<div style="margin:5px;margin-top:70px;" align="center">
<div style="width: 100%;">
<iframe style="display: block;" src="http://cdnres.willyweather.com/widget/loadView.html?id=40296" width="100%" height="300" frameborder="0" scrolling="no">
</iframe><a style="position: relative;display: block;height: 20px;margin: -20px 0 0 0;text-indent: -9999em;z-index: 1"
 href="http://www.willyweather.com/in/newton-county/morocco.html">Morocco Forecast</a></div>
</div>
  </td>
  </tr>
  </table>

  <!----------begin . References---------------->
  <h2  style="text-align:center;color: #4A4C49;margin-top: 10px;margin-bottom: 5px; ">Réferences</h2>
  <div id="ref" style="height:70px;overflow: hidden;display: flex;">
   <img height="100%" src="images/ref1.jpg"/>
   <img height="100%" src="images/ref2.jpg"/>
   <img height="100%" src="images/ref3.jpg"/>
   <img height="100%" src="images/ref4.jpg"/>
   <img height="100%" src="images/ref5.jpg"/>
   <img height="100%" src="images/ref6.jpg"/>
   <img height="100%" src="images/ref7.jpg"/>
  </div>
  <!----------end . References------------------>
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
