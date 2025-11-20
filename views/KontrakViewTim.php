<?php
interface KontrakViewTim{
    public function tampilTim($listTim): string;
    public function tampilFormTim($data = null): string;
}