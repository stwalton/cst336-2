<?php

session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();


function brands() {
     global $conn;
        $sql = "SELECT brandName FROM brand";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($records as $record) {
            echo "<option> " . $record['brandName'] . "</option>";
        }
}

function components() {
     global $conn;
        $sql = "SELECT compName FROM comp";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($records as $record) {
            echo "<option> " . $record['compName'] . "</option>";
        }
}

//Add's entry to comp (component) table
if (isset($_GET['addComp'])) {
    
    $compName = $_GET['compName'];
    
    $sql = "INSERT INTO comp
            (compName)
            VALUES
            (:comp)";
    
    $namedParameters = array();
    $namedParameters[':comp'] = $compName;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
}

//Add entry into brand table 
if (isset($_GET['addBrand'])) {
    
    $brandName = $_GET['brandName'];
    
    $sql = "INSERT INTO brand
            (brandName)
            VALUES
            (:brand)";
    
    $namedParameters = array();
    $namedParameters[':brand'] = $brandName;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
}

//add's item to Inventory table
if (isset($_GET['addItem'])) {
    
    $ItemName = $_GET['ItemName'];
    $description = $_GET['description'];
    
    //Need these to convert the Name into a number to insert into table properly 
    $compId = $_GET['compId'];
        $sql = "SELECT * FROM `comp` ORDER BY `compId` ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            if ($compId == $record['compName']) {
                $compId = $record['compId'];
            }
        }
    
    $brandId = $_GET['brandId'];
    $sql = "SELECT * FROM `brand` ORDER BY `brand`.`brandId` ASC ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            if ($brandId == $record['brandName']) {
                $brandId = $record['brandId'];
            }
        }
    
    $priceId = $_GET['priceId'];
    
    $sql = "INSERT INTO inventory
            (ItemName, compId, brandId, priceId, description)
            VALUES
            (:iName, :cId, :bId, :pId, :desc)";
    
    $namedParameters = array();
    $namedParameters[':iName'] = $ItemName;
    $namedParameters[':cId'] = $compId;
    $namedParameters[':bId'] = $brandId;
    $namedParameters[':pId'] = $priceId;
    $namedParameters[':desc'] = $description;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Final Project: Add Entries</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="adminPage.php">
                        Admin Page
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Add Entires</h1>
                <br>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <br>
                <br>
                
                <form>
        
                    Add components to table: <br>
                    <input type="text" name="compName" id="compName"> <br> 
                    <input type="submit" name="addComp" value="Add component"> <br>   
                    
                    <br>
                    
                    Add brand to table: <br>
                    <input type="text" name="brandName" id="brandName"> <br> 
                    <input type="submit" name="addBrand" value="Add brand"> <br>
                    
                    <br>
                    
                    <h5>Add new item to inventory </h5>
                    Item Name: <input type="text" name="ItemName" id="ItemName"> <br>
                    
                    Description: <br>
                    <textarea name="description" id="description" rows="15" cols="30"></textarea> <br>
                    
                    Type of Component: <select name="compId" id="compId">
                        <option>Select Component</option>
                        <?=components()?>
                        </select> <br>
                    
                    Type of Brand: <select name="brandId" id="brandId">
                        <option>Select Brand</option>
                            <?=brands()?>
                    </select> <br>
                    
                    Item Price: <input type="text" name="priceId" id"priceId"> <br>
                    
                    <input type="submit" name="addItem" value="Add Item"> <br>
                    
                    </form>
                
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
