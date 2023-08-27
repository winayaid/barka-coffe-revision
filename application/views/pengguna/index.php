<!DOCTYPE html>
<html>

<head>
    <title>Halaman Pengguna</title>
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

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: #fff;
    }

    td img {
        max-width: 100px;
        height: auto;
    }

    td a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }

    td a:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Halaman Pengguna</h1>
        <table border="1">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <?php foreach($pengguna as $row): ?>
            <tr>
                <td><img src="<?= base_url() ?>/assets/images/user/<?= $row->foto ?>" alt=""></td>
                <td><?= $row->nama ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->role ?></td>
                <td>
                    <a href="<?= base_url('main/updatePengguna/') ?><?= $row->id_pengguna ?>">Edit</a>
                    <a href="<?= base_url('main/deletePengguna/') ?><?= $row->id_pengguna ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>