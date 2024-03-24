<?php
include_once "navbar.php";
switch (@$_GET['page']) {
  case "dashboard":
    include_once "dashboard.php";
    break;
    // OUTLET SECTION
  case "view_outlet":
    include_once "outlet.php";
    break;
  case "add_outlet":
    include_once "../input/tambah_outlet.php";
    break;
  case "update_outlet":
    include_once "../update/update_outlet.php";
    break;
    // PAKET SECTION
  case "view_paket":
    include_once "paket.php";
    break;
  case "add_paket":
    include_once "../input/tambah_paket.php";
    break;
  case "update_paket":
    include_once "../update/update_paket.php";
    break;
    // USER SECTION
  case "view_user":
    include_once "user.php";
    break;
  case "add_user":
    include_once "../input/tambah_user.php";
    break;
  case "update_user":
    include_once "../update/update_user.php";
    break;
    // MEMBER SECTION
  case "view_member":
    include_once "member.php";
    break;
  case "add_member":
    include_once "../input/tambah_member.php";
    break;
  case "update_member":
    include_once "../update/update_member.php";
    break;
    // LAPORAN SECTION
  case "view_laporan":
    include_once "laporan.php";
    break;
  case "add_laporan":
    include_once "../input/tambah_laporan.php";
    break;
  case "update_laporan":
    include_once "../update/update_laporan.php";
    break;
    // TRANSAKSI SECTION
  case "view_transaksi":
    include_once "transaksi.php";
    break;
  case "cetak_transaksi":
    include_once "cetak_transaksi.php";
    break;
  case "detail_transaksi":
    include_once "detail_transaksi.php";
    break;
  case "add_transaksi":
    include_once "../input/tambah_transaksi.php";
    break;
  case "update_transaksi":
    include_once "../update/update_transaksi.php";
    break;
    // DETAIL TRANSAKSI SECTION
  case "view_detail_transaksi":
    include_once "detail_transaksi.php";
    break;
  case "update_detail_transaksi":
    include_once "../update/update_detail_transaksi.php";
    break;
  case "add_detail_transaksi":
    include_once "../input/tambah_detail_transaksi.php";
    break;
}
