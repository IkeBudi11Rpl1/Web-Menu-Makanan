<?php
  session_start();
  include "koneksi.php";
  $nama_member	= $_POST['nama_member'];
  $kode_kelas	  = $_POST['kode_kelas'];
  $telp         = $_POST['telp'];

  $namaBaru = date('dmYHis');
  $img 	    = $_FILES['img']['name'];
  if($img !=""){$img = $namaBaru.$_FILES['img']['name'];};
  $temp	    = $namaBaru.$_FILES['img']['tmp_name'];

  $sql = "INSERT INTO tbl_member(nama_member, kode_kelas, telp, photo) VALUES('$nama_member', '$kode_kelas', '$telp', '$img')";
  $hsl=mysqli_query($koneksi, $sql);
  if($hsl==1){
    move_uploaded_file($_FILES['img']['tmp_name'], "img/".$img);
    $_SESSION['info'] = 'Disimpan';
  }
 header("location:registrasi-member.php");
?>
