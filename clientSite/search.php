<html>
	<script>
	function test() {
		var val = document.getElementById("search").value;
		console.log(val);
		window.location = 'http://157.230.150.204:2020/search.html#'+val;
	}
	</script>
	<form>
		<input type="text" id='search'>
		<input type='button' onclick='test()'></input>
	</form>
	<br>
	<br>
	<br>
	<br>
	<img src='https://lh3.googleusercontent.com/g__G0qcs-ylYAIMP_i_wPWQ5EA37ynvZzAHM_mHp9-CeSh6LVm_1PvkcGpa2zuJjl-yCArBIsg=w640-h400-e365'>
	<img src='https://lh3.googleusercontent.com/g__G0qcs-ylYAIMP_i_wPWQ5EA37ynvZzAHM_mHp9-CeSh6LVm_1PvkcGpa2zuJjl-yCArBIsg=w640-h400-e365'>
	<p id='test'>HI</p>

<?php

$servername = "localhost";
$username = "reporter";
$password = "reportingpassword1!";
$dbname = "bakery_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO testTable(C1) VALUES ('test')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();   


?>
	
</html>
