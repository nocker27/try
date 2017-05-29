<?php
		session_start();
		ob_start();
		
        //forbind til databasen
        $host= 'db.pjetursson.com';
        $databaseusername ='web15899';
        $databasepassword = '19728m1573';
        $databasenavn = 'mysql12'; 
        
        $con=mysqli_connect($host,$databasebruger,$databasepassword,$databasenavn); //definerer forbindelsen 

    ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nyhedsbrev</title>
<link href="style.css" rel="stylesheet">

</head>

<body>

	<div class="grid grid-pad">
		<div class="col-1-1">
			<div class="content logo" id="logo">
				<img src="img/banner.gif" height="100%">
			</div>
		</div>
		<div class="col-1-1">
			<div class="content nav" id="nav">
				<div class="menu">
					<ul>
						<li><a href="index.html">Episoder</a></li>	<!-- Episoderne og lidt om hvad der blev snakket om i det -->
						<li><a href="partierne.html">Partierne</a></li> 	<!-- En hurtig og nemt forståelig forklaring omkring det enkle parti -->
						<li><a href="politik.html">Politik</a></li>		<!-- Flere historier omkring hvad der sker i den enkle region -->
						<li><a href="nyhed.php">Nyhedsbrev</a></li>		<!-- Mulighed for at få sendt et nyhedsbrev til dig på email, omkring hvad der sker i din by/kommune -->
					</ul>
				</div>
			</div>
		</div>

	<?php 
					if(isset($_POST['registrer'])){
						
						$name = $_POST['name'];
						$email = $_POST['email'];
						$comment = $_POST['comment'];
						$city = $_POST['city'];
						
						mysqli_query($con, "INSERT INTO valg (name,email,comment,city) VALUES ('$name','$email','$comment','$city')");
					}
					?>
                   <div class="col-3-12">
					
				   </div>
                   <div class="col-6-12">
						<div class="content box" id="front">
							<form method="post" action="">
								<h1>Kommentarer til Valget</h1> <!-- "valget" har double betydning --> 
							<br>
								<table>
									<tr>
										<th><p>Navn:</p></th>
									</tr>
									<tr>
										<th><input name="name" type="text" id="name" placeholder="Dit navn" required/></th>
									</tr>					
									<tr>
										<th><p>Email:</p></th>
									</tr>
									<tr>
										<th><input name="email" type="email" id="email" placeholder="Din email" required/></th>
									</tr>
									<tr>
										<th><p>By:</p></th>
									</tr>
									<tr>
										<th><input name="city" type="text" id="city" placeholder="Din by"/></th>
									</tr>
									<tr>
										<th><p>Kommentar:</p></th>
									</tr>
									<tr>
										<th><textarea rows="6" cols="50" name="comment" id="comment" placeholder="Hvad vil du gerne få oplysninger på omkring valget" required></textarea></th> <!-- "valget" har double betydning -->               
										<!-- <input name="comment" type="textarea" id="comment" placeholder="Din kommentar til valget" required/>  --> 
									</tr>
									<tr>
										<th><input type="submit" name="registrer" value="Send kommentar"/></th>
									</tr>
								</table>
							</form>
						</div>
					</div>
                   <div class="col-3-12">
					
				   </div>
                   
                   
                   
                   <?php
		
					if(!$con) {
						echo " Debugging Error:" . mysqli_connect_error( ) . PHP_EOL;
						
					}
					?>
                    


</body>
</html>