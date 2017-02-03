<?php 

switch ($_GET['action']) {
	case 'contact':
		include_once '../models/ContactForm.php';
		include_once 'ContactController.php'; 

		$contactController = new ContactController();
		$contactController->sendContact();
		break;
	
	default:
		die("Ação não encontrada");
		break;
}

?>
