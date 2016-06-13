<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ('./includes/class-query.php');
require_once('./includes/class-insert.php');
	
	//$logged_user_email = "dpate334@my.centennialcollege.ca";
        $searchName = $_POST['searchB'];
	
	$friends = $query->get_friends_id($searchName);
        
        //echo $searchName;
        //echo $friends[1];
        
//        $friends_list = $query->get_friends_list($friends);
//        foreach ($friends_list as $friend){
//            echo $friend;
//            echo "--\n";
//        }

        

//if (isset($_POST['searchB'])) 
//{
//    if ($_POST['searchB'] == NULL)
//    {
//        echo "Please, enter information!";
//    }
//    else
//    {
//        echo "entered";
////        $sqlcon=mysqli_connect("localhost", "root", "", "employee");
////        if (mysqli_connect_errno())
////        {
////            echo "Failed to connect to MySQL: " . mysqli_connect_error();
////        }
////        else
////        {
////        $employee=$_POST['employeeSearch'];
////        $result = mysqli_query($sqlcon,"SELECT * FROM employees WHERE first_name='$employee'");
////        echo "<table border='1'>
////            <tr>
////                <th>EmployeeID</th>
////                <th>FirstName</th>
////                <th>LastName</th>
////                <th>DeptCode</th>
////                <th>HireDate</th>
////                <th>CreditLimit</th>
////                <th>PhoneExt</th>
////                <th>Email</th>
////            </tr>";
////        while($row = mysqli_fetch_array($result))
////        {
////            echo "<tr>";
////            echo "<td>" . $row['employee_id'] . "</td>";
////            echo "<td>" . $row['first_name'] . "</td>";
////            echo "<td>" . $row['last_name'] . "</td>";
////            echo "<td>" . $row['dept_code'] . "</td>";
////            echo "<td>" . $row['hire_date'] . "</td>";
////            echo "<td>" . $row['credit_limit'] . "</td>";
////            echo "<td>" . $row['phone_ext'] . "</td>";
////            echo "<td>"."<a href=" . $row['first_name'] ."_". $row['last_name'] ."@localhost.com".">".$row['first_name'] ."_". $row['last_name'] ."@localhost.com"."</a>"."</td>";
////            echo "</tr>";
////        }
////        echo "</table>";
////        mysqli_close($sqlcon);
////        }
//    }
//}


