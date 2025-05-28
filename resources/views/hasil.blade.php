@extends('layouts.master')

@section('title', 'Hasil Seleksi - ' . $peserta->nama_lengkap)

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #650096;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        color: white;
    }
    
    .result-card {
        font-family: 'Poppins', sans-serif;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        margin-bottom: 30px;
    }

    .congrats-text {
        font-family: 'Poppins', sans-serif;
        text-align: center;
        margin-bottom: 30px;
    }

    .score-item h3,
    .score-item p,
    .back-btn {
        font-family: 'Poppins', sans-serif;
    }

    .score-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .score-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .score-item h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #4CAF50;
        margin-bottom: 5px;
    }

    .score-item p {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .back-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateX(-5px);
    }

    .button-wrapper {
        width: 100%;
        position: relative;
        margin-bottom: 20px;
    }

    .gallery-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .gallery-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateX(5px);
    }

    @media (max-width: 768px) {
        .score-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .back-btn {
            position: relative;
            top: 0;
            left: 0;
            margin-bottom: 20px;
            display: inline-block;
        }

        .button-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .gallery-btn {
            position: relative;
            top: 0;
            right: 0;
            margin-bottom: 20px;
            display: inline-block;
        }
    }

    Add animation styles
    .header {
        text-align: center;
        margin-bottom: 40px;
        opacity: 0;
        animation: fadeInDown 1s ease forwards;
    }

    .result-card {
        transform: translateY(20px);
        opacity: 0;
        animation: fadeInUp 1s ease 0.3s forwards;
    }

    .score-item {
        transition: all 0.3s ease;
    }

    .score-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .celebration {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 9999;
    }

    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        opacity: 0;
    }
</style>
@endpush

@section('content')
<div class="button-wrapper">
    <a href="{{ route('home') }}" class="back-btn">← Kembali</a>
    <a href="{{ route('gallery') }}" class="gallery-btn">Galeri →</a>
</div>

<div class="header">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo DA" style="width: 80px; height: auto; margin-bottom: 20px;">
    </div>
    <h1>HASIL SELEKSI</h1>
    <p>Dewan Ambalan 2025</p>
</div>

<div class="main-content">
    <div class="result-card">
        <div class="congrats-text">
            @if($peserta->status_kelulusan === 'Lulus')
            <h2>SELAMAT {{ strtoupper($peserta->nama_lengkap) }}</h2>
                <p>DINYATAKAN <strong style="color: #4CAF50;">LULUS</strong> SELEKSI DA 25</p>
            @else
            <h2>MAAF {{ strtoupper($peserta->nama_lengkap) }}</h2>
                <p>DINYATAKAN <strong style="color: #F44336;">TIDAK LULUS</strong> SELEKSI DA 25</p>
            @endif
        </div>

        <div class="score-grid">
            <div class="score-item">
            <h3 style="color: {{ $peserta->wawancara < 22.75 ? '#F44336' : '#4CAF50' }};">
                {{ $peserta->wawancara }}
            </h3>
            <p>Wawancara</p>
            </div>
            <div class="score-item">
            <h3 style="color: {{ $peserta->tes_tulis < 22.75 ? '#F44336' : '#4CAF50' }};">
                {{ $peserta->tes_tulis }}
            </h3>
            <p>Tes Tulis</p>
            </div>
            <div class="score-item">
            <h3 style="color: {{ $peserta->cv < 22.75 ? '#F44336' : '#4CAF50' }};">
                {{ $peserta->cv }}
            </h3>
            <p>CV</p>
            </div>
            <div class="score-item">
            <h3 style="color: {{ $peserta->visimisi_proker < 22.75 ? '#F44336' : '#4CAF50' }};">
                {{ $peserta->visimisi_proker }}
            </h3>
            <p>VisMis - Proker</p>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('download.hasil', $peserta->id) }}" class="btn btn-primary">
                Download Hasil Seleksi
            </a>
            <a href="{{ route('leaderboard') }}" class="btn btn-secondary">
                Lihat Leaderboard
            </a>
        </div>
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

    // Add celebration animation for passing students
    if (document.querySelector('.celebration')) {
        createCelebration();
    }

    function createCelebration() {
        const colors = ['#FFD700', '#FF69B4', '#00FF00', '#FF4500', '#00FFFF'];
        const celebration = document.querySelector('.celebration');

        for (let i = 0; i < 50; i++) {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.animationDelay = Math.random() * 3 + 's';
            confetti.style.animation = `fall ${Math.random() * 3 + 2}s linear`;
            celebration.appendChild(confetti);
        }
    }

    @keyframes fall {
        from {
            transform: translateY(-100vh) rotate(0deg);
            opacity: 1;
        }
        to {
            transform: translateY(100vh) rotate(360deg);
            opacity: 0;
        }
    }
</script>
@endpush