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
<a href="index.php">Powrót</a>