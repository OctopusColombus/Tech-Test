<?php

include('services/config.php');

$id = $_GET['id'];

$query = "DELETE FROM instansi WHERE id ='$id'";

if($conn->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>