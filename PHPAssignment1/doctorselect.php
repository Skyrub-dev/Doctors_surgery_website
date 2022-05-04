<?php
  session_start();
  //Main doctor page
?>

<?php include ("includes/connect.inc.php");
$sql = "SELECT * FROM guestbook";
$query_run = mysqli_query($connection, $sql);
?>
<html>
<?php
          if (isset($_SESSION["docusername"]))
          {
            /*Grabs the username of the user and displays it on the site*/
            echo "<li><p>You are signed in as: " . $_SESSION["docusername"] . "</p></li>";
            echo "<li> <a href='includes/logout.inc.php'>Logout</a></li>";
          }
          else
          {
            header("location: index.php");
            exit();
          }
        ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Doctor</title>
</head>
<body style="background-color:#292b2c;">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
      <a href="#" class="navbar-brand">Doctors Surgery</a>

      <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#navbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            
          </li>
          <li class="nav-item">
            
            
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <section class="bg-dark text-light p-5 text-center">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1>Welcome doctor
          </span></h1>

          <table>
        <tr>
          <th>guestno</th>
          <th>firstname</th>
          <th>Surname</th>
          <th>Date of birth</th>
          <th>Email</th>
          <th>Description</th>
          <th>Assigned to:</th>
          <th>Department</th>
          <th>Booked for self?</th>
          <th>Guest Firstname</th>
          <th>Guest Surname</th>
          <th>Guest Date of birth</th>
          <th>Guest email</th>
          <th>Guest decription</th>
          <th>User account ID</th>
        </tr>
        <?php 
          while($row = mysqli_fetch_array($query_run))
          {
        ?>

        <tr>
          <td><?php echo $row['guestno'];?></td>
          <td><?php echo $row['firstname'];?></td>
          <td><?php echo $row['lastname'];?></td>
          <td><?php echo $row['dob'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['description'];?></td>
          <td><?php echo $row['assigned_to'];?></td>
          <td><?php echo $row['department'];?></td>
          <td><?php echo $row['self'];?></td>
          <td><?php echo $row['gfname'];?></td>
          <td><?php echo $row['glname'];?></td>
          <td><?php echo $row['gdob'];?></td>
          <td><?php echo $row['gemail'];?></td>
          <td><?php echo $row['gdescrip'];?></td>
          <td><?php echo $row['uid'];?></td>
          <td> <a href='updatefield.php?guestno=<?php echo $row['guestno'];?>'>Assign</a>
          <td> <a href='clearfield.php?guestno=<?php echo $row['guestno'];?>'>Clear</a>
        </tr>
        <?php
          }
          ?>
      </table>
          

        </div>
      </div>
    </div>
  </section>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>
