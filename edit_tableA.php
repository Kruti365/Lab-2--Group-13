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
        $sql="UPDATE table_a set Country_Name='" . $_POST['Country_Name'] . "', iso='" . $_POST['iso'] . "'  WHERE iso='" . $_GET['iso'] . "'";
        $result = $conn->query($sql);
        $message = "Record Modified Successfully";
        echo $message;
    }
    $sql= "SELECT * FROM table_a WHERE iso='" . $_GET['iso'] . "'";
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

$CName=$_REQUEST['Country_Name'];

$isoCode=$_REQUEST['iso'];


?>
<h1>Table A</h1>
<div class="container">
<a href="index.php" class="btn btn-primary">Back</a>
<form action="<?php $_PHP_SELF ?>" method="post" id="form1">
            <div class="form-group">
               <br> Country Name: <input type="text" name="Country_Name" class="form-control" value='<?php echo "$CName";  ?>' id="cname"><br>
                ISO Code: <input type="text" name="iso" class="form-control" value='<?php echo "$isoCode";  ?>'  id="isocode"><br></div>
                <button type="submit" name="Update" class="btn btn-primary">Edit</button>
                <button type="submit" class="btn btn-primary">Clear</button>

                </div>
          </form> 
</div>     

</body>
</html>
