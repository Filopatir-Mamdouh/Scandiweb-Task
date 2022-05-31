<?php
class DatabaseConnection
{
    public function __construct()
    {
        $conn = mysqli_connect("","id18820488_scandiweb","@0M6fP6-CY}CI*QR","id18820488_task");
        return $this->conn = $conn;
    }
    public function disconnect(){
    	mysqli_close($conn);
    }
}

?>