<?php
session_start();
include_once "../../koneksi.php";
if (!@$_SESSION['username']) {
  echo "<script>alert('Login Terlebih Dahulu');window.location.href='../../index.php'</script>";
}
$title = @$_GET['page'];
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../style/style.css">
  <link rel="stylesheet" href="../../style/bootstrap.min.css">
  <link rel="shortcut icon" href="../../assets/logoIcon.png" type="image/x-icon">
  <script src="../../javascript/bootstrap.bundle.min.js"></script>
  <style>
    * {
      text-decoration: none !important;
    }

    @media print {
      .navbar {
        display: none !important;
      }
    }
  </style>
  <title><?= $title ?></title>
</head>

<body>