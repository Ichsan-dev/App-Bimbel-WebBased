<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa - Cetak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative; /* Menambahkan posisi relatif untuk container */
        }
        h1 {
            text-align: center;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .form-field {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc; /* Menambahkan garis bawah untuk setiap form field */
            padding-bottom: 5px; /* Menambahkan ruang di bawah setiap form field */
        }
        .form-field label {
            font-weight: bold;
            width: 150px;
        }
        .form-field span {
            flex: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: inline-block; /* Menambahkan display inline-block untuk span */
            vertical-align: middle; /* Menengahkan vertikal span */
        }
        .photo {
            text-align: center;
            margin-top: 20px;
        }
        .photo img {
            max-width: 150px;
            border-radius: 5px;
        }
        .date {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="date">Tanggal: {{ date('d M Y') }}</div>
        <h1>Formulir Pendaftaran Siswa</h1>
        <div class="form-field">
            <label>Nama:</label><span>{{ $data['vnama'] }}</span>
        </div>
        <div class="form-field">
            <label>Kursus:</label><span>{{ $data['kursus_id'] }}</span>
        </div>
        <div class="form-field">
            <label>Jenis Kelamin:</label><span>{{ $data['vjenis_kelamin'] }}</span>
        </div>
        <div class="form-field">
            <label>No Telp:</label><span>{{ $data['vno_telp'] }}</span>
        </div>
        <div class="form-field">
            <label>Email:</label><span>{{ $data['vemail'] }}</span>
        </div>
        <div class="form-field">
            <label>Nama Orangtua:</label><span>{{ $data['vorangtua'] }}</span>
        </div>
        <div class="form-field">
            <label>Email Orangtua:</label><span>{{ $data['emailortu'] }}</span>
        </div>
        <div class="form-field">
            <label>Tanggal Lahir:</label><span>{{ $data['vtgl'] }}</span>
        </div>
        <div class="form-field">
            <label>Alamat:</label><span>{{ $data['valamat'] }}</span>
        </div>
        {{-- <div class="photo">
            <label>Foto:</label><br>
            <img src="{{ public_path('path_to_photo.jpg') }}" alt="Foto Siswa">
        </div> --}}
    </div>
</body>
</html>
