<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
   lang="en">
   <head>
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <script src="../scripts/modernizr-1.5.js"></script>
      <script src="../scripts/sorttable.js" type="text/javascript"></script>
      <script src="../scripts/NavMenu.js"></script>
    <link href="../Inventory/table.css" rel="stylesheet" type="text/css" />
      <link href="../styles/def.css" rel="stylesheet" type="text/css" />
      <title>How to.. | PetCareRx Wiki</title>
   </head>
   <body>
      <a id="NavMenu" href="../subpages/NavMenu.html"></a>
      <style>
          body {
    font-family: Verdana, Geneva, sans-serif;
    background-color: #f7f7f7;
    width: 150%;
    margin: 0 auto;
    display: block;
}
         table {
         width: 75%;
        margin-left: 15%;
          border-width: thin;
         }
          caption {
              padding-bottom: 3%;
          }
         th {
         text-align: left;
         padding-right: 3%;
         padding-bottom: 1%;

         }
       td {
              padding-right: 2%;

          }
      </style>
      <?php
         // Create connection
         $link = mysql_connect('localhost', 'pcrxtech', 'GCFifty351') or die("Unable to connect to MySQL");
         
         //select a database to work with
         mysql_select_db("inventory", $link) or die("Could not select inventory");
         $sql = "SELECT * FROM `inventory_data`";
         $myData = mysql_query($sql,$link);
         
         echo "<table class=sortable>
         <caption> <a href=../Inventory> Inventory</a> </caption>
         <tr>
         <th>Users</th>
         <th>Device Type</th>
         <th>Computer Name</th>
         <th>Manufacturer</th>
         <th>Model</th>
         <th>Serial</th>
         <th>Service Tag</th>
         <th>Processor</th>
         <th>Memory Type</th>
         <th>Memory Size</th>
         <th>Hard Drive Size</th>
         </tr>";
         while($record = mysql_fetch_array($myData)) {
         echo "<tr>";
         echo "<td>" . $record['User'] . "</td>";
         echo "<td>" . $record['Device_Type'] . "</td>";
         echo "<td>" . $record['Computer_Name'] . "</td>";
         echo "<td>" . $record['Manufacturer'] . "</td>";
         echo "<td>" . $record['Model'] . "</td>";
         echo "<td>" . $record['Serial'] . "</td>";
         echo "<td>" . $record['Service_Tag'] . "</td>";
         echo "<td>" . $record['Processor'] . "</td>";
         echo "<td>" . $record['Memory_Type'] . "</td>";
         echo "<td>" . $record['Memory_Size'] . "</td>";
         echo "<td>" . $record['Hard_Drive_Size'] . "</td>";
         echo "</tr>";
         }
         echo "</table>";
         
         if (!$myData()) {
         
             die('Error: ' . mysql_error());
         }
         mysql_close($link);
         ?>
   </body>
</html>