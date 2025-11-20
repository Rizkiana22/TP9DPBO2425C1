<?php

interface KontrakModelTim{
    public function getAllTim(): array;
    public function getTimById($id): ?array;

    
    // method crud Tim
    public function addTim($namaTim, $negaraAsal, $tahunBerdiri): void;
    public function updateTim($id, $namaTim, $negaraAsal, $tahunBerdiri): void;
    public function deleteTim($id): void;
}
    