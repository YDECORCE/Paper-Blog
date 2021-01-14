<?php
ob_start();
?>
<style>
.bg_entete_tab{
    background-color: rgb(245,134,84);
    color: white;
    /*font-weight: bolder;*/
    text-align: center;
}
</style>
<div class="date">
<p>Situation COVID à la date du <?=$datas[0]["date"]?></p>
</div>
<div>
    <h2>le moteur de recherche</h2>
    
    <!-- <label for="table-select">Afficher les données par :</label>
    <select name="format" id="table-select">
            <option value="">Choisir l'affichage</option>
            <option value="DEP">Départements</option>
            <option value="REG">Régions</option>
    </select>
    <button class="btn primary-btn" type="submit" name="action" value="showtable">Afficher</button>
    </form> -->
    <div>
    <form action="" method="get">
    <label for="table-select">Afficher les données de :</label>
    <?php
    if ($s=='departement'){
        liste_déroulante("'DEP%'");}
    elseif($s=='region'){
        liste_déroulante("'REG%'");}
    else{
        echo "pas de recherche possible";}
        ?>
    <button class="btn primary-btn" type="submit" name="action" value="show">Afficher</button>
    </form>
    </div>
</div>

<?php
if(isset($table)){echo $table;}    





$html=ob_get_clean();
?>