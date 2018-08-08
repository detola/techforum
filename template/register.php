<?php include('includes/header.php'); ?>
						<!-- We have to have the enctype=multipart/form-data because we are going to have the file upload(avatar)-->
						<form action="register.php" role="form" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Name*</label><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
							</div>
							<div class="form-group">
								<label>Email*</label><input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
							</div>
							<div class="form-group">
								<label>Choose Username*</label><input type="text" name="username" class="form-control" placeholder="Choose A Username" required>
							</div>
							<div class="form-group">
								<label>Password*</label><input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
							</div>
							<div class="form-group">
								<label>Confirm Password*</label><input type="password" name="password2" class="form-control" placeholder="Enter Password Again" required>
							</div>
							<div class="form-group">
								<label>Upload Avatar</label>
								<input type="file" name="avatar">
								<p class="help-block"></p>
							</div>
							<div class="form-group">
								<label>About Me</label>
								<textarea name="about" id="about" class="form-control" cols="80" rows="6" placeholder="Tell us about yourself (Optional)"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" name="register" value="Register" class="btn btn-default" />	
							</div>

						</form>
<?php include('includes/footer.php'); ?>