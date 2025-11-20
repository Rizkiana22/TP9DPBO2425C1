<?php

include_once ("KontrakViewTim.php");
include_once ("models/Tim.php");

class ViewTim implements KontrakViewTim{
    public function __construct(){
        // Konstruktor kosong
    }

    // Method untuk menampilkan daftar pembalap
    public function tampilTim($listTim): string{
        // Build table rows
        $tbody = '';
        $no = 1;
        foreach($listTim as $tim){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($tim->getNamaTim()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($tim->getNegaraAsal()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($tim->getTahunBerdiri()) .'</td>';
            $tbody .= '<td class="col-actions">
                    <a href="index.php?page=tim&screen=edit&id='. $tim->getId() .'" class="btn btn-edit">Edit</a>
                    <button data-id="'. $tim->getId() .'" class="btn btn-delete">Hapus</button>
                  </td>';
            $tbody .= '</tr>';
            $no++;
        }
        // Load the page template and inject rows + total count
        $templatePath = __DIR__ . '/../template/skinTim.html';
        $template = '';
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $total = count($listTim);
            $template = str_replace('Total:', 'Total: ' . $total, $template);
            return $template;
        }
        // Fallback: just return the rows if template is missing
        return $tbody;
    }


    // Method untuk menampilkan form tambah/ubah tim
    public function tampilFormTim($data = null): string{
        $template = file_get_contents(__DIR__ . '/../template/formTim.html');
        if ($data){
            $template = str_replace('value="add" id="tim-action"', 'value="edit" id="tim-action"', $template);
            $template = str_replace('value="" id="tim-id"', 'value="' . htmlspecialchars($data['id']) . '" id="tim-id"', $template);
            $template = str_replace('id="namaTim" name="namaTim" type="text" placeholder="Nama tim"', 'id="namaTim" name="namaTim" type="text" placeholder="Nama tim" value="' . htmlspecialchars($data['namaTim']) . '"', $template);
            $template = str_replace('id="negaraAsal" name="negaraAsal" type="text" placeholder="Negara (mis. Indonesia)"', 'id="negaraAsal" name="negaraAsal" type="text" placeholder="Negara (mis. Indonesia)" value="' . htmlspecialchars($data['negaraAsal']) . '"', $template);
            $template = str_replace('id="tahunBerdiri" name="tahunBerdiri" type="number" min="1800" step="1" placeholder="Tahun berdiri"', 'id="tahunBerdiri" name="tahunBerdiri" type="number" min="1800" step="1" placeholder="Tahun berdiri" value="' . htmlspecialchars($data['tahunBerdiri']) . '"', $template);
        }
        return $template;
    }
}