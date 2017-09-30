<?php
session_start();

if (isset($_GET["new"]) && $_GET["new"] == "true")
{
	session_destroy();

}

$products = array("benchmade" => 19.99, "buck" => 10.99, "spyderco" => 2.99);

//Add
if (isset($_GET["add"]))
{
	$item = $_GET["add"];
	if (!isset($_SESSION["in_cart"][$item])) 
	{
		$_SESSION["in_cart"][$item] = 1;
		$_SESSION["total"]++;
	}
}

?>

<!DOCTYPE html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/22207e5600.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/store.css">
</head>
<html>
	<body>
		<div id="header">
			<h1>SHOP</h1>

			<div id="cart">
				<a id="cart-link" href="cart.php">
					<i id="fa-cart" class="fa fa-shopping-cart fa-2x"></i>
					(<span id="cart-amount">
						<?php
							if (isset($_SESSION["total"])) 
							{
								echo $_SESSION["total"];
							}
							else
							{
								echo "0";
							}
						?>
					</span>)
				</a>
			</div>

			<ul>
			  <li><a href="../index.html">Home</a></li>
			  <li><a href="../assignments.html">Assignments</a></li>
			  <li><a id="current-page" href="">Current Week - Store</a></li>
			</ul>
		</div>

		<div id="body">
		<?php
			foreach ($products as $key => $price) {
				echo "<div id='cart-item'>";                   
				echo	"<span class='item-thumb'>";
				echo		"<img src='../img/".$key.".jpg'>";
				echo	"</span>";
				echo	"<div id='item-detail'>";
				echo		$key."<br>";
				echo 		"Price: ".$price;
				echo	"</div>";
				echo	"<div class='cart-add'>";

				if (isset($_SESSION["in_cart"][$key]))
				{
					echo "In Cart";
				}
				else
				{
					echo		"<a href=?add=".$key.">Add to cart</a>";
				}

				echo	"</div>";
				echo "</div>";
			}
		?>
		</div>
	</body>
</html>
