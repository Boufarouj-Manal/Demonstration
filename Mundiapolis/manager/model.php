<?php
session_start();
include_once("connection.php");

class Model extends Connect
{

    public static $mysqli = null;
    private $nbrNiveau = 0;

    public function __construct()
    {
        self::$mysqli = parent::connect();
    }

    public function getProgramme()
    {
        $sql = "SELECT * FROM programme";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getFilierByProgramme($codeProgramme)
    {
        $sql = "SELECT * FROM programmefiliere where id_Programme =$codeProgramme";
        $query = self::$mysqli->query($sql);
        return $query;
    }
    public function getFiliere($codeFilier)
    {
        $sql = "SELECT * FROM filiere ";
        if ($codeFilier != null) {
            $sql .= "where code_Filiere='$codeFilier'";
        }
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getmatieresemestre($codeFiliere)
    {
        $sql = "  SELECT * FROM filierematieresp fmr , filiere f , semestre s ,matiere m
				where fmr.code_Filiere ='$codeFiliere' 
				and f.code_Filiere = fmr.code_Filiere 
				and s.id_Semestre = fmr.id_Semestre 
				and m.code_Matiere = fmr.code_Matiere order by fmr.id_Semestre";
        $query = self::$mysqli->query($sql);
        return $query;
    }


    public function getMatiere($codeFiliere)
    {
        $sql = "  SELECT * FROM filierematieresp fmr , filiere f , semestre s ,matiere m
				where fmr.code_Filiere ='$codeFiliere'
				and f.code_Filiere = fmr.code_Filiere
				and s.id_Semestre = fmr.id_Semestre
				and m.code_Matiere = fmr.code_Matiere order by fmr.id_Semestre";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getMatiereByCodeMat($codeMat)
    {
        $sql = "  SELECT * FROM matiere where code_Matiere ='$codeMat'";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getSubMatiere($matiere_Prerequis)
    {

        $sql = "  SELECT * FROM matiere_pre_requise where matiere_Prerequis ='$matiere_Prerequis'";
        $query = self::$mysqli->query($sql);
        return $query;
    }


    public function countLevel()
    {
        return $this->nbrNiveau++;
    }

    public function getinfoMatByCodeMat($codeMat){

        $sql = "  SELECT * FROM matiere where code_Matiere ='$codeMat'";
        $query = self::$mysqli->query($sql)->fetch_assoc();
        return $query;
    }

    public function getMatiereByCode($code_Matiere)
    {
        
        $sql = "  SELECT * FROM matiere_pre_requise mpr,matiere m
                  WHERE
                  m.code_Matiere = '$code_Matiere'
                  and
                  m.code_Matiere = mpr.code_Matiere ";
        $query = self::$mysqli->query($sql);

        while ($matiere = $query->fetch_assoc()) {
            $mt = self::getinfoMatByCodeMat($matiere['matiere_Prerequis']);
            echo "<li><ul><span id='subMat'>" . "<a href=matiere.php?matCode=" . $matiere['matiere_Prerequis'] . ">" .  $mt['libelle_matiere'] . "</li></a></span>";
            $reqSubMatiere = self::getSubMatiere($matiere['matiere_Prerequis']);
            while ($suMatiere = $reqSubMatiere->fetch_assoc()) {
                self::getMatiereByCode($suMatiere['matiere_Prerequis']);
            }
            echo "</ul>";
        }

    }

    public function getPreRequis($code_Matiere)
    {
        $sql = "  SELECT * FROM prerequismatiere where code_Matiere ='$code_Matiere'";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getCompetencematiere($code_Matiere)
    {
        $sql = "  SELECT * FROM competencematiere where code_Matiere ='$code_Matiere'";
        $query = self::$mysqli->query($sql);
        return $query;
    }


    public function getSubCat($id_Categorie_Mere)
    {

        $sql = "  SELECT * FROM categorie where id_Categorie_Mere =$id_Categorie_Mere";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getCategorieByCode($id_Categorie)
    {
        $sql = "  SELECT * FROM categorie where id_Categorie =$id_Categorie";
        $query = self::$mysqli->query($sql);
        while ($categorie = $query->fetch_assoc()) {
                echo "<ul><span id='subMat'>" . $categorie['libelle_Categorie'] . "</span>";
            $reqSubCategorie = self::getSubCat($categorie['id_Categorie']);
            while ($subCategorie = $reqSubCategorie->fetch_assoc()) {
                self::getCategorieByCode($subCategorie['id_Categorie']);
            }
            echo "</ul>";
        }
    }

    public function getUser($userName =null, $pwd = null)
    {
        $sql = "SELECT * FROM user ";
        if ($userName != null && $pwd != null){
            $sql .=  " where login='$userName' and mp ='$pwd' ";
        }
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function addUser($userName,$email ,$pwd,$profile)
    {
        $sql = "INSERT INTO user VALUES(null,'$userName','$email','$pwd','$profile')";
        $query = self::$mysqli->query($sql);
        return $query;
    }



    public function getAllMatiere($matPrerequise = null)
    {
        $sql = "SELECT * FROM matiere ";
        if ($matPrerequise == "isnull"){
            $sql.="where matiere_Prerequis is null";
        }
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function addMatiere($code_Matiere, $libelle_matiere, $objectif)
    {
        $sql = "INSERT INTO matiere(code_Matiere,libelle_matiere,objectif)  VALUES('$code_Matiere','$libelle_matiere','$objectif')";
        self::$mysqli->query($sql);
    }

    public function addMatiereAndMatierePreRequise($code_Matiere, $matierePreRequises)
    {
        foreach($matierePreRequises as $matierePrerequise){
            $sql = "INSERT INTO  matiere_pre_requise VALUES ('$code_Matiere','$matierePrerequise')";
            self::$mysqli->query($sql);
        }
    }



    public function addCompetenceMatiere($code_Matiere, $id_Categories)
    {
        foreach ($id_Categories as $id_Categorie) {
            $sql = "INSERT INTO competencematiere VALUES($id_Categorie,'$code_Matiere')";
            $query = self::$mysqli->query($sql);
        }
        return $query;
    }

    public function addprerequismatiere($code_Matiere, $id_Categories)
    {
        foreach ($id_Categories as $id_Categorie) {
            $sql = "INSERT INTO prerequismatiere VALUES($id_Categorie,'$code_Matiere')";
            $query = self::$mysqli->query($sql);
        }
        return $query;
    }

    public function addfilierematieresp($code_Matiere, $code_Filiere, $id_Semestre, $id_Programme)
    {
        $sql = "INSERT INTO filierematieresp VALUES('$code_Matiere','$code_Filiere',$id_Semestre,$id_Programme)";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getAllCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getSemistre()
    {
        $sql = "SELECT * FROM semestre";
        $query = self::$mysqli->query($sql);
        return $query;
    }

    public function getFiliereByCodePogramme($codeProgramme)
    {
        $sql = "SELECT filiere.code_Filiere,filiere.nom_Filiere,filiere.Description
                FROM programmefiliere,filiere,programme
                where programme.id_Programme =1
                and programmefiliere.code_Filiere = filiere.code_Filiere
                and programmefiliere.id_programme = programme.id_Programme";
        $query = self::$mysqli->query($sql);
        return $query;
    }
}

?>