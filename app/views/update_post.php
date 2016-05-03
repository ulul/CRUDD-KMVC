
<?php if($post) ?>
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
<center>Update post</center>
<hr>
	<table class="table">
		<tr>
			<td>Judul</td>
			<td><input type="text" name="judul" placeholder="Judul" value="<?php echo $post["judul"] ?>"></td>
		</tr>
		<tr>
			<td>Post</td>
			<td><textarea name="post"><?php echo $post["post"] ?></textarea></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td> <select name="kategory">
			<?php
				if ($kategory) {
					foreach ($kategory as $kategory) {
						$id = $kategory["id_kategory"];
						$nama_kategory = $kategory["kategory"];
						if ($id == $post["id_kategory"]) {
							$selected = "selected='selected'";
						}else{
							$selected = "";
						}
						echo "<option value='{$id}' {$selected}>{$nama_kategory}</option>";
					}
				}
			?>
			</select></td>
		</tr>
		
	</table>
	<input type="hidden" name="id" value="<?php echo $post["id"] ?>">
	<input class="btn btn-primary" type="submit" value="Save" name="update_post">
	<a class="btn btn-warning" href="<?php echo $base_url ?>">Back</a>	
</form>
</div>
</body>
</html>
