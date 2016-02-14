<?php
  try
  {
    //open the database
    $db = new PDO('sqlite:UsersOnline.db');

    //create the database
    $db->exec("CREATE TABLE UsersOnline (IP TEXT PRIMARY KEY, Time TEXT)");    

	echo "Database and Table created sucessfully.";
	
    // close the database connection
    $db = NULL;
  }
  catch(PDOException $e)
  {
    print 'Exception : '.$e->getMessage();
  }
?>