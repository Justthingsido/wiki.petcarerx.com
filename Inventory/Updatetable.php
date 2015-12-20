<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv= "Content-type" content="text/html; charset=utf-8" />
        <script src="../scripts/modernizr-1.5.js"></script>
      <link href="../styles/def.css" rel="stylesheet" type="text/css"/>
        <title>How to.. | PetCareRx Wiki</title>
    </head>
    <body>
        <ul>
            <li ><a href="../Inventoryg">PHP_Tesing</a>
        </ul>

        <?php
// Create connection
$link = mysql_connect('localhost', 'pcrxtech', 'GCFifty351') 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$database = mysql_select_db("inventory",$link) 
  or die("Could not select inventory");



  //execute the SQL query and return records
$result = mysql_query("SELECT id, model, year FROM cars");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "ID:".$row{'id'}." Name:".$row{'model'}." 
   ".$row{'year'}."<br>";
}

?>

    </body>
</html>
