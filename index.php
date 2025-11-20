<?php

// ==== IMPORT SEMUA KELAS YANG DIPAKAI ====
include_once("models/DB.php");

include_once("models/TabelPembalap.php");
include_once("models/Pembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

include_once("models/TabelTim.php");
include_once("models/Tim.php");
include_once("views/ViewTim.php");
include_once("presenters/PresenterTim.php");

// ==== INISIALISASI MODEL, VIEW, PRESENTER ====
$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);

$tabelTim = new TabelTim('localhost', 'mvp_db', 'root', '');
$viewTim = new ViewTim();
$presenterTim = new PresenterTim($tabelTim, $viewTim);


// ==== ROUTER: MENENTUKAN HALAMAN ====
$page = $_GET['page'] ?? 'pembalap';
$screen = $_GET['screen'] ?? '';
$action = $_POST['action'] ?? '';


// ==== HTML NAVBAR ====
echo "
<nav style='padding:10px; background:#eee;'>
    <a href='index.php?page=pembalap'>Pembalap</a> |
    <a href='index.php?page=tim'>Tim</a>
</nav>
<hr>
";


// ==== ROUTING UTAMA ====
if ($page === 'pembalap') {

    // ---------------- FORM TAMBAH / EDIT ----------------
    if ($screen === 'add') {
        echo $presenterPembalap->tampilkanFormPembalap();
        exit;
    }
    if ($screen === 'edit' && isset($_GET['id'])) {
        echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
        exit;
    }

    // ---------------- Aksi CRUD ----------------
    if ($action === 'add') {
        $presenterPembalap->tambahPembalap(
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
        header("Location: index.php?page=pembalap");
        exit;
    }

    if ($action === 'edit') {
        $presenterPembalap->ubahPembalap(
            $_POST['id'],
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
        header("Location: index.php?page=pembalap");
        exit;
    }

    if ($action === 'delete') {
        $presenterPembalap->hapusPembalap($_POST['id']);
        header("Location: index.php?page=pembalap");
        exit;
    }

    // ---------------- TAMPILKAN LIST ----------------
    echo $presenterPembalap->tampilkanPembalap();
    exit;
}



// =============== PAGE TIM ===============
if ($page === 'tim') {

    // ---- FORM ADD / EDIT ----
    if ($screen === 'add') {
        echo $presenterTim->tampilkanFormTim();
        exit;
    }

    if ($screen === 'edit' && isset($_GET['id'])) {
        echo $presenterTim->tampilkanFormTim($_GET['id']);
        exit;
    }

    // ---- CRUD ----
    if ($action === 'add') {
        $presenterTim->tambahTim($_POST['namaTim'], $_POST['negaraAsal'], $_POST['tahunBerdiri']);
        header("Location: index.php?page=tim");
        exit;
    }

    if ($action === 'edit') {
        $presenterTim->ubahTim($_POST['id'], $_POST['namaTim'], $_POST['negaraAsal'], $_POST['tahunBerdiri']);
        header("Location: index.php?page=tim");
        exit;
    }

    if ($action === 'delete') {
        $presenterTim->hapusTim($_POST['id']);
        header("Location: index.php?page=tim");
        exit;
    }

    // ---- LIST ----
    echo $presenterTim->tampilkanTim();
    exit;
}

?>
