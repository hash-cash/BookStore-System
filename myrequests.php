<div class="two">
	<h2>Requests</h2>
	<table class="rtable">
		<tr>
			<th>Date</th>
			<th>Duration</th>
			<th>Status</th>
		</tr>
		<?php
			include_once 'includes/requests.inc.php';
			getRequest($_SESSION["userid"]);
		?>
	</table>
</div>