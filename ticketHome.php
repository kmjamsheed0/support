<!DOCTYPE html>
<html>
<head>
<?php
	session_start();
	include'connection.php';
	
	$username = $_SESSION["username"];
?>
<style>
input[type=text], select {
    width: 100%;
    padding: 8px 12px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
	
            <div class="navbar-header">
                	
                <a class="navbar-brand" href="index.php">Themehigh Support</a>
            </div>

            <div class="header-right">
			
                 <a href="<?php echo "logout.php" ?>" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                
								  <?php
									
										echo "welcome, ".$_SESSION["username"];
									
								?>
								
                            <br />
                              
                            </div>
                        </div>

                    </li>    
                     
                </ul>

            </div>
		

        </nav>
		 
		  
	
   
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ticket's Status</h1>
                    
                
                <!-- /. ROW  -->
<?php

	
		
		$ticket_no = $_SESSION["username"];
	
	            //   PRINTS CLIENT's info
	$sql = "SELECT * from ticket where ticket_no='$ticket_no'";
	$result = $conn->query($sql);
	$p_id = "";
	   
	while($row = $result->fetch_assoc()) {
		$images = $row["image"];
?>
			<img class="profile-user-img img-responsive"  width="200px" height="200px" src="<?php echo "../project/uploads/".$images ?>" alt="User profile picture">
<?php
		echo "<label for=\"fname\">Ticket No</label>";
	    echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"ticket_no\" placeholder=\"ticket_no\" value=\"$row[ticket_no]\">";
		echo "<label for=\"fname\">Plugin</label>";
	    echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"name\" placeholder=\"Plugin\" value=\"$row[plugin]\">";
		echo "<label for=\"fname\">Posted Date</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"post_date\" placeholder=\"Posted Date..\" value=\"$row[post_date]\">";
		echo "<label for=\"fname\">Developer</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"developer\" placeholder=\"developer\" value=\"$row[developer]\">";
		echo "<label for=\"fname\">Assigned Count</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"phone\" placeholder=\"count\" value=\"$row[count]\">";
		echo "<label for=\"fname\">Type of issue</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"issue\" placeholder=\"Issue\" value=\"$row[issue]\">";
		echo "<label for=\"fname\">Plugin id</label>";
		echo "<input disabled type=\"text\" ticket_no=\"fname\" name=\"p_id\" placeholder=\"plugin id..\" value=\"$row[p_id]\">";
		$p_id = $row["p_id"];
		$ticket_no      = $row["ticket_no"];
		$agent_id  = $row["agent_id"];
		
    }
		echo "<br>\n";

	    echo "<br>\n";
	
	            // PRINTS plugin info
	
	$sql = "SELECT p_id,name,owner FROM plugin where p_id ='$p_id'";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Plugin Id</th>\n";
    echo "    <th>Name</th>\n";
    echo "    <th>Owner</th>\n";
    echo "  </tr>";
			
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["p_id"]."</td>\n";
		echo "    <td>".$row["name"]."</td>\n";
		echo "    <td>".$row["owner"]."</td>\n";
		
	}
	}
	?>
	</div>
	<?php
	
	echo "<br>\n";
	echo '<b>Plugin Information</b>';
		            //   PRINTS support INFO
	$sql = "SELECT agent_id, name  FROM support where agent_id='$agent_id'";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["agent_id"]."</td>\n";
		echo "    <td>".$row["name"]."</td>\n";
	}
	}
	
	echo "<br>\n";
	echo "<br>\n";
		echo '<b>Support team Information</b>';
	             // prints developer infos 
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
	
		
	}
	}
	echo "<br>\n";
	echo "<br>\n";
	echo '<b>Developer</b>';
  		

echo "\n";


$conn->close();	
?>

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
