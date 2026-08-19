import pandas as pd
import math
from datetime import datetime

file_path = 'assets/rundown.xlsx'
df = pd.read_excel(file_path, sheet_name='Rundown Fix  (3)')

days = {}
current_day = 0

for idx, row in df.iterrows():
    cell = str(row.get('Unnamed: 1', ''))
    if 'September 2026' in cell:
        current_day += 1
        days[current_day] = {
            'title': f'DAY {current_day}',
            'date': cell,
            'dresscode': '',
            'items': []
        }
    else:
        if current_day > 0:
            time_start = row.get('Unnamed: 1')
            time_end = row.get('Unnamed: 2')
            agenda = row.get('Unnamed: 4')
            desc = row.get('Unnamed: 5')
            
            if pd.notna(agenda) and agenda != 'Agenda ':
                if pd.notna(time_start) and pd.notna(time_end):
                    t_s = pd.to_datetime(time_start, unit='ms', origin='1899-12-30').strftime('%H:%M') if isinstance(time_start, (int, float)) else str(time_start)
                    t_e = pd.to_datetime(time_end, unit='ms', origin='1899-12-30').strftime('%H:%M') if isinstance(time_end, (int, float)) else str(time_end)
                    time_str = f'{t_s} - {t_e}'
                else:
                    time_str = ''
                
                desc_str = str(desc) if pd.notna(desc) else ''
                days[current_day]['items'].append({
                    'time': time_str,
                    'title': str(agenda),
                    'desc': desc_str
                })

for day, day_data in days.items():
    for item in day_data['items']:
        time_str = item['time']
        if time_str:
            parts = time_str.split(' - ')
            clean_parts = []
            for p in parts:
                if ' ' in p:
                    clean_parts.append(p.split(' ')[1][:5])
                else:
                    clean_parts.append(p)
            item['time'] = ' - '.join(clean_parts)

out_str = 'const rundownData = {\n'
for day, day_data in days.items():
    out_str += f'      {day}: {{\n'
    out_str += f'        title: "{day_data["title"]}",\n'
    out_str += f'        date: "{day_data["date"]}",\n'
    out_str += f'        dresscode: "",\n'
    out_str += f'        items: [\n'
    for item in day_data['items']:
        t = item['time'].replace('"', '\\"')
        tit = item['title'].replace('"', '\\"')
        des = item['desc'].replace('"', '\\"')
        out_str += f'          {{ time: "{t}", title: "{tit}", desc: "{des}" }},\n'
    out_str += f'        ]\n      }},\n'
out_str += '    };'

print(out_str)
