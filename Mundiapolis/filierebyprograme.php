<?php
include_once("manager/connection.php");
$connect = new Connect();
$p = $_GET['p'];
$sql = "SELECT filiere.code_Filiere,filiere.nom_Filiere,filiere.Description
                FROM programmefiliere,filiere,programme
                where programme.id_Programme =$p
                and programmefiliere.code_Filiere = filiere.code_Filiere
                and programmefiliere.id_programme = programme.id_Programme";
$connect->connect();
$query = Connect::$mysqli->query($sql);
if ($query->num_rows > 0) {
    ?>

    <p>Filière<br/>
        <select multiple style="height: 150px;font-weight: bold" name="codeFiliere">
            <?php
            while ($filieresp = $query->fetch_assoc()) { ?>
                <option value="<?php echo $filieresp['code_Filiere'];?>"><?php echo $filieresp['nom_Filiere']; ?></option>
            <?php } ?>
        </select>
    </p>

<?php
}
    ?>