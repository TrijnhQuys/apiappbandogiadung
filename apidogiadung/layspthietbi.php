<?php 
require 'dbconnect.php';

class SPTHIETBI
{
    public $macdthietbi;
    public $tensanpham;
    public $imgsanpham;
    
    function __construct($macdthietbi, $tensanpham, $imgsanpham)
    {
        $this->macdthietbi = $macdthietbi; 
        $this->tensanpham = $tensanpham;
        $this->imgsanpham = $imgsanpham;
    }
}
$querydata = mysqli_query($connect, 'select * from cdspthietbi');
$arraylist = array();
while($row = mysqli_fetch_assoc($querydata)){
    array_push($arraylist, new SPTHIETBI($row['MACDSPTHIETBI'],$row['TENSANPHAM'],$row['IMGSANPHAM'])
);
} 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arraylist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
mysqli_close($connect);
?>