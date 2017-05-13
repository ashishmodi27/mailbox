<?php
session_start();
$id=$_SESSION['sid'];
@$log=$_REQUEST['log'];
if($log=="yes")
{
unset($sid);
$_SESSION['sid']="";
header("location: log.php");
}
?>
<table width="1356" height="640" border="1" bgcolor="#CC66FF">
  <tr>
    <td height="80" colspan="3" background="em7.jpeg">
	<p><font color="#CCFF00" size="+1" face="Times New Roman, Times, serif"><b>Welcome <?php echo $id; ?>@vitstudent.ac.in</b></font></p>
	<p align="right"><font color="#CCFF00" size="+1" face="Times New Roman, Times, serif"><b><a href="mainpage.php?log=yes">Logout</a>|<a href="mainpage.php?val=cp">Settings</a></b></font></p>	</td>
  </tr>
  <tr>
    <td width="240" height="275">
	<p><a href="mainpage.php?val=in">Inbox</a></p>
	<p><a href="mainpage.php?val=co">Compose</a></p>
	<p><a href="mainpage.php?val=dr">Draft</a></p>
	<p><a href="mainpage.php?val=sn">Sent</a></p>
	<p><a href="mainpage.php?val=tr">Trash</a></p>	</td>
    <td width="793">
	<?php
	@$val=$_REQUEST['val'];
	if($val=="in")
	include("inbox.php");
	else if($val=="co")
	include("compose.php");
	else if($val=="sn")
	include("sent.php");
	else if($val=="dr")
	include("draft.php");
	else if($val=="tr")
	include("trash.php");
	else if($val=="cp")
	include("changpass.php");
	?>
<?php
//compose
@$sbut=$_REQUEST['sbut'];
@$to=$_REQUEST['to'];
$frm=$id;
@$sub=$_REQUEST['sub'];
@$msg=$_REQUEST['msg'];
if($sbut=="save")
{
	$fil="T0_".$frm."_".$sub."_From_".$frm;
	//touch("user/$fil");
	$fo=fopen("user/$id/draft/$fil","w");
	fwrite($fo,$msg);
	echo "Saved Sucessfully";
}
else if($sbut=="send")
{
	if(file_exists("user/$to"))
	{
	$fil="T0_".$to."_".$sub."_From_".$frm;
	$fo=fopen("user/$to/inbox/$fil","w");
	fwrite($fo,$msg);
	$fil="T0_".$to."_".$sub."_From_".$frm;
	$fo=fopen("user/$id/sent/$fil","w");
	fwrite($fo,$msg);
	echo "Mail Send sucessfully";
	}
	else
	{
	$fil="Failed_T0_".$to."_".$sub."_From_".$frm;
	$fo=fopen("user/$id/inbox/$fil","w");
	fwrite($fo,$msg);
	echo "Mail Send Failed";

	}
}
?>

<?php
//change pass
@$op=$_REQUEST['op'];
@$cp=$_REQUEST['cfp'];
@$np=$_REQUEST['np'];
@$ubut=$_REQUEST['ubut'];

if($ubut=="Update")
{
	if(file_exists("user/$id/$op"))
	{
		if($np==$cp)
		{
		touch("user/$id/$np");
		unlink("user/$id/$op");
		echo "Password Update";
		}
		else
		{
		echo "new and confirm pass not matched";
		}
	}
	else
	{
	echo "Old Pass Not Matched";
	}
}
?>
<?php
//show inbox
@$infil=$_REQUEST['infil'];
if($infil)
{
include("user/$id/inbox/$infil");
}
?>
<?php
//show draft
@$drfil=$_REQUEST['drfil'];
if($drfil)
{
include("user/$id/draft/$drfil");
}
?>

<?php
//show sent
@$snfil=$_REQUEST['snfil'];
if($snfil)
{
include("user/$id/sent/$snfil");
}
?>

<?php
//show trash
@$trfil=$_REQUEST['trfil'];
if($trfil)
{
include("user/$id/trash/$trfil");
}
?>

<?php
//delete from inbox
@$in=$_REQUEST['in'];
@$delin=$_REQUEST['delin'];
if($delin=="delete")
{
foreach($in as $v)
{
copy("user/$id/inbox/$v","user/$id/trash/$v");
unlink("user/$id/inbox/$v");

}
echo "mail sucessfully deleted";
}
?>

<?php
//delete from sent
@$sn=$_REQUEST['sn'];
@$delsn=$_REQUEST['delsn'];
if($delsn=="delete")
{
foreach($sn as $v)
{
copy("user/$id/sent/$v","user/$id/trash/$v");
unlink("user/$id/sent/$v");

}
echo "mail sucessfully deleted";
}
?>

<?php
//delete from draft
@$dr=$_REQUEST['dr'];
@$deldr=$_REQUEST['deldr'];
if($deldr=="delete")
{
foreach($dr as $v)
{
copy("user/$id/draft/$v","user/$id/trash/$v");
unlink("user/$id/draft/$v");

}
echo "mail sucessfully deleted";
}
?>

<?php
//delete from trash
@$tr=$_REQUEST['tr'];
@$deltr=$_REQUEST['deltr'];
if($deltr=="delete")
{
foreach($tr as $v)
{
unlink("user/$id/trash/$v");

}
echo "mail sucessfully deleted";
}
?>
<img src="em2.jpg" alt="a" align="right" /></td>
    <td width="301"><img src="em6.png" alt="b" /></td>
  </tr>
  <tr>
    <td height="53"><img src="em8.jpg" alt="d" width="203" height="106" />&nbsp;</td>
    <td><marquee direction="right" loop="-1">  
    <img src="em8.jpg" alt="d" width="203" height="92" /></marquee>&nbsp;</td>
    <td><img src="em8.jpg" alt="d" width="203" height="106" />&nbsp;</td>
  </tr>
</table>
