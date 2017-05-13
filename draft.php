<?php
@session_start();
$id=$_SESSION['sid'];
$od=opendir("user/$id/draft");
echo "<form action=mainpage.php>";
while($fil=readdir($od))
{
if($fil=="." or $fil=="..")
{
}
else
{
echo "<input type=checkbox name='dr[]' value=$fil><a href=mainpage.php?drfil=$fil>".$fil."</a><br>";
}
}
echo "<input type=submit name=deldr value=delete>";
echo "</form>";
?>