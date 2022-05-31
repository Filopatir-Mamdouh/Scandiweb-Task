<?php
	include('AutoLoader.php');
	// Inserting the item
	if (isset($_POST) && !empty($_POST)){
	    $db = new DatabaseConnection;
	     $inputData = [
        'sku' => mysqli_real_escape_string($db->conn,$_POST['sku']),
        'name' => mysqli_real_escape_string($db->conn,$_POST['name']),
        'price' => mysqli_real_escape_string($db->conn,$_POST['price']),
        'type' => mysqli_real_escape_string($db->conn,$_POST['type']),
        'unit' =>$_POST['unit'],
        ];
    
        $item = new ItemController;
        $result = $item->create($inputData);
        
        if($result)
        {
            header("Location: Product Page.php");
        }
        else
        {
            ?>
            <script>
                alert('Something went wrong please try again');
            </script>
            <?php
            header("location: Product Add.php");
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Css/ProductAdd.css">
	<title>Product Add</title>
</head>
<body>
	<header class="hdr">
			<h3 class="pr">Product Add</h3>
			<div class="btn">
			<button form="product_form" type="submit">Save</button>
			<a href="ProductPage.php"><button>Cancel</button></a>
			</div>
			<hr>		
	</header>
	<form id="product_form" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
		<label for="SKU">SKU</label>
		<input type="text" name="sku" id="sku" required><br><br>
		
		<label for="Name">Name</label>
		<input type="text" name="name" id="name" required><br><br>
		
		<label for="Price">Price </label><input type="number" name="price" id="price" min="0" required><br><br>
		<label for="Type Switcher">Type Switcher</label>
		<select name="type" id="productType" required onchange="typeListener()">
		    <option value="" disabled selected>Type Switcher</option>
  			<option value="Size" id="DVD">DVD</option>
  			<option value="Dimension" id="Furniture">Furniture</option>
  			<option value="Weight" id="Book">Book</option>
		</select><br><br>
												
		<div id="Hidden_Div1" class="Type">
            <label for="Size">Size (MB)</label>
            <input type="number" name="unit[]" id="size" min="0"><br><br>
            <h5>Please, provide size in MB.</h5><br>
        </div>
        
        <div id="Hidden_Div2" class="Type">
            <label for="Height">Height (CM)</label>
            <input type="number" name="unit[]" id="height" min="0"><br><br>
            
            <label for="Width">Width (CM)</label>
            <input type="number" name="unit[]" id="width" min="0"><br><br>
            
            <label for="Length">Length (CM)</label>
            <input type="number" name="unit[]" id="length" min="0"><br><br>
            
            <h5>Please, provide dimensions in CM.</h5><br>
        </div>
        
        <div id="Hidden_Div3" class="Type">
            <label for="Weight">Weight (KG)</label>
            <input type="number" name="unit[]" id="weight" min="0"><br><br>
            <h5>Please, provide weight in KG.</h5><br>
        </div>
	</form>
	
	<script type="text/javascript">
    function typeListener() {
    var type = document.getElementById("productType").value;
    if (type == "Size"){
        document.getElementById("Hidden_Div1").style.display = 'block';
        document.getElementById("size").removeAttribute("disabled");
        document.getElementById("size").setAttribute("required", "");
    } else {
        document.getElementById("Hidden_Div1").style.display = 'none';
        document.getElementById("size").setAttribute("disabled", "");
        document.getElementById("size").removeAttribute("required");
    }
    if (type == "Dimension"){
        document.getElementById("Hidden_Div2").style.display = 'block';
        document.getElementById("height").removeAttribute("disabled");
        document.getElementById("width").removeAttribute("disabled");
        document.getElementById("length").removeAttribute("disabled");
        document.getElementById("height").setAttribute("required", "");
        document.getElementById("width").setAttribute("required", "");
        document.getElementById("length").setAttribute("required", "");
    } else {
        document.getElementById("Hidden_Div2").style.display = 'none';
        document.getElementById("height").setAttribute("disabled", "");
        document.getElementById("width").setAttribute("disabled", "");
        document.getElementById("length").setAttribute("disabled", "");
        document.getElementById("height").removeAttribute("required");
        document.getElementById("width").removeAttribute("required");
        document.getElementById("length").removeAttribute("required");
    }
    if (type == "Weight"){
        document.getElementById("Hidden_Div3").style.display = 'block';
        document.getElementById("weight").removeAttribute("disabled");
        document.getElementById("weight").setAttribute("required", "");
    } else {
        document.getElementById("Hidden_Div3").style.display = 'none';
        document.getElementById("weight").setAttribute("disabled", "");
        document.getElementById("weight").removeAttribute("required");
    }
}
</script>

	<?php 
	 include("footer.php");
	 ?>
	 
</body>
</html>