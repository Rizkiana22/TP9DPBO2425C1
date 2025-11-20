<?php

require_once __DIR__ . '/../models/DB.php';

interface KontrakPresenterTim{
    // method untuk tampilkan tim
    public function tampilkanTim(): string;

    // method untuk tampilkan form tim
    public function tampilkanFormTim($id = null): string;

    // method untuk CRUD tim
    public function tambahTim($namaTim, $negaraAsal, $tahunBerdiri): void;
    public function ubahTim($id, $namaTim, $negaraAsal, $tahunBerdiri): void;
    public function hapusTim($id): void;
}