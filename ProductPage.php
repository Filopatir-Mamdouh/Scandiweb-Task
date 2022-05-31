<?php
	include 'AutoLoader.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Css/ProductPage.css">
	<title>Product List</title>
</head>
<body>
    <?php 
        // Deleting Items
        if (isset($_POST['inputData'])){
            $inputData= $_POST['inputData'];
            $delete = new ItemController;
            $result = $delete->delete($inputData);
        }
    ?>
	<header class="hdr">
			<h3 class="pr">Product List</h3>
			<div class="btn">
			<a href="ProductAdd.php"><button>ADD</button></a>
			<button id="delete-product-btn" form="products" type="submit">MASS DELETE</button>
			</div>
			<hr>		
	</header>
<form action="<?=  $_SERVER['PHP_SELF'] ?>" method="post" id="products">  	<!--Table-->
	    
		<?php 
			$items = new ItemController;
			$result = $items->display();
			$i=0;
			//Displaying the form as a table
			foreach ($result as $row) {
			//Inserting a new row every 4 cells
			if ($i == 0){
			echo "<div class='TableRow'>";
			$i=4;
			}
			?>
			
			<div class="item">
			    <input type="checkbox" name="inputData[ ]" value=<?= "'".$row['sku']."'" ?> class="delete-checkbox">
							<p class="text"><?= $row['sku']?><br>
							<?= $row['name']?><br>
							<?= $row['price']?> $<br>
							<?= $row['type'] .": ". $row['unit']?></p>
		</div>
		<?php
		    $i--;
    		    if ($i == 0){
    		        echo "</div>";
    		    }
			}

		?>
		</form>
	
	<?php 
	 include("footer.php");
	 ?>
</body>
</html>