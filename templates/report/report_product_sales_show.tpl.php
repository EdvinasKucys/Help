<ul id="reportInfo">
	<li class="title">Prekių pardavimų ataskaita</li>
	<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
	<li>Kainos filtras:
		<span>
			<?php
			if (!empty($data['kainaNuo'])) {
				if (!empty($data['kainaIki'])) {
					echo "Nuo {$data['kainaNuo']} € iki {$data['kainaIki']} €";
				} else {
					echo "Nuo {$data['kainaNuo']} €";
				}
			} else {
				if (!empty($data['kainaIki'])) {
					echo "Iki {$data['kainaIki']} €";
				} else {
					echo "Visos kainos";
				}
			}
			?>
		</span>
	</li>
	<li>Kategorija:
		<span>
			<?php
			if (!empty($data['fk_KATEGORIJAid_KATEGORIJA']) && $data['fk_KATEGORIJAid_KATEGORIJA'] != '-1') {
				foreach ($categoryObj->getCategoryList() as $kategorija) {
					if ($kategorija['id_KATEGORIJA'] == $data['fk_KATEGORIJAid_KATEGORIJA']) {
						echo $kategorija['pavadinimas'];
						break;
					}
				}
			} else {
				echo "Visos kategorijos";
			}
			?>
		</span>
	</li>
	<li>Gamintojas:
		<span>
			<?php
			if (!empty($data['fk_GAMINTOJASgamintojo_id']) && $data['fk_GAMINTOJASgamintojo_id'] != '-1') {
				foreach ($manufacturerObj->getManufacturerList() as $gamintojas) {
					if ($gamintojas['gamintojo_id'] == $data['fk_GAMINTOJASgamintojo_id']) {
						echo $gamintojas['pavadinimas'];
						break;
					}
				}
			} else {
				echo "Visi gamintojai";
			}
			?>
		</span>
	</li>
</ul>
<?php
if (sizeof($reportData) > 0) { ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Kategorija</th>
				<th>Vieneto kaina</th>
				<th>Vieneto svoris</th>
				<th>Sandelis</th>
				<th>Kiekis sandelyje</th>
			</tr>
		</thead>

		<tbody>
			<?php
			// suformuojame lentelę
			for($i = 0; $i < sizeof($reportData); $i++) {
						
				if($i == 0 || $reportData[$i]['id'] != $reportData[$i-1]['id']) {
					echo
						"<tr class='table-primary'>"
							. "<td colspan='5'>{$reportData[$i]['gamintojas']} {$reportData[$i]['pavadinimas']}</td>"
						. "</tr>";
				}
			
				
				echo
					"<tr>"
						. "<td>{$reportData[$i]['kategorija']}</td>"
						. "<td>{$reportData[$i]['kaina']} &euro;</td>"
						. "<td>{$reportData[$i]['svoris']} g</td>"
						. "<td>{$reportData[$i]['sandelis']}</td>"
						. "<td>{$reportData[$i]['kiekis']}</td>"
					. "</tr>";
				if($i == (sizeof($reportData) - 1) || $reportData[$i]['id'] != $reportData[$i+1]['id']) {
					if($reportData[$i]['bendra_prekes_kaina'] == 0) {
						$reportData[$i]['bendra_prekes_kaina'] = "nėra";
					} else {
						$reportData[$i]['bendra_prekes_kaina'] .= " &euro;";
					}
					if($reportData[$i]['bendras_prekes_svoris'] == 0) {
						$reportData[$i]['bendras_prekes_svoris'] = "nėra";
					} else {
						$reportData[$i]['bendras_prekes_svoris'] .= " g";
					}
					
					echo 
						"<tr>"
							. "<td colspan='1'></td>"
							. "<td>{$reportData[$i]['bendra_prekes_kaina']}</td>"
							. "<td>{$reportData[$i]['bendras_prekes_svoris']}</td>"
							. "<td colspan='1'></td>"
							. "<td>{$reportData[$i]['bendras_kiekis']}</td>"
						. "</tr>";
				}
			}
			?>

			<tr class="table-dark">
				<td colspan='9'>Bendra statistika</td>
			</tr>
			

			<tr class="table-secondary">
				<thead>
				<tr>
					<th>Skirtingų prekių kiekis</th>
					<th>Vidutinė prekės kaina</th>
					<th>Kategorijų kiekis</th>
					<th>Sandelių kiekis</th>
					<th>Visų prekių kiekis</th>
					<th>Vidutinis prekės svoris</th>
				</tr>
			</thead>
				<td><strong><?php echo $statsData[0]['prekiu_kiekis']; ?> prekės</strong></td>
				<td><strong><?php echo $statsData[0]['vidutine_kaina']; ?> €</strong></td>
				<td><strong><?php echo $statsData[0]['viso_kategoriju']; ?> kategorijos</strong></td>
				<td><strong><?php echo $statsData[0]['viso_sandeliu']; ?> sandeliai</strong></td>
				<td><strong><?php echo $statsData[0]['sandeliuojamas_kiekis']; ?> vnt.</strong></td>
				<td><strong><?php echo $statsData[0]['vidutinis_svoris']; ?> g</strong></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<a href="index.php?module=report&action=product_sales" title="Nauja ataskaita" class="btn btn-dark mb-3">Nauja ataskaita</a>
<?php
} else {
?>
	<div class="alert alert-warning" role="alert">
		Pagal nurodytus filtrus nerasta jokių prekių.
	</div>
	<a href="index.php?module=report&action=product_sales" title="Nauja ataskaita" class="btn btn-dark mb-3">Bandyti kitą filtrą</a>
<?php
}
?>