<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>شركة عزة المجد التجارية</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            direction: rtl;
        }

        * {
            box-sizing: border-box;
        }

        header,
        .section {
            color: #fff;
            text-align: center;
            padding: 80px 20px;
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        header::before,
        .section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        header>*,
        .section>* {
            position: relative;
            z-index: 2;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }

        h1,
        h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            margin: 0 auto 30px;
            max-width: 700px;
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            /* maybe 0.5 if image is bright */
            z-index: 1;
        }

        .section>* {
            position: relative;
            z-index: 2;
        }


        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }

        .feature {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .feature h3 {
            margin-bottom: 10px;
            color: #1a252f;
        }

        .store-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .store-buttons a img {
            height: 60px;
            transition: transform 0.3s ease;
        }

        .store-buttons a img:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- Hero / Header -->
    <header style="background-image: url('https://images.unsplash.com/photo-1532619675605-1d6c3c7f72f2');">
        <img src="{{ asset($settings->site_logo) }}" alt="شعار الشركة" class="logo">
        <h1>مرحباً بكم في شركة عزة المجد التجارية</h1>
        <p>منصة آمنة لإنشاء العقود بين المستخدمين والشركة بكل سهولة وموثوقية</p>
        <div class="store-buttons">
            <a href="https://play.google.com/store" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
                    alt="Google Play">
            </a>
            <a href="https://www.apple.com/app-store/" target="_blank">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
                    alt="App Store">
            </a>
        </div>
    </header>

    <!-- About Section -->
    <section class="section"
        style="background-image: url('https://images.unsplash.com/photo-1521791136064-7986c2920216');">
        <h2>من نحن؟</h2>
        <p>
            شركة عزة المجد التجارية هي منصة رقمية متخصصة في إدارة وإنشاء العقود الإلكترونية بين الأفراد والشركات. نسعى
            لتقديم خدمات موثوقة، سريعة وآمنة تسهل عمليات التعاقد من خلال تطبيقنا الذكي.
        </p>
    </section>

    <!-- How it Works -->
    <section class="section" style="background-image: url('URL_TO_IMAGE_1');">
        <h2>كيف تعمل منصتنا؟</h2>
        <p>خطوات بسيطة لفهم آلية عملنا:</p>
        <div class="features">
            <div class="feature">
                <h3>1. التسجيل</h3>
                <p>قم بإنشاء حسابك كمستخدم جديد بسهولة عبر التطبيق.</p>
            </div>
            <div class="feature">
                <h3>2. إنشاء العقد</h3>
                <p>اختر نوع العقد واملأ البيانات المطلوبة بكل مرونة.</p>
            </div>
            <div class="feature">
                <h3>3. التوقيع الرقمي</h3>
                <p>وقع العقد بشكل إلكتروني وآمن من خلال المنصة.</p>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="section"
        style="background-image: url('https://images.unsplash.com/photo-1556740749-887f6717d7e4');">
        <h2>مزايا استخدام منصتنا</h2>
        <div class="features">
            <div class="feature">
                <h3>سهولة الاستخدام</h3>
                <p>واجهة سهلة وسلسة لجميع المستخدمين.</p>
            </div>
            <div class="feature">
                <h3>أمان عالي</h3>
                <p>نستخدم أحدث تقنيات التشفير لحماية بياناتك.</p>
            </div>
            <div class="feature">
                <h3>دعم متواصل</h3>
                <p>فريق دعم متاح للرد على استفساراتك.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 شركة عزة المجد التجارية. جميع الحقوق محفوظة.</p>
    </footer>

</body>

</html>