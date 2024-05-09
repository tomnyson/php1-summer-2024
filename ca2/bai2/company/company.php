<?php

namespace Company;

class Company
{
    public $maNV;
    public $tenNV;
    public function __construct($maNV, $tenNV, public $phongban, public $luongcoban = 50000, public $phucap)

    {
        $this->maNV = $maNV;
        $this->tenNV = $tenNV;
        $this->phongban = $phongban;
        $this->luongcoban = $luongcoban;
        $this->phucap = $phucap;
    }
    public function xuatThongTin()
    {
        print("maNV: $this->maNV <hr/>");
        print("tenNV: $this->tenNV <hr/>");
        print("phongban: $this->phongban <hr/>");
        print("phucap $this->phucap <hr/>");
        print("luongcoban $this->luongcoban <hr/>");
    }
}
