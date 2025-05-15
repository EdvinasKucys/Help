<ul id="reportInfo">
	<li class="title">Prekių pardavimų ataskaita</li>
	<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
	<li>Laikotarpis:
		<span>
			<?php
			if (!empty($data['dataNuo'])) {
				if (!empty($data['dataIki'])) {
					echo "Užsakymai nuo {$data['dataNuo']} iki {$data['dataIki']}";
				} else {
					echo "Užsakymai nuo {$data['dataNuo']}";
				}
			} else {
				if (!empty($data['dataIki'])) {
					echo "Užsakymai iki {$data['dataIki']}";
				} else {
					echo "Visi užsakymai";
				}
			}
			?>
		</span>
	</li>
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
				<th>Prekės id</th>
				<th>Prekė</th>
				<th>Vieneto kaina</th>
				<th>Vieneto svoris</th>
				<th>Kategorija</th>
				<th>Gamintojas</th>
				<th>Sandelis</th>
				<th>Kiekis sandelyje</th>
				<th>Bendras kiekis</th>
			</tr>
		</thead>

		<tbody>
			<?php
			// suformuojame lentelę
			foreach ($reportData as $key => $val) {
				echo
				"<tr>"
					. "<td>{$val['id']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['kaina']} €</td>"
					. "<td>{$val['svoris']} g</td>"
					. "<td>{$val['kategorija']}</td>"
					. "<td>{$val['gamintojas']}</td>"
					. "<td>{$val['sandelis']}</td>"
					. "<td>{$val['kiekis']}</td>"
					. "<td>{$val['bendras_kiekis']}</td>"
					. "</tr>";
			}
			?>

			<tr class="table-dark">
				<td colspan='9'>Bendra statistika</td>
			</tr>

			<tr class="table-secondary">
				<td colspan="2"><strong>Viso statistika:</strong></td>
				<td><strong><?php echo $statsData[0]['viso_prekiu']; ?> prekių</strong></td>
				<td><strong><?php echo $statsData[0]['vidutine_kaina_viso']; ?> €</strong></td>
				<td colspan="2"><strong><?php echo $statsData[0]['viso_kategoriju']; ?> kategorijų</strong></td>
				<td><strong><?php echo $statsData[0]['viso_parduota_vienetu']; ?> vnt.</strong></td>
				<td><strong><?php echo $statsData[0]['viso_pardavimu_suma']; ?> €</strong></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<a href="index.php?module=report&action=product_sales" title="Nauja ataskaita" class="btn btn-primary mb-3">Nauja ataskaita</a>
<?php
} else {
?>
	<div class="alert alert-warning" role="alert">
		Pagal nurodytus filtrus nerasta jokių prekių.
	</div>
	<a href="index.php?module=report&action=product_sales" title="Nauja ataskaita" class="btn btn-primary mb-3">Bandyti kitą filtrą</a>
<?php
}
?>