<?php
include('header.php')
?>

 <div class="container mt-5">
    <!-- Konten dashboard -->
    <h2 id="welcomeMessage">Selamat datang di Dashboard</h2>
    <!-- Isi dengan konten dashboard lainnya -->
 </div>

 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 <script>
    //console.log(localStorage.getItem('nama'));
    document.getElementById('welcomeMessage').innerText = 'Selamat datang' + localStorage.getItem('nama');

    </script>