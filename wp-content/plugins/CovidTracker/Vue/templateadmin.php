<?php
require_once plugin_dir_path(__DIR__) . 'Controler/covidControler.php';
?>
<div class="container">
    <h1>Bienvenue sur le Plugin Covid Tracker</h1>
<div class="row">
    <form method="post">
        <button class="btn primary-btn" type="submit" name="action" value="maj">Mettre à jour la base de donnée</button>
    </form>
</div>
<div>
<form  method="post">
    <label for="shortcode-select">Choisir le shortcode à générer :</label>
    <select name="shortcode" id="shortcode">
            <option value="">Choisir un champ</option>
            <option value="departements">Afficher la situation COVID dans tous les départements</option>
            <option value="regions">Afficher la situation COVID dans toutes les régions</option>
            <option value="onedepartement">Afficher la situation COVID dans un département</option>
            <option value="oneregion">Afficher la situation COVID dans une région</option>
            <option value="searchbydepartement">Afficher le moteur  de recherche COVID pour les départements</option>
            <option value="searchbyregion">Afficher le moteur  de recherche COVID pour les départements</option>
    </select>
    <button class="btn primary-btn" type="submit" name="action" value="madeSC">Génerer</button>
</form>
</div>
<div id="result">


</div>
</div>
