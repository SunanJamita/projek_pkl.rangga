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
                <a href="{{ route('home') }}" class="logo">
                <div class="logo-img" style="background: linear-gradient(135deg, #FFD700 0%, #FFA500 50%, #FF8C00 100%); border: 3px solid #1055C9; border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%; position: relative; overflow: hidden; box-shadow: 0 2px 8px rgba(16, 85, 201, 0.3);">
                    <!-- Sky background -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 60%; background: linear-gradient(180deg, #87CEEB, #4682B4);"></div>
                    <!-- Mountains -->
                    <div style="position: absolute; top: 35%; left: 10%; width: 80%; height: 25%; background: linear-gradient(45deg, #228B22, #32CD32); clip-path: polygon(0% 100%, 30% 0%, 60% 40%, 100% 100%);"></div>
                    <!-- Building/City -->
                    <div style="position: absolute; bottom: 25%; left: 25%; width: 50%; height: 20%; background: #1055C9; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-building" style="color: white; font-size: 12px;"></i>
                    </div>
                    <!-- Traditional pattern at bottom -->
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 25%; background: repeating-linear-gradient(90deg, #FFD700 0px, #FFD700 4px, #FFA500 4px, #FFA500 8px);"></div>
                </div>
                <div class="logo-text">
                    <div style="font-size: 0.85rem; line-height: 1.1;">INSPEKTORAT</div>
                    <div style="font-size: 0.75rem; color: #1055C9;">KOTA TASIKMALAYA</div>
                </div>
            </a>Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global outline fix untuk semua button dan link */
        button, a, input, select, textarea {
            outline: none !important;
        }

        button:focus, a:focus {
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(16, 85, 201, 0.3) !important;
        }

        *:focus {
            outline: none !important;
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

        .nav-item.dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 200px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 1rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #555;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: none;
            background: none;
        }

        .dropdown-item:hover {
            background: rgba(16, 85, 201, 0.1);
            color: #1055C9;
            padding-left: 2rem;
        }

        .dropdown-item i {
            width: 16px;
            margin-right: 0.5rem;
            font-size: 0.8rem;
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1.2rem;
            color: #ecf0f1;
            font-weight: 600;
        }

        .footer-section p,
        .footer-section a {
            color: #bdc3c7;
            line-height: 1.7;
            text-decoration: none;
            margin-bottom: 0.6rem;
            display: block;
            font-size: 0.95rem;
        }

        .footer-section a:hover {
            color: #1055C9;
            transition: color 0.3s ease;
        }

        .contact-info {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .contact-info i {
            color: #1055C9;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            margin-top: 0.1rem;
            flex-shrink: 0;
        }

        .contact-info span {
            flex: 1;
            word-break: break-word;
        }

        .social-links {
            display: flex;
            gap: 0.6rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .social-link {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #1055C9, #0c4a9c);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            padding: 0;
            outline: none;
            border: none;
        }

        .social-link:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 85, 201, 0.3);
        }

        .social-link:active {
            transform: translateY(-1px);
            outline: none;
        }

        .social-link i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .social-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 85, 201, 0.3);
            color: white;
            text-decoration: none;
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
                gap: 2rem;
            }
            
            .footer-section {
                max-width: 400px;
                margin: 0 auto;
            }
            
            .contact-info {
                justify-content: center;
                text-align: left;
                max-width: 300px;
                margin: 0 auto 1rem;
            }

            .social-links {
                justify-content: center;
            }
            
            .footer-container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .footer-content {
                gap: 1.5rem;
            }
            
            .footer-section h3 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }
            
            .footer-section p,
            .footer-section a {
                font-size: 0.9rem;
            }
            
            .contact-info {
                gap: 0.6rem;
                margin-bottom: 0.8rem;
            }
            
            .contact-info i {
                font-size: 0.8rem;
                width: 16px;
                height: 16px;
            }
            
            .social-links {
                gap: 0.5rem;
            }
            
            .social-link {
                width: 32px;
                height: 32px;
                font-size: 0.75rem;
                border-radius: 6px;
            }
            
            .footer-bottom {
                font-size: 0.85rem;
                padding-top: 1.5rem;
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
                    <!-- Logo Kota Tasikmalaya menggunakan FontAwesome icon sebagai placeholder -->
                    <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #FFD700, #FFA500); border: 2px solid #1055C9; border-radius: 8px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                        <i class="fas fa-shield-alt" style="color: #1055C9; font-size: 18px;"></i>
                    </div>
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
                <li class="nav-item dropdown">
                    <a href="{{ route('tentang-kami') }}" class="nav-link {{ request()->routeIs('tentang-kami*') || request()->routeIs('sejarah') || request()->routeIs('tupoksi') || request()->routeIs('struktur') || request()->routeIs('dukungan') || request()->routeIs('statistik') || request()->routeIs('survey') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Tentang Kami <i class="fas fa-chevron-down" style="font-size: 0.7rem; margin-left: 0.3rem;"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('tentang-kami') }}" class="dropdown-item {{ request()->routeIs('tentang-kami') ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i> Profil
                        </a>
                        <a href="{{ route('sejarah') }}" class="dropdown-item {{ request()->routeIs('sejarah') ? 'active' : '' }}">
                            <i class="fas fa-history"></i> Sejarah
                        </a>
                        <a href="{{ route('tupoksi') }}" class="dropdown-item {{ request()->routeIs('tupoksi') ? 'active' : '' }}">
                            <i class="fas fa-tasks"></i> Tupoksi
                        </a>
                        <a href="{{ route('struktur') }}" class="dropdown-item {{ request()->routeIs('struktur') ? 'active' : '' }}">
                            <i class="fas fa-sitemap"></i> Struktur Organisasi
                        </a>
                        <a href="{{ route('dukungan') }}" class="dropdown-item {{ request()->routeIs('dukungan') ? 'active' : '' }}">
                            <i class="fas fa-hands-helping"></i> Dukungan
                        </a>
                        <a href="{{ route('statistik') }}" class="dropdown-item {{ request()->routeIs('statistik') ? 'active' : '' }}">
                            <i class="fas fa-chart-bar"></i> Statistik
                        </a>
                        <a href="{{ route('survey') }}" class="dropdown-item {{ request()->routeIs('survey') ? 'active' : '' }}">
                            <i class="fas fa-poll"></i> Survey
                        </a>
                    </div>
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
                        <span>Jl. Letnan Harun No. 1, Sukamulya, Kec. Bungursari, Tasikmalaya, Jawa Barat 46151</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>(0265) 331548</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-fax"></i>
                        <span>(0265) 331549</span>
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

        // Fix social media links blur issue
        document.querySelectorAll('.social-link, .social-btn').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                this.blur();
                
                // Here you can add actual social media links
                const platform = this.querySelector('i').className;
                if (platform.includes('fa-facebook')) {
                    window.open('https://facebook.com/inspektorat.tasikmalaya', '_blank');
                } else if (platform.includes('fa-twitter')) {
                    window.open('https://twitter.com/inspektorat_tsk', '_blank');
                } else if (platform.includes('fa-instagram')) {
                    window.open('https://instagram.com/inspektorat.tasikmalaya', '_blank');
                } else if (platform.includes('fa-youtube')) {
                    window.open('https://youtube.com/@inspektorattasikmalaya', '_blank');
                }
            });
            
            link.addEventListener('mousedown', function(e) {
                e.preventDefault();
            });
            
            link.addEventListener('focus', function() {
                this.style.outline = 'none';
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
