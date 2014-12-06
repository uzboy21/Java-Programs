<style> table, tr, th, td {border-collapse: collapse; border: 1px blue solid;} th, tr, td {text-align: left; padding: 6px;} </style><br>
<button onclick="history.go(-1);">Go Back </button><br><br>
<title>Retrieve_single</title>
<?php
include ( "account.php" );
($dbh=mysql_connect ($hostname, $username,$password)) or die ("Unable to connect to MySQL database");
print "Connected to MySQL<br>";
mysql_select_db($project);
print "This is retrieve_single.php.<br>";
$to="ia85@njit.edu<br>";
$subj="Received Request!<br>";
$message="Hello, here are your results!<br>";
$username = $_GET["username"];
echo "Inputted name is: <b>$username</b> <br>";
$password = $_GET ["password" ];
echo "Entered Password:<b>$password </b>";
($password == "2qaz")or die ("<b>is Invalid<b>");
echo "<br> $s <br>";
$t = mysql_query ($s);
mysql_query($s);
//echo mysql_error();
echo "<br>";
$s = "select * from REGISTERED where username = '$username'";
echo "<br> $s <br><br>";	
$t = mysql_query ($s);
echo "<table>";
print "<th> Username </th><th> Fullname </th>	<th> Email </th>	<th> Address </th> <th>When_Registered</th> ";
while ($row = mysql_fetch_array($t))
{
	$username=$row["username"]; $fullname=$row["fullname"]; $email=$row["email"]; $address=$row["address"]; $when_registered=$row["when_registered"];
	echo "<tr>" ;
	print "<td> $username </td><td> $fullname </td> <td> $email </td>  <td> $address </td> <td> $when_registered </td";
	echo "</tr>";
	$message .="\n <br> Username: $username <br> \n Fullname: $fullname <br> \n E-Mail: $email <br> \n Address:$address <br> \n When_Registered: $when_registered <br> \n\n";
}
echo "</table>";
$s = "select * from GRADES where username ='$username'";
echo "<br> $s <br><br>";	
$t = mysql_query ($s);
//print "<table><tr>	<td> Username </td>	<td> Course </td>	<td> A1 </td>	</tr></table>";
echo "<table>";
print "<th> Username </th><th> Course </th>	<th> A1 </th>	<th> A1S </th> <th> A2 </th> <th> A2S </th> <th> PARTIC </th> <th> TOTAL </th> <th> PERCENT </th>";
while ($row = mysql_fetch_array($t))
{
	$username=$row["username"]; $course=$row["course"]; $A1=$row["A1"]; $A1S=$row["A1S"]; $A2=$row["A2"]; $A2S=$row["A2S"]; $PARTIC=$row["PARTIC"]; $TOTAL=$row["TOTAL"]; $PERCENT=$row["PERCENT"];
	echo "<tr>" ;
	print "<td> $username </td><td> $course </td> <td> $A1 </td>  <td> $A1S </td> <td> $A2 </td> <td> $A2S </td> <td> $PARTIC </td> <td> $TOTAL </td> <td> $PERCENT </td>";
	echo "</tr>";
	
	
	$message .="\n <br> username: $username <br> \n course: $course <br> \n A1:$A1 <br> \n A1S:$A1S <br> \n\n";
	
}
echo "</table>";
echo "<br></br>";
if(isset($_GET["want_mail"])) print "$to<br> $subj<br> $message";
//if(isset($_GET["want_mail"])) mail($to, $subj, $message);
?>