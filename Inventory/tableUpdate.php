
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      lang="en">
    <head>
        <meta http-equiv="Content-type"
              content="text/html; charset=utf-8" />
        <script src="../scripts/modernizr-1.5.js"></script>

       <title>How to.. | PetCareRx Wiki</title>
    </head>
    <body>
        <ul>
            <li ><a href="../Inventoryg">PHP_Tesing</a>
        </ul>

                    <!--     <form action="Inventory.php"
                          method="post"
                          style="padding-top: 5%">
                User <input type="text"
                            name="User"><br />
                Device Type <input type="text"
                                   name=" Device_Type"><br />
                Computer Name <input type="text"
                                     name="Computer_Name"><br />
                Manufacturer <input type="text"
                                    name="Manufacturer"><br />
                Model <input type="text"
                             name="Model"><br />
                Serial <input type="text"
                              name="Serial"><br />
                Service Tag <input type="text"
                                   name="Service_Tag"><br />
                Processor <input type="text"
                                 name="Processor"><br />
                Memory Size <input type="text"
                                   name="Memory"><br />
                Memory Type <input type="text"
                                   name="Memory_Type"><br />
                Hard Drive Size <input type="text"
                                       name="Hard_Drive_Size"><br />
                        <input type="submit"
                               name="submit">
                    </form>
                    -->

 <style>
body {

width:150%;
}
     
     table {
         width: 100%;
     }
th {
         text-align: left;
     }

</style>

        <?php
            //if (isset($_POST['submit'])) {
            
                // Create connection
                $link = mysql_connect('localhost', 'pcrxtech', 'GCFifty351') or die("Unable to connect to MySQL");
                echo "Connected to MySQL<br>";
            
                //select a database to work with
                mysql_select_db("inventory", $link) or die("Could not select inventory");

                if(isset($_POST['update'])){
                    $UpdateQuery = "UPDATE `inventory` SET `User`='$_POST[user]',`Device_Type`='$_POST[device_type]',`Computer_Name`='$_POST[computer_name]',`Manufacturer`='$_POST[manufacturer]',`Model`='$_POST[model]',`Serial`='$_POST[serial]',`Service_Tag`='$_POST[service_tag]',`Processor`='$_POST[processor]',`Memory_Size`='$_POST[memory_size]',`Memory_Type`='$_POST[memory_type]',`Hard_Drive_Size`='$_POST[hard_drive_size]' WHERE id ='$_POST[hidden]'";
                   
                    mysql_query($UpdateQuery, $link)
              
                }

                //select table
                $sql = "SELECT * FROM `inventory`";
                $myData = mysql_query($sql,$link);
            
            echo "<table>
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
                echo "<form action = tableUpdate method = post>";               
                echo "<tr>";
                echo "<td>" . "<input type=text name=user value =" . $record['User'] . " </td>";
                echo "<td>" . "<input type=text name=device_type value =" . $record['Device_Type'] . " </td>";
                echo "<td>" . "<input type=text name=computer_name value =" . $record['Computer_Name'] . " </td>";
                echo "<td>" . "<input type=text name=manufacturer value =" . $record['Manufacturer'] . " </td>";
                echo "<td>" . "<input type=text name=model value =" . $record['Model'] . " </td>";
                echo "<td>" . "<input type=text name=serial value =" . $record['Serial'] . " </td>";
                echo "<td>" . "<input type=text name=service_tag value =" . $record['Service_Tag'] . " </td>";
                echo "<td>" . "<input type=text name=processor value =" . $record['Processor'] . " </td>";
                echo "<td>" . "<input type=text name=memory_type value =" . $record['Memory_Type'] . " </td>";
                echo "<td>" . "<input type=text name=memory_size value =" . $record['Memory_Size'] . " </td>";
                echo "<td>" . "<input type=text name=hard_drive_size value =" .  $record['Hard_Drive_Size'] . " </td>";
                echo "<td>" . "<input type=hidden name=hidden value =" . $record['id'] . " </td>";
                echo "<td>" . "<input type=submit name update value=" . "</td>";
                echo "</tr>";
                echo "</form>"
            }

            echo "</table>";

            if (!$myData()) {
            
                    die('Error: ' . mysql_error());
                }

         mysql_close($link);
        ?>
    </body>
</html>
