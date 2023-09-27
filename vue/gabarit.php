<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Clinique</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css"/>
	  
	  
    </head>
	  
    </head>
    
	<body>	
	
	
	
	   	<form id="forumAcceuil" action="SPRINT.php" method="post">
			<fieldset>
				<legend>Connexion</legend>
				<p><label> Login : </label><input type="text" name="Login" /></p>
				<p><label> Mot de passe: </label><input type="password" name="Mdp" /></p>
				<p><input type="submit" value="Connexion" name= "Con" /> 
				<input type="reset" value="Tout effacer" name= "effacer" /></p>
				<p><?php echo $contenuAffichage; ?></p>
			</fieldset>
		</form>
		
  
		

	</body>
</html>