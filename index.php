<?php
 session_start();
if(isset($_SESSION['admin'])){
$a = $_SESSION['admin'];
} else {
    $a = false;
}
?>

<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
<link href="index.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
</head>
    
<body>
<div id="kontener">
    <div id="naglowek">
        <h1>Rezerwacja hali</h1>
    </div>
    <div id="zaloguj">
        <?php
            if(!$a){
                echo "<button><a href='zaloguj.php'>Zaloguj</a></button>";
                }else{
                echo "<button><a href='wyloguj.php'>Wyloguj</a></button>";
            }    
        ?>
    </div>
    <div id="zawartosc">
            <?php 
        
                include 'calendar_admin.php';
                include 'calendar_user.php';
                $calendar = new CalendarAdmin();
                echo $calendar->show();
               
                if(!$a){
                    echo $calendar -> createMail();
                }
            ?>
        
    </div>
    <div id="menu">
        <?php
             if($a) {
                    echo "<a href='dodaj.php'><h3>Dodaj</h3></a>";
                    echo $calendar->createTable();
                }
        ?>
    </div>
    <div id="stopka">
    <h4>Mateusz Kaczmarek 4Tb</h4>
    </div>
    
</div>
    
<script>
    function godziny(clicked_id){
        
        var wyswietl = false;
        
        str = clicked_id.substring(3, clicked_id.length);
        
        str = "w-" + str;
        
        var all = document.getElementsByTagName("*");

        for (var i=0, max=all.length; i < max; i++) {
            if(all[i].id.substring(0,4)!="w-20"){
                continue;
            }
            
            if(all[i].id == str){
                all[i].style.display = "";
                wyswietl = true;
            }
            else{
                all[i].style.display = "none";
            }
        }
        
        var nagl = document.getElementById("nagl");
        if(wyswietl && nagl != null){
                nagl.style.display = "";
            }
            else{
                nagl.style.display = "none";
            }

    }
    
    function validateEmail() {
    var email = document.forms["kontakt"]["mail"].value;
    var re = /(.+)@(.+)\.(.+)\w+/;
    var wynik = re.test(email);
    if(!wynik){
        alert("Not a valid e-mail address");
    }
    return wynik;
}
    
</script>
</body>
</html>




