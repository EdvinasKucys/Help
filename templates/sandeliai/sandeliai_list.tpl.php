<?php
	// suformuojame puslapių kelio (breadcrumb) elementų masyvą
	$breadcrumbItems = array(array('link' => 'index.php', 'title' => 'Pradžia'), array('title' => 'Sandėliai'));
	
	// puslapių kelio šabloną
	include 'templates/common/breadcrumb.tpl.php';
?>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Sandėlis nebuvo pašalintas. Pirmiausia pašalinkite to sandėlio prekes.
	</div>
<?php } ?>

<table class="table table-striped">
	<thead>
	<tr>
		<th>ID</th>
		<th>Pavadinimas</th>
        <th>Adresas</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['sandelio_id']}</td>"
					. "<td>{$val['pavadinimas']}</td>"
                    . "<td>{$val['adresas']}</td>"
					. "<td class='d-flex flex-row-reverse gap-2'>"
						. "<a href='index.php?module={$module}&action=look&id={$val['sandelio_id']}'class='btn btn-primary btn-sm'>peržiūrėti</a>"
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