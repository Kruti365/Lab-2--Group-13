<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab 2- group 13";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['Update'])) {
        $sql="UPDATE table_b set Province_Name='" . $_POST['Province_Name'] . "', Description_Value='" . $_POST['Description_Value'] . "'  WHERE Province_Name='" . $_GET['Province_Name'] . "'";
        $result = $conn->query($sql);
        $message = "Record Modified Successfully";
        echo $message;
    }
    $sql= "SELECT * FROM table_b WHERE Province_Name='" . $_GET['Province_Name'] . "'";
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
<!DOCTYPE html>
<html>
<head>
<title>IM315 - Database Integration</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="jquery.min.js"></script> 
    <link rel="stylesheet" href="style.css"> 

</head>
<body>
<?php

$PName=$_REQUEST['Province_Name'];

$DesValue=$_REQUEST['Description_Value'];




?>
<h1>Table A</h1>
<div class="container">
<a href="index.php" class="btn btn-primary">Back</a>
<form action="<?php $_PHP_SELF ?>" method="post" id="form1">
            <div class="form-group">
                
             <br>   Province Name <input type="text" name="Province_Name" class="form-control" value='<?php echo "$PName";  ?>' id="pname"><br>
                Description Value <input type="text" name="Description_Value" class="form-control" value='<?php echo "$DesValue";  ?>'  id="desvalue"><br></div>
               
                <button type="submit" name="Update" class="btn btn-primary">Edit</button>
                <button type="submit" class="btn btn-primary">Clear</button>
                </div>
                
          </form> 
</div>     

</body>
</html>
