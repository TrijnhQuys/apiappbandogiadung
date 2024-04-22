<?php 
require 'dbconnect.php';

class SPGIADUNGBEP
{
    public $macdgiadung;
    public $tensanpham;
    public $imgsanpham;
    
    function __construct($macdgiadung, $tensanpham, $imgsanpham)
    {
        $this->macdgiadung = $macdgiadung; 
        $this->tensanpham = $tensanpham;
        $this->imgsanpham = $imgsanpham;
    }
}
$querydata = mysqli_query($connect, 'select * from cdspgiadungbep');
$arraylist = array();
while($row = mysqli_fetch_assoc($querydata)){
    array_push($arraylist, new SPGIADUNGBEP($row['MACDSPGIADUNG'],$row['TENSANPHAM'],$row['IMGSANPHAM'])
);
} 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arraylist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
mysqli_close($connect);
?>