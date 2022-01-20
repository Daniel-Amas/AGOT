<?php

	require "connect.php";
	
	if ($_GET['alter'] == 'edit_comment') {
		
		$id = $_GET['id'];
		$name = $_GET['name'];
		$email = $_GET['email'];
		$comment = $_GET['comment'];
		$image = $_GET['image'];

		$sql = "UPDATE comments SET name='" . $name . "', email='" . $email . "', comment='" . $comment . "', image='" . $image . "' WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Edited.  Click <a href='db-comments.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'add_comment') {
	
		$name = $_GET['addname'];
		$email = $_GET['addemail'];
		$comment = $_GET['addcomment'];
		$image = $_GET['addimage'];
		
		$sql = "INSERT INTO comments (name, email, comment, image) VALUES ('" . $name . "', '" . $email . "', '" . $comment . "', '" .
				$image . "');";

		if ($conn->query($sql)) {
			echo "Successfully Added.  Click <a href='db-comments.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'delete_comment') {
	
		$id = $_GET['id'];
		
		$sql = "DELETE FROM comments WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Deleted.  Click <a href='db-comments.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'edit_exhib') {
		
		$id = $_GET['id'];
		$name = $_GET['name'];
		$start_date = $_GET['start_date'];
		$end_date = $_GET['end_date'];
		$description = $_GET['description'];
		$image = $_GET['image'];
		$link = $_GET['link'];

		$sql = "UPDATE exhibitions SET name='" . $name . "', start_date='" . $start_date . "', end_date='" . $end_date . "', description='" . $description . "', image='" . $image . "', link='" . $link . "' WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Edited.  Click <a href='db-exhibitions.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'add_exhib') {
		
		$name = $_GET['addname'];
		$start_date = $_GET['addstartdate'];
		$end_date = $_GET['addenddate'];
		$description = $_GET['adddescription'];
		$image = $_GET['addimage'];
		$link = $_GET['addlink'];

		$sql = "INSERT INTO exhibitions (name, start_date, end_date, description, image, link) VALUES ('" . $name . "', '" . $start_date . "', '" . $end_date . "', '" . $description . "', '" . $image . "', '" . $link . "');";
		
		if ($conn->query($sql)) {
			echo "Successfully Added.  Click <a href='db-exhibitions.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'delete_exhib') {
		
		$id = $_GET['id'];
		
		$sql = "DELETE FROM exhibitions WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Deleted.  Click <a href='db-exhibitions.php'>here</a> to return.";
		}
	} else if ($_GET['alter'] == 'edit_merch') {
		
		$id = $_GET['id'];
		$name = $_GET['name'];
		$picture = $_GET['picture'];
		$description = $_GET['description'];
		$price = $_GET['price'];

		$sql = "UPDATE merchandise SET name='" . $name . "', picture='" . $picture . "', description='" . $description . "', price='" . $price . "' WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Edited.  Click <a href='db-merchandise.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'add_merch') {
	
		$name = $_GET['addname'];
		$picture = $_GET['addpicture'];
		$description = $_GET['adddescription'];
		$price = $_GET['addprice'];
		
		$sql = "INSERT INTO merchandise (name, picture, description, price) VALUES ('" . $name . "', '" . $picture . "', '" . $description . "', '" .
				$price . "');";

		if ($conn->query($sql)) {
			echo "Successfully Added.  Click <a href='db-merchandise.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'delete_merch') {
	
		$id = $_GET['id'];
		
		$sql = "DELETE FROM merchandise WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Deleted.  Click <a href='db-merchandise.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'edit_review') {
		
		$id = $_GET['id'];
		$name = $_GET['name'];
		$photo = $_GET['photo'];
		$review = $_GET['review'];

		$sql = "UPDATE reviews SET name='" . $name . "', photo='" . $photo . "', review='" . $review . "' WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Edited.  Click <a href='db-reviews.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'add_review') {
	
		$name = $_GET['addname'];
		$photo = $_GET['addphoto'];
		$review = $_GET['addreview'];
		
		$sql = "INSERT INTO reviews (name, photo, review) VALUES ('" . $name . "', '" . $photo . "', '" . $review . "');";

		if ($conn->query($sql)) {
			echo "Successfully Added.  Click <a href='db-reviews.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'delete_review') {
	
		$id = $_GET['id'];
		
		$sql = "DELETE FROM reviews WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Deleted.  Click <a href='db-reviews.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'edit_tickets') {
		
		$id = $_GET['id'];
		$date_time = $_GET['date_time'];
		$adult = $_GET['adult_tickets'];
		$child = $_GET['child_tickets'];
		$student = $_GET['student_tickets'];
		$senior = $_GET['senior_tickets'];
		$total = $_GET['total'];
		$name = $_GET['name'];
		$email = $_GET['email'];
		$paid = $_GET['paid'];
		

		$sql = "UPDATE tickets SET date_time='" . $date_time . "', adult_tickets='" . $adult . "', child_tickets='" . $child . "', student_tickets='" . $student . "', senior_tickets='" . $senior . "', total='" . $total . "', name='" . $name . "', email='" . $email . "', paid='" . $paid . "' WHERE id=" . $id;
		
		echo $sql;
		
		if ($conn->query($sql)) {
			echo "Successfully Edited.  Click <a href='db-tickets.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'add_tickets') {
	
		$date_time = $_GET['adddatetime'];
		$adult = $_GET['addadult'];
		$child = $_GET['addchild'];
		$student = $_GET['addstudent'];
		$senior = $_GET['addsenior'];
		$total = $_GET['addtotal'];
		$name = $_GET['addname'];
		$email = $_GET['addemail'];
		$paid = $_GET['addpaid'];
		
		$sql = "INSERT INTO tickets (date_time, adult_tickets, child_tickets, student_tickets, senior_tickets, total, name, email, paid) VALUES ('" . $date_time . "', '" . $adult . "', '" . $child . "', '" . $student . "', '" . $senior . "', '" . $total . "', '" . $name . "', '" . $email . "', '" . $paid . "');";
		
		if ($conn->query($sql)) {
			echo "Successfully Added.  Click <a href='db-tickets.php'>here</a> to return.";
		}
	
	} else if ($_GET['alter'] == 'delete_tickets') {
	
		$id = $_GET['id'];
		
		$sql = "DELETE FROM tickets WHERE id=" . $id;
		
		if ($conn->query($sql)) {
			echo "Successfully Deleted.  Click <a href='db-tickets.php'>here</a> to return.";
		}
	
	}
?>