<?php 
	print '
	<h1 align="center">KONTAKTIRAJTE NAS</h1>
		<br>
		<div align="center" id="contact">
			<form action="send-contact.php" id="contact_form" name="contact_form" method="POST">
				<label for="fname">IME*</label>
				<input type="text" id="fname" name="firstname" placeholder="Ime" required>

				<label for="lname">PREZIME*</label>
				<input type="text" id="lname" name="lastname" placeholder="Prezime" required>
				
				<label for="lname">E-MAIL*</label>
				<input type="email" id="email" name="email" placeholder="E-mail" required>

				<label for="subject">PORUKA</label>
				<textarea id="subject" name="description" placeholder="Tekst" style="height:200px"></textarea>
				<br>
				<input type="submit" value="POŠALJI">
				</form>
				<br>
				<br>
				<br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.8977032738803!2d15.966093015569217!3d45.81330707910662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6e25535bff1%3A0xac3ef5fbbe85dcb2!2sIlica%2052%2C%2010000%2C%20Zagreb!5e0!3m2!1shr!2shr!4v1577550322015!5m2!1shr!2shr" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				<p align=center> Adresa: Ilica 52, Zagreb, 10 000 </p>
				<p align=center> Telefon: 098 1234 567 </p>
				<p align=center> Radno vrijeme: 0-24 </p>
		</div>';
?>