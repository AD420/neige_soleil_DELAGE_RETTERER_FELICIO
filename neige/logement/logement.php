<?php
session_start();
require("bddconnect.php");
if( isset( $_GET['idlogement'] ) and $_GET['idlogement'] > 0 )
{
  $reponse = $bdd->prepare('SELECT * FROM logement WHERE idlogement = ? AND status = "Valide";');
  $reponse->bindValue(1, $_GET['idlogement'], PDO::PARAM_INT);
  $reponse->execute();

  $data = $reponse->fetch();
  $reponse->closeCursor();
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../style.css" rel="stylesheet" type="text/css">
        <title><?php echo htmlspecialchars($data['titre']); ?></title>
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
      <div class="container">
        <div class="row">
            <div class="col-lg-4">
              <img width="300px" src="../profil/<?php echo $data['photo']; ?>"><br/>
              </div>
              <div class="col-lg-8">
    	<h3><span class="label label-info">Titre</span><?php echo stripslashes(htmlspecialchars($data['titre'])); ?>
        <br/>
        <span class="label label-info">Etage</span>
        <?php echo stripslashes(htmlspecialchars($data['etage'])); ?>
        <br/>
        <span class="label label-info">Region</span>
        <?php echo stripslashes(htmlspecialchars($data['emplacement'])); ?>
        <br/>
        <span class="label label-info">Taille (en m²)</span>
        <?php echo stripslashes(htmlspecialchars($data['taille'])); ?>
        <br/>
        <span class="label label-info">Prix (en €/jour)</span>
        <?php echo stripslashes(htmlspecialchars($data['prix'])); ?>
        <br/>
        <span class="label label-info">Caracteristiques</span>
        <?php echo stripslashes(htmlspecialchars($data['caracteristique'])); ?>
        <br/>
    </div>
  </div><center><?php
      if(isset($_SESSION['id']) AND $_SESSION['id'] > 0)
      {
        include("date.php");
      }
      else {
        echo "Vous devez vous connecter pour reserver";
      }
  ?></center>
      </div>
    </body>
</html>
