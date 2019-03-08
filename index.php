<?php
session_start();
if (isset($_SESSION['id']))
{
	$login_chk = 1;
}
else
{
	$login_chk = 0;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Smart Recipe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

	<!-- Header -->
		<header id="header" class="alt">
			<h1><a href="http://api.system32.kr">Smart Recipe</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="http://api.system32.kr">Home</a></li>
					<li>
						<a href="#" class="icon fa-angle-down">Pages</a>
						<ul>
							<li><a href="user.php">Users</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li>
								<a href="#">Who are we?</a>
								<ul>
									<li><a href="pental.php">Kim Do Hyeon</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<?php
					if ($login_chk == 0)
					{
						echo '<li><a href="#login" class="button">Sign Up</a></li>';
					}
					else
					{
						echo' 
						<li><a href="upload.php"><font color = "yellow">Use Smart Recipe</font></a></li>
						<li><a href="logout.php" class="button" >Logout from "' . $_SESSION[id] . '"</a></li>';
					}
					?>
				</ul>
			</nav>
		</header>

	<!-- Banner -->
		<section id="banner">
			<h2>Smart Recipe</h2>
			<p>This Project Developed by Do.Hyeon.Kim (pental)</p>
			<ul class="actions special">
				<?php
					if ($login_chk == 0)
					{
						echo '<li><a href="#login" class="button">Sign Up</a></li>';
					}
					else
					{
						echo' 
						<li><a href="upload.php" class="button">Use It</a></li>';
					}
					?>
			</ul>
		</section>
	<!-- Main -->
		<section id="main" class="container">

			<section class="box special">
				<header class="major">
					<h2>Introducing Our Smart Recipe Technology
					<br />
					for doing your own Recipe</h2>
					<p>저는 스마트 영수증 스캐너를 이용한 인공지능 기술을 개발하고 있습니다.<br />
					아직 완성이 되지는 않았지만, 불편함 없이 사용하실 수 있습니다. </p>
				</header>
				<span class="image featured"><img src="images/aa.png" alt="" /></span>
			</section>
			<section class="box special features">
				<div class="features-row">
					<section>
						<span class="icon major fa-bolt accent2"></span>
						<h3>Accurate OCR</h3>
						<p>We used to Tesseract-OCR technology, also We make a lot of Tesseract-OCR TrainData</p>
					</section>
					<section>
						<span class="icon major fa-area-chart accent3"></span>
						<h3>Naver API</h3>
						<p>We use the Naver API to extract search results and categorize them for accurate classification.</p>
					</section>
				</div>
				<div class="features-row">
					<section>
						<span class="icon major fa-cloud accent4"></span>
						<h3>Personal information</h3>
						<p>All recognition results are sent to the cloud. Results sent to the cloud are recognized and discarded immediately. Therefore, there is no possibility of exploitation.</p>
					</section>
					<section>
						<span class="icon major fa-lock accent5"></span>
						<h3>Security</h3>
						<p>When we join the site, we use SHA-256 hash to keep your information safe. In addition, servers allow access using public keys, so there is no possibility of leakage outside.</p>
					</section>
				</div>
			</section>

			<div class="row">
				<div class="col-6 col-12-narrower">

					<section class="box special">
						<span class="image featured"><img src="images/artificial-intelligence.png" alt="ai.php" /></span>
						<h3>Artificial Intelligence</h3>
						<p>We use the Naver API to categorize the items you purchased or paid for, but we also categorize using our own classification program.
We also use our own learning data to recognize your receipt clearly.</p>
						<ul class="actions special">
							<li><a href="#" class="button alt">Learn More</a></li>
						</ul>
					</section>

				</div>
				<div class="col-6 col-12-narrower">

					<section class="box special">
						<span class="image featured"><img src="images/shield.png" alt="security.php" /></span>
						<h3>Security</h3>
						<p>To ensure your information is securely processed, encrypt it with an SHA-256 hash and store it in the database. We are also proactively preventing XSS technology and technology to prevent subscriber SQL injection.</p>
						<ul class="actions special">
							<li><a href="#" class="button alt">Learn More</a></li>
						</ul>
					</section>

				</div>
			</div>

		</section>
		<?php
		if ($login_chk == 0){
		echo '
                <section id="login" class="container">
                	<section class="box special">
                	<header class="major">
                    <div class="inner">
                        <h3><strong>Login Page</strong></h3>
                        <p> 테스트 아이디와 비밀번호는 smart / 12345678 입니다.</p>
                        <div class="6u 12u$(xsmall)">
                        <form action="login.php" method="post" id="loginform" name="loginform">
                            <h1><strong>ID</strong></h1><br>
                            <input type="text" name="loginID" id="loginID" value="" placeholder="Username">
                            <br></br>
                            <h1><strong>PASSWORD</strong></h1><br>
                            <input type="password" name="loginPASS" id="loginPASS" placeholder="Password"/>
                            <br>
                            <ul class="actions">
                                <li><input id="loginbtn" name="loginbtn" type="submit" class="button submit" value="login"></li>
                            </ul>
                            </div>
                        </form>
                    </div>
                    </header>
                    </section>
                </section>
                <!--Register-->
                <section id="join" class="container">
                	<section class="box special">
                    <div class="inner">
                        <h3><strong>Register Page</strong></h3>
                        <div class="6u 12u$(xsmall)">
                        <form action="register.php" method="post" id="regform" name="regform">
                            <div class="">
								<h1><strong>ID</strong></h1><br>
                                <input type="text" name="id" id="Username" value="" placeholder="Username" required>
                                <br>
								<h1><strong>PASSWORD</strong></h1><br>
                                <input type="password" name="password" id="password" value="" placeholder="Password" required>
                                <br>
								<h1><strong>Email</strong></h1><br>
                                <input type="email" name="email" id="email" value="" placeholder="Email" required>
                                <br>
								<h1><strong>Are you a robot?</strong></h1><br>
                                <div>
                                    <script src="https://www.google.com/recaptcha/api.js"></script>
                                    <div class="g-recaptcha" data-sitekey="6LfSLBgUAAAAAGsQqNftAy58zX2kB9O_Srqb04iG"></div>
                                </div>
                                <br>
								<h1><strong>Introduce</strong></h1><br>
                                <div>
                                    <textarea name="introduce" id="introduce" placeholder="Enter your Introduce" rows="1"></textarea>
                                </div>
                                <br>
								<br />
                                <div>
                                    <ul class="actions">
                                        <li><input type="submit" value="Register" class="button submit"></li>
                                        <li><input type="reset" value="Reset"></li> 
                                    </ul>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                    </section>
               </section>';
        }
        else
        {
        	echo '
        	<section id="banner">
					<section id="scan" class="box special">
					<header>
						<h3><font color = "black">영수증  업로드</font></h3> <br>
						<h1>영수증의 <font color="red">스캔 파일</font> 또는 <font color="red">영수증을 찍은 사진</font>을 아래의 버튼을 통해서 업로드 해주세요.</h1><br>
						<h1>바로 영수증 <font color="red">인식 결과</font>를 얻을 수 있습니다.</h1><br>
						<form enctype="multipart/form-data" action="upload_ok.php" method="post">
							<input type="file" name="myfile">
							<button>보내기</button>
						</form>
						<marquee><h1>문의 사항이 있으시면 <font color="blue">010-3842-4048</font> 로 연락주세요.</h1></marquee>
					</header>
				</section>
        	';
		}
	?>
		
			<!--<h2>Sign up for beta access</h2>
			<p>아직 미완성된 폼입니다. < 접근금지 ></p>

			<form>
				<div class="row gtr-50 gtr-uniform">
					<div class="col-8 col-12-mobilep">
						<input type="email" name="email" id="email" placeholder="Email Address" />
					</div>
					<div class="col-4 col-12-mobilep">
						<input type="submit" value="Sign Up" class="fit" />
					</div>
				</div>
			</form>-->

		</section>
	
	
	
	<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="https://www.facebook.com/deohyeon" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="https://www.instagram.com/dohyeon_pental/?hl=ko" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="http://github.com/kimdeohyeon" class="icon fa-github"><span class="label">Github</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; PENTAL 2018 (Do.Hyeon.Kim).<br></br>All rights reserved.</li><!-- Design : HTML5up -->
			</ul>
		</footer>
		</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>