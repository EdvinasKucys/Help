<?php
	// suformuojame puslapių kelio (breadcrumb) elementų masyvą
	$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Pradžia'), array('title' => 'Gamintojai'));
	
	// puslapių kelio šabloną
	include 'templates/common/breadcrumb.tpl.php';
?>

<div class="d-flex flex-row-reverse gap-3">
	<a class='btn btn-dark btn-sm' href='index.php?module=<?php echo $module; ?>&action=create'>Naujas gamintojas</a>
</div>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Gamintojas nebuvo pašalintas. Pirmiausia pašalinkite to gamintojo prekes.
	</div>
<?php } ?>

<table class="table table-striped">
	<thead>
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
        <th>Šalis</th>
        <th>Kontaktai</th>
		<th></th>
		
	</tr>
	</thead>
		<tbody>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['gamintojo_id']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
                    . "<td>{$val['salis']}</td>"
                    . "<td>{$val['kontaktai']}</td>"
					. "<td class='d-flex flex-row-reverse gap-2'>"
						. "<a href='index.php?module={$module}&action=edit&id={$val['gamintojo_id']}'class='btn btn-primary btn-sm'>redaguoti</a>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['gamintojo_id']}\"); return false;'class='btn btn-danger btn-sm'>šalinti</a>&nbsp;"
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