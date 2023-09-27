<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Agent</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css"/>
    </head>
	  
    </head>
    
	<body>	
	
		<form id="retour" action="SPRINT.php" method="post">
			<p><a href="SPRINT.php"/> Se déconnecter </a></p>
		</form>
	
		<h1>INTERFACE AGENT</h1>
		
		
		<form id="Ajouter patient" action="SPRINT.php" method="post">
			<fieldset>
				<legend> Ajout d'un patient </legend>
				<p><label>Nom : </label><input type="text" name="nom" /></p>
                <p><label>Prénom : </label><input type="text" name="prenom" /></p>
				<p><label>Adresse : </label><input type="text" name="adr"  /></p>
				<p><label>Nméro de téléphone : </label><input type="tel" name="num" maxlength="10"></p>
				<p><label>Date de naissance : </label><input type="date" name="datenaissance"  /></p>
				<p><label>Département : </label><input type="number" id="dep" name="departement" onblur="pays();" maxlength="2"  /></p>
				

				<p id="p"></p>
				<script>
					function pays(){
					departement=document.getElementById('dep').value;
					if(departement==99){
						document.getElementById('p').innerHTML='<label>Pays : </label><input type="text" id="pays" name="pays"  />';
					}
					
				}
				</script>
				<p><label>NSS : </label><input type="text" name="nss" maxlength="15" /></p>
				
				<p><label>Solde : </label><input type="number" id="solde" name="solde"  /></p>
				<p><input type="submit" value="Ajouter" name= "Ajouter"  /> </p>
			</fieldset>
		</form>
        
		<form id="synthese" action="sprint.php" method="post">
			<fieldset>
				<legend> Synthèse patient </legend>
				<p><label>NSS : </label><input type="text" name="nss" maxlength="15" /></p>
               
				<p><input type="submit" value="Voir synthèse" name= "synth" /> 
			</fieldset>
		</form>
		
		<form id="recherche" action="sprint.php" method="post">
			<fieldset>
				<legend> Recherche d'un patient </legend>
				<p><label>Nom : </label><input type="text" name="nom" /></p>
                <p><label>Prénom : </label><input type="text" name="prenom" /></p>
				<p><label>Date de naissance : </label><input type="date" name="ddn" /></p>
				<p><input type="submit" value="Chercher client" name= "cherche" /> 
			</fieldset>
		</form>

		

		<form action="SPRINT.php" method="post">
            <fieldset>
                <legend>Paiement du patient</legend>
                        <p><label for="">NSS : </label> <input type="text" name="nss"></p>
                        <p><label for="" >Montant : </label> <input type="number" name="montant" /></p>
                        <p><input type="submit" value="Valider" name= "valider" /> 

            </fieldset> 
       </form>

       <form action="SPRINT.php" method="post">
            <fieldset>
                <legend>Dépôt Patient</legend>
                        <p><label for="">NSS : </label> <input type="text" name="nss"></p>
                        <p><label for="" >Montant du dépôt : </label> <input type="number" name="montantdep" step="10" /></p>
                        <p><input type="submit" value="Deposer" name= "deposer" /> 

            </fieldset>

       </form>
	   
	   	<form method="post" action="sprint.php">
		<fieldset>
			<legend>Rendez-vous</legend>
				<p><label for="" >Médecin : </label> <input type="text" name="Médecin" /></p>
				<p><label for="" >Spécialité : </label> <input type="text" name="specialite" /></p>
				<p><label for="" >Nom patient : </label> <input type="text" name="nomP" /></p>
                <p><label for="" >Prenom patient : </label> <input type="text" name="prenomP" /></p>
                <p><label for="" >Date : </label> <input type="date" name="daterdv" /></p>
				<p><label for="" >Heure : </label><input type="number" min="0" max="23" name="heurerdv" value="" placeholder="HH" required></p>
				<p><label for="" >Motif : </label> <input type="text" name="motifRdv" /></p>
                

                </div>
				<p><input type="submit" name="RDV" value="Ajouter RDV" /></p>
			</fieldset>
		</form>
        <form id="Modifier patient" action="sprint.php" method="post">
            <fieldset>
                <legend> Modifier les informations du patient </legend>
				<p><label>NSS : </label><input type="text" name="nss"  maxlength="15" /></p>
                <p><label>Nom : </label><input type="text" name="nom" /></p>
                <p><label>Prénom : </label><input type="text" name="prenom" /></p>
                <p><label>Adresse : </label><input type="text" name="adr"  /></p>
                <p><label>Numéro de téléphone : </label><input type="tel" name="num" maxlength="10"></p>
                <p><label>Date de naissance : </label><input type="date" name="datenaissance"  /></p>
                <p><label>Département : </label><input type="number" name="departement"  /></p>
                <p><input type="submit" value="Modifier" name= "Modifier"  /> </p>
            </fieldset>
        </form>
		
		<form id="resultClient" action="sprint.php" method="post">
			<fieldset>
				<legend>Résultat de la recherche</legend>
				<?php echo $contenuAffichage; ?>
			</fieldset>
		</form>

		
		

        
		

  
		

	</body>
</html>