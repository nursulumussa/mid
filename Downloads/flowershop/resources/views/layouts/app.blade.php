<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BLOOMA</title>

    <style>

        body{
            margin:0;
            font-family:Arial, sans-serif;
            background:#fdf4f6;
        }

        .navbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:20px 60px;
            background:white;
        }

        .logo{
            font-size:32px;
            font-weight:bold;
            color:#c96b84;
        }

        .products-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:30px;
            padding:50px;
        }

        .product-card{
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .product-card img{
            width:100%;
            height:300px;
            object-fit:cover;
        }

        .product-card h3{
            padding:15px;
            margin:0;
        }

        .product-card p{
            padding:0 15px 20px;
            color:#c96b84;
            font-weight:bold;
        }

    </style>

</head>

<body>

    <div class="navbar">

        <div class="logo">
            BLOOMA
        </div>

    </div>

    @yield('content')

</body>
</html>