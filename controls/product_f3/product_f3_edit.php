<?php
	
// sukuriame užklausų klasių objektus
$prekesObj = new Product();
$sandeliaiObj = new Warehouse();
$gamintojaiObj = new Manufacturer();
$categoryObj = new Category();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('pavadinimas', 'kaina', 'svoris', 'fk_GAMINTOJASgamintojo_id', 'fk_KATEGORIJAid_KATEGORIJA');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'pavadinimas' => 200,
	'aprasymas'=> 255,
	'medziaga'=> 100,
);

// paspaustas išsaugojimo mygtukas
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
		'pavadinimas' => 'anything',
		'kaina' => 'float',
		'svoris' => 'float',
		'medziaga'=> 'anything',
		'aprasymas'=> 'anything',
		'fk_GAMINTOJASgamintojo_id'=> 'anything',
		'fk_KATEGORIJAid_KATEGORIJA'=> 'int',
    );
		
	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// atnaujiname prekę
		$prekesObj->updateProduct($_POST);

		// nukreipiame vartotoją į prekių puslapį
		common::redirect("index.php?module={$module}&action=list");
		die();
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
		$data['sandeliuojama_preke'] = $prekesObj->getWarehousedProducts($id);
	}
} else {
	//  išrenkame elemento duomenis ir jais užpildome formos laukus.
	$data = $prekesObj->getProduct($id);
	$data['sandeliuojama_preke'] = $prekesObj->getWarehousedProducts($id);
}

// Get the categories for dropdown
$kategorijos = $categoryObj->getCategoriesForSelect();

// nustatome požymį, kad įrašas redaguojamas norint išjungti ID redagavimą šablone
$data['editing'] = 1;

// įtraukiame šabloną
include "templates/{$module}/{$module}_form.tpl.php";

?>