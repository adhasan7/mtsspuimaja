<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
    </head>
    <body>
<form class="form-2" method="post" action="cek_login.php">
					<h1><span class="log-in">Login</span> OR<span class="sign-up">Sign Up</span></h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Username</label>
						<input type="text" name="user" placeholder="Username or email" required>
				<br>
						<label for="level"><i class=""></i>	Level</label>
						<select name="level" required aria-required="true"><option value=''>Pilih Level Login Anda !</option>
						<option value="admin">Admin</option>
						<option value="pengajar">Guru</option>
						<option value="siswa">Siswa</option>
			
						</select>
				<br>
		
						<label for="password"><i class="icon-lock"></i>Password</label>
						<input type="password" name="password" placeholder="Password" class="showpassword" required>
					</p>
					<p class="clearfix"> 
						<a href="./media.php?page=registrasi" class="log-twitter">Registrasi</a>    
						<input type="submit" name="login" value="Login">
					</p>
				</form>

				