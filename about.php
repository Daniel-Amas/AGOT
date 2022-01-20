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
    <section id="about-head">
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
                            <a href="#" class="nav-link-anchors current-page">
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
                            <a href="index.php#contact" class="nav-link-anchors">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="page__title">
            <h1>About</h1>
            <h3>Home/<span class="page">About</span></h3>
        </div>
        <div class="curve">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <!-- ========================================================================================================================================================================= -->
    <section id="about-body" class="column">
        <div class="about-banner">
            <img src="./images/AboutpageImage.png" alt="" class="banner">
            <span class="agot">AGOT</span>
        </div>
        <div class="main">
            <span class="exhibition__date">Dec 03, 2021</span>
            <h3>Art is too important not to share</h3>
            <p>Whether you're an art aficionado, new to the art scene or a family looking for fun, the AGOT has a variety of events for all ages. Plan your visit, see what's happening today or browse all upcoming events. Filter to find family events, upcoming talks, screenings and more. To help maintain the health and safety of everyone in the AGOT, timed-entry ticketing is in place to ensure that a limited number of visitors enter the gallery every 15 minutes Tuesday through Sunday. Please book timed-entry tickets in advance prior to visiting the Gallery. Access to the AGOT Collection is included in every timed-entry ticket.</p>
			<p>Admission includes Collections and Special Exhibitions. Special Exhibitions have first-come, first-serve entry and have a capacity limit. </p>
            <p>Any public space where people come together, like the AGOT, produces a risk of exposure to the coronavirus (COVID-19). Help keep each other healthy by following health & safety guidelines, maintaining social distancing, and wearing a mask during your visit to the AGOT. By being in public spaces like the AGOT you voluntarily assume all the risks related to exposure.</p>
        </div>
        <div class="main-grid">
            <div class="grid-col">
                <figure class="about__image--container">
                    <img src="./images/AboutpageImage2.png" alt="" class="about__image">
                </figure>
                <p>Whether you’ve never picked up a paintbrush, or you’ve studied art for years, the AGOT has a course for you. The OT Gallery School is an open concept, integrated studio. We offer a broad range of courses in a fun and supportive environment with the artwork in our galleries providing added inspiration. Courses and single day workshops are offered for all ages and interests, including painting, drawing, sculpture, printmaking, photography, video and digital media, comics, movement, writing, art appreciation and more.</p>
            </div>
            <div class="grid-col">
                <figure class="about__image--container">
                    <img src="./images/AboutpageImage3.png" alt="" class="about__image">
                </figure>
                <p>AGOT’s collection of close to 5,000 works ranges from cutting-edge contemporary art such as Untilled (Liegender Frauenakt) by Pierre Huyghe to European masterpieces such as Peter Paul Rubens’s The Massacre of The Innocents; from the vast collection by the Group of Seven to works by established and emerging Indigenous Canadian artists; with a photography collection that tracks the impact of the medium with deep holdings of works by artists such as Garry Winogrand and Diane Arbus; and with focused collections in Gothic boxwood miniatures and Western and Central African art.</p>
            </div>
        </div>
        <div class="comment-section">
			<?php
				require "connect.php";
				
				if (isset($_POST['submit-comment'])) {
					$name = $_POST['username'];
					$email = $_POST['email'];
					$date = date('m/d/Y');
					$comment = $_POST['comment'];
					$image = "images/Default.png";
					
					$sql2 = "INSERT INTO comments (name, email, comment, date, image) VALUES ('" . $name . "', '" . $email . "', '" . $comment . "', '" . $date . "', '" .
							$image . "');";

					$conn->query($sql2);
				}
				
				$sql = "SELECT name, email, comment, date, image FROM comments";
				$result = $conn->query($sql);
				
				$total = $result->num_rows;
				echo "<h3>All Comments <span>(" . $total . ")</span></h3>";
				
				while($comments = $result->fetch_assoc()) {
					echo "<div class='comments'>
							<div class='userpic'>
								<figure class='userdp-container'>
										<img src='" . $comments['image'] . "' alt='' class='userdp userpic'>
								</figure>
							</div>
							<div class='comment-details'>
								<h3 class='comment-username'>" . $comments['name'] . "</h3>
								<span>" . $comments['email'] . "</span><br>
								<span class='comment-date'>" . $comments['date'] . "</span>
								<p class='user-comment'>" . $comments['comment'] . "</p>
							</div>
						</div><hr>";
				}
			?> 
            <form action="#comment-form" method="post" class="comment-form" id="comment-form">
                <h3>Leave a comment</h3>
                <div class="form-group">
                    <input type="text" name="username" id="username" required placeholder="Name">
                    <input type="email" name="email" id="comment-email" required placeholder="Email"> 
                </div>
                <div class="form-group">
                    <textarea name="comment" id="comment" cols="30" rows="10" required placeholder="Comment"></textarea>
                </div>
                <input type="submit" value="Submit" class="primary-btn form-submit" name="submit-comment">
            </form>
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
					<li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="exhibitions.html">Exhibitions</a></li>
					<li><a href="tickets.html">Tickets</a></li>
					<li><a href="index.php#contact">Contact</a></li>
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