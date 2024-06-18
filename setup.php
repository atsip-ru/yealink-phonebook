<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="settings/css.css">
        <title>Phonebook</title>
    </head>
    <body>
        <div>

        <h2>Добро пожаловать на страницу настроек</h2>
        <hr>
            <?php
                global $overwrite;
                $overwrite = true;
                INCLUDE 'algo.php';
                global $first;
            
                global $servername;
                global $username;
                global $password;
                global $dbname;

                global $phonebook;

                if ($first == false)
                {
                    header("LOCATION: ./index.php");
                }

                if (isset($_GET["btnSettings"])) {
                    if (isset($_GET["txtDBHost"]) && isset($_GET["txtDBName"]) && isset($_GET["txtDBUser"]) && isset($_GET["txtDBPasswd"]) && isset($_GET["txtPhonebook"]))
                    {
                        $servername = $_GET["txtDBHost"];
                        $username = $_GET["txtDBUser"];
                        $password = $_GET["txtDBPasswd"];
                        $dbname = $_GET["txtDBName"];
                        $phonebook = $_GET["txtPhonebook"];
                        writeVar();
                        sleep(3);
                        
                        $ret = tryConnectionToDb();
                        if ($ret[0])
                        {
                            if (!checkIfTableExists("numbers"))
                            {
                                revertSQLfile('numbers.sql');
                            }
                            if (!checkIfTableExists("entry"))
                            {
                                revertSQLfile('entry.sql');
                            }
                            
                            $first = false;
                            writeVar();
                            sleep(3);
                            header("LOCATION: ./index.php");
                        }
                        else
                        {
                            echo "Ошибка: " . $ret[1] . "<hr>";
                        }
                    }
                }
            ?>
            <form action="setup.php" methode="GET">
                <p>База данных:</p>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <p>Адрес БД:</p>
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
                                <p>Пароль пользователя БД:</p>
                            </td>
                            <td>
                                <input type="text" placeholder="admin123" name="txtDBPasswd" value="<?php print htmlspecialchars($password); ?>"></input>
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
                                <input type="text" placeholder="phonebook.xml" name="txtPhonebook" value="<?php print $phonebook; ?>"></input>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <input type="submit" name="btnSettings" value="Go" />
                <br>
            </form>
        </div>
    </body>
</html>