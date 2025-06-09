<?php

$subjects = [];

function getGradePoints($percentage)
{
    if ($percentage > 90) return 10;  // A+
    elseif ($percentage > 80) return 9; // A
    elseif ($percentage > 70) return 8; // B+
    elseif ($percentage > 60) return 7; // B
    elseif ($percentage > 50) return 6; // C+
    elseif ($percentage > 40) return 5; // C
    elseif ($percentage > 30) return 4; // D
    else return 0; // fail
}


function calculatePercentage($marks, $total){
	if ($total <= 0 || $marks < 0){
		return 0;
	}

	return ($marks / $total) * 100;
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$subjects = $_POST['subjects'];

	$totalCredits = 0;
	$totalGradePoints = 0;

	foreach ($subjects as $index => $subject) {

		$marks = $subject["marks"];
		$total = $subject["total"];
		$credits = $subject["credits"];


		$percentage = calculatePercentage($marks, $total);
		$subjectPoints = getGradePoints($percentage) * $credits;

		$totalGradePoints += $subjectPoints;
		$totalCredits += $credits;


	}
	if ($credits == 0){

	} else{
		
	$cgpa = $totalGradePoints / $totalCredits;
	}


}

?>







<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GGPA - Calculator</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<nav>
		<a href="index.php" class="nav-link"><p class="title">CGPA Calculator</p></a>
	</nav>
	
	<form action="sgpa.php" method="POST" class="container">

		<div class="container" id="container">
			<h1 class="font-1">Calculate your SGPA Using Marks</h1>


			<?php

			if (isset($cgpa)){
				echo "<div class='result-con'>Your SGPA is $cgpa</div>";

			}

			foreach ($subjects as $index => $subject) {



				$marks = $subject["marks"];
				$total = $subject["total"];
				$credits = $subject["credits"];

				echo "
						<div class='input-con'>
				<h2>Subject #" .  ($index  + 1) ."</h2>

				<div class='row'>

					<div>
						<p class='t-light'>marks</p>
						<input type='number'  placeholder='0.00' min='0' name='subjects[$index][marks]' required value='$marks'>
					</div>

					<div>
						<p class='t-light'>total</p>
						<input type='number'  placeholder='0.00' min='0' name='subjects[$index][total]' required value='$total'> 
					</div>

					<div>
						<p class='t-light'>credits</p>
						<input type='number'  placeholder='0.00' min='0' name='subjects[$index][credits]' required value='$credits'>
					</div>

				</div>

		</div>";


			}



			?>

	 







		</div>
		<button class="round-btn" id="addSubject" type="button"><img src="plus.png" alt="add" width="20px"></button>



		<button class="submit-btn" type="submit">calculate</button>
	</form>

	<script>
		let addSubjectBtn = document.getElementById('addSubject');
		let container = document.getElementById('container');

		let counter = 0;

		addSubjectBtn.addEventListener("click", ()=>{
			

			let subjectHtml = `
				<div class="input-con">
				<h2>Subject #${counter + 1}</h2>

				<div class="row">

					<div>
						<p class="t-light">marks</p>
						<input type="number"  value="0.00" min="0" name="subjects[${counter}][marks]" required>
					</div>

					<div>
						<p class="t-light">total</p>
						<input type="number"  value="0.00" min="0" name="subjects[${counter}][total]" required> 
					</div>

					<div>
						<p class="t-light">credits</p>
						<input type="number"  value="0.00" min="0" name="subjects[${counter}][credits]" required>
					</div>

				</div>

			</div>	
			`;


			container.insertAdjacentHTML("beforeend", subjectHtml);
			counter++;


		})

		const requestMethod = "<?= $_SERVER['REQUEST_METHOD'] ?>";
		if (requestMethod === "GET") {
			addSubjectBtn.click();
		} else if (requestMethod === "POST"){
			counter = <?= count($subjects) ?>
		}



	</script>




</body>
</html>