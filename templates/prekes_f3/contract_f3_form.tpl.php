<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Prekės</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($id)) echo "Prekės redagavimas"; else echo "Nauja prekė"; ?></li>
	</ol>
</nav>

<?php if($formErrors != null) { ?>
	<div class="alert alert-danger" role="alert">
		Neįvesti arba neteisingai įvesti šie laukai:
		<?php 
			echo $formErrors;
		?>
	</div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
	
	<h4 class="mt-3">Prekės informacija</h4>

	<div class="form-group">
		<label for="pavadinimas">Prekės pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="pavadinimas" name="pavadinimas" class="form-control" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>">
	</div>
	
	<div class="form-group">
		<label for="kaina">Prekės kaina<?php echo in_array('kaina', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="kaina" name="kaina" class="form-control" value="<?php echo isset($data['kaina']) ? $data['kaina'] : ''; ?>">
	</div>

	<div class="form-group">
		<label for="svoris">Prekės svoris<?php echo in_array('svoris', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="svoris" name="svoris" class="form-control" value="<?php echo isset($data['svoris']) ? $data['svoris'] : ''; ?>">
	</div>

    <div class="form-group">
		<label for="aprasymas">Prekės aprašymas<?php echo in_array('aprasymas', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="aprasymas" name="aprasymas" class="form-control" value="<?php echo isset($data['aprasymas']) ? $data['aprasymas'] : ''; ?>">
	</div>

    <div class="form-group">
		<label for="medziaga">Prekės medžiaga<?php echo in_array('medziaga', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="medziaga" name="medziaga" class="form-control" value="<?php echo isset($data['medziaga']) ? $data['medziaga'] : ''; ?>">
	</div>

    <div class="form-group">
		<label for="fk_GAMINTOJASgamintojo_id">Prekės gamintojas<?php echo in_array('fk_GAMINTOJASgamintojo_id', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_GAMINTOJASgamintojo_id" name="fk_GAMINTOJASgamintojo_id" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame gamintojus
				$gamintojai = $gamintojaiObj->getManufacturerList();
				foreach($gamintojai as $key => $val) {
					$selected = "";
					if(isset($data['fk_GAMINTOJASgamintojo_id']) && $data['fk_GAMINTOJASgamintojo_id'] == $val['gamintojo_id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['gamintojo_id']}'>{$val['gamintojo_id']} - {$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label for="fk_KATEGORIJAid_KATEGORIJA">Prekės kategorija<?php echo in_array('fk_KATEGORIJAid_KATEGORIJA', $required) ? '<span> *</span>' : ''; ?></label>
		<select id="fk_KATEGORIJAid_KATEGORIJA" name="fk_KATEGORIJAid_KATEGORIJA" class="form-select form-control">
			<option value="">---------------</option>
			<?php
				// išrenkame kategorijas
				$kategorijos = $categoryObj->getCategoryList();
				foreach($kategorijos as $key => $val) {
					$selected = "";
					if(isset($data['fk_KATEGORIJAid_KATEGORIJA']) && $data['fk_KATEGORIJAid_KATEGORIJA'] == $val['id_KATEGORIJA']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id_KATEGORIJA']}'>{$val['id_KATEGORIJA']} - {$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>

	<?php if(isset($data['id'])) { ?>
		<h4 class="mt-3">Sandėliuojamos prekės</h4>		
	
		<div class="d-flex flex-row-reverse gap-3">
			<a href='index.php?module=<?php echo $module; ?>&action=warehouse_create&productId=<?php echo $id; ?>'>Pridėti į sandėlį</a>
		</div>
	
		<?php if(!empty($data['sandeliuojama_preke']) && sizeof($data['sandeliuojama_preke']) > 0) { ?>
			<table class="table">
				<tr>
					<th>Sandėlis</th>
					<th>Kiekis</th>
					<th></th>
				</tr>
				<?php
					// suformuojame lentelę
					foreach($data['sandeliuojama_preke'] as $key => $warehouseProduct) {
						echo
							"<tr>"
								. "<td>{$warehouseProduct['sandelio_pavadinimas']}</td>"
								. "<td>{$warehouseProduct['kiekis']}</td>"
								. "<td class='d-flex flex-row-reverse gap-2'>"
								. "<a href='index.php?module={$module}&action=warehouse_edit&productId={$data['id']}&warehouseId={$warehouseProduct['fk_SANDELISsandelio_id']}'>redaguoti</a>"
								. "<a href='#' onclick='showWarehouseProductConfirmDialog(\"{$module}\", \"{$data['id']}\", \"{$warehouseProduct['fk_SANDELISsandelio_id']}\"); return false;'>šalinti</a>"
								. "</td>"
							. "</tr>";
					}
				?>
			</table>
		<?php } ?>
	<?php } ?>

	<?php if(isset($data['id'])) { ?>
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
	<?php } ?>

	<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>

	<input type="submit" class="btn btn-dark w-25" name="submit" value="Išsaugoti">
</form>