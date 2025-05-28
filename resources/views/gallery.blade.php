@extends('layouts.master')

@section('title', 'Struktur Kepengurusan Dewan Ambalan 2024')

@section('content')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>

.button-wrapper {
    width: 100%;
    position: relative;
    margin-bottom: 20px;
    padding: 20px;
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
    color: white;
    text-decoration: none;
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
    color: white;
    text-decoration: none;
}

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #650096 0%, #8e44ad 100%);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        color: white;
        scroll-behavior: smooth;
    }

    .header {
        text-align: center;
        padding: 60px 0 40px;
        position: relative;
    }

    .logo-container {
        margin-bottom: 30px;
    }

    .logo-img {
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        background: rgba(255, 255, 255, 0.1);
        padding: 10px;
    }

    .logo-img:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 15px 35px rgba(255, 255, 255, 0.2);
    }

    .main-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        background: linear-gradient(45deg, #fff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .subtitle {
        font-size: 1.2rem;
        font-weight: 300;
        opacity: 0.9;
        margin-bottom: 40px;
    }

    /* Leadership Section Styles */
    .leadership-section {
        margin-bottom: 80px;
    }

    .leadership-row {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
        margin-bottom: 60px;
    }

    .prada-container {
        display: flex;
        justify-content: center;
        gap: 60px;
        margin-bottom: 60px;
        flex-wrap: wrap;
    }

    .secretary-container {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 60px;
        flex-wrap: wrap;
    }

    /* Section Titles */
    .section-title {
        font-size: 2.2rem;
        font-weight: 600;
        text-align: center;
        margin: 60px 0 40px;
        position: relative;
        color: white;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #ff6b6b, #ffd93d, #4ecdc4);
        border-radius: 2px;
    }

    .section-title::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #4ecdc4, #44a08d);
        border-radius: 1px;
    }

    /* Member Card Styles */
    .member-card {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 35px 25px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.25);
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .member-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transition: left 0.8s ease;
    }

    .member-card:hover::before {
        left: 100%;
    }

    .member-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        border-color: rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.18);
    }

    /* Photo Placeholder */
    .member-photo {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        margin: 0 auto 25px;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 400;
        color: #999;
        border: 4px solid rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .member-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .member-photo::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transform: rotate(45deg);
        transition: all 0.6s ease;
        opacity: 0;
    }

    .member-card:hover .member-photo::before {
        opacity: 1;
        animation: shine 1.5s ease-in-out;
    }

    .member-card:hover .member-photo {
        transform: scale(1.1);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    }

    @keyframes shine {
        0% { transform: rotate(45deg) translate(-100%, -100%); }
        100% { transform: rotate(45deg) translate(100%, 100%); }
    }

    /* Member Info */
    .member-name {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: white;
        transition: all 0.3s ease;
    }

    .member-card:hover .member-name {
        color: #ffd93d;
        transform: scale(1.05);
    }

    .member-position {
        font-size: 1rem;
        font-weight: 400;
        opacity: 0.8;
        color: #e0e0e0;
        transition: all 0.3s ease;
    }

    .member-card:hover .member-position {
        opacity: 1;
        color: #fff;
    }

    /* Special Styles for Leadership Positions */
    .prada-card {
        background: rgba(255, 215, 0, 0.15);
        border: 2px solid rgba(255, 215, 0, 0.3);
    }

    .prada-card:hover {
        background: rgba(255, 215, 0, 0.25);
        border-color: rgba(255, 215, 0, 0.5);
    }

    .prada-card .member-photo {
        background: #f0f0f0;
        border-color: rgba(255, 215, 0, 0.5);
    }

    /* Responsive Grid System */
    .member-grid {
        display: grid;
        gap: 30px;
        margin-bottom: 60px;
    }

    .grid-2 { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
    .grid-3 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
    .grid-4 { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); }

    /* Animation Classes */
    .fade-up {
        transition: transform 0.6s ease, opacity 0.6s ease;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .main-title {
            font-size: 2.4rem;
        }
        
        .prada-container {
            gap: 40px;
        }
    }

    @media (max-width: 768px) {
        .main-title {
            font-size: 2rem;
        }
        
        .subtitle {
            font-size: 1.1rem;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .prada-container,
        .secretary-container,
        .leadership-row {
            gap: 20px;
        }
        
        .member-card {
            padding: 25px 20px;
        }
        
        .member-photo {
            width: 110px;
            height: 110px;
            font-size: 35px;
        }
        
        .member-name {
            font-size: 1.2rem;
        }
        
        .grid-4 { 
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 
            gap: 20px;
        }
        
        .grid-3 { 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px;
        }
    }

    @media (max-width: 480px) {
        .header {
            padding: 40px 0 30px;
        }
        
        .main-title {
            font-size: 1.6rem;
        }
        
        .subtitle {
            font-size: 1rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            margin: 40px 0 30px;
        }
        
        .member-card {
            padding: 20px 15px;
        }
        
        .member-photo {
            width: 100px;
            height: 100px;
            font-size: 30px;
        }
        
        .member-name {
            font-size: 1.1rem;
        }
        
        .member-position {
            font-size: 0.9rem;
        }
        
        .grid-2,
        .grid-3,
        .grid-4 { 
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .prada-container,
        .secretary-container {
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
    }
    @media (max-width: 768px) {
    .button-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .back-btn, .gallery-btn {
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        margin-bottom: 20px;
        display: inline-block;
    }
}
</style>
@endpush

@section('content')
<div class="button-wrapper">
    <a href="{{ url('/') }}" class="back-btn">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
    <a href="{{ url('/dokumentasi') }}" class="gallery-btn">
        Dokumentasi<i class="fas fa-arrow-right ms-2"></i>
    </a>
</div>

<div class="header">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo DA" style="width: 80px; height: auto; margin-bottom: 20px;">
    </div>
    <h1 class="main-title">
        Struktur Kepengurusan Dewan Ambalan 2024
    </h1>
    <p class="subtitle">
        Organisasi Pramuka Terdepan dan Terpercaya
    </p>
</div>

<div class="container mt-5">
    <div class="leadership-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="prada-container">
            <!-- King Ade -->
            <div class="member-card prada-card"
                data-aos="zoom-in"
                data-aos-duration="800"
                data-aos-delay="100"
                onmouseover="this.querySelector('img').style.objectPosition='center 30%'; this.querySelector('img').src='{{ asset('images/profile/king_ade_hover.jpg') }}'"
                onmouseout="this.querySelector('img').style.objectPosition='center 30%'; this.querySelector('img').src='{{ asset('images/profile/king_ade.jpg') }}'">
                <div class="member-photo">
                    <img 
                        src="{{ asset('images/profile/king_ade.jpg') }}" 
                        alt="Ade Putra Primadani, M.PD" 
                        style="object-fit: cover; object-position: center 30%;"
                        onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                    >
                </div>
                <h5 class="member-name">Ade Putra Primadani, M.PD</h5>
                <p class="member-position">Ketua Gudep</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <!-- Pimpinan Utama (Prada) -->
    <div class="leadership-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="prada-container">
            
            <!-- Pradana Putra -->
            <div class="member-card prada-card" 
                data-aos="zoom-in" 
                data-aos-duration="800" 
                data-aos-delay="100"
                onmouseover="this.querySelector('img').src='{{ asset('images/profile/firmansyah_hover.jpg') }}'"
                onmouseout="this.querySelector('img').src='{{ asset('images/profile/firmansyah.jpg') }}'">
                <div class="member-photo">
                    <img 
                        src="{{ asset('images/profile/firmansyah.jpg') }}" 
                        alt="Firmansyah" 
                        onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                    >
                </div>
                <h5 class="member-name">Firmansyah</h5>
                <p class="member-position">Pradana Putra</p>
            </div>

            <!-- Pradani Putri -->
            <div class="member-card prada-card" 
                data-aos="zoom-in" 
                data-aos-duration="800" 
                data-aos-delay="200"
                onmouseover="this.querySelector('img').src='{{ asset('images/profile/pratistha_hover.jpg') }}'"
                onmouseout="this.querySelector('img').src='{{ asset('images/profile/pratistha.jpg') }}'">
                <div class="member-photo">
                    <img 
                        src="{{ asset('images/profile/pratistha.jpg') }}" 
                        alt="Pratistha" 
                        onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                    >
                </div>
                <h5 class="member-name">Pratistha</h5>
                <p class="member-position">Pradani Putri</p>
            </div>
        </div>
    </div>

    <!-- Sekretariat -->
    <div class="secretary-container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <!-- Sekretaris Umum -->
        <div class="member-card"
            data-aos="flip-left"
            data-aos-duration="800"
            data-aos-delay="100"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/miska_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/miska.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/miska_anjani.jpg') }}" alt="Miska" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Miska</h5>
            <p class="member-position">Sekretaris Umum</p>
        </div>

        <!-- Sekretaris Kedua -->
        <div class="member-card"
            data-aos="flip-right"
            data-aos-duration="800"
            data-aos-delay="200"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/viola_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/viola.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/viola.jpg') }}" alt="Viola" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Viola</h5>
            <p class="member-position">Sekretaris Kedua</p>
        </div>

        <!-- Bendahara -->
        <div class="member-card"
            data-aos="flip-up"
            data-aos-duration="800"
            data-aos-delay="300"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/raysa_aqila_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/raysa_aqila.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/raysa_aqila.jpg') }}" alt="Raysa" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Raysa</h5>
            <p class="member-position">Juang / Bendahara</p>
        </div>
    </div>

    <!-- Bidang Kurikulum -->
    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Bidang Kurikulum</h4>
    <div class="member-grid grid-3" data-aos="fade-up" data-aos-duration="1000">
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="100"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/lutfan_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/lutfan.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/lutfan.jpg') }}" alt="Lutfan" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Lutfan</h5>
            <p class="member-position">Anggota Kurikulum</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="200"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/lutania_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/lutania.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/lutania.jpg') }}" alt="Lutania" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Lutania</h5>
            <p class="member-position">Anggota Kurikulum</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="300"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/bilqis_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/bilqis.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/bilqis.jpg') }}" alt="Bilqis" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Bilqis</h5>
            <p class="member-position">Anggota Kurikulum</p>
        </div>
    </div>

    <!-- Bidang Kegiatan / Latihan -->
    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Bidang Kegiatan / Latihan</h4>
    <div class="member-grid grid-4" data-aos="fade-up" data-aos-duration="1000">
        <!-- Card seperti punya Firman -->
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="100"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/rakan_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/rakan.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/rakan.jpg') }}"
                    alt="Rakan"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Rakan</h5>
            <p class="member-position">Anggota Kegiatan</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="200"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/gielang_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/gielang.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/gielang.jpg') }}"
                    alt="Gielang"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Gielang</h5>
            <p class="member-position">Anggota Kegiatan</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="300"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/nabil_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/nabil.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/nabil.jpg') }}"
                    alt="Nabil"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Nabil</h5>
            <p class="member-position">Anggota Kegiatan</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="400"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/ghania_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/ghania.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/ghania.jpg') }}"
                    alt="Ghania"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Ghania</h5>
            <p class="member-position">Anggota Kegiatan</p>
        </div>
    </div>

    <!-- Bidang Humas -->
    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Bidang Humas</h4>
    <div class="member-grid grid-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="100"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/fahry_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/fahry.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/fahry.jpg') }}"
                    alt="Fahry"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Fahry</h5>
            <p class="member-position">Anggota Humas</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="200"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/amel_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/amel.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/amel.jpg') }}"
                    alt="Amel"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Amel</h5>
            <p class="member-position">Anggota Humas</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="300"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/aqila_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/aqila.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/aqila.jpg') }}"
                    alt="Aqila"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Aqila</h5>
            <p class="member-position">Anggota Humas</p>
        </div>
    </div>

    <!-- Bidang Dokumentasi -->
    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Bidang Dokumentasi</h4>
    <div class="member-grid grid-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="100"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/royyan_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/royyan.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/royyan.jpg') }}"
                    alt="Royyan"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Royyan</h5>
            <p class="member-position">Anggota Dokumentasi</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="200"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/fathir_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/fathir.jpg') }}'">
            <div class="member-photo">
                <img
                    src="{{ asset('images/profile/fathir.jpg') }}"
                    alt="Fathir"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';"
                >
            </div>
            <h5 class="member-name">Fathir</h5>
            <p class="member-position">Anggota Dokumentasi</p>
        </div>
    </div>

    <!-- Bidang Sarana dan Prasarana -->
    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Bidang Sarana dan Prasarana</h4>
    <div class="member-grid grid-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="100"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/rangga_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/rangga.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/rangga.jpg') }}" alt="Rangga" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Rangga</h5>
            <p class="member-position">Anggota Sarpras</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="200"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/satrio_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/satrio.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/satrio.jpg') }}" alt="Satrio" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Satrio</h5>
            <p class="member-position">Anggota Sarpras</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="300"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/putri_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/putri.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/putri.jpg') }}" alt="Putri" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Putri</h5>
            <p class="member-position">Anggota Sarpras</p>
        </div>
        <div class="member-card"
            data-aos="zoom-in"
            data-aos-duration="800"
            data-aos-delay="400"
            onmouseover="this.querySelector('img').src='{{ asset('images/profile/intan_hover.jpg') }}'"
            onmouseout="this.querySelector('img').src='{{ asset('images/profile/intan.jpg') }}'">
            <div class="member-photo">
                <img src="{{ asset('images/profile/intan.jpg') }}" alt="Intan" onerror="this.style.display='none'; this.parentNode.innerHTML='Foto belum tersedia';">
            </div>
            <h5 class="member-name">Intan</h5>
            <p class="member-position">Anggota Sarpras</p>
        </div>
    </div>

    <div style="padding-bottom: 60px;"></div>
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        offset: 50,
        easing: 'ease-out-cubic',
        duration: 800
    });

    // Add interactive hover effects
    document.addEventListener('DOMContentLoaded', function() {
        const memberCards = document.querySelectorAll('.member-card');
        
        memberCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add parallax effect to header
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const header = document.querySelector('.header');
            if (header) {
                header.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add click animation
        memberCards.forEach(card => {
            card.addEventListener('click', function() {
                this.style.animation = 'pulse 0.6s ease';
                setTimeout(() => {
                    this.style.animation = '';
                }, 600);
            });
        });
    });
</script>

<style>
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
</style>
@endpush