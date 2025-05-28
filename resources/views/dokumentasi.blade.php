@extends('layouts.master')
@section('title', 'Dokumentasi Kegiatan Dewan Ambalan 2024')
@section('content')
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .btn-more {
        display: inline-block;
        margin: 40px auto 60px auto;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 15px 25px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        backdrop-filter: blur(10px);
        z-index: 1000;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        width: fit-content;
    }

    .btn-more:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
        color: white;
    }

    .btn-more i {
        margin-left: 10px;
        transition: transform 0.3s ease;
    }

    .btn-more:hover i {
        transform: translateX(4px);
    }
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
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInDown 1s ease forwards;
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
.section-title {
    font-size: 2.2rem;
    font-weight: 600;
    text-align: center;
    margin: 60px 0 40px;
    position: relative;
    color: white;
    opacity: 0;
    transform: translateY(20px);
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
.photo-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-top: 40px;
}
.photo-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    aspect-ratio: 16/9;
    position: relative;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}
.photo-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
}
.photo-card img {
    width: 100%;
    height: 250px; /* Fixed height */
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}
.photo-card.loaded {
    opacity: 1;
    transform: translateY(0);
}
.photo-card:hover img {
    transform: scale(1.1);
}
.photo-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.8s ease;
}
.photo-card:hover::after {
    left: 100%;
}
.btn-more {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease forwards;
    animation-delay: 0.5s;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Custom Animation Keyframes */
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

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 15px;
        text-align: center;
        transform: translateY(100%);
        transition: transform 0.3s ease;
        font-weight: 500;
        backdrop-filter: blur(5px);
    }

    .photo-card:hover .caption {
        transform: translateY(0);
    }

@media (max-width: 768px) {
    .photo-gallery {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

<div class="button-wrapper">
    <a href="{{ url('/') }}" class="back-btn">
        <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
</div>

<div class="header">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo DA" style="width: 80px; height: auto; margin-bottom: 20px;">
    </div>
    <h1 class="main-title">Dokumentasi Kegiatan Dewan Ambalan 2024</h1>
    <p class="subtitle">Berikut adalah rangkaian kegiatan yang telah dilaksanakan oleh Dewan Ambalan tahun 2024-2025.</p>
</div>

<div class="container mt-5">
    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Kegiatan Internal</h4>
    <div class="photo-gallery" data-aos="fade-up" data-aos-duration="1000">
        <!-- Foto Kegiatan 1 -->
        <div class="photo-card">
            <img src="{{ asset('images/kegiatan/latihan rutin.jpg') }}" alt="Foto Kegiatan 1" onerror="this.style.display='none'; this.parentNode.innerHTML='<div class=\'caption\'>Foto belum tersedia</div>';">
            <div class="caption">Latihan Rutin</div>
        </div>
        <!-- Foto Kegiatan 2 -->
        <div class="photo-card">
            <img src="{{ asset('images/kegiatan/rapat.jpg') }}" alt="Foto Kegiatan 2" onerror="this.style.display='none'; this.parentNode.innerHTML='<div class=\'caption\'>Foto belum tersedia</div>';">
            <div class="caption">Rapat Pengurus Harian</div>
        </div>
        <!-- Foto Kegiatan 3 -->
        <div class="photo-card">
            <img src="{{ asset('images/kegiatan/anggota baru.jpg') }}" alt="Foto Kegiatan 3" onerror="this.style.display='none'; this.parentNode.innerHTML='<div class=\'caption\'>Foto belum tersedia</div>';">
            <div class="caption">Pelatihan Kepemimpinan Anggota Baru</div>
        </div>
    </div>

    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">Kegiatan Eksternal</h4>
    <div class="photo-gallery" data-aos="fade-up" data-aos-duration="1000">
        <!-- Foto Kegiatan 4 -->
        <div class="photo-card">
            <img src="{{ asset('images/kegiatan/sosialisasi.jpg') }}" alt="Foto Kegiatan 4" onerror="this.style.display='none'; this.parentNode.innerHTML='<div class=\'caption\'>Foto belum tersedia</div>';">
            <div class="caption">Sosialisasi</div>
        </div>
        <!-- Foto Kegiatan 5 -->
        <div class="photo-card">
            <img src="{{ asset('images/kegiatan/hari peringatan.jpg') }}" alt="Foto Kegiatan 5" onerror="this.style.display='none'; this.parentNode.innerHTML='<div class=\'caption\'>Foto belum tersedia</div>';">
            <div class="caption">Pekan Peringatan Hari Pramuka</div>
        </div>
        <!-- Foto Kegiatan 6 -->
        <div class="photo-card">
            <img src="{{ asset('images/kegiatan/perjusa.jpg') }}" alt="Foto Kegiatan 6" onerror="this.style.display='none'; this.parentNode.innerHTML='<div class=\'caption\'>Foto belum tersedia</div>';">
            <div class="caption">Perjusa</div>
        </div>
    </div>
</div>
<br><br><br>
<a href="https://drive.google.com/drive/folders/1gLi3kS3ntGgM_Onin6SRghaYJp0kf7DO" class="btn-more">
    Lihat Selengkapnya <i class="fas fa-arrow-right ms-2"></i> 
</a>
@endsection

@push('scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        offset: 50,
        delay: 200,
        once: true,
        easing: 'ease-out-cubic'
    });

    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.photo-card img');
        
        // Add stagger effect to photo cards
        images.forEach((img, index) => {
            const card = img.parentElement;
            card.style.transitionDelay = `${index * 100}ms`;
            
            img.onload = function() {
                card.classList.add('loaded');
            }
            
            if (img.complete) {
                card.classList.add('loaded');
            }
        });

        // Animate section titles when they come into view
        const sectionTitles = document.querySelectorAll('.section-title');
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const titleObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease forwards';
                    titleObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        sectionTitles.forEach(title => titleObserver.observe(title));
    });

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush