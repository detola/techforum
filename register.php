<?php require('core/init.php'); ?>
<?php 
//A Topic object for Side bar to work
$topic = new Topic;

//Create an Object of User
$user = new User;

//Create an Object of Validator
$validate = new Validator;


if(isset($_POST['register'])) {
	//Create Data Array
	$data = array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
	$data['last_activity'] = date('Y-m-d H:i:s');

	//Required Fields
	$field_array = array('name', 'email', 'password', 'password2' );

	if($validate->isRequired($field_array)) {
		if($validate->isValidEmail($data['email'])) {
			if($validate->passwordsMatch($data['password'], $data['password2'])) {

			} else {
				redirect('register.php', 'Your passwords does not match', 'error');
			}
		} else {
			redirect('register.php', 'Invalid Email Address', 'error');
		}
	} else {
		redirect('register.php', 'Please enter the required field', 'error');
	}

	
	//Upload Avatar Image
	if($user->uploadAvatar()){
		$data['avatar'] = $_FILES["avatar"]["name"];
	} else {
		$data['avatar'] = 'noimage.png';
	}

	//Register User 
	if($user->register($data)){
		redirect('index.php', 'You are registered and can now log in!', 'success');
	} else {
		redirect('index.php', 'Somthing went wrong with your registeration', 'error');
	}
	
}

//Register Controller
$template = new Template('template/register.php'); 

//Diplay template 
echo $template;

?>
