<?php

/*
* Database Connection und den Charset auf utf8 setzen
*/
$db = new mysqli('localhost', 'root', '', 'wtt');
$db -> set_charset('utf8');

?>