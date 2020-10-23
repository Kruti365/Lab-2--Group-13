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

    if (isset($_REQUEST["table_a"])) {
        $sql = "SELECT `table_b`.*, `table_a`.`iso`
                FROM `table_b`
                LEFT JOIN table_a ON table_a.tableA_Id = table_b.tableA_Id
                WHERE table_a.iso ='" .$_REQUEST["table_a"]. "'";
        $result = $conn->query($sql);
    } else {
        $sql = "SELECT tableA_Id, iso, Country_Name FROM table_a";
        $result = $conn->query($sql);
    }

    if(isset($_POST['add'])) {
      if(! $conn ) {
        die('Could not connect: ' . $conn->connect_error);
     }
     
     if(! get_magic_quotes_gpc() ) {
        $Country_Name = addslashes ($_POST['Country_Name']);
        $ISO = addslashes ($_POST['iso']);
     }else {
        $Country_Name = $_POST['Country_Name'];
        $ISO = $_POST['iso'];
     }
     
     //$emp_salary = $_POST['emp_salary'];
     
     $sql = "INSERT INTO table_a (Country_Name,iso) VALUES('$Country_Name','$ISO')";
        
     //mysql_select_db($dbname);
     $retval = $conn->query($sql);
     
     if(! $retval ) {
        die('Could not enter data: ' . $conn->connect_error);
     }
     
     echo "Entered data successfully\n";
     
     //$conn->close();
    }
     
    if(isset($_POST['add_tableb'])) {
      if(! $conn ) {
        die('Could not connect: ' . $conn->connect_error);
     }
      
     
     if(! get_magic_quotes_gpc() ) {
        $Province_Name = addslashes ($_POST['Province_Name']);
        $DesValue = addslashes ($_POST['Description_Value']);
      
        
     }else {
        $Province_Name = $_POST['Province_Name'];
        $DesValue = $_POST['Description_Value'];
        
       // $ISO=$_GET['iso'];
        //echo "iso=$ISO";
        
        
     }
     if(isset($_GET['iso'])){
      $ISO = $_REQUEST['iso'];
      $sql1="SELECT tableA_Id Country_Name,iso FROM table_a WHERE iso='$ISO'";
     
      $result=$conn->query($sql1);    
      
     }
     
     $tableAID=$result->fetch_row()[3];
     
     
     $sql = "INSERT INTO table_b (Province_Name,Description_Value,tableA_Id) VALUES('$Province_Name','$DesValue','$tableAID')";
        
     
     $retval = $conn->query($sql);
     
     if(! $retval ) {
        die('Could not enter data: ' . $conn->connect_error);
     }
     
     echo "Entered data successfully\n";
     
     //$conn->close();
    }
     

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IM315 - Database Integration</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="jquery.min.js"></script> 
    
    <link rel="stylesheet" href="style.css"> 

<script type="text/javascript"> 
function edittableA() { 
      
  alert("You clicked edit button");
  window.location.href="edit_tableA.php";

} 
</script>
</head>
<body>
<br><br>
<div class="container">
    <?php if(isset($_REQUEST["table_a"])){ ?>
        <div class="col-lg-8 offset-lg-2">
            <a href="index.php" class="btn btn-primary">Back</a><br><br>
            <table class="table table-dark" >
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Province Name</th>
                  <th scope="col">Description </th>
                  <th scope="col"> </th>
                  <th scope="col">Profile Picture </th>
                  <th scope="col"> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                              <th scope='row'>".$row['tableB_Id']."</th>
                              <td>".$row['Province_Name']."</td>
                              <td>".$row['Description_Value']."</td>
                    
                              <td>                               
                              <a href='edit_tableB.php?Province_Name=".$row['Province_Name']." &Description_Value=".$row['Description_Value']."'>Edit</a>
                              </td>
                              
                              
                            </tr>";
                    }
                ?>
              </tbody>
            </table>
            <form action="<?php $_PHP_SELF ?>" method="post" id="form1">
            <div class="form-group">
              <br>  Province Name <input type="text" name="Province_Name" class="form-control"><br>
                Description Value <input type="text" name="Description_Value" class="form-control"><br></div>
                <button type="submit" name="add_tableb" class="btn btn-primary">Add</button>
                <button type="submit" class="btn btn-primary">Clear</button>
          </form> 
        </div>
    <?php } else { ?>
        <div class="col-lg-8 offset-lg-2">
            <table class="table table-dark">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">ISO Code</th>
                  <th scope="col"> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                              <th scope='row'>".$row['tableA_Id']."</th>
                              <td><a href='index.php?table_a=".$row['iso']."'>".$row['Country_Name']."</a></td>
                              <td>".$row['iso']."</td>
                              <td>                               
                              
                              <a href='edit_tableA.php?iso=".$row['iso']." &Country_Name=".$row['Country_Name']."'>Edit</a>
                              </td>
                            </tr>";
                    }
                ?>
              </tbody>
              <br><br><br>

  
            </table>

    
    <form action="<?php $_PHP_SELF ?>" method="post" id="form1">
            <div class="form-group">
            
              <br>  Country Name: <input type="text" name="Country_Name" class="form-control"><br>
                ISO Code: <input type="text" name="iso" class="form-control"><br></div>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
                <button type="submit" class="btn btn-primary">Clear</button>
                
          </form> 
                    
        </div><?php } ?>
</div>
</body>
</html>
<!-- end document-->