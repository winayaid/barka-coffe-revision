<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
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
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 10px;
        text-decoration: none;
    }

    a span {
        color: #4CAF50;
    }

    p.error-message {
        color: red;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if ($this->session->flashdata('message') == 'tak terdaftar') : ?>
        <p class="error-message">Anda belum terdaftar</p>
        <?php elseif ($this->session->flashdata('message') == 'password salah') : ?>
        <p class="error-message">Password salah</p>
        <?php endif; ?>
        <?php echo form_open_multipart('Main/loginProcess'); ?>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Masuk</button>
        </form>
    </div>
    <a href="<?= base_url('main/register') ?>">
        <span>Daftar akun</span>
    </a>
</body>

</html>