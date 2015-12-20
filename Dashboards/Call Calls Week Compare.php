<?php
    
?>

<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8" name="keywords" content="HTML, CSS, XML, XHTML, JavaScript" http-equiv="Content-type" content="text/html" />
        <title>Call Calls Week Compare</title>
        <script src="../scripts/modernizr-1.5.js"></script> 
        <script src="../scripts/NavMenu.js"></script>
        <script src="../scripts/iframeReload.js" type="text/javascript"></script> 
        <link href="../styles/def.css"rel="stylesheet" type="text/css" />
        <link href="../styles/DashboardFullScreen.css"rel="stylesheet" type="text/css" />
    </head>

<body>
    <header class="hide">
        <a id="NavMenu"
           href="../subpages/NavMenu.php"></a>
    </header>

    <section id="fullscreen">
        <div class="parent"> 
           <button class="button" onClick ="this.style.visibility= 'hidden'">FullScreen</button>
        </div>

        <iframe id="reloader"
                src="http://callcenterapps/salesdashboard/CallWeekCompare.aspx">
        </iframe>
    </section>
    <script src="../scripts/FullScreen.js"></script>

</body>
</html>
