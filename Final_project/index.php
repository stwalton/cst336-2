<?php
session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();

function orderPrice($order) {
    global $conn;
    if($order == 1) {
        $sql = "SELECT * FROM `inventory` ORDER BY `inventory`.`priceId` ASC ";    
    }
    else {
        $sql = "SELECT * FROM `inventory` ORDER BY `inventory`.`priceId` DESC ";
    }
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

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

    <title>Final Project: Computer Parts</title>

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
                    <a href="adminLogin.html">
                        Admin Login
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Computer Part's</h1>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
                <br>
                <br>
                
                <form action='index.php' style='display:inline' method="get">
                    <input type="submit" name="price" value="Search by Price" />
                    <input type="radio" id="low" name="orderBy" value="1">
                    <label for="price">Lowest</label>
                    <input type="radio" id="high" name="orderBy" value="2">
                    <label for="high">Highest</label>
                </form>
                
                
                <br>
                <br>
                <?php
                // Sorting
                
                $order = $_GET['orderBy'];
                
                if(isset($_GET['price'])) {
                    $list = orderPrice($order);
                }
                elseif(isset($_GET['comp'])) {
                    $list = orderComp();
                }
                else {
                    $list = initialDisplay();   
                }
                
                
                
                foreach($list as $product) {
                    echo "<h4> " .$product['ItemName']. "</h4>";
                    echo "price: $".$product['priceId'];
                    echo "<br>";
                    echo '<textarea name="description" rows="8" cols="30" readonly>'.$product['description'].'</textarea>';
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
