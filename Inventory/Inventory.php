<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
   lang="en">
   <head>
      <meta http-equiv="Content-type"
         content="text/html; charset=utf-8" />
      <script src="../scripts/modernizr-1.5.js"></script>
      <script src="../scripts/NavMenu.js"></script>
      <link href="../styles/def.css"
         rel="stylesheet"
         type="text/css" />
      <title>How to.. | PetCareRx Wiki</title>
   </head>
   <body>
      <ul>
         <li><a href="../Inventory">PHP_Tesing</a>
      </ul>
      <a id="NavMenu"
         href="../subpages/NavMenu.html"></a>
      <form action="Inventory.php"
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
      <?php
         if (isset($_POST['submit'])) {
             
             // Create connection
             $link = mysql_connect('localhost', 'pcrxtech', 'GCFifty351') or die("Unable to connect to MySQL");
             echo "Connected to MySQL<br>";
             
             //select a database to work with
             mysql_select_db("inventory", $link) or die("Could not select inventory");
             
             /*$sql = "CREATE TABLE `inventory_data` ( 
             User varchar(20),
             Device_Type varchar(20),
             Computer_Nacturer ame varchar(20),
             Manufacturervarchar(20),
             Model varchar(20),
             Serial varchar(20),
             Service_Tag varchar(20),
             Processor varchar(20),
             Memory_Size varchar(20),
             Memory_Type varchar(20),
             Hard_Drive_Size varchar(20)
             
             )";*/
             // escape variables for security
             $User            = $_POST['User'];
             $Device_Type     = $_POST['Device_Type'];
             $Computer_Name   = $_POST['Computer_Name'];
             $Manufacturer    = $_POST['Manufacturer'];
             $Model           = $_POST['Model'];
             $Serial          = $_POST['Serial'];
             $Service_Tag     = $_POST['Service_Tag'];
             $Processor       = $_POST['Processor'];
             $Memory_Type     = $_POST['Memory_Type'];
             $Memory_Size     = $_POST['Memory_Size'];
             $Hard_Drive_Size = $_POST['Hard_Drive_Size'];
             
             
             $sql = "INSERT INTO `inventory_data`(`User`, `Device_Type`, `Computer_Name`, `Manufacturer`, `Model`, `Serial`, `Service_Tag`, `Processor`, `Memory_Size`, `Memory_Type`, `Hard_Drive_Size`) VALUES (('$User'),('$Device_Type'),('$Computer_Name'),('$Manufacturer'),('$Model'),('$Serial'),('$Service_Tag'),('$Processor'),('$Memory_Size'),('$Memory_Type'),('$Hard_Drive_Size'))";
             
             
             if (!mysql_query($sql, $link)) {
                 
                 die('Error: ' . mysql_error());
             }
             
             mysql_close($link);
         }
         
         ?>
   </body>
</html>