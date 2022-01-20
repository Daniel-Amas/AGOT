<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery of Ontario Tech</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section id="landing-page">
        <header id="nav-bar">
            <div class="flex2">
                <div class="navBar">
                    <div class="logo-img">
                        <a href="#"><img src="images/Logo.png" alt="" class="logo-image"></a>
                    </div>
                    <ul class="nav-links-lists">
                        <li class="nav-links">
                            <a href="#" class="nav-link-anchors current-page">
                                Home
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="about.php" class="nav-link-anchors">
                                About
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="exhibitions.html" class="nav-link-anchors">
                                Exhibitions
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="tickets.html" class="nav-link-anchors">
                                Tickets
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#contact" class="nav-link-anchors">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <figure class="squiggleLogo">
            <img src="images/MainLogoSquiggle.png" alt="">
        </figure>
        <figure class="transLogo">
            <img src="images/TranslucentLogo.png" alt="">
        </figure>
        <div class="landing-page__header-info">
            <p>Book your visit now</p>
            <div class="buttons">
                <a href="tickets.html" class="primary-btn">Book Now</a>
            </div>
        </div>
        <div class="curve">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <!-- ========================================================================================================================================================================= -->
    <section id="featured" class="flex1">
        <div class="featured--layout">
            <div class="featured__img--container">
                <figure>
                    <img src="images/FeaturedArtist.png" alt="" class="featured__img">
                </figure>
            </div>
            <div class="featured__about--container">
                <h2>Featured Artist</h2>
                <h3>Charlie Jackson <span class="line"></span></h3>
                <p>Charlie Jackson has inspired many other artists with his inventive and curious approach to the landscape and human form. An Archibald Prize winner, educator and respected painter, his contribution to Canada’s visual culture has been enormous. He creates about his colourful life and career – the rainforest, the permutations of the art world, the primality of painting and the experience of growing older.</p>
                <div class="buttons">
                    <a href="exhibitions.html" class="primary-btn">View Artists</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================================================================================================================================================================= -->
    <section id="store" class="flex1">
        <div class="store__header-info">
            <h2>Merchandise</h2>
            <p>Visit our gift shop in person to purchase these items!</p>
        </div>
        <div class="store__items--container flex2">
			<?php
				require "connect.php";
				
				$sql1 = "SELECT name, picture, description, price FROM merchandise";
				$result1 = $conn->query($sql1);
				while($merch = $result1->fetch_assoc()) {
					echo "<div class='store__items--card'>
							<img src='images/".$merch['picture']."' alt='' class='store__item'>
							<p class='merch_desc'>".$merch['name']."<br><br>
								".$merch['description']."<br><br>
								Price: $".$merch['price']."
							</p>
						</div>";
				}
			?>

        </div>
    </section>
    <!-- ========================================================================================================================================================================= -->
    <section id="reviews" class="flex1 grid1">
        <div class="reviews__header-info">
            <h2>Reviews</h2>
            <p>Our reviews from satisfied customers</p>
        </div>
        <div class="flex2">
			<?php
				require "connect.php";
				
				$sql2 = "SELECT name, photo, review FROM reviews";
				$result2 = $conn->query($sql2);
				while($rev = $result2->fetch_assoc()) {
					echo "<div class='review__card card'>
							<i class='fa fa-quote-left fa-3x' aria-hidden='true'></i>
							<p class='review'>".$rev['review']."</p>
							<figure class='reviewer'>
								<img src='".$rev['photo']."' alt='' class='reviewer-pic'>
								<p class='reviewer-name'>".$rev['name']."</p>
							</figure>
						</div>";
				}
			?>
        </div>
    </section>
    <!-- ========================================================================================================================================================================= -->
    <section id="exhibitions" class="flex1 grey grid1">
        <div class="exhibitions__header-info">
            <h2>Exhibitions</h2>
            <p>Take a look at our magnificent exhibitions</p>
        </div>
        <div class="exhibition__card--container">
			<?php	
				require "connect.php";
				
				$sql3 = "SELECT name, start_date, end_date, description, image, link FROM exhibitions";
				$result3 = $conn->query($sql3);
				while($exh = $result3->fetch_assoc()) {
					echo "<div class='exhibition__card'>
							<div class='exhibition__card--image'>
								<img src='".$exh['image']."' alt='' class='exhibits'>
							</div>
							<div class='exhibition__card--about'>
								<span class='exhibition__date'>".$exh['start_date']." to ".$exh['end_date']."</span>
								<h3>".$exh['name']."</h3>
								<p>".$exh['description']."</p>
							</div>
						</div>";
				}
			?>
        </div>
        <div class="buttons">
            <a href="exhibitions.html" class="primary-btn">View All</a>
        </div>
    </section>
    <!-- ========================================================================================================================================================================= -->
    <section id="contact" class="flex1 grid1">
        <div class="contact__header-info">
            <h2>Contact Us</h2>
            <p>Feel free to reach us if you need any assistance</p>
        </div>
        <div class="contact__card--container flex2">
            <div class="contact__card card">
                <i class="fa-regular fa-map"></i>
                <h3>Address</h3>
                <p>AGOT, Inc 2000 Simcoe St N,<br>Oshawa, ON L1G 0C5</p>
            </div>
            <div class="contact__card card">
                <i class="fa-regular fa-envelope-open"></i>
                <h3>Email</h3>
                <p><a href="mailto:AGOT@addj.com" class="email">AGOT@addj.com</a></p>
            </div>
            <div class="contact__card card">
                <i class="fa-solid fa-mobile-screen-button"></i>
                <h3>Phone</h3>
                <p>905-721-8668</p>
            </div>
            <div class="contact__card card">
                <i class="fa-solid fa-bullhorn"></i>
                <h3>Follow us</h3>
                <div class="socials">
                    <a href="https://www.facebook.com/ontariotechu/"><i class="fa-brands fa-facebook-square"></i></a>
                    <a href="https://twitter.com/ontariotech_u"><i class="fa-brands fa-twitter-square"></i></a>
                    <a href="https://www.instagram.com/ontariotechu/"><i class="fa-brands fa-instagram-square"></i></a>
                </div>
            </div>
            <div class="iframe__container card">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2872.671533611521!2d-78.89897944967433!3d43.94547107900981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d51b9a6af8ae7f%3A0x2a373a19593716f5!2sOntario%20Tech%20University!5e0!3m2!1sen!2sca!4v1637376579908!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
				<div class="contact__form--container card" id="contactForm">
					<i class="fa-regular fa-paper-plane fa-2x"></i>	
					<h3>Send a Message</h3>
					<form action="#contactForm" method="post" class="contact__form">
						<div class="form-group">
							<input type="text" id="name" name="username" placeholder="First Name" required> 
						</div>
						<div class="form-group">
							<input type="email" id="email" name="useremail" placeholder="Your email address" required> 
						</div>
						<div class="form-group">
							<textarea id="message" name="usermessage" cols="40" rows="5" placeholder="Send a message!" required></textarea> 
						</div>
						<button type="submit" name="submit-message" class="primary-btn form-btn">Send Message</button><br>
						<?php
							messageReturn();
						?>
					</form>
            </div>
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
					<li><a href="#">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="exhibitions.html">Exhibitions</a></li>
					<li><a href="tickets.html">Tickets</a></li>
					<li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer__contact">
                <h3 class="footer__header">Contact Info</h3>
                <ul>
                    <li>Phone: 905-721-8668</li>
                    <li>Email: <a href="mailto:AGOT@addj.com" class="email">AGOT@addj.com</a></li>
                    <li>Address: AGOT, Inc. 2000 Simcoe St N,<br>Oshawa, ON L1G 0C5</li>
                </ul>
            </div>
            <div class="footer__social">
                <h3 class="footer__header">Social Media</h3>
                <div class="socials">
                    <a href="https://www.facebook.com/ontariotechu/"><i class="fa-brands fa-facebook-square"></i></a>
                    <a href="https://twitter.com/ontariotech_u"><i class="fa-brands fa-twitter-square"></i></a>
                    <a href="https://www.instagram.com/ontariotechu/"><i class="fa-brands fa-instagram-square"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <span class="copyright"> &copy; By ADDJ All Rights Reserved AGOT 2021</span>
    </footer>
</body>
</html>
<!-- https://twitter.com/ontariotech_u?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor -->
<?php
function messageReturn(){
    if(isset($_POST["submit-message"])){	
        require 'class/class.phpmailer.php';
        require_once 'class/class.smtp.php';

        $mail = new PHPMailer(true);
        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';								//Sets the default SMTP server port
        $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'artgalleryofontariotech@gmail.com';					//Sets SMTP username
        $mail->Password = 'agot_admin';					//Sets SMTP password
        $mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'artgalleryofontariotech@gmail.com';			//Sets the From email address for the message
        $mail->FromName = 'AGOT';			//Sets the From name of the message

        if($mail->AddAddress($_POST['useremail'], $_POST['username']));		//Adds a "To" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML				
        $mail->Subject = 'Thank You for Your Message!';			//Sets the Subject of the message
        $mail->Body = 'This is an automated email, please do not reply.' . "\r\n" . 'Hi ' . $_POST['username'] . ', thanks for your feedback! We hope to create an atmosphere that will empower young artists to change the world!';				//An HTML or plain text message body
		
		$hide=1;
		
        if($mail->Send()){	//Send an Email. Return true on success or false on error
            echo '<div class="success">Thank you <strong>'.$_POST['username'].',</strong> Your message has been sent.</div> ';
        }
        else{
            echo "FAIL";
        }
    }
}
?> 