<?php
        session_start();
        include 'connection.php';
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $emailAddress = $_POST['emailAddress'];
        $userRole = $_POST['userRole'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($conn->connect_error){
             echo "$conn->connect_error";
             die('Connection Failed : '.$conn->connect_error);
          }
        else {
                $stmt = $conn->prepare("insert into accountCreation(firstName, lastName, emailAddress, userRole, username, password) values(?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss",$firstName, $lastName, $emailAddress,$userRole, $username, $password);
                $stmt->execute();
                echo "Registration Successful, please wait to be redirected.";
                header('refresh:2, url=https://personnelport.careers/index.php');
                $stmt->close();
                $conn->close();
        }
 ?>
