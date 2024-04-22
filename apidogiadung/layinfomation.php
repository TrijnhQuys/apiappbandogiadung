<?php 
require 'dbconnect.php';

class INFOMATION
{
    public $maif;
    public $noidungif;
    public $quaif;
    public $motaif;
    
    function __construct($maif, $noidungif, $quaif, $motaif)
    {
        $this->maif = $maif; 
        $this->noidungif = $noidungif;
        $this->quaif = $quaif; 
        $this->motaif = $motaif; 

    }
}
$querydata = mysqli_query($connect, 'select * from infomation');
$arraylist = array();
while($row = mysqli_fetch_assoc($querydata)){
    array_push($arraylist, new INFOMATION($row['MAIF'],$row['NOIDUNGIF'],$row['QUAIF'],$row['MOTAIF'])
);
} 
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arraylist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
mysqli_close($connect);
?>