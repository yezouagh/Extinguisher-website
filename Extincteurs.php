<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/ic.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extincteur Al Khair</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/mystyle.css" />
<script type="text/javascript">
function Verifie()
{
    var myForm = document.getElementById('form-id');
    var allInputs = myForm.getElementsByTagName('input');
    var input, i;
    var input1 = document.getElementById('input1');
	 if(input1.getAttribute('name') && !input1.options[input1.selectedIndex].value) {
            input1.setAttribute('name', '');
        }
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
  <li><a class="menuItem"  style="padding-left: 20px;padding-right: 20px;"  href="#">Extincteurs</a></li>
  <li  style=""><a class="menuItem"  href="sysalarm.php" style="padding-left: 22px;padding-right: 22px;">Sys.Alarm</a></li>
  <li><a class="menuItem"  href="Agents.html">Agents</a></li>
   <li><a class="menuItem"  href="Entretien.html">Entretien</a></li>
  <li style="margin-right: 0px;"><a class="menuItem"   href="Contact.html">Contact</a></li>
  </ul>
  </div>
  <div style="margin-top: 2px;" class="bar"><img src="images/autre.png" width="100%" height="20" /> </div>
  <div class="content" >
 <div class="SearchBloc" style=" margin-top: 25px;">
 <form id="form-id" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="get" name="formulaire" onsubmit="Verifie()">


 <h2 style="margin-bottom: auto;">RECHERCHE</h2>
 <div class="Type" >
 <select id="input1" name="Title" class="extincteurtitle">
<option value=""  <?=!isset($_GET['Title']) ? ' selected="selected"' : '';?>>TYPE D'EXTINCTEUR ...</option>
<option  value="CO2"   <?=isset($_GET['Title'])&&$_GET['Title']=='CO2' ? ' selected="selected"' : '';?>>CO2</option>
<option value="RIA" <?=isset($_GET['Title'])&&$_GET['Title']=='RIA' ? ' selected="selected"' : '';?>>RIA</option>
<option value="ABC" <?=isset($_GET['Title'])&&$_GET['Title']=='ABC' ? ' selected="selected"' : '';?>>ABC</option>
</select>
</div>
<!-------<div class="Prix" >
<h4 >PRIX ENTRE </h4>
<input  class="inputNum"  type="number" min="0" value="<?=isset($_GET['Prix1']) ? $_GET['Prix1'] : '';?>" name="Prix1"/>
<h4 >ET</h4>
<input  class="inputNum"  type="number" min="0" value="<?=isset($_GET['Prix2']) ? $_GET['Prix2'] : '';?>" name="Prix2"/>
</div>--->
<div class="Qte" >
 <h4 style="font-size: medium;">QUANTITE ENTRE </h4>
<input  class="inputNum" value="<?=isset($_GET['Qte1']) ? $_GET['Qte1'] : '';?>"  type="number" min="0" name="Qte1"/>
<h4 >ET</h4>
<input  class="inputNum" value="<?=isset($_GET['Qte2']) ? $_GET['Qte2'] : '';?>"  type="number" min="0" name="Qte2"/>
</div>
<input  class="search" type="submit" name="S" class="myButton" value="Start"/>
</form>
 </div>
<table width="100%" style="border-spacing: 35px;">

<?php

require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
 error_reporting(E_ALL);
 $sql = "SELECT Id,Image,Title,Prix,Qte FROM Extincteurs WHERE Type='E' ";
 $Per="88";
if(isset($_GET["Title"]))
{
   if(!empty($_GET["Title"]))
   {
   $Title=$_GET["Title"];
   $sql .= " and Title Like '%" .$Title . "%' ";
   }
   else
   {
   	unset($_GET["Title"]);
   }
}
/*if(isset($_GET["Prix1"])   && isset($_GET["Prix2"]) )
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
if(isset($_GET["Qte1"])   && isset($_GET["Qte2"]))
{
	 if(!empty($_GET["Qte1"]) && !empty($_GET["Qte2"]))
   {
     $Qte1=$_GET["Qte1"];
     $Qte2=$_GET["Qte2"];
       $sql .= " and Qte between '".$Qte1."' and '".$Qte2."' ";
   }
   else
   {
	unset($_GET["Qte1"]);
	unset($_GET["Qte2"]);
   }
}
$sql .= " ;";
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
	<td ><img class="extincteurImg" src="image.php?id=<?php echo $row['Id']; ?>" style="cursor:pointer;" onclick=" window.location.assign('Info.php?Id=<?php echo $row["Id"]; ?>');" width="100%" height="100%" /></td>
  </tr>
  <tr align="center" valign="middle">
	<td class="extincteurtitle" height="53"><?php echo $row['Title']; ?></td>
  </tr>
  <!--------<tr align="center" valign="middle">
	<td class="extincteurPrix" height="55">Prix: <?php echo $row['Prix']; ?>DH HT</td>
  </tr>--->
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
