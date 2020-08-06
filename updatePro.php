<?php
$Promo="1";
$Nouveau="1";
if(!isset($_POST['Promo']))
{
	$Promo="0";
}
if(!isset($_POST['Nouveau']))
{
	$Nouveau="0";
}
if (isset($_POST['Type']) && !empty($_POST['Type'])) {
 if (isset($_POST['Titre']) && !empty($_POST['Titre'])) {
   if (isset($_POST['Prix']) && !empty($_POST['Prix'])) {
    if(isset($_POST['Qte']) && !empty($_POST['Qte']))
	{
	             if(isset($_POST['Info']) && !empty($_POST['Info']))
	             {
				   $Info=mysql_real_escape_string($_POST['Info']);
	               $Type=$_POST['Type'];
	               $Titre=mysql_real_escape_string($_POST['Titre']);
	               $Prix=$_POST['Prix'];
	               $Qte=$_POST['Qte'];
				   $isImage=true;
	               $sql="UPDATE Extincteurs SET Title='$Titre',Prix='$Prix',Qte='$Qte',Promo='$Promo',Info='$Info',Nouveau='$Nouveau',Type='$Type' ";
                   if (isset($_FILES['Image']) && $_FILES['Image']['size'] > 0) 
                     {
                        $tmpName = $_FILES['Image']['tmp_name'];
	             	   $image= addslashes(file_get_contents($_FILES['Image']['tmp_name']));
                        $imageSize= getimagesize( $_FILES['Image']['tmp_name']);
	             	   if(!$imageSize)
	             	   {
	             	    $isImage=false;
	             	   }
	             	   else
	             	   {
	             	   	 $sql.=" ,Image='$image' ";
	             	   }
                     }
	             	else
	             		 {
	             		  	$sql.=" WHERE Id='$Id' ;";
							if($isImage==true)
							{
							 if(!$update=mysql_query($sql))
	             		      {
	             		       $msg=	"Produit n'a pas été mis à jour, S'il vous plaît réessayer plus tard.";
	             		      }
	             		      else
	             		      {
	             		     	$msg=	"Produit a été mis à jour, Merci.";
	             		      }
							 }
							 else
							 {
							 	 	$msg="Ce n'est pas une image";
							 }
	             		  }
						  
	             }
                 else
                 {
                  	$msg=	"S'il vous plaît tapez les info du produit.";
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