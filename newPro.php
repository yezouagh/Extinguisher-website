<?php
if (isset($_POST['Type']) && !empty($_POST['Type'])) {
 if (isset($_POST['Titre']) && !empty($_POST['Titre'])) {
   if (isset($_POST['Prix']) && !empty($_POST['Prix'])) {
    if(isset($_POST['Qte']) && !empty($_POST['Qte']))
	{
      if (isset($_FILES['Image']) && $_FILES['Image']['size'] > 0) 
        {
           $tmpName = $_FILES['Image']['tmp_name'];
		   $image= addslashes(file_get_contents($_FILES['Image']['tmp_name']));
           $imageSize= getimagesize( $_FILES['Image']['tmp_name']);
		   if(!$imageSize)
		   {
		   	$msg="Ce n'est pas une image";
		   }
		   else
		   {
		          $promo=0;
		          if(isset($_POST['Promo']))
		           {
		   	         $promo=1;
		           }
                             $Titre=$_POST['Titre'];$Prix=$_POST['Prix'];$Qte=$_POST['Qte'];$Type=$_POST['Type'];
		   	  if(!$insert=mysql_query("INSERT INTO Extincteurs VALUES('NULL','$Titre','$Prix','$Qte','$image','$Titre','$promo','1','$Type')"))
			  {
			   $msg=	"Produit n'a pas été inséré, S'il vous plaît réessayer plus tard.";
			  }
			  else
			  {
			  	$msg=	"Produit a été inséré, Merci.";
			  }
		   }
        }
		else
			  {
			  	$msg=	"S'il vous plaît sélectionner une image.";
			  }
	  }
	  else
			  {
			  	$msg=	"S'il vous plaît tapez une Quantite >=0.";
			  }
    }
	 else
			  {
			  	$msg=	"S'il vous plaît tapez une Prix >=0.";
			  }
 } else
			  {
			  	$msg=	"S'il vous plaît tapez un Titre.";
			  }
} else
			  {
			  	$msg=	"S'il vous plaît sélectionner une Type.";
			  }
?>