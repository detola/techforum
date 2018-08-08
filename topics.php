<?php require('core/init.php'); ?>
<?php 
//Create Topics Object
$topic = new Topic;

//Get category from URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get User from URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template & Assign Vars
$template = new Template('template/topics.php'); 

//Assign Template Variables 
if(isset($category)) {
	$template->topics = $topic->getByCategory($category);
	$template->title = 'Posts In "'.$topic->getCategory($category)->name.'"';
}

//Check For user Filter
if(isset($user_id)) {
	$template->topics = $topic->getByUser($user_id);
	$template->title = 'Posts By "'.$topic->getUser($user_id)->username.'"';
}


if(!isset($category) && !isset($user_id)){
	$template->topics = $topic->getAllTopics();
}

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();


//Diplay template 
echo $template;

?>
