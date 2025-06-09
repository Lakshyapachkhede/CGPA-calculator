<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CGPA Calculator - Help</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<nav>
		<a href="index.php" class="nav-link"><p class="title">CGPA Calculator</p></a>
	</nav>

	<div class="container" id="container">

		<h1 class="font-1 mt30" id="sgpa">What is SGPA?</h1>
		<h2>
			<code>SGPA = (Σ Grade Points × Credits) ÷ Σ Credits</code>
		</h2>

		<h2>Let's take an example</h2>

		<img src="syllabus.png" width="100%" alt="Syllabus Structure">

		<p>
			In this syllabus, there are 5 theory subjects. Each subject has a 70-mark theory exam and a 30-mark internal assessment. The theory part has credits such as 3 or 4. Some subjects also include a practical component worth 50 marks, which carries 2 credits.
		</p>
		
		<h3 class="mt30">Let's Calculate</h3>
		<p>
			Imagine in Operating Systems you score 75 out of 100 in theory. That corresponds to a B+ grade, i.e., 8 grade points. These 8 points are multiplied by the subject's credit (4), giving you 32 grade points for this subject.
			<br><br>
			Now, for the Operating Systems practical, if it is out of 50 marks and you score 35, you will get a B grade, i.e., 7 grade points. This is multiplied by its credits (2), giving you 14 grade points from the practical.
			<br><br>
			Similarly, for each theory and practical subject, your grade points are calculated and summed, and then divided by the total number of credits to get your SGPA.
		</p>

		<img src="grades.png" class="mt30" width="100%" alt="Grade Point Table">

	</div>

	<nav>
		<a href="https://lakshyapachkhede.github.io/Lakshyapachkhede/" class="nav-link" target="_blank"><p class="title">Lakshya Pachkhede - 2025</p></a>
	</nav>

</body>
</html>
