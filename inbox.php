<?php
@session_start();
$id=$_SESSION['sid'];
@$od=opendir("user/$id/inbox");
echo "<form action=mainpage.php>";
while(@$fil=readdir(@$od))
{
if($fil=="." or $fil=="..")
{
}
else
{
echo "<input type=checkbox name='in[]' value=$fil><a href=mainpage.php?infil=$fil>".$fil."</a><br>";
}
}
echo "<input type=submit name=delin value=delete>";
echo "</form>";
?>