<?php
session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();

function inventory() {
    global $conn;
    $sql = "SELECT * FROM inventory WHERE ItemId = " . $_GET['ItemId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
    return $list;
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

//click button to update information
if (isset($_GET['updateInfo'])) {
    
    $ItemId = $_GET['ItemId'];
    $ItemName = $_GET['ItemName'];
    $description = $_GET['description'];
    
    //Need these to convert the Name into a number to insert into table properly (Changes the name back to number)
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
    
    $sql = "UPDATE inventory
            SET ItemName = :iName,
                compId = :cId,
                brandId = :bId,
                priceId = :pId,
                description = :desc
            WHERE ItemId = :id";
            
    
    $namedParameters = array();
    $namedParameters[':iName'] = $ItemName;
    $namedParameters[':cId'] = $compId;
    $namedParameters[':bId'] = $brandId;
    $namedParameters[':pId'] = $priceId;
    $namedParameters[':desc'] = $description;
    $namedParameters['id'] = $ItemId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Final Project: Edit Entry</title>

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
                <h1>Edit Entry</h1>
                <br>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <br>
                <form>
        
                    <?php
                    $list = inventory();
                    ?>
                    
                    <input type="hidden" name="ItemId" value="<?=$list['ItemId']?>" />
                    Item Name: <input type="text" name="ItemName" id="ItemName" value="<?php echo ucfirst($list['ItemName']); ?>" /> <br>
                    Item Description: <br>
                    <textarea name="description" id="description" rows="15" cols="30"><?php echo ucfirst($list['description']); ?></textarea><br>
                    Item Price: <input type="text" name="priceId" id="priceId" value="<?php echo ucfirst($list['priceId']); ?>" /> <br>
                    
                    <?php 
                    //Get component name that the item is already under
                    $compid = $list['compId'];
                     $sql = "SELECT compName FROM comp WHERE compId = '$compid'";
                     $stmt = $conn->query($sql);	
                    $compname = $stmt->fetchAll();
                    
                    //Get brand name that the item is listed under
                    $brandid = $list['brandId'];
                     $sql = "SELECT brandName FROM brand WHERE brandId = '$brandid'";
                     $stmt = $conn->query($sql);	
                    $brandname = $stmt->fetchAll();
                    
                    ?>
                    
                    Component Type: <select name="compId" id="compId">
                        <option>
                            <?php  foreach ($compname as $compName) 
                            {
                    	        echo ucfirst($compName['compName']);
                            }
                        ?>
                        </option>
                        <?=components()?>
                    </select>
                    
                    <br>
                    
                    Brand: <select name="brandId" id="brandId">
                        <option>
                             <?php  foreach ($brandname as $brand) 
                                    {
                    	                echo ucfirst($brand['brandName']);
                                    }
                                ?>
                        </option>
                            <?=brands()?>
                    </select>
                    
                    <br>
                    
                    <input type="submit"  name="updateInfo" value="Change Information">
                    
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
