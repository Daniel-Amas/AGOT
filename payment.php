<?php

	require "connect.php";
	
	$firstname = $_GET['firstname'];
	$lastname = $_GET['lastname'];
	$fullname = $firstname . " " . $lastname;
	$email = $_GET['email'];
	$dateTime = $_GET['dateTime'];
	$adultTix = $_GET['adultTickets'];
	$childTix = $_GET['childTickets'];
	$studentTix = $_GET['studentTickets'];
	$seniorTix = $_GET['seniorTickets'];
	$total = number_format(round((($adultTix * 25.00 + $childTix * 12.50 + $studentTix * 15.00 + $seniorTix * 6.75) * 1.13), 2), 2, '.', '');
	
	$sql = "INSERT INTO tickets (`date_time`, `adult_tickets`, `child_tickets`, `student_tickets`, `senior_tickets`, `total`," .
			" `name`, `email`, `paid`) VALUES ('" . $dateTime . "', '" . $adultTix . "', '" . $childTix . "', '" . 
			$studentTix . "', '" .  $seniorTix . "', '" . $total . "', '" . $fullname . "', '" .  $email . "', '0');";
			
	$conn->query($sql);
	
	session_start();
	
	$_SESSION['fullname'] = $fullname;
	$_SESSION['email'] = $email;
	$_SESSION['datetime'] = $dateTime;
	$_SESSION['adulttix'] = $adultTix;
	$_SESSION['childtix'] = $childTix;
	$_SESSION['studenttix'] = $studentTix;
	$_SESSION['seniortix'] = $seniorTix;
	$_SESSION['total'] = $total;

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
					<a href="index.php"><img src="images/Logo.png" alt="" class="logo-image"></a>
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
						<a href="exhibitions.html" class="nav-link-anchors">
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
						<div id="contents guts">
							<!-- uiView:  --><div ui-view="" class="ng-scope"><div xo-login-page="" token="token" class="ng-scope ng-isolate-scope"><section class="login" id="login" content="">
				<div class="row-fluid">
					<div class="span14 trayInner">
						<xo-login-handler token="token" auto-login="autoLogin" success-callback="onSuccess" contingency-callback="onContingency" ul-eligibility="ulEligibility" aps-integration="apsIntegration" batch="batch" login-submit="loginSubmit" class="ng-isolate-scope"><section class="login" id="login" content="">
				<xo-message message="errorMessage" class="ng-isolate-scope"><!-- ngIf: message.msgs || message.msgKeys -->
			</xo-message>
				<div class="pr row-fluid" ng-class="{hasError: errorMessage}">
					<xo-title title-txt="Login" ng-class="{span17: showLanguageDropdown}" class="ng-isolate-scope"><h1 class="alpha ng-binding">
			   Log In To PayPal
			</h1>
			</xo-title>
					<!-- ngIf: showLanguageDropdown -->
				</div>
				<div class="inline-prop ng-isolate-scope" unless-feature="propValue"><!-- ngIf: !enabled() --></div>
				<!-- ngIf: !ulEligibility --><xo-login ng-if="!ulEligibility" token="token" auth="auth" done-fn="onComplete" error-fn="onContingency" auto-login="autoLogin" aps-integration="apsIntegration" batch="batch" login-submit="loginSubmit" class="ng-scope ng-isolate-scope">
				
				
			<form name="loginForm" class="proceed ng-valid-email ng-dirty ng-valid-parse ng-invalid ng-invalid-required" content="" novalidate="novalidate" autocomplete="off" ng-submit="loginForm.$valid &amp;&amp; onSubmit()" ng-class="{true: 'validated'}[validated]">
				<div class="inputField emailField confidential">
					<label for="email" class="focus accessAid ng-binding">
						Username
					</label>
					<input ng-model="auth.email" name="username" type="email" ng-readonly="auth.emailReadOnly" value="" autocapitalize="off" aria-required="false" autocomplete="off" placeholder="Email address" data-error-text="Geçerli bir e-posta adresi girin" xo-error-tooltip="" required="" autofocus="" class="ng-valid-email ng-touched ng-dirty ng-invalid ng-invalid-required"><div class="errorTooltip errorTooltipRequired ng-binding ng-scope"></div><div class="errorTooltip errorTooltipRuleSpecific"></div>
				</div>

				<div class="inputField passwordField confidential">
					<label for="password" class="focus accessAid ng-binding">
						Password
					</label>
					<input ng-model="auth.password" name="password" type="password" value="" aria-required="true" autocapitalize="off" autocomplete="off" placeholder="Password" xo-error-tooltip="" required="" class="ng-touched ng-dirty ng-valid-parse ng-invalid ng-invalid-required"><div class="errorTooltip errorTooltipRequired ng-binding ng-scope"></div>
				</div>

				<div ng-switch="" class="checkbox" id="rmSection" on="rememberMe">
					<!-- ngSwitchWhen: nonKmli -->
					<!-- ngSwitchWhen: kmli -->
				</div>

				<xo-tooltip trigger="#verifyHelp" display-inline="true" class="ng-isolate-scope" style="display: none;"><div class="toolTip  displayInline" ng-class="{'displayInline': displayInline, 'balloon': !displayInline}" ng-transclude="">
					<div class="keepMeLoginTerms ng-scope" id="keepMeLoginTerms">
						<p class="ng-binding"></p>
						<p class="ng-binding"></p>
						<p class="ng-binding"></p>
					</div>
				</div></xo-tooltip>

				<a href="paymentconfirm.php" link-button="" track-link="signup" class="btn full submit ng-binding ng-scope" id="signupBtn" ng-if="!flowEligibility.guest &amp;&amp; flowEligibility.signup" ng-click="signup()" role="button" tabindex="0">Login</a>

				<div class="center mt10 secondary" id="forgotPasswordSection">
					<a href="https://www.paypal.com/authflow/password-recovery/?country.x=CA&locale.x=en_US&redirectUri=%252Fsignin%253Fcountry.x%253DCA%2526locale.x%253Den_US" id="forgot_password_link" target="_blank" class="smallPopup ng-binding" xo-popup="">
						Having trouble logging in?</a>
				</div>
			</form>
			
			
			</xo-login><!-- end ngIf: !ulEligibility -->
				<!-- ngIf: ulEligibility -->
			</section></xo-login-handler>
						<!-- ngIf: flowEligibility.guest || flowEligibility.signup --><!--<hr class="sep ng-scope" ng-if="flowEligibility.guest || flowEligibility.signup">--><!-- end ngIf: flowEligibility.guest || flowEligibility.signup -->
						<!-- ngIf: flowEligibility.guest -->
						<h3 class="center">OR</h3>
						<!-- ngIf: !flowEligibility.guest && flowEligibility.signup --><a href="paymentconfirm.php" link-button="" track-link="signup" class="btn btn-secondary full submit ng-binding ng-scope" id="signupBtn" ng-if="!flowEligibility.guest &amp;&amp; flowEligibility.signup" ng-click="signup()" role="button" tabindex="0">Check Out as a Guest</a><!-- end ngIf: !flowEligibility.guest && flowEligibility.signup -->
					</div>

					<!-- ngIf: !loginDesignExp --><div class="span10 ng-scope" ng-if="!loginDesignExp">
						<xo-value-props type="login" title="." text="." class="ng-isolate-scope"><div class="props login">
				<div class="prop-img"></div>
				<h2 class="vprop-header ng-binding">Safer. Faster. Easier</h2>
				<p ng-bind-html="text" class="ng-binding">Welcome to new PayPal checkout. It's everything checkout should be - faster, safer and more convenient.</p>
			</div>
			</section>			
			
			
			
			
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
