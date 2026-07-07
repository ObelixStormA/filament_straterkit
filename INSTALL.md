# O'rnatish qo'llanmasi

Ushbu hujjat loyihani GitHub'dan yuklab olib, hozirgi holatigacha (Filament 4 admin panel + AKTVA Instituti ommaviy sayti + til almashtirish) to'liq ishga tushirish uchun qadamma-qadam yo'riqnoma beradi.

## 1. Talablar

- PHP 8.2 yoki undan yuqori (loyihada PHP 8.3 bilan ishlab chiqilgan)
- PHP kengaytmalari: `openssl`, `pdo_mysql`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`, `gd` (rasm yuklash uchun)
- Composer 2.x
- MySQL 8.0 (yoki mos keladigan MariaDB)
- (Ixtiyoriy) Node.js + npm — faqat kelajakda frontend assetlarini qayta qurish kerak bo'lsa; hozirgi ommaviy sayt `public/template/` ichidagi tayyor CSS/JS fayllardan foydalanadi va Vite build talab qilmaydi

## 2. Loyihani yuklab olish

```bash
git clone https://github.com/ObelixStormA/filament_straterkit.git
cd filament_straterkit
```

## 3. Composer paketlarini o'rnatish

```bash
composer install
```

## 4. `.env` faylini sozlash

```bash
cp .env.example .env
php artisan key:generate
```

`.env` faylida quyidagilarni tekshiring/o'zgartiring:

```env
APP_URL=http://localhost:8000

# Sayt asosan o'zbek tilida ishlaydi
APP_LOCALE=uz
APP_FALLBACK_LOCALE=uz

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aktva_instituti
DB_USERNAME=root
DB_PASSWORD=
```

> **Muhim:** `APP_LOCALE` va `APP_FALLBACK_LOCALE` albatta `uz` bo'lishi kerak — aks holda ma'lumotlar bazasidan keladigan matnlar (dastur nomlari, yangiliklar va h.k.) noto'g'ri tilda chiqishi mumkin.

## 5. MySQL bazasini yaratish

```sql
CREATE DATABASE aktva_instituti CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

(baza nomi `.env` dagi `DB_DATABASE` bilan mos kelishi kerak)

## 6. Migratsiyalarni ishga tushirish

```bash
php artisan migrate
```

> Faqat shu buyruqdan foydalaning. `migrate:fresh` yoki `migrate:reset` ishlatilmasin.

## 7. Boshlang'ich ma'lumotlarni yuklash (seed)

Barchasini birdaniga yuklash:

```bash
php artisan db:seed
```

Bu quyidagilarni ketma-ket bajaradi:
- `RolePermissionSeeder` — rollar va ruxsatlar (super-admin, admin, user)
- `AdminUserSeeder` — boshlang'ich admin foydalanuvchi
- Sayt kontenti uchun 18 ta seeder — sozlamalar, bosh sahifa bo'limlari (hero, qadriyatlar, yo'nalishlar va h.k.), yangiliklar, jurnal/to'plamlar, hamkorlar, ijtimoiy tarmoqlar, statik sahifalar (Nizom, Litsenziya, Kadrlar bo'limi)

Agar bittasini alohida qayta ishga tushirish kerak bo'lsa:

```bash
php artisan db:seed --class=NewsSeeder
```

## 8. Storage havolasini yaratish

Rasm/fayl yuklashlar (`Storage::url()`) ishlashi uchun:

```bash
php artisan storage:link
```

## 9. Serverni ishga tushirish

```bash
php artisan serve
```

Sayt manzili: `http://127.0.0.1:8000`

## 10. Kirish ma'lumotlari

**Admin panel:** `http://127.0.0.1:8000/admin`

| Email | Parol |
|---|---|
| `admin@example.com` | `password` |

> Ishlab chiqarish (production) muhitida bu parolni albatta o'zgartiring.

## 11. Sayt sahifalari

| Sahifa | Manzil |
|---|---|
| Bosh sahifa | `/` |
| Yangiliklar | `/yangiliklar` |
| Yangilik sahifasi | `/yangiliklar/{slug}` |
| Ilmiy jurnallar | `/jurnallar` |
| To'plamlar | `/toplamlar` |
| Aloqa / Qabul arizasi | `/aloqa` |
| Statik sahifalar (Nizom va h.k.) | `/sahifa/{slug}` |
| Tilni almashtirish | `/til/{uz\|ru\|en}` |

## 12. Xatoliklarni bartaraf etish

```bash
php artisan migrate:status    # migratsiya holatini tekshirish
php artisan optimize:clear    # barcha cache larni tozalash
php artisan filament:upgrade  # Filament xatosi bo'lsa
php artisan storage:link      # storage havolasi yo'qolgan bo'lsa
```

Agar sahifalar oq/xatolik bilan ochilsa, birinchi navbatda `.env` dagi `APP_KEY` bo'sh emasligini va MySQL ulanishi to'g'riligini tekshiring.
