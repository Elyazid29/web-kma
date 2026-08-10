<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KMA XXV 2026 - Konvensi Mutu ANTAM</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css?v=68">
</head>
<body class="presentation-mode">

  <!-- Header / Navbar -->
  <header class="header">
    <div class="container header-inner">
      <div class="logo">
        <img src="assets/img/logo.kma.png" alt="Logo KMA" class="logo-img">
        <span class="logo-text">KMA XXV 2026</span>
      </div>
      <nav class="nav">
        <div class="dropdown">
          <button class="dropbtn"><span class="arrow">▶</span> Menu</button>
          <div class="dropdown-content">
            <a href="#" onclick="goToSlide(0); return false;">1. Beranda & Countdown</a>
            <a href="#" onclick="goToSlide(1); return false;">2. Tentang KMA</a>
            <a href="#" onclick="goToSlide(2); return false;">3. Key Highlights</a>
            <a href="#" onclick="goToSlide(3); return false;">4. Penghargaan</a>
            <a href="#" onclick="goToSlide(4); return false;">5. Rangkaian Kegiatan</a>
            <a href="#" onclick="goToSlide(5); return false;">6. Lokasi & Kontak</a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Presentation Deck Container -->
  <main class="slide-deck">

    <!-- SLIDE 1 -->
    <section id="home" class="slide active hero">
      <div class="slide-scroll-wrapper">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
          <p class="hero-date animate-on-scroll">1–4 SEPTEMBER 2026 | MALANG</p>
          <h1 class="hero-title animate-on-scroll delay-100">Konvensi Mutu ANTAM (KMA) ke‑XXV <span class="text-accent">2026</span></h1>
          <p class="hero-subtitle animate-on-scroll delay-200">"25 Years of Continuous Improvement: Powering Sustainable Growth, Transforming the Future"</p>

          <!-- Hitung Mundur -->
          <div id="hitung-mundur" class="hero-countdown animate-on-scroll delay-250">
            <div class="hc-eyebrow"><span class="hc-dot"></span>MENUJU HARI-H</div>
            <div id="countdown-wrapper">
              <div class="cd-grid">
                <div class="cd-item">
                  <div class="cd-number" id="cd-days">00</div>
                  <div class="cd-label">Hari</div>
                </div>
                <div class="cd-item">
                  <div class="cd-number" id="cd-hours">00</div>
                  <div class="cd-label">Jam</div>
                </div>
                <div class="cd-item">
                  <div class="cd-number" id="cd-minutes">00</div>
                  <div class="cd-label">Menit</div>
                </div>
                <div class="cd-item">
                  <div class="cd-number" id="cd-seconds">00</div>
                  <div class="cd-label">Detik</div>
                </div>
              </div>
            </div>
          </div>

          <div class="hero-cta animate-on-scroll delay-300">
            <button onclick="goToSlide(4)" class="btn btn-outline" style="cursor: pointer;">Lihat Jadwal ›</button>
            <a href="#kontak" onclick="goToSlide(5); return false;" class="btn btn-outline">Kontak Panitia</a>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 2 -->
    <section id="tentang" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container">
          <div class="section-header animate-on-scroll">
            <h2 class="section-title">Tentang KMA XXV</h2>
            <div class="divider"></div>
          </div>
          <div class="about-text animate-on-scroll">
            <p>Konvensi Mutu ANTAM (KMA) ke-XXV Tahun 2026 adalah ajang penghargaan dan selebrasi atas dedikasi Insan ANTAM dalam melahirkan inovasi dan perbaikan berkelanjutan. KMA menjadi wadah bagi seluruh unit bisnis untuk saling berbagi gagasan demi meningkatkan efisiensi dan nilai perusahaan.</p>
            <p>Dengan tema <strong>"25 Years of Continuous Improvement: Powering Sustainable Growth, Transforming the Future"</strong>, acara ini menandai seperempat abad komitmen ANTAM terhadap budaya mutu. Perhelatan tahun ini turut dimeriahkan oleh kehadiran <strong>GOLNIX</strong>, maskot kristal emas dan nikel yang melambangkan inovasi, ketangguhan, serta arahan strategis masa depan.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 3 -->
    <section id="highlights" class="slide kh-section">
      <div class="slide-scroll-wrapper">
        <div class="container">
          <!-- Top Banner Header -->
          <div class="kh-banner animate-on-scroll">
            <div class="kh-banner-container">
              <div class="kh-banner-left">
                <div class="kh-sub-header">
                  <span class="kh-sub-text">KEY HIGHLIGHTS OF</span>
                  <span class="kh-diamond">◆</span>
                  <span class="kh-line"></span>
                </div>
                <h2 class="kh-main-title">
                  <span class="kh-title-green">KMA XXV</span><br>
                  <span class="kh-title-gold">2026</span>
                </h2>
                <div class="kh-location-badge">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  <span>KMA XXV – MALANG</span>
                </div>
              </div>
              <div class="kh-banner-right">
                <img src="assets/img/gunung2.png" alt="Gunung Malang KMA XXV" class="kh-gunung-img">
              </div>
            </div>
          </div>

          <!-- Highlight Cards Wrapper -->
          <div class="kh-cards-wrapper">

            <!-- Point 1: Launching Buku -->
            <div class="kh-card animate-on-scroll" onclick="openHighlightModal(1)">
              <div class="kh-card-text">
                <span class="kh-tag">LAUNCHING</span>
                <h3 class="kh-card-title">Buku 25 Tahun Eksplorasi &amp; Inovasi</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Merangkum perjalanan 25 tahun eksplorasi, inovasi, dan kontribusi ANTAM sebagai referensi dan dokumentasi pembelajaran.</p>
                <span class="kh-click-hint">Klik untuk detail info ›</span>
              </div>
              <div class="kh-card-img-wrap">
                <img src="assets/img/buku.jpeg" alt="Buku 25 Tahun Eksplorasi & Inovasi" class="kh-card-img">
              </div>
            </div>

            <!-- Point 2: Jingle KMA -->
            <div class="kh-card animate-on-scroll delay-100" onclick="openHighlightModal(2)">
              <div class="kh-card-text">
                <span class="kh-tag">LAUNCHING</span>
                <h3 class="kh-card-title">Jingle KMA</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Jingle resmi KMA sebagai simbol semangat kebersamaan, energi positif, dan kolaborasi insan ANTAM.</p>
                <span class="kh-click-hint">Klik untuk detail info ›</span>
              </div>
              <div class="kh-card-img-wrap">
                <img src="assets/img/music.jpg" alt="Jingle KMA" class="kh-card-img">
              </div>
            </div>

            <!-- Point 3: Maskot GOLNIX -->
            <div class="kh-card animate-on-scroll delay-200" onclick="openHighlightModal(3)">
              <div class="kh-card-text">
                <span class="kh-tag">MASKOT</span>
                <h3 class="kh-card-title">GOLNIX – Maskot KMA XXV</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Maskot GOLNIX merepresentasikan semangat inovasi, transformasi, dan continuous improvement ANTAM.</p>
                <span class="kh-click-hint">Klik untuk detail info ›</span>
              </div>
              <div class="kh-card-img-wrap kh-img-contain-wrap">
                <img src="assets/img/golnix.png" alt="Maskot GOLNIX" class="kh-card-img kh-card-img-contain">
              </div>
            </div>

            <!-- Point 4: Deep Dive Makalah -->
            <div class="kh-card animate-on-scroll delay-300" onclick="openHighlightModal(4)">
              <div class="kh-card-text">
                <span class="kh-tag">SESI KHUSUS</span>
                <h3 class="kh-card-title">Deep Dive Makalah</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Sesi interview 30 menit bersama juri untuk menggali substansi, implementasi, dan dampak nyata dari makalah peserta.</p>
                <span class="kh-click-hint">Klik untuk detail info ›</span>
              </div>
              <div class="kh-card-img-wrap">
                <img src="assets/img/makalah.jpg" alt="Deep Dive Makalah" class="kh-card-img">
              </div>
            </div>

            <!-- Point 5: GEOMIN Hackathon -->
            <div class="kh-card animate-on-scroll delay-400" onclick="openHighlightModal(5)">
              <div class="kh-card-text">
                <span class="kh-tag">KOMPETISI</span>
                <h3 class="kh-card-title">GEOMIN Hackathon</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Menjaring ide dan solusi inovatif dari kalangan akademisi untuk menjawab tantangan nyata ANTAM.</p>
                <span class="kh-click-hint">Klik untuk detail info ›</span>
              </div>
              <div class="kh-card-img-wrap kh-img-contain-wrap">
                <img src="assets/img/hackaton.png" alt="GEOMIN Hackathon" class="kh-card-img kh-card-img-contain">
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 4 -->
    <section id="penghargaan" class="slide an-section">
      <div class="slide-scroll-wrapper">
        <div class="an-hero">
          <div class="container">
            <div class="an-hero-inner">
              <div class="an-hero-text animate-on-scroll">
                <div class="an-gold-bar"></div>
                <h2 class="an-hero-title">Rekap Kategori<br><span class="an-title-green">Penghargaan Lainnya</span></h2>
                <p class="an-hero-sub">Apresiasi untuk inovasi, kolaborasi, dan dedikasi terbaik insan ANTAM.</p>
              </div>
              <div class="an-hero-img animate-on-scroll delay-100">
                <div class="an-trophy-glow"></div>
                <img src="assets/img/trophy.png" alt="Trophy KMA XXV 2026" class="an-trophy-img">
              </div>
            </div>
          </div>
        </div>

        <!-- A. Excellence Awards -->
        <div class="an-excellence-block">
          <div class="container">
            <div class="an-badge-header animate-on-scroll">
              <div class="an-badge-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 010-5H6"/><path d="M18 9h1.5a2.5 2.5 0 000-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0012 0V2z"/></svg>
              </div>
              <span>A. EXCELLENCE AWARDS</span>
            </div>

            <div class="an-awards-grid animate-on-scroll delay-100">
              <!-- 1 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="22"/><line x1="8" y1="22" x2="16" y2="22"/></svg>
                  </div>
                  <div class="an-card-num">1</div>
                </div>
                <h4 class="an-card-title">Best Presenter</h4>
                <p class="an-card-desc">Individu terbaik dalam menyampaikan, menjelaskan, dan mempertahankan materi inovasi.</p>
              </div>
              <!-- 2 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                  </div>
                  <div class="an-card-num">2</div>
                </div>
                <h4 class="an-card-title">Best Makalah</h4>
                <p class="an-card-desc">Makalah dengan kualitas struktur, substansi, metodologi, dan penyajian terbaik.</p>
              </div>
              <!-- 3 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><path d="m7 11 3-3 3 3 4-4"/></svg>
                  </div>
                  <div class="an-card-num">3</div>
                </div>
                <h4 class="an-card-title">Best Visual Communication</h4>
                <p class="an-card-desc">Tim dengan media presentasi paling efektif, kreatif, dan mudah dipahami.</p>
              </div>
              <!-- 4 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                  </div>
                  <div class="an-card-num">4</div>
                </div>
                <h4 class="an-card-title">Best Safety Improvement</h4>
                <p class="an-card-desc">Inovasi dengan peningkatan keselamatan kerja dan pengendalian risiko terbaik.</p>
              </div>
              <!-- 5 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                  </div>
                  <div class="an-card-num">5</div>
                </div>
                <h4 class="an-card-title">Best Environment &amp; Sustainability</h4>
                <p class="an-card-desc">Inovasi dengan dampak lingkungan dan keberlanjutan paling baik dan terukur.</p>
              </div>
              <!-- 6 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg>
                  </div>
                  <div class="an-card-num">6</div>
                </div>
                <h4 class="an-card-title">Best Technology &amp; Digital Innovation</h4>
                <p class="an-card-desc">Pemanfaatan teknologi atau solusi digital yang paling tepat, efektif, dan relevan.</p>
              </div>
              <!-- 7 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                  </div>
                  <div class="an-card-num">7</div>
                </div>
                <h4 class="an-card-title">Best Proven Financial Benefit</h4>
                <p class="an-card-desc">Inovasi dengan manfaat finansial aktual terbesar, terukur, dan terverifikasi.</p>
              </div>
              <!-- 8 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                  </div>
                  <div class="an-card-num">8</div>
                </div>
                <h4 class="an-card-title">Best Collaboration</h4>
                <p class="an-card-desc">Kolaborasi lintas fungsi, unit, satker, atau anak perusahaan paling kuat.</p>
              </div>
              <!-- 9 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  </div>
                  <div class="an-card-num">9</div>
                </div>
                <h4 class="an-card-title">Best Transformation Behaviour</h4>
                <p class="an-card-desc">Tim yang paling nyata mencerminkan 8 Key Behaviours Transformasi ANTAM.</p>
              </div>
              <!-- 10 -->
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                  </div>
                  <div class="an-card-num">10</div>
                </div>
                <h4 class="an-card-title">Best Replication Potential</h4>
                <p class="an-card-desc">Inovasi yang paling layak dan mudah direplikasi di lokasi atau unit lain.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- B. Special Engagement Award -->
        <div class="an-special-block" style="background-image: url('assets/img/best.team.png')">
          <div class="an-special-overlay"></div>
          <div class="container an-special-content">
            <div class="an-special-left">
              <div class="an-badge-header animate-on-scroll">
                <div class="an-badge-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <span>B. SPECIAL ENGAGEMENT AWARD</span>
              </div>
              <div class="an-special-card animate-on-scroll delay-100">
                <div class="an-special-num">11</div>
                <div class="an-special-info">
                  <h4>Best Team Spirit</h4>
                  <p>Tim paling kompak, kreatif, autentik, dan bersemangat dalam menampilkan identitas tim selama rangkaian KMA XXV.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- C. Ketentuan Umum -->
        <div class="an-rules-block">
          <div class="container">
            <div class="an-rules-head animate-on-scroll">
              <div class="an-rules-icon-wrap">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
              </div>
              <div>
                <h3 class="an-rules-title">C. KETENTUAN UMUM</h3>
                <div class="an-gold-line"></div>
              </div>
            </div>
            <div class="an-rules-grid animate-on-scroll delay-100">
              <div class="an-rule-item">
                <div class="an-rule-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <p>Penilaian berbasis bukti: makalah, presentasi, wawancara, demonstrasi, dan dokumen pendukung.</p>
              </div>
              <div class="an-rule-item">
                <div class="an-rule-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                </div>
                <p>Satu tim dapat memperoleh lebih dari satu penghargaan khusus apabila memenuhi syarat.</p>
              </div>
              <div class="an-rule-item">
                <div class="an-rule-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>
                </div>
                <p>Penghargaan khusus tidak wajib memiliki pemenang apabila tidak ada kandidat yang layak.</p>
              </div>
            </div>
            <div class="an-footer-note animate-on-scroll delay-200">
              <p>Seluruh kategori menggunakan acuan penilaian yang berbeda sesuai objek penilaiannya.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 5 (Jadwal & Interactive Modal Cards) -->
    <section id="jadwal" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container">
          <div class="section-header animate-on-scroll">
            <h2 class="section-title">Rangkaian Kegiatan</h2>
            <div class="divider"></div>
            <p class="section-desc">
              Klik pada kartu hari di bawah ini untuk melihat rincian rundown lengkap.
            </p>
          </div>

          <div class="days-grid">
            <div class="day-card animate-on-scroll" onclick="openModal(1)">
              <div class="day-card-img-header" style="background-image: url('assets/img/kedatangan.png');">
                <div class="day-badge">DAY 1</div>
              </div>
              <div class="day-card-content">
                <h3>Kedatangan Peserta</h3>
                <ul>
                  <li>Penjemputan Bandara Abdul Rachman Saleh</li>
                  <li>Makan Siang Resto Warung Wareg</li>
                  <li>Check In &amp; Registrasi Hotel</li>
                  <li>Opening &amp; Perform Unit</li>
                </ul>
              </div>
            </div>

            <div class="day-card animate-on-scroll delay-100" onclick="openModal(2)">
              <div class="day-card-img-header" style="background-image: url('assets/img/convention.png');">
                <div class="day-badge">DAY 2</div>
              </div>
              <div class="day-card-content">
                <h3>Convention &amp; Presentasi</h3>
                <ul>
                  <li>Sesi Technical Check &amp; Standby</li>
                  <li>Presentasi 72 Gugus (GKM – SS)</li>
                  <li>Sesi Tanya Jawab Juri</li>
                  <li>Makan Malam Mercure Mirama Hotel</li>
                </ul>
              </div>
            </div>

            <div class="day-card animate-on-scroll delay-200" onclick="openModal(3)">
              <div class="day-card-img-header" style="background-image: url('assets/img/team.building.jpg');">
                <div class="day-badge">DAY 3</div>
              </div>
              <div class="day-card-content">
                <h3>Team Building &amp; Adventure</h3>
                <ul>
                  <li>Offroad Adventure Pagupon Camp</li>
                  <li>Team Building &amp; Outdoor Activity</li>
                  <li>Awarding Ceremony</li>
                  <li>Grand Closing Event</li>
                </ul>
              </div>
            </div>

            <div class="day-card animate-on-scroll delay-300" onclick="openModal(4)">
              <div class="day-card-img-header" style="background-image: url('assets/img/penutupan.png');">
                <div class="day-badge">DAY 4</div>
              </div>
              <div class="day-card-content">
                <h3>Penutupan &amp; Kepulangan</h3>
                <ul>
                  <li>Check-out Hotel (Maks 11:00 WIB)</li>
                  <li>Pengantaran Bandara Abdul Rachman Saleh</li>
                  <li>Perjalanan Kembali ke Unit Masing-masing</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 6 -->
    <section id="lokasi" class="slide section section-white" style="padding-bottom: 0;">
      <div class="slide-scroll-wrapper">
        <div class="container" style="margin-bottom: 60px; padding-top: 40px;">
          <div class="section-header animate-on-scroll">
            <h2 class="section-title">Lokasi Acara</h2>
            <div class="divider"></div>
          </div>
          <!-- TAMBAHKAN CLASS 'location-card' UNTUK MENGHAPUS TEKS RUNDOWN -->
          <div class="day-card location-card animate-on-scroll" style="cursor: default;">
            <div class="day-card-img-header" style="background-image: url('assets/img/mercure.mirama.jpg'); height: 220px;">
              <div class="day-badge">LOKASI</div>
            </div>
            <div class="day-card-content" style="padding: 28px; pointer-events: auto;">
              <h3 style="margin-bottom: 8px;">Mercure Mirama Hotel</h3>
              <p style="color: #64748b; margin-bottom: 20px; font-size: var(--fs-lead);">Jl. Raden Panji Suroso No.7, Kota Malang, Jawa Timur</p>
              <a href="https://maps.app.goo.gl/4iNPm7oLoiHYGw168" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 12px 28px; width: fit-content; pointer-events: auto;">Lihat di Google Maps</a>
            </div>
          </div>
        </div>

        <div id="kontak" class="container" style="margin-bottom: 40px;">
          <div class="section-header animate-on-scroll">
            <h2 class="section-title">Kontak Panitia</h2>
            <div class="divider"></div>
            <p class="section-desc">Punya pertanyaan seputar event KMA XXV?<br>Jangan ragu untuk menghubungi kami<br>melalui jalur di bawah ini.</p>
          </div>

          <div class="contact-list animate-on-scroll delay-100">
            <a href="mailto:kma25@antam.com" class="clist-item">
              <div class="clist-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
              </div>
              <div class="clist-info">
                <span class="clist-label">Email</span>
                <span class="clist-value">kma25@antam.com</span>
              </div>
              <div class="clist-arrow">›</div>
            </a>

            <a href="https://wa.link/3h06ok" target="_blank" rel="noopener noreferrer" class="clist-item">
              <div class="clist-icon clist-wa">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
              </div>
              <div class="clist-info">
                <span class="clist-label">WhatsApp</span>
                <span class="clist-value">Tanya KMA</span>
              </div>
              <div class="clist-arrow">›</div>
            </a>

            <a href="https://www.instagram.com/official.antam" target="_blank" rel="noopener noreferrer" class="clist-item">
              <div class="clist-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
              </div>
              <div class="clist-info">
                <span class="clist-label">Instagram</span>
                <span class="clist-value">@official.antam</span>
              </div>
              <div class="clist-arrow">›</div>
            </a>
          </div>
        </div>

        <footer class="footer">
          <div class="container">
            <p>&copy; 2026 PT ANTAM Tbk.</p>
          </div>
        </footer>
      </div>
    </section>

  </main>

  <!-- Navigation Controls (Bottom Bar) -->
  <div class="slide-nav-controls">
    <button class="nav-btn prev-btn" id="prevBtn" onclick="prevSlide()" disabled>
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"></polyline></svg>
      <span>Sebelumnya</span>
    </button>

    <div class="slide-dots" id="slideDots">
      <span class="dot active" onclick="goToSlide(0)" title="Beranda"></span>
      <span class="dot" onclick="goToSlide(1)" title="Tentang"></span>
      <span class="dot" onclick="goToSlide(2)" title="Highlights"></span>
      <span class="dot" onclick="goToSlide(3)" title="Penghargaan"></span>
      <span class="dot" onclick="goToSlide(4)" title="Rangkaian Kegiatan"></span>
      <span class="dot" onclick="goToSlide(5)" title="Lokasi & Kontak"></span>
    </div>

    <button class="nav-btn next-btn" id="nextBtn" onclick="nextSlide()">
      <span>Selanjutnya</span>
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </button>
  </div>

  <!-- POPUP MODAL RUNDOWN -->
  <div class="modal-overlay" id="rundownModal" onclick="closeModalOnOverlay(event)">
    <div class="modal-container">
      <div class="modal-header">
        <div class="modal-title-wrap">
          <h3 id="modalDayTitle">DAY 1 - Kedatangan Peserta</h3>
          <p id="modalDayDate">Selasa, 1 September 2026</p>
        </div>
        <button class="modal-close" onclick="closeModal()">&times;</button>
      </div>
      <div class="modal-body">
        <div class="rundown-list" id="modalRundownContent"></div>
        <div class="rundown-badge-code" id="modalDresscode"></div>
      </div>
    </div>
  </div>

  <!-- POPUP MODAL KEY HIGHLIGHTS -->
  <div class="modal-overlay" id="highlightModal" onclick="closeHighlightModalOnOverlay(event)">
    <div class="modal-container">
      <div class="modal-header">
        <div class="modal-title-wrap">
          <h3 id="hlModalTitle">Detail Highlight</h3>
          <p id="hlModalCategory">INFORMASI KMA XXV</p>
        </div>
        <button class="modal-close" onclick="closeHighlightModal()">&times;</button>
      </div>
      <div class="modal-body">
        <div id="hlModalContent" style="font-size: 0.95rem; line-height: 1.7; color: #334155;"></div>
      </div>
    </div>
  </div>

  <script>
    const highlightData = {
      1: {
        title: "Buku 25 Tahun Eksplorasi & Inovasi",
        category: "LAUNCHING BUKU RESMI",
        content: `
          <p style="margin-bottom: 12px;"><strong>Buku 25 Tahun Eksplorasi & Inovasi ANTAM</strong> disusun khusus untuk memperingati seperempat abad komitmen perusahaan dalam menjaga budaya perbaikan mutu berkelanjutan <em>(continuous improvement)</em>.</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Rekam Jejak Historis:</strong> Merangkum perjalanan inovasi dari seluruh unit bisnis dan anak perusahaan ANTAM.</li>
            <li><strong>Dokumentasi Pembelajaran:</strong> Menjadi referensi utama metode perbaikan mutu (GKM & SS) serta penyelesaian masalah operasional.</li>
            <li><strong>Nilai Strategis:</strong> Sumber inspirasi bagi generasi Insan ANTAM dalam melahirkan value creation di masa depan.</li>
          </ul>
        `
      },
      2: {
        title: "Jingle Resmi KMA XXV",
        category: "IDENTITAS & SENI",
        content: `
          <p style="margin-bottom: 12px;">Jingle resmi KMA diluncurkan sebagai lagu tema utama perhelatan Konvensi Mutu ANTAM ke-XXV 2026 di Malang.</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Semangat Kebersamaan:</strong> Mengobarkan energi positif dan kolaborasi antar unit kerja.</li>
            <li><strong>Refleksi Tema:</strong> Selaras dengan spirit <em>"Powering Sustainable Growth, Transforming the Future"</em>.</li>
            <li><strong>Identitas Acara:</strong> Diputar pada pembukaan acara, jeda konvensi, dan sesi selebrasi penganugerahan.</li>
          </ul>
        `
      },
      3: {
        title: "GOLNIX – Maskot KMA XXV",
        category: "FILOSOFI MASKOT RESMI",
        content: `
          <p style="margin-bottom: 12px;"><strong>GOLNIX</strong> adalah karakter kristal emas & nikel antropomorfik modern yang menjadi ikon resmi KMA XXV 2026.</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Helm Tambang & Kompas:</strong> Simbol keselamatan kerja serta penuntun arah transformasi masa depan ANTAM.</li>
            <li><strong>Palu Geologi & Sayap:</strong> Melambangkan kekuatan teknis, ketegasan, serta akselerasi pertumbuhan berkelanjutan.</li>
            <li><strong>Filosofi Warna:</strong> Paduan Emas (keunggulan/prestasi), Hijau Nikel (inovasi & keberlanjutan), serta Merah Bauksit (keberanian & pondasi industri).</li>
          </ul>
        `
      },
      4: {
        title: "Deep Dive Interview Juri",
        category: "SISTEM PENILAIAN INOVASI",
        content: `
          <p style="margin-bottom: 12px;">Sesi verifikasi dan pendalaman intensif secara online sebelum gelaran konvensi utama di Malang.</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Waktu Pelaksanaan:</strong> 27 Agustus 2026 melalui 4 Stream Paralel.</li>
            <li><strong>Durasi Interview:</strong> 25 menit untuk GKM dan 20 menit untuk SS.</li>
            <li><strong>Fokus Penilaian:</strong> Pembuktian metode PDCA, validitas data, ketepatan analisis akar masalah, serta dampak finansial & operasional aktual.</li>
          </ul>
        `
      },
      5: {
        title: "GEOMIN Hackathon",
        category: "KOMPETISI INOVASI TERBUKA",
        content: `
          <p style="margin-bottom: 12px;">Program inovasi kolaboratif yang diselenggarakan oleh Unit GEOMIN sebagai tuan rumah KMA XXV.</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Kolaborasi Akademisi:</strong> Menjaring gagasan dan solusi teknologi dari talenta muda/akademisi.</li>
            <li><strong>Tantangan Nyata:</strong> Menjawab isu eksplorasi, digitalisasi pertambangan, dan efisiensi operasional industri mineral.</li>
          </ul>
        `
      }
    };

    function openHighlightModal(id) {
      const data = highlightData[id];
      if (!data) return;

      document.getElementById('hlModalTitle').innerText = data.title;
      document.getElementById('hlModalCategory').innerText = data.category;
      document.getElementById('hlModalContent').innerHTML = data.content;

      document.getElementById('highlightModal').classList.add('active');
    }

    function closeHighlightModal() {
      document.getElementById('highlightModal').classList.remove('active');
    }

    function closeHighlightModalOnOverlay(e) {
      if (e.target.id === 'highlightModal') {
        closeHighlightModal();
      }
    }

    // Data Rundown Lengkap
    const rundownData = {
      1: {
        title: "DAY 1 - Kedatangan Peserta",
        date: "Selasa, 1 September 2026",
        dresscode: "<strong>Dresscode:</strong> Perjalanan & Registrasi: Baju Bebas | Opening: Kostum Penampilan Unit.",
        items: [
          { time: "08:00 - 12:00", title: "Penjemputan Peserta", desc: "Penjemputan rombongan dari Bandara Abdul Rachman Saleh Malang." },
          { time: "12:00 - 13:30", title: "Makan Siang", desc: "Santap siang bersama di Resto Warung Wareg Malang." },
          { time: "14:00 - 16:00", title: "Check-In & Registrasi", desc: "Proses registrasi ulang, pembagian kamar, dan ID Card di Grand Mercure Malang Mirama." },
          { time: "19:00 - 22:00", title: "Opening Ceremony & Perform Unit", desc: "Pembukaan resmi KMA XXV, sambutan manajemen, dan penampilan seni khas tiap kontingen unit di Ballroom." }
        ]
      },
      2: {
        title: "DAY 2 - Convention & Presentasi",
        date: "Rabu, 2 September 2026",
        dresscode: "<strong>Dresscode:</strong> Kostum Presentasi Resmi Gugus.",
        items: [
          { time: "07:30 - 08:00", title: "Technical Check & Briefing", desc: "Standby di break room 15 menit sebelum sesi presentasi." },
          { time: "08:00 - 12:00", title: "Sesi Presentasi Gugus (Paralel)", desc: "Presentasi 72 Gugus (GKM & SS). Durasi: 10 menit presentasi + 5 menit tanya jawab juri." },
          { time: "12:00 - 13:00", title: "ISOMA", desc: "Makan siang & istirahat." },
          { time: "13:00 - 17:00", title: "Lanjutan Presentasi Gugus", desc: "Sesi tanya jawab mendalam serta penilaian oleh dewan juri internal & eksternal." },
          { time: "19:00 - 21:00", title: "Makan Malam Bersama", desc: "Makan malam santai di Mercure Mirama Hotel." }
        ]
      },
      3: {
        title: "DAY 3 - Team Building & Awarding",
        date: "Kamis, 3 September 2026",
        dresscode: "<strong>Dresscode:</strong> Kunjungan: Seragam kaus putih panitia | Closing: Kostum Closing.",
        items: [
          { time: "07:00 - 08:00", title: "Perjalanan ke Pagupon Camp", desc: "Berangkat menuju lokasi outbound di Batu Malang." },
          { time: "08:00 - 14:00", title: "Offroad Adventure & Team Building", desc: "Rangkaian kegiatan keakraban outdoor dan petualangan offroad." },
          { time: "14:00 - 15:30", title: "Kembali ke Hotel & Persiapan", desc: "Perjalanan kembali ke hotel dan persiapan malam anugerah." },
          { time: "18:30 - 22:00", title: "Grand Awarding & Closing Ceremony", desc: "Pengumuman pemenang KMA XXV, Juara Umum, Excellence Awards, dan hiburan malam penutupan." }
        ]
      },
      4: {
        title: "DAY 4 - Penutupan & Kepulangan",
        date: "Jumat, 4 September 2026",
        dresscode: "<strong>Dresscode:</strong> Baju Bebas Rapi.",
        items: [
          { time: "07:00 - 09:00", title: "Sarapan Pagi", desc: "Sarapan pagi di resto hotel." },
          { time: "09:00 - 11:00", title: "Proses Check-Out", desc: "Pengembalian kunci kamar (Maksimal pukul 11:00 WIB)." },
          { time: "11:00 - Selesai", title: "Pengantaran Kepulangan", desc: "Pengantaran peserta menuju Bandara Abdul Rachman Saleh Malang." }
        ]
      }
    };

    function openModal(day) {
      const data = rundownData[day];
      if (!data) return;

      document.getElementById('modalDayTitle').innerText = data.title;
      document.getElementById('modalDayDate').innerText = data.date;
      document.getElementById('modalDresscode').innerHTML = data.dresscode;

      const container = document.getElementById('modalRundownContent');
      container.innerHTML = '';

      data.items.forEach(item => {
        const div = document.createElement('div');
        div.className = 'rundown-item';
        div.innerHTML = `
          <div class="rundown-time">${item.time}</div>
          <div class="rundown-title">${item.title}</div>
          <div class="rundown-desc">${item.desc}</div>
        `;
        container.appendChild(div);
      });

      document.getElementById('rundownModal').classList.add('active');
    }

    function closeModal() {
      document.getElementById('rundownModal').classList.remove('active');
    }

    function closeModalOnOverlay(e) {
      if (e.target.id === 'rundownModal') {
        closeModal();
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
          }
        });
      }, { threshold: 0.1 });

      function observeAnimations(container) {
        container.querySelectorAll('.animate-on-scroll').forEach((el) => {
          observer.observe(el);
        });
      }

      const slides = document.querySelectorAll('.slide');
      const dots = document.querySelectorAll('.dot');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      let currentSlide = 0;

      observeAnimations(slides[0]);

      function updateSlide(index) {
        if (index < 0 || index >= slides.length) return;

        slides[currentSlide].classList.remove('active');
        dots[currentSlide].classList.remove('active');

        currentSlide = index;

        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');

        observeAnimations(slides[currentSlide]);

        const activeWrapper = slides[currentSlide].querySelector('.slide-scroll-wrapper');
        if (activeWrapper) activeWrapper.scrollTop = 0;

        prevBtn.disabled = (currentSlide === 0);
        nextBtn.disabled = (currentSlide === slides.length - 1);
      }

      window.nextSlide = function() {
        if (currentSlide < slides.length - 1) updateSlide(currentSlide + 1);
      };

      window.prevSlide = function() {
        if (currentSlide > 0) updateSlide(currentSlide - 1);
      };

      window.goToSlide = function(index) {
        updateSlide(index);
      };

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeModal();
          closeHighlightModal();
        } else if (e.key === 'ArrowRight' || e.key === 'Space') {
          if (!document.getElementById('rundownModal').classList.contains('active') &&
              !document.getElementById('highlightModal').classList.contains('active')) {
            nextSlide();
          }
        } else if (e.key === 'ArrowLeft') {
          if (!document.getElementById('rundownModal').classList.contains('active') &&
              !document.getElementById('highlightModal').classList.contains('active')) {
            prevSlide();
          }
        }
      });

      // Hitung Mundur Logic
      const targetDate = new Date('2026-09-01T00:00:00+07:00').getTime();
      const elDays = document.getElementById('cd-days');
      const elHours = document.getElementById('cd-hours');
      const elMinutes = document.getElementById('cd-minutes');
      const elSeconds = document.getElementById('cd-seconds');
      const wrapper = document.getElementById('countdown-wrapper');

      function updateCountdown() {
        const now = Date.now();
        const diff = targetDate - now;

        if (diff <= 0) {
          if (wrapper) wrapper.innerHTML = '<p class="cd-live">Acara KMA XXV sedang berlangsung!</p>';
          return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);

        if (elDays) elDays.textContent = String(days).padStart(2, '0');
        if (elHours) elHours.textContent = String(hours).padStart(2, '0');
        if (elMinutes) elMinutes.textContent = String(minutes).padStart(2, '0');
        if (elSeconds) elSeconds.textContent = String(seconds).padStart(2, '0');
      }

      updateCountdown();
      setInterval(updateCountdown, 1000);
    });
  </script>
</body>
</html>