<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BLOOMA</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#fdf4f6;
            color:#3d2a2a;
        }

        .navbar{
            width:100%;
            background:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:25px 60px;
            position:sticky;
            top:0;
        }

        .logo{
            font-size:38px;
            font-weight:bold;
            color:#c96b84;
        }

        .menu{
            display:flex;
            gap:35px;
        }

        .menu a{
            text-decoration:none;
            color:#3d2a2a;
            font-size:18px;
            transition:0.3s;
        }

        .menu a:hover{
            color:#c96b84;
        }

        .hero{
            padding:80px 60px;
        }

        .hero h1{
            font-size:70px;
            margin-bottom:20px;
        }

        .hero p{
            font-size:22px;
            color:#666;
        }

        .products{
            margin-top:60px;
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:30px;
        }

        .card{
            background:white;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        .card img{
            width:100%;
            height:320px;
            object-fit:cover;
        }

        .card-body{
            padding:20px;
        }

        .card-body h2{
            margin-bottom:10px;
        }

        .price{
            margin-top:15px;
            color:#c96b84;
            font-size:24px;
            font-weight:bold;
        }

    </style>

</head>

<body>

<div class="navbar">

    <div class="logo">
        BLOOMA
    </div>

    <div class="menu">

        <a href="/">Главная</a>

        <a href="/catalog">Каталог</a>

        <a href="/about">О нас</a>

        <a href="/contacts">Контакты</a>

        <a href="/favorites">Избранное</a>

    </div>

</div>

<div class="hero">

    <h1>
        Цветы для особенных моментов
    </h1>

    <p>
        Современный цветочный магазин BLOOMA
    </p>

    <div class="products">

        @foreach($products as $product)

            <div class="card">

                <img src="{{ $product->image }}" alt="{{ $product->name }}">

                <div class="card-body">

                    <h2>{{ $product->name }}</h2>

                    <p>{{ $product->description }}</p>

                    <div class="price">
                        {{ $product->price }} ₸
                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>