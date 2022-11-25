<!DOCTYPE html>

<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left:2%;
	display:block;
	float: center;
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
	margin-left:0%;
	font-size:110%;
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
.searchBox{
    
    cursor: pointer;
	font-size: 85%;
	
}

</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tickets</title>

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
                        <h1 class="page-head-line">Ticket Information
                      
						
						
		  
				
					
				     
						   
						<button class="btn" align="center"> 
						<a href="addticket.php" class="btn">Add Ticket</a>
						</button>
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
<?php

	$sql = "SELECT ticket_no,plugin,post_date,developer,count,issue,agent_id FROM ticket";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Ticket No</th>\n";
    echo "    <th>Plugin</th>\n";
    echo "    <th>Date</th>\n";
    echo "    <th>Assigned to</th>\n";
    echo "    <th>Assigned Count</th>\n";
	echo "    <th>Issue</th>\n";
	echo "    <th>STATUS</th>\n";
	echo "    <th>UPDATE</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["ticket_no"]."</td>\n";
		echo "    <td>".$row["plugin"]."</td>\n";
		echo "    <td>".$row["post_date"]."</td>\n";
		echo "    <td>".$row["developer"]."</td>\n";
		echo "    <td>".$row["count"]."</td>\n";
		echo "    <td>".$row["issue"]."</td>\n";
		echo "    <td>"."<a href='ticketStatus.php?ticket_no=".$row["agent_id"]. "'>Status</a>"."</td>\n";
		if($row["agent_id"]== $username || "admin" == $username){
			echo "<td>"."<a href='editTicket.php?ticket_no=".$row["ticket_no"]. "'>Edit</a>"."</td>\n";
		}else {
			echo "<td>"."<a class=\"dis\" href='editTicket.php?ticket_no=".$row["ticket_no"]. "'>Edit</a>"."</td>\n";
		}

	}
	}
?>

            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>
