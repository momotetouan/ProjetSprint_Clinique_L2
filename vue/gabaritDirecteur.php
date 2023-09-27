<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Directeur</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css"/>
	  
    </head>
	  
    </head>
    
	<body>	
		

		<form id="retour" action="SPRINT.php" method="post">
			<p><a href="SPRINT.php"> Se déconnecter </a></p>
		</form>
	
		<h1>INTERFACE DIRECTEUR</h1>

	    <div class="menu">
	   <div class="sidenav">
			<a href="#Personnel">Gestion Personnel</a>
			<a href="#Login">Gestion Login</a>
			<a href="#Sup">Supprimer Médecins</a>
			<a href="#Motif">Gestion Motif</a>
        </div>
	</div>
	<div class="main">
	<div class="gestion">
	
<form action="SPRINT.php" method="POST" id="Personnel">
        <fieldset>
            <legend>Ajouter un medecin</legend>
			<p><label for="">Nom du médecin</label><input type="text" name="nom"></p>
			<p><label for="">Prénomo du médecin</label> <input type="text" name="prenom"></p>
			<p><label for="">Spécialité du médecin</label><input type="text" name="spé"></p>
			<p><input type="submit" value="Ajouter un medecin" name= "ajouterMedecin" /> 
       </fieldset>
</form>


   
    
<form action="SPRINT.php" method="POST" id="Login">
    <fieldset>
            <legend>Créer ou modifier les logins et mdp</legend>
        <p><label for="">Nom  :</label> <input type="text" name="nom"></p>
        <p><label for="">LOGIN</label> <input type="text" name="login"></p>
        <p><label for=""> MDP</label><input type="text" name="mdp"></p>
		<p><input type="submit" value="Modifier info personnel" name= "modifierPersonnel" />
    </fieldset>
</form>  


    
    
    <form action="SPRINT.php" method="POST" id="Sup">
        <fieldset>
            <legend>supprimer  un médecin</legend>
                 <p><label for="">NOM  :</label> <input type="text" name="nom"></p>
				 <p><input type="submit" value="Supprimer un médecin" name= "supprimerMédecin" />
        </fieldset>
    </form>

    
    
    <form action="SPRINT.php" method="POST" id="Motif">
        <fieldset>
        <legend>Gestion motif</legend>
        <p><label for="">Libelle du Motif:</label> <input type="text" name="id_mot"></p>
        <p><label for="">Prix :</label> <input type="number" name="Prix"></p>
        <p><label for="">Pièce(s) à fournir :</label><input type="text" name="Pièce"></p>
        <p><input type="submit" value="Créer un Motif" name= "créer" />
        <p><input type="submit" value="Modifier un Motif" name= "modifier" />
        <p><input type="submit" value="Supprimer un Motif" name= "supp" />
       </fieldset>
    </form>

    
    
	   	
	</div>
	</div>
    <form id="resultClient" action="sprint.php" method="post">
            <fieldset>
                <legend>Résultat de la recherche</legend>
                <?php echo $contenuAffichage; ?>
            </fieldset>
        </form>
  
		

	</body>
</html>
