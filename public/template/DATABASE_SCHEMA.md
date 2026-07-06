## ⚠️ MUHIM: MAVJUD KOD HIMOYASI

Bu loyihada ALLAQACHON qilingan qismlar bor. Boshlashdan oldin:

1. `app/Filament/Resources/` ni skan qil — mavjud Resource larni KO'RSAT, ustiga YOZMA
2. `database/migrations/` ni skan qil — mavjud jadvallarni aniqlа, qayta migration YARATMA
3. `app/Models/` ni skan qil — mavjud modellarni o'zgartirma, faqat yo'q bo'lganlarini yarat
4. `routes/web.php` ni o'qi — mavjud route larni o'chirmа

### Qoidalar:
- Fayl mavjud bo'lsa → **skip** qil va menga ayt
- Jadval migration i mavjud bo'lsa → **yangi migration** yozmа, add_column migration yaz
- `php artisan migrate:fresh` yoki `db:seed` ni **HECH QACHON** ishlatma
- Faqat `php artisan migrate` ishlatilsin
- Seeder da `News::create()` o'rniga `News::firstOrCreate()` ishlatilsin
# AKTVA Instituti — Admin Panel va Ma'lumotlar Bazasi Sxemasi

Ushbu hujjat `index.html`, `jurnallar.html`, `toplamlar.html`, `page-contact.html` sahifalarini (va umuman saytning barcha bo'limlarini) **to'liq dinamik** qilish uchun zarur bo'lgan ma'lumotlar bazasi jadvallarini va admin panel modullarini tavsiflaydi. Sayt **3 tilda** (O'zbek — `uz`, Rus — `ru`, Ingliz — `en`) ishlashi ko'zda tutilgan.

---

## 1. Umumiy arxitektura printsipi

### 1.1. Ko'p tillilik (i18n) yondashuvi

Har bir "tarjima qilinadigan matn"ga ega jadval uchun **2 ta jadval** ishlatiladi:

- **Asosiy jadval** (`masalan: programs`) — tilga bog'liq bo'lmagan ma'lumotlar: rasm, ikon, tartib raqami (`sort_order`), holat (`is_active`), sanalar, tashqi kalitlar (FK).
- **Tarjima jadvali** (`masalan: program_translations`) — har bir til uchun matnli maydonlar: sarlavha, tavsif va h.k. Bu jadval `(entity_id, language_id)` bo'yicha **UNIQUE** bo'ladi.

Bu yondashuv tufayli yangi til qo'shish (masalan, kelajakda tojik yoki qozoq tili) faqat `languages` jadvaliga yozuv qo'shish orqali amalga oshadi — struktura o'zgarmaydi.

### 1.2. Umumiy ustunlar

Deyarli barcha asosiy jadvallarda quyidagi ustunlar takrorlanadi (jadval tavsiflarida qisqartirish uchun alohida ko'rsatilmagan bo'lishi mumkin):

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK, AUTO_INCREMENT | Asosiy kalit |
| `created_at` | DATETIME | Yaratilgan sana |
| `updated_at` | DATETIME | Oxirgi o'zgartirilgan sana |

### 1.3. Modullar ro'yxati (admin panel menyusi)

| # | Modul | Bog'liq jadvallar |
|---|---|---|
| 1 | Boshqaruv paneli (Dashboard) | barcha jadvallar bo'yicha statistika |
| 2 | Tizim sozlamalari | `site_settings`, `site_setting_translations`, `languages`, `ui_strings` |
| 3 | Foydalanuvchilar va rollar | `admin_users`, `roles`, `permissions`, `role_permissions` |
| 4 | Navigatsiya (menyu) | `menu_items`, `menu_item_translations` |
| 5 | Statik sahifalar | `pages`, `page_translations` |
| 6 | Bosh sahifa — Hero | `hero_slides`, `hero_slide_translations` |
| 7 | Bosh sahifa — Statistika tasmasi | `hero_stats`, `hero_stat_translations` |
| 8 | Institut haqida | `about_section`, `about_section_translations`, `about_values`, `about_value_translations` |
| 9 | Matn bloklari (banner/CTA) | `content_blocks`, `content_block_translations` |
| 10 | Ta'lim yo'nalishlari | `programs`, `program_translations` |
| 11 | Ilmiy faoliyat — Laboratoriyalar | `labs`, `lab_translations` |
| 12 | Raqamlarimiz | `stat_numbers`, `stat_number_translations` |
| 13 | Qabul — Bosqichlar | `admission_steps`, `admission_step_translations` |
| 14 | Qabul — Hujjatlar ro'yxati | `admission_documents`, `admission_document_translations` |
| 15 | Qabul — Muhim sanalar/e'lonlar | `admission_key_dates`, `admission_key_date_translations` |
| 16 | Qabul arizalari | `admission_applications` |
| 17 | Fikrlar (Testimonials) | `testimonials` |
| 18 | Yangiliklar / Ilmiy maqolalar | `news_categories`, `news_category_translations`, `news`, `news_translations` |
| 19 | Ilmiy jurnallar va to'plamlar | `publications`, `publication_translations` |
| 20 | Hamkor tashkilotlar | `partners` |
| 21 | Ijtimoiy tarmoqlar | `social_links` |
| 22 | Aloqa xabarlari | `contact_messages` |
| 23 | Media kutubxonasi | `media_library` |
| 24 | Faoliyat jurnali (audit log) | `activity_logs` |

---

## 2. Tizim jadvallari

### 2.1. `languages` — Tillar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | TINYINT UNSIGNED, PK | |
| `code` | VARCHAR(5), UNIQUE | `uz`, `ru`, `en` |
| `name` | VARCHAR(50) | "O'zbekcha", "Русский", "English" |
| `flag_icon` | VARCHAR(255), NULL | bayroq belgisi/ikon fayli |
| `is_default` | BOOLEAN, DEFAULT false | asosiy til (uz) |
| `is_active` | BOOLEAN, DEFAULT true | saytda ko'rinadimi |
| `sort_order` | SMALLINT, DEFAULT 0 | til almashtirgichdagi tartib |

**Boshlang'ich ma'lumot:** `uz` (default), `ru`, `en`.

### 2.2. `admin_users` — Admin panel foydalanuvchilari

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `full_name` | VARCHAR(150) | |
| `username` | VARCHAR(60), UNIQUE | |
| `email` | VARCHAR(150), UNIQUE | |
| `password_hash` | VARCHAR(255) | |
| `avatar` | VARCHAR(255), NULL | |
| `role_id` | BIGINT UNSIGNED, FK → `roles.id` | |
| `is_active` | BOOLEAN, DEFAULT true | |
| `last_login_at` | DATETIME, NULL | |

### 2.3. `roles` — Rollar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `name` | VARCHAR(100) | masalan: "Super Admin", "Kontent menejer", "Qabul komissiyasi a'zosi" |
| `description` | VARCHAR(255), NULL | |

### 2.4. `permissions` — Ruxsatlar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `module_key` | VARCHAR(60) | masalan: `news`, `programs`, `admissions`, `settings` |
| `name` | VARCHAR(100) | "Yangiliklarni tahrirlash" |

### 2.5. `role_permissions` — Rol ↔ Ruxsat (pivot)

| Ustun | Tur | Izoh |
|---|---|---|
| `role_id` | BIGINT UNSIGNED, FK → `roles.id` | |
| `permission_id` | BIGINT UNSIGNED, FK → `permissions.id` | |

Kompozit PK: `(role_id, permission_id)`.

### 2.6. `site_settings` — Global sozlamalar (tilga bog'liq bo'lmagan)

Bitta qatorli (singleton) jadval yoki key-value ko'rinishida bo'lishi mumkin. Quyida ustunli (qulayroq) variant:

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | TINYINT UNSIGNED, PK | har doim `1` |
| `site_logo` | VARCHAR(255) | `images/ahi.png` — gerb/logotip |
| `site_favicon` | VARCHAR(255) | |
| `phone_primary` | VARCHAR(30) | +998 71 200 00 00 |
| `phone_fax` | VARCHAR(30), NULL | |
| `email_primary` | VARCHAR(150) | info@aktva.uz |
| `map_latitude` | DECIMAL(10,7) | 41.2091417 |
| `map_longitude` | DECIMAL(10,7) | 69.1374836 |
| `map_embed_url` | VARCHAR(500), NULL | Yandex/Google xarita widget URL |
| `founding_year` | SMALLINT | 1994 |
| `theme_color_primary` | VARCHAR(9) | `#1B3A2D` |
| `theme_color_secondary` | VARCHAR(9) | `#2E5E45` |
| `theme_color_accent` | VARCHAR(9) | `#C8A84B` |
| `font_heading` | VARCHAR(100), NULL | "Playfair Display" |
| `font_body` | VARCHAR(100), NULL | "Inter" |

### 2.7. `site_setting_translations` — Sozlamalarning tarjima qilinadigan qismi

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `site_setting_id` | TINYINT UNSIGNED, FK → `site_settings.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `site_name` | VARCHAR(255) | "Axborot Kommunikatsiya Texnologiyalari va Harbiy Aloqa Instituti" |
| `site_short_name` | VARCHAR(100) | "AKTVA Instituti" |
| `address` | VARCHAR(500) | "Toshkent viloyati, Zangiota tumani, Quyoshli MFY" |
| `footer_description` | TEXT | Footer 1-ustunidagi institut tavsifi |
| `meta_description` | VARCHAR(500) | SEO uchun |
| `meta_keywords` | VARCHAR(500) | SEO uchun |

UNIQUE: `(site_setting_id, language_id)`.

### 2.8. `ui_strings` — Statik interfeys matnlari (tugma/label lug'ati)

Shablonda qattiq yozilgan "Batafsil", "Yuklab olish", "Barcha yangiliklar" kabi takrorlanuvchi matnlarni boshqarish uchun.

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `key` | VARCHAR(100), UNIQUE | masalan: `btn_read_more`, `btn_download`, `btn_all_news` |
| `group_name` | VARCHAR(60), NULL | guruhlash uchun: `buttons`, `labels`, `forms` |

### 2.9. `ui_string_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `ui_string_id` | BIGINT UNSIGNED, FK → `ui_strings.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `value` | VARCHAR(255) | "Batafsil" / "Подробнее" / "Read more" |

UNIQUE: `(ui_string_id, language_id)`.

### 2.10. `media_library` — Fayl/rasm kutubxonasi

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `file_name` | VARCHAR(255) | |
| `file_path` | VARCHAR(500) | `/upload/...` |
| `mime_type` | VARCHAR(100) | |
| `size_bytes` | INT UNSIGNED | |
| `alt_text` | VARCHAR(255), NULL | |
| `uploaded_by` | BIGINT UNSIGNED, FK → `admin_users.id` | |

> Boshqa jadvallardagi rasm/fayl ustunlari (`cover_image`, `photo` va h.k.) `media_library.id` ga FK sifatida ham, to'g'ridan-to'g'ri fayl yo'li (VARCHAR) sifatida ham saqlanishi mumkin. Kichik loyihalar uchun VARCHAR yo'l tavsiya etiladi, katta arxiv kerak bo'lsa FK tavsiya etiladi.

### 2.11. `activity_logs` — Amallar tarixi

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `admin_user_id` | BIGINT UNSIGNED, FK → `admin_users.id` | |
| `module` | VARCHAR(60) | masalan `news`, `programs` |
| `action` | VARCHAR(30) | `created` / `updated` / `deleted` |
| `entity_id` | BIGINT UNSIGNED, NULL | qaysi yozuv ustida amal bajarilgani |
| `description` | VARCHAR(500), NULL | |
| `ip_address` | VARCHAR(45), NULL | |

---

## 3. Navigatsiya va statik sahifalar

### 3.1. `menu_items` — Header va Footer navigatsiyasi

Header nav (`Bosh sahifa`, `Institut haqida`, `Ta'lim yo'nalishlari`, `Ilmiy jurnallar ▸ Jurnallar/To'plamlar`, `Qabul`, `Aloqa`) hamda Footer ustunlari (`Tezkor havolalar`, `Foydali havolalar`) shu bitta jadvaldan boshqariladi.

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `parent_id` | BIGINT UNSIGNED, FK → `menu_items.id`, NULL | pastki menyu uchun (masalan "Ilmiy jurnallar" ostida) |
| `link_type` | ENUM('url','page','section_anchor') | havola turi |
| `url_value` | VARCHAR(500), NULL | `link_type='url'` bo'lsa (masalan `jurnallar.html`) |
| `page_id` | BIGINT UNSIGNED, FK → `pages.id`, NULL | `link_type='page'` bo'lsa |
| `section_anchor` | VARCHAR(60), NULL | `link_type='section_anchor'` bo'lsa (`#about`, `#qabul`) |
| `icon` | VARCHAR(60), NULL | font-awesome klassi |
| `location` | ENUM('header','footer_quick_links','footer_useful_links') | qayerda chiqishi |
| `open_in_new_tab` | BOOLEAN, DEFAULT false | |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 3.2. `menu_item_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `menu_item_id` | BIGINT UNSIGNED, FK → `menu_items.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `label` | VARCHAR(150) | "Institut haqida" / "О институте" / "About Institute" |

UNIQUE: `(menu_item_id, language_id)`.

### 3.3. `pages` — Statik CMS sahifalari (Nizom, Litsenziya, Kadrlar bo'limi va h.k.)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `slug` | VARCHAR(150), UNIQUE | `nizom`, `litsenziya`, `kadrlar-bolimi` |
| `featured_image` | VARCHAR(255), NULL | |
| `is_published` | BOOLEAN, DEFAULT true | |
| `published_at` | DATETIME, NULL | |

### 3.4. `page_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `page_id` | BIGINT UNSIGNED, FK → `pages.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(255) | |
| `content_html` | LONGTEXT | Rich-text/WYSIWYG kontent |
| `meta_title` | VARCHAR(255), NULL | |
| `meta_description` | VARCHAR(500), NULL | |

UNIQUE: `(page_id, language_id)`.

---

## 4. Bosh sahifa (Home) bo'limlari

### 4.1. `hero_slides` — Hero bo'lim (video-section)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `background_type` | ENUM('image','video') | |
| `background_image` | VARCHAR(255), NULL | |
| `background_video` | VARCHAR(255), NULL | `upload/preview.mp4` |
| `primary_button_url` | VARCHAR(255), NULL | `#qabul` |
| `secondary_button_url` | VARCHAR(255), NULL | `#about` |
| `sort_order` | SMALLINT, DEFAULT 0 | bir nechta slayd bo'lsa tartib |
| `is_active` | BOOLEAN, DEFAULT true | |

### 4.2. `hero_slide_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `hero_slide_id` | BIGINT UNSIGNED, FK → `hero_slides.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(255) | "Vatanparvar Kadrlar — Raqamli Mudofaa Poydevori" |
| `subtitle` | VARCHAR(500) | kichik sarlavha |
| `primary_button_text` | VARCHAR(100) | "Qabul hujjatlari" |
| `secondary_button_text` | VARCHAR(100) | "Institut haqida ko'proq" |

UNIQUE: `(hero_slide_id, language_id)`.

### 4.3. `hero_stats` — Hero ostidagi statistika tasmasi (500+ bitiruvchi va h.k.)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `icon` | VARCHAR(60) | `fa-graduation-cap` |
| `number_display` | VARCHAR(20) | `500+`, `12`, `30+`, `8` (matn sifatida, chunki `+` belgisi bor) |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 4.4. `hero_stat_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `hero_stat_id` | BIGINT UNSIGNED, FK → `hero_stats.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `label` | VARCHAR(100) | "Bitiruvchi" |

UNIQUE: `(hero_stat_id, language_id)`.

### 4.5. `about_section` — "Institut haqida" bloki (singleton)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | TINYINT UNSIGNED, PK | har doim `1` |
| `image` | VARCHAR(255), NULL | `[BINO RASMI]` o'rniga haqiqiy rasm |

### 4.6. `about_section_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `about_section_id` | TINYINT UNSIGNED, FK → `about_section.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title_html` | VARCHAR(500) | `<mark>` belgisini saqlash uchun HTML ruxsat etilgan |
| `description` | TEXT | |
| `button_text` | VARCHAR(100) | "Ta'lim yo'nalishlari bilan tanishish" |

UNIQUE: `(about_section_id, language_id)`.

### 4.7. `about_values` — Qadriyatlar (ikon + matn, 4 dona)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `icon` | VARCHAR(60) | `fa-shield`, `fa-microchip`, `fa-crosshairs`, `fa-users` |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 4.8. `about_value_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `about_value_id` | BIGINT UNSIGNED, FK → `about_values.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(150) | "Intizom va vatanparvarlik" |

UNIQUE: `(about_value_id, language_id)`.

### 4.9. `content_blocks` — Qayta ishlatiluvchi matn bloklari (bo'lim sarlavhalari, banner, CTA)

Saytdagi har bir bo'lim sarlavhasi (`<h3>` + qisqa tavsif), motto banner va "Stipendiya" CTA kabi "bir martalik" matn bloklarini alohida jadval yaratmasdan boshqarish uchun umumiy jadval. Har bir blok o'ziga xos `block_key` bilan aniqlanadi.

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `block_key` | VARCHAR(100), UNIQUE | pastdagi ro'yxatga qarang |
| `icon` | VARCHAR(60), NULL | masalan CTA uchun `fa-shield` |
| `image` | VARCHAR(255), NULL | |
| `button_url` | VARCHAR(255), NULL | |
| `is_active` | BOOLEAN, DEFAULT true | |

**Standart `block_key` ro'yxati (boshlang'ich ma'lumot):**

| `block_key` | Qayerda ishlatiladi |
|---|---|
| `section_yonalishlar_intro` | "Ta'lim yo'nalishlari" bo'lim sarlavhasi/tavsifi |
| `motto_banner` | "Intizom bilan bilim, vatanparvarlik bilan xizmat..." |
| `section_ilmiy_faoliyat_intro` | "Ilmiy faoliyat — Laboratoriyalar" sarlavhasi |
| `section_qabul_intro` | "Qabul bo'limi" sarlavhasi |
| `section_kursantlarga_intro` | "Bitiruvchilar va o'qituvchilar fikri" sarlavhasi |
| `section_news_intro` | "Yangiliklar va e'lonlar" sarlavhasi |
| `section_research_intro` | "So'nggi ilmiy ishlar" sarlavhasi |
| `scholarship_callout` | "Stipendiya va ijtimoiy kafolatlar" CTA bloki |
| `announcements_box` | "E'lonlar" quti sarlavhasi ("Hujjatlar qabul...") |

### 4.10. `content_block_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `content_block_id` | BIGINT UNSIGNED, FK → `content_blocks.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(500), NULL | |
| `subtitle` | TEXT, NULL | |
| `button_text` | VARCHAR(100), NULL | |

UNIQUE: `(content_block_id, language_id)`.

### 4.11. `stat_numbers` — "Raqamlarimiz" bo'limi

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `icon` | VARCHAR(60) | `fa-university`, `fa-graduation-cap`, `fa-user`, `fa-percent` |
| `number_value` | INT | `1994`, `500`, `45`, `98` |
| `suffix` | VARCHAR(10), NULL | `+`, `%` |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 4.12. `stat_number_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `stat_number_id` | BIGINT UNSIGNED, FK → `stat_numbers.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `label` | VARCHAR(150) | "Tashkil etilgan yil" |

UNIQUE: `(stat_number_id, language_id)`.

---

## 5. Ta'lim yo'nalishlari

### 5.1. `programs` — Yo'nalishlar (Axborot xavfsizligi, Harbiy aloqa tizimlari va h.k.)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `slug` | VARCHAR(150), UNIQUE | detail sahifa uchun |
| `icon` | VARCHAR(60) | `fa-lock`, `fa-wifi`, `fa-code`... |
| `image` | VARCHAR(255), NULL | kurs rasmi |
| `duration_years` | TINYINT UNSIGNED, NULL | o'qish muddati |
| `degree_type` | VARCHAR(100), NULL | "Bakalavriat" va h.k. |
| `quota` | SMALLINT UNSIGNED, NULL | qabul kvotasi |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 5.2. `program_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `program_id` | BIGINT UNSIGNED, FK → `programs.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `name` | VARCHAR(255) | "Axborot xavfsizligi" |
| `short_description` | VARCHAR(500) | kartochkadagi qisqa matn |
| `full_description` | LONGTEXT, NULL | "Batafsil" sahifasi uchun to'liq matn |

UNIQUE: `(program_id, language_id)`.

---

## 6. Ilmiy faoliyat

### 6.1. `labs` — Laboratoriyalar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `icon` | VARCHAR(60) | `fa-shield`, `fa-satellite`... |
| `box_size` | ENUM('normal','wide') | `wide` = `col-md-6` (masalan "Harbiy aloqa va simulyatsiya markazi") |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 6.2. `lab_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `lab_id` | BIGINT UNSIGNED, FK → `labs.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(255) | |
| `description` | TEXT | |

UNIQUE: `(lab_id, language_id)`.

### 6.3. `partners` — Hamkor tashkilotlar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `name` | VARCHAR(255) | tashkilot nomi (odatda tarjima talab qilmaydi) |
| `logo` | VARCHAR(255) | |
| `website_url` | VARCHAR(255), NULL | |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

---

## 7. Yangiliklar va Ilmiy maqolalar (blog o'rnini bosuvchi)

### 7.1. `news_categories` — Toifalar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `slug` | VARCHAR(150), UNIQUE | |
| `sort_order` | SMALLINT, DEFAULT 0 | |

### 7.2. `news_category_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `news_category_id` | BIGINT UNSIGNED, FK → `news_categories.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `name` | VARCHAR(150) | "Yangiliklar", "E'lonlar", "Ilmiy maqolalar" |

UNIQUE: `(news_category_id, language_id)`.

### 7.3. `news` — Yangiliklar / E'lonlar / Ilmiy maqolalar (birlashtirilgan)

> "Yangiliklar va e'lonlar" hamda "So'nggi ilmiy ishlar" bo'limlari deyarli bir xil struktura (rasm, sarlavha, qisqa tavsif, sana) ga ega bo'lgani uchun bitta jadvalda birlashtirilgan, `is_research` bayrog'i va `category_id` orqali ajratiladi.

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `slug` | VARCHAR(200), UNIQUE | |
| `category_id` | BIGINT UNSIGNED, FK → `news_categories.id`, NULL | |
| `cover_image` | VARCHAR(255), NULL | |
| `is_research` | BOOLEAN, DEFAULT false | true = "So'nggi ilmiy ishlar" blokida chiqadi |
| `is_featured` | BOOLEAN, DEFAULT false | bosh sahifada ko'rsatiladimi |
| `is_published` | BOOLEAN, DEFAULT true | |
| `author_name` | VARCHAR(150), NULL | ilmiy maqolalar uchun muallif F.I.Sh |
| `author_id` | BIGINT UNSIGNED, FK → `admin_users.id`, NULL | |
| `external_link` | VARCHAR(500), NULL | tashqi manba havolasi |
| `file_url` | VARCHAR(500), NULL | maqola PDF fayli |
| `views_count` | INT UNSIGNED, DEFAULT 0 | |
| `published_at` | DATETIME | |

### 7.4. `news_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `news_id` | BIGINT UNSIGNED, FK → `news.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(300) | |
| `short_description` | VARCHAR(500) | |
| `content_html` | LONGTEXT, NULL | `blog-single.html` uchun to'liq matn |
| `meta_title` | VARCHAR(255), NULL | |
| `meta_description` | VARCHAR(500), NULL | |

UNIQUE: `(news_id, language_id)`.

---

## 8. Ilmiy jurnallar va to'plamlar

### 8.1. `publications` — Jurnallar + To'plamlar (birlashtirilgan)

> `jurnallar.html` va `toplamlar.html` bir xil kartochka strukturasiga ega (muqova, yil, kod ISSN/ISBN, tavsif, yuklab olish), shu sababli bitta jadvalda `type` ustuni orqali ajratiladi.

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `type` | ENUM('journal','collection') | `journal` = Jurnallar, `collection` = To'plamlar |
| `cover_image` | VARCHAR(255), NULL | |
| `year` | SMALLINT | 2026 |
| `issue_number` | VARCHAR(20), NULL | faqat `journal` uchun: "1-son" |
| `event_type` | VARCHAR(150), NULL | faqat `collection` uchun: "Xalqaro konferensiya" |
| `code_type` | ENUM('ISSN','ISBN'), NULL | |
| `code_value` | VARCHAR(50), NULL | "2181-XXXX" |
| `file_url` | VARCHAR(500), NULL | PDF fayl |
| `download_count` | INT UNSIGNED, DEFAULT 0 | |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_published` | BOOLEAN, DEFAULT true | |

### 8.2. `publication_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `publication_id` | BIGINT UNSIGNED, FK → `publications.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(300) | "AKTVA Ilmiy-texnikaviy jurnali" / konferensiya nomi |
| `description` | TEXT | |

UNIQUE: `(publication_id, language_id)`.

---

## 9. Qabul (Admissions)

### 9.1. `admission_steps` — Qabul bosqichlari (1–5)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `step_number` | TINYINT UNSIGNED | 1–5 |
| `icon` | VARCHAR(60), NULL | |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 9.2. `admission_step_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `admission_step_id` | BIGINT UNSIGNED, FK → `admission_steps.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(200) | "Hujjatlar topshirish" |
| `description` | VARCHAR(500) | |

UNIQUE: `(admission_step_id, language_id)`.

### 9.3. `admission_documents` — "Hujjatlar ro'yxati" tugmasi ostidagi ro'yxat

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `file_template_url` | VARCHAR(500), NULL | yuklab olinadigan blank shablon (bo'lsa) |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 9.4. `admission_document_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `admission_document_id` | BIGINT UNSIGNED, FK → `admission_documents.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `name` | VARCHAR(255) | "Pasport nusxasi", "Ma'lumotnoma" va h.k. |

UNIQUE: `(admission_document_id, language_id)`.

### 9.5. `admission_key_dates` — "E'lonlar" qutisidagi muhim sanalar

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `date_start` | DATE, NULL | |
| `date_end` | DATE, NULL | |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 9.6. `admission_key_date_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `admission_key_date_id` | BIGINT UNSIGNED, FK → `admission_key_dates.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `title` | VARCHAR(255) | "Hujjatlar qabul qilish muddati" |

UNIQUE: `(admission_key_date_id, language_id)`.

### 9.7. `admission_applications` — "Qabul arizasi" (contact form → ariza)

Prompt faylida ko'rsatilgandek: ism, familiya, tug'ilgan yil, telefon, yo'nalish tanlash, xabar.

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `first_name` | VARCHAR(100) | |
| `last_name` | VARCHAR(100) | |
| `birth_year` | SMALLINT | |
| `phone` | VARCHAR(30) | |
| `email` | VARCHAR(150), NULL | |
| `program_id` | BIGINT UNSIGNED, FK → `programs.id`, NULL | tanlangan yo'nalish |
| `message` | TEXT, NULL | |
| `status` | ENUM('new','in_review','accepted','rejected'), DEFAULT 'new' | |
| `reviewed_by` | BIGINT UNSIGNED, FK → `admin_users.id`, NULL | |
| `reviewed_at` | DATETIME, NULL | |

---

## 10. Boshqa bo'limlar

### 10.1. `testimonials` — Bitiruvchilar va o'qituvchilar fikri

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `photo` | VARCHAR(255), NULL | |
| `person_type` | ENUM('graduate','teacher') | |
| `rating` | TINYINT UNSIGNED | 1–5 |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 10.2. `testimonial_translations`

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `testimonial_id` | BIGINT UNSIGNED, FK → `testimonials.id` | |
| `language_id` | TINYINT UNSIGNED, FK → `languages.id` | |
| `display_name` | VARCHAR(200) | "Kapitan A. Yusupov" — harbiy unvon tilga qarab tarjima qilinadi |
| `quote_text` | TEXT | |

UNIQUE: `(testimonial_id, language_id)`.

### 10.3. `social_links` — Ijtimoiy tarmoqlar (topbar/footer)

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `platform` | VARCHAR(50) | `telegram`, `youtube`, `instagram`, `facebook` |
| `icon` | VARCHAR(60) | `fa-telegram` |
| `url` | VARCHAR(500) | |
| `display_location` | ENUM('topbar','footer','contact_page') | |
| `sort_order` | SMALLINT, DEFAULT 0 | |
| `is_active` | BOOLEAN, DEFAULT true | |

### 10.4. `contact_messages` — "Aloqa" sahifasidagi umumiy murojaat formasi

| Ustun | Tur | Izoh |
|---|---|---|
| `id` | BIGINT UNSIGNED, PK | |
| `name` | VARCHAR(150) | |
| `email` | VARCHAR(150), NULL | |
| `phone` | VARCHAR(30), NULL | |
| `subject` | VARCHAR(255), NULL | |
| `message` | TEXT | |
| `status` | ENUM('new','read','replied'), DEFAULT 'new' | |

---

## 11. Jadvallar orasidagi bog'lanishlar (ER xulosasi)

```
languages ─┬─< site_setting_translations
           ├─< ui_string_translations
           ├─< menu_item_translations
           ├─< page_translations
           ├─< hero_slide_translations
           ├─< hero_stat_translations
           ├─< about_section_translations
           ├─< about_value_translations
           ├─< content_block_translations
           ├─< stat_number_translations
           ├─< program_translations
           ├─< lab_translations
           ├─< news_category_translations
           ├─< news_translations
           ├─< publication_translations
           ├─< admission_step_translations
           ├─< admission_document_translations
           ├─< admission_key_date_translations
           └─< testimonial_translations

roles ─< admin_users
roles ─< role_permissions >─ permissions
admin_users ─< activity_logs
admin_users ─< media_library (uploaded_by)
admin_users ─< news (author_id)
admin_users ─< admission_applications (reviewed_by)

pages ─< menu_items (page_id, ixtiyoriy)

programs ─< admission_applications (program_id)
programs ─< program_translations

news_categories ─< news
about_section ─< about_values
```

---

## 12. Amalga oshirish bo'yicha eslatmalar

1. **Yagona so'rov bilan sahifa yig'ish:** har bir sahifa render qilinganda joriy tanlangan til `language_id` bo'yicha barcha `*_translations` jadvallaridan `JOIN` orqali matnlar olinadi; agar tarjima topilmasa, `is_default=true` bo'lgan tilga (uz) qaytiladi (fallback).
2. **Slug'lar** (`programs.slug`, `news.slug`, `pages.slug`) SEO-friendly URL yaratish uchun ishlatiladi (`/yonalishlar/axborot-xavfsizligi`).
3. **`sort_order`** ustuni bo'lgan barcha jadvallarda admin panelda drag-and-drop orqali tartiblash imkoniyati bo'lishi kerak.
4. **`is_active` / `is_published`** bayroqlari orqali kontentni o'chirmasdan vaqtincha yashirish mumkin.
5. Rasm/fayl ustunlari uchun amalda **media kutubxonasi** (`media_library`) orqali yuklash va qayta ishlatish tavsiya etiladi (bir xil rasmni bir necha joyda ishlatish uchun).
6. RBAC (`roles`/`permissions`) orqali, masalan, faqat "Qabul komissiyasi" roli `admission_applications` jadvalini ko'rishi, "Kontent menejer" esa `news`/`programs`/`publications` jadvallarini tahrirlashi mumkin bo'ladi.
