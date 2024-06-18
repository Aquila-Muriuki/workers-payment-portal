<?php
session_start();

if(isset($_POST['first-name']) && !empty($_POST['first-name']) )
{
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $phoneNumber = $_POST['phone-number'];
    $serviceCode = $_POST['service-code'];
    $quantity = $_POST['quantity'];

    $con= new mysqli("localhost","root","","keyame");
    // create customer ID
    $customerID = "KYM-".date("Ymdhis")."-".$firstName;

    // save client's info
    $sql = "INSERT INTO `clients`(`firstName`, `lastName`, `phoneNumber`, `customerID`) VALUES ('$firstName', '$lastName', '$phoneNumber','$customerID')";
    var_dump($sql);
    if ($con->query($sql) === TRUE) 
    {
        echo "record saved.";
        // create service ID
        $serviceID = $customerID . "-".date("his");
        $servedBy = $_SESSION['username'];
        // get service cost
        $serviceSQL = "SELECT `serviceName`, `serviceCost` FROM `services` WHERE `serviceCode`=$serviceCode";
        $result = $con->query($serviceSQL);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cost = $row['serviceCost'];
                $serviceName = $row['serviceName'];
                $total = $cost * $quantity;
                
                // save on service type
                $serviceSQL ="INSERT INTO `clientservices`(`serviceID`, `customerID`, `serviceType`, `serviceQuantity`,`servedBy`, `totalCost`,`balance`) VALUES ('$serviceID','$customerID','$serviceName',$quantity,'$servedBy',$total,$total)"; 
                var_dump($serviceSQL);
                if($con->query($serviceSQL)===TRUE)
                {
                    echo " saved the service data";
                }else
                {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
            
        }
    }else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();

    header("Location:/records.php");
}