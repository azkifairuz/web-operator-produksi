<?php
    include("navbar.php");
    include("../koneksi.php");
    $id = $_GET['p'];
    $query = mysqli_connect($con,"SELECT * FROM `leader_kelola_operator` where `no`=$id")
?>