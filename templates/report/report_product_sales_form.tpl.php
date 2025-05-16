<?php
	// suformuojame puslapių kelio (breadcrumb) elementų masyvą
	$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Pradžia'), array('link' => "index.php?module=report&action=list", 'title' => "Ataskaitos"), array("title" => "Prekių pardavimų ataskaita"));
	
	// puslapių kelio šabloną
	include 'templates/common/breadcrumb.tpl.php';
?>

<?php if($formErrors != null) { ?>
	<div class="alert alert-danger" role="alert">
		Neįvesti arba neteisingai įvesti šie laukai:
		<?php 
			echo $formErrors;
		?>
	</div>
<?php } ?>

<form action="" method="post" class="d-grid gap-3">
	
	<h4>Kainos filtrai</h4>
	<div class="form-group">
		<label for="kainaNuo">Kaina nuo</label>
		<input type="text" id="kainaNuo" name="kainaNuo" class="form-control" value="<?php echo isset($data['kainaNuo']) ? $data['kainaNuo'] : ''; ?>">
	</div>
	
	<div class="form-group">
		<label for="kainaIki">Kaina iki</label>
		<input type="text" id="kainaIki" name="kainaIki" class="form-control" value="<?php echo isset($data['kainaIki']) ? $data['kainaIki'] : ''; ?>">
	</div>

	<h4>Kategorijos ir gamintojo filtrai</h4>
	<div class="form-group">
		<label for="fk_KATEGORIJAid_KATEGORIJA">Kategorija</label>
		<select id="fk_KATEGORIJAid_KATEGORIJA" name="fk_KATEGORIJAid_KATEGORIJA" class="form-select form-control">
			<option value="-1">Visos kategorijos</option>
			<?php
				// išrenkame kategorijas
				$kategorijos = $categoryObj->getCategoryList();
				foreach($kategorijos as $key => $val) {
					$selected = "";
					if(isset($data['fk_KATEGORIJAid_KATEGORIJA']) && $data['fk_KATEGORIJAid_KATEGORIJA'] == $val['id_KATEGORIJA']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['id_KATEGORIJA']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label for="fk_GAMINTOJASgamintojo_id">Gamintojas</label>
		<select id="fk_GAMINTOJASgamintojo_id" name="fk_GAMINTOJASgamintojo_id" class="form-select form-control">
			<option value="-1">Visi gamintojai</option>
			<?php
				// išrenkame gamintojus
				$gamintojai = $manufacturerObj->getManufacturerList();
				foreach($gamintojai as $key => $val) {
					$selected = "";
					if(isset($data['fk_GAMINTOJASgamintojo_id']) && $data['fk_GAMINTOJASgamintojo_id'] == $val['gamintojo_id']) {
						$selected = " selected='selected'";
					}
					echo "<option{$selected} value='{$val['gamintojo_id']}'>{$val['pavadinimas']}</option>";
				}
			?>
		</select>
	</div>

	<input type="submit" class="btn btn-dark w-25" name="submit" value="Sudaryti ataskaitą">
</form>