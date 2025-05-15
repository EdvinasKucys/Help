<?php

// sukuriame užklausų klasės objektą
$prekesObj = new Product();

if(!empty($id)) {
	// pašaliname saugomas prekes
	$prekesObj->deleteWarehouseProduct($id);

	// šaliname prekę
	$prekesObj->deleteProduct($id);

	// nukreipiame į prekių puslapį
	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>