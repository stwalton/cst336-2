<?php

    include '../../dbConnection.php';

    $conn = getDatabaseConnection();

    function getDeviceTypes() {
        global $conn;
        $sql = "SELECT_DISTINCT(deviceType)
            FROM 'tc_device'
            ORDER BY deviceType";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($records as $record) {
            echo "<option> " . $record['deviceType'] . "</option>";
        }
    }

    function displayDevices() {
        global $conn;
        $sql = "SELECT * FROM `tc_device WHERE 1 ";
    
        if(isset($_GET['submit'])) {
            $namedParameters = array();
        
            if (!empty($_GET['deviceName'])) {
                $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";
                $sql .= " AND deviceName LIKE :deviceName";
            }
        
            if (!empty($_GET['deviceType'])) {
                $namedParameters[':deviceType'] = $_GET['deviceType'];
                $sql .= " AND deviceType = :deviceType";
            }
        
            if (!empty($_GET['available'])) {
                $namedParameters[':status'] = "A";
                $sql .= " AND status = :status";
            }
            
            if (!empty($_GET['orderByName'])) {
                $sql .= " AND status = :status";
            } else if (!empty($_GET['orderByName'])) {
                $sql .= " ORDER BY deviceName ASC";
            } else {
                $sql .= " ORDER BY deviceName";
            }
            
        } //endIf (isset)
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($records as $record) {
            echo $record['deviceName'] . " " . $record['deviceType'] . " " . 
            $record['price'] . " " . $record['status'] . 
            "<a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a><br />";
        }
    
    }


?>


<!DOCTYPE html>
<html> 
    <head>
        <title>Lab 5: PHP Admin/Device Search</title>
    </head>
    
    <body> 
        <h1> Technology Center: Checkout System</h1>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type: 
            <select name="deviceType">
                <option value="">Select One</option>
                <?=getDeviceTypes()?>
            </select>
            
            <br />
            Order by:
            <input type="radio" name="orderBy" id="orderByName" value="name"/>
             <label for="orderByName"> Name </label>
            <input type="radio" name="orderBy" id="orderByPrice" value="price"/>
             <label for="orderByPrice"> Price </label>
            <br />
            
            <input type="checkbox" name="available">
            <label for="available"> Available </label>
            
            <input class="Submit" type="submit" name="submit" value="Search!">
        </form>
        
        <hr>
        
        <?=displayDevices()?>
        
        <iframe name="checkoutHistory" width="400" height="400"></iframe>
    </body>


</html>