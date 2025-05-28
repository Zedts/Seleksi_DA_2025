@extends('layouts.master')

@section('title', 'Leaderboard Seleksi DA 2025')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #650096 0%, #8e44ad 100%);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        color: white;
    }

    .leaderboard-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50px;
        color: white;
        text-decoration: none;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }

    .back-button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateX(-5px);
    }

    .leaderboard-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .leaderboard-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .leaderboard-header h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        background: linear-gradient(45deg, #fff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .leaderboard-table {
        width: 100%;
        border-collapse: collapse;
    }

    .leaderboard-table th {
        padding: 15px;
        text-align: left;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        font-weight: 600;
        position: relative;
    }

    .leaderboard-table td {
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .leaderboard-table tbody tr {
        transition: all 0.3s ease;
    }

    .leaderboard-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    .rank {
        font-size: 1.2rem;
        font-weight: 600;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto;
    }

    .rank-1 {
        background: linear-gradient(45deg, #FFD700, #FFA500);
        color: #fff;
    }

    .rank-2 {
        background: linear-gradient(45deg, #C0C0C0, #A9A9A9);
        color: #fff;
    }

    .rank-3 {
        background: linear-gradient(45deg, #CD7F32, #8B4513);
        color: #fff;
    }

    .score {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .swipe-hint {
        display: none; /* Hidden by default */
        text-align: center;
        margin: 10px 0;
        font-size: 0.85rem;
        color: rgba(255,255,255,0.7);
        animation: fadeInOut 2s infinite;
    }

    @media (max-width: 768px) {
        .leaderboard-container {
            padding: 15px;
            margin: 20px auto;
        }

        .leaderboard-card {
            padding: 20px 15px;
            overflow-x: auto; /* Enable horizontal scrolling */
        }

        .leaderboard-header h1 {
            font-size: 1.8rem;
        }

        .leaderboard-header p {
            font-size: 0.9rem;
        }

        .leaderboard-table {
            min-width: 800px; /* Ensure minimum width for scrolling */
        }

        .leaderboard-table th,
        .leaderboard-table td {
            padding: 12px 8px;
            font-size: 0.9rem;
            white-space: nowrap; /* Prevent text wrapping */
        }

        .rank {
            width: 35px;
            height: 35px;
            font-size: 1rem;
        }

        .score {
            font-size: 0.95rem;
        }

        .back-button {
            padding: 8px 15px;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        /* Add scrolling indicator */
        .leaderboard-card::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 30px;
            background: linear-gradient(to right, transparent, rgba(0,0,0,0.2));
            pointer-events: none;
            opacity: 0.8;
            animation: pulseGradient 2s infinite;
        }

        @keyframes pulseGradient {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.4; }
        }

        /* Add swipe hint */
        .swipe-hint {
            display: block;
            text-align: center;
            margin: 10px 0;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
            animation: fadeInOut 2s infinite;
        }

        @keyframes fadeInOut {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 0.3; }
        }
    }

    /* Extra small devices */
    @media (max-width: 480px) {
        .leaderboard-header h1 {
            font-size: 1.5rem;
        }

        .leaderboard-card {
            padding: 15px 10px;
        }

        .back-button {
            font-size: 0.85rem;
            padding: 8px 12px;
        }
    }
</style>
@endpush

@section('content')
<div class="leaderboard-container">
    <a href="{{ route('home') }}" class="back-button" data-aos="fade-right">
        <i class="fas fa-arrow-left"></i>&nbsp; Kembali
    </a>

    <div class="leaderboard-card" data-aos="fade-up" data-aos-duration="800">
        <div class="swipe-hint">
            <i class="fas fa-hand-point-right"></i> Geser untuk melihat lebih banyak
        </div>

        <div class="leaderboard-header">
            <h1>LEADERBOARD SELEKSI</h1>
            <p>Daftar Peringkat Peserta DA 2025</p>
        </div>

        <table class="leaderboard-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Nama</th>
                    <th>Wawancara</th>
                    <th>Tes Tulis</th>
                    <th>CV</th>
                    <th>Visi Misi</th>
                    <th>Rata-Rata</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peserta as $key => $p)
                <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <td>
                        <div class="rank {{ $loop->iteration <= 3 ? 'rank-'.$loop->iteration : '' }}">
                            {{ $loop->iteration }}
                        </div>
                    </td>
                    <td><strong>{{ $p->nama_lengkap }}</strong></td>
                    <td class="score" style="color: {{ $p->wawancara < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                        {{ $p->wawancara }}
                    </td>
                    <td class="score" style="color: {{ $p->tes_tulis < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                        {{ $p->tes_tulis }}
                    </td>
                    <td class="score" style="color: {{ $p->cv < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                        {{ $p->cv }}
                    </td>
                    <td class="score" style="color: {{ $p->visimisi_proker < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                        {{ $p->visimisi_proker }}
                    </td>
                    <td class="score" style="color: {{ ( ($p->wawancara + $p->tes_tulis + $p->cv + $p->visimisi_proker) / 4 ) < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                        <strong>{{ number_format( ($p->wawancara + $p->tes_tulis + $p->cv + $p->visimisi_proker) / 4, 2 ) }}</strong>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-cubic'
    });

    // Check if content overflows and show/hide swipe hint
    function checkOverflow() {
        const card = document.querySelector('.leaderboard-card');
        const table = document.querySelector('.leaderboard-table');
        const hint = document.querySelector('.swipe-hint');
        
        if (card && table && hint) {
            if (table.offsetWidth > card.offsetWidth) {
                hint.classList.add('show');
            } else {
                hint.classList.remove('show');
            }
        }
    }

    // Check on load and resize
    window.addEventListener('load', checkOverflow);
    window.addEventListener('resize', checkOverflow);
</script>
@endpush