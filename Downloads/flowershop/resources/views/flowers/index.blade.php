<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BLOOMA</title>
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
                <button onclick="setLang('en')">EN</button>
                <button onclick="setLang('ru')">RU</button>
                <button onclick="setLang('kz')">KZ</button>
            </div>
        </div>

        <span class="bag">♡</span>
    </div>
</header>

<section class="hero">
    <div class="hero-text">
        <p data-i18n="hero_sub">Elegant flower studio</p>

        <h1 data-i18n="hero_title">
            Fresh flowers<br>for your special<br>moments
        </h1>

        <span data-i18n="hero_desc">
            BLOOMA is a modern flower shop where beauty,<br>tenderness and elegance come together.
        </span>

        <a href="#catalog" class="main-btn" data-i18n="shop_now">Shop now</a>
    </div>

    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1520763185298-1b434c919102" alt="">
    </div>
</section>

<section class="catalog" id="catalog">
    <p class="section-label">BLOOMA COLLECTION</p>
    <h2 data-i18n="catalog">Catalog</h2>

    <div class="product-grid">
        @foreach($flowers as $flower)
            <div class="product-card">
                <img src="{{ $flower->image }}">
                <div class="product-info">
                    <div>
                        <h3>{{ $flower->name }}</h3>
                        <p>{{ $flower->price }} KZT</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="features">
    <div class="feature">
        <div>
            <h4 data-i18n="delivery">Same-day delivery</h4>
            <p data-i18n="delivery_desc">Fast and reliable delivery</p>
        </div>
    </div>

    <div class="feature">
        <div>
            <h4 data-i18n="fresh">Fresh flowers</h4>
            <p data-i18n="fresh_desc">We guarantee freshness</p>
        </div>
    </div>

    <div class="feature">
        <div>
            <h4 data-i18n="secure">Secure payment</h4>
            <p data-i18n="secure_desc">100% secure payment</p>
        </div>
    </div>

    <div class="feature">
        <div>
            <h4 data-i18n="clients">500+ happy clients</h4>
            <p data-i18n="clients_desc">Thank you for your trust</p>
        </div>
    </div>
</section>

<script>
const translations = {
    en: {
        home:"Home", catalog:"Catalog", contacts:"Contacts", about:"About Us", cart:"Cart", login:"Login",
        hero_sub:"Elegant flower studio",
        hero_title:"Fresh flowers<br>for your special<br>moments",
        hero_desc:"BLOOMA is a modern flower shop where beauty,<br>tenderness and elegance come together.",
        shop_now:"Shop now",
        all:"All Bouquets",
        delivery:"Same-day delivery",
        delivery_desc:"Fast and reliable delivery",
        fresh:"Fresh flowers",
        fresh_desc:"We guarantee freshness",
        secure:"Secure payment",
        secure_desc:"100% secure payment",
        clients:"500+ happy clients",
        clients_desc:"Thank you for your trust"
    },
    ru: {
        home:"Главная", catalog:"Каталог", contacts:"Контакты", about:"О нас", cart:"Корзина", login:"Войти",
        hero_sub:"Элегантная цветочная студия",
        hero_title:"Свежие цветы<br>для особенных<br>моментов",
        hero_desc:"BLOOMA - это современный цветочный магазин, где сочетаются красота и нежность.",
        shop_now:"Смотреть каталог",
        all:"Все букеты",
        delivery:"Доставка в день заказа",
        delivery_desc:"Быстрая и надежная доставка",
        fresh:"Свежие цветы",
        fresh_desc:"Мы гарантируем свежесть",
        secure:"Безопасная оплата",
        secure_desc:"100% защита платежей",
        clients:"500+ довольных клиентов",
        clients_desc:"Спасибо за доверие"
    },
    kz: {
        home:"Басты бет", catalog:"Каталог", contacts:"Байланыс", about:"Біз туралы", cart:"Себет", login:"Кіру",
        hero_sub:"Әсем гүл студиясы",
        hero_title:"Ерекше сәттерге<br>арналған<br>жаңа гүлдер",
        hero_desc:"BLOOMA - бұл сұлулық пен нәзіктік үйлескен заманауи гүл дүкені.",
        shop_now:"Каталог көру",
        all:"Барлық гүлдер",
        delivery:"Сол күні жеткізу",
        delivery_desc:"Жылдам және сенімді жеткізу",
        fresh:"Жаңа гүлдер",
        fresh_desc:"Біз сапасына кепіл береміз",
        secure:"Қауіпсіз төлем",
        secure_desc:"100% қауіпсіздік",
        clients:"500+ бақытты клиент",
        clients_desc:"Сеніміңізге рахмет"
    }
};

function setLang(lang){
    localStorage.setItem("lang",lang);
    document.querySelector(".lang-btn").innerHTML = lang.toUpperCase()+" ▼";

    document.querySelectorAll("[data-i18n]").forEach(el=>{
        const key = el.getAttribute("data-i18n");
        if(translations[lang][key]){
            el.innerHTML = translations[lang][key];
        }
    });
}

function toggleLang(){
    document.getElementById("langMenu").classList.toggle("show");
}

document.addEventListener("DOMContentLoaded",()=>{
    setLang(localStorage.getItem("lang") || "en");
});
</script>

</body>
</html>