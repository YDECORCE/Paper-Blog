<?php
ob_start();
?>

<table class="table table-hover table-sm">
                <thead class="bg_entete_tab text-center">
                    <tr>
                        <th scope="col" style="width:28%">Nom</th>
                        <th scope="col" style="width:12%">Hospitalisés</th>
                        <th scope="col" style="width:12%">Réanimations</th>
                        <th scope="col" style="width:12%">Nouvelles Hospitalisations</th>
                        <th scope="col" style="width:12%">Nouvelles Réanimations</th>
                        <th scope="col" style="width:12%">Décès</th>
                        <th scope="col" style="width:12%">Guérisons</th>
                      
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                    foreach($datas as $data){
                        echo '<tr>';
                        echo '<td>'.$data["nom"].'</td>';
                        echo '<td>'.$data["hospitalises"].'</td>';
                        echo '<td>'.$data["reanimation"].'</td>';
                        echo '<td>'.$data["nouvellesHospitalisations"].'</td>';
                        echo '<td>'.$data["nouvellesReanimations"].'</td>';
                        echo '<td>'.$data["deces"].'</td>';
                        echo '<td>'.$data["gueris"].'</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
<?php
$table='';
$table=ob_get_clean();
require(plugin_dir_path(__DIR__) .'Vue/searchpage.php');
?>
