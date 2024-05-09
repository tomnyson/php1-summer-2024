<?php

namespace opp2;

class Nguoi
{
    public $ten;
    public $tuoi;
    public $gioiTinh;
    public $diaChi;

    public function __construct($ten, $tuoi, $gioiTinh, $diaChi)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioiTinh = $gioiTinh;
        $this->diaChi = $diaChi;
    }
    function __destruct()
    {
        print("call destroy object");
    }
    public function xinchao()
    {
        print("xin chao $this->ten <br/>");
    }
}
