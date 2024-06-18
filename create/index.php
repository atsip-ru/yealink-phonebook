<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css.css">
        <title>Phonebook</title>
    </head>
    <body>
        <div class = "menu">
            <ul>
                <li><p>Phonebook</p></li>
                <li><a href="../index.php">Домой</a></li>
                <li><a href="../settings/">Настройки</a></li>
                <li><div class="vl"></div></li>
                <li><a href="../create/">Добавить запись</a></li>
            </ul>
           </div>
        
        <div class = "main">
            <p>Добавить запись: </p>
            <br>
            <form action="index.php" methode="get">
                Имя: <input type="text" placeholder="Имя" name="txtName"></input>
                <br><br>
                <p>Номера можно вводить через запятую:</p>
                <textarea name="txtNum" cols="60" rows="8" placeholder="Напр.: 1234,56789,12345"></textarea>
                <br><br>
                <input type="submit" name="btnDo" value="Go" />
            </form>
            <br>
            <?php
                INCLUDE '../algo.php';
                    
                $txtName = "";
                $txtNum = "";
                if (isset($_GET["btnDo"])) {                    
                    if (isset($_GET["txtName"]) && isset($_GET["txtNum"]))
                    {
                        $txtName = $_GET["txtName"];
                        $txtNum = $_GET["txtNum"];

                        insertDB($txtName, $txtNum);
                        echo "OK";
                        header("LOCATION: ../create");
                    }
                }
                // for ($i = 1; $i <= 100; $i++)
                // {
                //     $txtNum = rand(10000000000,99999999999) . "," . rand(10000000000,99999999999) . "," . rand(10000000000,99999999999) . ",";
                //     insertDB(rand(0, 1000000000), $txtNum);
                // }
            ?>
        </div>
    </body>
</html>
