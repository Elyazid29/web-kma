import re

def update_index():
    with open('index.php', 'r', encoding='utf-8') as f:
        content = f.read()

    # 1. Nav Buttons
    # Replace the whole slide-nav-controls pill-nav
    nav_pattern = r'<div class="slide-nav-controls pill-nav">.*?</div>\s*<!-- POPUP MODAL RUNDOWN -->'
    new_nav = '''<div class="slide-nav-controls pill-nav">
    <button class="nav-btn prev-btn" id="prevBtn" onclick="prevSlide()" style="padding: 10px 20px;">
      <span class="nav-text" style="font-weight: bold;">Sebelumnya</span>
    </button>
    <div class="pill-nav-counter" id="pillNavCounter" style="font-weight: 700; color: #0f172a; font-size: 0.95rem; letter-spacing: 2px;">
      01 / 11
    </div>
    <button class="nav-btn next-btn" id="nextBtn" onclick="nextSlide()" style="padding: 10px 20px;">
      <span class="nav-text" style="font-weight: bold;">Selanjutnya</span>
    </button>
  </div>

  <!-- POPUP MODAL RUNDOWN -->'''
    content = re.sub(nav_pattern, new_nav, content, flags=re.DOTALL)

    # 2. Hero Animations
    content = re.sub(r'<div class="hc-eyebrow[^>]*>', '<div class="hc-eyebrow" style="margin-bottom: 20px;">', content)
    content = re.sub(r'<div class="hero-countdown[^>]*>', '<div class="hero-countdown">', content)

    # 3. Shake buttons
    content = content.replace('btn btn-outline btn-shake', 'btn btn-outline')
    content = content.replace('btn btn-primary btn-shake', 'btn btn-primary')

    # 4. Map links with generic onclick bypass
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/TuQjnsZZyXWNcRGx7"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/TuQjnsZZyXWNcRGx7" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/kFcfna1EVPKxmJit5"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/kFcfna1EVPKxmJit5" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/ADmDNfi9pxoynXcD6"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/ADmDNfi9pxoynXcD6" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/5bGhM3z2G2CzwC7X9"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/5bGhM3z2G2CzwC7X9" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)

    # If the old ones were there:
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/4iNPm7oLoiHYGw168"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/TuQjnsZZyXWNcRGx7" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/GXshYTuSdAZgAKko8"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/kFcfna1EVPKxmJit5" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/uJaHc4K5m1XsqJRcA"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/ADmDNfi9pxoynXcD6" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)
    content = re.sub(r'<a href="https://maps\.app\.goo\.gl/26qyWm29AAdYfgde9"[^>]*>.*?Lihat Maps</a>', 
                     r'<a href="https://maps.app.goo.gl/5bGhM3z2G2CzwC7X9" onclick="window.open(this.href, \'_blank\'); return false;" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.85rem; display: inline-flex; align-items: center; justify-content: center; gap: 6px; border: none; position: relative; z-index: 9999; cursor: pointer;">Lihat Maps</a>', content)


    # 5. Accordion design update
    # We will just replace the whole section from <!-- Kotak Tema KMA --> to <div class="kma-identity-grid"
    # Actually let's just replace the exact headers
    
    acc_tema = """<div style="margin-bottom: 12px; border: 1px solid #eef2f6; border-radius: 12px; background: #ffffff; box-shadow: 0 4px 6px -2px rgba(0,0,0,0.02);">
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
</div>"""

    acc_logo = """<div style="margin-bottom: 12px; border: 1px solid #eef2f6; border-radius: 12px; background: #ffffff; box-shadow: 0 4px 6px -2px rgba(0,0,0,0.02);">
  <div onclick="const c = this.nextElementSibling; const i = this.querySelector('.chevron'); if(c.style.display==='none'){c.style.display='block'; i.style.transform='rotate(180deg)';}else{c.style.display='none'; i.style.transform='rotate(0deg)';}" style="display: flex; align-items: center; justify-content: space-between; padding: 16px; cursor: pointer;">
    <div style="display: flex; align-items: center; gap: 16px;">
      <div style="width: 44px; height: 44px; border-radius: 50%; background: #eef7f4; display: flex; align-items: center; justify-content: center; color: #006d64;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      </div>
      <span style="font-weight: 700; color: #0f172a; font-size: 1.05rem;">Filosofi Logo & Maskot KMA</span>
    </div>
    <svg class="chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#006d64" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
  </div>
  <div style="display: none; padding: 0 16px 16px 16px;">
    <img src="assets/img/logo.penjelasan.jpeg?v=20260818-4" alt="Penjelasan Logo KMA XXV" style="max-width: 100%; border-radius: 8px;">
  </div>
</div>"""

    acc_best = """<div style="margin-bottom: 12px; border: 1px solid #eef2f6; border-radius: 12px; background: #ffffff; box-shadow: 0 4px 6px -2px rgba(0,0,0,0.02);">
  <div onclick="const c = this.nextElementSibling; const i = this.querySelector('.chevron'); if(c.style.display==='none'){c.style.display='block'; i.style.transform='rotate(180deg)';}else{c.style.display='none'; i.style.transform='rotate(0deg)';}" style="display: flex; align-items: center; justify-content: space-between; padding: 16px; cursor: pointer;">
    <div style="display: flex; align-items: center; gap: 16px;">
      <div style="width: 44px; height: 44px; border-radius: 50%; background: #eef7f4; display: flex; align-items: center; justify-content: center; color: #006d64;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
      </div>
      <span style="font-weight: 700; color: #0f172a; font-size: 1.05rem;">ANTAM BestMIND</span>
    </div>
    <svg class="chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#006d64" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s;"><polyline points="6 9 12 15 18 9"></polyline></svg>
  </div>
  <div style="display: none; padding: 0 16px 16px 16px;">
    <img src="assets/img/bestmind.logo.png?v=20260818-1" alt="ANTAM BestMIND" style="max-width: 100%; border-radius: 8px;">
  </div>
</div>"""

    # We use regex to replace the old ones
    # 1. Tema KMA
    content = re.sub(r'<h4[^>]*>.*?Tema KMA.*?</h4>\s*<div[^>]*>.*?<img src="assets/img/TEMA\.KMA.*?</div>', acc_tema, content, flags=re.DOTALL|re.IGNORECASE)
    # The previous script might have changed it, let's catch the old one too
    content = re.sub(r'<h4[^>]*>.*?Tema KMA.*?</h4>\s*<img src="assets/img/TEMA\.KMA.*?>', acc_tema, content, flags=re.DOTALL|re.IGNORECASE)
    
    # 2. Logo
    content = re.sub(r'<h4[^>]*>.*?Filosofi Logo & Maskot KMA.*?</h4>\s*<div[^>]*>.*?<img src="assets/img/logo\.penjelasan.*?</div>', acc_logo, content, flags=re.DOTALL|re.IGNORECASE)
    content = re.sub(r'<h4[^>]*>.*?Filosofi Logo & Maskot KMA.*?</h4>\s*<img src="assets/img/logo\.penjelasan.*?>', acc_logo, content, flags=re.DOTALL|re.IGNORECASE)

    # 3. BestMIND
    content = re.sub(r'<h4[^>]*>.*?ANTAM BestMIND.*?</h4>\s*<div[^>]*>.*?<img src="assets/img/bestmind\.logo.*?</div>', acc_best, content, flags=re.DOTALL|re.IGNORECASE)
    content = re.sub(r'<h4[^>]*>.*?ANTAM BestMIND.*?</h4>\s*<img src="assets/img/bestmind\.logo.*?>', acc_best, content, flags=re.DOTALL|re.IGNORECASE)

    with open('index.php', 'w', encoding='utf-8') as f:
        f.write(content)


def update_css():
    with open('assets/css/style.css', 'r', encoding='utf-8') as f:
        css = f.read()
    
    # an-awards-grid
    css = re.sub(r'\.an-awards-grid\s*\{[^}]*\}', '.an-awards-grid { display: grid; grid-template-columns: 1fr !important; gap: 20px; }', css)
    
    with open('assets/css/style.css', 'w', encoding='utf-8') as f:
        f.write(css)

update_index()
update_css()
print("Success")
