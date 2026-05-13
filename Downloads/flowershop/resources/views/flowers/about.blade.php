<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About BLOOMA</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="navbar">
    <div class="logo">BLOOMA</div>

    <nav class="nav-links">
        <a href="/" data-i18n="home">Home</a>
        <a href="/catalog" data-i18n="catalog">Catalog</a>
        <a href="/contacts" data-i18n="contacts">Contacts</a>
        <a href="/about" data-i18n="about">About Us</a>
        <a href="/cart"><span data-i18n="cart">Cart</span> ({{ count(session('cart', [])) }})</a>
    </nav>

    <div class="nav-actions">
        <a href="#" data-i18n="login">Login</a>

        <div class="lang-dropdown">
            <button type="button" class="lang-btn" onclick="toggleLang()">EN ▼</button>
            <div class="lang-menu" id="langMenu">
                <button type="button" onclick="setLang('en')">EN</button>
                <button type="button" onclick="setLang('ru')">RU</button>
                <button type="button" onclick="setLang('kz')">KZ</button>
            </div>
        </div>

        <span class="bag">♡</span>
    </div>
</header>

<section class="about-hero">
    <h1>BLOOMA STUDIO</h1>
    <h2 data-i18n="aboutHero">We create flowers<br>that feel like emotions</h2>
</section>

<section class="about-content">
    <h3 data-i18n="ourStory">Our Story</h3>
    <p data-i18n="aboutText1">BLOOMA is not just a flower shop. It is a space where aesthetics, emotions, and design come together in every bouquet.</p>
    <p data-i18n="aboutText2">We believe flowers are more than a gift. They are a language of feelings. Every composition is carefully designed to express mood, style, and personality.</p>
</section>

<section class="about-features">
    <div>
        <h4 data-i18n="elegance">Elegance</h4>
        <p data-i18n="eleganceText">Minimal, clean, and refined floral design.</p>
    </div>

    <div>
        <h4 data-i18n="emotion">Emotion</h4>
        <p data-i18n="emotionText">Every bouquet carries meaning and feeling.</p>
    </div>

    <div>
        <h4 data-i18n="quality">Quality</h4>
        <p data-i18n="qualityText">Only fresh flowers and premium materials.</p>
    </div>

    <div>
        <h4 data-i18n="style">Style</h4>
        <p data-i18n="styleText">Modern compositions inspired by trends.</p>
    </div>
</section>

<section class="about-stats">
    <div>
        <h2>500+</h2>
        <p data-i18n="bouquetsCreated">Bouquets created</p>
    </div>

    <div>
        <h2>120+</h2>
        <p data-i18n="happyClients">Happy clients</p>
    </div>

    <div>
        <h2>4.9★</h2>
        <p data-i18n="averageRating">Average rating</p>
    </div>
</section>

<footer class="footer">
    <div>
        <h2>BLOOMA</h2>
        <p data-i18n="footerText">Elegant flower studio with modern bouquets for special moments.</p>
    </div>

    <div>
        <h4 data-i18n="quickLinks">Quick Links</h4>
        <p data-i18n="home">Home</p>
        <p data-i18n="catalog">Catalog</p>
        <p data-i18n="about">About Us</p>
        <p data-i18n="contacts">Contacts</p>
        <p data-i18n="cart">Cart</p>
    </div>

    <div>
        <h4 data-i18n="contact">Contact</h4>
        <p>+7 700 123 45 67</p>
        <p>blooma.flowers@gmail.com</p>
        <p>Almaty, Kazakhstan</p>
    </div>

    <div>
        <h4 data-i18n="openingHours">Opening Hours</h4>
        <p>Mon - Fri, 9:00 - 20:00</p>
        <p>Sat, 10:00 - 19:00</p>
        <p>Sun, 11:00 - 17:00</p>
    </div>

    <div>
        <h4>Social</h4>
        <p>Instagram</p>
        <p>WhatsApp</p>
        <p>Telegram</p>
        <p>Pinterest</p>
    </div>
</footer>

<div class="copyright">© BLOOMA. All rights reserved.</div>

<script>
const translations = {
    en: {
        home: "Home", catalog: "Catalog", contacts: "Contacts", about: "About Us", cart: "Cart", login: "Login",
        aboutHero: "We create flowers<br>that feel like emotions",
        ourStory: "Our Story",
        aboutText1: "BLOOMA is not just a flower shop. It is a space where aesthetics, emotions, and design come together in every bouquet.",
        aboutText2: "We believe flowers are more than a gift. They are a language of feelings. Every composition is carefully designed to express mood, style, and personality.",
        elegance: "Elegance", eleganceText: "Minimal, clean, and refined floral design.",
        emotion: "Emotion", emotionText: "Every bouquet carries meaning and feeling.",
        quality: "Quality", qualityText: "Only fresh flowers and premium materials.",
        style: "Style", styleText: "Modern compositions inspired by trends.",
        bouquetsCreated: "Bouquets created", happyClients: "Happy clients", averageRating: "Average rating",
        footerText: "Elegant flower studio with modern bouquets for special moments.",
        quickLinks: "Quick Links", contact: "Contact", openingHours: "Opening Hours"
    },
    ru: {
        home: "Главная", catalog: "Каталог", contacts: "Контакты", about: "О нас", cart: "Корзина", login: "Войти",
        aboutHero: "Мы создаём цветы,<br>которые передают эмоции",
        ourStory: "Наша история",
        aboutText1: "BLOOMA - это не просто цветочный магазин. Это пространство, где эстетика, эмоции и дизайн соединяются в каждом букете.",
        aboutText2: "Мы верим, что цветы - это больше, чем подарок. Это язык чувств. Каждая композиция создаётся, чтобы передать настроение, стиль и индивидуальность.",
        elegance: "Элегантность", eleganceText: "Минималистичный, чистый и изысканный цветочный дизайн.",
        emotion: "Эмоции", emotionText: "Каждый букет несёт смысл и чувство.",
        quality: "Качество", qualityText: "Только свежие цветы и премиальные материалы.",
        style: "Стиль", styleText: "Современные композиции, вдохновлённые трендами.",
        bouquetsCreated: "Создано букетов", happyClients: "Довольных клиентов", averageRating: "Средний рейтинг",
        footerText: "Элегантная цветочная студия с современными букетами для особенных моментов.",
        quickLinks: "Быстрые ссылки", contact: "Контакты", openingHours: "Время работы"
    },
    kz: {
        home: "Басты бет", catalog: "Каталог", contacts: "Байланыс", about: "Біз туралы", cart: "Себет", login: "Кіру",
        aboutHero: "Біз эмоцияны жеткізетін<br>гүлдер жасаймыз",
        ourStory: "Біздің тарихымыз",
        aboutText1: "BLOOMA - жай ғана гүл дүкені емес. Бұл эстетика, эмоция және дизайн әр букетте бірігетін кеңістік.",
        aboutText2: "Біз гүлдер тек сыйлық емес деп сенеміз. Олар сезімнің тілі. Әр композиция көңіл күйді, стильді және тұлғаны жеткізу үшін жасалады.",
        elegance: "Талғампаздық", eleganceText: "Қарапайым, таза және әсем гүл дизайны.",
        emotion: "Эмоция", emotionText: "Әр букет мағына мен сезім береді.",
        quality: "Сапа", qualityText: "Тек жаңа гүлдер және премиум материалдар.",
        style: "Стиль", styleText: "Заманауи трендтерден шабыт алған композициялар.",
        bouquetsCreated: "Жасалған букеттер", happyClients: "Қанағаттанған клиенттер", averageRating: "Орташа баға",
        footerText: "Ерекше сәттерге арналған заманауи букеттері бар әсем гүл студиясы.",
        quickLinks: "Жылдам сілтемелер", contact: "Байланыс", openingHours: "Жұмыс уақыты"
    }
};

function setLang(lang) {
    localStorage.setItem("lang", lang);
    document.documentElement.lang = lang;
    document.querySelector(".lang-btn").innerHTML = lang.toUpperCase() + " ▼";

    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");
        if (translations[lang][key]) {
            el.innerHTML = translations[lang][key];
        }
    });

    document.getElementById("langMenu").classList.remove("show");
}

function toggleLang() {
    document.getElementById("langMenu").classList.toggle("show");
}

document.addEventListener("click", function(e) {
    const btn = document.querySelector(".lang-btn");
    const menu = document.getElementById("langMenu");

    if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.remove("show");
    }
});

document.addEventListener("DOMContentLoaded", () => {
    setLang(localStorage.getItem("lang") || "en");
});
</script>

</body>
</html>