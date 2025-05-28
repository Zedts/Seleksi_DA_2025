@extends('layouts.master')

@section('title', 'Pengumuman Hasil Seleksi DA 2025')

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
        scroll-behavior: smooth;
    }

    .container {
        padding: 40px 20px;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }

    .header {
        text-align: center;
        margin-bottom: 40px;
        padding-top: 40px;
    }

    .header img {
        width: 120px;
        height: auto;
        transform: translateY(-20px);
        animation: float 3s ease-in-out infinite;
    }

    .header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 20px 0 10px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        background: linear-gradient(45deg, #fff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .header p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0;
    }

    .card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .input-group {
        margin-bottom: 25px;
    }

    .input-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .input-group input {
        width: 100%;
        padding: 15px 20px;
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .input-group input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
    }

    .input-group input::placeholder {
        color: #ffffff;
        opacity: 1;
        font-weight: 400;
    }

    .btn-primary {
        background: linear-gradient(45deg, #7c3aed, #a78bfa);
        color: white;
        padding: 15px 30px;
        border-radius: 25px;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.8s ease;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .alert {
        background: rgba(231, 76, 60, 0.2);
        border: 1px solid rgba(231, 76, 60, 0.3);
        color: #e74c3c;
        padding: 15px;
        border-radius: 15px;
        margin-bottom: 20px;
        font-size: 0.9rem;
        backdrop-filter: blur(10px);
    }

    @keyframes float {
        0%, 100% { transform: translateY(-20px); }
        50% { transform: translateY(-30px); }
    }

    /* Update mobile styles */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .header {
            margin-bottom: 30px;
            padding-top: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            font-size: 1.8rem;
            margin: 15px 0 8px;
        }

        .header p {
            font-size: 1rem;
        }

        .card {
            padding: 25px 20px;
            margin-bottom: 20px;
            backdrop-filter: blur(8px);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .input-group input {
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .btn-primary {
            padding: 12px 20px;
            font-size: 0.95rem;
        }

        .alert {
            padding: 12px;
            font-size: 0.85rem;
            margin-bottom: 15px;
        }
    }

    /* Add styles for extra small devices */
    @media (max-width: 480px) {
        .header h1 {
            font-size: 1.5rem;
        }

        .header img {
            width: 80px;
        }

        .card {
            padding: 20px 15px;
        }

        .input-group input {
            padding: 10px 15px;
        }
    }

    /* Fix input on iOS */
    @supports (-webkit-touch-callout: none) {
        .input-group input {
            font-size: 16px; /* Prevent zoom on iOS */
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="header" data-aos="fade-down" data-aos-duration="1000">
        <img src="{{ asset('images/logo.png') }}" alt="Logo DA">
        <h1>PENGUMUMAN HASIL SELEKSI</h1>
        <p>Dewan Ambalan 2025</p>
    </div>

    <div class="card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
        @if(session('error'))
            <div class="alert" data-aos="fade-in" data-aos-duration="800">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('cari.hasil') }}" method="POST">
            @csrf
            <div class="input-group" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <label for="nama_lengkap">
                    <i class="fas fa-user"></i> Nama Lengkap
                </label>
                <input 
                    type="text" 
                    id="nama_lengkap" 
                    name="nama_lengkap" 
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('nama_lengkap') }}"
                    required
                >
                @error('nama_lengkap')
                    <small style="color: #ffcdd2; display: block; margin-top: 5px;">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            
            <button type="submit" class="btn-primary" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                <i class="fas fa-search"></i> Cari Hasil Seleksi
            </button>
        </form>
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
</script>
@endpush