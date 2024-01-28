<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Login Page</title>
</head>
<body>
 
   <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Login</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" require>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="button" class="btn btn-primary" onclick="login()">Login</button>
            </form>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Fungsi Login
        function login() {
            // Mendapatkan nilai dari form
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Membuat objek FormData
            const formData = new FormData();
            formData.append('user', username);
            formData.append('pwd', password);

            // Konfigurasi Axios
            axios.post('https://client-server-sala.000webhostapp.com/login.php', formData)
            .then(response => {
                console.log(response)
                // Handle respons dari server
                if (response.data.status == 'success') {
                    // Jika login berhasil,buka dashboard
                    const sessionToken = response.data.session_token;
                    localStrage.setItem('session_token', sessionToken);
                    window.location.href = 'index.php';
                } else {
                    // Jika login gagal, tampilkan pesan kesalahan
                    alert('Login failed. Please check your credentials.');
                }
            })
            .catch(error => {
                // Handle kesalahan koneksi atau server
                console.error('Error during login:', error);
            });
        }
    </script>
</body>
</html>
