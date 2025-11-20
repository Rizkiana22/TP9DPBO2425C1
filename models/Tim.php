<?php

class Tim {
    private $id;
    private $namaTim;
    private $negaraAsal;
    private $tahunBerdiri;

    public function __construct($id, $namaTim, $negaraAsal, $tahunBerdiri){
        $this->id = $id;
        $this->namaTim = $namaTim;
        $this->negaraAsal = $negaraAsal;
        $this->tahunBerdiri = $tahunBerdiri;
    }

    public function getId() {
        return $this->id;
    }

    public function getNamaTim() {
        return $this->namaTim;
    }

    public function getNegaraAsal() {
        return $this->negaraAsal;
    }

    public function getTahunBerdiri() {
        return $this->tahunBerdiri;
    }

    public function setNamaTim($namaTim){
        $this->namaTim = $namaTim;
    }

    public function setNegaraAsal($negaraAsal){
        $this->negaraAsal = $negaraAsal;
    }

    public function setTahunBerdiri($tahunBerdiri){
        $this->tahunBerdiri = $tahunBerdiri;
    }
}