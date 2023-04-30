<?php
	if($_SESSION["userperm"] === "manager") {
		echo '<div class="one">';
	} else if($_SESSION["userperm"] === "admin") {
		echo '<div class="two">';
	}
?>
	<h2>Requests</h2>
	<table class="rtable">
		<tr>
			<th>Date</th>
			<th>Username</th>
			<th>Email</th>
			<th>Duration</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
		<?php
			include 'searchreq.php';
			include_once 'includes/requests.inc.php';
			getRequests();
		?>
	</table>
</div>