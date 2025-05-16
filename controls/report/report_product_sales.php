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
		$query = "SELECT 
    `preke`.`id`, 
    `preke`.`pavadinimas`, 
    `preke`.`kaina`, 
    `preke`.`svoris`, 
    `kategorija`.`pavadinimas` AS `kategorija`, 
    `gamintojas`.`pavadinimas` AS `gamintojas`, 
    `sandelis`.`pavadinimas` AS `sandelis`, 
    `sandeliuojama_preke`.`kiekis` AS `kiekis`, 
    (
        SELECT IFNULL(SUM(`kiekis`), 0)
        FROM `sandeliuojama_preke` 
        WHERE `fk_PREKEid` = `preke`.`id`
    ) AS `bendras_kiekis`, 
    `p`.`bendras_prekes_svoris`, 
    `k`.`bendra_prekes_kaina` 
FROM 
    `preke` 
LEFT JOIN 
    `kategorija` ON `preke`.`fk_KATEGORIJAid_KATEGORIJA` = `kategorija`.`id_KATEGORIJA` 
LEFT JOIN 
    `gamintojas` ON `preke`.`fk_GAMINTOJASgamintojo_id` = `gamintojas`.`gamintojo_id` 
LEFT JOIN 
    `sandeliuojama_preke` ON `preke`.`id` = `sandeliuojama_preke`.`fk_PREKEid` 
LEFT JOIN 
    `sandelis` ON `sandeliuojama_preke`.`fk_SANDELISSandelio_id` = `sandelis`.`Sandelio_id`
LEFT JOIN 
    (
        SELECT 
            `preke`.`id`, 
            Round(IFNULL(SUM(`sandeliuojama_preke`.`kiekis`), 0) * `preke`.`kaina`,2) AS `bendra_prekes_kaina` 
        FROM 
            `preke` 
        INNER JOIN 
            `sandeliuojama_preke` ON `preke`.`id` = `sandeliuojama_preke`.`fk_PREKEid` 
										{$whereClauseStr}
        GROUP BY 
            `preke`.`id`
    ) `k` ON `k`.`id` = `preke`.`id` 

LEFT JOIN 
    (
        SELECT 
            `preke`.`id`, 
            ROUND(IFNULL(SUM(`sandeliuojama_preke`.`kiekis` * `preke`.`svoris`), 0), 2) AS `bendras_prekes_svoris` 
        FROM 
            `preke` 
        INNER JOIN 
            `sandeliuojama_preke` ON `preke`.`id` = `sandeliuojama_preke`.`fk_PREKEid` 
									{$whereClauseStr}
        GROUP BY 
            `preke`.`id`
    ) `p` ON `p`.`id` = `preke`.`id` 
							{$whereClauseStr}
GROUP BY 
    `preke`.`id`, `sandelis`.`pavadinimas` 
ORDER BY 
    `preke`.`pavadinimas` ASC;";

		$reportData = mysql::select($query);

		// Bendra statistika - antra užklausa
		$statQuery = "SELECT 
                        COUNT(DISTINCT `preke`.`id`) AS `prekiu_kiekis`,
                        ROUND(AVG(`preke`.`kaina`), 2) AS `vidutine_kaina`,
						ABS(ROUND(AVG(`preke`.`svoris`), 2)) AS `vidutinis_svoris`,
                        IFNULL(SUM(`sandeliuojama_preke`.`kiekis`), 0) AS `sandeliuojamas_kiekis`,
                        COUNT(DISTINCT `kategorija`.`id_KATEGORIJA`) AS `viso_kategoriju`,
						COUNT(DISTINCT `sandelis`.`Sandelio_id`) AS `viso_sandeliu`
                    FROM 
                        `preke`
                    LEFT JOIN 
                        `kategorija` ON `preke`.`fk_KATEGORIJAid_KATEGORIJA` = `kategorija`.`id_KATEGORIJA`
                    LEFT JOIN 
					    `sandeliuojama_preke` ON `preke`.`id` = `sandeliuojama_preke`.`fk_PREKEid` 
					LEFT JOIN 
						`gamintojas` ON `preke`.`fk_GAMINTOJASgamintojo_id` = `gamintojas`.`gamintojo_id` 
					LEFT JOIN 
						`sandelis` ON `sandeliuojama_preke`.`fk_SANDELISSandelio_id` = `sandelis`.`Sandelio_id`


                    {$whereClauseStr}";

		$statsData = mysql::select($statQuery);

		// perduodame datos filtro reikšmes į šabloną
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
