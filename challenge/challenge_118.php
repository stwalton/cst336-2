<html>
    <style>
        
    </style>
    <head>
        <meta charset=utf-8/> 
        <title>
            
        </title>
        <body>
            <h1>Sorting Numbers</h1>
            <form method='get' id="sort">
            Enter 3 numers from 1 to 50: <br>
            <input type="text" name="number1"><br>
            <input type="text" name="number2"><br>
            <input type="text" name="number3"><br>
            <input type="button" value="Submit" onclick="sort()"/><br>
            </form>
            
            <p id="NumZone"> </p>
                <p id="min"> </p>
                <p id="max"> </p>
            <script type="text/javascript">
                function sort() {
                var num1 = document.getElementById("number1").value;
                var num2 = document.getElementById("number2").value;
                var num3 = document.getElementById("number3").value;
                var arr = [num1, num2, num3];
                nums.sort(function(a, b){return a - b});
                document.getElementById("numZone").innerHTML = "<h2> The numbers in order: " + nums + "<h2>";
                minMax(nums);
                }
                function minMax(nums) { 
                    var small = nums[0];
                    var big = nums[nums.length - 1];
                    document.getElementById("min").innerHTML = "The smaller number is: " + small;
                    document.getElementById("max").innerHTML = "The biggest number is" + big;
                }
                
            </script>
            
        </body>
</html>