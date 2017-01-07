<?php
 session_start();
?>
<!doctype html>
<html>
<head>
<link href="form.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="kont">
    <div id="form">
        <form action="zaloguj.php" method="post" id="zaloguj">
            <label>Login: </label><input type="text" name="login"><br><br>
            <label>Hasło: </label><input type="password" name="haslo" ><br><br>
            <input type="submit" name="zaloguj" value="Zaloguj">
    
        </form>
        
    </div>
    <div id="stopka">
        <a href="index.php">Powrót</a>
    </div>
    </div>
</body>
</html>

<?php
    if(!isset($_POST['zaloguj'])){
        return;
    }

    require_once "connect.php";

    $polaczenie = @new mysqli($host,$user,$password,$db_name);
    
    if($polaczenie -> connect_errno != 0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
      $login = $_POST['login'];
      $haslo = $_POST['haslo'];
       $sql = "SELECT * FROM users WHERE Login='$login' AND Haslo='$haslo'";
        if ($rezultat = @$polaczenie->query($sql)){
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0){
                $_SESSION['admin'] = true;
                
                
                $rezultat->close();
                
                header('Location: index.php');
            }else
                
            {
                echo '<span style="color:red">Nieprawidłowy login lub hasło! </span>';
            }
        }
        
        $polaczenie->close();  
    }
    
?>