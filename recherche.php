<?php 
require_once('initialize.php');
?>
<?php 
include_once('./shared/header.php');
?>
<h3>Le Site des rencontres sportives</h3>

<form action="recherche.php" method="post">
  <!-- 1er groupe -->
<fieldset>
  <legend>Recherche des partenaires</legend>
  <table>
    <tbody>
      <!-- ligne 1 -->
      <tr>
        <td>Sport Pratiqué:</td>
        <td>
          <select name="designation">
            <option value="NULL"> Choisissez !</option>
            <?php 
            // creation dynamique de la liste de séléction
            //connexion 
            // lire la table sport
            $requete = "SELECT id_sport , designation FROM sport ORDER BY designation";
            $result = $connexion->query($requete);
            if($result){
              while($row = $result->fetch()) {
                echo "<option value=".$row[0].">".$row[1]."</option>";
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <!-- ligne 2 -->
      <tr>
        <td>Niveau:</td>
        <td>
          <select name="niveau" >
            <option value="1">Débutant</option>
            <option value="2">Confirmé</option>
            <option value="3">Pro</option>
            <option value="4">Supporter</option>
          </select>
        </td>
      </tr>
      <!-- ligne 3 -->
      <tr>
        <td>Département:</td>
        <td>
          <select name="departement" >
            <option value="NULL"> Choisissez !</option>
          <?php 
          $result = $connexion->query("SELECT departement FROM personne");
          if($result){
            while($row = $result->fetch()){
              $tabdepartement[] = $row[0];
            }
            $tabdepartement = array_unique($tabdepartement);
            sort($tabdepartement);
            $count = count($tabdepartement);
            for($i=0;$i < $count;$i++) {
              echo "<option value=".$tabdepartement[$i].">".$tabdepartement[$i]."</option>";
            }
          }
          ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="envoie" value="Rechercher">
        </td>
          <td>
            <input type="reset" name="efface" value="Effacer">
        </td>
      </tr>
    </tbody>
  </table>
</fieldset>
</form>

<?php 
if(isset($_POST['envoie'])){
  if(!$connexion){
    echo 'ERREUR: $erreur <br>';
  }
  else {
    $niveau = $_POST['niveau'];
    $designation = $_POST['designation'];
    $departement = $_POST['departement'];

    $req = "SELECT nom, prenom, email, designation FROM personne, pratique, sport 
    WHERE personne.id_personne = pratique.id_personne AND sport.id_sport = pratique.id_sport AND pratique.niveau = $niveau AND sport.id_sport = $designation AND personne.departement = $departement";
    $result = $connexion->query($req);
    echo "<table border=\"1\" rules=\"rows\" width=\"100%\">";
    echo "<tr><th colspan=\"3\"> Liste des partenaires disponibles </th>";
    while ($row = $result->fetch()) {
       echo "<tr><td>" .$row['prenom']. "</td><td>" .$row['nom']. "</td><td>" .$row['email']. "</td></tr>";
    }
    echo "</table>";
     }
  }

?>