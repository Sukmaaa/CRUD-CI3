<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: center;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
	</style>
</head>
<body>

<div id="container">
    <h1>Tambah Barang Baru</h1>
    <form style="padding: 30px" action="<?php echo base_url('crud/create'); ?>" method="post">
        <label for="kodeBarang">Kode Barang :</label>
        <input type="text" name="kodeBarang" required><br>
        
        <label for="namaBarang">Nama Barang :</label>
        <input type="text" name="namaBarang" ><br>

        <label for="harga">Harga :</label>
        <input type="text" name="harga" ><br>

        <label for="jumlah">Jumlah :</label>
        <input type="text" name="jumlah" ><br>
        
        <!-- Tambahkan field lain sesuai kebutuhan -->
        
        <button style="margin-top: 20px" type="submit">Tambah Barang</button>
    </form>

	<table style="width:100%">
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Aksi</th>
		</tr>
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?php echo $record['kodeBarang']; ?></td>
                <td><?php echo $record['namaBarang']; ?></td>
                <td><?php echo $record['harga']; ?></td>
                <td><?php echo $record['jumlah']; ?></td>
                <td>
                    <a href="<?php echo base_url('crud/edit/'.$record['kodeBarang']); ?>">Edit |</a>
                    <a href="#" onclick="confirmDelete('<?php echo base_url('crud/delete/'.$record['kodeBarang']); ?>')">Hapus</a>
                </td>
		</tr>
        <?php endforeach; ?>
		
	</table>
</div>

<script>
  function confirmDelete(url) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = url;
    }
  }
</script>

</body>
</html>
