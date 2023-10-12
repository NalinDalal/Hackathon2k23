<?php

session_start();

if ((!$username) || (!$password)) {
    header("Location: hi.html");
    exit;
}

$db_name="testDB";
$table_name="auth_users";
$connection=mysql_connect("localhost","sandman","tQ9472b") or
die("Couldn't connect");

$db=@mysql_select_db($db_name, $connection) or die("couldn't select database.");

$sql="SELECT * FROM $table_name
WHERE username=\"$username\" AND passward=passward(\"$password\")
";
$result = @mysql_query($sql,connection) or die("Couldn't execute query.");
$num=mysql_numrows($result);

if ($num!=0){
    $msg="<P>You're authorized!</P>";
} else{
    header("Location:login.html");
    exit;
}
?>