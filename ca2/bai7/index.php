<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class SinhVien
{
    public $mssv;
    public $tensv;
    public $nganh;
    private $dtb;

    // ham khoi tao
    function __construct($mssv, $tensv, $nganh, $dtb)
    {
        // $this 
        $this->mssv = $mssv;
        $this->tensv = $tensv;
        $this->nganh = $nganh;
        $this->dtb = $dtb;
    }
    // get set
    function get_dtb()
    {
        return $this->dtb;
    }

    function set_dtb($dtb)
    {
        return $this->dtb = $dtb;
    }

    function inThongTin()
    {
        echo "----------------------------------------------------------------";
        echo "mssv = " . $this->mssv . "</br>";
        echo "tensv = " . $this->tensv . "</br>";
        echo "nganh = " . $this->nganh . "</br>";
        echo "dtb = " . $this->dtb . "</br>";
    }
    // xep loai dtb
    function xepdiem()
    {
        if ($this->dtb >= 8) {
            echo "Hoc sinh Gioi";
        } else if ($this->dtb >= 6.5) {
            echo "Hoc sinh Kha";
        } else if ($this->dtb >= 5) {
            echo "hoc sinh Trung binh";
        } else {
            echo "hoc sinh yeu ";
        }
    }
}

$chau = new SinhVien("pk03815", "Chau", "CNTT", 8);
echo "DTB = " . $chau->get_dtb() . "</br>";
$chau->set_dtb(9);
$chau->inThongTin();
$tuan = new SinhVien("pk03811", "Tuan", "CNTT", 9);
$tuan->inThongTin();

$tuan->set_dtb(5);
$tuan->xepdiem();
