<?php

class ItemController
{
	    public function __construct()
	    {
	        $dataBase = new DatabaseConnection;
	        $this->conn = $dataBase->conn;
	    }

	    public function display()
	    {
	        $displayQuery = "SELECT * FROM items";
	        $result = mysqli_query($this->conn, $displayQuery);
	            return $result; 
	    }

		public function create($inputData)
    	{
	        $sku = $inputData['sku'];
	        $name = $inputData['name'];
	        $price = $inputData['price'];
	        $type = $inputData['type'];
	        $unit = $inputData['unit'];
	        $finalUnit = "";
	        if (count($unit) > 2){
	            $finalUnit = $unit[0] . "x".$unit[1]."x".$unit[2];
	        }
	        else 
	            $finalUnit.=$unit[0];
	        $insertQuery = "INSERT INTO items VALUES ('".$sku."','".$name."','".$price."','".$type."','".$finalUnit."')";
	        $result = mysqli_query($this->conn, $insertQuery);
            header("location: Product Page.php");
    	}
    	
    	public function delete($inputData){
    	    for ($i=0 ; $i<sizeof($inputData);$i++){
    	        $deleteQuery = "DELETE FROM items WHERE sku = '".$inputData[$i]."' LIMIT 1";
    	        $result = $this->conn->query($deleteQuery);
    	    }
    	}
}
?>