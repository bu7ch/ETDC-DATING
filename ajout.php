<?php 
include_once('./shared/header.php');
?>

<form action="ajout.php" method="post">
  <!-- 1er groupe -->
  <fieldset>
    <legend>Vos coordonnées</legend>
    <table>
      <tbody>
        <tr>
          <td>Nom:</td>
          <td><input type="text" name="nom" size="30"></td>
        </tr>
        <tr>
          <td>Prénom:</td>
          <td><input type="text" name="prenom" size="30"></td>
        </tr>
        <tr>
          <td>Département:</td>
          <td><input type="text" name="depart" size="30"></td>
        </tr>
        <tr>
          <td>Mail:</td>
          <td><input type="text" name="mail" size="30"></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <!-- 2ieme groupe -->
  <fieldset>
  <legend>Vos pratiques sportives</legend>
  <table>
    <tbody>
      <!-- selection des sports -->
      <tr>
        <td>Sport pratiqué:</td>
        <td>
          <select name="design">
            <option value="NULL">Choisissez le sport !</option>;
            <?php 
            // creation dynamique de la liste de séléction
            //connexion 
            // lire la table sport
            ?>
          </select>
        </td>
      </tr>
    </tbody>
  </table>
  </fieldset>
</form>