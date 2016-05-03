<!DOCTYPE html>
<html>
<head>
	<title>Blog KomprenganMVC</title>
	<link rel="stylesheet" type="text/css" href="<?php echo "{$base_url}assets/css/bootstrap.css"; ?>">
</head>
<body>
	<div class="container">
<form method="POST" action="">
<hr>
<center>Tambah post</center>
<hr>
	<table class="table">
		<tr>
			<td>Judul</td>
			<td><input type="text" name="judul" placeholder="Judul"></td>
		</tr>
		<tr>
			<td>Post</td>
			<td><textarea name="post"></textarea></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td> <select name="kategory">
			<?php
				if ($kategory) {
					foreach ($kategory as $kategory) {
						$id = $kategory["id_kategory"];
						$nama_kategory = $kategory["kategory"];
						echo "<option value='{$id}'>{$nama_kategory}</option>";
					}
				}
			?>
			</select></td>
		</tr>
	</table>
	<input class="btn btn-primary" type="submit" value="Save" name="save_post">
	<a class="btn btn-warning" href="<?php echo $base_url ?>">Back</a>	
</form>
</div>
</body>
</html>
