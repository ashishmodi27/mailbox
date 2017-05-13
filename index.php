<?php
session_start();
@$but=$_REQUEST['but'];
@$na=$_REQUEST['na'];
$_SESSION['sid']=$na;
@$pa=$_REQUEST['pa'];
$err="";
if($but=="signup")
{
	if($na=="" or $pa=="")
	$err="Please Fill all The Entry";
	else
	{
		if(file_exists("user/$na"))
		$err="Duplicate Entry";
		else
		{
		mkdir("user/$na");
		mkdir("user/$na/inbox");
		mkdir("user/$na/draft");
		mkdir("user/$na/sent");
		mkdir("user/$na/trash");
		mkdir("user/$na/info");
		touch("user/$na/$pa");
		touch("user/$na/info/da");
		touch("user/$na/info/ad");
		touch("user/$na/info/em");
		touch("user/$na/info/city");
		touch("user/$na/info/sex");
		touch("user/$na/info/c1");
		touch("user/$na/info/c2");
		touch("user/$na/info/c3");
		touch("user/$na/info/c4");
		$err="User Created";
		}
	}
}
else if($but=="signin")
{
	if($na=="" or $pa=="")
	$err="Please Fill all The Entry";
	else
	{
	if(file_exists("user/$na") and file_exists("user/$na/$pa"))
	{
	header("location: mainpage.php");
	}
	else
	{
	$err="User Not Exist";
	}
	}
}
?>
<form>
  <table width="300" border="1" align="center" bordercolor="#0000FF">
    <tr>
      <td colspan="2"><?php echo $err; ?></td>
    </tr>
    <tr>
      <td width="82"><font color="#FF0000">Name</font></td>
      <td width="202"><input type="text" name="na" /></td>
    </tr>
    <tr>
      <td><font color="#FF0000">Pass</font></td>
      <td><input type="password" name="pa" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="but" value="signin" />
          </td>
    </tr>
  </table>
</form>
<html>
<pre>
<body background="em1.jpg">
<font color="red" size="+1">
<form>
Name   <input type="text" name="na" />
pass   <input type="password" name="pa"/>
dob    <input type="date" name="dt"/>
add    <input type="text" name="ad" />
email  <input type="email" name="em" />

City				 Sex
<select name="city">
<option>Alwar</option>
<option>Ajmar</option>
<option>jaipur</option>
<option>delhi</option>
</select> 			<input type="radio" name="sex" value="male" />male	<input type="radio" name="sex" value="female" />female

Hobby
<input type="checkbox" name="c1" value="cricket" />cricket
<input type="checkbox" name="c2" value="hockey" />hockey
<input type="checkbox" name="c3" value="foot ball" />foot ball
<input type="checkbox" name="c4" value="basket ball" />basket ball
<input type="submit" name="but" value="signup" /><input type="reset" value="refresh" />
</form>
</body>
</pre>
</html>
