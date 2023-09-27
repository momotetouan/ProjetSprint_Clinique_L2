<?php

require_once('modele/connect.php');

function getConnect(){
$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connexion->query('SET NAMES UTF8');
return $connexion;
}


  


  function Categorie($info){
    $connexion=getConnect(); 					// création d'une connexion PDO
    
    if ($info->IdCat=="1"){			// Charge l'interface de la catégorie de l'employé
      afficherDirecteur();
    } elseif ($info->IdCat=="2"){
      afficherAgent();
    } elseif ($info->IdCat=="3"){
       afficherMedecin();
    }

  }

  function checkUser($login,$mdp){
    $connexion=getConnect(); // création d'une connexion PDO
    
    $requete="SELECT * FROM personnel WHERE Login='$login' and Mdp='$mdp'"; 	// Vérifie que l'employé existe
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $check=$resultat->fetch();												// Enregistre les données de l'employé
    $resultat->closeCursor();
    return $check;															// Retourne les données de l'employé
  }

function afficherlogin(){
    $connexion=getConnect();
    $requete="select Login FROM personnel";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $login=$resultat->fetchall();
    $resultat->closeCursor();
    return $login;
  }

  function affichermotif(){
    $connexion=getConnect();
    $requete="select * from motif";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $motif=$resultat->fetchall();
    $resultat->closeCursor();
    return $motif;
  }

  function afficherpatient($nss){
    $connexion=getConnect();
    $requete="select * from client where nss='$nss'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $patient=$resultat->fetchall();
    $resultat->closeCursor();
    return $patient;
  }

  function NSS($nom,$prenom,$dateN){ 
    $connexion=getConnect();
    $requete="select nss FROM client WHERE nomC='$nom' and prenomC='$prenom' and DateN='$dateN'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $nss=$resultat->fetchall();
    $resultat->closeCursor();
    return $nss;
  }

  function afficherpersonnel(){
    $connexion=getConnect();
    $requete="select * FROM personnel";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $personnel=$resultat->fetchall();
    $resultat->closeCursor();
    return $personnel;
  }
  function ajouterpatient($te,$a,$da,$de,$pays,$solde,$n,$p,$nss){
    $connexion=getConnect();
    $requete="insert into client values('','$te','$a','$da','$de','$pays','$solde','$n','$p','$nss')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function ajouterpersonnel($n,$p,$l,$mdp,$sp,$cat){
    $connexion=getConnect();
    $requete="insert into personnel values('','$n','$p','$l','$mdp','$sp','$cat')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function getsolde($id){//jai des doutes sur la requete
    $connexion=getConnect();
    $requete="select solde FROM client where IdCl=(select IdCl from rdv where IdRdv='$id')";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
  	$solde=$resultat->fetchall();							
	  $resultat->closeCursor();
	return $solde;
  }

  function ajouterSolde($id){//jai des doutes sur la requete
    $connexion=getConnect();
    $requete="select solde FROM client where IdCl=(select IdCl from rdv where IdRdv='$id')";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
  	$solde=$resultat->fetchall();							
	  $resultat->closeCursor();
	return $solde;
  }


  function getpay($id){
    $connexion=getConnect();
    $requete="select PrixMo FROM motif where IdMo=(select IdMo from rdv where IdRdv='$id')";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $paiement=$resultat->fetchall();						
    $resultat->closeCursor();
	return $paiement;
    
  }
  function modifiersolde($solde,$id){
    $connexion=getConnect();  
    $requete="UPDATE client SET  Solde= Solde -'$solde' WHERE   IdCl=(select IdCl from rdv where IdRdv='$id') ";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function ajouttache($date,$li,$heure,$nom){
    $connexion=getConnect(); 
    $requete="insert into tacheadmin values('','$date','$li',(select IdPers from Personnel where NomP='$nom'),'$heure')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }  

  function ajoutmotif( $libellemotif ,$prixmo){
    $connexion=getConnect(); 
    $requete="insert INTO motif VALUES ('','$libellemotif','$prixmo')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }
  
  function select_motif(){
    $connexion=getConnect();
    $requete="select * FROM motif order by LibelleMo";
    $resultat=$connexion->query($requete);
    return $resultat;
  }



  function supprimerClient($id){
    $connexion=getConnect();
    $requete="DELETE FROM client where IdCl=$id";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }
  function supprimerMotif($idMotif,$prix){
    $connexion=getConnect();
    $requete="DELETE FROM motif where LibelleMo='$idMotif' and PrixMo='$prix'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }
  
function ajouterRDV($date,$heure,$nomP,$nomC,$prenomC,$specialite,$motif){
    $connexion=getConnect();
    $requete="INSERT INTO Rdv
    VALUES ('','$heure', '$date', null,
            (SELECT IdMo FROM Motif WHERE LibelleMo = '$motif'),
            (SELECT IdCl FROM Client WHERE nomC = '$nomC' AND prenomC = '$prenomC'),
            (SELECT IdPers FROM Personnel WHERE NomP = '$nomP' AND IdSp = (SELECT IdSp FROM Specialite WHERE LibelléSp = '$specialite')));";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }
  function checktache($date,$libelle,$idpers){
    $connexion=getConnect();
    $requete="select * from tacheadmin where DateTa='$date' and LibelleTa='$libelle' and IdPers='$idpers'" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function checkMedecin($specialite){
    $con=getConnect();
    $sql="SELECT NomP, PrénomP FROM Personnel JOIN Specialite ON Personnel.IdSp = Specialite.IdSp WHERE Specialite.LibelléSp = '$specialite'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $medecin=$resultat->fetchall();
    $resultat->closeCursor();
    return $medecin;
    }

  function checkRDV($NSS){
    $connexion=getConnect();
    $sql="select * from rdv where Id_Patient=(select Id_Patient from patient where NSS='$NSS')" ;
    $sql=mysqli_query($con,$sql);
    return $sql;
  }

  function affiche_rdv($idCl)
{
  $connexion=getConnect();
  $sql="select * from rdv where IdCl='$idCl'" ;
  $sql=mysqli_query($con,$sql);
  return $sql;
}

function affichemedecin($idmed){
  $connexion=getConnect();
  $requete="select * from medecin where Id_Medecin='$idmed'" ;
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $medecin=$resultat->fetchall();
  $resultat->closeCursor();
  return $medecin;
}

function modifiermedecin($Nom,$Prenom,$Specialite,$ID){
  $connexion=getConnect();
 $requete="UPDATE personnel where idCat=3 SET  Nom_Medecin='$Nom', Prenom_Medecin='$Prenom', Specialite_Medecin='$Specialite' WHERE Id_Medecin='$ID' ";
 $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function paiementpatient($pay,$NSS){
  $connexion=getConnect();
  $requete="UPDATE client SET  Solde= Solde -'$pay' WHERE   IdCl=(select IdCl from client where nss='$NSS') ";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function depotpatient($depot,$nss){
  $connexion=getConnect();
  $requete="UPDATE client SET  Solde= Solde + '$depot' WHERE nss='$nss'  ";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function modifierClient($Nss,$Nom,$Prenom,$Adresse_Patient,$Tel_Patient,$Date_Naissance,$Departement_Naissance){
  $connexion=getConnect();
  $requete="UPDATE client SET nomC='$Nom', prenomC='$Prenom',adresse='$Adresse_Patient',NumTel='$Tel_Patient', DateN='$Date_Naissance', DepN='$Departement_Naissance' WHERE nss='$Nss' ";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function ajoutmedecin($Nom , $Prenom , $specialite){
  $connexion=getConnect();
  $requete="INSERT INTO Personnel 
  VALUES ('','$Nom', '$Prenom', null, null,
          (SELECT IdSp FROM Specialite WHERE LibelléSp = '$specialite'),
          (SELECT IdCat FROM Catégorie WHERE libelléCat = 'medecin'));";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function ajoutPiece($piece){
  $connexion=getConnect();
  $requete="INSERT INTO piece values('','$piece')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function afficherPiece($id){
    $connexion=getConnect();
    $requete="SELECT libellePi FROM piece WHERE idPi='$id' ";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $piece=$resultat->fetchall();
    $resultat->closeCursor();
    return $piece;
}

function modifierPiece($id,$libelle){
  $connexion=getConnect();
  $requete="UPDATE piece SET libellePi='$libelle' WHERE idPi='$id' ";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function supprimerPiece($id){
  $connexion=getConnect();
  $requete="DELETE FROM piece where IdPi='$id'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function modifiertMotif($id,$prixMo,$libelle){
  $connexion=getConnect();
  $requete="UPDATE motif SET LibelleMo='$libelle' , PrixMo='$prixMo' WHERE IdMo='$id'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function supprimerMedecin($nom){
  $connexion=getConnect();
  $requete="DELETE FROM personnel WHERE NomP='$nom'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function creeLogin($nom,$login,$mdp){
  $connexion=getConnect();
  $requete="UPDATE personnel SET Login='$login',Mdp='$mdp' WHERE NomP='$nom'  ";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}