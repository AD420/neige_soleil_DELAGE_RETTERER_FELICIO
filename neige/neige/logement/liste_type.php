<?php
session_start();
require("bddconnect.php");

	$reponse = $bdd->prepare('SELECT * FROM type');
	$reponse->execute();
?>
<html>
	<head><!-- haut de la page -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="../style.css" rel="stylesheet" type="text/css">
		<title>Liste</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="nav-link active" href="../index.php"><img src="../images/logos.png" alt="neige&soleil" width="110px"></a>
		</div>
					<ul class="nav navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" href="liste_type.php">Catalogue</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="../apropos.php">A propos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="../contact.php">Contact</a>
						</li>
						<li class="nav-item" >
							<div class="alert alert-info" role="alert">
									<strong>-30% jusqu'au 03/06/2018</strong> sur les chalets familiales
							</div>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../profil/portail.php"><span class="glyphicon glyphicon-user"></span> Espace personnel</a></li>
					</ul>
				</div>
			</nav>
			<center>
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Accueil</a>
				</li>
			</ul>
		</br>
		<h1>Catégories</h1></br>
		<div class="list-group">
		<?php
		while ($donnees = $reponse->fetch())
		{
			echo'<a class="list-group-item active" href="type.php?idtype='.$donnees['idtype'].'">'.stripslashes(htmlspecialchars($donnees['nom'])).'</a></br>';
		}
		$reponse->closeCursor();

		if(isset($_SESSION['id']) AND $_SESSION['id'] > 0)
		{

		?>
			<h3>Verifier la disponibilité</h3></br>
			<form method ="post" action ="">
				<table>
					<tr>
						<td><label for="datearr">Date Debut : </label></td>
						<td><input type="date" name="datearr" required></td>
					</tr>
					<tr>
						<td><label for="datedep">Date Fin : </label></td>
						<td><input type="date" name="datedep" required></td>
					</tr>
				</table>
				</br>
					<button type="submit" class="btn btn-success" name="choisirdate">Valider</button>
			</form>
			<?php
		}
		else {
			echo "<h5>Vous devrez vous connecter pour reserver<h5>";
		} ?>
			</div>
		</center>
	</body>
</html>
