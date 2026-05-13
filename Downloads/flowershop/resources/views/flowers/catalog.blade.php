<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Catalog BLOOMA</title>
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

<section class="catalog">
    <p class="section-label">BLOOMA COLLECTION</p>
    <h1 data-i18n="catalog">Catalog</h1>

    <div class="product-grid">
        @foreach($flowers as $flower)
            <div class="product-card">
                <div class="image-wrapper">
                    <img src="{{ $flower->image }}" alt="{{ $flower->name }}">

                    <div class="overlay">
                        <form action="{{ route('cart.add', $flower->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="add-btn" data-i18n="add_cart">Add to cart</button>
                        </form>
                    </div>
                </div>

                <div class="product-info">
                    <h3>{{ $flower->name }}</h3>
                    <p>{{ $flower->price }} KZT</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<footer class="footer" id="contact">
    <div>
        <h2>BLOOMA</h2>
        <p data-i18n="footer_text">Elegant flower studio with modern bouquets for special moments.</p>
        <div class="socials">
            <span>◎</span><span>◌</span><span>✈</span><span>⌾</span>
        </div>
    </div>

    <div>
        <h4 data-i18n="quick_links">Quick Links</h4>
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
        <h4 data-i18n="opening_hours">Opening Hours</h4>
        <p>Mon - Fri: 9:00 - 20:00</p>
        <p>Sat: 10:00 - 19:00</p>
        <p>Sun: 11:00 - 17:00</p>
    </div>
</footer>

<div class="copyright">© BLOOMA. All rights reserved.</div>
<div class="chat">●</div>

<script>
const translations = {
    en: {
        home: "Home",
        catalog: "Catalog",
        contacts: "Contacts",
        about: "About Us",
        cart: "Cart",
        login: "Login",
        add_cart: "Add to cart",
        footer_text: "Elegant flower studio with modern bouquets for special moments.",
        quick_links: "Quick Links",
        contact: "Contact",
        opening_hours: "Opening Hours"
    },
    ru: {
        home: "Главная",
        catalog: "Каталог",
        contacts: "Контакты",
        about: "О нас",
        cart: "Корзина",
        login: "Войти",
        add_cart: "Добавить в корзину",
        footer_text: "Элегантная цветочная студия с современными букетами для особенных моментов.",
        quick_links: "Быстрые ссылки",
        contact: "Контакты",
        opening_hours: "Время работы"
    },
    kz: {
        home: "Басты бет",
        catalog: "Каталог",
        contacts: "Байланыс",
        about: "Біз туралы",
        cart: "Себет",
        login: "Кіру",
        add_cart: "Себетке қосу",
        footer_text: "Ерекше сәттерге арналған заманауи букеттері бар әсем гүл студиясы.",
        quick_links: "Жылдам сілтемелер",
        contact: "Байланыс",
        opening_hours: "Жұмыс уақыты"
    }
};

function setLang(lang) {
    localStorage.setItem("lang", lang);
    document.documentElement.lang = lang;
    document.querySelector(".lang-btn").innerHTML = lang.toUpperCase() + " ▼";

    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");

        if (translations[lang] && translations[lang][key]) {
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