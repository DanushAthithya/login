<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Movie Details</title>
</head>
<body style="font-size:25px;background-color:rgb(65, 152, 176);">
<?php
$xml_data=simplexml_load_file("ex9.xml");
$name=$_POST['movie_name'];
$flag=0;
foreach($xml_data->children() as $user)
{
if($user->name==$name)
{?>
<h1 align="center">MOVIE DETAILS</h1>
<table align="center" style="font-size:25px;">
<tr>
<td><b>GENRE</b></td><td><b>:</b></td>
<td><?php echo $user->Genre?></td>
</tr>
<tr>
<td><b>NAME</b></td><td><b>:</b></td>
<td><?php echo $user->name?></td>
</tr>
<tr>
<td><b>IMDB:</b></td><td><b>:</b></td>
<td><?php echo $user->IMDB?></td>
</tr>
</table>
<?php $flag=1;
}
}
if($flag==0) 
{?>
<h1 style="text-align:center">Oops! Requested position does not exist.</h1>
<?php
}?>
</body>


</html>