<?php include('core/init.php'); ?>

<?php 
//Create User Object
		$user = new User;

		if(isset($_POST['do_logout'])) {
			if($user->logout()){
				redirect('index.php', 'You are now logged out', 'success');
			}
		} else {
			redirect('index.php');
		}