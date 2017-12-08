<?php
session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();

// Get inventory to display
function initialDisplay() {
    global $conn;
    $sql = "SELECT * FROM `inventory` ORDER BY `inventory`.`ItemId` ASC ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Final Project: Admin Page</title>

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
                    <a href="index.php">
                        Logout
                    </a>
                </li>
                <li>
                    <a href="addEntry.php">
                        Add Entries
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Admin Page</h1>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <br>
                <br>
                <?php
                $list = initialDisplay();
                foreach($list as $product) {
                    echo "<h4> " .$product['ItemName']. "</h4>";
                    echo "price: $".$product['priceId'];
                    echo "<br>";
                    echo '<textarea name="description" rows="8" cols="30" readonly>'.$product['description'].'</textarea>';
                    echo "<br>";
                    echo "<a href='editInfo.php?ItemId=".$product['ItemId']."'> Edit Entry </a>";
                    echo "<br>";
                    echo "<a href='deleteEntry.php?ItemId=".$product['ItemId']."'> Delete Entry </a>";
                    echo "<br>";
                    echo "<br>";
                    
                }
        
        ?>
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
