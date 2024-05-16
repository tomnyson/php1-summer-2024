<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 *  Nguoi, sinhvien
 * nguoi: ten, tuoi, gioi tinh, dia chi
 * Sinhvien: mssv, lop, dtb
 */
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
    public function xinchao()
    {
        print("xin chao $this->ten <br/>");
    }
}

class Sinhvien extends Nguoi
{
    public $ma;
    public $lop;
    public $dtb;
    public function __construct($ten, $tuoi, $gioiTinh, $diaChi, $ma, $lop, $dtb)
    {
        parent::__construct($ten, $tuoi, $gioiTinh, $diaChi);
        $this->ma = $ma;
        $this->lop = $lop;
        $this->dtb = $dtb;
    }

    public function inDiem()
    {
        /**
         * dt diem 0-10
         * yeu, kem, tb, kha, gioi, xuat sac
         */
        $this->diem = $diem;
        if ($diem > 10 && $diem < 0) {
        } else if ($diem > 3) {
            echo "yeu";
        } else if ($diem > 5) {
            echo "tb";
        } else if ($diem > 7) {
            echo "kha";
        } else if ($diem > 9) {
            echo "gioi";
        } else {
            echo "xuat xac";
        }


        print("xin chao $this->dtb <br/>");
    }
}

$hau =  new Sinhvien("Hau", 18, "N/A", "Daklak", "pk0374", "wd19301", 7.5);
$hau->xinchao();
$vu =  new Sinhvien("Vu", 18, "N/A", "Daklak", "pk0368", "wd19301", 7.5);
$vu->xinchao();