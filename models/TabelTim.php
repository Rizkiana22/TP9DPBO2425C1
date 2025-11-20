<?php

include_once ("models/DB.php");
include_once ("KontrakModelTim.php");

class TabelTim extends DB implements KontrakModelTim {
    // Konstruktor untuk inisialisasi database
    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    public function getAllTim(): array {
        $query = "SELECT * FROM tim";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    public function getTimById($id): ?array {
        $this->executeQuery("SELECT * FROM tim WHERE id = :id", ['id' => $id]);
        $result = $this->getAllResult();
        return $result[0] ?? null;
    }

    public function addTim($namaTim, $negaraAsal, $tahunBerdiri): void {
        $query = "INSERT INTO tim (namaTim, negaraAsal, tahunBerdiri) 
                  VALUES (:namaTim, :negaraAsal, :tahunBerdiri)";

        $params = [
            'namaTim' => $namaTim,
            'negaraAsal' => $negaraAsal,
            'tahunBerdiri' => $tahunBerdiri
        ];
        $this->executeQuery($query, $params);
    }

    public function updateTim($id, $namaTim, $negaraAsal, $tahunBerdiri): void {
        $query = "UPDATE tim 
                  SET namaTim = :namaTim, negaraAsal = :negaraAsal, tahunBerdiri = :tahunBerdiri 
                  WHERE id = :id";
        
        $params = [
            'id' => $id,
            'namaTim' => $namaTim,
            'negaraAsal' => $negaraAsal,
            'tahunBerdiri' => $tahunBerdiri
        ];
        $this->executeQuery($query, $params);
    }

    public function deleteTim($id): void {
        $query = "DELETE FROM tim WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
    }
}