<?php

session_start();

$_SESSION["user"]["first_name"] = $_POST["first_name"];
$_SESSION["user"]["last_name"] = $_POST["last_name"];
$_SESSION["user"]["addr1"] = $_POST["addr1"];
$_SESSION["user"]["addr2"] = $_POST["addr2"];
$_SESSION["user"]["city"] = $_POST["city"];
$_SESSION["user"]["state"] = $_POST["state"];
$_SESSION["user"]["zip"] = $_POST["zip"];
$_SESSION["user"]["country"] = $_POST["country"];


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
      <h1>Confirm</h1>
    </div>

    <div id="body">
      <?php
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "  <td></td>";
        echo "  <td>Item</td>";
        echo "  <td>Price</td>";
        echo "  <td>Qty</td>";
        echo "</tr>";
        echo "</thead>";

        foreach ($_SESSION["in_cart"] as $item => $qty)
        {
          echo "<tr>";
          echo "<td><img height='50px' src='../img/".$item.".jpg'></td>";
          echo "<td>".$item."</td>";
          echo "<td>".$products[$item]."</td>";
          echo "<td>";

          echo "<td>".$qty."</td>";
        }

        echo "<tr>";
        echo "<td>Total</td>";
        echo "<td></td>";
        echo "<td>".$_SESSION["total_cost"]."-</td>";
        echo "<td>".$_SESSION["total"]."</td>";
        echo "</tr>";

        echo "</table>";

        echo $_SESSION["user"]["first_name"]." ".$_SESSION["user"]["last_name"]."<br>";
        echo $_SESSION["user"]["addr1"]."<br>";
        if (!empty($_SESSION["user"]["addr2"]))
          echo $_SESSION["user"]["addr2"]."<br>";
        echo $_SESSION["user"]["city"].", ".$_SESSION["user"]["zip"]." ".$_SESSION["user"]["state"]."<br>";
        echo $_SESSION["user"]["country"]."<br>";

        ?>

        <a id='confirm' href='store.php?new=true'>confirm</a>
    </div>
  </body>
</html>