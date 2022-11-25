<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 8px 12px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
	
}


input[type=submit]:hover {
    background-color: #45a049;
}


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.dis {
	pointer-events: none;
	cursor: default;
	color:#595959;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client's Status</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
$username = $_SESSION["username"];
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Client's Status</h1>
                    
                
                <!-- /. ROW  -->
<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$ticket_no = $_GET["ticket_no"];
	}
	            //   PRINTS CLIENT's info
	$sql = "SELECT * from ticket where ticket_no='$ticket_no'";
	$result = $conn->query($sql);
	$p_id = "";
	$agent_id="";
	   
?>
			
<?php
	while($row = $result->fetch_assoc()) {
		$images = $row["image"];
?>
			<img class="profile-user-img img-responsive"  width="200px" height="200px" src="<?php echo "../project/uploads/".$images ?>" alt="ticket has no profile picture">
<?php
		echo "<label for=\"fname\">Ticket</label>";
	    echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"ticket_no\" placeholder=\"clients id..\" value=\"$row[ticket_no]\">";
		echo "<label for=\"fname\">Plugin</label>";
	    echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"plugin\" placeholder=\"plugin Name..\" value=\"$row[plugin]\">";
		echo "<label for=\"fname\">DATE</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"post_date\" placeholder=\"Date..\" value=\"$row[post_date]\">";
		echo "<label for=\"fname\">Developer</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"developer\" placeholder=\"clients NID..\" value=\"$row[developer]\">";
		echo "<label for=\"fname\">count</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"count\" placeholder=\"count..\" value=\"$row[count]\">";
		echo "<label for=\"fname\">Issue</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"issue\" placeholder=\"issue..\" value=\"$row[issue]\">";
		echo "<label for=\"fname\">Plugin ID</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"p_id\" placeholder=\"plugin id..\" value=\"$row[p_id]\">";
		$p_id = $row["p_id"];
		$ticket_no      = $row["ticket_no"];
		$a_id  = $row["agent_id"];
		$agent_id = $row["agent_id"];
		echo "<a href='editTicket.php?ticket_no=".$ticket_no."'>Edit Ticket</a>\n";
    }
		echo "<br>\n";
		
	    echo "<br>\n";
	
	            // PRINTS plugin info
	
	$sql = "SELECT p_id,name,owner FROM plugin where p_id ='$p_id'";
	$result = $conn->query($sql);
	
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Plugin ID</th>\n";
    echo "    <th>Name</th>\n";
    echo "    <th>Owner</th>\n";
    echo "  </tr>\n";
	
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>\n";
		echo "    <td>".$row["p_id"]."</td>\n";
		echo "    <td>".$row["name"]."</td>\n";
		echo "    <td>".$row["owner"]."</td>\n";
	    echo "  </tr>";
		
	}
	}
	

echo '</div>';
	
	
	echo "<br>\n";
	echo "<br>\n";
	echo '<b>Plugin Information</b>';	            //   PRINTS AGEENTS INFO
	$sql = "SELECT * FROM support where agent_id='$a_id'";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th> ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["agent_id"]."</td>\n";
		echo "    <td>".$row["name"]."</td>\n";
		echo "  </tr>";
	}
	}
	
	echo "</br>\n";
	echo "</br>\n";
	echo '<b>Support</b>';
	             // prints nominee infos 
	$sql = "SELECT * FROM developer where ticket_no='$ticket_no'";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>NAME</th>\n";
    echo "  </tr>";
	
	
	
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["name"]."</td>\n";
		$developer_id = $row["developer_id"];

		
		if($agent_id == $username || "admin" == $username){
			echo "<td>"."<a href='editDeveloper.php?developer_id=".$row["developer_id"]. "'>Edit</a>"."</td>\n";
		}else {
			echo "<td>"."<a class=\"dis\" href='editDeveloper.php?developer_id=".$row["developer_id"]. "'>Edit</a>"."</td>\n";
		}
		
		
		echo "  </tr>";
	}
	}
	
	echo "</br>\n";
	echo "</br>\n";
	echo '<b>Developer</b>'; echo '&nbsp';echo '&nbsp';echo '&nbsp';

	if($agent_id== $username || "admin" == $username){
			echo "<a href='addDeveloper.php?ticket_no=".$ticket_no. "'>Add Developer</a>";
		}else {
			echo "<a class=\"dis\" href='addDeveloper.php?ticket_no=".$ticket_no. "'>Add Developer</a>";
		}
	

	if($agent_id== $username || "admin" == $username){
			echo "<td>"."<a href='deleteTicket.php?ticket_no=".$ticket_no. "'>Delete Ticket</a>"."</td>\n";
		}else {
			echo "<td>"."<a class=\"dis\" href='deleteTicket.php?ticket_no=".$row["ticket_no"]. "'>Delete Ticket</a>"."</td>\n";
		}
	

echo "\n";


	
?>

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
