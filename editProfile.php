<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-ca" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Edit Profile</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/search.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.auto-style1 {
	margin-left: 450px;
}
.auto-style2 {
	text-align: right;
}
.auto-style3 {
	text-align: left;
}
</style>
</head>
<?php
session_start();
include_once './includes/class-query.php';
?>
<body  background="images/networking.jpg">
		<div id="menu" style="width: 117%; height: 54px; background-color: #33CC33;">
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
				&nbsp;<a href="profile.php">Profile</a>
				<a href="discussion_topic.php">Discussion</a>
                <a href="search.php">Search </a>&nbsp
				<a href="events.php">Events </a>
                <a href="editProfile.php">Edit Profile</a>
				<a href="logout.php">LogOut</a>
				
			</p>
	
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
				&nbsp;</p>
				</div>

<div id="wrapper3" style="width: 791px">
	<br />
	<br />
	<br />
	<table style="width: 100%">
		<tr>
			<td class="auto-style2">Last Name: </td>
			<td class="auto-style3">
			<input name="Text1" type="text" style="width: 310px; height: 18px;" />&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">First Name:&nbsp;</td>
			<td class="auto-style3">
			<input name="Text2" type="text" style="width: 310px; height: 18px;" />&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">Create UserName:&nbsp;</td>
			<td class="auto-style3">
			<input name="Text3" type="text" style="width: 310px; height: 18px;" />&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">Country: &nbsp;</td>
			<td class="auto-style3">
			<input name="Text4" type="text" style="width: 310px; height: 18px" />&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">City:&nbsp;</td>
			<td class="auto-style3">
			<input name="Text5" type="text" style="width: 310px; height: 18px" /></td>
		</tr>
		<tr>
			<td class="auto-style2">Birthday:&nbsp;</td>
			<td class="auto-style3">
			<select name="Select1" style="width: 66px;">
			<option>Day</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
			<option>26</option>
			<option>27</option>
			<option>28</option>
			<option>29</option>
			<option>30</option>
			<option>31</option>


			</select><select name="Select2" style="width: 100px">
			<option>Month</option>
			<option>January</option>
			<option>February</option>
			<option>March</option>
			<option>April</option>
			<option>May</option>
			<option>June</option>
			<option>July</option>
			<option>August</option>
			<option>September</option>
			<option>October</option>
			<option>November</option>
			<option>December</option>


			</select><select name="Select3" style="width: 73px">
			<option>Year</option>
			<option></option>
			</select>&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">Phone Number:&nbsp;</td>
			<td class="auto-style3">
			<input name="Text6" type="text" style="width: 310px; height: 18px" />&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">Biography&nbsp;</td>
			<td class="auto-style3">
			<textarea name="TextArea1" style="width: 362px; height: 137px;"></textarea>&nbsp;</td>
		</tr>
		<tr>
			<td class="auto-style2">
			&nbsp;</td>
			<td class="auto-style3">
			<form method="post">
				<input name="Button2" type="button" value="Save Changes" style="width: 169px" /><input name="Button1" type="button" value="Cancel" style="width: 130px" /></form>
			</td>
		</tr>
		</table>
	<br />
	<br /><br /><br /><br />
	<br />
	<br /><br />&nbsp;<br/>
		</div>
</body>

</html>


