

<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
<link href="index.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
</head>
    
<body>
<div id="kontener">
    <div id="naglwoek">
    
    </div>
    
    <div id="zawartosc">
            <?php
                include 'calendar_admin.php';
                include 'calendar_user.php';
 
                $calendarUser = new CalendarUser();
                echo $calendarUser->show();
            ?>
        <a href="dodaj.php"><h3>Dodaj</h3></a>
    </div>
    
    <div id="stopka">
    
    </div>
    
</div>
    
<script>
    function godziny(clicked_id){
        str = clicked_id.substring(3, clicked_id.length);
        
        str = "w-" + str;
        
        var all = document.getElementsByTagName("*");

        for (var i=0, max=all.length; i < max; i++) {
            if(all[i].id.substring(0,4)!="w-20"){
                continue;
            }
            
            if(all[i].id == str){
                all[i].style.display = "block";
            }
            else{
                all[i].style.display = "none";
            }
        }

    }
</script>
</body>
</html>




