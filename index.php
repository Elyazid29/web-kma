<?php
require_once __DIR__ . '/auth_config.php';
if (!isAuthenticated()) {
    header('Location: login.php');
    exit;
}
?>
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
  <link rel="stylesheet" href="assets/css/style.css?v=79">
  <style>
    /* Custom Override CSS untuk Banner Full Width */
    #highlights.kh-section {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .kh-banner {
      width: 100% !important;
      border-radius: 0 !important;
      border-left: none !important;
      border-right: none !important;
      margin: 0 0 30px 0 !important;
      background: #ffffff;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .kh-banner-container {
      max-width: 1600px;
      margin: 0 auto;
      padding: 30px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    /* Integration Button Audio Minimalis di Navbar */
    .nav-audio-btn {
      background: #f1f5f9;
      border: 1px solid #cbd5e1;
      color: #64748b;
      padding: 6px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.25s ease;
      font-family: 'Inter', sans-serif;
    }

    .nav-audio-btn:hover {
      background: #e2e8f0;
      color: #0f172a;
    }

    /* Status Aktif (Menyala Default) */
    .nav-audio-btn.playing {
      background: #006d64;
      color: #ffffff;
      border-color: #006d64;
      box-shadow: 0 0 10px rgba(0, 109, 100, 0.3);
    }

    /* Tampilan Dropdown Toggle via Class Active */
    .dropdown-content {
      display: none;
    }

    .dropdown.active .dropdown-content {
      display: block !important;
    }

    .dropdown.active .dropbtn .arrow {
      transform: rotate(90deg);
    }
  </style>
</head>
<body class="presentation-mode">

  <!-- Element Audio Update Path ke jingle.wav -->
  <audio id="bgJingle" loop playsinline preload="auto">
    <source src="assets/audio/jingle.wav" type="audio/wav">
    <source src="assets/jingle.wav" type="audio/wav">
    <source src="jingle.wav" type="audio/wav">
  </audio>

  <!-- Header / Navbar -->
  <header class="header">
    <div class="container header-inner">
      <div class="logo">
        <img src="assets/img/logo.kma.png" alt="Logo KMA" class="logo-img">
        <span class="logo-text">KMA XXV 2026</span>
      </div>
      <nav class="nav" style="display: flex; align-items: center; gap: 10px;">
        
        <!-- Tombol Audio Ringkas (Default Status ON / Class "playing") -->
        <button id="audioToggleBtn" class="nav-audio-btn playing" onclick="toggleAudio(event)" title="Mute/Putar Musik">
          <svg id="audioIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 5L6 9H2v6h4l5 4V5z"></path>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
          </svg>
          <span>Musik</span>
        </button>

        <!-- Dropdown Menu -->
        <div class="dropdown" id="menuDropdown">
          <button class="dropbtn" onclick="toggleDropdown(event)" aria-label="Buka menu"><span class="menu-icon" aria-hidden="true"><i></i><i></i><i></i></span><span>Menu</span></button>
          <div class="dropdown-content">
            <a href="#" onclick="selectMenu(0); return false;">1. Beranda & Countdown</a>
            <a href="#" onclick="selectMenu(1); return false;">2. Tentang KMA</a>
            <a href="#" onclick="selectMenu(2); return false;">3. Key Highlights</a>
            <a href="#" onclick="selectMenu(3); return false;">4. Penghargaan</a>
            <a href="#" onclick="selectMenu(4); return false;">5. Rangkaian Kegiatan</a>
            <a href="#" onclick="selectMenu(5); return false;">6. Deep Dive Interview</a>
            <a href="#" onclick="selectMenu(6); return false;">7. Lokasi Acara</a>
            <a href="#" onclick="selectMenu(7); return false;">8. Kontak Panitia</a>
            <a href="#" onclick="selectMenu(8); return false;">9. Dewan Juri KMA XXV</a>
            <a href="#" onclick="selectMenu(9); return false;">10. Panitia KMA XXV</a>
            <a href="#" onclick="selectMenu(10); return false;">11. Jadwal Presentasi</a>
            <a href="#" onclick="selectMenu(11); return false;">12. Emergency</a>
          </div>
        </div>
        <a href="logout.php" class="nav-logout" title="Keluar dari akun" style="display:inline-flex;align-items:center;padding:8px 12px;border:1px solid #cbd5e1;border-radius:8px;color:#475569;text-decoration:none;font-size:.8rem;font-weight:700;">Keluar</a>
      </nav>
    </div>
  </header>

  <!-- Presentation Deck Container -->
  <main class="slide-deck">

    <!-- SLIDE 1 -->
    <section id="home" class="slide active hero" style="background-image: url('assets/img/asset1.png');">
      <div class="hero-overlay" style="background: rgba(0, 0, 0, 0.45);"></div>
      <div class="slide-scroll-wrapper">
        <div class="container hero-content" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; pointer-events: auto;">
          
          <div class="hc-eyebrow no-hero-animation" style="margin-bottom: 20px;">
            ANTAM BestMIND
          </div>
          
          <h1 class="hero-title animate-on-scroll delay-100" style="margin-bottom: 15px;">KMA XXV <span class="text-highlight">2026</span></h1>
          
          <p class="hero-subtitle animate-on-scroll delay-200" style="margin-bottom: 25px;">
            25 Years of Continuous Improvement:<br>
            Powering Sustainable Growth, Transforming the Future
          </p>
          
          <div class="hero-info animate-on-scroll delay-200" style="display: flex; gap: 20px; justify-content: center; margin-bottom: 40px;">
            <div class="info-item" style="display: flex; align-items: center; gap: 8px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              <span>1 - 4 September 2026</span>
            </div>
            <div class="info-item" style="display: flex; align-items: center; gap: 8px;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <span>Malang</span>
            </div>
          </div>

          <!-- Countdown Timer -->
          <div class="hero-countdown no-hero-animation">
            <div class="hc-eyebrow" style="margin-bottom: 20px;">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              MENUJU HARI-H
            </div>
            <div class="hc-grid" style="display: flex; gap: 16px; justify-content: center;">
              <div class="hc-item" style="background: rgba(0,0,0,0.3); padding: 10px 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); min-width: 65px;">
                <div class="hc-number" id="cd-days" style="font-size: 1.8rem; font-weight: 800;">00</div>
                <div class="hc-label" style="font-size: 0.7rem; color: #cbd5e1; letter-spacing: 1px;">HARI</div>
              </div>
              <div class="hc-item" style="background: rgba(0,0,0,0.3); padding: 10px 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); min-width: 65px;">
                <div class="hc-number" id="cd-hours" style="font-size: 1.8rem; font-weight: 800;">00</div>
                <div class="hc-label" style="font-size: 0.7rem; color: #cbd5e1; letter-spacing: 1px;">JAM</div>
              </div>
              <div class="hc-item" style="background: rgba(0,0,0,0.3); padding: 10px 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); min-width: 65px;">
                <div class="hc-number" id="cd-minutes" style="font-size: 1.8rem; font-weight: 800;">00</div>
                <div class="hc-label" style="font-size: 0.7rem; color: #cbd5e1; letter-spacing: 1px;">MENIT</div>
              </div>
              <div class="hc-item" style="background: rgba(0,0,0,0.3); padding: 10px 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); min-width: 65px;">
                <div class="hc-number" id="cd-seconds" style="font-size: 1.8rem; font-weight: 800;">00</div>
                <div class="hc-label" style="font-size: 0.7rem; color: #cbd5e1; letter-spacing: 1px;">DETIK</div>
              </div>
            </div>
          </div>

          <div class="hero-cta animate-on-scroll delay-300" style="flex-direction: row; justify-content: center; margin-top: 25px;">
            <button onclick="goToSlide(4)" class="btn btn-outline" style="cursor: pointer; width: auto; padding: 10px 24px;">Lihat Jadwal ›</button>
            <a href="#kontak" onclick="goToSlide(7); return false;" class="btn btn-outline" style="width: auto; padding: 10px 24px;">Kontak Panitia</a>
          </div>

        </div>
      </div>
    </section>

    <!-- SLIDE 2: TENTANG KMA XXV (UPDATE TERBARU) -->
    <section id="tentang" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container">
          
          <div class="about-card-wrapper animate-on-scroll">
            <!-- Grid Layout Utama: Visual Kiri + Content Kanan -->
            <div class="about-grid">
              
              <!-- Kolom Visual (Logo KMA + Maskot GOLNIX + Watermark Malang) -->
              <div class="about-visual-col">
                <div class="about-visual-container">
                  <!-- Latar Belakang Gunungan Malang -->
                  <img src="assets/img/gunung2.png" class="malang-watermark-bg" alt="Motif Malang Watermark">
                  
                  <!-- Logo 25 Tahun KMA (Layer Belakang) -->
                  <img src="assets/img/logo.kma.png" class="kma-logo-layer" alt="Logo KMA XXV">
                  
                  <!-- Maskot GOLNIX (Layer Depan Utama) -->
                  <img src="assets/img/golnix.png" class="golnix-mascot-layer" alt="Maskot GOLNIX">
                </div>
              </div>

              <!-- Kolom Narasi Utama -->
              <div class="about-content-col">
                <div class="section-header" style="text-align: left; margin-bottom: 20px;">
                  <h2 class="section-title" style="margin-bottom: 8px;">Tentang KMA XXV</h2>
                  <div class="divider" style="margin: 0;"></div>
                </div>

                <div class="about-narrative-text">
                  <p>Konvensi Mutu ANTAM (KMA) XXV Tahun 2026 menandai <strong>Silver Jubileeâ€”25 tahun atau seperempat abad perjalanan budaya mutu, inovasi, dan continuous improvement di ANTAM</strong>. Lebih dari sekadar kompetisi, KMA menjadi momentum untuk mengapresiasi karya inovatif Insan ANTAM sekaligus merefleksikan bagaimana gagasan, kreativitas, dan semangat perbaikan terus berkembang menjadi solusi yang memberikan nilai bagi perusahaan.</p>
                  
                  <p>Konvensi Mutu ANTAM (KMA) merupakan bagian dari ekosistem <strong>ANTAM BestMIND â€” Wadah Inovasi Terintegrasi ANTAM</strong>, yang berfungsi sebagai payung besar yang menghubungkan berbagai inisiatif inovasi dan perbaikan di ANTAM. Dalam ekosistem BestMIND, <strong>KMA menjadi salah satu ruang utama untuk mengangkat, mengapresiasi, menguji, serta menyebarluaskan praktik continuous improvement dan inovasi terbaik</strong>, sehingga ide tidak berhenti pada kompetisi, tetapi berkembang menjadi <em>knowledge</em>, solusi, dan <em>value</em> bagi ANTAM.</p>
                  
                  <p>KMA bertujuan menjadi <strong>ruang berbagi pengetahuan, pembelajaran, kolaborasi, dan diseminasi inovasi</strong> antarunit serta Anak Perusahaan ANTAM. Melalui KMA, berbagai solusi perbaikan tidak berhenti sebagai keberhasilan di satu tempat, tetapi didorong untuk dikembangkan, distandarisasi, direplikasi, dan memberikan dampak yang lebih luas terhadap <strong>produktifitas, efisiensi, kualitas, keselamatan, keberlanjutan, serta kinerja perusahaan</strong>.</p>
                </div>

                <!-- Kotak Tema KMA -->
                <div class="theme-box" style="margin-top: 20px; text-align: center;">
                  <div style="margin-bottom: 12px; border: 1px solid #eef2f6; border-radius: 12px; background: #ffffff; box-shadow: 0 4px 6px -2px rgba(0,0,0,0.02);">
  <div onclick="const c = this.nextElementSibling; const i = this.querySelector('.chevron'); if(c.style.display==='none'){c.style.display='block'; i.style.transform='rotate(180deg)';}else{c.style.display='none'; i.style.transform='rotate(0deg)';}" style="display: flex; align-items: center; justify-content: space-between; padding: 16px; cursor: pointer;">
    <div style="display: flex; align-items: center; gap: 16px;">
      <div style="width: 44px; height: 44px; border-radius: 50%; background: #eef7f4; display: flex; align-items: center; justify-content: center; color: #006d64;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
      </div>
      <span style="font-weight: 700; color: #0f172a; font-size: 1.05rem;">Tema KMA</span>
    </div>
    <svg class="chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#006d64" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
  </div>
  <div style="display: none; padding: 0 16px 16px 16px;">
    <img src="assets/img/TEMA.KMA.JPEG?v=20260818-3" alt="Tema KMA XXV 2026" style="max-width: 100%; border-radius: 8px;">
  </div>
</div>
                </div>

                <!-- Identitas KMA XXV: Filosofi Logo dan Maskot -->
                <div class="kma-identity-grid" aria-label="Identitas KMA XXV" style="display: flex; flex-direction: column; gap: 20px; margin-top: 20px;">
                  <article style="text-align: center;">
                    <div style="margin-bottom: 12px; border: 1px solid #eef2f6; border-radius: 12px; background: #ffffff; box-shadow: 0 4px 6px -2px rgba(0,0,0,0.02);">
  <div onclick="const c = this.nextElementSibling; const i = this.querySelector('.chevron'); if(c.style.display==='none'){c.style.display='block'; i.style.transform='rotate(180deg)';}else{c.style.display='none'; i.style.transform='rotate(0deg)';}" style="display: flex; align-items: center; justify-content: space-between; padding: 16px; cursor: pointer;">
    <div style="display: flex; align-items: center; gap: 16px;">
      <div style="width: 44px; height: 44px; border-radius: 50%; background: #eef7f4; display: flex; align-items: center; justify-content: center; color: #006d64;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      </div>
      <span style="font-weight: 700; color: #0f172a; font-size: 1.05rem;">Filosofi Logo KMA</span>
    </div>
    <svg class="chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#006d64" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
  </div>
  <div style="display: none; padding: 0 16px 16px 16px;">
    <img src="assets/img/logo.penjelasan.jpeg?v=20260818-4" alt="Penjelasan Logo KMA XXV" style="max-width: 100%; border-radius: 8px;">
  </div>
</div>
                  </article>
                  
                  <article style="text-align: center; margin-top: 10px;">
  <div class="kma-identity-card">
    <button type="button" class="kma-identity-toggle" onclick="const c=this.nextElementSibling; const i=this.querySelector('.chevron'); const open=c.style.display==='none'; c.style.display=open?'block':'none'; i.style.transform=open?'rotate(180deg)':'rotate(0deg)';">
      <span class="kma-identity-heading"><span class="kma-identity-icon">✦</span>Filosofi Maskot KMA</span>
      <svg class="chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#006d64" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
    </button>
    <div style="display: none; padding: 0 16px 16px;">
      <img src="assets/img/logo.penjelasan.jpeg?v=20260819-1" alt="Filosofi Maskot KMA" style="max-width: 100%; border-radius: 8px;">
    </div>
  </div>
</article>
<article style="text-align: center; margin-top: 10px;">
  <div class="kma-identity-card">
    <button type="button" class="kma-identity-toggle" onclick="const c=this.nextElementSibling; const i=this.querySelector('.chevron'); const open=c.style.display==='none'; c.style.display=open?'block':'none'; i.style.transform=open?'rotate(180deg)':'rotate(0deg)';">
      <span class="kma-identity-heading"><span class="kma-identity-icon">B</span>ANTAM BestMIND</span>
      <svg class="chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#006d64" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
    </button>
    <div style="display: none; padding: 0 16px 16px;">
      <img src="assets/img/antamBest.jpeg?v=20260819-2" alt="ANTAM BestMIND" style="max-width: 100%; border-radius: 8px; margin: 0 auto; display: block;">
    </div>
  </div>
</article>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </section>

    <!-- SLIDE 3 -->
    <section id="highlights" class="slide kh-section">
      <div class="slide-scroll-wrapper">
        
        <!-- BANNER FULL WIDTH -->
        <div class="kh-banner animate-on-scroll">
          <div class="kh-banner-container">
            <div class="kh-banner-left">
              <div class="kh-sub-header">
                <span class="kh-sub-text">KEY HIGHLIGHTS OF</span>
                <span class="kh-diamond">â—†</span>
                <span class="kh-line"></span>
              </div>
              <h2 class="kh-main-title">
                <span class="kh-title-green">KMA XXV</span><br>
                <span class="kh-title-gold">2026</span>
              </h2>
              <div class="kh-location-badge">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                <span>KMA XXV â€“ MALANG</span>
              </div>
            </div>
            <div class="kh-banner-right">
              <img src="assets/img/gunung2.png" alt="Gunung Malang KMA XXV" class="kh-gunung-img">
            </div>
          </div>
        </div>

        <!-- HIGHLIGHT CARDS (DESKTOP GRID 2 KOLOM) -->
        <div class="container">
          <div class="kh-cards-wrapper">

            <!-- Point 1: Jejak Langkah -->
            <div class="kh-card animate-on-scroll" onclick="openHighlightModal(1)">
              <div class="kh-card-text">
                <span class="kh-tag">LAUNCHING</span>
                <h3 class="kh-card-title">Jejak Langkah 25 Tahun Eksplorasi Unit Geomin</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Mendokumentasikan perjalanan eksplorasi di berbagai wilayah Indonesia selama periode 2000-2025.</p>
                <span class="kh-click-hint">Klik untuk detail info â€º</span>
              </div>
              <div class="kh-card-img-wrap kh-img-contain-wrap">
                <img src="assets/img/25tahun.png" alt="Logo KMA 25 Tahun" class="kh-card-img kh-card-img-contain">
              </div>
            </div>

            <!-- Point 2: Prosiding Inovasi -->
            <div class="kh-card animate-on-scroll delay-100" onclick="openHighlightModal('prosiding')">
              <div class="kh-card-text">
                <span class="kh-tag">LAUNCHING</span>
                <h3 class="kh-card-title">Prosiding Inovasi 25 Tahun</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Refleksi perjalanan inovasi, mendokumentasikan lebih dari 332 inovasi berkelanjutan dari seluruh insan ANTAM.</p>
                <span class="kh-click-hint">Klik untuk detail info â€º</span>
              </div>
              <div class="kh-card-img-wrap">
                <img src="assets/img/prosiding.png" alt="Prosiding Inovasi" class="kh-card-img">
              </div>
            </div>

            <!-- Point 3: Theme Song -->
            <div class="kh-card animate-on-scroll delay-200" onclick="openHighlightModal(2)">
              <div class="kh-card-text">
                <span class="kh-tag">OFFICIAL</span>
                <h3 class="kh-card-title">Official Theme Song KMA XXV</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Saksikan lirik dan notasi balok dari jingle resmi KMA XXV yang mengobarkan semangat kebersamaan.</p>
                <span class="kh-click-hint">Klik untuk detail info â€º</span>
              </div>
              <div class="kh-card-img-wrap">
                <img src="assets/img/theme.song.png" alt="Official Theme Song" class="kh-card-img">
              </div>
            </div>

            <!-- Point 4: Hackathon -->
            <div class="kh-card animate-on-scroll delay-300" onclick="openHighlightModal(5)">
              <div class="kh-card-text">
                <span class="kh-tag">KOMPETISI</span>
                <h3 class="kh-card-title">ANTAM Hackathon</h3>
                <div class="kh-gold-line"></div>
                <p class="kh-card-desc">Program kompetisi yang diikuti oleh 77 tim terbaik untuk menjawab tantangan nyata ANTAM.</p>
                <span class="kh-click-hint">Klik untuk detail info â€º</span>
              </div>
              <div class="kh-card-img-wrap kh-img-contain-wrap">
                <img src="assets/img/hackaton.png?v=20260818-2" alt="ANTAM Hackathon" class="kh-card-img kh-card-img-contain">
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 4 -->
    <section id="penghargaan" class="slide an-section">
      <div class="slide-scroll-wrapper">
        <div class="an-hero" style="background-image: url('assets/img/bg.malang.png'); background-size: cover; background-position: center bottom; padding: 40px 0; border-bottom: 1px solid #e2e8f0; position: relative; overflow: hidden;">
          <div style="position: absolute; top: 0; left: 0; right: 0; height: 100%; background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.2) 100%); z-index: 0;"></div>
          <div class="container" style="position: relative; z-index: 1;">
            <div class="an-hero-inner" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
              
              <!-- Kiri: Maskot GOLNIX -->
              <div class="an-hero-mascot animate-on-scroll" style="flex: 1; min-width: 250px; display: flex; justify-content: flex-end;">
                <img src="assets/img/golnix.png?v=20260818-2" alt="GOLNIX" style="max-height: 400px; object-fit: contain; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.2));">
              </div>

              <!-- Tengah: Teks -->
              <div class="an-hero-text animate-on-scroll delay-100" style="flex: 1.2; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                <div class="an-gold-bar" style="width: 45px; height: 5px; background: #d97706; border-radius: 3px; margin-bottom: 16px;"></div>
                <h2 class="an-hero-title" style="font-size: clamp(2.2rem, 3.5vw, 3rem); font-weight: 800; color: #0f172a; line-height: 1.15; margin: 0 0 20px 0;">
                  Rekap<br>Kategori<br><span class="an-title-green" style="color: #006d64;">Penghargaan<br>Lainnya</span>
                </h2>
                <p class="an-hero-sub" style="font-size: 1.15rem; color: #475569; line-height: 1.6; max-width: 400px; margin: 0; font-weight: 500;">Apresiasi untuk inovasi, kolaborasi, dan dedikasi terbaik insan ANTAM.</p>
              </div>

              <!-- Kanan: Piala/Trophy -->
              <div class="an-hero-img animate-on-scroll delay-200" style="flex: 1; min-width: 250px; display: flex; justify-content: flex-start; position: relative;">
                <div class="an-trophy-glow" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 250px; height: 250px; background: radial-gradient(circle, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0) 70%); z-index: 0; border-radius: 50%;"></div>
                <img src="assets/img/trophy.png" alt="Trophy KMA XXV 2026" class="an-trophy-img" style="max-height: 400px; object-fit: contain; z-index: 1; position: relative; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.25));">
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
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="22"/><line x1="8" y1="22" x2="16" y2="22"/></svg>
                  </div>
                  <div class="an-card-num">1</div>
                </div>
                <h4 class="an-card-title">Best Presenter</h4>
                <p class="an-card-desc">Individu yang mampu menyampaikan, menjelaskan, dan mempertahankan materi inovasi dengan sangat baik.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                  </div>
                  <div class="an-card-num">2</div>
                </div>
                <h4 class="an-card-title">Best Makalah</h4>
                <p class="an-card-desc">Gugus dengan kualitas makalah terbaik dari sisi struktur, substansi, metodologi, dan penyajian.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><path d="m7 11 3-3 3 3 4-4"/></svg>
                  </div>
                  <div class="an-card-num">3</div>
                </div>
                <h4 class="an-card-title">Best Visual Communication</h4>
                <p class="an-card-desc">Gugus yang menyajikan materi dengan visual yang paling efektif, menarik, dan mudah dipahami.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                  </div>
                  <div class="an-card-num">4</div>
                </div>
                <h4 class="an-card-title">Best Safety Improvement</h4>
                <p class="an-card-desc">Inovasi yang memberikan peningkatan terbaik pada aspek keselamatan kerja dan pengendalian risiko.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
                  </div>
                  <div class="an-card-num">5</div>
                </div>
                <h4 class="an-card-title">Best Environment &amp; Sustainability</h4>
                <p class="an-card-desc">Inovasi yang memberikan dampak terbaik terhadap lingkungan dan keberlanjutan.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg>
                  </div>
                  <div class="an-card-num">6</div>
                </div>
                <h4 class="an-card-title">Best Technology &amp; Digital Innovation</h4>
                <p class="an-card-desc">Inovasi yang memanfaatkan teknologi atau solusi digital secara efektif dan relevan.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                  </div>
                  <div class="an-card-num">7</div>
                </div>
                <h4 class="an-card-title">Best Proven Financial Benefit</h4>
                <p class="an-card-desc">Inovasi dengan manfaat finansial terbesar yang telah terbukti dan terverifikasi.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                  </div>
                  <div class="an-card-num">8</div>
                </div>
                <h4 class="an-card-title">Best Collaboration</h4>
                <p class="an-card-desc">Gugus yang menunjukkan kolaborasi terbaik lintas fungsi, unit, atau anak perusahaan.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  </div>
                  <div class="an-card-num">9</div>
                </div>
                <h4 class="an-card-title">Best Transformation Behaviour</h4>
                <p class="an-card-desc">Gugus yang paling mencerminkan penerapan 8 Key Behaviours Transformasi ANTAM.</p>
              </div>
              <div class="an-award-card">
                <div class="an-card-icon-wrap">
                  <div class="an-card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                  </div>
                  <div class="an-card-num">10</div>
                </div>
                <h4 class="an-card-title">Best Replication Potential</h4>
                <p class="an-card-desc">Inovasi yang paling mudah direplikasi dan diterapkan di unit atau lokasi lain.</p>
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

    <!-- SLIDE 5: RANGKAIAN KEGIATAN -->
    <section id="jadwal" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container">
          <div class="section-header animate-on-scroll">
            <h2 class="section-title">Rangkaian Kegiatan</h2>
            <div class="divider"></div>
            <p class="section-desc">Klik pada kartu hari di bawah ini untuk melihat rincian rundown lengkap.</p>
          </div>

          <div class="days-grid">
            <div class="day-card animate-on-scroll" onclick="openModal(1)">
              <div class="day-card-img-header" style="background-image: url('assets/img/kedatangan.png?v=20260818-2');">
              </div>
              <div class="day-card-content">
                <h3 style="margin-bottom: 2px;">Selasa, 1 September 2026</h3>
                <p style="font-size: 0.9rem; color: #006d64; font-weight: 600; margin-bottom: 12px;">Kedatangan Peserta</p>
                <ul style="padding-left: 20px;">
                  <li>Penjemputan Peserta KMA XXV di Bandara Abdul Rachman Saleh</li>
                  <li>Makan Siang di Resto Warung Wareg</li>
                  <li>Check in Hotel, Registrasi & Pengambilan Souvenir Peserta KMA XXV</li>
                  <li>Welcoming Dinner</li>
                  <li>Performance Unit Bisnis dan Anak Perusahaan</li>
                </ul>
              </div>
            </div>

            <div class="day-card animate-on-scroll delay-100" onclick="openModal(2)">
              <div class="day-card-img-header" style="background-image: url('assets/img/convention.png?v=20260818-2');">
              </div>
              <div class="day-card-content">
                <h3 style="margin-bottom: 2px;">Rabu, 2 September 2026</h3>
                <p style="font-size: 0.9rem; color: #006d64; font-weight: 600; margin-bottom: 12px;">Convention & Presentasi</p>
                <ul style="padding-left: 20px;">
                  <li>Opening ANTAM BestMIND KMA XXV 2026</li>
                  <li>Launching Buku Jejak Langkah 25 Tahun Eksplorasi Unit Geomin</li>
                  <li>Leaders Talk: Jejak Langkah Eksplorasi Unit Geomin</li>
                  <li>Launching Official Theme Song KMA XXV</li>
                  <li>Presentasi Gugus</li>
                </ul>
              </div>
            </div>

            <div class="day-card animate-on-scroll delay-200" onclick="openModal(3)">
              <div class="day-card-img-header" style="background-image: url('assets/img/team.building.png?v=20260818-2');">
              </div>
              <div class="day-card-content">
                <h3 style="margin-bottom: 2px;">Kamis, 3 September 2026</h3>
                <p style="font-size: 0.9rem; color: #006d64; font-weight: 600; margin-bottom: 12px;">Team Building & Awarding</p>
                <ul style="padding-left: 20px;">
                  <li>Team Building</li>
                  <li>Wisata Oleh-Oleh</li>
                  <li>Closing & Awarding Night</li>
                </ul>
              </div>
            </div>

            <div class="day-card day-four animate-on-scroll delay-300" onclick="openModal(4)">
              <div class="day-card-img-header" style="background-image: url('assets/img/penutupan.png?v=20260818-2');">
              </div>
              <div class="day-card-content">
                <h3 style="margin-bottom: 2px;">Jumat, 4 September 2026</h3>
                <p style="font-size: 0.9rem; color: #006d64; font-weight: 600; margin-bottom: 12px;">Penutupan & Kepulangan</p>
                <ul style="padding-left: 20px;">
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

    <!-- SLIDE 6: DEEP DIVE -->
    <section id="deep-dive" class="slide an-section" style="background: #f8fafc; position: relative;">
      <div class="slide-scroll-wrapper">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
          <!-- Editorial Header -->
          <div class="dd-header animate-on-scroll">
            <div class="dd-num-large">06</div>
            <div class="dd-title-wrap">
              <h2 class="dd-title-display">DEEP DIVE<br><span style="color:#006d64;">INTERVIEW</span></h2>
              <p class="dd-subtitle">KMA XXV 2026</p>
              <div class="an-gold-bar" style="width: 60px; height: 5px; background: #d97706; margin-top: 20px; margin-bottom: 20px;"></div>
              <p class="dd-desc">Jadwal wawancara per stream, juri, gugus, dan unit. Klik masing-masing tiket untuk melihat jadwal lengkap.</p>
            </div>
          </div>
          
          <div id="deepDiveTables" class="deep-dive-grid-modern animate-on-scroll delay-100"></div>
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
          <div class="location-grid animate-on-scroll" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            <div class="day-card location-card" style="cursor: default;">
              <div class="day-card-img-header" style="background-image: url('assets/img/mercure.mirama.jpg'); height: 180px;">
                <div class="day-badge">HOTEL & CONVENTION</div>
              </div>
              <div class="day-card-content" style="padding: 20px; pointer-events: auto;">
                <h3 style="margin-bottom: 8px; font-size: 1.1rem;">Mercure Mirama Hotel</h3>
                <p style="color: #64748b; margin-bottom: 15px; font-size: 0.9rem;">Jl. Raden Panji Suroso No.7, Kota Malang, Jawa Timur</p>
                <a href="https://maps.app.goo.gl/TuQjnsZZyXWNcRGx7" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>
              </div>
            </div>

            <div class="day-card location-card" style="cursor: default;">
              <div class="day-card-img-header" style="background-image: url('assets/img/warung%20wareg.jpg?v=20260818-3'); height: 220px;">
                <div class="day-badge">MAKAN SIANG</div>
              </div>
              <div class="day-card-content" style="padding: 20px; pointer-events: auto;">
                <h3 style="margin-bottom: 8px; font-size: 1.1rem;">Resto Warung Wareg</h3>
                <p style="color: #64748b; margin-bottom: 15px; font-size: 0.9rem;">Batu, Malang, Jawa Timur</p>
                <a href="https://maps.app.goo.gl/kFcfna1EVPKxmJit5" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>
              </div>
            </div>

            <div class="day-card location-card" style="cursor: default;">
              <div class="day-card-img-header" style="background-image: url('assets/img/pagupon.jpg?v=20260818-3'); height: 220px;">
                <div class="day-badge">TEAM BUILDING</div>
              </div>
              <div class="day-card-content" style="padding: 20px; pointer-events: auto;">
                <h3 style="margin-bottom: 8px; font-size: 1.1rem;">Pagupon Camp</h3>
                <p style="color: #64748b; margin-bottom: 15px; font-size: 0.9rem;">Batu, Jawa Timur</p>
                <a href="https://maps.app.goo.gl/ADmDNfi9pxoynXcD6" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>
              </div>
            </div>

            <div class="day-card location-card" style="cursor: default;">
              <div class="day-card-img-header" style="background-image: url('assets/img/brawijaya.jpeg?v=20260818-3'); height: 220px;">
                <div class="day-badge">OLEH-OLEH</div>
              </div>
              <div class="day-card-content" style="padding: 20px; pointer-events: auto;">
                <h3 style="margin-bottom: 8px; font-size: 1.1rem;">Brawijaya Oleh Oleh</h3>
                <p style="color: #64748b; margin-bottom: 15px; font-size: 0.9rem;">Batu, Jawa Timur</p>
                <a href="https://maps.app.goo.gl/5bGhM3z2G2CzwC7X9" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- SLIDE KONTAK PANITIA -->
    <section id="kontak" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div id="kontak-content" class="container" style="margin-bottom: 40px;">
          <div class="section-header animate-on-scroll">
            <img src="assets/img/golnix.png?v=20260818-3" alt="Maskot GOLNIX" style="max-height: 120px; margin-bottom: 15px; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1));">
            <h2 class="section-title">Kontak Panitia</h2>
            <div class="divider"></div>
            <p class="section-desc">Punya pertanyaan seputar event KMA XXV?<br>Jangan ragu untuk menghubungi kami melalui jalur di bawah ini.</p>
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
              <div class="clist-arrow">â€º</div>
            </a>

            <button type="button" class="clist-item lo-toggle-button" onclick="toggleLoContacts()" aria-expanded="false" aria-controls="loContacts"><div class="clist-icon clist-wa"><span style="font-size:1.3rem;">◉</span></div><div class="clist-info"><span class="clist-label">WhatsApp</span><span class="clist-value">Tanya KMA (LO Unit)</span></div><div class="clist-arrow">›</div></button>
          <div id="loContacts" class="lo-contact-section animate-on-scroll delay-200" hidden>
            <h3>Kontak LO Peserta</h3>
            <p class="lo-contact-intro">Pilih unit peserta untuk menghubungi LO melalui WhatsApp.</p>
            <div class="lo-contact-grid">
              <a href="https://wa.me/6287874643444" target="_blank" rel="noopener"><strong>Unit Kolaka</strong><span>Utiah Sukarini · 0878 7464 3444</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6287974633444" target="_blank" rel="noopener"><strong>Unit Konawe Utara</strong><span>Utiah Sukarini · 0879 7464 3444</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6281293272929" target="_blank" rel="noopener"><strong>Unit Kalimantan Barat</strong><span>Yosafat Simanjuntak · 0812 9327 2929</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6281393272929" target="_blank" rel="noopener"><strong>PT ICA</strong><span>Yosafat Simanjuntak · 0813 9327 2929</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6281281802944" target="_blank" rel="noopener"><strong>Unit Pongkor</strong><span>Agus Sugiharto · 0812 8180 2944</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6281242234684" target="_blank" rel="noopener"><strong>Unit Maluku Utara</strong><span>Dedi Sunjaya · 0812 4223 4684</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6281340611919" target="_blank" rel="noopener"><strong>Unit Logam Mulia</strong><span>Bella Sakina · 0813 4061 1919</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6285258221237" target="_blank" rel="noopener"><strong>PT GAG Nikel</strong><span>Zakaria · 0852 5822 1237</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6282125149788" target="_blank" rel="noopener"><strong>PT SDA</strong><span>Oni Setia Himawan · 0821 2514 9788</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6282225149788" target="_blank" rel="noopener"><strong>PT NKA</strong><span>Oni Setia Himawan · 0822 2514 9788</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6281910022602" target="_blank" rel="noopener"><strong>Kantor Pusat</strong><span>Ruri Pitaloka · 0819 1002 2602</span><b>WhatsApp</b></a>
              <a href="https://wa.me/6282010022602" target="_blank" rel="noopener"><strong>Unit Geomin</strong><span>Ruri Pitaloka · 0820 1002 2602</span><b>WhatsApp</b></a>
            </div>
          </div>          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 7: DEWAN JURI -->
    <section id="juri" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container">
          
          <div class="ed-hero animate-on-scroll">
            <span class="ed-hero-subtitle">KMA XXV 2026</span>
            <h2 class="ed-hero-title">DEWAN JURI</h2>
            <p class="ed-hero-desc">Pakar dan praktisi terbaik yang akan menilai karya inovasi Anda.</p>
            <div class="ed-hero-number">05</div>
          </div>

          <div class="ed-profile-grid animate-on-scroll delay-100">
            <!-- Juri 1 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Dialah Hokosuja.png" alt="Dialah Hokosuja" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">01</div>
                <h3 class="ed-profile-name">Dialah Hokosuja</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>
            
            <!-- Juri 2 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Dodi Pramadi.png" alt="Dodi Pramadi" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">02</div>
                <h3 class="ed-profile-name">Dodi Pramadi</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

            <!-- Juri 3 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Eko Pudji.png" alt="Eko Pudji" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">03</div>
                <h3 class="ed-profile-name">Eko Pudji</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

            <!-- Juri 4 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Evi Sabrina.png" alt="Evi Sabrina" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">04</div>
                <h3 class="ed-profile-name">Evi Sabrina</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

            <!-- Juri 5 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Muhammad Amri.png" alt="Muhammad Amri" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">05</div>
                <h3 class="ed-profile-name">Muhammad Amri</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

            <!-- Juri 6 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Sri Prahyoto.png" alt="Sri Prahyoto" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">06</div>
                <h3 class="ed-profile-name">Sri Prahyoto</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

            <!-- Juri 7 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Susan Kustiwan.png" alt="Susan Kustiwan" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">07</div>
                <h3 class="ed-profile-name">Susan Kustiwan</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

            <!-- Juri 8 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Yudhistira.png" alt="Yudhistira" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">08</div>
                <h3 class="ed-profile-name">Yudhistira</h3>
                <span class="ed-profile-role">Dewan Juri</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 8: PANITIA -->
    <section id="panitia" class="slide section section-white">
      <div class="slide-scroll-wrapper">
        <div class="container">
          
          <div class="ed-hero animate-on-scroll">
            <span class="ed-hero-subtitle">KMA XXV 2026</span>
            <h2 class="ed-hero-title">PANITIA</h2>
            <div class="ed-hero-number">06</div>
          </div>

          <div class="ed-profile-grid animate-on-scroll delay-100">
            <!-- Panitia 1 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Agus Pajrin.png" alt="Agus Pajrin" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">01</div>
                <h3 class="ed-profile-name">Agus Pajrin</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 2 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Agus Sugiharto.jpeg" alt="Agus Sugiharto" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">02</div>
                <h3 class="ed-profile-name">Agus Sugiharto</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 3 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Bella Sakina.png" alt="Bella Sakina" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">03</div>
                <h3 class="ed-profile-name">Bella Sakina</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 4 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Dedi Sunjaya.png" alt="Dedi Sunjaya" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">04</div>
                <h3 class="ed-profile-name">Dedi Sunjaya</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 5 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Munif Hadi.png" alt="Munif Hadi" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">05</div>
                <h3 class="ed-profile-name">Munif Hadi</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 6 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Oni Setia Himawan.png" alt="Oni Setia Himawan" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">06</div>
                <h3 class="ed-profile-name">Oni Setia Himawan</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 7 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Ruri Pitaloka.png" alt="Ruri Pitaloka" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">07</div>
                <h3 class="ed-profile-name">Ruri Pitaloka</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 8 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Satriya Alrizki.png" alt="Satriya Alrizki" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">08</div>
                <h3 class="ed-profile-name">Satriya Alrizki</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 9 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Sofian.png" alt="Sofian" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">09</div>
                <h3 class="ed-profile-name">Sofian</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 10 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Utiah Sukarini.png" alt="Utiah Sukarini" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">10</div>
                <h3 class="ed-profile-name">Utiah Sukarini</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 11 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Yosafat Simanjuntak.png" alt="Yosafat Simanjuntak" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">11</div>
                <h3 class="ed-profile-name">Yosafat Simanjuntak</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

            <!-- Panitia 12 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Zakaria Budi.png" alt="Zakaria Budi" class="ed-profile-img">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">12</div>
                <h3 class="ed-profile-name">Zakaria Budi</h3>
                <span class="ed-profile-role">Panitia</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 11: JADWAL PRESENTASI -->
    <section id="presentasi" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container" style="padding-top: 50px; padding-bottom: 70px;">
          <div class="section-header animate-on-scroll">
            <p class="eyebrow">AGENDA PRESENTASI</p>
            <h2 class="section-title">Jadwal Presentasi</h2>
            <div class="divider"></div>
            <p class="section-desc">Jadwal presentasi akan diperbarui setelah data final dari panitia tersedia.</p>
          </div>          <div class="presentation-intro animate-on-scroll delay-100">
            <span class="presentation-kicker">PILIHAN FORMAT JADWAL</span>
            <p>Klik salah satu panel untuk melihat jadwal presentasi. Untuk SS1 dan SS2 tersedia dua opsi tampilan: gambar referensi dan tabel corporate.</p>
          </div>
          <div class="presentation-grid animate-on-scroll delay-200">
            <button type="button" class="presentation-card" onclick="togglePresentationInline('gkm1')"><span class="presentation-card-index">01</span><span class="presentation-card-label">GKM 1</span><strong>Jadwal Presentasi GKM 1</strong><span class="presentation-card-action">Buka jadwal <b>›</b></span></button>
            <button type="button" class="presentation-card" onclick="togglePresentationInline('gkm2')"><span class="presentation-card-index">02</span><span class="presentation-card-label">GKM 2</span><strong>Jadwal Presentasi GKM 2</strong><span class="presentation-card-action">Buka jadwal <b>›</b></span></button>
            <button type="button" class="presentation-card" onclick="togglePresentationInline('ss1')"><span class="presentation-card-index">03</span><span class="presentation-card-label">SS 1 · OPSI TABEL</span><strong>Jadwal Presentasi SS 1</strong><span class="presentation-card-action">Bandingkan dua versi <b>›</b></span></button>
            <button type="button" class="presentation-card" onclick="togglePresentationInline('ss2')"><span class="presentation-card-index">04</span><span class="presentation-card-label">SS 2 · OPSI TABEL</span><strong>Jadwal Presentasi SS 2</strong><span class="presentation-card-action">Bandingkan dua versi <b>›</b></span></button>
          </div>
          <div id="presentationInline" class="presentation-inline-panel" hidden></div>
        </div>
      </div>
    </section>
    <!-- SLIDE 12: EMERGENCY -->
    <section id="emergency" class="slide section section-light" style="padding-bottom: 0;">
      <div class="slide-scroll-wrapper">
        <div class="container" style="margin-bottom: 60px; padding-top: 40px;">
          <div class="section-header animate-on-scroll">
            <p class="eyebrow emergency-eyebrow">HSE INFORMATION</p>
            <h2 class="section-title" style="color: #b91c1c;">Emergency & Safety</h2>
            <div class="divider" style="background: #dc2626;"></div>
            <p class="section-desc">Informasi sementara untuk kebutuhan keselamatan peserta. Kontak final akan diperbarui oleh Tim HSE.</p>
          </div>
          <div class="emergency-grid animate-on-scroll delay-100">
            <article class="emergency-card emergency-primary">
              <div class="emergency-card-icon">!</div>
              <div><h3>Keadaan Darurat</h3><p>Hubungi <strong>112</strong> untuk layanan darurat umum atau koordinasikan segera dengan LO dan Tim HSE.</p></div>
            </article>
            <article class="emergency-card">
              <div class="emergency-card-icon">+</div>
              <div><h3>Klinik / Pos Medis</h3><p>Pos medis kegiatan: <strong>TBA oleh Tim HSE</strong>. Lokasi dan nomor kontak akan ditempel di venue dan hotel.</p></div>
            </article>
            <article class="emergency-card">
              <div class="emergency-card-icon">⌖</div>
              <div><h3>Rumah Sakit Terdekat</h3><p>Rujukan sementara: <strong>RSUD Dr. Saiful Anwar Malang</strong>. Nomor kontak dan rute akan dikonfirmasi oleh Tim HSE.</p></div>
            </article>
            <article class="emergency-card">
              <div class="emergency-card-icon">H</div>
              <div><h3>Kontak Tim HSE</h3><p>Koordinator HSE kegiatan: <strong>TBA</strong>. Simpan nomor LO unit untuk bantuan awal di lokasi.</p></div>
            </article>
          </div>
        </div>
        <footer class="footer"><div class="container"><p>&copy; 2026 PT ANTAM Tbk.</p></div></footer>
      </div>
    </section>

  </main>

  <!-- Navigation Controls (Bottom Bar) -->
  <div class="slide-nav-controls pill-nav">
    <button class="nav-btn prev-btn" id="prevBtn" onclick="prevSlide()" style="padding: 10px 20px;">
      <span class="nav-text" style="font-weight: bold;">Sebelumnya</span>
    </button>
    <div class="pill-nav-counter" id="pillNavCounter" style="font-weight: 700; color: #0f172a; font-size: 0.95rem; letter-spacing: 2px;">
      01 / 12
    </div>
    <button class="nav-btn next-btn" id="nextBtn" onclick="nextSlide()" style="padding: 10px 20px;">
      <span class="nav-text" style="font-weight: bold;">Selanjutnya</span>
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

    <!-- POPUP MODAL JADWAL PRESENTASI -->
  <div class="modal-overlay" id="presentationModal" onclick="closePresentationOnOverlay(event)">
    <div class="modal-container presentation-modal-container">
      <div class="modal-header"><div class="modal-title-wrap"><h3 id="presentationModalTitle">Jadwal Presentasi</h3><p id="presentationModalCategory">AGENDA PRESENTASI KMA XXV</p></div><button class="modal-close" onclick="closePresentation()">&times;</button></div>
      <div class="modal-body">
        <div id="presentationModalSwitch" class="presentation-switch" hidden><button type="button" class="presentation-switch-btn active" data-view="image" onclick="setPresentationView('image')">Versi Gambar</button><button type="button" class="presentation-switch-btn" data-view="table" onclick="setPresentationView('table')">Versi Tabel</button></div>
        <div id="presentationImageView" class="presentation-image-view"></div>
        <div id="presentationTableView" class="presentation-table-view" hidden></div>
      </div>
    </div>
  </div>
<script>/* -----------------------------------------
    const presentationData = {
      gkm1: { title: "Jadwal Presentasi GKM 1", image: "assets/img/jadwal%20presentasi/GKM1.JPEG?v=20260819-1", category: "GKM 1", table: false },
      gkm2: { title: "Jadwal Presentasi GKM 2", image: "assets/img/jadwal%20presentasi/GKM2.JPEG?v=20260819-1", category: "GKM 2", table: false },
      ss1: { title: "Jadwal Presentasi SS 1", image: "assets/img/jadwal%20presentasi/SS1.JPEG?v=20260819-1", category: "SS 1 · PERBANDINGAN OPSI", table: true, rows: [["01","Sesi presentasi SS 1","Mengacu jadwal pada asset SS1"],["02","Sesi presentasi SS 1","Mengacu jadwal pada asset SS1"],["03","Sesi presentasi SS 1","Mengacu jadwal pada asset SS1"],["04","Sesi presentasi SS 1","Mengacu jadwal pada asset SS1"]] },
      ss2: { title: "Jadwal Presentasi SS 2", image: "assets/img/jadwal%20presentasi/SS2.JPEG?v=20260819-1", category: "SS 2 · PERBANDINGAN OPSI", table: true, rows: [["01","Sesi presentasi SS 2","Mengacu jadwal pada asset SS2"],["02","Sesi presentasi SS 2","Mengacu jadwal pada asset SS2"],["03","Sesi presentasi SS 2","Mengacu jadwal pada asset SS2"],["04","Sesi presentasi SS 2","Mengacu jadwal pada asset SS2"]] }
    };
    function togglePresentationInline(id) {
      const data = presentationData[id];
      const panel = document.getElementById("presentationInline");
      if (!data || !panel) return;
      if (!panel.hidden && panel.dataset.active === id) {
        panel.hidden = true;
        panel.innerHTML = "";
        return;
      }
      panel.innerHTML = '<div class="presentation-inline-head"><div><span class="presentation-kicker">' + data.category + '</span><h3>' + data.title + '</h3></div><button type="button" class="presentation-inline-close" onclick="togglePresentationInline(' + "'" + id + "'" + ')">&times;</button></div><img class="presentation-schedule-image" src="' + data.image + '" alt="' + data.title + '">';
      if (data.table) {
        panel.innerHTML += '<div class="presentation-table-note">Versi tabel corporate tersedia pada panel Deep Dive SS.</div>';
      }
      panel.hidden = false;
      panel.dataset.active = id;
      panel.scrollIntoView({ behavior: "smooth", block: "nearest" });
    }
    function openPresentation(id) {
      const data = presentationData[id];
      if (!data) return;
      document.getElementById("presentationModalTitle").textContent = data.title;
      document.getElementById("presentationModalCategory").textContent = data.category;
      document.getElementById("presentationModalSwitch").hidden = !data.table;
      document.getElementById("presentationImageView").innerHTML = '<img class="presentation-schedule-image" src="' + data.image + '" alt="' + data.title + '">';
      const rows = data.rows || [];
      document.getElementById("presentationTableView").innerHTML = '<div class="presentation-table-note">Opsi tabel corporate untuk dibandingkan dengan versi gambar.</div><div class="deep-dive-table-scroll"><table class="presentation-schedule-table"><thead><tr><th>No.</th><th>Sesi / Kelompok</th><th>Catatan Jadwal</th></tr></thead><tbody>' + rows.map(function(row){ return '<tr><td>' + row[0] + '</td><td><strong>' + row[1] + '</strong></td><td>' + row[2] + '</td></tr>'; }).join('') + '</tbody></table></div>';
      setPresentationView("image");
      document.getElementById("presentationModal").classList.add("active");
    }
    function setPresentationView(view) {
      document.getElementById("presentationImageView").hidden = view !== "image";
      document.getElementById("presentationTableView").hidden = view !== "table";
      document.querySelectorAll(".presentation-switch-btn").forEach(function(btn){ btn.classList.toggle("active", btn.dataset.view === view); });
    }
    function closePresentation() { document.getElementById("presentationModal").classList.remove("active"); }
    function closePresentationOnOverlay(e) { if (e.target.id === "presentationModal") closePresentation(); }
    /* -----------------------------------------
       LOGIKA ACCORDION ANTAM BestMIND (SLIDE 2)
    ----------------------------------------- */
    function toggleBestmindAccordion(button) {
      button.classList.toggle('active');
      const content = document.getElementById('bestmindContent');
      content.classList.toggle('active');
    }/* -----------------------------------------
       SYSTEM AUDIO PLAYER
    ----------------------------------------- */
    const jingle = document.getElementById('bgJingle');
    const audioBtn = document.getElementById('audioToggleBtn');
    const audioIcon = document.getElementById('audioIcon');
    let isPlaying = false;

    function enableAudioOnInteraction() {
      if (!isPlaying) {
        jingle.muted = false;
        jingle.play().then(() => {
          isPlaying = true;
          audioBtn.classList.add('playing');
          audioIcon.innerHTML = `
            <path d="M11 5L6 9H2v6h4l5 4V5z"></path>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
          `;
          removeAllAudioListeners();
        }).catch(err => {
          console.warn("Gagal memutar audio otomatis:", err);
        });
      }
    }

    function removeAllAudioListeners() {
      document.removeEventListener('click', enableAudioOnInteraction);
      document.removeEventListener('touchstart', enableAudioOnInteraction);
      document.removeEventListener('keydown', enableAudioOnInteraction);
      document.removeEventListener('scroll', enableAudioOnInteraction, true);
    }

    function toggleAudio(e) {
      if (e) e.stopPropagation();

      if (isPlaying && !jingle.paused) {
        jingle.pause();
        isPlaying = false;
        audioBtn.classList.remove('playing');
        audioIcon.innerHTML = `
          <path d="M11 5L6 9H2v6h4l5 4V5z"></path>
          <line x1="23" y1="9" x2="17" y2="15"></line>
          <line x1="17" y1="9" x2="23" y2="15"></line>
        `;
      } else {
        jingle.muted = false;
        jingle.play().then(() => {
          isPlaying = true;
          audioBtn.classList.add('playing');
          audioIcon.innerHTML = `
            <path d="M11 5L6 9H2v6h4l5 4V5z"></path>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
          `;
          removeAllAudioListeners();
        });
      }
    }

    document.addEventListener('click', enableAudioOnInteraction);
    document.addEventListener('touchstart', enableAudioOnInteraction);
    document.addEventListener('keydown', enableAudioOnInteraction);
    document.addEventListener('scroll', enableAudioOnInteraction, true);/* -----------------------------------------
       LOGIKA TOGGLE DROPDOWN MENU
    ----------------------------------------- */
    function toggleDropdown(e) {
      if (e) e.stopPropagation();
      const dropdown = document.getElementById('menuDropdown');
      dropdown.classList.toggle('active');
    }

    function selectMenu(slideIndex) {
      goToSlide(slideIndex);
      const dropdown = document.getElementById('menuDropdown');
      dropdown.classList.remove('active');
    }

    document.addEventListener('click', function(e) {
      const dropdown = document.getElementById('menuDropdown');
      if (dropdown && !dropdown.contains(e.target)) {
        dropdown.classList.remove('active');
      }
    });/* -----------------------------------------
       HIGHLIGHT MODAL DATA & FUNCTIONS
    ----------------------------------------- */
    const highlightData = {
      'bestmind': {
        title: "ANTAM BestMIND",
        category: "EKOSISTEM INOVASI & PEMBELAJARAN",
        content: `
          <p style="margin-bottom: 12px;"><strong>ANTAM BestMIND</strong> merupakan payung besar ekosistem inovasi, perbaikan berkelanjutan, dan manajemen pengetahuan di lingkungan PT ANTAM Tbk.</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Knowledge Management:</strong> Pengelolaan aset intelektual untuk memastikan transfer pengetahuan antar generasi berjalan optimal.</li>
            <li><strong>Continuous Improvement:</strong> Menjadi wadah pembinaan Gugus Kendali Mutu (GKM) dan Sistem Saran (SS) di seluruh unit.</li>
            <li><strong>Innovation Hub:</strong> Pusat pengembangan gagasan baru untuk meningkatkan keunggulan kompetitif perusahaan secara global.</li>
          </ul>
        `
      },
      1: {
        title: "Jejak Langkah 25 Tahun Eksplorasi Unit Geomin",
        category: "LAUNCHING BUKU",
        content: `<p><strong>Jejak Langkah 25 Tahun Eksplorasi Unit Geomin</strong> merekam perjalanan panjang di balik setiap sumber daya dan cadangan mineral ANTAM—perjalanan yang dibangun dari ketekunan, dedikasi, dan mental tangguh untuk menapaki wilayah yang belum terjamah, membaca tanda-tanda geologi, serta mengubah potensi menjadi keyakinan geologi yang bernilai bagi perusahaan dan negeri.</p>
          <p>Unit Geomin telah hadir sejak 1974 dan menjadi ujung tombak ANTAM dalam mencari, menemukan, membuktikan, serta mengembangkan sumber daya dan cadangan mineral. Dari Sumatra hingga Papua, jejak Insan Geomin terbentang melintasi pegunungan, hutan, sungai, pesisir, dan wilayah terpencil Nusantara.</p>
          <p>Rentang <strong>2000–2025</strong> dipilih sebagai bingkai editorial untuk merefleksikan seperempat abad perjalanan eksplorasi kontemporer Unit Geomin sekaligus menyelaraskannya dengan momentum Silver Jubilee KMA XXV. Periode ini menjadi ruang untuk melihat kembali perjalanan, mengambil pembelajaran, dan menyiapkan pijakan berikutnya.</p>
          <p>Ratusan sampel, jutaan rekaman data geologi, dan ribuan hari kerja lapangan merangkai cerita tentang bauksit, emas, nikel, serta potensi mineral lain yang dicari, dikenali, diuji, dan dibuktikan hingga menjadi sumber daya serta cadangan yang menopang keberlanjutan bisnis ANTAM.</p>
          <p>Buku ini menjadi rekam ingatan organisasi, dokumentasi pengetahuan eksplorasi, sekaligus penghormatan kepada generasi Insan Geomin. Lebih dari sekadar mengenang masa lalu, buku ini menjadi jembatan pengetahuan antargenerasi—agar pengalaman lapangan menjadi pembelajaran, inspirasi, dan pijakan bagi generasi eksplorasi berikutnya.</p>
          <p><em>Eksplorasi tidak pernah sekadar mencari mineral. Ia adalah keberanian mencari kemungkinan, membuktikan harapan, dan menyiapkan masa depan.</em></p>`
      },
      'prosiding': {
        title: "Prosiding Inovasi 25 Tahun",
        category: "REFLEKSI PERJALANAN INOVASI",
        content: `<p><strong>Prosiding Inovasi 25 Tahun</strong> hadir sebagai dokumentasi perjalanan budaya mutu, kreativitas, dan <em>continuous improvement</em> di ANTAM. Disusun dalam momentum <strong>Silver Jubilee KMA XXV</strong>, prosiding ini merefleksikan konsistensi ANTAM membangun ekosistem inovasi selama seperempat abad sebagai bagian dari perjalanan transformasi perusahaan.</p>
          <p>Dalam kurun waktu 25 tahun, <strong>lebih dari 332 inovasi</strong> lahir dari berbagai insan, unit, dan fungsi di ANTAM. Setiap inovasi merepresentasikan upaya nyata untuk meningkatkan produktivitas, efisiensi, keselamatan, kualitas proses, pemanfaatan teknologi, serta nilai tambah yang mendukung keberlanjutan bisnis.</p>
          <p>Lebih dari sekadar kumpulan karya, prosiding ini menjadi <strong>rekam jejak kematangan budaya inovasi ANTAM</strong>—budaya yang terus dikembangkan untuk mendukung transformasi menuju organisasi yang adaptif, kolaboratif, digital, kompetitif, dan berorientasi pada <em>sustainable growth</em>.</p>
          <p>Melalui inovasi yang terus tumbuh dan direplikasi, ANTAM tidak hanya memperbaiki cara bekerja hari ini, tetapi juga membangun fondasi masa depan yang lebih efisien, resilient, bertanggung jawab, dan berkelanjutan.</p>
          <p><strong>Dari ide menjadi solusi, dari solusi menjadi transformasi, dan dari transformasi menjadi pertumbuhan ANTAM yang berkelanjutan.</strong></p>`
      },
      2: {
        title: "Official Theme Song KMA XXV",
        category: "IDENTITAS MUSIKAL KMA XXV",
        content: `
          <p><strong>Official Theme Song KMA XXV</strong> menjadi identitas musikal perayaan 25 tahun budaya mutu, inovasi, dan continuous improvement ANTAM.</p>
          <p>Lagu ini membawa semangat kebersamaan dan menyelaraskan energi acara dengan tema <em>25 Years of Continuous Improvement: Powering Sustainable Growth, Transforming the Future</em>.</p>
          <div class="theme-song-points"><span>Semangat kebersamaan</span><span>Energi inovasi</span><span>Transformasi berkelanjutan</span></div>
          <p style="margin-top:14px;">Notasi balok dan lirik tersedia dalam dokumen resmi berikut. Dokumen dapat dibaca langsung atau diunduh untuk latihan dan produksi acara.</p>
          <div style="border:1px solid #e2e8f0;border-radius:12px;overflow:hidden;margin-bottom:14px;"><embed src="assets/JINGLE%20KMA%20-%20notasi.pdf?v=20260818-2" type="application/pdf" width="100%" height="430"></div>
          <a class="btn btn-outline" href="assets/JINGLE%20KMA%20-%20notasi.pdf?v=20260818-2" download>Unduh Notasi & Lirik PDF</a>
        `
      },      5: {
        title: "ANTAM Hackathon 2026",
        category: "KOMPETISI INOVASI TERBUKA",
        content: `
          <div style="background: #f8fafc; padding: 15px; border-radius: 10px; border-left: 4px solid #d97706; margin-bottom: 15px;">
            <p style="margin: 0; font-weight: bold; color: #0f172a;">Status Pendaftaran:</p>
            <p style="margin: 0; color: #475569;">Pendaftaran dibuka hingga 15 Juni 2026</p>
          </div>
          <div style="margin-bottom: 15px;">
            <p style="margin: 0; font-weight: bold; color: #0f172a; font-size: 1.1rem;">Total Peserta: <span style="color: #006d64;">77 Tim</span></p>
          </div>
          <p style="margin-bottom: 8px; font-weight: bold;">Berdasarkan Tema:</p>
          <ul style="padding-left: 20px; margin-bottom: 16px;">
            <li><strong>Eksplorasi:</strong> 46 tim</li>
            <li><strong>Pengolahan Mineral:</strong> 18 tim</li>
            <li><strong>Penambangan:</strong> 13 tim</li>
          </ul>
          <div style="margin-top:18px;">
            <p style="margin-bottom:8px;font-weight:800;color:#0f172a;">Asal Kampus (25 kampus · 77 tim)</p>
            <div class="hackathon-campus-grid">
              <span>Institut Teknologi Bandung <b>12</b></span><span>Institut Teknologi Sains Bandung <b>7</b></span><span>Universitas Syiah Kuala <b>8</b></span><span>Institut Teknologi Sepuluh Nopember <b>5</b></span><span>Institut Teknologi Sumatera <b>4</b></span><span>Universitas Gadjah Mada <b>5</b></span><span>Universitas Brawijaya <b>4</b></span><span>Universitas Negeri Padang <b>4</b></span><span>UPN Veteran Yogyakarta <b>4</b></span><span>Universitas Jenderal Soedirman <b>3</b></span><span>Universitas Indonesia <b>2</b></span><span>Telkom University <b>2</b></span><span>Universitas Khairun Ternate <b>2</b></span><span>Universitas Trisakti <b>2</b></span><span>PEP Bandung <b>1</b></span><span>Universitas Islam Riau <b>1</b></span><span>Universitas Jember <b>1</b></span><span>Universitas Lambung Mangkurat <b>1</b></span><span>Universitas Muhammadiyah Yogyakarta <b>1</b></span><span>Universitas Padjadjaran <b>1</b></span><span>Universitas Palangka Raya <b>1</b></span><span>Universitas Pattimura <b>1</b></span><span>Universitas Presiden <b>1</b></span><span>Universitas Sriwijaya <b>1</b></span><span>Universitas Tanjungpura <b>1</b></span>
            </div>
          </div>
          <p style="font-size:0.85rem;color:#64748b;font-style:italic;margin-top:14px;">Data peserta dan kampus bersumber dari rekapitulasi Hackathon 2026 pada materi revisi.</p>
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

    function toggleLoContacts() {
      const panel = document.getElementById('loContacts');
      const button = document.querySelector('.lo-toggle-button');
      if (!panel) return;
      panel.hidden = !panel.hidden;
      if (button) { button.setAttribute('aria-expanded', String(!panel.hidden)); button.querySelector('.clist-arrow').textContent = panel.hidden ? '›' : '⌃'; }
    }
    function closeHighlightModalOnOverlay(e) {
      if (e.target.id === 'highlightModal') {
        closeHighlightModal();
      }
    }/* -----------------------------------------
       RUNDOWN MODAL DATA & FUNCTIONS
    ----------------------------------------- */
    const rundownData = {
      1: {
        title: "DAY 1",
        date: "Selasa, 1 September 2026",
        dresscode: "",
        items: [
          { time: "08:00:00 - 12:00:00", title: "Kedatangan Flight 1 & handling Baggage", desc: "Bandar Udara Abdul Rachman Saleh " },
          { time: "12:00:00 - 13:00:00", title: "Mobilisasi ke resto ", desc: "Bandara - Resto" },
          { time: "13:00:00 - 15:00:00", title: "Makan Siang ", desc: "Omah Warung Wareg" },
          { time: "15:00:00 - 15:15:00", title: "Mobilisasi ke Hotel", desc: "Hotel Grand Mercure Malang" },
          { time: "15:15:00 - 17:45:00", title: "Checkin & Free time", desc: "Siapkan 1 meja 2 kursi (helpdesk)" },
          { time: "17:45:00 - 18:15:00", title: "Persiapan Dinner Ballroom  ", desc: "" },
          { time: "18:15:00 - 18:30:00", title: "Registrasi ", desc: "Souvenir, Bendera, Nametag,Handclaper  " },
          { time: "", title: "Foto Kontingen (12 Kontingen)", desc: "" },
          { time: "18:30:00 - 19:30:00", title: "Dinner ", desc: "Ballroom Hotel Grand Mercure Malang " },
          { time: "19:30:00 - 19:35:00", title: "Safety Breifing ", desc: "Video/Live Security " },
          { time: "19:30:00 - 19:35:00", title: "Opening MC", desc: "" },
          { time: "19:35:00 - 19:40:00", title: "Welcoming Speech Direksi/GM ", desc: "" },
          { time: "19:40:00 - 22:00:00", title: "Performance", desc: "Meja Juri di roundtable " },
          { time: "", title: "1 Pemenang", desc: "Piala (Best Performance) + Mockup " },
          { time: "", title: "Foto Kontingen (12 Kontingen)", desc: "Photobooth " },
          { time: "22:00:00 - 06:00", title: "Istirahat ", desc: "" },
        ]
      },
      2: {
        title: "DAY 2",
        date: "Rabu, 2 September 2026",
        dresscode: "",
        items: [
          { time: "06:00 - 08:30", title: "Sarapan + Foto Print Ballroom ", desc: "Resto Lt 2 Grand Mercure Malang" },
          { time: "08:30 - 08:50", title: "Masuk Ballroom & Seating", desc: "" },
          { time: "08:50 - 08:55", title: "Opening Dance", desc: "Dancer " },
          { time: "08:55 - 09:00", title: "Opening MC", desc: "Mba Rica" },
          { time: "09:00 - 09:05", title: "Indonesia Raya", desc: "" },
          { time: "09:05 - 09:10", title: "Mars Antam ", desc: "" },
          { time: "09:10 - 09:15", title: "Doa", desc: "Doa Live " },
          { time: "09:15 - 09:25", title: "Sambutan Ketua Panitia", desc: "" },
          { time: "09:25 - 09:30", title: "Sambutan GM Geomin", desc: "Podium - Cetak logo " },
          { time: "09:30 - 09:40", title: "Sambutan Direksi ANTAM ", desc: "" },
          { time: "09:25 - 09:30", title: "Launching Logo & Maskot KMA 25", desc: "Jadikan 1 video Grafis sesuaikan key dan lebih atraktif 2menit " },
          { time: "09:40 - 09:50", title: "Peluncuran Jingle KMA 25 ", desc: "Paduan Suara" },
          { time: "09:50 - 10:05", title: "Launching Proceeding dan Launching Buku ", desc: "Present Proceeding " },
          { time: "10:05 - 10:25", title: "Leader Talk : Bapak Elwin Elbur", desc: "VP Exploration" },
          { time: "10:25 - 10:35", title: "Foto Bersama", desc: "      " },
          { time: "10:35 - 10:43", title: "Lagu Pilihan", desc: "Paduan Suara (20 orang)" },
          { time: "10:43 - 10:58", title: "Coffe Break ", desc: "" },
          { time: "10:58 - 11:58", title: "Presentasi 67 Gugus GKM/SS  ( 4 Breakout Room )", desc: "lt 3 dedicated fg setiap ruangan " },
          { time: "11:58 - 12:58", title: "Ishoma", desc: "" },
          { time: "12:58 - 15:58", title: "Presentasi 67 Gugus GKM/SS  ( 4 Breakout Room )", desc: "lt 3 dedicated fg setiap ruangan " },
          { time: "15:58 - 16:28", title: "Recap Juri & Buffer time", desc: "" },
          { time: "16:28 - 17:58", title: "Istirahat ", desc: "" },
          { time: "17:58 - 21:58", title: "Dinner & Networking", desc: "Resto lt 2 + Akustik Hotel " },
          { time: "21:58 - 05:58", title: "Istirahat", desc: "" },
        ]
      },
      3: {
        title: "DAY 3",
        date: "Kamis, 3 September 2026",
        dresscode: "",
        items: [
          { time: "05:58 - 06:58", title: "Sarapan ", desc: "Resto Hotel" },
          { time: "06:58 - 07:28", title: "Persiapan ke Bus ", desc: "Hotel " },
          { time: "07:28 - 08:58", title: "Perjalanan ke Coban Talun ", desc: "" },
          { time: "08:58 - 09:28", title: "Bus ke Coban Talun ", desc: "" },
          { time: "08:58 - 09:28", title: "Coffe Break ", desc: "di selasar lapangan " },
          { time: "09:28 - 11:58", title: "Ice Breaking + Tim Building ", desc: "Coban Talun " },
          { time: "11:58 - 13:13", title: "Ishoma + Music ", desc: "" },
          { time: "13:13 - 13:53", title: "Perjalanan ke Brawijaya Istana Oleh Oleh ", desc: "" },
          { time: "13:53 - 15:53", title: "Wisata Oleh Oleh ", desc: "Brawijaya Oleh oleh " },
          { time: "15:53 - 16:43", title: "Perjalanan Ke Hotel Grand Mercure Malang", desc: "" },
          { time: "16:43 - 17:58", title: "Istirahat", desc: "Hotel Grand Mercure Malang" },
          { time: "17:58 - 18:58", title: "Makan Malam", desc: "Band " },
          { time: "18:58 - 19:08", title: "Opening MC", desc: "" },
          { time: "19:08 - 19:13", title: "Menyanyikan Jingle KMA 25", desc: "Music On Audio + Text" },
          { time: "19:13 - 19:28", title: "Sambutan Direksi ANTAM ", desc: "" },
          { time: "19:28 - 19:38", title: "Pengumuman Pemenang (33-6)ss - (33-6) GKM", desc: "Kategori Gold " },
          { time: "19:38 - 19:53", title: "Pemenang Penghargaan Kategori lainnya ", desc: "Mockup Board" },
          { time: "19:53 - 20:13", title: "Pengumuman Juara 5,4, 3, 2,1 SS dan GKM ", desc: "Naik 1,2,3 (segugus GKM max 5, SS max 3) Piala + Mockup Board" },
          { time: "20:13 - 20:23", title: "Juara Umum ", desc: "Naik 25 orang 1 unit " },
          { time: "20:23 - 20:38", title: "Juara 1,23 + Juara Umum", desc: "Convetti " },
          { time: "20:23 - 20:28", title: "Penyerahan tuan rumah KMA ", desc: "Bumper Logam Mulia - Bendera Logo 25 " },
          { time: "20:28 - 20:38", title: "Tanah Airku & Padamu Negeri ", desc: "" },
          { time: "20:38 - 20:53", title: "Foto Bersama & Penutupan ", desc: "" },
          { time: "20:53 - 21:53", title: "Band", desc: "" },
          { time: "", title: "DJ ", desc: "Covetti" },
          { time: "21:53 - 05:58", title: "Istirahat", desc: "Hotel " },
        ]
      },
      4: {
        title: "DAY 4",
        date: "Jumat, 4 September 2026",
        dresscode: "",
        items: [
          { time: "05:58 - 07:58", title: "Sarapan", desc: "Hotel Grand Mercure Malang" },
          { time: "07:58 - 08:28", title: "Checkout", desc: "Hotel Grand Mercure Malang" },
          { time: "", title: "Mobilisasi ke Bandara ", desc: "Bus " },
        ]
      },
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
    }/* -----------------------------------------
       SLIDE DECK NAVIGATION & COUNTDOWN LOGIC
    ----------------------------------------- */
    const deepDiveData = [
      {title:'GKM 1 — Stream Arjuno', judges:'Sri Prahyoto · Muhammad Amri', columns:['Waktu','Gugus','Unit'], rows:[['08:00–08:25','MINOVA','GEOMIN'],['08:25–08:50','BIG TUBE','GEOMIN'],['08:50–09:15','SI-EMAS','GEOMIN'],['09:15–09:40','LRT','LM'],['09:40–10:05','MBAH LOGAM','LM'],['10:05–10:30','HSGE','LM'],['10:30–10:55','FRONT','UBPE'],['10:55–11:20','MILL','UBPE'],['11:20–11:45','RUHAY','UBPE'],['11:45–13:00','BREAK','—'],['13:00–13:25','KAMIT','KALBAR'],['13:25–13:50','BOBUBE','KALBAR'],['13:50–14:15','GREEN ENERGY TRANSFORMATION 1.0','KALBAR'],['14:15–14:40','OPTIMA','ICA'],['14:40–15:05','KING','ICA'],['15:05–15:30','STRATOR','ICA'],['15:30–15:55','PERMITRON','KP'],['15:55–16:20','GAIN','KP']]},
      {title:'GKM 2 — Stream Welirang', judges:'Dodi Pramadi · Evi Sabrina', columns:['WIB','WIT/WITA','Zona · Gugus · Unit'], rows:[['08:00–08:25','10:00–10:25','WIT · GEOTECH GACOR · GAG'],['08:25–08:50','10:25–10:50','WIT · TOKEK BELANG · GAG'],['08:50–09:15','10:50–11:15','WIT · BNPB · GAG'],['09:15–09:40','11:15–11:40','WIT · D’COLLABS · NKA'],['09:40–10:05','11:40–12:05','WIT · SOLLUS · SDA'],['10:05–10:30','12:05–12:30','WIT · OBSIDIA TANK · SDA'],['10:30–10:55','12:30–12:55','WIT · AMIRA · MALUT'],['10:55–11:20','12:55–13:20','WIT · TORANG JUARA · MALUT'],['11:20–11:45','13:20–13:45','WIT · BEJO · MALUT'],['11:45–13:00','12:45–14:00','WITA · BREAK · —'],['13:00–13:25','14:00–14:25','WITA · GHOST BUSTER · KOLAKA'],['13:25–13:50','14:25–14:50','WITA · GACOAN · KOLAKA'],['13:50–14:15','14:50–15:15','WITA · REFRAC-LW · KOLAKA'],['14:15–14:40','15:15–15:40','WITA · EDGE ANOA · KONUT'],['14:40–15:05','15:40–16:05','WITA · PIT MASTER · KONUT'],['15:05–15:30','16:05–16:30','WITA · SATU DATA · KONUT']]},
      {title:'SS 1 — Stream Bromo', judges:'Susan Kustiawan · Dilah Hokosuja Hutabalian', columns:['Mulai','Selesai','Gugus · Unit'], rows:[['08:00','08:20','ALIEN GAMMA · GEOMIN'],['08:20','08:40','THE RECONCILIATOR · GEOMIN'],['08:40','09:00','SILA · GEOMIN'],['09:00','09:20','DIESMAKING · LM'],['09:20','09:40','BUKAN KARYAWAN BIASA · LM'],['09:40','10:00','KUDETA · LM'],['10:00','10:20','SUNDUNG · UBPE'],['10:20','10:40','BUBULAK · UBPE'],['10:40','11:00','ZONA · UBPE'],['11:00','11:20','HELPLESS · KALBAR'],['11:20','11:40','RIBAK SUDE · KALBAR'],['11:40','12:00','SIAP · KALBAR'],['12:00','13:00','BREAK · —'],['13:00','13:20','SUPER JET MILL · ICA'],['13:20','13:40','SAFETY CAN BE FUN · ICA'],['13:40','14:00','STRATEJIK 2 · ICA'],['14:00','14:20','INTERNAL AUDIT ULTIMATE · KP'],['14:20','14:40','ULTIMA · KP'],['14:40','15:00','MIND SAFE · KP']]},
      {title:'SS 2 — Stream Semeru', judges:'Eko Pudji Putranto · Yudhistira Sudesno', columns:['WIB','WIT/WITA','Zona · Gugus · Unit'], rows:[['08:00–08:20','10:00–10:20','WIT · PINANG COKLAT · GAG'],['08:20–08:40','10:20–10:40','WIT · KOMIKA · GAG'],['08:40–09:00','10:40–11:00','WIT · HOKI · GAG'],['09:00–09:20','11:00–11:20','WIT · SEPIA · NKA'],['09:20–09:40','11:20–11:40','WIT · ORE-GANIZED · NKA'],['09:40–10:00','11:40–12:00','WIT · FLYING DUSTMAN · NKA'],['10:00–10:20','12:00–12:20','WIT · WAYA GANI GUNA · SDA'],['10:20–10:40','12:20–12:40','WIT · DIGINOVA · SDA'],['10:40–11:00','12:40–13:00','WIT · PALUGADA · SDA'],['11:00–11:20','13:00–13:20','WIT · COWCOASTE REBORN · MALUT'],['11:20–11:40','13:20–13:40','WIT · ARMOR · MALUT'],['11:40–12:00','13:40–14:00','WIT · D’GEOL · MALUT'],['12:00–13:00','—','BREAK · —'],['13:00–13:20','14:00–14:20','WITA · KOMPARATOR · KOLAKA'],['13:20–13:40','14:20–14:40','WITA · STATERMAN · KOLAKA'],['13:40–14:00','14:40–15:00','WITA · CAPSULE · KOLAKA'],['14:00–14:20','15:00–15:20','WITA · GREEN ENVIRO · KONUT'],['14:20–14:40','15:20–15:40','WITA · ROGER · KONUT'],['14:40–15:00','15:40–16:00','WITA · LAI LAIKA · KONUT']]}
    ];
    function renderDeepDiveTables() {
      const root = document.getElementById('deepDiveTables'); if (!root) return;
      root.innerHTML = deepDiveData.map((stream, idx) => {
        const num = String(idx + 1).padStart(2, '0');
        const titleParts = stream.title.split(' — ');
        const type = titleParts[0];
        const name = titleParts[1] ? titleParts[1] : '';
        const isRightAligned = idx % 2 !== 0;
        
        return `<article class="dd-ticket ${isRightAligned ? 'dd-ticket-right' : ''}">
          <div class="dd-ticket-bg">${num}</div>
          <div class="dd-ticket-content">
            <div class="dd-ticket-header">
              <span class="dd-ticket-type">${type}</span>
              <h3 class="dd-ticket-name">${name.toUpperCase()}</h3>
            </div>
            <div class="dd-ticket-body">
              <div class="dd-ticket-divider"></div>
              <p class="dd-ticket-judges">${stream.judges.replace(/ · /g, '<br>')}</p>
            </div>
            <div class="dd-ticket-footer">
              <span class="dd-btn-text">Lihat Jadwal <span class="dd-arrow">→</span></span>
            </div>
          </div>
          <div class="dd-table-wrap">
            <table><thead><tr>${stream.columns.map(c => `<th>${c}</th>`).join('')}</tr></thead><tbody>${stream.rows.map(row => `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`).join('')}</tbody></table>
          </div>
        </article>`;
      }).join('');
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

      renderDeepDiveTables();
      document.getElementById('deepDiveTables')?.addEventListener('click', function(e) { const panel=e.target.closest('.dd-ticket'); if(panel) panel.classList.toggle('open'); });
      observeAnimations(slides[0]);

      function updateSlide(index) {
        if (index < 0 || index >= slides.length) return;

        slides[currentSlide].classList.remove('active');
        if(dots.length > 0 && dots[currentSlide]) dots[currentSlide].classList.remove('active');

        currentSlide = index;

        slides[currentSlide].classList.add('active');
        if(dots.length > 0 && dots[currentSlide]) dots[currentSlide].classList.add('active');
        
        const pillCounter = document.getElementById('pillNavCounter');
        if(pillCounter) {
          pillCounter.innerText = String(currentSlide + 1).padStart(2, '0') + " / " + String(slides.length).padStart(2, '0');
        }

        observeAnimations(slides[currentSlide]);

        const activeWrapper = slides[currentSlide].querySelector('.slide-scroll-wrapper');
        if (activeWrapper) activeWrapper.scrollTop = 0;

        if (prevBtn) prevBtn.disabled = (currentSlide === 0);
        if (nextBtn) nextBtn.disabled = (currentSlide === slides.length - 1);
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

      updateSlide(0);

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
      setInterval(updateCountdown, 1000);/* -----------------------------------------
         ANIMASI INTERAKTIF: 3D PARALLAX HOVER & RIPPLE
      ----------------------------------------- */
      const interactiveCards = document.querySelectorAll('.kh-card, .day-card, .an-award-card');

      interactiveCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
          const rect = card.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
          
          const centerX = rect.width / 2;
          const centerY = rect.height / 2;
          
          const rotateX = ((y - centerY) / centerY) * -6;
          const rotateY = ((x - centerX) / centerX) * 6;

          card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`;
        });

        card.addEventListener('mouseleave', () => {
          card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
        });
      });

      // Ripple Click Effect pada Tombol & Kartu
      const clickables = document.querySelectorAll('.kh-card, .day-card, .btn, .nav-btn');

      clickables.forEach(element => {
        element.classList.add('ripple-effect');
        element.addEventListener('click', function(e) {
          const rect = this.getBoundingClientRect();
          const circle = document.createElement('span');
          
          const diameter = Math.max(rect.width, rect.height);
          const radius = diameter / 2;

          circle.style.width = circle.style.height = `${diameter}px`;
          circle.style.left = `${e.clientX - rect.left - radius}px`;
          circle.style.top = `${e.clientY - rect.top - radius}px`;
          circle.classList.add('ripple-circle');

          const ripple = this.querySelector('.ripple-circle');
          if (ripple) {
            ripple.remove();
          }

          this.appendChild(circle);
        });
      });
    });
  </script>
</body>
</html>
