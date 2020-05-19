<?php

$link = mysqli_connect("localhost", "admin", "123", "eco_hotel");

/* проверяем соединение */
if (!$link)
{
echo "<p>Попытка подключения не удалась MySQL</p>";
exit();
}
if (!mysqli_select_db($link,"eco_hotel") )
{
echo "<p>Выбрать базу данных невозможно</p>";
exit();
}
$ver = mysqli_query($link,"SELECT VERSION()");
if(!$ver)
{
echo "<p>Запрос неверен</p>";
exit();
}
mysqli_query($link, "SET NAMES 'utf8'");


?>
