<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" name="keywords" http-equiv="Content-type" content="text/html" />
        <title>
      Phone Directory | PetCareRx Wiki
        </title>
        <script src="../scripts/sorttable.js" type="text/javascript">
        </script>
        <script src="../scripts/modernizr-1.5.js" type="text/javascript">
        </script>
        <link href="../styles/def.css" rel="stylesheet" type="text/css" />
        <link href="../styles/table.css" rel="stylesheet" type="text/css" />
        <script src="../scripts/NavMenu.js" type="text/javascript">
        </script>

    </head>
    <body>
        <header>
        <a id="NavMenu" href="../subpages/NavMenu.php"></a>
        </header>
        <article>
        <?php
            
                   // Create connection
                   $link = mysql_connect('localhost', 'pcrxtech', 'GCFifty351') or die("Unable to connect to MySQL");
            
                   //select a database to work with
                   mysql_select_db("Phone Directory", $link) or die("Could not select inventory");
                   $sql = "SELECT * FROM `Phone Directory` ORDER BY `Phone Directory`.`Name`  ASC";
                   $myData = mysql_query($sql,$link);
            
                   //Table to display - Phone Directory. 
               echo "<table class=sortable>
            <caption>PetCareRx Phone Directory</caption>
               <tr>
               <th>Name</th>
               <th>Phone</th>
               <th>Ext #</th>
               </tr>";
               while($record = mysql_fetch_array($myData)) {
                   echo "<tr>";
                   echo "<td>" . $record['Name'] . "</td>";
                   echo "<td>" . $record['Phone Number'] . "</td>";
                   echo "<td>" . $record['Ext #'] . "</td>";

                   echo "</tr>";
               }
               echo "</table>";
            
            
            
             $sql2 = "SELECT * FROM `Conference Extensions` ORDER BY `Conference Extensions`.`Conference`  ASC";
             $myData2 = mysql_query($sql2,$link);
              //Table to display - Phone Directory. 
              echo "<table class=sortable>
            <caption>Conference Extensions</caption>
               <tr>
               <th>Conference</th>
               <th>Ext #</th>
               <th>Inbound Number</th>
               <th>PIN</th>
               </tr>";
               while($record2 = mysql_fetch_array($myData2)) {
                   echo "<tr>";
                   echo "<td>" . $record2['Conference'] . "</td>";
                   echo "<td>" . $record2['Ext_#'] . "</td>";
                   echo "<td>" . $record2['Inbound number'] . "</td>";
                   echo "<td>" . $record2['PIN'] . "</td>";
                   echo "</tr>";
               }
               echo "</table>";
            
               if (!$myData() && !$myData2()) {
            
                       die('Error: ' . mysql_error());
                   }
            mysql_close($link);
        ?>
            </article>
    </body>
</html>