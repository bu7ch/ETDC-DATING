<?php 
require_once('initialize.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Super site de rencontre sportive</title>
</head>
<body>
  <?php 
  include('./shared/header.php')
  ?>

  <section>

  <?php 
  // Vérification des cookies
  if(isset($_COOKIE['nom'])){
    $nom = $_COOKIE['nom'];
    $prenom = $_COOKIE['prenom'];
    $message = " <h3> Bonjour $prenom $nom </h3>";
    $link1 ="<a href=\"recherche.php\" title=\"Recherche\"><button type=\"button\">Rechercher des partenanires </button></a>";
    $link2 ="<a href=\"ajout.php\ title=\"S'insccrire\"><button type=\"button\">S'insccrire pour un sport </button></a>";
  }
    if(isset($_POST["email"])){
      $email = strtolower($_POST["email"]);
      $req= "SELECT * FROM personne WHERE email = '$email'";
      $result = $connexion->query($req);
      $row = $result->fetch();
      if($row){
        $message = "<h3>Bonjour $row[2] $row[1]</h3>";
        $link1 ="<a href=\"recherche.php\" title=\"Recherche\"><button type=\"button\">Rechercher des partenanires </button></a>";
        $link2 ="<a href=\"ajout.php\ title=\"S'insccrire\"><button type=\"button\">S'insccrire pour un sport </button></a>";
        // creation de cookies
        setcookie("nom", $row[1], time() + 30*24*3600);
        setcookie("prenom", $row[2], time() + 30*24*3600);
    }
  }
  ?>
  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"> 
  <fieldset>
    <legend>Identification</legend>
    <label for="email">Votre email:
    <input type="text" name="email" id="email">
    </label>
    <input type="submit" value="Envoi">
  </fieldset>
  </form>
  <a href="ajout.php" title="S'inscrire"><button type="button"> S'inscrire </button></a> <br>
  <?php 
  echo "<p><b> Vous pourrez accédez à la page de recherche ou vous inscrire dans un autre sport après vous être identifié </b><br> $link1   $link2"
  
  ?>
  </section>
  
  <?php 
  include('./shared/footer.php')
  ?>
</body>
</html>