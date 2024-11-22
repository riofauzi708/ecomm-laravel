<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="gift, shop, ecommerce, modern design" />
  <meta name="description" content="Giftos is the perfect place to find amazing gifts with a modern and sleek design." />
  <meta name="author" content="Giftos Team" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Giftos</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />

  <style>
    /* Global Styling */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .img-box img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .img-box img:hover {
      transform: scale(1.1);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn {
      padding: 12px 28px;
      font-size: 1.1rem;
      border-radius: 50px;
      transition: all 0.4s ease;
      display: inline-block;
    }

    .btn-danger {
      background: linear-gradient(45deg, #dc3545, #ff6b6b);
      color: #fff;
      border: none;
    }

    .btn-success {
      background: linear-gradient(45deg, #28a745, #4caf50);
      color: #fff;
      border: none;
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      opacity: 0.95;
    }

    .btn:active {
      transform: translateY(1px);
      box-shadow: none;
    }

    @media (max-width: 768px) {
      .img-box img {
        margin-bottom: 20px;
      }

      .btn {
        width: 100%;
        margin-bottom: 10px;
      }

      .btn-lg {
        font-size: 1rem;
      }
    }

    /* Slider Styles */
    .owl-carousel .item {
      text-align: center;
      padding: 30px 15px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .owl-carousel .item:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>

<body>
  <!-- Content Goes Here -->

  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      });
    });
  </script>
</body>

</html>