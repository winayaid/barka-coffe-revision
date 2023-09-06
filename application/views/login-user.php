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
        <a class="text-3xl font-bold mb-4" href="<?= base_url() ?>">Sign In</a>
        <p class="text-gray-600 mb-4">
            Don't have an account?
            <a href="<?= base_url(); ?>main/register" class="text-blue-500">Create Account</a>
        </p>
        <?php if ($this->session->flashdata('message') == 'tak terdaftar') : ?>
        <p class="error-message">Anda belum terdaftar</p>
        <?php elseif ($this->session->flashdata('message') == 'password salah') : ?>
        <p class="error-message">Password salah</p>
        <?php endif; ?>
        <div class="w-1/3">
            <?php echo form_open_multipart('Main/loginProcess'); ?>
            <div class="w-full bg-secondary p-10 rounded-xl">
                <div class="mb-4">
                    <label for="email" class="block mb-2">Email</label>
                    <input type="email" id="email" class="w-full border p-2 rounded" name="email" />
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2">Password</label>
                    <input type="password" id="password" class="w-full border p-2 rounded" name="password" />
                </div>
                <!-- <div class="flex items-center mb-4">
                <input type="checkbox" id="remember-me" class="mr-2 rounded" />
                <label for="remember-me" class="text-gray-600"> Remember me </label>
            </div> -->
                <div class="flex justify-center">
                    <button class="bg-primary text-white px-12 py-2 rounded-lg">
                        Log In
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>

</html>