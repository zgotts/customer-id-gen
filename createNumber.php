<?php
$con = mysql_connect(//db_host,db_username, db_password);
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

$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = $_SERVER['REQUEST_TIME'];

$url = $_GET['url'];
$r_num=rand();
$found=true;

while($found==true) {
	$query = mysql_query("SELECT * FROM Table1 WHERE cid = ('$r_num') AND url = ('$url')");
	if (mysql_num_rows($query) > 0) {
		$r_num=rand();
	}
	else {
		$found=false;
	}
}
echo $callback . '('.json_encode($r_num).');';

?>