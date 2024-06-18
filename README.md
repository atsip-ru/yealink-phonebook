# Yealink_Phonebook
Телефонная книга на основе MariaDB, которая создает xml-файл для телефонов Yealink.

До сих пор ее следует считать бета-версией, поэтому не стесняйтесь сообщать об ошибках.

Также рекомендуется защитить доступ паролем.

# Как установить?

Просто настройте сервер MariaDB и Apache2 и установите phpMyAdmin для удобства.
Также необходимо установить все необходимые и рекомендуемые модули для Apache.

На медленных серверах или огромных БД генерация XML-файла может происходить довольно медленно.
Поэтому следует отредактировать php.ini и установить время выполнения на более высокое число или бесконечное, 0.

## Установка без phpMyAdmin

1. Клонировать в корень web-каталога
```
git clone https://github.com/atsip-ru/yealink-phonebook.git
cd yealink-phonebook
```
2. Создать БД для номеров и дать права не-root юзеру
```
mysql -u root -p -e "CREATE DATABASE phonebook;"
mysql -u root -p phonebook < entry.sql
mysql -u root -p phonebook < numbers.sql
mysql -u root -p -e "GRANT ALL PRIVILEGES ON phonebook.* TO freepbxuser@localhost;"
```
3. Поправить файл config.php или это можно будет сделать в веб-интерфейсе