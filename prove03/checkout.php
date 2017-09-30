<?php


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
      <h1>Checkout</h1>

      <ul>
        <li><a href="../index.html">Home</a></li>
        <li><a href="../assignments.html">Assignments</a></li>
        <li><a href="store.php">Store</a></li>
      </ul>
    </div>

    <div id="body">
      <form id="checkout-form" action="confirm.php" method="post">
        <input type="text" name="first_name" placeholder="First Name" required><br>
        <input type="text" name="last_name" placeholder="Last Name" required><br>
        <input type="text" name="addr1" placeholder="Address line 1" required><br>
        <input type="text" name="addr2" placeholder="Address line 2 (optional)"><br>
        <input type="text" name="city" placeholder="City" required><br>
        <input type="text" name="state" placeholder="State" required><br>
        <input type="text" name="zip" placeholder="Zip" required><br>
        <input type="text" name="country" placeholder="Country" required><br>
        <input type="submit" value="Continue">
      </form>
    </div>
  </body>
</html>