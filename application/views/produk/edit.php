<!DOCTYPE html>
<html>

<head>
    <title>Edit Produk</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 100px;
    }

    h1 {
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    input[type="file"] {
        margin-top: 10px;
    }

    button[type="submit"] {
        display: block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Produk</h1>
        <?php echo form_open_multipart('Main/updateProdukProcess'); ?>
        <input type="hidden" name="id_produk" value="<?= $detail_produk->id_produk ?>">
        <input type="hidden" name="foto_lama" value="<?= $detail_produk->foto_produk ?>">
        <div>
            <label for="nama">Nama Produk</label>
            <input type="text" id="nama" name="nama_produk" value="<?= $detail_produk->nama_produk ?>">
        </div>
        <div>
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori">
                <option value="arabica" <?= $detail_produk->kategori == 'arabica' ? 'selected' : '' ?>>
                    Arabica
                </option>
                <option value="robusta" <?= $detail_produk->kategori == 'robusta' ? 'selected' : '' ?>>
                    Robusta
                </option>
            </select>
        </div>
        <div>
            <label for="berat">Berat</label>
            <input type="number" id="berat" name="berat" value="<?= $detail_produk->berat ?>">
        </div>
        <div>
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" value="<?= $detail_produk->stok ?>">
        </div>
        <div>
            <label for="harga">Harga</label>
            <input type="text" id="harga" name="harga" value="<?= $detail_produk->harga ?>">
        </div>
        <img src="<?= base_url() ?>/assets/images/produk/<?= $detail_produk->foto_produk ?>" alt="">
        <div>
            <label for="foto_produk">Foto Produk</label>
            <input type="file" id="foto_produk" name="foto">
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $detail_produk->deskripsi ?></textarea>
        </div>
        <button type="submit">Simpan</button>
        </form>
        <a href="<?= base_url('main/produkAdmin') ?>">
            <span>Data Produk</span>
        </a>
    </div>
</body>

</html>