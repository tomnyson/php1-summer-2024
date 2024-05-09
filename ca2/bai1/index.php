<?php

/**
 * ConNguoi (cccd, ten, gioitinh, tuoi, cannang)
 * hanh dong: an, ngu, lamviec
 */
class Nguoi
{
    public $cccd;
    public $ten;
    public $gioitinh;
    public $tuoi;
    public $cannag;

    function __construct($cccd, $ten, $gioitinh, $tuoi, $cannag)
    {
        $this->cccd = $cccd;
        $this->ten = $ten;
        $this->gioiTinh = $gioitinh;
        $this->tuoi = $tuoi;
        $this->cannag = $cannag;
    }
    public function xuatThongTin()
    {
        print("cccd: $this->cccd <hr/>");
        print("ten: $this->ten");
    }
}

$tai = new Nguoi("123456", "Tai", "Nam", 21, 70);
$tai->xuatThongTin();


class SinhVien extends Nguoi
{
    public $mssv;
    public $nganh;
    public $dtb;

    function __construct($cccd, $ten, $gioitinh, $tuoi, $cannag, $mssv, $nganh, $dtb)
    {
        parent::__construct($cccd, $ten, $gioitinh, $tuoi, $cannag);
        $this->mssv = $mssv;
        $this->nganh = $nganh;
        $this->dtb = $dtb;
    }

    public function xuatThongTinSv()
    {
        print("cccd: $this->cccd <hr/>");
        print("ten: $this->ten");
    }
}

$sv1 = new SinhVien("12345", "sinh vien a", "nam", 20, 70, "pk1223", "cntt", 8.0);
$sv1->xuatThongTin();
$sv1->xuatThongTinSv();