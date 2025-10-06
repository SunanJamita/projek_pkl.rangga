@extends('layouts.app')

@section('title', 'Kontak - Inspektorat Kota Tasikmalaya')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, rgba(16, 85, 201, 0.9), rgba(12, 74, 156, 0.9)),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300"><polygon fill="%23ffffff15" points="0,0 1000,100 1000,300 0,200"/></svg>');
        background-size: cover;
        color: white;
        padding: 8rem 0 4rem;
        text-align: center;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .contact-container {
        padding: 4rem 0;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        margin-bottom: 4rem;
    }

    .contact-info {
        padding: 2rem 0;
    }

    .contact-info h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 2rem;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
        padding: 1.5rem;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .contact-details h4 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .contact-details p {
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    .contact-details a {
        color: #1055C9;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .contact-details a:hover {
        color: #5a6fd8;
    }

    .contact-form {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        text-align: center;
    }

    .form-subtitle {
        color: #666;
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 1rem 1.5rem;
        border: 2px solid #e8ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #1055C9;
        box-shadow: 0 0 0 3px rgba(16, 85, 201, 0.1);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-btn {
        width: 100%;
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(16, 85, 201, 0.3);
    }

    .map-section {
        background: #f8f9fa;
        padding: 4rem 0;
        margin-top: 2rem;
        border-radius: 20px;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 3rem;
    }

    .map-container {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        font-size: 1.2rem;
    }

    .office-hours {
        margin-top: 4rem;
    }

    .hours-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .hours-card {
        background: white;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .hours-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
    }

    .hours-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .hours-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 2rem;
    }

    .hours-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .hours-schedule {
        color: #666;
        line-height: 1.8;
    }

    .hours-schedule strong {
        color: #2c3e50;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 0.6rem;
        margin-top: 3rem;
    }

    .social-btn {
        width: 42px;
        height: 42px;
        background: white;
        border: 2px solid #e8ecef;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
        outline: none;
    }

    .social-btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(16, 85, 201, 0.3);
    }

    .social-btn:active {
        transform: translateY(-1px);
        outline: none;
    }

    .social-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        color: white;
        text-decoration: none;
    }

    .social-btn.facebook:hover {
        background: #3b5998;
        border-color: #3b5998;
    }

    .social-btn.instagram:hover {
        background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
        border-color: transparent;
    }

    .social-btn.youtube:hover {
        background: #ff0000;
        border-color: #ff0000;
    }

    .social-btn.twitter:hover {
        background: #1da1f2;
        border-color: #1da1f2;
    }

    .quick-contact {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        margin-top: 4rem;
        text-align: center;
    }

    .quick-contact h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .quick-contact p {
        color: #666;
        margin-bottom: 2rem;
    }

    .quick-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .quick-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-whatsapp {
        background: #25d366;
        color: white;
    }

    .btn-email {
        background: #dc3545;
        color: white;
    }

    .btn-phone {
        background: #007bff;
        color: white;
    }

    .quick-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        color: white;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }
        
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .contact-form {
            padding: 2rem;
        }
        
        .quick-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .quick-btn {
            width: 100%;
            max-width: 250px;
            justify-content: center;
        }
        
        .social-links {
            gap: 0.5rem;
        }
        
        .social-btn {
            width: 36px;
            height: 36px;
            font-size: 0.9rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title" data-aos="fade-up">Hubungi Kami</h1>
        <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;" data-aos="fade-up" data-aos-delay="200">
            Kami siap melayani dan menerima masukan dari masyarakat untuk peningkatan pelayanan publik
        </p>
    </div>
</section>

<!-- Contact Container -->
<section class="contact-container">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Information -->
            <div class="contact-info">
                <h2 data-aos="fade-up">Informasi Kontak</h2>
                
                <div class="contact-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Alamat Kantor</h4>
                        <p>Jl. Letnan Harun No. 1, Sukamulya<br>
                        Kec. Bungursari<br>
                        Tasikmalaya, Jawa Barat 46151</p>
                    </div>
                </div>

                <div class="contact-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Telepon</h4>
                        <p><a href="tel:+62265331548">(0265) 331-548</a></p>
                    </div>
                </div>

                <div class="contact-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-icon">
                        <i class="fas fa-fax"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Fax</h4>
                        <p>(0265) 331-549</p>
                    </div>
                </div>
                    <div class="contact-details">
                        <h4>Fax</h4>
                        <p>(0265) 331-466</p>
                    </div>
                </div>

                <div class="contact-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Email</h4>
                        <p><a href="mailto:inspektorat@tasikmalayakota.go.id">inspektorat@tasikmalayakota.go.id</a><br>
                        <a href="mailto:pengaduan@tasikmalayakota.go.id">pengaduan@tasikmalayakota.go.id</a></p>
                    </div>
                </div>

                <div class="contact-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="contact-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="contact-details">
                        <h4>Website</h4>
                        <p><a href="https://inspektorat.tasikmalayakota.go.id" target="_blank">inspektorat.tasikmalayakota.go.id</a></p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form" data-aos="fade-up" data-aos-delay="200">
                <h3 class="form-title">Kirim Pesan</h3>
                <p class="form-subtitle">Silakan isi formulir di bawah ini untuk menghubungi kami</p>

                <form id="contactForm">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Masukkan alamat email Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="Masukkan nomor telepon Anda">
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">Subjek</label>
                        <select id="subject" name="subject" class="form-select" required>
                            <option value="">Pilih subjek pesan</option>
                            <option value="pengaduan">Pengaduan</option>
                            <option value="informasi">Permintaan Informasi</option>
                            <option value="saran">Saran dan Masukan</option>
                            <option value="kerjasama">Kerjasama</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="form-btn">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- Office Hours -->
        <div class="office-hours">
            <h2 class="section-title" data-aos="fade-up">Jam Pelayanan</h2>
            <div class="hours-grid">
                <div class="hours-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="hours-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="hours-title">Jam Kerja</h3>
                    <div class="hours-schedule">
                        <strong>Senin - Kamis:</strong><br>
                        08:00 - 16:00 WIB<br><br>
                        <strong>Jumat:</strong><br>
                        08:00 - 16:30 WIB
                    </div>
                </div>

                <div class="hours-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="hours-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="hours-title">Pelayanan Publik</h3>
                    <div class="hours-schedule">
                        <strong>Senin - Kamis:</strong><br>
                        08:00 - 15:00 WIB<br><br>
                        <strong>Jumat:</strong><br>
                        08:00 - 15:30 WIB
                    </div>
                </div>

                <div class="hours-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="hours-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="hours-title">Hotline Pengaduan</h3>
                    <div class="hours-schedule">
                        <strong>24 Jam:</strong><br>
                        Setiap hari<br><br>
                        <strong>Call Center:</strong><br>
                        0800-1-234-5678
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Contact -->
        <div class="quick-contact" data-aos="fade-up">
            <h3>Kontak Cepat</h3>
            <p>Hubungi kami melalui platform berikut untuk respon yang lebih cepat</p>
            <div class="quick-buttons">
                <a href="https://wa.me/6285123456789" class="quick-btn btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="mailto:inspektorat@tasikmalayakota.go.id" class="quick-btn btn-email">
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="tel:+62265331433" class="quick-btn btn-phone">
                    <i class="fas fa-phone"></i> Telepon
                </a>
            </div>

            <!-- Social Media Links -->
            <div class="social-links">
                <a href="#" class="social-btn facebook" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn instagram" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-btn youtube" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="social-btn twitter" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Lokasi Kantor</h2>
        <div class="map-container" data-aos="fade-up" data-aos-delay="200">
            <div style="text-align: center;">
                <i class="fas fa-map-marked-alt" style="font-size: 3rem; color: #1055C9; margin-bottom: 1rem;"></i>
                <p style="margin: 0;">Peta lokasi akan ditampilkan di sini</p>
                <p style="margin: 0; font-size: 0.9rem; color: #888;">
                    Jl. Yudanegara No. 12, Kecamatan Cipedes, Kota Tasikmalaya
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        
        // Simulate form submission
        const submitBtn = this.querySelector('.form-btn');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
            alert('Terima kasih! Pesan Anda telah terkirim. Kami akan merespons dalam 24 jam.');
            this.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });

    // Form validation
    const inputs = document.querySelectorAll('.form-input, .form-select, .form-textarea');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.style.borderColor = '#dc3545';
            } else if (this.type === 'email' && this.value && !isValidEmail(this.value)) {
                this.style.borderColor = '#dc3545';
            } else {
                this.style.borderColor = '#1055C9';
            }
        });
        
        input.addEventListener('input', function() {
            this.style.borderColor = '#e8ecef';
        });
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Quick contact interactions
    document.querySelectorAll('.quick-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.href.startsWith('mailto:') || this.href.startsWith('tel:') || this.href.startsWith('https://wa.me/')) {
                // Allow default behavior for these links
                return;
            }
            e.preventDefault();
        });
    });

    // Social media link tracking and blur fix
    document.querySelectorAll('.social-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            this.blur();
            
            const platform = this.className.split(' ').find(cls => cls !== 'social-btn');
            console.log(`Social media click: ${platform}`);
            
            // Open actual social media links
            if (platform === 'facebook') {
                window.open('https://facebook.com/inspektorat.tasikmalaya', '_blank');
            } else if (platform === 'instagram') {
                window.open('https://instagram.com/inspektorat.tasikmalaya', '_blank');
            } else if (platform === 'youtube') {
                window.open('https://youtube.com/@inspektorattasikmalaya', '_blank');
            } else if (platform === 'twitter') {
                window.open('https://twitter.com/inspektorat_tsk', '_blank');
            }
        });
        
        btn.addEventListener('mousedown', function(e) {
            e.preventDefault();
        });
        
        btn.addEventListener('focus', function() {
            this.style.outline = 'none';
        });
    });
</script>
@endpush
