<form method="POST" name="email_form_with_php"
action="email.php" enctype="multipart/form-data"> 
 
<label for='name'>Name: </label>
<input type="text" name="name" >
 
<label for='email'>Email: </label>
<input type="text" name="email" >
 
<label for='message'>Message:</label>
<textarea name="message"></textarea>
 
<label for='uploaded_file'>Select A File To Upload:</label>
<input type="file" name="uploaded_file">
 
<input type="submit" value="Submit" name='submit'>
</form>