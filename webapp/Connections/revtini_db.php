<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_revtini_db = "localhost";
$database_revtini_db = "revtini_dev";
$username_revtini_db = "root";
$password_revtini_db = "";
$revtini_db = mysql_pconnect($hostname_revtini_db, $username_revtini_db, $password_revtini_db) or trigger_error(mysql_error(),E_USER_ERROR); 
?>