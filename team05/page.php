<?php
	$db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=123");

	$result = pg_query($db_connection, "SELECT * FROM scriptures");

	echo "<ul>";
	while ($row = pg_fetch_assoc($result))
	{
		echo "<li><b>". $row['book'] ." ". $row['chapter'] . ": " . $row['verse']. "</b> - \"".$row['content']."\"<br></li>";
	}
	echo "</ul>";

	?>