<!DOCTYPE html>
<html lang="en">
<head>
    <title>BLOOMA Admin</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<section class="login-page">
    <form method="POST" action="{{ route('admin.login.post') }}" class="login-card">
        @csrf

        <h1>BLOOMA ADMIN</h1>
        <p data-i18n="login_text">Login to manage products and messages</p>

        @if(session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif

        <input type="email" name="email" placeholder="Email" data-i18n-placeholder="email" required>
        <input type="password" name="password" placeholder="Password" data-i18n-placeholder="password" required>

        <button type="submit" data-i18n="login_btn">Login</button>

        <div class="lang-switch">
            <button type="button" onclick="setLang('en')">EN</button>
            <button type="button" onclick="setLang('ru')">RU</button>
            <button type="button" onclick="setLang('kz')">KZ</button>
        </div>
    </form>
</section>

<script>
const translations = {
    en: {
        login_text: "Login to manage products and messages",
        email: "Email",
        password: "Password",
        login_btn: "Login"
    },
    ru: {
        login_text: "Войдите для управления товарами и сообщениями",
        email: "Почта",
        password: "Пароль",
        login_btn: "Войти"
    },
    kz: {
        login_text: "Өнімдер мен хабарламаларды басқару үшін кіріңіз",
        email: "Электронды пошта",
        password: "Құпия сөз",
        login_btn: "Кіру"
    }
};

function setLang(lang) {
    localStorage.setItem("lang", lang);

    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");
        if (translations[lang][key]) {
            el.innerText = translations[lang][key];
        }
    });

    document.querySelectorAll("[data-i18n-placeholder]").forEach(el => {
        const key = el.getAttribute("data-i18n-placeholder");
        if (translations[lang][key]) {
            el.placeholder = translations[lang][key];
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const lang = localStorage.getItem("lang") || "en";
    setLang(lang);
});
</script>

</body>
</html>