<?php

$semesters = [];


function ceil2($value) {
    return ceil($value * 100) / 100;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$semesters = $_POST['semesters'];

	$total = 0;
	foreach($semesters as $semester){
		$total += $semester;
	}

	if (count($semesters) > 0){
		$cgpa = ceil2($total / count($semesters) );

	}


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CGPA Calculator</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<nav>
		<a href="index.php" class="nav-link"><p class="title">CGPA Calculator</p></a>
	</nav>

	<form action="cgpa.php" method="POST" class="container">

		<div class="container" id="container">
			<h1 class="font-1">Calculate your CGPA</h1>

			<?php

			if (isset($cgpa)){
				echo "<div class='result-con'>Your CGPA is $cgpa</div>";

			}



			foreach($semesters as $index => $semester){
				echo "<div class='input-con'>
				<h2>Semester #". ($index + 1) ."</h2>

				<div class='row'>
				<div>
				<input type='number'  placeholder='0.00' min='0' name='semesters[$index]' required value='$semester'>
				</div>
				</div>

				</div>";
			}





			?>
			









		</div>	
		<button class="round-btn" id="addSemester" type="button"><img src="plus.png" alt="add" width="20px"></button>



		<button class="submit-btn" type="submit">calculate</button>
	</form>



	<script>

		let addSemesterBtn = document.getElementById('addSemester');
		let container = document.getElementById('container');

		let counter = 0;

		addSemesterBtn.addEventListener("click", ()=>{
			console.log("hello");

			let semesterHtml = `
				<div class="input-con">
				<h2>Semester #${counter + 1}</h2>

				<div class="row">
				<div>
				<input type="number"  placeholder="0.00" min="0" name="semesters[${counter}]" required value="0.00">
				</div>
				</div>

				</div>	
			`;


			container.insertAdjacentHTML("beforeend", semesterHtml);
			counter++;


		})

		const requestMethod = "<?= $_SERVER['REQUEST_METHOD'] ?>";
		if (requestMethod === "GET") {
			addSemesterBtn.click();
			console.log('get')	;
		} else if (requestMethod === "POST"){
			counter = <?= count($semesters) ?>
		}



	</script>



</body>
</html>