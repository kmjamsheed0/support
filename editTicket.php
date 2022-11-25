<!DOCTYPE html>

<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 10px 13px;
    margin: 3px 0;
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

.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
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
    <title>Edit Client</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
	   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php include 'header.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tickets Information  
						<button class="btn" align="center"> 
						<a href="addTicket.php" class="btn">Add Ticket</a>
						</button>
						</h1>
                    </div>
                </div>
                
                <!-- /. ROW  -->
<?php 

	
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$ticket_no = $_GET["ticket_no"];	
	}
	
	//                       checking if agent is authorized to edit or not  
	$temp_id="";
	$master_id="admin";
	$sql = "SELECT agent_id from ticket where ticket_no='$ticket_no'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$temp_id= $row['agent_id'];
	}
	
	if($_SESSION["username"]==($temp_id || $master_id)){
		
	
	$sql = "SELECT * from ticket where ticket_no='$ticket_no'";
	$result = $conn->query($sql);
	
	  echo "<div>\n";
	 

	while($row = $result->fetch_assoc()) {
		$images = $row["image"];
		
?>
<img class="profile-user-img img-responsive"  width="200px" height="200px" src="<?php echo "../project/uploads/".$images ?>" alt="User profile picture">

<form action="updateTicket.php" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload"><br>

<?php



		
		echo "<label for=\"fname\">Ticket No</label>";
	    echo "<input type=\"text\" ticket_no=\"fname\" name=\"ticket_no\" placeholder=\"Ticket no\" value=\"$row[ticket_no]\">";
		echo "<label for=\"fname\">Plugin</label>";
	    echo "<input type=\"text\" ticket_no=\"fname\" name=\"plugin\" placeholder=\"plugin name..\" value=\"$row[plugin]\">";
		echo "<label for=\"fname\">DATE</label>";
		echo "<input type=\"text\" ticket_no=\"fname\" name=\"post_date\" placeholder=\" Date..\" value=\"$row[post_date]\">";
		echo "<label for=\"fname\">Developer</label>";
		echo "<input type=\"text\" ticket_no=\"fname\" name=\"developer\" placeholder=\"clients NID..\" value=\"$row[developer]\">";
		echo "<label for=\"fname\">Count</label>";
		echo "<input type=\"text\" ticket_no=\"fname\" name=\"count\" placeholder=\"count..\" value=\"$row[count]\">";
		echo "<label for=\"fname\">Issue</label>";
		echo "<input type=\"text\" ticket_no=\"fname\" name=\"issue\" placeholder=\"Issue..\" value=\"$row[issue]\">";
		echo "<label for=\"fname\">Plugin ID</label>";
		echo "<input type=\"text\" ticket_no=\"fname\" name=\"p_id\" placeholder=\"p id..\" value=\"$row[p_id]\">";
		echo "<label for=\"fname\">Suport ID</label>";
		echo "<input type=\"text\" ticket_no=\"fname\" name=\"agent_id\" placeholder=\"suport id..\" value=\"$row[agent_id]\">";
		
		

		
		
		?>
			<input type="submit" value="UPDATE" name="submit">
			</form>
		<?php
	echo "<a href='deleteTicket.php?ticket_no=".$ticket_no."'>Delete Ticket</a>";
	

echo "</div>\n";
echo "\n";
    }
	}else{ echo "you are not authorized to edit this ticket";
	}
	
	
	
?>
            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


	
</body>
</html>
