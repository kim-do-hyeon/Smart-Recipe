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
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
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
								echo '<li><a href="http://api.system32.kr#login" class="button">Sign Up</a></li>';
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

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>User Information</h2>
					</header>
				<?php
                    error_reporting(E_ALL);
                    ini_set("display_errors", 1);
                    $host = 'localhost';
                    $user = 'root';
                    $pw = 'PENTAL2525@@!!';
                    $dbName = 'syswow64';
                    $mysqli = new mysqli($host, $user, $pw, $dbName);
                    
                    $result = mysqli_query($mysqli,'select * from User');
                    
                    while($row = mysqli_fetch_assoc($result))
                    {
                    	echo '번호  :  ', $row['index'], '<br>';
                        echo '<strong>매장 이름  :  </strong>', '[ ', $row['title'], ' ]', '<br>';
                        echo '전화번호  :  ',$row['telephone'], '<br>';
                        echo '분류  :  ', $row['category'], '<br>';
                        echo '주소  :  ', $row['address'], '<br>'; 
                        echo '도로명 주소  :  ', $row['roadAddress'], '<br>';
                        echo '시간  :  ', $row['time'], '<br>';
                        $str = $row['address'];
                        echo '<br><p>======================================================================</p>';
                    }
                ?>
                <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=6Ndd_DXfE2hP96jj7cI2&submodules=geocoder"></script>
			    <div id="map" style="width:100%;height:400px;"></div>
			    <script>
				  var myvar = <?php echo json_encode($str); ?>;
				</script>
			    <script>
				var map = new naver.maps.Map('map');
				var myaddress = "전라북도 전주시 완산구 효자동2가 1256-2 ";// 도로명 주소나 지번 주소만 가능 (건물명 불가!!!!)
				naver.maps.Service.geocode({address: myaddress}, function(status, response)
				{
					if (status !== naver.maps.Service.Status.OK)
					{
						return alert(myaddress + '의 검색 결과가 없거나 기타 네트워크 에러');
					}
					var result = response.result;
				// 검색 결과 갯수: result.total
				// 첫번째 결과 결과 주소: result.items[0].address
				// 첫번째 검색 결과 좌표: result.items[0].point.y, result.items[0].point.x
				var myaddr = new naver.maps.Point(result.items[0].point.x, result.items[0].point.y);
				map.setCenter(myaddr); // 검색된 좌표로 지도 이동
				// 마커 표시
				var marker = new naver.maps.Marker({
					position: myaddr,
					map: map
					});
					// 마커 클릭 이벤트 처리
					naver.maps.Event.addListener(marker, "click", function(e) {
					if (infowindow.getMap()) {
				    	infowindow.close();
				    } else {
				    	infowindow.open(map, marker);
				    }
				  });
				  // 마크 클릭시 인포윈도우 오픈
				  //var infowindow = new naver.maps.InfoWindow({
				  //    content: '<h4> [네이버 개발자센터]</h4><a href="https://developers.naver.com" target="_blank"><img src="https://developers.naver.com/inc/devcenter/images/nd_img.png"></a>'
				  //});
				});
			      </script>
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