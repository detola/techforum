<?php require ('core/init.php'); ?>
<?php 
//Create an Object of Topic
$topic = new Topic;

//Create an Object of Validation 
$validate = new Validator;

//Create an Object of Template
$template = new Template('template/create.php'); 


if(isset($_POST['do_create'])){
	$data = array();
	$data['title'] = $_POST['title'];
	$data['category_id'] = $_POST['category'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];
	$data['last_activity'] = date("Y-m-d, H:i:s");

	$field_array = array('title', 'category', 'body');

	if($validate->isRequired($field_array)){
		//Register User
		if($topic->create($data)){
			redirect('index.php', 'Your topic has been created!', 'success');
		}
		else{
			redirect('topic.php?id='.$topic_id, 'Something went wrong with your post', 'error');
		}	
	}
	else {
			redirect('create.php', 'Please fill all required fields.', 'error');
		}
}

//Diplay template 
echo $template;

?>
