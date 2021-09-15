<?php
include('config.php');
$sql = "SELECT tb_mahasiswa.mhs_nama from tb_mahasiswa, tb_mahasiswa_nilai, tb_matakuliah where tb_mahasiswa.mhs_id=tb_mahasiswa_nilai.mhs_id and tb_mahasiswa_nilai.mk_id=tb_matakuliah.mk_id AND tb_mahasiswa_nilai.nilai = (SELECT MAX(tb_mahasiswa_nilai.nilai) from tb_mahasiswa_nilai, tb_matakuliah where tb_matakuliah.mk_id=tb_mahasiswa_nilai.mk_id and tb_matakuliah.mk_kode='MK303')";
$run = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($run);
print_r($row['mhs_nama']);
?>