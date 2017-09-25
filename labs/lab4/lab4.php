<!DOCTYPE html>
<html>
    <?php 
        $backgroundImage = "img/sea.jpg";
        
        // API call goes here
        if (iseest($_GET['keyboard'])) {
            echo "You searched for: " . $_GET['keyword'];
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($_GET['keyword']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
    ?>
    <head>
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
        <title>Image Carousel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    
    <body>
        <br/> <br />
        <?php 
            if (!isset($imageURLs)) {
                echo "<h2> Type a keywor to display a slideshow <br /> with random images from Pixabay.com </h2>"; 
            }
            else {
                // Display Carousel Here
            }
            ?>
            
        <!-- HTML form goes here! -->
        <form>
            <input type="text" name="keyword" placceholder="Keyword">
            <inout type="submit" value="Sumbit" />
        </form>
        <br/><br />
    </body>
</html>

