import re

with open('index.php', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Remove SVG from prevBtn and nextBtn
content = re.sub(
    r'(<button class="nav-btn prev-btn" id="prevBtn" onclick="prevSlide\(\)">)\s*<svg.*?</svg>\s*(<span class="nav-text">Sebelumnya</span>\s*</button>)',
    r'\1\n      \2',
    content,
    flags=re.DOTALL
)

content = re.sub(
    r'(<button class="nav-btn next-btn" id="nextBtn" onclick="nextSlide\(\)">\s*<span class="nav-text">Selanjutnya</span>)\s*<svg.*?</svg>\s*(</button>)',
    r'\1\n    \2',
    content,
    flags=re.DOTALL
)

# 2. Remove animations from Hero
content = content.replace('<div class="hc-eyebrow animate-on-scroll delay-100"', '<div class="hc-eyebrow"')
content = content.replace('<div class="hero-countdown animate-on-scroll delay-300">', '<div class="hero-countdown">')

# 3. Update map links
content = content.replace('https://maps.app.goo.gl/4iNPm7oLoiHYGw168', 'https://maps.app.goo.gl/TuQjnsZZyXWNcRGx7')
content = content.replace('https://maps.app.goo.gl/GXshYTuSdAZgAKko8', 'https://maps.app.goo.gl/kFcfna1EVPKxmJit5')
content = content.replace('https://maps.app.goo.gl/uJaHc4K5m1XsqJRcA', 'https://maps.app.goo.gl/ADmDNfi9pxoynXcD6')
content = content.replace('https://maps.app.goo.gl/26qyWm29AAdYfgde9', 'https://maps.app.goo.gl/5bGhM3z2G2CzwC7X9')

# 4. Improve About KMA accordion design
new_accordion = '<h4 style="color: #0f172a; font-size: 1.15rem; margin-bottom: 20px; font-weight: 600; cursor: pointer; background: #ffffff; padding: 16px 20px; border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 2px 4px rgba(0,0,0,0.02); display: flex; justify-content: space-between; align-items: center; transition: all 0.2s ease;" onmouseover="this.style.borderColor=\'#cbd5e1\'; this.style.boxShadow=\'0 4px 12px rgba(0,0,0,0.05)\';" onmouseout="this.style.borderColor=\'#e2e8f0\'; this.style.boxShadow=\'0 2px 4px rgba(0,0,0,0.02)\';" onclick="const content = this.nextElementSibling; const icon = this.querySelector(\'.acc-icon\'); if (content.style.display === \'none\') { content.style.display = \'block\'; icon.textContent = \'−\'; } else { content.style.display = \'none\'; icon.textContent = \'+\'; }">'

def replace_acc(match):
    title = match.group(1).replace(' &#9662;', '')
    return new_accordion + f'<span>{title}</span> <span class="acc-icon" style="font-size: 1.5rem; font-weight: 300; color: #64748b; line-height: 1;">+</span></h4>'

content = re.sub(
    r'<h4 style="color: #0f172a; font-size: 1\.3rem; margin-bottom: 20px; font-weight: 800; cursor: pointer; background: #f1f5f9; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1;" onclick="this\.nextElementSibling\.style\.display = this\.nextElementSibling\.style\.display === \'none\' \? \'block\' : \'none\'">(.*?)</h4>',
    replace_acc,
    content
)

with open('index.php', 'w', encoding='utf-8') as f:
    f.write(content)
print('Done updating index.php')
