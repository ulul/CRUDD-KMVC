<!DOCTYPE html>
<html>
<head>
	<title>Blog KomprenganMVC</title>
	<link rel="stylesheet" type="text/css" href="<?php echo "{$base_url}assets/css/bootstrap.css"; ?>">
	</head>
<body>
	<div class="container">
		<?php 
			if ($post){
		?>
			<table class="table">
				<thead>
					<th>No</th>
					<th>Judul</th>
					<th>Post</th>
					<th>Kategory</th>
					<th colspan="3">Aksi</th>
				</thead>
				
				<?php
				$no = 1;
				foreach ($post as $key) {
					$id = $key["id"];
					?>
					<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $key['judul'];?></td>
					<td><?php echo $key['post'];?></td>
					<td><?php echo $key['kategory'];?></td>
					<td><a class='btn btn-danger' href='<?php echo $base_url."crudd/hapus/{$id}"; ?>'>Hapus</a></td>
					<td><a class='btn btn-warning' href='<?php echo $base_url."crudd/update/{$id}"; ?>'>Update</a></td>
					<td><a class="btn btn-success" onclick="show_detail(<?php echo $id ?>)">Detail</a></td>
					</tr>
					<?php
					$no++;}
				?>
				
			</table>
			<hr>
			<a class="btn btn-primary" href='<?php echo $base_url; ?>crudd/add_post.html'>Tambah Post</a>
		
		<?php
		}else{
			echo "Post masih kosong <a class='btn btn-primary' href='{$base_url}crudd/add_post.html'>Tambah Post</a>";
		}
		?>
	</div>
	<div id="papan_modal">
	</div>
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function show_detail(id) {
		$.ajax({
			url:"<?php echo $base_url.'crudd/detail/' ?>"+id,
			success:function(data){
				$("#papan_modal").html(data).show();
				$("#modalDetail").modal("show");
			}
		})
	}
	</script>
</body>
	
</html>
