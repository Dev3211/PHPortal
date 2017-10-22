<?php
error_reporting(E_ERROR);
echo "\n\r\n\r" . 'PHPortal - The simple MYSQL client shell' . "\n\r\n\r";
echo "Enter Database Host: ";
$dbhost = trim(fgets(STDIN));
echo "Enter Database Username: ";
$dbUser = trim(fgets(STDIN));
echo "Enter Database Password: ";
$dbPass = trim(fgets(STDIN));
echo "Enter Database Port: ";
$dbPort = trim(fgets(STDIN));

if ($dbPass == "")
{
echo "Without db pass? Omg, please setup a password for your db.";
}

if (strlen($dbPass) < 5)
	{
	echo "Um, please use a strong password.";
	echo "Enter Database Password: ";
	$dbPass = trim(fgets(STDIN));
	echo "\n";
	}

echo "Enter the Database Name: ";
$dbName = trim(fgets(STDIN));
echo "\n";
$con = mysqli_connect($dbhost, $dbUser, $dbPass, $dbName, $dbPort) or die(" What are you doing? ");

if (mysqli_connect_errno())
	{
	echo "Oops! We couldn't connect to the database..\n";
	die();
	}
  else
	{
	echo " Execute a MYSQL query: ";
	$conz = trim(fgets(STDIN));
	mysqli_query($con, "$conz");
	mysqli_select_db($con, "$dbName");
	$result = mysqli_query($con, "$conz");
	if ($result != FALSE) echo " query was executed successfully\n ";
	if ($result != TRUE) echo " query failed!\n ";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) print_r($row);
	mysqli_free_result($result);
	}
?>
