     
     
        //This Script Reloads the webpage embeded in Iframe
        //Set iframe ID to reloader 
        //<iframe id="reloader" src="source here"></iframe>
        
        
            // set your interval in milliseconds
            var reloadInterval = 60000;
            // this will run when the document is fully loaded
            function init() {
             setTimeout('reload()',reloadInterval);
            }
            // this reloads the iframe, and triggers the next reload interval
            function reload() {
             var iframe = document.getElementById('reloader');
             if (!iframe) return false;
             iframe.src = iframe.src;
             setTimeout('reload()',reloadInterval);
            }
            // load the init() function when the page is fully loaded
            window.onload = init;