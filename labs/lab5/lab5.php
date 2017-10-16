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
                <option>Select One</option>
                <?=getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available">
            <label for="available"> Available </label>
            
            <br>
            Order by:
            <input type="radio" name="orderBy" id="orderByName" value="name"/>
            <label for="orderByName"> Name </label>
            <input type="radio" name="orderBy" id="orderByPrice" value="price"/>
            <label for="orderByPrice"> Price </label>
            
            <input type="Submit" value="Search!" name="submit">
        </form>
        
        <hr>
        
        <?=displayDevices()?>
        
        <iframe name="checkoutHistory" width="400" height="400"></iframe>
    </body>


</html>