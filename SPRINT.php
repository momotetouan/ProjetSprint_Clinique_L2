<?php
				require_once('controleur/controleur.php'); // charge les méthodes du contrôleur
				try {
					
					if (isset($_POST['Con'])){ // si on a cliqué sur "Connexion"
						$id=$_POST['Login'];
						$mdp=$_POST['Mdp'];

						CtlCategorie($id,$mdp);
						
						//CtlCategorie($id,$mdp);
						 // appel du contrôleur qui gère chaque catégorie d'employé
				
					}
					elseif(isset($_POST['Ajouter'])){
						$solde=$_POST['solde'];
						$n=$_POST['nom'];
						$p=$_POST['prenom'];
						$a=$_POST['adr'];
						$te=$_POST['num'];
						$da=$_POST['datenaissance'];
						$de=$_POST['departement'];
						if($de=='99'){
						$pays=$_POST['pays'];
						}
						else{
							$pays='';
						}
						$nss=$_POST['nss'];
						CtlAjoutPatient($te,$a,$da,$de,$pays,$solde,$n,$p,$nss);
					}
					elseif(isset($_POST['synth'])){
						$nss=$_POST['nss'];
						CtlSynthese($nss);
					}
					elseif(isset($_POST['cherche'])){
						$n=$_POST['nom'];
						$p=$_POST['prenom'];
						$dn=$_POST['ddn'];
						CtlRechercheClient($n,$p,$dn);
					
					}
					elseif(isset($_POST['RDV'])){
						$nomP=$_POST['Médecin'];
						$nomC=$_POST['nomP'];
						$prenomC=$_POST['prenomP'];
						$date=$_POST['daterdv'];
						$heure=$_POST['heurerdv'];
						$motif=$_POST['motifRdv'];
						$specialite=$_POST['specialite'];
						CtlRdv($date,$heure,$nomP,$nomC,$prenomC,$specialite,$motif);
					
					}
					elseif(isset($_POST['valider'])){
                        $nss=$_POST['nss'];
                        $pay=$_POST['montant'];
                        CtlPaiementPatient($nss,$pay);


                    }
					elseif(isset($_POST['deposer'])){
                        $nss=$_POST['nss'];
                        $depot=$_POST['montantdep'];
                        CtlDepotPatient($depot,$nss);
                    }
					elseif(isset($_POST['Modifier'])){
                        $Nom=$_POST['nom'];
						$nss=$_POST['nss'];
                        $Prenom=$_POST['prenom'];
                        $Adresse_Patient=$_POST['adr'];
						$Date_Naissance=$_POST['datenaissance'];
                        $Departement_Naissance=$_POST['departement'];
                        $Tel_Patient=$_POST['num'];
						if(is_numeric($Tel_Patient)==false){
							$erreur="numéro invalide";
  							CtlErreur($erreur,'2');
						}
						else{
							CtlModifClient($nss,$Nom,$Prenom,$Adresse_Patient,$Tel_Patient,$Date_Naissance,$Departement_Naissance);
						}
                        
                       
                    }
					elseif(isset($_POST['ajouterMedecin'])){
						$Nom=$_POST['nom'];
                        $Prenom=$_POST['prenom'];
						$specialite=$_POST['spé'];

						CtlAjoutMedecin($Nom , $Prenom , $specialite);
					}
					elseif(isset($_POST['créer'])){
						$libelle=$_POST['id_mot'];
                        $prix=$_POST['Prix'];
						$piece=$_POST['Pièce'];

						CtlAjoutMotifPiece($libelle ,$prix,$piece);
						
					}
					elseif(isset($_POST['supp'])){
						$libelle=$_POST['id_mot'];
                        $prix=$_POST['Prix'];
						$id=$_POST['Pièce'];

						CtlSuppMotifPiece($libelle,$id,$prix);
						
					}
					elseif(isset($_POST['envoyer'])){
						$libelle=$_POST['libelle'];
                       
						$nom=$_POST['medecin'];
						
						$nbc=$_POST['nbc'];
						for ($i = 1; $i<= $nbc ; $i++){
							$heure=$_POST['heureT'];
							$date=$_POST['dateT'];
						CtlTacheAdmin($date,$libelle,$heure,$nom);
						}
						
					}
					elseif(isset($_POST['supprimerMédecin'])){
						$nom=$_POST['nom'];
                       

						CtlSupMedecin($nom);
						
					}

					elseif(isset($_POST['modifierPersonnel'])){
						$nom=$_POST['nom'];
						$login=$_POST['login'];
						$mdp=$_POST['mdp'];
						

						CtlAjouterLogin($nom,$login,$mdp);
						
					}
					
						
					

					else CtlAcceuil();
				
				}

				catch(Exception $e) {
					$msg = $e->getMessage() ; 
					CtlErreur($msg,null); // on appelle le contrôleur qui gère les erreurs.
				}

				