<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Poliklinik</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>"> 
    <link rel="stylesheet" href="<?=base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/app.css')?>"> 
    <link rel="stylesheet" href="<?=base_url('assets/css/pages/auth.css')?>">
    <style>
        /* Sembunyikan bagian register saat halaman pertama kali dimuat */
        #auth.register {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Auth Login Section -->
    <div id="auth" class="login">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form action="index.html">
                        <input type="hidden" class="form-control form-control-xl" name="type" value="login">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username_login" placeholder="Username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password_login" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="btnLogin">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="#" class="font-bold" id="show-register">Sign up</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

    <!-- Auth Register Section -->
    <div id="auth" class="register">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form>
                        <input type="hidden" class="form-control form-control-xl" name="type" value="register">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" pattern="[a-zA-Z0-9]{5,}" title="Minimal 5 karakter, hanya huruf dan angka" required name="username_register" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password_register" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="confirm_pass_register" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="btnRegister">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="#" class="font-bold" id="show-login">Log in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

    <!-- jQuery and JavaScript to toggle sections -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Tampilkan bagian register, sembunyikan login saat "Sign up" diklik
            $('#show-register').click(function(event) {
                event.preventDefault();
                $('#auth.login').hide();
                $('#auth.register').show();
            });

            // Tampilkan bagian login, sembunyikan register saat "Log in" diklik
            $('#show-login').click(function(event) {
                event.preventDefault();
                $('#auth.register').hide();
                $('#auth.login').show();
            });

            $('#btnRegister').click(function(event) {
                event.preventDefault();

                var username = $('[name="username_register"]').val();
                var password = $('[name="password_register"]').val();
                var confirmPassword = $('[name="confirm_pass_register"]').val();

                // Validasi di sisi client
                if (password.length < 8) {
                    Swal.fire('Error', 'Password harus minimal 8 karakter', 'error');
                    return;
                }
                if (password !== confirmPassword) {
                    Swal.fire('Error', 'Konfirmasi password tidak cocok', 'error');
                    return;
                }

                // Data untuk dikirim ke server
                var formData = {
                    type: 'register',
                    username_register: username,
                    password_register: password
                };

                // Kirim data menggunakan AJAX
                $.ajax({
                    url: '<?= base_url("home/auth") ?>',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Berhasil', 'Berhasil Mendaftar', 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Mendaftar', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });
            
            $('#btnLogin').click(function(event) {
                event.preventDefault();

                var username = $('[name="username_login"]').val();
                var password = $('[name="password_login"]').val();

                // Data untuk dikirim ke server
                var formData = {
                    type: 'login',
                    username_login: username,
                    password_login: password
                };

                // Kirim data menggunakan AJAX
                $.ajax({
                    url: '<?= base_url("home/auth") ?>',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Berhasil', 'Berhasil Login', 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Gagal Login', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data', 'error');
                    }
                });
            });
        });
    </script>
</body>
</html>
