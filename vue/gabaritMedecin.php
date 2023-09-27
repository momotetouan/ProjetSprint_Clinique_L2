<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Medecin</title>
</head>

<body>
	<!--loading-->
  <script type="text/javascript">
			window.addEventListener("load", function () {
				const load = document.querySelector(".loading");
				load.className += " hidden";

			});
			</script>

			<div class="loading">
			<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
			</div>
			</div>
			<!--loading-->

			<div class="container">
			<div class="form" style="width:650px; height:auto;">
			<div class="icon" style="left: 290px;"><span><i class="fas fa-calendar-alt"></i></span></div>

			<form id="form" action="SPRINT.php" method="post">
				<table>
					<tr>
            <td><label for="">Libelle :</label><input type="text" name="libelle" value="" placeholder="" required></td>
						<td><label >Nom Médecin :</label><input type="text" name="medecin" value="" placeholder="Veillez inserer le nom" required></td>
						<td><label for="nbenf" name='nbc'>nombre de creneaux :</label><input type="number" min="0" max="23" placeholder="N°" name="nbc" onblur="ajouter(this);" required /></td>
					</tr>
					<tr>
						<td colspan="2"><div id="ajouter_creneaux"></div></td>
					</tr>
					<tr>
						<td colspan="2" style="border:none;"><button type="submit" name="envoyer">envoi</button>
							<button type="reset" name="del" style="background:#5F7373;">Effacer</button></td>
					</tr>
				</table>



			</form>
		</div>
		</div>
			<script>
			function ajouter(donnees_input_medecin) {

				var dateT =donnees_input_medecin.value;

				var contenu = "";

				for (var i = 1; i<= dateT ; i++){
					contenu = contenu+'<input type="date" name="dateT" style="padding-bottom: 10px;" required/><input type="number"  name="heureT" min="0" max="23" style="padding-bottom: 10px;" placeholder="Heure" required/><br/>';
				}
				document.getElementById('ajouter_creneaux').innerHTML = contenu;
			}
			</script>
      <form id="resultClient" action="SPRINT.php" method="post">
            <fieldset>
                <legend>Résultat de la recherche</legend>
                <?php echo $contenuAffichage; ?>
            </fieldset>
        </form>
  
		

	</body>


</body>

</html>