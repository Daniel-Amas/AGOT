<HTML>
<HEAD>
	<link rel="stylesheet" href="./css/styles.css">
	<style>
		body {
			background: url("images/Dashboard.jpg") no-repeat fixed;
			background-size: 100%;
		}
		
		#page-wrap { 
			width: 500px; margin: 40px auto 5px; background: #91c7ff; 
			padding: 8px;
			background: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#ccc));
			background: -moz-linear-gradient(top,  #eee,  #ccc);
			-webkit-border-radius: 16px;
			-moz-border-radius: 16px;
		}

		#main-content { padding: 14px; }

		h1 { font: bold 32px Helvetica, Arial, Sans-Serif; letter-spacing: -1px; padding: 14px; color: #333; text-shadow: 1px 1px 1px white; }
		p { margin: 0 0 15px 0; }
		 
		nav ul { 
			list-style: none; background: #154c85; padding: 5px 20px; width: 478px; position: relative; 
			left: -9px;
		}
		nav ul li { display: inline; }
		nav ul li a {
			display: block;
			float: left;
			border-top: 1px solid #96d1f8;
			background: #3e779d;
			background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
			background: -moz-linear-gradient(top,  #65a9d7,  #3e779d);
			height: 17px;
			padding: 0 10px;
			-webkit-border-radius: 8px;
			-moz-border-radius: 8px;
			border-radius: 8px;
			-webkit-box-shadow: rgba(0,0,0,1) 0 1px 3px;
			-moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
			text-shadow: rgba(0,0,0,.4) 0 1px 0;
			-webkit-text-stroke: 1px transparent;
			font: bold 11px/16px "Lucida Grande", "Verdana", sans-serif;
			color: rgba(255,255,255,.85);
			text-decoration: none; 
			margin: 0 5px 0 0;
		}
		nav ul li a:hover {
			border-top: 1px solid #4789b4;
			background: #28597a;
			background: -webkit-gradient(linear, left top, left bottom, from(#3d789f), to(#28597a));
			background: -moz-linear-gradient(top,  #3d789f,  #28597a);
			color: rgba(255,255,255,.85); 
		}	
		nav ul li a:active, nav ul li a.current {
			border-top-color: #245779;
			background: #1b435e;
			position: relative;
			top: 1px; 
		}

		footer { color: #999; margin: 0 auto; width: 500px; }
		
		td {
			padding: 5px;
		}
		
		table {
			margin: 0 auto;
		}
		
		.edit {
			background : url("images/edit-icon.png") no-repeat center center;
			border : none;
			color : transparent;
		}
		
		.delete {
			background : url("images/delete-icon.png") no-repeat center center;
			border : none;
			color : transparent;
		}
		
		.add {
			background : url("images/add-icon.png") no-repeat center center;
			border : none;
			color : transparent;
		}
	</style>
	<TITLE>AGOT Dashboard</TITLE>
	<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
	<script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
	<script type='text/javascript' src='js/dynamicpage.js'></script>
</HEAD>
<BODY>

	<section class="flex1 dashboardSection db__header-info">
		<h2>DASHBOARD</h2>
		<p>Access and alter the tables in the database.</p>
		
		<div class="buttonsDiv">
			<a href="db-comments.php" class="db-buttons">Comments</a>
			<a href="db-exhibitions.php" class="db-buttons">Exhibitions</a>
			<a href="db-merchandise.php" class="db-buttons-current">Merchandise</a>
			<a href="db-reviews.php" class="db-buttons">Reviews</a>
			<a href="db-tickets.php" class="db-buttons">Tickets</a>
		</div>

	</section>
	
	<section id="main-content" class="flex1">
		<div id="guts" class="form-group">
			<form action="alterTables.php" method="get">
			<table>
				<caption><strong>Alter Table</strong></caption>
				<tr>
					<th>
						ID
					</th>
					<th>
						Name
					</th>
					<th>
						Picture
					</th>
					<th>
						Description
					</th>
					<th>
						Price
					</th>
					<th>
						Edit
					</th>
					<th>
						Delete
					</th>
				</tr>
			<?php
				
				require "connect.php";
				
				$sql = "SELECT id, name, picture, description, price FROM merchandise";
				$result = $conn->query($sql);
				while($merch = $result->fetch_assoc()) {
					echo "
						<tr>
							<td>
								<input type='text' name='id' value='".$merch['id']."' readonly size='2'>
							</td>
							<td>
								<input type='text' name='name' value='".$merch['name']."'>
							</td>
							<td>
								<input type='text' name='picture' value='".$merch['picture']."'>
							</td>
							<td>
								<input type='text' name='description' value='".$merch['description']."'>
							</td>
							<td>
								<input type='text' name='price' value='".$merch['price']."'>
							</td>
							<td>
								<input type='submit' class='edit' name='alter' value='edit_merch'>
							</td>
							<td>
								<input type='submit' class='delete' name='alter' value='delete_merch'>
							</td>
						</tr>
						";
				}		
			?>
			</table>
			</form><BR><BR>
		<form action="alterTables" method="get">
			<table>
				<caption><strong>Add to Table</strong></caption>
				<tr>
					<th>
						Name
					</th>
					<th>
						Picture
					</th>
					<th>
						Description
					</th>
					<th>
						Price
					</th>

					<th>
						Add
					</th>
				</tr>
				<tr>
					<td>
						<input type="text" name="addname">
					</td>
					<td>
						<input type="text" name="addpicture">
					</td>
					<td>
						<input type="text" name="adddescription">
					</td>
					<td>
						<input type="text" name="addprice">
					</td>
					<td>
						<input type="submit" class="add" name="alter" value="add_merch">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</section>
</BODY>
</HTML>