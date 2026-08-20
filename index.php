<?php
require_once __DIR__ . '/auth_config.php';
if (!isAuthenticated()) {
    header('Location: login.php');
    exit;
}
$awardGuideMarkdown = file_exists(__DIR__ . '/assets/panduan penilaian.md') ? file_get_contents(__DIR__ . '/assets/panduan penilaian.md') : '';
$awardGuideJson = json_encode($awardGuideMarkdown, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$awardCardMarkdown = file_exists(__DIR__ . '/assets/penghargaan.md') ? file_get_contents(__DIR__ . '/assets/penghargaan.md') : '';
$awardCardJson = json_encode($awardCardMarkdown, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
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
  <link rel="stylesheet" href="assets/css/style.css?v=87">
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
  
      .dd-ticket .dd-table-wrap { display: none; }
      .dd-ticket.open .dd-table-wrap { display: block; }
</style>
<style>
      .dd-ticket.open .dd-chevron { transform: translateY(-50%) rotate(180deg) !important; }
      .dd-ticket.open .dd-table-wrap { display: block !important; }
    
      .dd-ticket .dd-table-wrap { display: none; }
      .dd-ticket.open .dd-table-wrap { display: block; }
</style>

    <style>
      /* Header fixes */
      @media (max-width: 768px) {
        .header-inner { flex-wrap: wrap; justify-content: space-between; align-items: center; }
        .logo-text { font-size: 0.9rem; margin-top: 4px; }
        .nav { width: 100%; justify-content: flex-end; margin-top: 10px; gap: 6px !important; }
        .nav-audio-btn { padding: 4px 8px; font-size: 0.75rem; }
        .nav-logout { padding: 4px 8px !important; font-size: 0.75rem !important; }
        .dropbtn { padding: 4px 8px; font-size: 0.75rem; }
      }
      /* Bottom Nav (Pill style) */
      .slide-nav-controls.pill-nav {
        background: #1e293b !important;
        border-radius: 50px !important;
        padding: 6px 6px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
        border: none !important;
        width: max-content !important;
        margin: 0 auto !important;
        bottom: 20px !important;
      }
      .pill-nav .nav-btn {
        background: transparent !important;
        color: #94a3b8 !important;
        border: none !important;
        padding: 8px 16px !important;
        border-radius: 50px !important;
        font-weight: 500 !important;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: 0.3s;
      }
      .pill-nav .nav-btn:hover { color: white !important; }
      .pill-nav .nav-btn.next-btn {
        background: #006d64 !important;
        color: white !important;
      }
      .pill-nav .nav-btn.next-btn:hover { background: #00524a !important; }
      .pill-nav-counter {
        color: #f8fafc !important;
        font-size: 0.9rem !important;
        font-weight: 600 !important;
        letter-spacing: 1px !important;
      }
    
      .dd-ticket .dd-table-wrap { display: none; }
      .dd-ticket.open .dd-table-wrap { display: block; }
</style>
    

    <style>
      .an-modal { display: none; position: fixed; inset: 0; z-index: 9999; align-items: center; justify-content: center; }
      .an-modal.active { display: flex; }
      .an-modal-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); }
      .an-modal-content { position: relative; z-index: 1; width: 90%; max-height: 90vh; overflow-y: auto; transform: scale(0.95); opacity: 0; transition: 0.3s; }
      .an-modal.active .an-modal-content { transform: scale(1); opacity: 1; }
    
      .dd-ticket .dd-table-wrap { display: none; }
      .dd-ticket.open .dd-table-wrap { display: block; }
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
        <button id="themeSongBtn" class="nav-btn nav-audio-btn" onclick="toggleThemeSong(event)" aria-label="Toggle Theme Song" style="display: flex; align-items: center; gap: 8px; background: #006d64; color: white; border: none; padding: 8px 16px; border-radius: 50px; cursor: pointer; font-weight: bold;">
          <svg id="audioIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M11 5L6 9H2v6h4l5 4V5z"></path><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line>
          </svg>
          <span>Theme Song KMA</span>
        </button>

        <!-- Dropdown Menu -->
        <div class="dropdown" id="menuDropdown">
          <button class="dropbtn" onclick="toggleDropdown(event)" aria-label="Buka menu"><span class="menu-icon" aria-hidden="true"><i></i><i></i><i></i></span><span>Menu</span></button>
          <div class="dropdown-content">
            <a href="#" onclick="selectMenu(0); return false;">1. Beranda</a>
            <a href="#" onclick="selectMenu(1); return false;">2. Tentang KMA</a>
            <a href="#" onclick="selectMenu(2); return false;">3. Key Highlights</a>
            <a href="#" onclick="selectMenu(3); return false;">4. Penghargaan</a>
            <a href="#" onclick="selectMenu(4); return false;">5. Rangkaian Kegiatan</a>
            <a href="#" onclick="selectMenu(5); return false;">6. Jadwal Deep Dive Gugus</a>
            <a href="#" onclick="selectMenu(6); return false;">7. Jadwal Presentasi Gugus</a>
            <a href="#" onclick="selectMenu(7); return false;">8. Dewan Juri KMA XXV</a>
            <a href="#" onclick="selectMenu(8); return false;">9. Panitia KMA XXV</a>
            <a href="#" onclick="selectMenu(9); return false;">10. Lokasi Acara</a>
            <a href="#" onclick="selectMenu(10); return false;">11. Kontak Panitia</a>
            <a href="#" onclick="selectMenu(11); return false;">12. Aturan Lainnya</a>
            <a href="#" onclick="selectMenu(12); return false;">13. Emergency</a>
          </div>
        </div>
        <a href="logout.php" class="nav-logout" title="Keluar dari akun" style="display:inline-flex;align-items:center;padding:8px 12px;border:1px solid #cbd5e1;border-radius:8px;color:#475569;text-decoration:none;font-size:.8rem;font-weight:700;">Keluar</a>
      </nav>
    </div>
  </header>

  <!-- Presentation Deck Container -->
  <main class="slide-deck">
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
<section id="tentang" class="slide section section-light">
      <div class="slide-scroll-wrapper">
        <div class="container">
          
          
          <div class="kma-hero-card animate-on-scroll" style="position: relative; background: #ffffff; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 40px; border: 1px solid #f1f5f9; display: flex; flex-wrap: wrap; min-height: 280px;">
              <div style="position: absolute; inset: 0; z-index: 1; opacity: 0.15; background-image: url('assets/img/tugu_malang.jpg'); background-size: cover; background-position: center; pointer-events: none;"></div>
              
              <div style="position: relative; z-index: 2; padding: 40px; flex: 1 1 300px;">
                  <h1 style="font-size: 2.8rem; font-weight: 900; color: #0f172a; margin: 0; line-height: 1; letter-spacing: -1px;">KMA XXV</h1>
                  <h2 style="font-size: 1.6rem; font-weight: 800; color: #006d64; margin: 0 0 20px 0;">MALANG <span style="color: #f97316;">• 2026</span></h2>
                  <div style="width: 40px; height: 3px; background: #f97316; margin-bottom: 24px;"></div>
                  <p style="font-size: 1.05rem; color: #334155; max-width: 320px; line-height: 1.6; font-style: italic;">
                      25 Years of Continuous Improvement:<br>Powering Sustainable Growth, Transforming the Future.
                  </p>
              </div>
              
              <div style="position: relative; z-index: 2; flex: 1 1 250px; display: flex; align-items: flex-end; justify-content: center; padding: 20px 40px 0 40px;">
                  <img src="assets/img/golnix.png" alt="Mascot GOLNIX" style="max-height: 300px; width: auto; object-fit: contain; filter: drop-shadow(-5px 10px 15px rgba(0,0,0,0.1)); display: block; margin-bottom: 0; transform: translateY(18px);">
              </div>
          </div>

          <div class="tentang-container" style="max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 24px;">
        <!-- Narasi Card -->
        <div class="an-award-card animate-on-scroll" style="background: #ffffff; padding: 40px; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: left; position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: 0; width: 6px; height: 100%; background: #d97706;"></div>
            <h2 style="font-size: 2rem; font-weight: 800; color: #0f172a; margin-bottom: 24px;">Tentang KMA XXV</h2>
            <div style="color: #334155; line-height: 1.7; font-size: 1.05rem;">
                <p style="margin-bottom: 16px;">Konvensi Mutu ANTAM (KMA) XXV Tahun 2026 menandai <strong>Silver Jubilee-25 tahun atau seperempat abad perjalanan budaya mutu, inovasi, dan continuous improvement di ANTAM</strong>. Lebih dari sekadar kompetisi, KMA menjadi momentum untuk mengapresiasi karya inovatif Insan ANTAM sekaligus merefleksikan bagaimana gagasan, kreativitas, dan semangat perbaikan terus berkembang menjadi solusi yang memberikan nilai bagi perusahaan.</p>
                <p style="margin-bottom: 16px;">Konvensi Mutu ANTAM (KMA) merupakan bagian dari ekosistem <strong>ANTAM BestMIND - Wadah Inovasi Terintegrasi ANTAM</strong>, yang berfungsi sebagai payung besar yang menghubungkan berbagai inisiatif inovasi dan perbaikan di ANTAM. Dalam ekosistem BestMIND, <strong>KMA menjadi salah satu ruang utama untuk mengangkat, mengapresiasi, menguji, serta menyebarluaskan praktik continuous improvement dan inovasi terbaik</strong>, sehingga ide tidak berhenti pada kompetisi, tetapi berkembang menjadi <em>knowledge</em>, solusi, dan <em>value</em> bagi ANTAM.</p>
                <p>KMA bertujuan menjadi <strong>ruang berbagi pengetahuan, pembelajaran, kolaborasi, dan diseminasi inovasi</strong> antarunit serta Anak Perusahaan ANTAM. Melalui KMA, berbagai solusi perbaikan tidak berhenti sebagai keberhasilan di satu tempat, tetapi didorong untuk dikembangkan, distandarisasi, direplikasi, dan memberikan dampak yang lebih luas terhadap <strong>produktifitas, efisiensi, kualitas, keselamatan, keberlanjutan, serta kinerja perusahaan</strong>.</p>
            </div>
        </div>
        <article class="dd-ticket animate-on-scroll delay-100" style="background: #ffffff; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; overflow: hidden;">
            <div class="dd-ticket-content" style="padding: 24px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; color: #006d64;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    </div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: #0f172a; margin: 0;">Tema KMA</h3>
                </div>
                <div style="color: #94a3b8;">
                    <svg class="dd-chevron" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
            <div class="dd-table-wrap" style="padding: 0 24px 24px 24px; border-top: 1px solid #f1f5f9; background: #fafafa;">
                <img src="assets/img/TEMA.KMA.JPEG" alt="Tema KMA" style="width: 100%; border-radius: 12px; margin-top: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            </div>
        </article>
        <article class="dd-ticket animate-on-scroll delay-200" style="background: #ffffff; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; overflow: hidden;">
            <div class="dd-ticket-content" style="padding: 24px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; color: #006d64;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    </div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: #0f172a; margin: 0;">Filosofi Logo KMA</h3>
                </div>
                <div style="color: #94a3b8;">
                    <svg class="dd-chevron" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
            <div class="dd-table-wrap" style="padding: 0 24px 24px 24px; border-top: 1px solid #f1f5f9; background: #fafafa;">
                <img src="assets/img/logo.penjelasan.jpeg" alt="Filosofi Logo KMA" style="width: 100%; border-radius: 12px; margin-top: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            </div>
        </article>
        <article class="dd-ticket animate-on-scroll delay-300" style="background: #ffffff; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; overflow: hidden;">
            <div class="dd-ticket-content" style="padding: 24px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; color: #006d64;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    </div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: #0f172a; margin: 0;">Filosofi Maskot KMA</h3>
                </div>
                <div style="color: #94a3b8;">
                    <svg class="dd-chevron" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
            <div class="dd-table-wrap" style="padding: 0 24px 24px 24px; border-top: 1px solid #f1f5f9; background: #fafafa;">
                <img src="assets/img/penjelasan.maskot.jpeg" alt="Filosofi Maskot KMA" style="width: 100%; border-radius: 12px; margin-top: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            </div>
        </article>
        <article class="dd-ticket animate-on-scroll delay-400" style="background: #ffffff; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #e2e8f0; overflow: hidden;">
            <div class="dd-ticket-content" style="padding: 24px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; color: #006d64;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    </div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: #0f172a; margin: 0;">ANTAM BestMIND</h3>
                </div>
                <div style="color: #94a3b8;">
                    <svg class="dd-chevron" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
            <div class="dd-table-wrap" style="padding: 0 24px 24px 24px; border-top: 1px solid #f1f5f9; background: #fafafa;">
                <img src="assets/img/antamBest.jpeg" alt="ANTAM BestMIND" style="width: 100%; border-radius: 12px; margin-top: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            </div>
        </article>
    </div>
        </div>
      </div>
</div>
</div>
    </section>
<section id="highlights" class="slide kh-section">
      <div class="slide-scroll-wrapper">
        
        <!-- BANNER FULL WIDTH -->
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
                <span class="kh-click-hint">Klik untuk detail info ›</span>
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
                <span class="kh-click-hint">Klik untuk detail info ›</span>
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
                <span class="kh-click-hint">Klik untuk detail info ›</span>
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
                <span class="kh-click-hint">Klik untuk detail info ›</span>
              </div>
              <div class="kh-card-img-wrap kh-img-contain-wrap">
                <img src="assets/img/hackaton.png?v=20260818-2" alt="ANTAM Hackathon" class="kh-card-img kh-card-img-contain">
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
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
              <div class="an-award-card" onclick="openAwardModal('Best Presenter', 'assets/img/Icon Mockup Board juara/Best Presenter.png', 'Penghargaan kepada tim yang paling mampu menyampaikan, menjelaskan, dan mempertahankan materi inovasi secara jelas, sistematis, meyakinkan, serta profesional.', '1')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Presenter.png" alt="Best Presenter" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Presenter</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Makalah', 'assets/img/Icon Mockup Board juara/Best Makalah.png', 'Penghargaan kepada karya inovasi GKM atau SS dengan dokumen makalah yang paling berkualitas dari sisi struktur, substansi, metodologi, alur PDCA, penyajian data, keterbacaan, dan kualitas visual dokumen.', '2')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Makalah.png" alt="Best Makalah" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Makalah</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Visual Communication', 'assets/img/Icon Mockup Board juara/Best Visual Communication.png', 'Penghargaan kepada tim yang paling efektif dan kreatif dalam memvisualisasikan inovasi selama presentasi sehingga masalah, solusi, proses, dan hasil inovasi dapat dipahami dengan mudah oleh juri dan audiens.', '3')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Visual Communication.png" alt="Best Visual Communication" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Visual Communication</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Safety Improvement', 'assets/img/Icon Mockup Board juara/Best Safety Improvement.png', 'Penghargaan kepada inovasi yang memberikan peningkatan paling kuat, nyata, dan berkelanjutan terhadap keselamatan kerja serta pengendalian risiko.', '4')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Safety Improvement.png" alt="Best Safety Improvement" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Safety Improvement</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Environment &amp; Sustainability Improvement', 'assets/img/Icon Mockup Board juara/Best Environment & Sustainability.png', 'Penghargaan kepada inovasi yang memberikan dampak terbaik, terukur, dan berkelanjutan terhadap lingkungan serta penggunaan sumber daya.', '5')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Environment & Sustainability.png" alt="Best Environment &amp; Sustainability" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Environment &amp; Sustainability Improvement</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Technology &amp; Digital Innovation', 'assets/img/Icon Mockup Board juara/Best Technology & Digital Innovation.png', 'Penghargaan kepada inovasi yang paling tepat, efektif, andal, dan relevan dalam memanfaatkan teknologi atau solusi digital untuk meningkatkan proses kerja.', '6')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Technology & Digital Innovation.png" alt="Best Technology &amp; Digital Innovation" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Technology &amp; Digital Innovation</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Proven Financial Benefit', 'assets/img/Icon Mockup Board juara/Best Finance Benefit.png', 'Penghargaan kepada inovasi dengan manfaat finansial bersih terbesar yang telah terealisasi, terukur, dapat ditelusuri, dan terverifikasi.', '7')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Finance Benefit.png" alt="Best Proven Financial Benefit" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Proven Financial Benefit</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Collaboration', 'assets/img/Icon Mockup Board juara/Best Collaboration.png', 'Penghargaan kepada tim yang paling kuat menunjukkan kolaborasi lintas satuan kerja, fungsi, unit, atau anak perusahaan dan stake holder lainnya diluar perusahaan dalam pembentukan dan pelaksanaan inovasi.', '8')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Collaboration.png" alt="Best Collaboration" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Collaboration</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Transformation Behaviour', 'assets/img/Icon Mockup Board juara/Best Transformation Behaviour.png', 'Penghargaan kepada tim yang proses inovasinya paling kuat dan paling nyata mencerminkan minimal 6 dari 8 Key Behaviours Transformasi ANTAM.', '9')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best Transformation Behaviour.png" alt="Best Transformation Behaviour" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Transformation Behaviour</h4>
                </div>
              </div>
              <div class="an-award-card" onclick="openAwardModal('Best Replication Potential', 'assets/img/Icon Mockup Board juara/Best replication potential.png', 'Penghargaan kepada inovasi yang paling layak, mudah, dan bernilai untuk diterapkan pada lingkup kerja, unit, atau anak perusahaan lainnya atau lingkungan sekitar wilayah operasi.', '10')" style="cursor: pointer; padding: 0; overflow: hidden; border-radius: 16px; transition: 0.3s; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                <div style="height: 180px; background: #f8fafc;">
                  <img src="assets/img/Icon Mockup Board juara/Best replication potential.png" alt="Best Replication Potential" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 20px; text-align: center; flex: 1; display: flex; align-items: center; justify-content: center;">
                  <h4 class="an-card-title" style="margin: 0; font-size: 1.1rem; color: #0f172a;">Best Replication Potential</h4>
                </div>
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
              <div class="an-special-card animate-on-scroll delay-100" onclick="openAwardModal('Best Team Spirit', 'assets/img/best.team.png', 'Penghargaan engagement untuk kekompakan, kreativitas, autentisitas, dan semangat tim.', '11')" role="button" tabindex="0">
                <div class="an-special-num">11</div>
                <div class="an-special-info">
                  <h4>Best Team Spirit</h4>
                  <p>Tim paling kompak, kreatif, autentik, dan bersemangat dalam menampilkan identitas tim selama rangkaian KMA XXV.</p>
                </div>
              </div>
            </div>
          </div>
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
<br><br><div style="text-align: center;"><a href="assets/Ketentuan Lainnya_KMA XXV MALANG_2026.pdf" download class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 12px; padding: 16px 32px; background: #006d64; color: white; text-decoration: none; border-radius: 12px; font-weight: 800; font-size: 1.15rem; box-shadow: 0 10px 25px rgba(0, 109, 100, 0.3); transition: transform 0.2s;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Download Ketentuan Lainnya</a></div>
          </div>
        </div>
      </div>
    </section>
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
<section id="deep-dive" class="slide an-section" style="background: #f8fafc; position: relative;">
      <div class="slide-scroll-wrapper">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
          <!-- Editorial Header -->
          <div class="dd-header animate-on-scroll">
            <div class="dd-num-large">06</div>
            <div class="dd-title-wrap">
              <h2 class="dd-title-display">JADWAL DEEP DIVE<br><span style="color:#006d64;">GUGUS</span></h2>
              <p class="dd-subtitle">KMA XXV 2026</p>
              <div class="an-gold-bar" style="width: 60px; height: 5px; background: #d97706; margin-top: 20px; margin-bottom: 20px;"></div>
              <p class="dd-desc">Jadwal wawancara per stream, juri, gugus, dan unit. Klik masing-masing jadwal untuk melihat informasi lengkap.</p>
            </div>
          </div>
          
          <div id="deepDiveTables" class="deep-dive-grid-modern animate-on-scroll delay-100"></div>
        </div>
      </div>
    </section>
<section id="presentasi" class="slide section" style="background-color: #F5F7F7;">
      <div class="slide-scroll-wrapper">
        <div class="container" style="padding-top: 50px; padding-bottom: 70px;">
          <div class="section-header animate-on-scroll">
            <p class="eyebrow">AGENDA PRESENTASI</p>
            <h2 class="section-title">Jadwal Presentasi</h2>
            <div class="divider"></div>
            
          </div>          <div id="jadwalPresentasiTables" class="deep-dive-grid-modern animate-on-scroll delay-100" style="margin-top: 40px; margin-bottom: 100px;"></div>
        </div>
      </div>
    </section>
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
                <img src="assets/img/juri/Dodi Pramadi.png" alt="Dodi Pramadi" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">01</div>
                <h3 class="ed-profile-name">Dodi Pramadi</h3>
                <span class="ed-profile-role">Dewan Juri Eksternal</span>
              </div>
            </div>
            
            <!-- Juri 2 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Eko Pudji.png" alt="Eko Pudji" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">02</div>
                <h3 class="ed-profile-name">Eko Pudji</h3>
                <span class="ed-profile-role">Dewan Juri Eksternal</span>
              </div>
            </div>

            <!-- Juri 3 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Sri Prahyoto.png" alt="Sri Prahyoto" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">03</div>
                <h3 class="ed-profile-name">Sri Prahyoto</h3>
                <span class="ed-profile-role">Dewan Juri Eksternal</span>
              </div>
            </div>

            <!-- Juri 4 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Susan Kustiwan.png" alt="Susan Kustiwan" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">04</div>
                <h3 class="ed-profile-name">Susan Kustiwan</h3>
                <span class="ed-profile-role">Dewan Juri Eksternal</span>
              </div>
            </div>

            <!-- Juri 5 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Dialah Hokosuja.png" alt="Dialah Hokosuja" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">05</div>
                <h3 class="ed-profile-name">Dialah Hokosuja</h3>
                <span class="ed-profile-role">Dewan Juri Internal</span>
              </div>
            </div>

            <!-- Juri 6 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Evi Sabrina.png" alt="Evi Sabrina" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">06</div>
                <h3 class="ed-profile-name">Evi Sabrina</h3>
                <span class="ed-profile-role">Dewan Juri Internal</span>
              </div>
            </div>

            <!-- Juri 7 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Muhammad Amri.png" alt="Muhammad Amri" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">07</div>
                <h3 class="ed-profile-name">Muhammad Amri</h3>
                <span class="ed-profile-role">Dewan Juri Internal</span>
              </div>
            </div>

            <!-- Juri 8 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/juri/Yudhistira.png" alt="Yudhistira" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">08</div>
                <h3 class="ed-profile-name">Yudhistira</h3>
                <span class="ed-profile-role">Dewan Juri Internal</span>
              </div>
            </div>
</div>
        </div>
      </div>
    </section>
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
                <img src="assets/img/FOTO PANITIA/Agus Pajrin.png" alt="Agus Pajrin" class="ed-profile-img" style="border-radius: 16px;">
              </div>
              <div class="ed-profile-info">
                <div class="ed-profile-number">01</div>
                <h3 class="ed-profile-name">Agus Pajrin</h3>
                <span class="ed-profile-role">Ketua Panitia</span>
              </div>
            </div>

            <!-- Panitia 2 -->
            <div class="ed-profile">
              <div class="ed-profile-img-wrap">
                <img src="assets/img/FOTO PANITIA/Agus Sugiharto.jpeg" alt="Agus Sugiharto" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Bella Sakina.png" alt="Bella Sakina" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Dedi Sunjaya.png" alt="Dedi Sunjaya" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Munif Hadi.png" alt="Munif Hadi" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Oni Setia Himawan.png" alt="Oni Setia Himawan" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Ruri Pitaloka.png" alt="Ruri Pitaloka" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Satriya Alrizki.png" alt="Satriya Alrizki" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Sofian.png" alt="Sofian" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Utiah Sukarini.png" alt="Utiah Sukarini" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Yosafat Simanjuntak.png" alt="Yosafat Simanjuntak" class="ed-profile-img" style="border-radius: 16px;">
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
                <img src="assets/img/FOTO PANITIA/Zakaria Budi.png" alt="Zakaria Budi" class="ed-profile-img" style="border-radius: 16px;">
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
<section id="lokasi" class="slide section section-white" style="padding-bottom: 0;">
      <div class="slide-scroll-wrapper">
        <div class="container" style="margin-bottom: 60px; padding-top: 40px;">
          <div class="section-header animate-on-scroll">
            <h2 class="section-title">Lokasi Acara</h2>
            <div class="divider"></div>
          </div>
          <div class="location-grid animate-on-scroll" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            <div class="day-card location-card" style="cursor: default;">
              <div class="day-card-img-header" style="background-image: url('assets/img/mercure.mirama.jpg'); height: 250px; background-size: cover; background-position: center;">
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
            <a href="https://instagram.com/antam_official" target="_blank" rel="noopener noreferrer" class="clist-item">
              <div class="clist-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></div>
              <div class="clist-info">
                <span class="clist-label">Instagram</span>
                <span class="clist-value">@antam_official</span>
              </div>
              <div class="clist-arrow">›</div>
            </a>
            
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

            <button type="button" class="clist-item lo-toggle-button" onclick="toggleLoContacts()" aria-expanded="false" aria-controls="loContacts"><div class="clist-icon clist-wa"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></div><div class="clist-info"><span class="clist-label">WhatsApp</span><span class="clist-value">Tanya KMA (LO Unit)</span></div><div class="clist-arrow">›</div></button>
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
<!-- SLIDE 12: ATURAN LAINNYA -->
    <section id="aturan" class="slide section section-white">
      <div class="slide-scroll-wrapper">
        <div class="container" style="padding-top: 50px;">
          <div class="section-header animate-on-scroll">
            <p class="eyebrow">KETENTUAN UMUM</p>
            <h2 class="section-title">Aturan Lainnya</h2>
            <div class="divider"></div>
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
          <div class="rules-download-panel animate-on-scroll" aria-label="Download dokumen ketentuan">
            <div><strong>Dokumen ketentuan KMA XXV</strong><span>Unduh file resmi untuk dibaca atau dibagikan kepada peserta.</span></div>
            <a class="rules-download-btn" href="assets/Ketentuan Lainnya_KMA XXV MALANG_2026.pdf" download>Unduh PDF</a>
          </div>
          </div>
        </div>
      </div>
    </section>
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
            <img src="assets/img/emergency.jpeg" alt="HSE Emergency" style="width: 100%; max-width: 800px; margin: 0 auto; display: block; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
          </div>
        </div>
        <footer class="footer"><div class="container"><p>@KMA.XXV.2026</p></div></footer>
      </div>
    </section>
  </main>

  <!-- Navigation Controls (Bottom Bar) -->
  <div class="slide-nav-controls pill-nav">
    <button class="nav-btn prev-btn" id="prevBtn" onclick="prevSlide()">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
      <span class="nav-text">Sebelumnya</span>
    </button>
    <div class="pill-nav-counter" id="pillNavCounter" style="font-weight: 700; color: #0f172a; font-size: 0.95rem; letter-spacing: 2px;">
      01 / 12
    </div>
    <button class="nav-btn next-btn" id="nextBtn" onclick="nextSlide()">
      <span class="nav-text">Selanjutnya</span>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
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
  <!-- POPUP MODAL DETAIL PENGHARGAAN -->
  <div class="award-detail-modal" id="awardDetailModal" aria-hidden="true" onclick="closeAwardModalOnOverlay(event)">
    <div class="award-detail-dialog" role="dialog" aria-modal="true" aria-labelledby="awardModalTitle">
      <button class="award-detail-close" type="button" onclick="closeAwardModal()" aria-label="Tutup detail penghargaan">&times;</button>
      <div class="award-detail-media"><img id="awardModalImg" src="" alt=""></div>
      <div class="award-detail-body">
        <div class="award-detail-kicker">PENGHARGAAN KMA XXV</div>
        <h2 id="awardModalTitle">Detail Penghargaan</h2>
        <p id="awardModalDescription"></p>
        <div class="award-detail-number" id="awardModalNumber"></div>
      </div>
    </div>
  </div>
<script>
    const presentationData = {
      gkm1: { title: "Jadwal Presentasi GKM 1", image: "assets/img/jadwal%20presentasi/GKM1.JPEG?v=20260819-1", category: "GKM 1", table: false },
      gkm2: { title: "Jadwal Presentasi GKM 2", image: "assets/img/jadwal%20presentasi/GKM2.JPEG?v=20260819-1", category: "GKM 2", table: false },
      ss1: { title: "Jadwal Presentasi SS 1", category: "SS 1 · STREAM BROMO", image: "assets/img/jadwal%20presentasi/SS1.JPEG?v=20260819-2", table: false },
      ss2: { title: "Jadwal Presentasi SS 2", category: "SS 2 · STREAM SEMERU", image: "assets/img/jadwal%20presentasi/SS2.JPEG?v=20260819-2", table: false }
    };    
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
    const themeSongBtn = document.getElementById('themeSongBtn');
    const audioIcon = document.getElementById('audioIcon');
    let isPlaying = false;

    function syncAudioControls() {
      if (!jingle) return;
      isPlaying = !jingle.paused && !jingle.muted;
      const iconOn = '<path d="M11 5L6 9H2v6h4l5 4V5z"></path><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>';
      const iconOff = '<path d="M11 5L6 9H2v6h4l5 4V5z"></path><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line>';
      if (audioIcon) audioIcon.innerHTML = isPlaying ? iconOn : iconOff;
      [audioBtn, themeSongBtn].forEach((btn) => {
        if (!btn) return;
        btn.classList.toggle('playing', isPlaying);
        btn.setAttribute('aria-pressed', String(isPlaying));
        const label = btn.querySelector('span');
        if (label) label.textContent = btn.id === 'themeSongBtn' ? (isPlaying ? 'Theme Song KMA (ON)' : 'Theme Song KMA (OFF)') : 'Musik';
        if (btn.id === 'themeSongBtn') {
          btn.style.background = isPlaying ? '#006d64' : '#64748b';
          btn.title = isPlaying ? 'Matikan Theme Song KMA' : 'Nyalakan Theme Song KMA';
        }
      });
    }

    function setJinglePlayback(shouldPlay) {
      if (!jingle) return;
      if (shouldPlay) {
        jingle.muted = false;
        const promise = jingle.play();
        if (promise && promise.then) promise.then(syncAudioControls).catch((err) => console.warn('Gagal memutar audio:', err));
        else syncAudioControls();
      } else {
        jingle.pause();
        syncAudioControls();
      }
    }

    function enableAudioOnInteraction() {
      if (!isPlaying) setJinglePlayback(true);
      if (isPlaying) removeAllAudioListeners();
    }

    function removeAllAudioListeners() {
      document.removeEventListener('click', enableAudioOnInteraction);
      document.removeEventListener('touchstart', enableAudioOnInteraction);
      document.removeEventListener('keydown', enableAudioOnInteraction);
      document.removeEventListener('scroll', enableAudioOnInteraction, true);
    }

    function toggleAudio(e) {
      if (e) e.stopPropagation();
      setJinglePlayback(!isPlaying);
    }

    if (jingle) {
      ['play', 'pause', 'ended', 'volumechange'].forEach((eventName) => jingle.addEventListener(eventName, syncAudioControls));
      syncAudioControls();
    }
    document.addEventListener('click', enableAudioOnInteraction);
    document.addEventListener('touchstart', enableAudioOnInteraction);
    document.addEventListener('keydown', enableAudioOnInteraction);
    document.addEventListener('scroll', enableAudioOnInteraction, true);
/* -----------------------------------------
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
        content: `<p><strong>Jejak Langkah 25 Tahun Eksplorasi Unit Geomin</strong><br><br>Merekam perjalanan panjang di balik setiap sumber daya dan cadangan mineral ANTAM—perjalanan yang dibangun dari ketekunan, dedikasi, dan mental tangguh untuk menapaki wilayah yang belum terjamah, membaca tanda-tanda geologi, serta mengubah potensi menjadi keyakinan geologi yang bernilai bagi perusahaan dan negeri.</p>
          <p><br><br>Unit Geomin telah hadir sejak 1974 dan menjadi ujung tombak ANTAM dalam mencari, menemukan, membuktikan, serta mengembangkan sumber daya dan cadangan mineral. Dari Sumatra hingga Papua, jejak Insan Geomin terbentang melintasi pegunungan, hutan, sungai, pesisir, dan wilayah terpencil Nusantara.</p>
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
          <p><strong>Dari ide menjadi solusi, dari solusi menjadi transformasi, dan dari transformasi menjadi pertumbuhan ANTAM yang berkelanjutan.</strong></p><br><br><a href="assets/Antam - Proceeding Inovasi 2025 - Hiress.pdf" download class="btn btn-primary" style="display: inline-block; padding: 10px 20px; background: #006d64; color: white; text-decoration: none; border-radius: 8px; font-weight: bold;">Unduh Prosiding (PDF)</a>`
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
          <p class="highlight-intro">ANTAM Hackathon 2026 menampilkan rangkaian informasi kompetisi, tantangan, dan hasil kegiatan secara berurutan.</p>
          <div class="hackathon-gallery" aria-label="Materi ANTAM Hackathon">
            <figure><img src="assets/img/hackaton/hk1.jpeg" alt="ANTAM Hackathon - materi 1"><figcaption>Materi Hackathon 1</figcaption></figure>
            <figure><img src="assets/img/hackaton/hk2.jpeg" alt="ANTAM Hackathon - materi 2"><figcaption>Materi Hackathon 2</figcaption></figure>
            <figure><img src="assets/img/hackaton/hk3.jpeg" alt="ANTAM Hackathon - materi 3"><figcaption>Materi Hackathon 3</figcaption></figure>
            <figure><img src="assets/img/hackaton/hk4.jpeg" alt="ANTAM Hackathon - materi 4"><figcaption>Materi Hackathon 4</figcaption></figure>
          </div>
        `      }
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
        function renderJadwalPresentasiTables() {
      const root = document.getElementById('jadwalPresentasiTables'); if (!root) return; 
      root.style.gridTemplateColumns = '1fr'; root.style.maxWidth = '1000px'; root.style.margin = '0 auto';
      root.innerHTML = Object.values(presentationData).map((data, idx) => {
        const num = String(idx + 1).padStart(2, '0');
        const isRightAligned = idx % 2 !== 0;
        
        return `<article class="dd-ticket ${isRightAligned ? 'dd-ticket-right' : ''}" style="margin-bottom: 24px; border-radius: 20px; border: 1px solid #e5e7eb; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: #ffffff; position: relative; overflow: hidden;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 6px; background: linear-gradient(90deg, #f97316, #fbbf24);"></div>
          <div class="dd-ticket-bg" style="opacity: 0.03; font-size: 8rem; right: 20px; top: -20px; position: absolute; font-weight: 900; color: #0f172a; pointer-events: none; z-index: 1;">${num}</div>
          <div class="dd-ticket-content" style="padding: 24px; cursor: pointer; position: relative; z-index: 2;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                  <div style="display: inline-block; padding: 6px 12px; background: #fff7ed; color: #ea580c; border-radius: 8px; font-weight: 800; font-size: 0.9rem; margin-bottom: 12px; border: 1px solid #ffedd5;">${data.category}</div>
                  <h3 style="font-size: 1.6rem; font-weight: 900; color: #0f172a; margin: 0; line-height: 1.2;">JADWAL PRESENTASI</h3>
                </div>
                <div style="padding: 10px;">
                  <svg class="dd-chevron" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
          </div>
          <div class="dd-table-wrap" style="padding: 0; background: #f8fafc; border-top: 1px solid #e2e8f0;">
            <img src="${data.image}" alt="${data.title}" style="width: 100%; display: block; border-radius: 0 0 20px 20px;">
          </div>
        </article>`;
      }).join('');
    }

    function renderDeepDiveTables() {
      const root = document.getElementById('deepDiveTables'); if (!root) return;
      const images = ['deepdive.gkm1.png', 'deepdive.gkm2.png', 'deepdive.ss1.png', 'deepdive.ss2.png'];
      root.innerHTML = deepDiveData.map((stream, idx) => {
        const num = String(idx + 1).padStart(2, '0');
        const titleParts = stream.title.split(' — ');
        const type = titleParts[0];
        const name = titleParts[1] ? titleParts[1] : '';
        const isRightAligned = idx % 2 !== 0;
        const imgSrc = 'assets/img/jadwal deep dive/' + images[idx];
        
        return `<article class="dd-ticket ${isRightAligned ? 'dd-ticket-right' : ''}" style="margin-bottom: 24px; border-radius: 20px; border: 1px solid #e5e7eb; box-shadow: 0 10px 25px rgba(0,0,0,0.05); background: #ffffff; position: relative; overflow: hidden;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 6px; background: linear-gradient(90deg, #006d64, #a3e635);"></div>
          <div class="dd-ticket-bg" style="opacity: 0.03; font-size: 8rem; right: 20px; top: -20px;">${num}</div>
          <div class="dd-ticket-content" style="padding: 24px; cursor: pointer; position: relative; z-index: 2;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                  <div style="display: inline-block; padding: 6px 12px; background: #eef7f4; color: #006d64; border-radius: 8px; font-weight: 800; font-size: 0.9rem; margin-bottom: 12px; border: 1px solid #ccede4;">${type}</div>
                  <h3 style="font-size: 1.6rem; font-weight: 900; color: #0f172a; margin: 0; line-height: 1.2;">${name.toUpperCase()}</h3>
                  <div style="margin-top: 16px; border-top: 1px dashed #cbd5e1; padding-top: 16px;">
                      <p style="color: #64748b; font-size: 0.95rem; margin: 0;">${stream.judges.replace(/ · /g, '<br>')}</p>
                  </div>
                </div>
                <div style="padding: 10px;">
                  <svg class="dd-chevron" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
          </div>
          <div class="dd-table-wrap" style="padding: 0; background: #f8fafc; display: none;">
            <img src="${imgSrc}" style="width: 100%; border-radius: 0 0 20px 20px; border-top: 1px solid #e2e8f0; display: block;">
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
      renderJadwalPresentasiTables();
                  
      // Generic delegation for dd-ticket (Tentang KMA, Deep Dive, Awards)
      document.body.addEventListener('click', function(e) {
         const ticket = e.target.closest('.dd-ticket');
         if (ticket) {
            ticket.classList.toggle('open');
         }
      });
    
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
          pillCounter.innerText = (currentSlide + 1) + " / " + slides.length;
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
<script>
    const awardGuideMarkdown = <?= $awardGuideJson ?: '""' ?>;    const awardCardMarkdown = <?= $awardCardJson ?: '""' ?>;
    const awardCardDescriptions = {};
    awardCardMarkdown.split(/\r?\n(?=\s*\d+\.\s)/).forEach((block) => {
      const match = block.match(/^\s*(\d+)\.\s+\*\*(.*?)\*\*\s*([\s\S]*)$/);
      if (match) awardCardDescriptions[match[1]] = { title: match[2].replace(/Viusl/i, 'Visual').trim(), description: match[3].replace(/\s+/g, ' ').trim() };
    });
    function buildAwardCardPresentation() {
      document.querySelectorAll('#penghargaan .an-awards-grid .an-award-card').forEach((card, index) => {
        const image = card.querySelector('img');
        const title = card.querySelector('h4');
        if (!image || !title) return;
        const number = String(index + 1);
        const data = awardCardDescriptions[number] || { title: title.textContent.trim(), description: '' };
        title.textContent = data.title;
        card.classList.add('award-card-horizontal');
        const media = image.closest('div');
        if (media) media.className = 'award-card-icon';
        const oldBody = title.closest('div');
        if (oldBody) {
          oldBody.className = 'award-card-copy';
          oldBody.innerHTML = '<h4 class="an-card-title"></h4><p class="an-card-description"></p>';
          oldBody.querySelector('h4').textContent = data.title;
          oldBody.querySelector('p').textContent = data.description;
        }
      });
    }
    buildAwardCardPresentation();
    const awardGuideSections = {};
    const awardGuideHeader = /\*\*\[(\d+)\.\s*([^\]]+)\]\{\.mark\}\*\*/g;
    let awardGuideMatch;
    let awardGuidePrevious = null;
    while ((awardGuideMatch = awardGuideHeader.exec(awardGuideMarkdown)) !== null) {
      if (awardGuidePrevious) {
        awardGuideSections[awardGuidePrevious.number] = awardGuideMarkdown.slice(awardGuidePrevious.end, awardGuideMatch.index).trim();
      }
      awardGuidePrevious = { number: awardGuideMatch[1], end: awardGuideHeader.lastIndex };
    }
    if (awardGuidePrevious) awardGuideSections[awardGuidePrevious.number] = awardGuideMarkdown.slice(awardGuidePrevious.end).trim();

    function escapeAwardText(value) {
      return String(value || '').replace(/[&<>'"]/g, (char) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[char]));
    }
    function awardGuideKey(title) {
      return String(title || '').toUpperCase().replace(/&AMP;/g, '&').replace(/\s+IMPROVEMENT$/, '').trim();
    }
    function renderAwardGuide(raw) {
      const clean = String(raw || '')
        .replace(/\r/g, '')
        .replace(/\*\*\[([^\]]+)\]\{\.mark\}\*\*/g, '$1')
        .replace(/\*\*(.*?)\*\*/g, '$1')
        .replace(/^\s*[-*]\s+/gm, '• ')
        .replace(/^\s*\d+\.\s+/gm, (line) => line.trim() + ' ')
        .trim();
      const paragraphs = clean.split(/\n\s*\n/).map((part) => '<p>' + escapeAwardText(part).replace(/\n/g, '<br>') + '</p>').join('');
      return '<div class="award-guide-content">' + paragraphs + '</div>';
    }

    function openAwardModal(title, image, description, number) {
      const modal = document.getElementById('awardDetailModal');
      const img = document.getElementById('awardModalImg');
      const titleEl = document.getElementById('awardModalTitle');
      const descEl = document.getElementById('awardModalDescription');
      const numberEl = document.getElementById('awardModalNumber');
      if (!modal || !img || !titleEl || !descEl) return;
      const guideNumber = String(number || '').replace(/^0+/, '') || String(number || '');
      const guide = awardGuideSections[guideNumber];
      titleEl.textContent = title;
      descEl.innerHTML = guide ? renderAwardGuide(guide) : '<p>' + escapeAwardText(description) + '</p>';
      img.src = image;
      img.alt = title;
      if (numberEl) numberEl.textContent = number ? String(number).padStart(2, '0') : '';
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.classList.add('award-modal-open');
    }    function closeAwardModal() {
      const modal = document.getElementById('awardDetailModal');
      if (!modal) return;
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('award-modal-open');
    }
    function closeAwardModalOnOverlay(e) {
      if (e.target && e.target.id === 'awardDetailModal') closeAwardModal();
    }
    function toggleThemeSong(e) {
      if (e) e.stopPropagation();
      setJinglePlayback(!isPlaying);
    }
</script>

    
    
    
</body>
</html>
