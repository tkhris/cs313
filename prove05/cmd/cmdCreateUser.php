<?php
if (isset($_POST['username']) && isset($_POST['password']))
{
	$db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=123");

	// $db_connection = pg_connect("host=ec2-54-225-88-191.compute-1.amazonaws.com dbname=d6g13tr9767jlv user=npasxllojhqdym password=df9180a75cdb4fb5f4da337bee7daa3ba79cdd39442e56d81c300bc6b895f241");

	$result = pg_query($db_connection, "SELECT * FROM scriptures");
}

?>