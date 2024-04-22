<?php 
require 'dbconnect.php';
$macd = $_POST['macdsanpham'];
if(isset($macd)){
    $query = "select *from allsanpham where MACDSANPHAM ='$macd'";
}else{
    $query = "select * from allsanpham";
}
class ALLSANPHAM
{
    public $masanpham;
    public $tensanpham;
    public $dongia;
    public $mota;
    public $imgsanpham;
    public $macdsanpham;
    public $cuahangcon;
    public $xuatxu;
    public $baohanh;
    
    function __construct($masanpham, $tensanpham, $dongia, $mota, $imgsanpham, $macdsanpham, $cuahangcon, $xuatxu, $baohanh)
    {
        $this->masanpham = $masanpham; 
        $this->tensanpham = $tensanpham;
        $this->dongia = $dongia;
        $this->mota = $mota;
        $this->imgsanpham = $imgsanpham;
        $this->macdsanpham = $macdsanpham;
        $this->cuahangcon = $cuahangcon;
        $this->xuatxu = $xuatxu;
        $this->baohanh = $baohanh;
    
    }
}
$querydata = mysqli_query($connect, $query);
$arraylist = array();
while($row = mysqli_fetch_assoc($querydata)){
    array_push($arraylist, new ALLSANPHAM($row['MASANPHAM'],$row['TENSANPHAM'],$row['DONGIA'],$row['MOTA'],$row['IMGSANPHAM'],$row['MACDSANPHAM'],$row['CUAHANGCON'],$row['XUATXU'],$row['BAOHANH'])
);
} 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arraylist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
mysqli_close($connect);
?>