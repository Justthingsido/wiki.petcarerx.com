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
              padding:  0;

          }
      </style>
      <?php
         // Create connection
         $link = mysql_connect('localhost', 'pcrxtech', 'GCFifty351') or die("Unable to connect to MySQL");
         
         //select a database to work with
         mysql_select_db("inventory", $link) or die("Could not select inventory");
         $sql = "SELECT * FROM `Spicyworks_Inventory_Report`";
         $myData = mysql_query($sql,$link);
         
         echo "<table class=sortable>
         <caption> <a href=../Inventory> Inventory</a> </caption>
         <tr>
         <th>Windows User</th>
         <th>Asset Tag</th>
         <th>Name</th>
         <th>IP Address</th>
         <th>Device Type</th>
         <th>Model</th>
         <th>Manufacturer</th>
         <th>Serial Number</th>
         <th>Operating System</th>
         <th>Precessor Type</th>
         <th>Memory</th>
         <th>Antivirus Name</th>
         <th>Antivurus Version</th>

         </tr>";
         while($record = mysql_fetch_array($myData)) {
         echo "<tr>";
         echo "<td>" . $record['Windows User'] . "</td>";
         echo "<td>" . $record['Asset tag'] . "</td>";
         echo "<td>" . $record['Name'] . "</td>";
         echo "<td>" . $record['IP Address'] . "</td>";
         echo "<td>" . $record['Device Type'] . "</td>";
         echo "<td>" . $record['Model'] . "</td>";
         echo "<td>" . $record['Manufacturer'] . "</td>";
         echo "<td>" . $record['Serial Number'] . "</td>";
         echo "<td>" . $record['Operating System'] . "</td>";
         echo "<td>" . $record['Processor Type'] . "</td>";
         echo "<td>" . $record['Memory'] . "</td>";
         echo "<td>" . $record['Antivirus Name'] . "</td>";
         echo "<td>" . $record['Antivirus Version'] . "</td>";
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