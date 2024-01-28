<?php
include('header.php');
include('check_session.php');

// Ambil ID dari $_POST
$id = isset($_POST['id']) ? $_POST['id'] : null;
?>

<div class="container mt-5">
    <h2 class="mb-4">Add News Form</h2>
            
    <form id="addNewsForm">
        <div class="form-group">
            <label for="judul">Tittle:</label>
            <input type="text" class="form-control"  maxlength="50" id="judul" name="judul" require>
        </div>
        
        <div class="form-group">
            <label for="url_image">Image:</label>
            <input type="file" class="form-control-file" id="url_image" name="url_image" accept="image/*" required>
        </div>

        <button type="button" class="btn btn-primary" onclick="editNews()">Edit News</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function getData() {
            const newsId = document.getElementById('newId').value;
            var formData = new FormData();
            formData.append('idnews', newsId);
            axios.post('https://client-server-sala.000webhostapp.com/selectdata.php', formData)
                 .then(function(response) {
                    // isi nilai input dengan data yang diterima
                    document.getElementById('judul').value = response.data.tittle;
                    document.getElementById('deskripsi').value = response.data.desc;
                 
            })
            .catch(function(response) {
                console.error(error);
                alert('Error fetching news data.');
            });
        }

        function editNews() {
            const newsId = document.getElementById('newsId').value;
            const judul = document.getElementById('judul').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const urlImageInput = document.getElementById('url_image');
            const url_image = urlImageInput.files[0];
            const tanggal = new Date().toISOString().split('T')[0];
            // Get form data
            var formData = new FromData();
            formData.append('judul', judul);
            formData.append('deskripsi', deskripsi);
            formData.append('url_image', url_image);
            formData.append('tanggal', tanggal);

            if (urlImageInput.files.lenght > 0) {
                formData.append('url_image', url_image);
            } else {
                formData.append('url_image', null);
                // Tidak perlu menambahkan url_image karena tidak ada file yang di pilih
            }
            //Lakukan permintaan AJAX untuk mengdit berita
           axios.post('https://client-server-sala.000webhostapp.com/editnews.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(function(response) {
            console.log(response.data);
            alert(response.data); // Tampilkan pesan berhasil atau tanggapan yang sesuai
            window.location.href = 'kelola.php';
        })
        .catch(function(error)) {
            console.error(error);
            alert('Error editing news.');
        };
    
            
     }
        window.onload = getData;
    </script>