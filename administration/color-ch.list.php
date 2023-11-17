<?php session_start();

require 'texte1.php';

if(isset($_POST['color_menu_haut']) AND !empty($_POST['color_menu_haut'])){
	if(isset($_POST['color_menu_bas']) AND !empty($_POST['color_menu_bas'])){
		if(isset($_POST['color_menu_S']) AND !empty($_POST['color_menu_S'])){
			if(isset($_POST['bac_color_menu_haut']) AND !empty($_POST['bac_color_menu_haut'])){
				if(isset($_POST['bac_color_menu_bas']) AND !empty($_POST['bac_color_menu_bas'])){
					if(isset($_POST['bac_color_menu_S']) AND !empty($_POST['bac_color_menu_S'])){
						if(isset($_POST['color_page']) AND !empty($_POST['color_page'])){
							if(isset($_POST['bac_page']) AND !empty($_POST['bac_page'])){



$color_menu_haut_burger=$_POST['color_menu_haut_burger'];
$color_menu_haut=$_POST['color_menu_haut'];
$color_menu_bas=$_POST['color_menu_bas'];
$color_menu_S=$_POST['color_menu_S'];
$bac_color_menu_haut=$_POST['bac_color_menu_haut'];
$bac_color_menu_haut_burger=$_POST['bac_color_menu_haut_burger'];
$bac_color_menu_bas=$_POST['bac_color_menu_bas'];
$bac_color_menu_S=$_POST['bac_color_menu_S'];
$color_page=$_POST['color_page'];
$bac_page=$_POST['bac_page'];
$bacColAdd=$_POST['color_button_add'];
$colAdd=$_POST['color_button_add_pol'];
$bacColVoir=$_POST['color_button_voir'];
$colVoir=$_POST['color_button_voir_pol'];

$req1=$bdd1->query('SELECT * FROM colors');
$donnees=$req1->fetch();
if(isset($donnees['bacColMH']) AND !empty($donnees['bacColMH'])){

$req=$bdd1->prepare('UPDATE colors SET bacColMH=:bacColMH, colMH=:colMH, bacColMHB=:bacColMHB, colMHB=:colMHB, bacColMB=:bacColMB, colMB=:colMB, bacColP=:bacColP, colP=:colP, bacColS=:bacColS, colS=:colS, bacColAdd=:bacColAdd, colAdd=:colAdd, bacColVoir=:bacColVoir, colVoir=:colVoir');
$req->execute(array('bacColMH'=>$bac_color_menu_haut, 'colMH'=>$color_menu_haut, 'bacColMHB'=>$bac_color_menu_haut_burger,'colMHB'=>$color_menu_haut_burger, 'bacColMB'=>$bac_color_menu_bas, 'colMB'=>$color_menu_bas, 'bacColP'=>$bac_page, 'colP'=>$color_page,'bacColS'=>$bac_color_menu_S, 'colS'=>$color_menu_S, 'bacColAdd'=>$bacColAdd, 'colAdd'=>$colAdd, 'bacColVoir'=>$bacColVoir, 'colVoir'=>$colVoir));
} else{

	$req=$bdd1->prepare('INSERT INTO colors(bacColMH, colMH, bacColMHB, colMHB, bacColMB, colMB, bacColP, colP, bacColS, colS, bacColAdd, colAdd, bacColVoir, colVoir) VALUES(:bacColMH, :colMH, :bacColMB, :colMB, :bacColP, :colP, :bacColS, :colS, :bacColAdd, :colAdd, :bacColVoir, :colVoir)');
	$req->execute(array('bacColMH'=>$bac_color_menu_haut, 'colMH'=>$color_menu_haut, 'bacColMHB'=>$bac_color_menu_haut_burger,'colMHB'=>$color_menu_haut_burger, 'bacColMB'=>$bac_color_menu_bas, 'colMB'=>$color_menu_bas, 'bacColP'=>$bac_page, 'colP'=>$color_page,'bacColS'=>$bac_color_menu_S, 'colS'=>$color_menu_S, 'bacColAdd'=>$bacColAdd, 'colAdd'=>$colAdd, 'bacColVoir'=>$bacColVoir, 'colVoir'=>$colVoir));
}
$_SESSION['message']="Couleurs changées";
header("Location: color-ch.php");

							}else{$_SESSION['message']="Remplissez le champ couleur des polices du menu haut";header("Location:color-ch.php");}
						}else{$_SESSION['message']="Remplissez le champ Couleur des Polices du menu bas";header("Location:color-ch.php");}
					}else{$_SESSION['message']="Remplissez le champ Couleur des Polices Menu Side";header("Location:color-ch.php");}
				}else{$_SESSION['message']="Remplissez le champ Couleur du menu Haut";header("Location:color-ch.php");}
			}else{$_SESSION['message']="Remplissez le champ Couleur du menu Bas";header("Location:color-ch.php");}
		}else{$_SESSION['message']="Remplissez le champ Couleur du Menu Side";header("Location:color-ch.php");}
	}else{$_SESSION['message']="Remplissez le champ Couleur des polices page";header("Location:color-ch.php");}
}else{$_SESSION['message']="Remplissez le champ Couleur des pages";header("Location:color-ch.php");}						