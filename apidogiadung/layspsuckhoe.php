<?php 
require 'dbconnect.php';

class SPSUCKHOE
{
    public $macdsuckhoe;
    public $tensanpham;
    public $imgsanpham;
    
    function __construct($macdsuckhoe, $tensanpham, $imgsanpham)
    {
        $this->macdsuckhoe = $macdsuckhoe; 
        $this->tensanpham = $tensanpham;
        $this->imgsanpham = $imgsanpham;
    }
}
$querydata = mysqli_query($connect, 'select * from cdspsuckhoe');
$arraylist = array();
while($row = mysqli_fetch_assoc($querydata)){
    array_push($arraylist, new SPSUCKHOE($row['MACDSPSUCKHOE'],$row['TENSANPHAM'],$row['IMGSANPHAM'])
);
} 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arraylist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
mysqli_close($connect);
?>