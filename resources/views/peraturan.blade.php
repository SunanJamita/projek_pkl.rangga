@extends('layouts.app')

@section('title', 'Peraturan - Inspektorat Kota Tasikmalaya')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, rgba(16, 85, 201, 0.9), rgba(118, 75, 162, 0.9)),
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

    .regulations-container {
        padding: 4rem 0;
    }

    .regulation-categories {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .category-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
        border: 1px solid #f0f0f0;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .category-icon {
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

    .category-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .category-count {
        color: #1055C9;
        font-weight: 500;
        margin-bottom: 1.5rem;
    }

    .category-btn {
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .category-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(16, 85, 201, 0.3);
        color: white;
        text-decoration: none;
    }

    .search-section {
        background: #f8f9fa;
        padding: 3rem 0;
        margin-bottom: 4rem;
        border-radius: 20px;
    }

    .search-container {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
    }

    .search-title {
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .search-subtitle {
        color: #666;
        margin-bottom: 2rem;
    }

    .search-form {
        display: flex;
        gap: 1rem;
        max-width: 400px;
        margin: 0 auto;
    }

    .search-input {
        flex: 1;
        padding: 1rem 1.5rem;
        border: 2px solid #e8ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #1055C9;
        box-shadow: 0 0 0 3px rgba(16, 85, 201, 0.1);
    }

    .search-btn {
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(16, 85, 201, 0.3);
    }

    .regulations-list {
        margin-bottom: 4rem;
    }

    .list-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 3rem;
        text-align: center;
    }

    .regulation-item {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-left: 4px solid #1055C9;
    }

    .regulation-item:hover {
        transform: translateX(10px);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .regulation-header {
        display: flex;
        justify-content: between;
        align-items: flex-start;
        gap: 2rem;
        margin-bottom: 1rem;
    }

    .regulation-info {
        flex: 1;
    }

    .regulation-number {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1055C9;
        margin-bottom: 0.5rem;
    }

    .regulation-title-item {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .regulation-date {
        color: #666;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .regulation-actions {
        display: flex;
        gap: 1rem;
        flex-shrink: 0;
    }

    .action-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-view {
        background: rgba(16, 85, 201, 0.1);
        color: #1055C9;
    }

    .btn-download {
        background: rgba(34, 197, 94, 0.1);
        color: #1055C9;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .btn-view:hover {
        background: #1055C9;
        color: white;
        text-decoration: none;
    }

    .btn-download:hover {
        background: #1055C9;
        color: white;
        text-decoration: none;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 3rem;
    }

    .page-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: #666;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid #e8ecef;
    }

    .page-btn:hover,
    .page-btn.active {
        background: linear-gradient(135deg, #1055C9, #0c4a9c);
        color: white;
        border-color: transparent;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }
        
        .search-form {
            flex-direction: column;
            max-width: 100%;
        }
        
        .regulation-header {
            flex-direction: column;
            gap: 1rem;
        }
        
        .regulation-actions {
            justify-content: flex-start;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title" data-aos="fade-up">Peraturan</h1>
        <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;" data-aos="fade-up" data-aos-delay="200">
            Kumpulan peraturan perundang-undangan yang menjadi dasar hukum pelaksanaan tugas dan fungsi Inspektorat
        </p>
    </div>
</section>

<!-- Search Section -->
<section class="regulations-container">
    <div class="container">
        <div class="search-section" data-aos="fade-up">
            <div class="search-container">
                <h2 class="search-title">Cari Peraturan</h2>
                <p class="search-subtitle">Temukan peraturan yang Anda butuhkan dengan mudah</p>
                <form class="search-form">
                    <input type="text" class="search-input" placeholder="Masukkan kata kunci...">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Categories -->
        <div class="regulation-categories">
            <div class="category-card" data-aos="fade-up" data-aos-delay="100">
                <div class="category-icon">
                    <i class="fas fa-gavel"></i>
                </div>
                <h3 class="category-title">Undang-Undang</h3>
                <p class="category-count">15 Dokumen</p>
                <a href="#undang-undang" class="category-btn">Lihat Semua</a>
            </div>

            <div class="category-card" data-aos="fade-up" data-aos-delay="200">
                <div class="category-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="category-title">Peraturan Pemerintah</h3>
                <p class="category-count">23 Dokumen</p>
                <a href="#pp" class="category-btn">Lihat Semua</a>
            </div>

            <div class="category-card" data-aos="fade-up" data-aos-delay="300">
                <div class="category-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h3 class="category-title">Peraturan Menteri</h3>
                <p class="category-count">18 Dokumen</p>
                <a href="#permen" class="category-btn">Lihat Semua</a>
            </div>

            <div class="category-card" data-aos="fade-up" data-aos-delay="400">
                <div class="category-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3 class="category-title">Peraturan Daerah</h3>
                <p class="category-count">31 Dokumen</p>
                <a href="#perda" class="category-btn">Lihat Semua</a>
            </div>

            <div class="category-card" data-aos="fade-up" data-aos-delay="500">
                <div class="category-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3 class="category-title">Peraturan Wali Kota</h3>
                <p class="category-count">42 Dokumen</p>
                <a href="#perwali" class="category-btn">Lihat Semua</a>
            </div>

            <div class="category-card" data-aos="fade-up" data-aos-delay="600">
                <div class="category-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="category-title">SOP & Petunjuk Teknis</h3>
                <p class="category-count">27 Dokumen</p>
                <a href="#sop" class="category-btn">Lihat Semua</a>
            </div>
        </div>

        <!-- Regulations List -->
        <div class="regulations-list">
            <h2 class="list-title" data-aos="fade-up">Peraturan Terbaru</h2>

            <div class="regulation-item" data-aos="fade-up" data-aos-delay="100">
                <div class="regulation-header">
                    <div class="regulation-info">
                        <div class="regulation-number">Peraturan Wali Kota Tasikmalaya Nomor 45 Tahun 2025</div>
                        <h3 class="regulation-title-item">Tentang Sistem Pengendalian Intern Pemerintah di Lingkungan Pemerintah Kota Tasikmalaya</h3>
                        <div class="regulation-date">
                            <i class="fas fa-calendar"></i> 15 Januari 2025
                        </div>
                    </div>
                    <div class="regulation-actions">
                        <a href="#" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="#" class="action-btn btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                </div>
            </div>

            <div class="regulation-item" data-aos="fade-up" data-aos-delay="200">
                <div class="regulation-header">
                    <div class="regulation-info">
                        <div class="regulation-number">Peraturan Menteri Dalam Negeri Nomor 78 Tahun 2024</div>
                        <h3 class="regulation-title-item">Tentang Petunjuk Teknis Pelaksanaan Pengawasan Internal di Pemerintah Daerah</h3>
                        <div class="regulation-date">
                            <i class="fas fa-calendar"></i> 20 Desember 2024
                        </div>
                    </div>
                    <div class="regulation-actions">
                        <a href="#" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="#" class="action-btn btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                </div>
            </div>

            <div class="regulation-item" data-aos="fade-up" data-aos-delay="300">
                <div class="regulation-header">
                    <div class="regulation-info">
                        <div class="regulation-number">Peraturan Pemerintah Nomor 58 Tahun 2024</div>
                        <h3 class="regulation-title-item">Tentang Standar Akuntabilitas Kinerja Instansi Pemerintah</h3>
                        <div class="regulation-date">
                            <i class="fas fa-calendar"></i> 10 November 2024
                        </div>
                    </div>
                    <div class="regulation-actions">
                        <a href="#" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="#" class="action-btn btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                </div>
            </div>

            <div class="regulation-item" data-aos="fade-up" data-aos-delay="400">
                <div class="regulation-header">
                    <div class="regulation-info">
                        <div class="regulation-number">Undang-Undang Nomor 23 Tahun 2024</div>
                        <h3 class="regulation-title-item">Tentang Pencegahan dan Pemberantasan Tindak Pidana Korupsi</h3>
                        <div class="regulation-date">
                            <i class="fas fa-calendar"></i> 25 Oktober 2024
                        </div>
                    </div>
                    <div class="regulation-actions">
                        <a href="#" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="#" class="action-btn btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                </div>
            </div>

            <div class="regulation-item" data-aos="fade-up" data-aos-delay="500">
                <div class="regulation-header">
                    <div class="regulation-info">
                        <div class="regulation-number">Peraturan Daerah Kota Tasikmalaya Nomor 12 Tahun 2024</div>
                        <h3 class="regulation-title-item">Tentang Transparansi dan Akuntabilitas Pengelolaan Keuangan Daerah</h3>
                        <div class="regulation-date">
                            <i class="fas fa-calendar"></i> 15 September 2024
                        </div>
                    </div>
                    <div class="regulation-actions">
                        <a href="#" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="#" class="action-btn btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                </div>
            </div>

            <div class="regulation-item" data-aos="fade-up" data-aos-delay="600">
                <div class="regulation-header">
                    <div class="regulation-info">
                        <div class="regulation-number">Peraturan Wali Kota Tasikmalaya Nomor 33 Tahun 2024</div>
                        <h3 class="regulation-title-item">Tentang Standar Operating Procedure (SOP) Pengaduan Masyarakat</h3>
                        <div class="regulation-date">
                            <i class="fas fa-calendar"></i> 05 Agustus 2024
                        </div>
                    </div>
                    <div class="regulation-actions">
                        <a href="#" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="#" class="action-btn btn-download">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination" data-aos="fade-up">
            <a href="#" class="page-btn"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="page-btn active">1</a>
            <a href="#" class="page-btn">2</a>
            <a href="#" class="page-btn">3</a>
            <a href="#" class="page-btn">4</a>
            <a href="#" class="page-btn"><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Search functionality
    document.querySelector('.search-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const searchTerm = document.querySelector('.search-input').value;
        
        // Filter regulations based on search term
        const regulations = document.querySelectorAll('.regulation-item');
        
        regulations.forEach(regulation => {
            const title = regulation.querySelector('.regulation-title-item').textContent.toLowerCase();
            const number = regulation.querySelector('.regulation-number').textContent.toLowerCase();
            
            if (title.includes(searchTerm.toLowerCase()) || number.includes(searchTerm.toLowerCase())) {
                regulation.style.display = 'block';
            } else {
                regulation.style.display = 'none';
            }
        });
    });

    // Category navigation
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const targetCategory = this.getAttribute('href').replace('#', '');
            
            // Scroll to regulations list
            document.querySelector('.regulations-list').scrollIntoView({
                behavior: 'smooth'
            });
            
            // Filter by category (this would be implemented with backend filtering in a real application)
            console.log('Filter by category:', targetCategory);
        });
    });
</script>
@endpush
