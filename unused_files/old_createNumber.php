<?php
$con = mysql_connect(//db_host, db_username, db_password);
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

mysql_select_db(//db_username, $con);

$callback = '';
if (isset($_GET['callback']))
{
	$callback = filter_var($_GET['callback'], FILTER_SANITIZE_STRING);
}

$r_num=rand();
$query = mysql_query("SELECT DISTINCT cid FROM Table1");
$data = array();
while($result = mysql_fetch_array($query))
	{
		$data[] = $result[0];
	}

if (in_array($r_num, $data)){
	do {
			$r_num = rand();
	} while(in_array($r_num, $data));
	echo $callback . '('.json_encode($r_num).');';
	mysql_query("INSERT INTO Table1 (cid) VALUES ('$r_num')");
}
else {
	echo $callback . '('.json_encode($r_num).');';
	mysql_query("INSERT INTO Table1 (cid) VALUES ('$r_num')");
}
?>