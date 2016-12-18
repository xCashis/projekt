

<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
<meta charset="utf-8">
</head>
    
<body>
<?php
include 'calendar.php';
 
$calendar = new Calendar();
echo $calendar->show();
?>
<a href="dodaj.php">Dodaj</a>
</body>
</html>