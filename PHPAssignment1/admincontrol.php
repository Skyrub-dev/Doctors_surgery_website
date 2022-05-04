<?php
  session_start();
?>

<html>
<?php
          if (isset($_SESSION["adusername"]))
          {
            /*Grabs the username of the user and displays it on the site*/
            echo "<li><p>You are signed in as: " . $_SESSION["adusername"] . "</p></li>";
            echo "<li> <a href='includes/logout.inc.php'>Logout</a></li>";
          }
          else
          {
            header("location: index.php");
            exit();
          }
        ?>


<p>Create a Doctor</p>
<form action="includes/doctorCreation.inc.php" method="post">
        <select name="title" id="title">
          <option value="Dr">Dr. </option>
          <option value="Mr">Mr. </option>
          <option value="Mrs">Mrs. </option>
          <option value="Miss">Miss. </option>
          <option value="Ms">Ms. </option>

        </select>
        <br>
        <br>
        <input type="text" name="firstname" placeholder="First name">
        <br>
        <br>
        <input type="text" name="lastname" placeholder="Surname">
        <br>
        <br>
        <input type="text" name="uid" placeholder="Username...">
        <br>
        <br>
        <input type="password" name="pass" placeholder="Password...">
        <br>
        <br>
        <input type="password" name="passrepeat" placeholder="Enter Password again...">
        <br>
        <br>
        <label for="department">Assigned to:</label>
          <select name="department" id="department">
            <option value="AAE">Accident and Emergency (A&E)</option>
            <option value="GS">General Surgery (GS)</option>
            <option value="D">Dietics (D)</option>
            <option value="MHS">Mental Health Services (MHS)</option>
          </select>
          <br>
          <br>
        <button type="submit" name="submit">Sign up</button>
    </form>


    <?php
	/*https://www.tutorialrepublic.com/php-tutorial/php-mysql-select-query.php */
		/* Attempt MySQL server connection. Assuming you are running MySQL
		server with default setting (user 'root' with no password) */
		$link = mysqli_connect("localhost", "root", "", "doctorsdb");
 
		// Check connection
		if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
		}
 
		// Attempt select query execution
		$sql = "SELECT * FROM login";
			if($result = mysqli_query($link, $sql)){
				if(mysqli_num_rows($result) > 0){
					echo "<table>";
					echo "<tr>";
					echo "<th>Username</th>";
					echo "<th>First name</th>";
					echo "<th>Surname</th>";
					echo "<th>Date of Birth</th>";
          echo "<th>Email</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['firstname'] . "</td>";
					echo "<td>" . $row['lastname'] . "</td>";
					echo "<td>" . $row['dob'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
					echo "</tr>";
					}
				echo "</table>";
				// Free result set
			mysqli_free_result($result);
			} else{
				echo "No records matching your query were found.";
			}
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
	// Close connection
	mysqli_close($link);
?>
</html>