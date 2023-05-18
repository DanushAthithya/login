<?php
// define variables to empty values
$nameErr = $emailErr = $mobilenoErr = $addressErr = $dateErr = $passwordErr =$usernameErr = "";
$name = $email = $mobileno=$username = $password = "";
//set flag as 0
$flag=0;
//Input fields validation
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
        //Name Validation
        if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                echo "<script>window.alert('$nameErr')</script>";
                $flag=1;
        } 
        elseif($flag!=1) {
                $name = $_POST["name"];
                if (!preg_match("/^[a-zA-Z\s]{3,60}$/",$name)) 
                {
                        $nameErr = "Please enter a valid name";
                        echo "<script>window.alert('$nameErr')</script>";
                        $flag=1;
                }
        }


        //Email Validation

        if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $flag=1;
                echo "<script>window.alert('$emailErr')</script>";
        } 
        elseif($flag!=1) {
                $email = $_POST["email"];
                if (!preg_match("/^[a-zA-Z]{3,45}@(gmail|yahoo).(com|in)$/",$email)) {
                        $emailErr = "Please enter a valid email address";
                        echo "<script>window.alert('$emailErr')</script>";
                        $flag=1;
                }
        }


        //UserName Validation
        if (empty($_POST["username"])) {
                $usernameErr = "User Name is required";
                $flag=1;
                echo "<script>window.alert('$usernameErr')</script>";
        }
        elseif($flag!=1)
        {
                $username = $_POST["username"];
                if (!preg_match ("/^[a-zA-Z0-9_]{8,50}$/", $username) ) {
                        $usernameErr = "Please enter a valid UserName";
                        echo "<script>window.alert('$usernameErr')</script>";
                        $flag=1;
                }
        }


        //Password Validation
        if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
                $flag=1;
                echo "<script>window.alert('$passwordErr')</script>";
        }
        elseif($flag!=1)
        {
                $password = $_POST["password"];
                if (!preg_match ("/^[a-zA-Z0-9]{8,50}$/", $password) ) {
                        $passwordErr = "Please enter a valid password";
                        echo "<script>window.alert('$passwordErr')</script>";
                        $flag=1;
                }
        }


        //Phone Number Validation
        if (empty($_POST["mobileno"])) {
                $mobilenoErr = "Phone number is required";
                $flag=1;
                echo "<script>window.alert('$mobilenoErr')</script>";
        }
        elseif($flag!=1) {
                $mobileno = $_POST["mobileno"];
                if (!preg_match ("/^[0-9]{10}$/", $mobileno) ) {
                        $mobilenoErr = "Only numeric value is allowed.";
                        echo "<script>window.alert('$mobilenoErr')</script>";
                        $flag=1;
                }
                if (strlen ($mobileno) != 10) {
                        $mobilenoErr = "Phone number should have 10 digits.";
                        echo "<script>window.alert('$mobilenoErr')</script>";
                        $flag=1;
                }
        }

        if($flag==0)
        {
                if($flag==0) {
                
                        // Create connection to the database
                        $conn = mysqli_connect("localhost","root","","sampleform");
                        if (!$conn) 
                        {
                                die("Connection failed: " . mysqli_connect_error());
                        }
                        //store form data into the database
                        $sql = "INSERT INTO user_details (UserName,Password,Name,Email_ID,PhoneNumber) VALUES ('$_POST[username]','$_POST[password]','$_POST[name]','$_POST[email]','$_POST[mobileno]')";
                        if (mysqli_query($conn, $sql)) {
                                echo "<script>window.alert('Registered successfully')</script>";
                        } 
                        else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        //Close database connection
                        mysqli_close($conn);
                }
        }
        else {
                echo '<script>alert("Form is not filled correctly")</script>';
                print $flag;
        }

}




?>