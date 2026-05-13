<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts BLOOMA</title>
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

<section class="contact-hero">
    <p>BLOOMA CONTACTS</p>
    <h1 data-i18n="contact_hero">Let’s create something beautiful together</h1>
</section>

<section class="contact-section">
    <div class="contact-info">
        <h2 data-i18n="contact_info">Contact Information</h2>

        <div class="contact-box">
            <h4 data-i18n="phone">Phone</h4>
            <p>+7 700 123 45 67</p>
        </div>

        <div class="contact-box">
            <h4>Email</h4>
            <p>blooma.flowers@gmail.com</p>
        </div>

        <div class="contact-box">
            <h4 data-i18n="address">Address</h4>
            <p>Almaty, Kazakhstan</p>
        </div>

        <div class="contact-box">
            <h4 data-i18n="opening_hours">Opening Hours</h4>
            <p>Mon - Fri, 9:00 - 20:00</p>
            <p>Sat, 10:00 - 19:00</p>
            <p>Sun, 11:00 - 17:00</p>
        </div>
    </div>

    <div class="contact-form-card">
        <h2 data-i18n="send_message_title">Send Message</h2>

        <form action="{{ route('send.message') }}" method="POST">
            @csrf

            @if(session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif

            <input type="text" name="name" placeholder="Your name" data-i18n-placeholder="your_name">
            <input type="email" name="email" placeholder="Your email" data-i18n-placeholder="your_email">
            <input type="text" name="subject" placeholder="Subject" data-i18n-placeholder="subject">
            <textarea name="message" placeholder="Your message" data-i18n-placeholder="your_message"></textarea>

            <button type="submit" data-i18n="send_message">Send message</button>
        </form>
    </div>
</section>

<footer class="footer">
    <div>
        <h2>BLOOMA</h2>
        <p data-i18n="footer_text">Elegant flower studio with modern bouquets for special moments.</p>
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
        <p>Mon - Fri, 9:00 - 20:00</p>
        <p>Sat, 10:00 - 19:00</p>
        <p>Sun, 11:00 - 17:00</p>
    </div>
</footer>

<div class="copyright">© BLOOMA. All rights reserved.</div>

<script>
const translations = {
    en: {
        home: "Home",
        catalog: "Catalog",
        contacts: "Contacts",
        about: "About Us",
        cart: "Cart",
        login: "Login",
        contact_hero: "Let’s create something beautiful together",
        contact_info: "Contact Information",
        phone: "Phone",
        address: "Address",
        opening_hours: "Opening Hours",
        send_message_title: "Send Message",
        your_name: "Your name",
        your_email: "Your email",
        subject: "Subject",
        your_message: "Your message",
        send_message: "Send message",
        footer_text: "Elegant flower studio with modern bouquets for special moments.",
        quick_links: "Quick Links",
        contact: "Contact"
    },
    ru: {
        home: "Главная",
        catalog: "Каталог",
        contacts: "Контакты",
        about: "О нас",
        cart: "Корзина",
        login: "Войти",
        contact_hero: "Давайте создадим что-то красивое вместе",
        contact_info: "Контактная информация",
        phone: "Телефон",
        address: "Адрес",
        opening_hours: "Время работы",
        send_message_title: "Отправить сообщение",
        your_name: "Ваше имя",
        your_email: "Ваш email",
        subject: "Тема",
        your_message: "Ваше сообщение",
        send_message: "Отправить сообщение",
        footer_text: "Элегантная цветочная студия с современными букетами для особенных моментов.",
        quick_links: "Быстрые ссылки",
        contact: "Контакты"
    },
    kz: {
        home: "Басты бет",
        catalog: "Каталог",
        contacts: "Байланыс",
        about: "Біз туралы",
        cart: "Себет",
        login: "Кіру",
        contact_hero: "Келіңіз, бірге әдемі нәрсе жасайық",
        contact_info: "Байланыс ақпараты",
        phone: "Телефон",
        address: "Мекенжай",
        opening_hours: "Жұмыс уақыты",
        send_message_title: "Хабарлама жіберу",
        your_name: "Атыңыз",
        your_email: "Email мекенжайыңыз",
        subject: "Тақырып",
        your_message: "Хабарламаңыз",
        send_message: "Хабарлама жіберу",
        footer_text: "Ерекше сәттерге арналған заманауи букеттері бар әсем гүл студиясы.",
        quick_links: "Жылдам сілтемелер",
        contact: "Байланыс"
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

    document.querySelectorAll("[data-i18n-placeholder]").forEach(el => {
        const key = el.getAttribute("data-i18n-placeholder");
        if (translations[lang] && translations[lang][key]) {
            el.placeholder = translations[lang][key];
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