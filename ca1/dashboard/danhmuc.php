<?php
class DanhMuc {
    public $id;
    public $ten;
    public function __construct($id, $ten){
        $this->id = $id;
        $this->ten = $ten;
    }
    
    
    public function inThongTin(){
        print("id là " . $this->id);
        print("ten là " . $this->ten);

    }

    use opp\Nguoi as NguoiAlias;

    

    // error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $nguoi = new NguoiAlias("abc1", 12, "nam", "daklak");
    $nguoi->xinchao();



}



?>