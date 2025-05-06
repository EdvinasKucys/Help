<?php
	// suformuojame puslapių kelio (breadcrumb) elementų masyvą
	$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Pradžia'), array('title' => 'Kategorijos'));
	
	// puslapių kelio šabloną
	include 'templates/common/breadcrumb.tpl.php';
?>

<div class="d-flex flex-row-reverse gap-3">
	<a class='btn btn-dark btn-sm' href='index.php?module=<?php echo $module; ?>&action=create'>Nauja kategorija</a>
</div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Kategorija nebuvo pašalinta. Pirmiausia pašalinkite šios kategorijos prekes.
	</div>
<?php } ?>

<table class="table table-striped">
	<thead>
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
        <th>Aprašymas</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['id_KATEGORIJA']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
                    . "<td>{$val['aprasymas']}</td>"
					. "<td class='d-flex flex-row-reverse gap-2'>"
						. "<a href='index.php?module={$module}&action=edit&id={$val['id_KATEGORIJA']}'class='btn btn-primary btn-sm'>redaguoti</a>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id_KATEGORIJA']}\"); return false;'class='btn btn-danger btn-sm'>šalinti</a>&nbsp;"
					. "</td>"
				. "</tr>";
		}
	?>
	</tbody>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/common/paging.tpl.php';
?>