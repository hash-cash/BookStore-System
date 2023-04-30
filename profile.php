<div class="profile one">
	<h2>Profile</h2>
	<form action="includes/profile.inc.php" method="post">
		<div class="editc"><button type="button" onclick="edit();">Edit</button></div>
		<label>Full Name</label>
		<?php
		if(isset($_SESSION["userid"])){
			echo '<input disabled class="editf" id="name" type="text" name="name" value="' . $_SESSION["usrname"] . '">';
		?>
		<label>Email</label>
			<?php
			echo '<input disabled class="editf" id="email" type="email" name="email" value="' . $_SESSION["useremail"] . '">';
			?>
		<label>Username</label>
			<?php
			echo '<input disabled class="editf" id="uname" type="text" name="uname" value="' . $_SESSION["username"] . '">';
			?>
		<label>Phone Number</label>
			<?php
			echo '<input disabled class="editf" id="phone" type="tel" pattern="[0-9]{11}" name="phone" value="' . $_SESSION["userphone"] . '">';
		}
		?>
		<Label>Password</Label>
		<input disabled class="editf" disabled="false" required id="pass" type="password" name="pass" placeholder=""><br>
		<div class="pbutton">
			<button id="resetb" disabled class="editf disabled3 rst" type="button" name="updatep" onclick="location.href='dashboard.php?view=profile';">Cancel</button>
			<button id="submitb" disabled class="editf disabled2" type="submit" name="updatep">Update</button>
		</div>
	</form>
</div>