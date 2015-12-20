<?php
    
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" name="keywords" http-equiv="Content-type" content="text/html" />
        <title>
      Dialing Codes | PetCareRx Wiki
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
                   $sql = "SELECT * FROM `DialingCodes` ";
                   $myData = mysql_query($sql,$link);
            
                   //Table to display - Phone Directory. 
               echo "<table class=sortable>
            <caption>Dialing Codes</caption>
               <tr>
               <th>Feature</th>
               <th>Code</th>
               </tr>";
               while($record = mysql_fetch_array($myData)) {
                   echo "<tr>";
                   echo "<td>" . $record['Feature'] . "</td>";
                   echo "<td>" . $record['Code'] . "</td>";

                   echo "</tr>";
               }
               echo "</table>";
            
                        
               if (!$myData() ) {
            
                       die('Error: ' . mysql_error());
                   }
            mysql_close($link);
        ?>
        </article>
    </body>
</html>