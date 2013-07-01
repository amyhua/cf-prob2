<?php // toosl.php

// Make a simple HTML page to manage Tools.
//   It should have an input field. When the user
//   enters text in the input field, show that input
//   in the page. When an existing item is clicked,
//   it should disappear from the page.

// INCOMPLETE

date_default_timezone_set('UTC');

echo <<<_END

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Tools</title>

</head>
<body>
  
  <h1>Tool Manager</h1>
  <form method="post" action="">
    <fieldset>
      <legend>Add a tool</legend>
      <input type="text" name="tool" value="" id="tool" required />
      <input type="submit" name="submit" value="Submit""/>
    </fieldset>
  </form>
 <h2>Tools:</h2>
  
_END;

$connect = mysql_connect("localhost",'root',null);

if (mysqli_connect_errno($connect))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql_create_db = "CREATE DATABASE tools_db";
$query_create_db = mysql_query($sql_create_db);
$query_select_db = mysql_select_db("tools_db",$connect);

if (!mysql_query($sql_create_db)) echo "FAILED TO CREATE DB \n";
if (mysql_select_db("tools_db",$connect)) echo "Database selected \n";
if (!mysql_select_db("tools_db",$connect)) echo "FAILED TO SELECT \n";

$sql_create_tb = "CREATE TABLE tools (toolset char(150))";
$query_create_tb = mysql_query($sql_create_tb);

if ($query_create_tb) echo "Table created";


 if (isset($_POST['tool'])) {
   $tool = $_POST['tool'];
	 $sql_add_tool = "INSERT INTO tools VALUES('$tool')";
 	 $added_tool = mysql_query($sql_add_tool);
 	 if (!$added_tool) die ("Failure to add tool: " . mysql_error());
	 if ($added_tool) echo "Added tool successfully";

 $sql_get_tools = "SELECT * FROM tools";
 $query_get_tools = mysql_query($sql_get_tools);
 if (!$query_get_tools) die("Failed to retrieve tools: " . mysql_error());
 $row = mysql_fetch_row($toolset);
 if ($query_get_tools) {
 	echo "tools selected";
 	
 	while ($row = mysql_fetch_assoc($query_get_tools)) {
 		print $db_field['tool'] . "<br>";
 	}
  }
 mysql_close($connect);
	
 
 
	 



echo "</body>";
echo "</html>";

?>