<!-- <!DOCTYPE html>
<html>

<head>
    <title>Register</title>
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

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"] {
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <?php echo form_open_multipart('Main/registerProcess'); ?>
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto">
        </div>
        <button type="submit">Daftar</button>
        </form>
        <a href="<?= base_url('main/login') ?>">
            <span>Masuk</span>
        </a>
    </div>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barka Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: "#FF881A",
                    secondary: "#ffc692",
                },
            },
        },
    }
    </script>
</head>

<body>
    <div class="flex flex-col items-center justify-center h-screen">
        <h2 class="text-3xl font-bold mb-4">Create Account</h2>
        <p class="text-gray-600 mb-4">
            Already have an account? <a href="<?= base_url(); ?>user/login" class="text-blue-500">Sign in</a>
        </p>
        <?php echo form_open_multipart('Main/registerUserProcess'); ?>
        <div class="w-full bg-secondary p-10 rounded-xl">
            <div class="mb-4">
                <label for="first-name">Nama</label>
                <input type="text" id="first-name" name="nama" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2">Email</label>
                <input type="email" id="email" class="w-full border p-2 rounded" name="email" />
            </div>
            <div class="mb-4">
                <label for="no_wa" class="block mb-2">No Wa</label>
                <div class="flex items-center space-x-2">
                    <span>+62</span>
                    <input type="number" id="no_wa" class="w-full border p-2 rounded" name="no_wa" />
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2">Password</label>
                <input type="password" id="password" class="w-full border p-2 rounded" name="password" />
            </div>
            <div class="mb-4">
                <label for="foto">Foto</label>
                <input type="file" id="foto" class="w-full border p-2 rounded bg-white" name="foto">
            </div>
            <!-- <div class=" flex items-center mb-4">
                <input type="checkbox" id="terms-of-service" class="mr-2 rounded" />
                <label for="terms-of-service" class="text-gray-600">
                    I have read and agree to the terms of service
                </label>
            </div> -->
            <div class="flex justify-center">
                <button type="submit" class="bg-primary text-white px-12 py-2 rounded-lg">
                    Sign up
                </button>
            </div>
        </div>
        </form>
    </div>
</body>

</html>