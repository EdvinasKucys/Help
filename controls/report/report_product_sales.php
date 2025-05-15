<?php

// sukuriame užklausų klasės objektą
$prekesObj = new Product();
$categoryObj = new Category();
$manufacturerObj = new Manufacturer();

$formErrors = null;
$fields = array();
$formSubmitted = false;

$data = array();
if (empty($_POST['submit'])) {
	// rodome ataskaitos parametrų įvedimo formą
	include "templates/{$module}/report_product_sales_form.tpl.php";
} else {
	$formSubmitted = true;

	// nustatome laukų validatorių tipus
	$validations = array(
		'dataNuo' => 'date',
		'dataIki' => 'date',
		'kainaNuo' => 'float',
		'kainaIki' => 'float',
		'fk_KATEGORIJAid_KATEGORIJA' => 'int',
		'fk_GAMINTOJASgamintojo_id' => 'int'
	);

	// sukuriame validatoriaus objektą
	$validator = new validator($validations);

	if ($validator->validate($_POST)) {
		// Suformuojame WHERE sąlygą pagal filtrus
		$whereClause = array();

		if (!empty($_POST['dataNuo'])) {
			$dataNuo = mysql::escapeFieldForSQL($_POST['dataNuo']);
			$whereClause[] = "`uzsakymas`.`data` >= '{$dataNuo}'";
		}

		if (!empty($_POST['dataIki'])) {
			$dataIki = mysql::escapeFieldForSQL($_POST['dataIki']);
			$whereClause[] = "`uzsakymas`.`data` <= '{$dataIki}'";
		}

		if (!empty($_POST['kainaNuo'])) {
			$kainaNuo = mysql::escapeFieldForSQL($_POST['kainaNuo']);
			$whereClause[] = "`preke`.`kaina` >= {$kainaNuo}";
		}

		if (!empty($_POST['kainaIki'])) {
			$kainaIki = mysql::escapeFieldForSQL($_POST['kainaIki']);
			$whereClause[] = "`preke`.`kaina` <= {$kainaIki}";
		}

		if (!empty($_POST['fk_KATEGORIJAid_KATEGORIJA']) && $_POST['fk_KATEGORIJAid_KATEGORIJA'] != '-1') {
			$categorija = mysql::escapeFieldForSQL($_POST['fk_KATEGORIJAid_KATEGORIJA']);
			$whereClause[] = "`preke`.`fk_KATEGORIJAid_KATEGORIJA` = {$categorija}";
		}

		if (!empty($_POST['fk_GAMINTOJASgamintojo_id']) && $_POST['fk_GAMINTOJASgamintojo_id'] != '-1') {
			$gamintojas = mysql::escapeFieldForSQL($_POST['fk_GAMINTOJASgamintojo_id']);
			$whereClause[] = "`preke`.`fk_GAMINTOJASgamintojo_id` = {$gamintojas}";
		}

		$whereClauseStr = "";
		if (count($whereClause) > 0) {
			$whereClauseStr = "WHERE " . implode(" AND ", $whereClause);
		}

		// Pagrindinė ataskaitos užklausa
		$query = "	SELECT  `preke`.`id` as `id`,
	`preke`.`pavadinimas` as `pavadinimas`,
	`preke`.`kaina` as `kaina`,
	`preke`.`svoris` as `svoris`,
	`kategorija`.`pavadinimas` as `kategorija`,
	`gamintojas`.`pavadinimas` as `gamintojas`,
	`sandelis`.`pavadinimas` as `sandelis`,
	`sandeliuojama_preke`.`kiekis` as `kiekis`,
     SUM(`sandeliuojama_preke`.`kiekis`) OVER (PARTITION BY `preke`.`id`) as `bendras_kiekis`
                FROM 
                    `preke`
                LEFT JOIN 
                    `kategorija` ON `preke`.`fk_KATEGORIJAid_KATEGORIJA` = `kategorija`.`id_KATEGORIJA`
                LEFT JOIN 
                    `gamintojas` ON `preke`.`fk_GAMINTOJASgamintojo_id` = `gamintojas`.`gamintojo_id`
                LEFT JOIN 
                    `sandeliuojama_preke` ON `preke`.`id` = `sandeliuojama_preke`.`fk_PREKEid`
                LEFT JOIN 
                    `sandelis` ON `sandeliuojama_preke`.`fk_SANDELISSandelio_id` = `sandelis`.`Sandelio_id`;
                
	";

		$reportData = mysql::select($query);

		// Bendra statistika - antra užklausa
		$statQuery = "SELECT 
                        COUNT(DISTINCT `preke`.`id`) AS `viso_prekiu`,
                        ROUND(AVG(`preke`.`kaina`), 2) AS `vidutine_kaina_viso`,
                        SUM(`uzsakymo_preke`.`kiekis`) AS `viso_parduota_vienetu`,
                        IFNULL(SUM(`uzsakymo_preke`.`kiekis` * `uzsakymo_preke`.`kaina`), 0) AS `viso_pardavimu_suma`,
                        COUNT(DISTINCT `kategorija`.`id_KATEGORIJA`) AS `viso_kategoriju`
                    FROM 
                        `preke`
                    LEFT JOIN 
                        `kategorija` ON `preke`.`fk_KATEGORIJAid_KATEGORIJA` = `kategorija`.`id_KATEGORIJA`
                    LEFT JOIN 
                        `uzsakymo_preke` ON `preke`.`id` = `uzsakymo_preke`.`fk_PREKEid`
                    LEFT JOIN 
                        `uzsakymas` ON `uzsakymo_preke`.`fk_UZSAKYMASnr` = `uzsakymas`.`nr`
                    {$whereClauseStr}";

		$statsData = mysql::select($statQuery);

		// perduodame datos filtro reikšmes į šabloną
		$data['dataNuo'] = isset($_POST['dataNuo']) ? $_POST['dataNuo'] : '';
		$data['dataIki'] = isset($_POST['dataIki']) ? $_POST['dataIki'] : '';
		$data['kainaNuo'] = isset($_POST['kainaNuo']) ? $_POST['kainaNuo'] : '';
		$data['kainaIki'] = isset($_POST['kainaIki']) ? $_POST['kainaIki'] : '';
		$data['fk_KATEGORIJAid_KATEGORIJA'] = isset($_POST['fk_KATEGORIJAid_KATEGORIJA']) ? $_POST['fk_KATEGORIJAid_KATEGORIJA'] : '';
		$data['fk_GAMINTOJASgamintojo_id'] = isset($_POST['fk_GAMINTOJASgamintojo_id']) ? $_POST['fk_GAMINTOJASgamintojo_id'] : '';

		// rodome ataskaitą
		include "templates/{$module}/report_product_sales_show.tpl.php";
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$fields = $_POST;

		// rodome ataskaitos parametrų įvedimo formą su klaidomis
		include "templates/{$module}/report_product_sales_form.tpl.php";
	}
}
