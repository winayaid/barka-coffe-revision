<!DOCTYPE html>
<html>

<head>
    <title>Edit Pengguna</title>
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
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    img {
        max-width: 200px;
        height: auto;
        margin-top: 10px;
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
        <h1>Edit data pengguna</h1>
        <?php echo form_open_multipart('Main/updatePenggunaProcess'); ?>
        <input type="hidden" name="id_pengguna" value="<?= $detail_pengguna->id_pengguna ?>">
        <input type="hidden" name="foto_lama" value="<?= $detail_pengguna->foto ?>">
        <div>
            <label for="1">Nama</label>
            <input type="text" id="1" name="nama" value="<?= $detail_pengguna->nama ?>">
        </div>
        <div>
            <label for="1">Email</label>
            <input type="email" id="1" name="email" value="<?= $detail_pengguna->email ?>">
        </div>
        <!-- <div>
            <label for="3">Password</label>
            <input type="password" id="3" name="password">
        </div> -->
        <img src="<?= base_url() ?>/assets/images/user/<?= $detail_pengguna->foto ?>" alt="">
        <div>
            <label for="5">Foto</label>
            <input type="file" id="5" name="foto">
        </div>
        <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>