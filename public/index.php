<?php
require __DIR__.'/../vendor/autoload.php';

use App\Deck;
use App\Hosted;

$theme = isset($_REQUEST['theme']) ? $_REQUEST['theme'] : "league";

ob_start();
include '../views/intro.php';
$sections = ob_get_clean();

if (isset($_POST['slides'])) {
	if (preg_match('/^http/', $_POST['slides']) == 1) {
		$url = explode("\n", $_POST['slides'])[0];
		header("Location: ?src=$url&theme=$theme", true, 302);
    	exit();
	} else {
		$sections = Deck::slides(htmlspecialchars($_POST['slides']));
	}
}

// if (isset($_GET['raw'])) {
// 	$sections = Hosted::fetch($_GET['raw']);
// }

if (isset($_GET['src'])) {
	$source = htmlspecialchars(Hosted::fetch($_GET['src']));
	$sections = Deck::slides($source, $_GET['src']);
}

include '../views/layout.php';
