<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Inspektorat Kota Tasikmalaya')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 0.8rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            text-decoration: none;
            color: #2c3e50;
        }

        .logo-img {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #1055C9, #0c4a9c);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            font-weight: bold;
        }

        .logo-text {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .nav-menu {
            display: flex;
            gap: 1rem;
            align-items: center;
            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #555;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.6rem 0.8rem;
            border-radius: 8px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .nav-link i {
            font-size: 0.85rem;
            width: 16px;
            text-align: center;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #1055C9;
            background: rgba(16, 85, 201, 0.1);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            background: #1055C9;
            border-radius: 50%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #1055C9;
            cursor: pointer;
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #ecf0f1;
        }

        .footer-section p,
        .footer-section a {
            color: #bdc3c7;
            line-height: 1.8;
            text-decoration: none;
            margin-bottom: 0.5rem;
            display: block;
        }

        .footer-section a:hover {
            color: #1055C9;
        }

        .contact-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .contact-info i {
            color: #1055C9;
            width: 20px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #1055C9, #0c4a9c);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 85, 201, 0.3);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
        }

        /* Utility Classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #1055C9, #0c4a9c);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 85, 201, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #1055C9;
            color: #1055C9;
        }

        .btn-outline:hover {
            background: #1055C9;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 1rem;
            }
            
            .logo-text {
                font-size: 1rem;
            }
            
            .logo-text div:first-child {
                font-size: 0.8rem !important;
            }
            
            .logo-text div:last-child {
                font-size: 0.7rem !important;
            }
            
            .nav-menu {
                position: fixed;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 2rem;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                gap: 0.5rem;
            }

            .nav-menu.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .nav-link {
                padding: 0.8rem 1rem;
                width: 100%;
                justify-content: flex-start;
                font-size: 1rem;
            }
            
            .nav-link i {
                font-size: 1rem;
                width: 20px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .social-links {
                justify-content: center;
            }
        }

        @media (max-width: 1024px) {
            .nav-menu {
                gap: 0.8rem;
            }
            
            .nav-link {
                padding: 0.5rem 0.6rem;
                font-size: 0.85rem;
            }
            
            .nav-link i {
                font-size: 0.8rem;
            }
        }

        /* Page Content */
        .page-content {
            padding-top: 85px;
            min-height: calc(100vh - 85px);
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-img">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="logo-text">
                    <div style="font-size: 0.85rem; line-height: 1.1;">INSPEKTORAT</div>
                    <div style="font-size: 0.75rem; color: #1055C9;">KOTA TASIKMALAYA</div>
                </div>
            </a>

            <ul class="nav-menu" id="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tentang-kami') }}" class="nav-link {{ request()->routeIs('tentang-kami') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Tentang Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita.index') }}" class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i> Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peraturan') }}" class="nav-link {{ request()->routeIs('peraturan') ? 'active' : '' }}">
                        <i class="fas fa-gavel"></i> Peraturan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galeri') }}" class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}">
                        <i class="fas fa-images"></i> Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sakip') }}" class="nav-link {{ request()->routeIs('sakip') ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i> SAKIP
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                        <i class="fas fa-phone"></i> Kontak
                    </a>
                </li>
            </ul>

            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="page-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Inspektorat Kota Tasikmalaya</h3>
                    <p>Inspektorat Kota Tasikmalaya berkomitmen untuk mengawal kinerja berintegritas dan meningkatkan tata kelola pemerintahan yang baik dan bersih.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Menu Utama</h3>
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    <a href="{{ route('berita.index') }}">Berita</a>
                    <a href="{{ route('peraturan') }}">Peraturan</a>
                    <a href="{{ route('galeri') }}">Galeri</a>
                    <a href="{{ route('sakip') }}">SAKIP</a>
                </div>

                <div class="footer-section">
                    <h3>Layanan</h3>
                    <a href="#">Quality Assurance</a>
                    <a href="#">Consulting Activity</a>
                    <a href="#">Accountability</a>
                    <a href="#">Lapor Gratifikasi</a>
                    <a href="#">Whistleblowing System</a>
                </div>

                <div class="footer-section">
                    <h3>Kontak Kami</h3>
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Let. Harun, Bungursari, Tasikmalaya, Jawa Barat 46151</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>(0265) 7521453</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>inspektorat@tasikmalayakota.go.id</span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Inspektorat Kota Tasikmalaya. All Rights Reserved. | Developed by Team Diskominfo</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const navMenu = document.getElementById('nav-menu');

        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileMenuBtn.querySelector('i');
            if (navMenu.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
