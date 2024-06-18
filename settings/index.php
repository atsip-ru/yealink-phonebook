<!DOCTYPE html>
<html>
    <head>
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
            <p>Настройки:</p>
            <hr>
            <form action="index.php" methode="GET">
                <?php
                    global $overwrite;
                    $overwrite = true;
                    INCLUDE '../algo.php';
                    global $first;
        
                    global $servername;
                    global $username;
                    global $password;
                    global $dbname;

                    global $phonebook;
                ?>
                <p>База данных:</p>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <p>Сервер БД:</p>
                            </td>
                            <td>
                                <input type="text" placeholder="localhost" name="txtDBHost" value="<?php print htmlspecialchars($servername); ?>"></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Имя БД:</p>
                            </td>
                            <td>
                                <input type="text" placeholder="phonebook" name="txtDBName" value="<?php print htmlspecialchars($dbname); ?>"></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Пользователь БД:</p>
                            </td>
                            <td>
                                <input type="text" placeholder="root" name="txtDBUser" value="<?php print htmlspecialchars($username); ?>"></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Пароль пользователя:</p>
                            </td>
                            <td>
                                <input type="text" placeholder="без изменений" name="txtDBPasswd"></input>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <hr>

                <p>Место хранения XML:</p>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <p>Место хранения:</p>
                            </td>
                            <td>
                                <input type="text" placeholder="phonebook.xml" name="txtPhonebook" value="<?php print htmlspecialchars($phonebook); ?>"></input>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <input type="submit" name="btnSettings" value="Go" />
                <br>
                <?php
                    if (isset($_GET["btnSettings"])) {
                        if (isset($_GET["txtDBHost"]) && isset($_GET["txtDBName"]) && isset($_GET["txtDBUser"]) && isset($_GET["txtDBPasswd"]) && isset($_GET["txtPhonebook"]))
                        {
                            $servername = $_GET["txtDBHost"];
                            $username = $_GET["txtDBUser"];
                            $passwordNew = $_GET["txtDBPasswd"];
                            $dbname = $_GET["txtDBName"];
                            $phonebook = $_GET["txtPhonebook"];
                            if ($passwordNew != "")
                            {
                                $password = $passwordNew;
                            }
                            writeVar();
                            sleep(3);
                            header("LOCATION: ../");
                        }
                    }
                ?>
            </form>
        </div>
    </body>
</html>
