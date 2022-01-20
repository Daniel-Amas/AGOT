<?php
	
	session_start();
	
	$fullname = $_SESSION['fullname'];
	$email = $_SESSION['email'];
	$dateTime = $_SESSION['datetime'];
	$adultTix = $_SESSION['adulttix'];
	$childTix = $_SESSION['childtix'];
	$studentTix = $_SESSION['studenttix'];
	$seniorTix = $_SESSION['seniortix'];
	$total = $_SESSION['total'];

	$barcode = substr($childTix,-1) . substr($studentTix, -1) . substr($adultTix,-1) . substr($seniorTix,-1) . substr($fullname, -3) . $dateTime;

	function fetch_tickets($conn, $adultTix, $childTix, $studentTix, $seniorTix, $barcode){
		$tickets = "<head>
					<link rel='preconnect' href='https://fonts.googleapis.com'>
					<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
					<link href='https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap' rel='stylesheet'>
					<style>	h2{
						font-family: 'Libre Barcode 128', cursive;
					}
					.tickets{
						align: center;
						height: 182pt;
						width: 500pt;
					}
					</style></head><body>";
		for($i=0; $i<$adultTix; $i++){
			$tickets .= "<img src='images/tickets/ticket_adult.jpg' alt='' class='tickets'><br><h2>".$barcode."</h2>";
		}
		for($i=0; $i<$childTix; $i++){
			$tickets .= "<img src='images/tickets/ticket_child.jpg' alt='' class='tickets'><br><h2>".$barcode."</h2>";
		}
		for($i=0; $i<$studentTix; $i++){
			$tickets .= "<img src='images/tickets/ticket_student.jpg' alt='' class='tickets'><br><h2>".$barcode."</h2>";
		}
		for($i=0; $i<$seniorTix; $i++){
			$tickets .= "<img src='images/tickets/ticket_senior.jpg' alt='' class='tickets'><br><h2>".$barcode."</h2>";
		}

		$tickets .= "</body>";

		return $tickets;

	}


	if(isset($_GET["confirmed-payment"])){	
		require 'connect.php';
		require 'class/class.phpmailer.php';
		require_once 'class/class.smtp.php';

		include('pdf.php');
		$file_name = 'Tickets.pdf';
		$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
		$html_code .= fetch_tickets($conn, $adultTix, $childTix, $studentTix, $seniorTix, $barcode);
		$pdf = new Pdf();
		$pdf->load_html($html_code);
		$pdf->render();
		$file = $pdf->output();
		file_put_contents($file_name, $file);

		$customerRecord = "SELECT * FROM tickets ORDER BY tickets.id DESC LIMIT 1";
		$result = $conn->query($customerRecord);
		$date = date("F d, Y");

		while($row = $result->fetch_assoc()) {
			$output = "<!DOCTYPE html lang='en'><html>
			<head><meta charset='UTF-8'><title>AGOT Receipt</title>
			<style>
			#receipt{
				width: 100%;
				display: block;
				background-color: #fdfdfd;
				text-align: center;
				font-size: 1em;
			}
			
			#receipt__banner{
				text-align: center;
				font-size: 3em;
				margin-bottom: 0%;
			}
			
			#receipt__id{
				text-align: center;
				font-size: 1.25em;
				margin-top: 0.25%;
				color: #949494;
			}
			
			.logo-image-receipt{
				width: 10%;
				height: 8%;
			}
			
			#header__div{
				border: solid 0.25pt black;
				margin: 0% 25% 0% 25%;
				background-color: #3299ee;
				/* background-color: #f96938; */
			
				box-shadow: 2pt 2pt #6d6d6d;    
			}
			
			#receipt__div{
				border: solid 0.25pt black;
				border-radius: 20pt;
				margin: 0% 25% 0% 25%;
			}
			
			#summary__header{
				color: rgb(102, 102, 102);
				text-align: left;
				font-size: 1.5em;
				margin: 0% 25% 0.5% 25%;
				padding: 1% 1% 0% 1%;
			}
			
			#receipt__table{
				margin: 0pt;
				background-color: #f2f3f3;
				border:none;
				border-radius: 20pt;
				border-collapse: collapse;
				padding: 10pt;
				width: 100%;
				text-align: center;
				display:inline-table;
			}
			
			#receipt__header-info{
				text-align: center;
				width: 100%;
				font-size: 1.25em;
			}
			
			#receipt__header-info th{
				padding: 1% 0% 0% 0%;
				width: 33.33%;
			}
			
			#receipt__table th, #receipt__table td, #receipt__header-info th, #receipt__header-info td {
				border:none;
			}
			
			.receipt__desc{
				text-align: left;
				padding: 2% 7% 2% 7%;
			}
			.receipt__qty{
				text-align: center;
				padding: 2% 7% 2% 25%;
			}
			.receipt__amt{
				text-align: right;
				padding: 2% 7% 2% 7%;
			}

			#contact-info p{
				text-align:left;
				font-size: 1.2em;
				margin: 2% 26% 2% 26%;
			}

			#contact-info a{
				color: #3299ee;
				text-decoration: underline;
				font-size: 1em;
			}


			</style>
			</head>
			<body id='receipt'><img src='cid:Logo' alt='AGOT' class='logo-image-receipt'><h2 id='receipt__banner'>Receipt from Art Gallery of Ontario Tech</h2>
					<h3 id='receipt__id'>Receipt #" . $row['id'] . "</h3>
					<div id='header__div'><table id='receipt__header-info'><th>AMOUNT PAID</th><th>DATE PAID</th><th>PAYMENT METHOD</th>
					<tr><td>$".$total."</td><td>".$date."</td><td>PayPal</td></tr></table></div>
					<h3 id='summary__header'>PURCHASE SUMMARY</h3><div id='receipt__div'><table id='receipt__table'><th class='receipt__desc'>DESC</th><th class='receipt__qty'>QTY</th><th class='receipt__amt'>AMT</th>";

			if($adultTix!=0){
				$output .= "<tr><td class='receipt__desc'>Adult</td'><td class='receipt__qty'>" . $adultTix . "</td><td class='receipt__amt'>$25.00</td></tr>";
			}
			if($childTix!=0){
				$output .= "<tr><td class='receipt__desc'>Child</td><td class='receipt__qty'>" . $childTix . "</td><td class='receipt__amt'>$12.50</td></tr>";
			}
			if($studentTix!=0){
				$output .= "<tr><td class='receipt__desc'>Student</td><td class='receipt__qty'>" . $studentTix . "</td><td class='receipt__amt'>$15.00</td></tr>";
			}
			if($seniorTix!=0){
				$output .= "<tr><td class='receipt__desc'>Senior</td><td class='receipt__qty'>" . $seniorTix . "</td><td class='receipt__amt'>$6.75</td></tr>";
			}
			$output .= "<tr><td class='receipt__desc' colspan='2'>Subtotal</td><td class='receipt__amt'>$". number_format(round(($total/1.13), 2), 2, '.', '') . "</td></tr>
			<tr><td class='receipt__desc' colspan='2'>Tax</td><td class='receipt__amt'>$". number_format(round((($total/1.13) * 0.13), 2), 2, '.', '') . "</td></tr>
			<tr><td colspan='3'><hr style='width:90%;margin:0% 5% 0% 5%;'></td></tr>
			<tr><td class='receipt__desc' colspan='2'><strong>Total<strong></td><td class='receipt__amt'><strong>$". number_format(round(($total), 2), 2, '.', '') . "<strong></td></tr>
			</table></div>
			<div id='contact-info'>
			<hr style='width:50%;margin:2% 25% 2% 25%;'>
			<p>Have questions? Contact us at <a href='http://ontariotechu.ca/'>ontariotechu.ca</a> or call us at <a href='tel:905-721-8668'>905-721-8668.</a></p>
			<p style='color: grey; font-size: 0.9em;'>You're receiving this email because you made a purchase at <a href='#'>AGOT</a>. As an affiliate branch of OnTech University, we ensure to provide secure invoicing and payment processing.
			<br><br>AGOT, Inc. 2000 Simcoe St N, Oshawa, ON L1G 0C5</p>
			</div></body></html>";



			$mail = new PHPMailer(true);
			$mail->IsSMTP();						
			$mail->Host = 'smtp.gmail.com';	
			$mail->Port = '465';								
			$mail->SMTPAuth = true;						
			$mail->Username = 'artgalleryofontariotech@gmail.com';				
			$mail->Password = 'agot_admin';				
			$mail->SMTPSecure = 'ssl';						
			$mail->From = 'artgalleryofontariotech@gmail.com';		
			$mail->FromName = 'AGOT';			

			if($mail->AddAddress($row['email'], $row['name']));	
			$mail->WordWrap = 50;							
			$mail->IsHTML(true);							
			$mail->AddAttachment($file_name);     
			$mail->AddEmbeddedImage('images/Logo.png', 'Logo', 'Logo.png');		
			$mail->Subject = 'Here are Your Tickets!';			
			$mail->Body = $output;			
			
			$hide=1;
			
			if($mail->Send()){	//Send an Email. Return true on success or false on error
				echo '<div class="success">Thank you <strong>'.$row['name'].',</strong> Your ticket(s) have been sent.</div> ';
			}
			else{
				echo "FAIL";
			}
			
			unlink($file_name);
			
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel='stylesheet' href='https://www.paypalobjects.com/web/res/79a/f606b759665fc5646f7642b97406f/css/app.css'>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery of Ontario Tech</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
	<meta name="apple-mobile-web-app-title" content="CodePen">
	<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
	<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
	
	<script>
		window.console = window.console || function(t) {};
	</script>
	<script>
		if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		}
	</script>
	
	<!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
    <script type='text/javascript' src='js/dynamicpage.js'></script>
	
	
	
	
</head>
<body>
	<header id="nav-bar">
		<div class="flex2">
			<div class="navBar">
				<div class="logo-img">
					<a href="#"><img src="images/Logo.png" alt="" class="logo-image"></a>
				</div>
				<ul class="nav-links-lists">
					<li class="nav-links">
						<a href="index.php" class="nav-link-anchors">
							Home
						</a>
					</li>
					<li class="nav-links">
						<a href="about.html" class="nav-link-anchors">
							About
						</a>
					</li>
					<li class="nav-links">
						<a href="index.php#exhibitions" class="nav-link-anchors">
							Exhibitions
						</a>
					</li>
					<li class="nav-links">
						<a href="#" class="nav-link-anchors current-page">
							Tickets
						</a>
					</li>
					<li class="nav-links">
						<a href="index.php#contact" class="nav-link-anchors">
							Contact
						</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
<!-- ========================================================================================================================================================================= -->
	<section id="reviews" class="flex1 grid1">
        <div class="reviews__header-info">
            <h2>Payment</h2>
            <p>Pay for tickets here.</p>
        </div>
        <div class="flex2">
			
			
			
			
			<div class="ng-scope">
			  <div class="ng-scope">
				<div class="outerWrapper TR tr" id="outerWrapper">
				<div id="header" class="merchantHeader clearfix">
					<div class="headerWrapper">
						<!-- ngIf: !(merchant.logo_url || merchant.imageUrl) --><span class="merchantName ng-binding ng-scope" ng-if="!(merchant.logo_url || merchant.imageUrl)"></span><!-- end ngIf: !(merchant.logo_url || merchant.imageUrl) -->
						<!-- ngIf: merchant.logo_url || merchant.imageUrl -->
					</div>
				</div>
			</header>
			</xo-merchant-header>
				<div id="wrapper">
					<div id="main">
						<xo-header token="token" class="ng-isolate-scope"><div class="row-fluid paypalHeaderWrapper" content="">
				<div class="span14 clearfix paypalHeader">

					<!-- ngIf: unbrandedTitle -->
					<!-- ngIf: !isUnbranded --><div id="paypalLogo" class="logo ng-scope" ng-if="!isUnbranded"><span class="accessAid ng-binding"></span></div><!-- end ngIf: !isUnbranded -->

					<xo-cart token="token" render-cart-container="renderCartContainer" class="ng-isolate-scope"><!-- ngIf: showAmt || note --><div class="cartContainer ng-scope" content="" ng-if="showAmt || note">
				<div class="transactionDetailsContainer" ng-class="{cart:showCart}">

					<a href="#transactionCartDetails" class="transactionDetails scTrack:hermes-cartExpanded" aria-controls="transctionCartDetails" aria-label="Shopping cart" role="button" ng-click="toggleCart($event)">
						<!-- ngIf: showArrow --><cart-wrapper ng-if="showArrow" show-amt="showAmt" show-arrow="showArrow" token="token" class="ng-scope ng-isolate-scope"><span class="totalWrapper clearfix" id="totalWrapper">
				<span aria-label="Your Cart" id="yourCart" class="accessAid ng-binding">
					
				</span>
				<span id="transactionCart" ng-class="{hasItems:showArrow}" class="hasItems">
					<span class="cartIcon"></span>
					<!-- ngIf: showAmt --><span ng-if="showAmt" class="ng-scope">
						<format-currency class="formatCurrency ng-binding ng-isolate-scope" code="checkoutCart.purchase.amounts.total.currency_code" amount="checkoutCart.purchase.amounts.total.amount" display-code="">
						
						<?php echo $total; ?>
							
						</format-currency>
					</span><!-- end ngIf: showAmt -->
					<!-- ngIf: showArrow && checkoutCart.purchase.items --><span ng-if="showArrow &amp;&amp; checkoutCart.purchase.items" class="arrow ng-scope">
				</span><!-- end ngIf: showArrow && checkoutCart.purchase.items -->
			</span>
			</span></cart-wrapper><!-- end ngIf: showArrow -->
					</a>

					<!-- ngIf: !showArrow -->

					<!-- ngIf: showArrow --><div class="transctionCartDetails ng-scope" aria-hidden="true" ng-if="showArrow">
						<div class="details">

							<!-- ngIf: hasItems --><div ng-if="hasItems" class="ng-scope">
								<!-- ngIf: checkoutAppData.merchant --><h3 ng-if="checkoutAppData.merchant" class="merchantName ng-scope" ng-class="{merchantTitle: note}" id="merchantName">
									<!-- ngIf: note -->
									<!-- ngIf: !note --><span ng-if="!note" class="ng-binding ng-scope"></span><!-- end ngIf: !note -->
								</h3><!-- end ngIf: checkoutAppData.merchant -->
								<!-- ngIf: note -->
							</div><!-- end ngIf: hasItems -->

							<!-- ngIf: !hasItems -->

							<!-- ngIf: hasItems --><ul class="detail-items ng-scope" ng-if="hasItems">
								<!-- ngRepeat: item in checkoutCart.purchase.items --><li ng-repeat="item in checkoutCart.purchase.items" class="items ng-scope">
									<span title="Demir Paket" class="itemName ng-binding">Iron Package</span>
									<span class="itemPrice">
										<format-currency code="item.amount.currency_code" amount="item.amount.amount" class="ng-binding ng-isolate-scope">9,90</format-currency>
										<span class="currencyCode ng-binding">TL</span>
									</span>
								</li><!-- end ngRepeat: item in checkoutCart.purchase.items -->
									
								<!-- ngIf: checkoutCart.purchase.amounts.tax -->

								<!-- ngIf: checkoutCart.purchase.amounts.shipping -->

								<!-- ngIf: checkoutCart.purchase.amounts.shipping_discount -->

								<!-- ngIf: checkoutCart.purchase.amounts.handling -->

								<!-- ngIf: checkoutCart.purchase.amounts.insurance -->
							</ul><!-- end ngIf: hasItems -->

							<!-- ngIf: hasItems && checkoutCart.purchase.amounts.total --><div class="subTotal ng-scope" ng-if="hasItems &amp;&amp; checkoutCart.purchase.amounts.total">
								<span class="itemName ng-binding">Total</span>
								<span class="itemPrice">
									<format-currency code="checkoutCart.purchase.amounts.total.currency_code" amount="checkoutCart.purchase.amounts.total.amount" class="ng-binding ng-isolate-scope">9,90</format-currency>
									<span class="currencyCode ng-binding">TL</span>
								</span>
							</div><!-- end ngIf: hasItems && checkoutCart.purchase.amounts.total -->

							<a href="#" id="closeCart" role="button" class="actions" ng-click="closeCart($event)">
								<span class="accessAid ng-binding">Close</span>
							</a>

						</div>
						<div class="pointer"> </div>
					</div><!-- end ngIf: showArrow -->
				</div>
			</div><!-- end ngIf: showAmt || note -->
			</xo-cart>
					<!-- ngIf: unbrandedSubTitle -->
					<xo-close-frame><a ng-show="isIFrame" href="" id="closeButton" target="_parent" role="button" ng-click="closeFrame($event)" class="ng-binding ng-hide">PayPal turn off purchase option</a>
			</xo-close-frame>
				</div>
			</div>
			</xo-header>
			
			<section id="main-content">
			<div id="guts">
				
				<?php 
				
					echo "<h3>Logged in as " . $fullname . ".</h3>";
					echo "<p>Please confirm purchase of:<br>";
					echo $adultTix . " Adult Tickets<br>";
					echo $childTix . " Child Tickets<br>";
					echo $studentTix . " Student Tickets<br>";
					echo $seniorTix . " Senior Tickets<br>";
					echo "For date/time: " . $dateTime . "</p>";
					echo "<strong>SUBTOTAL: " . number_format(round(($total/1.13), 2), 2, '.', '') . "<br>TAX: " . number_format(round((($total/1.13) * 0.13), 2), 2, '.', '') . "<br>TOTAL: " . $total . "</strong>";
					echo "<br><br><p>Digital copies of tickets will be sent to: " . $email . ".</p>";
				
				?>
				
				<br>	
				<form method="get">
				<input track-submit="" type="submit" name="confirmed-payment" value="Confirm" class="btn full loginBtn" ng-click="validated=true">
				</form>
				
			</div>
			</section>
					
					<!-- ngIf: !loginDesignExp --><div class="span10 ng-scope" ng-if="!loginDesignExp">
						<xo-value-props type="login" title="." text="." class="ng-isolate-scope"><div class="props login">
				<div class="prop-img"></div>
				<h2 class="vprop-header ng-binding">Safer. Faster. Easier</h2>
				<p ng-bind-html="text" class="ng-binding">Welcome to new PayPal checkout. It's everything checkout should be - faster, safer and more convenient.</p>
			</div>
			</xo-value-props>
					</div><!-- end ngIf: !loginDesignExp -->

					<!-- ngIf: loginDesignExp -->
				</div>
			</section>
			</div></div>
						</div>
					</div>
					<xo-spinner><div id="spinner" class="spinner">
				<div class="spinWrap">
					<p class="loader"></p>
					<p class="loadingMessage ng-binding"></p>
				</div>
			</div>
			</xo-spinner>
				</div>
				

<script src="https://www.paypalobjects.com/web/res/79a/f606b759665fc5646f7642b97406f/locales/TR/tr.js"></script><script src="https://www.paypalobjects.com/webstatic/r/fb/fb-all-prod.pp.min.js"></script><img src="https://www.paypalobjects.com/en_US/i/scr/btn_tracking_pixel.gif?teal=null&amp;Id=null&amp;ru=null&amp;fltk=EC-0C033035PB523150D&amp;calc=3f4b031082ff3&amp;page=main:ec:hermes::fullpage-login:member:hermes:&amp;xe=1244,1245&amp;xt=2860,2847&amp;fpti=4fbc3aee14f0a491eea412a4fdc648ec&amp;WWW_AKA_MVT_BUTTONS=null&amp;WWW_AKA_MVT_ID=null&amp;ip=88.230.30.47&amp;mrid=APKKTH6AAHFBA&amp;calf=5be9bc7c5d51b"><div id="SwfStore_PayPalLSO_0" style="position: absolute; top: -2000px; left: -2000px;"><object height="100" width="500" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="SwfStore_PayPalLSO_1" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">	<param value="https://www.paypalobjects.com/webstatic/r/fb/ppfn.swf" name="movie">	<param value="logfn=SwfStore.PayPalLSO.log&amp;onload=SwfStore.PayPalLSO.onload&amp;onerror=SwfStore.PayPalLSO.onerror&amp;LSOPath=/&amp;LSOName=PayPalLSO&amp;datafn=SwfStore.PayPalLSO.datafn" name="FlashVars">	<param value="always" name="allowScriptAccess">	<embed height="375" align="middle" width="500" pluginspage="https://www.macromedia.com/go/getflashplayer" flashvars="logfn=SwfStore.PayPalLSO.log&amp;onload=SwfStore.PayPalLSO.onload&amp;onerror=SwfStore.PayPalLSO.onerror&amp;LSOPath=/&amp;LSOName=PayPalLSO&amp;datafn=SwfStore.PayPalLSO.datafn" type="application/x-shockwave-flash" allowscriptaccess="always" quality="high" loop="false" play="true" name="SwfStore_PayPalLSO_1" bgcolor="#ffffff" src="https://www.paypalobjects.com/webstatic/r/fb/ppfn.swf"></object></div>
			
			
			
			
			
        </div>
    </section>
<!-- ========================================================================================================================================================================= -->
    <footer class="footer__container">
        <div class="footer__grid">
            <div class="footer__about">
                <div class="logo-img">
                    <a href="#"><img src="images/Logo.png" alt="" class="logo-image"></a>
                </div>
                <p>AGOT houses original, creative and expressive artworks, with the help of the team at ADDJ.</p>
            </div>
            <div class="footer__links">
                <h3 class="footer__header">Links</h3>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Exhibitions</a></li>
                    <li><a href="#">Store</a></li>
                    <li><a href="#">Members</a></li>
                    <li><a href="#">Donate</a></li>
                </ul>
            </div>
            <div class="footer__contact">
                <h3 class="footer__header">Contact Info</h3>
                <ul>
                    <li>Phone: 905-721-8668</li>
                    <li>Email: AGOT@addj.com</li>
                    <li>Address: AGOT, Inc. 2000 Simcoe St N,<br>Oshawa, ON L1G 0C5</li>
                </ul>
            </div>
            <div class="footer__social">
                <h3 class="footer__header">Social Media</h3>
                <div class="socials">
                    <a href=""><i class="fa-brands fa-facebook-square"></i></a>
                    <a href=""><i class="fa-brands fa-twitter-square"></i></a>
                    <a href=""><i class="fa-brands fa-instagram-square"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <span class="copyright"> &copy; By ADDJ All Rights Reserved AGOT 2021</span>
    </footer>
</body>
</html>
<!-- https://twitter.com/ontariotech_u?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor -->
