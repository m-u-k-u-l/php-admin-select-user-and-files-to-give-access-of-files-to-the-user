<?php
session_start();
include "dbconnection.php";
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome <?php echo $_SESSION['name'];?> </title>
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
                       <!--  <a href="#"><?php //echo $_SESSION['id'];?></a> -->
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
        <h1>A Warm Welcome!</h1>
        <p>Hello user! here is your allowed json files.</p>
        <div class="form-group">
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>File group name</th>
              <th>Json file</th>
            </thead>
            <?php
              $query = "SELECT * FROM adminfiles WHERE allowed_user="."'".$_SESSION['name']."'";
              $data = mysqli_query($con, $query);
              $totalrows = mysqli_num_rows($data);
              if ($totalrows != 0) {
                $i = 0;
                while ($result = mysqli_fetch_assoc($data)) {
                  //$id = $result['Uid'];
                  $i++;
                  ?>

                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $result['files_group_name'];?></td>
                    <td><?php echo $result['json_files'];?></td>
                    <td>
                      <a href ="viewchart.php?file=<?php echo $result['json_files'];?>" > <input type = 'submit' value='View Chart' class="btn btn-success"><!-- target="_blank" -->
                    </td>
                  </tr>   
                  <?php
                }
              }
              else{
                echo "No Records found";
              }
            ?>
            </tbody>
          </table>
        </div>          
      </header>
    </div>
</body>
</html>
<?php } ?>