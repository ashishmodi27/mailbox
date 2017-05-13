<?php
@session_start();
$id=$_SESSION['sid'];
$od=opendir("user/$id/sent");
echo "<form action=mainpage.php>";
while($fil=readdir($od))
{
if($fil=="." or $fil=="..")
{
}
else
{
echo "<input type=checkbox name='sn[]' value=$fil><a href=mainpage.php?snfil=$fil>".$fil."</a><br>";
}
}
echo "<input type=submit name=delsn value=delete>";
echo "</form>";
?>