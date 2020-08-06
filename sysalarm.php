<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/ic.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extincteur Al Khair</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/mystyle.css" />
<script type="text/javascript">
function chan(el)
{
   el.play();
   el.style.background="#019ad2";
}
function Verifie()
{
    var myForm = document.getElementById('form-id');
    var allInputs = myForm.getElementsByTagName('input');
    var input, i;
    for(i = 0; input = allInputs[i]; i++) {
        if(input.getAttribute('name') && !input.value) {
            input.setAttribute('name', '');
        }
    }
}
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
  <li><a class="menuItem active"  href="index.php">Acceuil</a></li>
  <li><a class="menuItem"  style="padding-left: 20px;padding-right: 20px;"  href="Extincteurs.php">Extincteurs</a></li>
  <li  style=""><a class="menuItem"  href="#" style="padding-left: 22px;padding-right: 22px;">Sys.Alarm</a></li>
  <li><a class="menuItem"  href="Agents.html">Agents</a></li>
   <li><a class="menuItem"  href="Entretien.html">Entretien</a></li>
  <li style="margin-right: 0px;"><a class="menuItem"   href="Contact.html">Contact</a></li>
  </ul>
  </div>
  <div style="margin-top: 2px;" class="bar"><img src="images/autre.png" width="100%" height="20" /> </div>
 <div class="content"> 
   <div align="center" style="margin-bottom: 40px;">
  <h2  style="text-align:center;margin-top: 40px;color: #4A4C49; ">Conseil immobilier - L'importance d'un système d'alarme</h2>
  <video poster="images/transparent.png" onclick="this.paused?chan(this):this.pause();" id="v" width="70%" height="400" style="border-radius: 5px;background:transparent url('images/cover2.jpg') no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;background-color: #0FA4DA;" controls>
  <source src="videos/Conseil.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
  </div>
  <!----------------------------------------------------------------------------------------------------------------->
  
  <div class="SearchBloc">
 <form id="form-id" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="get" name="formulaire" onsubmit="Verifie()">
 <h2 style="margin-bottom: auto;" >RECHERCHE</h2>
<!----
<div class="Prix" >
<h4 >PRIX ENTRE </h4>
<input  class="inputNum"  type="number" min="0" value="<?=isset($_GET['Prix1']) ? $_GET['Prix1'] : '';?>" name="Prix1"/>
<h4 >ET</h4>
<input  class="inputNum"  type="number" min="0" value="<?=isset($_GET['Prix2']) ? $_GET['Prix2'] : '';?>" name="Prix2"/>
</div>------->
<p>
<input  type="radio" name="Type" value="avec" <?=isset($_GET['Type'])&&$_GET['Type']=='avec' ? 'checked' : '';?>> AVEC FILS&nbsp;&nbsp;&nbsp;
  <input type="radio" name="Type" value="sans" <?=isset($_GET['Type'])&&$_GET['Type']=='sans' ? 'checked' : '';?>> SANS FILS
</p>
<input  class="search" type="submit" name="S" class="myButton" value="Start"/>

</form>
 </div>
 <table width="100%" style="border-spacing: 5px;">
<?php

require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
 error_reporting(E_ALL);
 $sql = "SELECT Id,Image,Title,Prix FROM Extincteurs WHERE Type='S' ";
if(isset($_GET["Type"]))
{
   if(!empty($_GET["Type"]))
   {
   $Title=$_GET["Type"];
   $sql .= " and Title Like '%" .$Title . "%' ";
   }
   else
   {
   	unset($_GET["Title"]);
   }
}
/*
if(isset($_GET["Prix1"])   && isset($_GET["Prix2"]) )
{
 if(!empty($_GET["Prix1"]) && !empty($_GET["Prix2"]))
   {
     $Prix1=$_GET["Prix1"];
     $Prix2=$_GET["Prix2"];
       $sql .= " and Prix between '".$Prix1."' and '".$Prix2."' ";
   }
   else
   {
	unset($_GET["Prix1"]);
	unset($_GET["Prix2"]);
   }
}*/
$sql .= " ;";
// the result of the query
$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
if (!empty($result)) 
{
$Count=mysql_num_rows($result);
if ($Count > 0) 
{
$tr=ceil($Count/2);
for($i=0;$i<$tr;$i++)
{
echo '<tr align="center" valign="middle">';

for($j=0;$j<2;$j++)
{
$row = mysql_fetch_array($result);
if($row)
{
?>
<td width="50%">
<table width="100%" >
  <tr class="extincteurImg" align="center" valign="middle">
	<td height="335" class="extincteurImg" border="5px"><img  src="image.php?id=<?php echo $row['Id']; ?>" style="cursor:pointer;" onclick=" window.location.assign('Info.php?Id=<?php echo $row["Id"]; ?>');" width="auto" height="auto" /></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="53"><?php echo $row['Title']; ?></td>
  </tr>
<!---  <tr align="center" valign="middle">
	<td class="extincteurPrix" height="55">Prix: <?php echo $row['Prix']; ?>DH HT</td>
  </tr>----->
</table>
</td>
<?php
}
}
}
}
else
{
	echo "<tr><td><center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Aucun Produits corresponds à votre recherche caractéristiques !</h4></b></center></td></tr>";
}
}
else
{
	echo "<tr><td><center><b><h4 class='extincteurtitle' style='padding:30px; color:red;'>Aucun Produits corresponds à votre recherche caractéristiques !</h4></b></center></td></tr>";
}
?>
</tr>
</table>
  
 <!-----------------------------------------------------------------------------------------------------------------> 
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
