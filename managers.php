<div class="three">
	<h2>Managers</h2>
	<table class="rtable">
		<tr>
			<th>Full Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Actions</th>
		</tr>
			<?php
				include 'search.php';
				include_once 'includes/getuser.inc.php';
				getUsers("manager");
			?>
	</table>
</div>