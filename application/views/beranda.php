<!DOCTYPE html>
<html>

<head>
    <title>Beranda</title>
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

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin-bottom: 10px;
    }

    li a {
        display: block;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    li a:hover {
        background-color: #45a049;
    }

    .logout {
        text-align: right;
        margin-bottom: 20px;
    }

    .logout a {
        color: #4CAF50;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Beranda</h1>
        <div class="logout">
            <a href="<?= base_url('main/logout') ?>">Logout</a>
        </div>
        <ul>
            <li>
                <a href="<?= base_url('main/pengguna') ?>">Pengguna</a>
            </li>
        </ul>
    </div>
</body>

</html>