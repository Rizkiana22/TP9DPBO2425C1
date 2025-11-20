<?php

include_once(__DIR__ . "/KontrakPresenterTim.php");
include_once(__DIR__ . "/../models/TabelTim.php");
include_once(__DIR__ . "/../models/Tim.php");
include_once(__DIR__ . "/../views/ViewTim.php");

class PresenterTim implements KontrakPresenterTim
{
    // Model TabelTim untuk operasi database
    private $tabelTim; // Instance dari TabelTim (Model)
    private $viewTim; // Instance dari ViewTim (View)

    // Data list tim
    private $listTim = []; // Menyimpan array objek Tim

    public function __construct($tabelTim, $viewTim) {
        $this->tabelTim = $tabelTim;
        $this->viewTim = $viewTim;
        $this->initListTim();
    }

    // Method untuk initialisasi list tim dari database
    public function initListTim(){
        $data = $this->tabelTim->getAllTim();

        // Buat objek Tim dan simpan di listTim
        $this->listTim = [];
        foreach ($data as $item) {
            $tim = new Tim(
                $item['id'],
                $item['namaTim'],
                $item['negaraAsal'],
                $item['tahunBerdiri']
            );
            $this->listTim[] = $tim;
        }
    }

    // Method untuk menampilkan daftar tim menggunakan View
    public function tampilkanTim(): string{
        return $this->viewTim->tampilTim($this->listTim);
    }

    // Method untuk menampilkan form
    public function tampilkanFormTim($id = null): string {
        $data = null;
        if($id !== null) {
            $data = $this->tabelTim->getTimById($id);
        }
        return $this->viewTim->tampilFormTim($data);
    }

    // Method untuk menambah tim
    public function tambahTim($namaTim, $negaraAsal, $tahunBerdiri): void {
        $this->tabelTim->addTim($namaTim, $negaraAsal, $tahunBerdiri);
        $this->initListTim(); // Refresh list setelah penambahan
    }

    // Method untuk mengubah tim
    public function ubahTim($id, $namaTim, $negaraAsal, $tahunBerdiri): void {
        $this->tabelTim->updateTim($id, $namaTim, $negaraAsal, $tahunBerdiri);
        $this->initListTim(); // Refresh list setelah perubahan
    }

    // Method untuk menghapus tim
    public function hapusTim($id): void
    {
        $this->tabelTim->deleteTim($id);
        $this->initListTim(); // Refresh list setelah penghapusan
    }

}