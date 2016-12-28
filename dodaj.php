<?php
session_start();



    if(isset($_POST['dodaj'])){
            require 'connect.php';
        $polaczenie = @new mysqli($host,$user,$password,$db_name);

         if($polaczenie -> connect_errno != 0)
        {
            echo "Error: ".$polaczenie->connect_errno;
        }
        else{
            $stmt = $polaczenie->prepare("INSERT INTO rezerwacje (id, data, godzina, kto) VALUES (NULL, ? , ? , ?)");
            $data = $_POST['data'];
            $kto = $_POST['kto'];
            $godz = $_POST['godzina'];
            $stmt->bind_param("sss", $data, $godz ,$kto);
            if($stmt->execute()){
                echo "Dodano użytkownika";
            }else{
                echo "Nie dodano";
            }
        }
            $polaczenie->close(); 
    }
    



?>
<html>
<head>
<!--CSS file (default YUI Sam Skin) -->
<link rel="stylesheet" type="text/css" href="https://yui-s.yahooapis.com/2.9.0/build/calendar/assets/skins/sam/calendar.css">
 
<!-- Dependencies -->
<script src="https://yui-s.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
 
<!-- Source file -->
<script src="https://yui-s.yahooapis.com/2.9.0/build/calendar/calendar-min.js"></script>
</head>
<body>
    <form action="dodaj.php" method="post" id="doda">
    <input type="text" name="data" placeholder="Data">
    <select name="godzina" form="doda">
        <option value="17">17:00-18:00</option>
        <option value="18">18:00-19:00</option>
        <option value="19">19:00-20:00</option>
        <option value="20">20:00-21:00</option>
    </select>
    <input type="text" name="kto" placeholder="Rezerwujący">
    <input type="submit" name="dodaj" value="Dodaj">
    
</form>
<script>
	YAHOO.namespace("example.calendar");

	YAHOO.example.calendar.init = function() {
		YAHOO.example.calendar.cal1 = new YAHOO.widget.Calendar("cal1","cal1Container");
		YAHOO.example.calendar.cal1.render();
	}

	YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
</script>
<a href="index.php">Powrót</a>
</body>
</html>