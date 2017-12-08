<?php
session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();

function countEntry() {
    global $conn;
    $sql = "SELECT COUNT(ItemId) AS count FROM inventory";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
    return $list;
}

function avgPrice() {
    global $conn;
    $sql = "SELECT ROUND(AVG(priceId)) AS price FROM inventory";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
    return $list;
}

function totalPrice() {
    global $conn;
    $sql = "SELECT ROUND(SUM(priceId)) AS price2 FROM inventory";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
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

    <title>Simple Sidebar - Start Bootstrap Template</title>

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
                <h1>Aggregate Report</h1>
                <br>
                <br>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <br>
                <br>
                <h5>Number of Entries</h5>
                <?php
                $list = countEntry();
                echo $list['count'];
                ?>
                <br>
                <br>
                <h5>Average Price</h5>
                <?php
                $list = avgPrice();
                echo "$".$list['price'];
                ?>
                <br>
                <br>
                <h5>Total Price of All Inventory</h5>
                <?php
                $list = totalPrice();
                echo "$".$list['price2'];
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
