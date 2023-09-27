<?php

function afficherErreur($erreur,$idCat=null){							// Affiche l'erreur sur la page d'acceuil
	$contenuAffichage='<p>'.$erreur.'</p>
	<form id="erreurClient" action="SPRINT.php" method="post">
	</form>';
	if ($idCat==1) {
		require_once('gabaritDirecteur.php');
	} elseif ($idCat==2) {
        require_once('gabaritAgent.php');
	} elseif ($idCat==3) {
		require_once('gabaritMedecin.php');
	} else {
		require_once('gabarit.php');
	}
}



function afficherAgent(){								//Affiche la page de l'Agent
	$contenuAffichage='' ;
	require_once('gabaritAgent.php');
}

function afficherMedecin(){							//Affiche la page du Conseiller
	$contenuAffichage='' ;
	require_once('gabaritMedecin.php');
}

function afficherDirecteur(){							//Affiche la page du Directeur
	$contenuAffichage='' ;
	require_once('vue/gabaritDirecteur.php');
}

function afficherAcceuil(){								//Affiche l'accueil pour se connecter
	$contenuAffichage='' ;
	require_once('gabarit.php');
}


function afficherAjouterClient(){                                //Affiche un message comme quoi le client a été ajouté
    $contenuAffichage='<fieldset> Patient ajouté avec succès ! </fieldset>';
    require_once('gabaritAgent.php');
}

function afficherSynthese($patient){
    $contenuAffichage=' ' ;
    foreach ($patient as $ligne){
        $contenuAffichage.= '<p><label>Identifiant du Client : </label><input type="text" id="Id" name="id" readonly="readonly" value="'.$ligne->IdCl. '" :> </p>
                            <p><label>Nom : </label><input type="text" id="Nom" name="nom" readonly="readonly" value=" '.$ligne->nomC.'"></p>
                            <p><label>Prenom : </label><input type="text" id="Prenom" name="prenom" readonly="readonly" value=" '.$ligne->prenomC.'"></p>
                            <p><label>Date de naissance : </label><input type="text" id="DateNaissance" name="datenaissance" readonly="readonly" value=" '.$ligne->DateN.'"></p>
                            <p><label>Département de naissance : </label><input type="text" id="dep" name="dep" readonly="readonly" value=" '.$ligne->DepN.'"></p>
                            <p><label>Pays : </label><input type="text" id="pays" name="pays" readonly="readonly" value=" '.$ligne->PaysN.'"></p>
                            <p><label>Adresse : </label><input type="text" id="Adresse" name="adresse" readonly="readonly" value=" '.$ligne->Adresse.'"></p>
                            <p><label>Numéro de téléphone : </label><input type="text" id="NumTel" name="numtel" readonly="readonly" value=" '.$ligne->NumTel.'"></p>
                            <p><label>NSS : </label><input type="text" id="nss" name="nss" readonly="readonly" value=" '.$ligne->nss.'"></p>
                            <p><label>Solde : </label><input type="text" id="solde" name="solde" readonly="readonly" value=" '.$ligne->Solde.'"></p></br>';
                            
}
    require_once('gabaritAgent.php');
    }


function afficherNss($nss){
    $contenuAffichage='';
    foreach($nss as $ligne){
    $contenuAffichage.='<p><label>NSS : </label><input type="text" id="nss" name="nss" readonly="readonly" value=" '.$ligne->nss.'"></p>';
}
require_once('gabaritAgent.php');
}


function afficherPaiementpatient(){                                //Affiche un message comme quoi le solde a été modifié
    $contenuAffichage='<fieldset> Solde modifié avec succès ! </fieldset>';
    require_once('gabaritAgent.php');
}

function afficherDepotpatient(){
    $contenuAffichage='<fieldset> Dépôt effectué avec succès ! </fieldset>';
    require_once('gabaritAgent.php');
}

function afficherModifClient(){                                //Affiche un message comme quoi le client a été modif
    $contenuAffichage='<fieldset> Patient modifié avec succès ! </fieldset>';
    require_once('gabaritAgent.php');
}

function afficherAjoutMedecin(){                                //Affiche un message comme quoi le client a été modif
    $contenuAffichage='<fieldset> Medecin ajouté avec succès ! </fieldset>';
    require_once('gabaritDirecteur.php');
}

function afficherAjoutMotifPiece(){                                //Affiche un message comme quoi le client a été modif
    $contenuAffichage='<fieldset> motif crée avec succès ! </fieldset>';
    require_once('gabaritDirecteur.php');
}

function afficherSuppMotifPiece(){
    $contenuAffichage='<fieldset> motif supprimée avec succès ! </fieldset>';
    require_once('gabaritDirecteur.php');
}

function afficherAjoutTache(){
    $contenuAffichage='<fieldset> tache ajoutée avec succès ! </fieldset>';
    require_once('gabaritMedecin.php');
}

function  afficherSupMedecin(){
    $contenuAffichage='<fieldset> medecin supprimé avec succès ! </fieldset>';
    require_once('gabaritDirecteur.php');
}

function afficherAjoutLogin(){
    $contenuAffichage='<fieldset> login ajouté avec succès ! </fieldset>';
    require_once('gabaritDirecteur.php');
}

function afficherAjoutRdv(){
    $contenuAffichage='<fieldset> rendez-vous ajouté avec succès ! </fieldset>';
    require_once('gabaritAgent.php');
}