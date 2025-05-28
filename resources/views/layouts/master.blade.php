<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seleksi DA 2025')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #650096 0%, #8e44ad 100%);
            background-image: url('{{ asset("images/background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            z-index: -2;
        }

        .bg-fade {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
            z-index: -1;
        }

        .floating-shape {
            position: fixed;
            opacity: 0.1;
            z-index: -1;
        }

        .shape-1 {
            top: 10%;
            left: 5%;
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.1);
            border-radius: 20px;
            animation: float1 6s ease-in-out infinite;
        }

        .shape-2 {
            top: 20%;
            right: 10%;
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float2 8s ease-in-out infinite;
        }

        .shape-3 {
            bottom: 15%;
            right: 8%;
            width: 100px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 20px;
            animation: float3 7s ease-in-out infinite;
        }

        .shape-4 {
            bottom: 25%;
            left: 10%;
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            transform: rotate(45deg);
            animation: float4 5s ease-in-out infinite;
        }

        @keyframes float1 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translateX(0px) translateY(0px); }
            50% { transform: translateX(15px) translateY(-15px); }
        }

        @keyframes float3 {
            0%, 100% { transform: translateX(0px) scale(1); }
            50% { transform: translateX(-10px) scale(1.1); }
        }

        @keyframes float4 {
            0%, 100% { transform: rotate(45deg) translateY(0px); }
            50% { transform: rotate(65deg) translateY(-10px); }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .header {
            text-align: center;
            padding: 40px 0;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .main-content {
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 100%;
            max-width: 500px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .input-group input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #ff6b6b;
        }

        .btn-primary:hover {
            background: #ff5252;
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: rgba(255, 107, 107, 0.2);
            border: 1px solid rgba(255, 107, 107, 0.3);
            color: #ffcdd2;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .card {
                padding: 30px 20px;
                margin: 20px;
            }
            
            .container {
                padding: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header p {
                font-size: 1rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="bg-overlay"></div>
    <div class="bg-fade"></div>
    
    <!-- Floating Shapes -->
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>

    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>