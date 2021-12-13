<?php
//proteksi halaman admin dengan fungsi cek loin yang ada di simple Login
$this->simple_mahasiswa->cek_login();
//gabungkan semua bagian layout jadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
