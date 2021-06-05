<?php
session_start();
include "dbconnection.php";
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
} else{
	
if (isset($_POST["save"])) {

$key_num = $_SESSION['id'];
$ad_name = $_SESSION['name'];
$gr_name = $_POST['group_name'];
$allowed_user = $_POST['allowed_user'];

$fileCount = count($_FILES['jsonfiles']['name']);
for ($i=0; $i<$fileCount; $i++) { 

    $json_files = $_FILES['jsonfiles']['name'][$i];

    $sql ="INSERT INTO adminfiles (key_num, admin_name, files_group_name, json_files, allowed_user) VALUES ('$key_num' , '$ad_name' , '$gr_name', '$json_files', '$allowed_user')";

    if ($con->query($sql)===TRUE) {
        //echo "File Upoaded Sucess";
    }
    else{
        echo'File Upload failed';
    }  
    move_uploaded_file($_FILES['jsonfiles']['tmp_name'][$i],'uploads_json/'.$json_files);
}
echo "<script>alert('You have sucessfully added new user to these files');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Welcome !</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                    <a href="#"><?php echo $_SESSION['name']; echo ' - '; echo $_SESSION['id']; echo ' - '; echo  $_SESSION['role']?></a>
                    </li>
                    <li>
                    <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1>Admin Dashboard</h1>
            <p>Here admin can allow a user to give access of new selected json files.</p>
            <form action="" method="POST" enctype="multipart/form-data" id="file-form" name=''>
                <div class="form-group">
                    <label>Select Json Files : </label>
                    <input type="file" name="jsonfiles[]" multiple class="form-control-file" id="file" onchange="return fileValidation()" required>
                </div>
                <div class="form-group">
                    <label>Files Grouped Name : </label><br>
                    <input type="text" name="group_name" class="form-control-file" id="" required>
                </div>
                <div class="form-group">
                    <label>Select the user who can access these files : </label><br>
                    <select name='allowed_user' class="form-control-select" required>
                        <option disabled selected value="">-- Select User --</option>
                        <?php
                            include "dbconnection.php";  // Using database connection file here
                            $records = mysqli_query($con, "SELECT name From users");  // Use select query here 

                            while($data = mysqli_fetch_array($records)){
                                echo "<option value='". $data['name'] ."'>" .$data['name']."</option>";  // displaying data in option menu
                            }   
                        ?>  
                    </select>
                </div>
                <p><input type="submit" name="save" value="Save" class="btn btn-primary btn-large" onclick = "getValue();"></p>
            </form>
        </header>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function fileValidation() {
            var fileInput =
                document.getElementById('file');
            
            var filePath = fileInput.value;
        
            // Allowing file type
            var allowedExtensions =/(\.json)$/i;
            
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            }
        }
    </script>
</body>
</html>
<?php } ?>