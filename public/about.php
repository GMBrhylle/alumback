	<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>About PLP Alumni</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap4/bootstrap.min.css">
		<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/main_styles.css">
	</head>

	<body>

		<div class="super_container">
			<!-- HEADER -->
			<?php include_once('includes/header.php'); ?>

			<!-- ABOUT US -->
			<div class="about-us-container">
				<div class="about-content">
					<div class="about-text-container">
						<h1>About the Pamantasan ng Lungsod ng Pasig Alumni</h1>
						<p>Welcome to the Pamantasan ng Lungsod ng Pasig (PLP) Alumni page! Our alumni association takes immense pride in its vibrant and diverse community of graduates who have traversed various fields, shaping industries, and contributing significantly to society.</p>
						<p>At PLP, our alumni are the cornerstone of our legacy. They embody the spirit of excellence, resilience, and leadership, having been nurtured in an environment that fosters academic prowess, critical thinking, and ethical values. As ambassadors of our institution, our alumni continue to make substantial strides in their respective professions, serving as inspirations to current students and future generations.</p>
						<p>The PLP Alumni Association endeavors to foster a strong network among its members, creating opportunities for collaboration, mentorship, and continuous learning. Through a myriad of events, initiatives, and engagements, we aim to strengthen the bond among alumni, enabling them to leverage each other's expertise, experiences, and resources.</p>
						<p>Whether across industries, borders, or disciplines, our alumni community remains united in its commitment to excellence, service, and the progressive growth of society. Join us in celebrating the achievements, aspirations, and unwavering spirit of the Pamantasan ng Lungsod ng Pasig alumni.</p>
					</div>
					<div class="officers-section">
						<h2>PLP Alumni Association Officers</h2>
						<div class="officers-container">
							<!-- officer 1 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Prof. Enrique Antonio S. Perez</h3>
									<p class="officer-position">President</p>
								</div>
							</div>
							<!-- officer 2 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Ms. Mary Grace B. Raymundo</h3>
									<p class="officer-position">Vice President for Internal Affairs</p>
								</div>
							</div>
							<!-- officer 3 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Ms. April M. Manuzon</h3>
									<p class="officer-position">Vice President for External Affairs</p>
								</div>
							</div>
							<!-- officer 4 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Ms. Aileen T. Bias</h3>
									<p class="officer-position">Secretary</p>
								</div>
							</div>
						</div>
						<!-- Container for officers 5-7 -->
						<div class="officers-container">
							<!-- officer 5 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Ms. Sharon DR. Caylan</h3>
									<p class="officer-position">Treasurer</p>
								</div>
							</div>
							<!-- officer 6 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Ms. Jenky B. Renomaro</h3>
									<p class="officer-position">Auditor</p>
								</div>
							</div>
							<!-- officer 7 -->
							<div class="officer">
								<img src="images/plp_logo.png" alt="">
								<div class="officer-details">
									<h3 class="officer-name">Mr. Regin Russel F. Gonzales</h3>
									<p class="officer-position">Public Relations Officer</p>
								</div>
							</div>
						</div>
					</div>

					<div class="videos-section">
						<h2>Journey Through Alma Mater: A Heartwarming Alumni Story</h2>
						<div class="video-container">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/y-WqfTvoAcI" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="achievements-section">
						<h2>Achievements</h2>
						<p>Our alumni have achieved milestones in various fields SOON TO BE UPLOAD...</p>
						<!-- Add more achievement details -->
					</div>
					<!-- Add more sections like events, community engagement, etc. -->
				</div>
			</div>


			<?php include_once('includes/footer.php'); ?>
		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
		<script src="js/custom.js"></script>
	</body>

	</html>