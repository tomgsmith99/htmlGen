<?php

class htmlPage {

	function __construct() {
		$this->elements["javascript"]["ext"] = ".js";
		$this->elements["javascript"]["tag"] = "<script src = '%PATH%'></script>";
		$this->elements["javascript"]["block"] = "";

		$this->elements["css"]["ext"] = ".css";
		$this->elements["css"]["tag"] = "<link rel = 'stylesheet' href = '%PATH%'/>";
		$this->elements["css"]["block"] = "";

		$this->findFiles();
	}

	function addElement($type, $path) {

		$tag = str_replace("%PATH%", $path, $this->elements[$type]["tag"]);

		if (!empty($this->elements[$type]["block"])) { 
			$this->elements[$type]["block"] .= "\n\t\t";
		}

		$this->elements[$type]["block"] .= $tag;

	}

	function display() {

		echo $this->getHTML();

	}

	function findFiles() {
		foreach ($this->elements as $element => $arr) {
			$files = $this->getElements($element, $arr["ext"]);

			foreach ($files as $file) {
				$path = "/" . HOME . "/" . $element . "/" . $file;

				$this->addElement($element, $path);

			}
		}
	}

	function addToBody($element) {
		$this->body = $this->body . "\n\t\t" . $element;
	}

	function getBody() {
		if (empty($this->body)) { $this->body = ""; }

		return "\n\t<body>" . $this->body . "\n\t</body>"; 
	}

	function getElements($element, $ext) {

		$dir = $_SERVER['DOCUMENT_ROOT'] . "/" . HOME . "/" . $element . "/";

		$files = scandir($dir);

		foreach ($files as $file) {

			$offset = 0 - strlen($ext);

			if (substr($file, $offset) == $ext) {
				$validFiles[] = $file;
			}
		}

		return $validFiles;
	}

	function getHead() {

		$this->head = "";

		$headElements = array($this->title, $this->elements["css"]["block"], $this->elements["javascript"]["block"]);

		foreach ($headElements as $element) {
			if (!empty($element)) { $this->head .= "\n\t\t" . $element; }
		}

		return "\n\t<head>" . $this->head . "\n\t</head>";
	}

	function getHTML() {

		return "<!DOCTYPE HTML>\n<html>" . $this->getHead() . "\n" . $this->getBody() . "\n</html>";
	}

	function setTitle($title) {

		$this->title = "<title>" . $title . "</title>";

	}
}


// <!DOCTYPE HTML>
// <!--
// 	Future Imperfect by HTML5 UP
// 	html5up.net | @ajlkn
// 	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
// -->
// <html>
// 	<head>
// 		<title>Okta intranet demo - Travel with Pros</title>
// 		<meta charset="utf-8" />
// 		<meta name="viewport" content="width=device-width, initial-scale=1" />
// 		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
// 		<link rel="stylesheet" href="assets/css/main.css" />
// 		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
// 		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

// 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

// 		<script>

// 			function getDate() {
// 				var today = new Date();
// 				var dd = today.getDate();
// 				// var mm = today.getMonth() + 1;
// 				var mm = today.getMonth();

// 				var yyyy = today.getFullYear();

// 				var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

// 				var monthName = months[mm];

// 				var dateString = monthName + " " + dd + ", " + yyyy;

// 				$(".published").html(dateString);

// 			}

// 			window.onload = getDate;

// 		</script> 

// 	</head>
// 	<body>

// 		<!-- Wrapper -->
// 			<div id="wrapper">

// 				<!-- Header -->
// 					<header id="header">
// 						<h1><a href="#">Travel with Pros</a></h1>
// 						<nav class="links">
// 							<ul>
// 								<li><a href="https://tomco.okta.com/home/salesforce/0oapq5e1G3yk5Syeg1t5/46" target="_blank">Salesforce Chatter</a></li>
// 								<li><a href="https://tomgsmith-dev-ed.my.salesforce.com/" target="_blank">SP-Initiated SAML SSO</a></li>
// 								<li><a href="#">Timesheets</a></li>
// <!-- 								<li><a href="#">Contests</a></li>
//  -->								<li><a href="#">Company News</a></li>
// 							</ul>
// 						</nav>
// 						<nav class="main">
// 							<ul>
// 								<li class="search">
// 									<a class="fa-search" href="#search">Search</a>
// 									<form id="search" method="get" action="#">
// 										<input type="text" name="query" placeholder="Search" />
// 									</form>
// 								</li>
// 								<li class="menu">
// 									<a class="fa-bars" href="#menu">Menu</a>
// 								</li>
// 							</ul>
// 						</nav>
// 					</header>

// 				<!-- Menu -->
// 					<section id="menu">

// 						<!-- Search -->
// 							<section>
// 								<form class="search" method="get" action="#">
// 									<input type="text" name="query" placeholder="Search" />
// 								</form>
// 							</section>

// 						<!-- Links -->
// 							<section>
// 								<ul class="links">
// 									<li>
// 										<a href="#">
// 											<h3>Lorem ipsum</h3>
// 											<p>Feugiat tempus veroeros dolor</p>
// 										</a>
// 									</li>
// 									<li>
// 										<a href="#">
// 											<h3>Dolor sit amet</h3>
// 											<p>Sed vitae justo condimentum</p>
// 										</a>
// 									</li>
// 									<li>
// 										<a href="#">
// 											<h3>Feugiat veroeros</h3>
// 											<p>Phasellus sed ultricies mi congue</p>
// 										</a>
// 									</li>
// 									<li>
// 										<a href="#">
// 											<h3>Etiam sed consequat</h3>
// 											<p>Porta lectus amet ultricies</p>
// 										</a>
// 									</li>
// 								</ul>
// 							</section>

// 						<!-- Actions -->
// 							<section>
// 								<ul class="actions vertical">
// 									<li><a href="#" class="button big fit">Log In</a></li>
// 								</ul>
// 							</section>

// 					</section>

// 				<!-- Main -->
// 					<div id="main">

// 						<!-- Post -->
// 							<article class="post">
// 								<header>
// 									<div class="title">
// 										<h2><a href="#">Company Picnic coming up!</a></h2>
// 										<p>Please register by Thursday!</p>
// 									</div>
// 									<div class="meta">
// <!--										<time class="published" datetime="2015-11-01">June 1, 2016</time>-->

// <time class="published" datetime="2015-11-01"></time>
// <!-- <div id = "published"></div>
//  -->										<a href="#" class="author"><span class="name">Sansa Stark</span><img src="images/sansa.jpeg" alt="" /></a>
// 									</div>
// 								</header>
// 								<a href="#" class="image featured"><img src="images/picnic.jpeg" alt="" /></a>
// 								<p>Yes, it's that time of year again! Get ready for some great food and fun on the riverfront!</p>
// 								<footer>
// 									<ul class="actions">
// 										<li><a href="#" class="button big">Continue Reading</a></li>
// 									</ul>
// 									<ul class="stats">
// 										<li><a href="#">General</a></li>
// 										<li><a href="#" class="icon fa-heart">28</a></li>
// 										<li><a href="#" class="icon fa-comment">128</a></li>
// 									</ul>
// 								</footer>
// 							</article>

// 						<!-- Pagination -->
// 							<ul class="actions pagination">
// 								<li><a href="" class="disabled button big previous">Previous Page</a></li>
// 								<li><a href="#" class="button big next">Next Page</a></li>
// 							</ul>

// 					</div>

// 				<!-- Sidebar -->
// 					<section id="sidebar">

// 						<!-- Intro -->
// 							<section id="intro">
// 								<a href="#" class="logo"><img src="images/compass6.png" alt="" /></a>
// 								<header>
// 									<h2>Travel with Pros</h2>
// 									<p>Company intranet</p>
// 								</header>
// 							</section>

// 						<!-- Mini Posts -->
// 							<section>
// 								<div class="mini-posts">

// 									<!-- Mini Post -->
// 										<article class="mini-post">
// 											<header>
// 												<h3><a href="#">New trip to Yosemite</a></h3>
// 												<time class="published" datetime="2015-10-20">October 20, 2015</time>
// 												<a href="#" class="author"><img src="images/yosemite.jpeg" alt="" /></a>
// 											</header>
// 											<a href="#" class="image"><img src="images/yosemite.jpeg" alt="" /></a>
// 										</article>

// 									<!-- Mini Post -->
// 										<article class="mini-post">
// 											<header>
// 												<h3><a href="#">Yellowstone most popular so far in 2016</a></h3>
// 												<time class="published" datetime="2015-10-19">October 19, 2015</time>
// 												<a href="#" class="author"><img src="images/yellowstone.jpeg" alt="" /></a>
// 											</header>
// 											<a href="#" class="image"><img src="images/yellowstone.jpeg" alt="" /></a>
// 										</article>

// 								</div>
// 							</section>

// 						<!-- About -->
// 							<section class="blurb">
// 								<h2>About</h2>
// 								<p>This is a great company focused on employee engagement and making the world a better place.</p>
// 								<ul class="actions">
// 									<li><a href="#" class="button">Learn More</a></li>
// 								</ul>
// 							</section>

// 						<!-- Footer -->
// 							<section id="footer">
// 								<ul class="icons">
// 									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
// 									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
// 									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
// 									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
// 									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
// 								</ul>
// 								<p class="copyright">&copy; Okta. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
// 							</section>

// 					</section>

// 			</div>

// 		<!-- Scripts -->
// 			<script src="assets/js/jquery.min.js"></script>
// 			<script src="assets/js/skel.min.js"></script>
// 			<script src="assets/js/util.js"></script>
// 			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
// 			<script src="assets/js/main.js"></script>

// 	</body>
// </html>