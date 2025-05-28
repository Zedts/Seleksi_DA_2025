<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hasil Seleksi - {{ $peserta->nama_lengkap }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            color: #333;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #650096;
            padding-bottom: 15px;
        }

        .header img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .header h1 {
            color: #650096;
            font-size: 20px;
            margin: 5px 0;
        }

        .header p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }

        .result-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            border: 1px solid #eee;
        }

        .result-info h2 {
            margin: 0 0 10px 0;
            font-size: 22px;
            color: #333;
        }

        .result-info .status {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 16px;
        }

        .status-lulus {
            background-color: #c8e6c9;
            color: #2e7d32;
        }

        .status-tidak-lulus {
            background-color: #ffcdd2;
            color: #c62828;
        }

        .scores-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .scores-table th,
        .scores-table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        .scores-table th {
            background-color: #f1f1f1;
            color: #555;
        }

        .footer {
            text-align: right;
            margin-top: 40px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('images/logo da.png') }}" alt="Logo DA">
        <h1>HASIL SELEKSI DEWAN AMBALAN 2025</h1>
        <p>Jl. Nanas II No.9, RT.9/RW.10, Utan Kayu Utara, Kec. Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13120</p>
    </div>

    <div class="result-info">
        @if($peserta->status_kelulusan === 'Lulus')
            <h2>SELAMAT!</h2>
            <p>{{ strtoupper($peserta->nama_lengkap) }} dinyatakan:</p>
            <span class="status status-lulus">LULUS</span>
            <br><br>
            <img src="{{ public_path('images/barcode.png') }}" alt="Barcode" width="150">
        @else
            <h2>MOHON MAAF</h2>
            <p>{{ strtoupper($peserta->nama_lengkap) }} dinyatakan:</p>
            <span class="status status-tidak-lulus">TIDAK LULUS</span>
        @endif
    </div>

    <table class="scores-table">
        <tr>
            <th>Komponen Penilaian</th>
            <th>Skor</th>
        </tr>
        <tr>
            <td>Wawancara</td>
            <td>{{ $peserta->wawancara }}</td>
        </tr>
        <tr>
            <td>Tes Tulis</td>
            <td>{{ $peserta->tes_tulis }}</td>
        </tr>
        <tr>
            <td>CV</td>
            <td>{{ $peserta->cv }}</td>
        </tr>
        <tr>
            <td>Visi Misi & Program Kerja</td>
            <td>{{ $peserta->visimisi_proker }}</td>
        </tr>
        <tr>
            <td><strong>Rata-rata Skor</strong></td>
            <td><strong>{{ number_format(($peserta->wawancara + $peserta->tes_tulis + $peserta->cv + $peserta->visimisi_proker) / 4, 2) }}</strong></td>
        </tr>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y H:i') }}</p>
    </div>

</body>
</html>