<?php
  session_start();
  include "koneksi.php";
  $kode_member  = $_POST['kode_member'];
  $nama_member  = $_POST['nama_member'];
  $telp         = $_POST['telp'];
  $photo        = $_POST['photo'];
  

  $namaBaru = date('dmYHis');
  $img 	    = $_FILES['img']['name'];
  if($img !=""){$img = $namaBaru.$_FILES['img']['name'];};
  $temp	    = $namaBaru.$_FILES['img']['tmp_name'];

  if($img==""){
    $sql = "UPDATE tbl_member SET 
      nama_member = '$nama_member',
      telp        = '$telp'
    WHERE kode_member = '$kode_member' AND kode=1";
  }else{
    $_SESSION['info'] = 'Diupdate';
    $sql = "UPDATE tbl_member SET 
      nama_member = '$nama_member',
      photo       = '$img',
      telp        = '$telp'
    WHERE kode_member = '$kode_member' AND kode=1";
    unlink("img/".$photo);
    move_uploaded_file($_FILES['img']['tmp_name'], "img/".$img);
  }
  mysqli_query($koneksi, $sql);
  header("location:registrasi-member.php");
?>
