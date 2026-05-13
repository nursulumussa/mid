<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart BLOOMA</title>
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
        <a href="/cart"><span data-i18n="cart">Cart</span> ({{ count($cart) }})</a>
    </nav>

    <div class="nav-actions">
        <button onclick="setLang('en')" class="lang-btn">EN</button>
        <button onclick="setLang('ru')" class="lang-btn">RU</button>
        <button onclick="setLang('kz')" class="lang-btn">KZ</button>
    </div>
</header>

<section class="cart-page">
    <p class="section-label">BLOOMA CART</p>
    <h1 data-i18n="your_cart">Your Cart</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if(count($cart) > 0)
        @php $total = 0; @endphp

        <div class="cart-list">
            @foreach($cart as $item)
                @php $total += $item['price'] * $item['quantity']; @endphp

                <div class="cart-item">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">

                    <div>
                        <h3>{{ $item['name'] }}</h3>
                        <p>{{ $item['price'] }} KZT</p>
                        <span><span data-i18n="quantity">Quantity</span>: {{ $item['quantity'] }}</span>
                    </div>

                    <strong>{{ $item['price'] * $item['quantity'] }} KZT</strong>

                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                        @csrf
                        <button class="remove-btn" data-i18n="remove">Remove</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="cart-summary">
            <h2><span data-i18n="total">Total</span>: {{ $total }} KZT</h2>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="clear-btn" data-i18n="clear_cart">Clear cart</button>
            </form>
        </div>
    @else
        <div class="empty-cart">
            <h2 data-i18n="empty_cart">Your cart is empty</h2>
            <p data-i18n="choose_flowers">Choose beautiful bouquets from our catalog.</p>
            <a href="/catalog" class="main-btn" data-i18n="go_catalog">Go to catalog</a>
        </div>
    @endif
</section>

<script>
const translations = {
    en: {
        home: "Home",
        catalog: "Catalog",
        contacts: "Contacts",
        about: "About Us",
        cart: "Cart",
        your_cart: "Your Cart",
        quantity: "Quantity",
        remove: "Remove",
        total: "Total",
        clear_cart: "Clear cart",
        empty_cart: "Your cart is empty",
        choose_flowers: "Choose beautiful bouquets from our catalog.",
        go_catalog: "Go to catalog"
    },
    ru: {
        home: "Главная",
        catalog: "Каталог",
        contacts: "Контакты",
        about: "О нас",
        cart: "Корзина",
        your_cart: "Ваша корзина",
        quantity: "Количество",
        remove: "Удалить",
        total: "Итого",
        clear_cart: "Очистить корзину",
        empty_cart: "Ваша корзина пуста",
        choose_flowers: "Выберите красивые букеты из нашего каталога.",
        go_catalog: "Перейти в каталог"
    },
    kz: {
        home: "Басты бет",
        catalog: "Каталог",
        contacts: "Байланыс",
        about: "Біз туралы",
        cart: "Себет",
        your_cart: "Себетіңіз",
        quantity: "Саны",
        remove: "Өшіру",
        total: "Барлығы",
        clear_cart: "Себетті тазалау",
        empty_cart: "Себетіңіз бос",
        choose_flowers: "Каталогтан әдемі гүл шоқтарын таңдаңыз.",
        go_catalog: "Каталогқа өту"
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
}

document.addEventListener("DOMContentLoaded", () => {
    const lang = localStorage.getItem("lang") || "en";
    setLang(lang);
});
</script>

</body>
</html>