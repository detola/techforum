<?php require('core/init.php'); ?>
<?php 
//Create Topic Object
$topic = new Topic;

$template = new Template('template/frontpage.php'); 

//Assign Vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $topic->getTotalUsers();


//Diplay template 
echo $template;

?> 
