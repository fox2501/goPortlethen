<?php
session_start();
include("includes/dbconnect.php");

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $clubID = $_POST['editClub'];
    $sql = "SELECT userID from club where clubID = $clubID";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['userID'] == $userID) {
            $clubID = $_POST['editClub'];
            $sql = "SELECT * FROM club WHERE clubID = '$clubID'";
            $result = $db->query($sql);
            while ($row = $result->fetch_array()) {
                $clubName = $row['clubName'];
                $category = $row['clubCategory'];
                $clubDesc = $row['clubDescription'];
                $contactNum = $row['contactNumber'];
                $feeRequired = $row['feePaid'];
                $feeCost = $row['feeCost'];
                $websiteURL = $row['websiteURL'];
            }
            if($feeRequired == 1){
                $feeRequired = 'Yes';
            } else{
                $feeRequired = 'No';
            }
            $sql = "SELECT * from photos WHERE clubID = $clubID";
            $result = $db->query($sql);
            while ($row = $result->fetch_array()) {
                $photoURL = $row['url'];
            }
            ?>
            <head>
                <meta charset="UTF-8">
                <title>Edit Club</title>
            </head>
            <?php
            include("includes/header.php");
            echo "
<body>
	<div class='ui container'>
		<div class='ui grid'>
			<div class='eight wide column'>
				<header class='ui blue huge header'>
					Edit club: $clubName
				</header>
			</div>
		</div>
		<div class='ui grid'>
			<div class='four wide column'>
				<div class='ui card'>
					<div class='image'><img src='$photoURL'></div>
				</div>
			</div>
			<div class='twelve wide column'>
				<div class='ui form'>
					<div class='field'>
						<label>Edit Club Name</label> <input name='editClubName' type='text' value='$clubName'>
					</div>
					<div class='field'>
						<label>Edit Club Description</label> 
						<textarea name='editDescription' rows=\"8\">$clubDesc</textarea>
					</div>
					<div class='field'>
						<label>Edit Contact Number</label> <input name='editNumber' type='number' value='$contactNum'>
					</div>
					<div class='field'>
						<label>Edit Website</label> <input name='editURL' type='number' value='$websiteURL'>
					</div>
					<div class='field'>
						<label>Edit Fee</label> <input name='editFee' type='text' value='N/A'>
					</div>
					<div class='field'>
						<label>Fee Required?</label>
						<div class='ui dropdown' id = 'dropdown'>
							<input name='editFeeRequired' type='hidden'> <i class='ui dropdown icon'></i>
							<div class='default text'>
								$feeRequired
							</div>
							<div class='menu'>
								<div class='item' data-value='yes'>
									Yes
								</div>
								<div class='item' data-value='no'>
									No
								</div>
							</div>
						</div>
						<div class='field'>
							<label>Edit Monthly Cost</label> <input name='editNumber' type='number' value='$feeCost'>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
            <script>
            $('#dropdown')
                .dropdown()
            ;</script>";
            include("includes/footer.php");
        } else {
            echo "You do not have permission";
        }
    }
};
?>
