# Prompt: Harbiy Institut Education Website Templateini Moslashtirish

---

## Vazifa

Sen tajribali frontend dizayner va harbiy tashkilot brendini yaxshi tushunadigan mutaxassissan. Menda tayyor **education website HTML template** bor. Shu templateni **Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti** (O'zbekiston Respublikasi) uchun to'liq moslashtirishim kerak.

---

## Institut haqida ma'lumot

| Parametr | Qiymat |
|---|---|
| **To'liq nomi (o'zbekcha)** | Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti |
| **To'liq nomi (ruscha)** | Институт Информационно-Коммуникационных Технологий и Военной Связи |
| **Qisqa nomi** | AKTVA Instituti |
| **Turi** | Harbiy oliy ta'lim muassasasi |
| **Mamlakat** | O'zbekiston Respublikasi |
| **Tili** | O'zbek tili (asosiy), Rus tili (qo'shimcha) |
| **Maqsadli auditoriya** | Harbiy xizmatchilar, kursantlar, o'qituvchilar, ota-onalar, qabul komissiyasi |

---

## Ranglar va vizual identlik

Quyidagi **harbiy va milliy ranglar** tizimidan foydalanlansin:

```
Asosiy harbiy yashil:  #1B3A2D  (to'q harbiy yashil)
Ikkinchi rang:         #2E5E45  (o'rta yashil)
Aksent / ta'kidlash:  #C8A84B  (oltin / harbiy nishon rangi)
Neytral fon:          #F4F2EE  (krем / quruq qog'oz toni)
Matn (asosiy):        #1A1A1A  (deyarli qora)
Matn (ikkinchi):      #4A4A4A  (kulrang)
Og'ir qoʻngʻir:       #8B1A1A  (xavf / ta'kidlash uchun, kam ishlatilsin)
```

**Muhim:** Ranglar sovuq texnologik ko'k yoki zamonaviy startap estetikasidan uzoq bo'lsin. Institut qadimiy an'ana + zamonaviy texnologiya uyg'unligini ifodalashi kerak.

---

## Tipografiya

```
Display / Sarlavha:  "Playfair Display" yoki "Cormorant Garamond"
                     (muhtasham, amaldorona, harbiy martabaga mos)
Body / Tana matni:   "Inter" yoki "Noto Sans"
                     (o'qilishi oson, zamonaviy)
Utility / Raqamlar: "Roboto Mono"
                     (statistika, raqamlar, kodlar uchun)
```

---

## Tuzilma va bo'limlar (Section structure)

Templatedagi mavjud bo'limlarni quyidagi harbiy institut kontentiga moslashtirib o'zgartirilsin:

### 1. `<header>` / Navigatsiya
- Logo joyi: Institut gerbini (coat of arms) qo'yish uchun placeholder (`[GERB]`)
- Navigatsiya linklari:
  - Institut haqida
  - Ta'lim yo'nalishlari
  - Kursantlarga
  - Ilmiy faoliyat
  - Qabul
  - Aloqa
- O'zbek | Рус tili almashtiruvchisi
- Ranglar: to'q yashil fon (`#1B3A2D`), oltin aksent (`#C8A84B`)

### 2. Hero bo'lim
- Sarlavha: **"Vatanparvar Kadrlar — Raqamli Mudofaa Poydevori"**
- Kichik sarlavha: *"Axborot kommunikatsiya texnologiyalari va harbiy aloqa sohasida oliy bilim beruvchi harbiy ta'lim muassasasi"*
- Tugmalar:
  - `[Qabul hujjatlari]` — birlamchi (oltin rang)
  - `[Institut haqida ko'proq]` — ikkilamchi (shaffof/outline)
- Fon: to'q yashil gradient yoki harbiy texturedan ilhomlanilgan pattern (SVG yoki CSS)
- Statistika tasmalari (hero ostida):
  - 🎓 **500+** Bitiruvchi
  - 📚 **12** Ta'lim yo'nalishi
  - 🏛️ **30+** Yillik tajriba
  - 🔬 **8** Ilmiy laboratoriya

### 3. Institut haqida (About)
- Ikkita ustun: chapda matn, o'ngda rasm placeholder `[BINO RASMI]`
- Matn:
  > Institut O'zbekiston Qurolli Kuchlari tarkibida faoliyat yurituvchi harbiy oliy ta'lim muassasasi bo'lib, axborot kommunikatsiya texnologiyalari, kibermudofaa, harbiy aloqa tizimlari va raqamli razvedka yo'nalishlarida malakali zobit kadrlar tayyorlaydi.
- Qadriyatlar (ikon + matn):
  - 🛡️ Intizom va vatanparvarlik
  - 💻 Zamonaviy texnologiyalar
  - 🎯 Amaliy ko'nikmalar
  - 🤝 Jamoaviy ruh

### 4. Ta'lim yo'nalishlari (Programs / Courses)
- Kartochkalar grid (3 ustun):
  1. **Axborot xavfsizligi** — Kibermudofaa, shifrlash, tarmoq himoyasi
  2. **Harbiy aloqa tizimlari** — Radio, raqamli va sun'iy yo'ldosh aloqasi
  3. **Amaliy dasturlash** — Harbiy tizimlar uchun dasturiy ta'minot
  4. **Razvedka va monitoring** — Signallarni tahlil qilish, OSINT
  5. **Tarmoq infratuzilmasi** — VPN, xavfsiz tarmoqlar loyihalash
  6. **Raqamli kriptografiya** — Shifrlash algoritmlar, ERI, blockchain
- Har bir kartochkada: ikon, nom, qisqa tavsif, `[Batafsil]` tugmasi

### 5. Yangiliklar va e'lonlar (News)
- 3 ta yangilik kartochkasi:
  - `[SANA]` | `[SARLAVHA]` | `[QISQA TAVSIF]`
- "Barcha yangiliklar" linki
- Alohida `E'lonlar` bo'limi (qabul muddatlari, imtihon jadvali)

### 6. Raqamlarimiz (Stats / Numbers)
- To'liq kenglik, yashil fon
- Katta raqamlar, oltin rang:
  - **1994** — Tashkil etilgan yil
  - **500+** — Bitiruvchilar
  - **45** — O'qituvchi-professor
  - **98%** — Ishga joylashish ko'rsatkichi

### 7. Qabul bo'limi (Admissions)
- Jadval yoki qadam-qadam yo'riqnoma:
  1. Hujjatlar topshirish
  2. Tibbiy ko'rik
  3. Jismoniy tayyorgarlik sinovlari
  4. Bilim sinovi (matematika, fizika, informatika)
  5. Buyruq e'lon qilinishi
- `[Hujjatlar ro'yxati]` va `[Ariza shakli]` tugmalari

### 8. Ilmiy faoliyat (Research)
- Laboratoriyalar ro'yxati
- So'nggi ilmiy ishlar (3 ta kartochka)
- Hamkor tashkilotlar logolari placeholder

### 9. Footer
- Ustunlar:
  - Institut logosi va qisqa tavsif
  - Tezkor havolalar
  - Aloqa ma'lumotlari (manzil, telefon, email)
  - Ijtimoiy tarmoqlar (ixtiyoriy)
- Pastki chiziq: © 2025 Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti
- Ranglar: juda to'q yashil (`#0F2218`)

---

## Dizayn qoidalari (Muhim!)

1. **Harbiy jiddiylik:** Hech qanday o'ynoqi, rangli, "fun" element bo'lmasin. Har bir element tartib-intizom va professional imjni ifodalasin.

2. **Milliylik:** O'zbek milliy bezaklari (girih, islimiy naqsh) dan ilhomlanilgan CSS pattern yoki SVG elementlarni divider yoki hero fon sifatida qo'llash mumkin — ammo nozik va discretly.

3. **Texnologiyaviyllik:** Harbiy + raqamli estetika. "Skanerlangan" yoki monospace tipografik aksentlar ma'qul.

4. **Mobil moslashuvchanlik:** Barcha bo'limlar responsive bo'lishi shart (mobile-first yondashuv).

5. **Mavjud templateni asosiy saqla:** Templatening HTML tuzilmasini, CSS sinflarini, va JavaScript mantiqini iloji boricha saqlagan holda faqat kontent, ranglar, shriftlar, va ayrim layout elementlarini o'zgartir.

6. **Rasm joylashtiruvchilar:** Haqiqiy rasmlar o'rniga `<div class="img-placeholder">` yoki `aspect-ratio` saqlovchi konteynerlar ishlatilsin, va har biriga `alt` va `data-description` atributi berilsin.

---

## Chiqarish formati

- Bitta `index.html` fayl (CSS inline `<style>` yoki alohida `<link>` orqali)
- Agar template ko'p fayl bo'lsa — har bir faylni alohida qayta yoz
- Barcha o'zgartirishlarni `<!-- HARBIY INSTITUT: o'zgartirildi -->` kabi HTML kommentariyalar bilan belgilab qo'y
- Faylning boshida o'zgartirishlar xulosasini `<!-- CHANGELOG -->` blokida yoz

---

## Qo'shimcha ko'rsatmalar

- Agar templateda `contact form` bo'lsa — uni `Qabul arizasi` shakliga aylantir (ism, familiya, tug'ilgan yil, telefon, yo'nalish tanlash, xabar)
- Agar `testimonials / reviews` bo'lsa — uni bitiruvchilar va o'qituvchilar iqtiboslari bilan almashtir
- Agar `pricing` bo'lsa — uni o'chirib, o'rniga `Stipendiya va ijtimoiy kafolatlar` bo'limini qo'y
- Agar `blog` bo'lsa — `Ilmiy maqolalar va yangiliklar` bo'limiga aylantir

---

*Bu promptni Claude Code yoki Claude.ai ga template fayl bilan birga yuboring.*
