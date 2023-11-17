<?php 
    include 'connexion.php';
    if (isset($_GET['supprimerID'])){
        $id=$_GET['supprimerID'];

        $sql = "DELETE FROM `membre` WHERE `ID_membre` = '$id'";
        $result = mysqli_query($connexion,$sql);
        if ($result) {
            echo "Deleted Successfully";
        }else{
            die(mysql_error($connexion));
        }
    }

   
