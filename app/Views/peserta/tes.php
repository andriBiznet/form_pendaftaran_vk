<html>

	<head>
		<title>Query Builder Class in CodeIgniter 4</title>
	</head>
	
	<body>
	
		<h3>Product List</h3>
		<table border="1" cellpadding="2" cellspacing="2">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Price</th>
			</tr>
			<?php foreach ($peserta as $product) { ?>
				<tr>
					<td><?= $product->id_pendaftaran ?></td>
					<td><?= $product->nik ?></td>
				</tr>
			<?php } ?>
		</table>
	
	</body>
	
</html>