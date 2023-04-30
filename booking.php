<div class="booking one">
	<h2>Book</h2>
	<form action="includes/book.inc.php" method="post">
		<label>Date (YYYY-MM-DD):</label>
		<input id="date" type="text" name="date">
		<label>Duration:</label>
		<select id="dur" name="duration">
			<option value="1 Semester" selected>1 Semester</option>
			<option value="2 Semesters">2 Semesters</option>
			<option value="1 Year">1 Year</option>
		</select><br>
		<button type="submit" name="book">Book</button>
	</form>
</div>