<?php
@session_start();
$id=$_SESSION['sid'];
$od=opendir("user/$id/trash");
echo "<form action=mainpage.php>";
while($fil=readdir($od))
{
if($fil=="." or $fil=="..")
{
}
else
{
echo "<input type=checkbox name='tr[]' value=$fil><a href=mainpage.php?trfil=$fil>".$fil."</a><br>";
}
}
echo "<input type=submit name=deltr value=delete>";
echo "</form>";
?>