<?php require('core/init.php'); ?>

<?php 
//An object of Topic Class
$topic = new Topic;


//Get the Id of the topic from URL
$topic_id = $_GET['id'];


//Reply a topic
if(isset($_POST['do_reply'])){
	//Create an array of Data
	$data = array();
	$data['topic_id'] = $_GET['id'];
	$data['user_id'] = getUser()['user_id'];	
	$data['body'] = $_POST['body'];
	echo array();

	$validate = new Validator;

	$field_array = array('body');

	if($validate->isRequired($field_array)) {

		//Registered User
		if($topic->reply($data)){
			redirect('topic.php?id='.$topic_id, 'Your reply has been posted', 'success');
		} else {
			redirect('topic.php?id='.$topic_id, 'Something went wrong with your reply', 'error');
		}
	} else {
		redirect('topic.php?id='.$topic_id, 'Your reply form is blank', 'error');
		echo $topic_id;
	}
}

//Topic Controller
$template = new Template('template/topic.php'); 



$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;


//Diplay template 
echo $template;

?>
