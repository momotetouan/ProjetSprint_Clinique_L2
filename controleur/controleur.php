<?php

require_once("Modele/modele.php");
require_once("Vue/vue.php");

function CtlAcceuil(){
	afficherAcceuil(); 
	}

function CtlErreur($erreur,$idCat){
	afficherErreur($erreur,$idCat) ;		// Affiche l'erreur sur la page d'acceuil
}

function CtlCategorie($user,$mdp){  		// Identifie si l'employé est directeur, conseiller ou agent
if (!empty($user) && !empty($mdp)) {
  $info=checkUser($user,$mdp); 		// Vérifie que l'employé existe
  if($info == null){
    $erreur="Login ou mdp non valide";
    CtlErreur($erreur);				// Si l'employé n'existe pas
  }	
  else {
    Categorie($info);				// Charge l'interface de la catégorie de l'employé
    
  }
}
else {
  $erreur="Login ou mdp vide";
  CtlErreur($erreur);					// Si l'un des champ n'a pas été rempli
}

}

function CtlAjoutPatient($te,$a,$da,$de,$pays,$solde,$n,$p,$nss){
 
  if (!empty($n) && !empty($p) && !empty($a) && !empty($a) && !empty($te) && !empty($da) && !empty($de) && !empty($nss) && !empty($solde)){
       ajouterpatient($te,$a,$da,$de,$pays,$solde,$n,$p,$nss);
       afficherAjouterClient();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }
}

  
function CtlSynthese($nss){
  if(!empty($nss)){
  $PATIENT=afficherpatient($nss);
    afficherSynthese($PATIENT);
    //liste rdv
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }

}

function CtlRechercheClient($nom,$prenom,$dateN){
  if(!empty($nom) && !empty($prenom) && !empty($dateN)){
    $NSS=NSS($nom,$prenom,$dateN);
    afficherNss($NSS);
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }
  
}

function CtlRdv($date,$heure,$nomP,$nomC,$prenomC,$specialite,$motif){
  if(!empty($nomP) && !empty($date) && !empty($heure) && !empty($specialite) && !empty($nomC) && !empty($prenomC) && !empty($motif) ){
    ajouterRDV($date,$heure,$nomP,$nomC,$prenomC,$specialite,$motif);
    afficherAjoutRdv();

  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }
}
function CtlPaiementPatient($nss,$pay){
  if(!empty($nss) ){
      $requete="SELECT Solde from client where nss='$nss'";
      if($pay<$requete){
          $erreur="PAS ASSEZ DARGENT"; 
          CtlErreur($erreur,'2');
      }
      else{
        paiementpatient($pay,$nss);
        afficherPaiementpatient();
      }

  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }
}

function CtlDepotPatient($depot,$nss){
  if(!empty($nss) ){
    depotpatient($depot,$nss);
    afficherDepotpatient();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }
}

function CtlModifClient($Nss,$Nom,$Prenom,$Adresse_Patient,$Tel_Patient,$Date_Naissance,$Departement_Naissance){
  if (!empty($Adresse_Patient) && !empty($Tel_Patient) && !empty($Date_Naissance) && !empty($Departement_Naissance) && !empty($Nss) && !empty($Nom) && !empty($Prenom)) {
  modifierClient($Nss,$Nom,$Prenom,$Adresse_Patient,$Tel_Patient,$Date_Naissance,$Departement_Naissance);
  afficherModifClient();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'2');
  }
}

function CtlAjoutMedecin($Nom , $Prenom , $specialite){
  if (!empty($Nom) && !empty($Prenom) && !empty($specialite)){
    ajoutmedecin($Nom , $Prenom , $specialite);
    afficherAjoutMedecin();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'1');
  }
}

function CtlAjoutMotifPiece($libellemotif ,$prixmo,$piece){
  if (!empty($libellemotif) && !empty($prixmo) && !empty($piece)){
    ajoutMotif($libellemotif,$prixmo);
    ajoutPiece($piece);
    afficherAjoutMotifPiece();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'1');
  }
}

function CtlSuppMotifPiece($idMo,$id,$prix){
  if(!empty($idMo) && !empty($id) && !empty($prix)){
    supprimerMotif($idMo,$prix);
    supprimerPiece($id);
    afficherSuppMotifPiece();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'1');
  }
}

function CtlTacheAdmin($date,$li,$heure,$nom){
  if(!empty($date) && !empty($li) && !empty($heure) && !empty($nom)){
    ajouttache($date,$li,$heure,$nom);
    afficherAjoutTache();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'3');
  }
}

function CtlSupMedecin($nom){
  if(!empty($nom)){
    supprimerMedecin($nom);
    afficherSupMedecin();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'1');
  }
}

function CtlAjouterLogin($nom,$login,$mdp){
  if(!empty($nom) && !empty($login) && !empty($mdp)){
    creeLogin($nom,$login,$mdp);
    afficherAjoutLogin();
  }
  else{
    $erreur="Un des champs est vide"; 
    CtlErreur($erreur,'1');
  }
}

