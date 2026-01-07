<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <style>
    /* 為了模擬圖中的深色背景 */
    .top-bar {
        background-color: #222;
        padding: 10px 20px;
        color: white;
    }

    .search-input {
        background: transparent;
        border: 1px solid #666;
        color: white;
        border-radius: 5px;
        padding: 5px 15px;
        width: 300px;
    }

    .top-bar a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
        font-size: 14px;
    }

    .cart-badge {
        background-color: #8b6e4b;
        /* 棕色圓圈 */
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
    }

    .card {
        border: 0px;
        color: lightslategray;
    }
    </style>
</head>

<body>
    <div class="top-bar d-none d-lg-flex align-items-center">
        <div class="ms-auto d-flex align-items-center">
            <div class="position-relative">
                <input type="text" class="search-input" placeholder="搜尋商品" />
                <i class="fas fa-search position-absolute" style="right: 10px; top: 10px; color: #ccc"></i>
            </div>
            <a href="#"><i class="fas fa-envelope me-1"></i> 客服中心</a>
            <a href="#"><i class="fas fa-user me-1"></i> 登入/註冊頁</a>
            <a href="#">
                <i class="fas fa-shopping-cart me-1"></i> 購物車
                <span class="cart-badge">0</span>
            </a>
        </div>
    </div>

    <div class="text-center"><img src="{{ asset('image/logo.png') }}" alt="" /></div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">首頁</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            展覽/活動商品專區
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">70週年紀念限定</a></li>
                            <li><a class="dropdown-item" href="#">文博會</a></li>
                            <li><a class="dropdown-item" href="#">甜點世界</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            女裝
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長褲</a></li>
                            <li><a class="dropdown-item" href="#">短褲</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            男裝
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長褲</a></li>
                            <li><a class="dropdown-item" href="#">短褲</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            童裝
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            配件
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">包款/皮夾</a></li>
                            <li><a class="dropdown-item" href="#">帽子/其他配件</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            週邊商品
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">手機殼</a></li>
                            <li><a class="dropdown-item" href="#">玩偶/抱枕</a></li>
                            <li><a class="dropdown-item" href="#">生活用品</a></li>
                            <li><a class="dropdown-item" href="#">居家用品</a></li>
                            <li><a class="dropdown-item" href="#">餐具</a></li>
                            <li><a class="dropdown-item" href="#">療癒小物</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">門市資訊</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-lg-none py-2 border-bottom shadow-sm bg-white">
        <div class="position-relative">
            <input type="text" class="form-control rounded-1" placeholder="搜尋商品" />
            <i class="fas fa-search position-absolute" style="right: 15px; top: 10px; color: #ccc"></i>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/powerup.jpg') }}" class="d-block img-fluid" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/happylove.jpg') }}" class="d-block img-fluid" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/loveproduct.jpg') }}" class="d-block img-fluid" alt="..." />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-5">
        <div><img src="{{ asset('image/popular.png') }}" alt="" /></div>
    </div>

    <div class="container my-5">
        <div class="row g-3">
            <!-- jquery放商品 -->
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    $(document).ready(function() {
        const row = $(".row");
        const products = [{
                name: "史努比達摩紅色零錢包",
                price: 290,
                img: "sred.jpg"
            },
            {
                name: "奧拉夫達摩藍色零錢包",
                price: 290,
                img: "oblue.jpg"
            },
            {
                name: "SNOOPY 冰淇淋造型吊飾",
                price: 390,
                img: "sice.jpg"
            },
            {
                name: "OLAF 冰淇淋造型吊飾",
                price: 390,
                img: "oice.jpg"
            },
            {
                name: "史努比卡其色斜背小包",
                price: 550,
                img: "syebag.jpg"
            },
            {
                name: "史努比黑色斜背小包",
                price: 550,
                img: "ssbag.jpg"
            },
            {
                name: "奧拉夫軍綠色斜背小包",
                price: 550,
                img: "sgrebag.jpg"
            },
            {
                name: "史努比大頭造型抱枕",
                price: 980,
                img: "snake.jpg"
            },
            {
                name: "史努比粉色手提麻布袋",
                price: 420,
                img: "sbag.jpg"
            },
            {
                name: "SNOOPY 經典手提麻布袋",
                price: 420,
                img: "sbigbag.jpg"
            },
            {
                name: "OLAF 經典手提麻布袋",
                price: 420,
                img: "obag.jpg"
            },
            {
                name: "史努比與奧拉夫條紋提袋",
                price: 720,
                img: "allbag.jpg"
            },
            {
                name: "史努比黃色保溫杯",
                price: 850,
                img: "yecup.jpg"
            },
            {
                name: "奧拉夫米色保溫杯",
                price: 850,
                img: "ocup.jpg"
            },
            {
                name: "史努比彩色條紋大提袋",
                price: 680,
                img: "scolorbag.jpg"
            },
            {
                name: "奧拉夫彩色條紋大提袋",
                price: 680,
                img: "ocolorbag.jpg"
            },
        ];

        let productHTML = "";

        $.each(products, function(index, item) {
            productHTML += `
         <div class="col-6 col-lg-3">
          <div class="card h-100">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-${index}">
              <img
              src="{{ asset('image/${item.img}') }}"
              class="card-img-top img-fluid"
              alt="商品名稱"
              />
            </button>
          
            <div class="card-body">
              <h5 class="card-title text-center">${item.name}</h5>
              <p class="card-text text-center">$${item.price}</p>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-${index}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
              <img
              src="{{ asset('image/${item.img}') }}"
              class="card-img-top img-fluid"
              alt="商品名稱"
              />
             </div>
           </div>
         </div>
       </div>
            `;
        });
        row.append(productHTML);
    });
    </script>
</body>

</html>