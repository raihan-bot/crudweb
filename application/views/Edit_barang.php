<!-- File: application/views/admin/edit_barang.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Barang</title>
    <!-- Tambahkan link ke CSS atau library lain jika diperlukan -->
</head>

<body>
    <h2>Edit Data Barang</h2>

    <form action="<?php echo site_url('admineditcontroller/updatedata'); ?>" method="post">
        <!-- Gantilah bagian ini sesuai dengan struktur tabel dan nama field di database -->
        <input type="hidden" name="idbarang" value="<?php echo $barang['idbarang']; ?>">
        Nama Barang: <input type="text" name="namabarang" value="<?php echo $barang['namabarang']; ?>"><br>
        Kategori: <input type="text" name="kategori" value="<?php echo $barang['kategori']; ?>"><br>
        Deskripsi: <textarea name="deskripsi"><?php echo $barang['deskripsi']; ?></textarea><br>
        Stock: <input type="number" name="stock" value="<?php echo $barang['stock']; ?>"><br>

        <input type="submit" value="Update">
    </form>
</body>

</html>
