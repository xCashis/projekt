<?php
session_start();
require 'connect.php';

    if(isset($_POST['dodaj'])){
        baza_dodaj();         
    }

    function baza_dodaj(){
        $polaczenie = @new mysqli($host,$user,$password,$db_name);
        if($polaczenie -> connect_errno != 0)
        {
            echo "Error: ".$polaczenie->connect_errno;
        }
        
        $stmt = $polaczenie->prepare("INSERT INTO rezerwacje (id, data, godzina, kto) VALUES (NULL, ? , ? , ?)");
        if($stmt===false) {
            echo $polaczenie->error;
            return;
        }
            $data = $_POST['data'];
            $kto = $_POST['kto'];
            $godz = $_POST['godzina'];
        
            echo $data, $kto, $godz;
        
            $stmt->bind_param("sss", $data, $godz ,$kto);
            if($stmt->execute()){
                echo "Dodano użytkownika";
            }else{
                echo "Nie dodano";
            }
        $polaczenie->close(); 
    }
    function sprawdz(){
        $data = $_POST['data'];
        $godz = $_POST['godzina'];
        
        
        
        $polaczenie = @new mysqli($host,$user,$password,$db_name);

        
        
        if($polaczenie -> connect_errno != 0)
        {
            echo "Error: ".$polaczenie->connect_errno;
        }
        
        echo $data . $godz;
        
        $res = $polaczenie->query("SELECT data, godzina FROM rezerwacje WHERE godzina LIKE '".$godz."';");
        
        if ($result = $polaczenie->query("SELECT * FROM rezerwacje;")) {
    printf("Select returned %d rows.\n", $result->num_rows);

    /* free result set */
    $result->close();
}
        
//        echo $res->num_rows;
        
        $polaczenie->close();
        
        if($res){
            echo "false";
            echo $res;
            return false;
        }
        echo "true";
        return true;
    }


?>
<html>
<head>
<link href="form.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="kont">
    <div id="form">
        <form action="dodaj.php" method="post" id="doda">
            <label>Data: </label><input type="text" name="data" placeholder="rrrr-mm-dd"><br><br>
            <label>Godzina: </label><select name="godzina" form="doda">
                <option value="17">17:00-18:00</option>
                <option value="18">18:00-19:00</option>
                <option value="19">19:00-20:00</option>
                <option value="20">20:00-21:00</option>
            </select><br><br>
            <label>Rezerwujący: </label><input type="text" name="kto" placeholder="Imie i Nazwisko"><br><br>
            <input type="submit" name="dodaj" value="Dodaj">
    
        </form>
        
    </div>
    <div id="stopka">
        <a href="index.php">Powrót</a>
    </div>
    </div>
</body>
</html>