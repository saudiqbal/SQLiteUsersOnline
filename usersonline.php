<?php
$IPaddress = $_SERVER["REMOTE_ADDR"];
$UsersOnlinetime=time();
$time_check=$UsersOnlinetime-900; // Time = 60 * Minutes, Example: 10 minutes = 60 * 10 = 600.

//open the database
$db = new PDO('sqlite:UsersOnline.db');

// add new visitor
$db->exec("INSERT INTO UsersOnline(IP, Time) VALUES('$IPaddress', '$UsersOnlinetime')");
// update the time of a visitor
$db->exec("UPDATE UsersOnline SET Time='$UsersOnlinetime' WHERE IP = '$IPaddress'");
// delete if visitor left
$db->exec("DELETE FROM UsersOnline WHERE Time<$time_check");

// display number of users online
$result = $db->query("SELECT * FROM UsersOnline");
$rows = $result->fetchAll();
$count = count($rows);

// close the database connection
$db = NULL;
if($count>1)
{
	echo "$count users online!";
}
else
{
	echo "$count user online!";
}
?>