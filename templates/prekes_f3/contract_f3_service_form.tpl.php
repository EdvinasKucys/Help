<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Pradžia</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=list">Prekės</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="index.php?module=<?php echo $module; ?>&action=edit&id=<?php echo $productId; ?>">Prekės redagavimas</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(!empty($warehouseId)) echo "Sandėlio kiekio redagavimas"; else echo "Pridėti į sandėlį"; ?></li>
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
	
	<?php if(!isset($data['editing'])) { ?>
	<div class="form-group">
		<label for="sandelis">Sandėlis<?php echo in_array('sandelis', $required) ? '<span> *</span>' : ''; ?></label>
		<select class="elementSelector form-select form-control" name="sandelis">
			<option value="">---------------</option>
			<?php
				$allSandeliai = $sandeliaiObj->getWarehouseList();
				foreach($allSandeliai as $sandelis) {
					$selected = "";
					if(isset($data['fk_SANDELISsandelio_id']) && $data['fk_SANDELISsandelio_id'] == $sandelis['sandelio_id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$sandelis['sandelio_id']}'>{$sandelis['sandelio_id']} - {$sandelis['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>
	<?php } else { ?>
	<div class="form-group">
		<label for="sandelis">Sandėlis</label>
		<input type="text" id="sandelis" name="sandelis_name" class="form-control" readonly value="<?php echo isset($data['sandelio_pavadinimas']) ? $data['sandelio_pavadinimas'] : ''; ?>">
		<input type="hidden" name="sandelis" value="<?php echo isset($data['fk_SANDELISsandelio_id']) ? $data['fk_SANDELISsandelio_id'] : ''; ?>">
	</div>
	<?php } ?>

	<div class="form-group">
		<label for="kiekis">Kiekis<?php echo in_array('kiekis', $required) ? '<span> *</span>' : ''; ?></label>
		<input type="text" id="kiekis" name="kiekis" class="form-control" value="<?php echo isset($data['kiekis']) ? $data['kiekis'] : ''; ?>">
	</div>

	<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>

	<input type="submit" class="btn btn-primary w-25" name="submit" value="Išsaugoti">
</form>