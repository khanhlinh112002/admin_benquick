<?php
include_once 'db_connect.php';
$idPost =  $_GET["idPost"];
$sql1 = "DELETE FROM photos WHERE idPost='" . $idPost . "'";
$sql2 = "DELETE FROM post WHERE idPost='" . $idPost . "'";
$res1 = mysqli_query($conn, $sql1);
$res2 = mysqli_query($conn, $sql2);
if ($res2) {
    if(is_dir('assets/uploads/'.$idPost)){
        $gal = scandir('assets/uploads/'.$idPost);
        unset($gal[0]);
        unset($gal[1]);
        foreach($gal as $k=>$v){
            unlink('assets/uploads/'.$idPost.'/'.$v);
        }
        rmdir('assets/uploads/'.$idPost);
    }
    echo "Record deleted successfully";
    header('Location: admin.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>