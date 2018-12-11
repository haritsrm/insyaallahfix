<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PTIPD</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="/assets/landscaper/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="/assets/landscaper/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/assets/landscaper/fonts/font-awesome/css/font-awesome.css">

<!-- Slider
    ================================================== -->
<link href="/assets/landscaper/css/owl.carousel.css" rel="stylesheet" media="screen">
<link href="/assets/landscaper/css/owl.theme.css" rel="stylesheet" media="screen">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="/assets/landscaper/css/style.css">
<link rel="stylesheet" type="text/css" href="/assets/landscaper/css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="/assets/landscaper/css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><span><img src="/assets/images/logo_light.png" style="width:10%"> PTIPD</span></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">Info</a></li>
        <li><a href="#services" class="page-scroll">Tata Cara</a></li>
        <li><a href="#contact" class="page-scroll">Kontak</a></li>
        @guest
                    <li><a href="{{ route('login') }}" class="external"><span>{{ __('Login') }}</span></a></li>
                    <li><a href="{{ route('register') }}" class="external"><span>{{ __('Register') }}</span></a></li>
        @else
        <li><a href="/home" class="external"><span>Dashboard</span></a></li>
        @endguest
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1>Peminjaman PTIPD</h1>
            <p>Website ini untuk melakukan peminjaman barang maupun ruangan di UIN Sunan Gunung Djati Bandung.</p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">More Info</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>Tentang <span>PTIPD</span></h2>
          <hr>
          <p>Pusat Teknologi Informasi dan Pangkalan Data (PTIPD) merupakan salah satu unit pelaksana teknis (UPT) yang ada di UIN Sunan Gunung Djati Bandung. Di awal sejarah pendiriannya, PTIPD berupa unit yang bernama IT Centre dan Pusat Komputer (Puskom) yang di jadikan satu dengan tugas yang masih sangat sederhana, sesuai dengan kondisi kebutuhan institusi saat itu.</p>
          <p>Peminjaman pada PTIPD dapat dilakukan dengan website ini, adapun barang atau ruangan yang dapat
          dipinjam antara lain Router, Switch, dan juga ruangan komputer.=</p>
          <a href="/home" class="btn btn-custom btn-lg page-scroll">Pinjam Sekarang!</a> </div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="about-media"> <img src="/assets/landscaper/img/about-1.jpg" alt=" "> </div>
        <div class="about-desc">
          <h3>Garden Care</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis.</p>
        </div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="about-media"> <img src="/assets/landscaper/img/about-2.jpg" alt=" "> </div>
        <div class="about-desc">
          <h3>Lawn Care</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 section-title text-center">
      <h2>Tata Cara Peminjaman</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-3 text-center">
        <div class="service-media"> <img src="/assets/landscaper/img/services/service-1.jpg" alt=" "> </div>
        <div class="service-desc">
          <h3>Pilih</h3>
          <p>Peminjaman dilakukan melalui website peminjaman PTIPD ini, dengan register ataupun login
          terlebih dahulu, setelah itu memilih barang ataupun ruangan yang hendak dipinjam.</p>
        </div>
      </div>
      <div class="col-md-3 text-center">
        <div class="service-media"> <img src="/assets/landscaper/img/services/service-2.jpg" alt=" "> </div>
        <div class="service-desc">
          <h3>Persetujuan</h3>
          <p>Tahap selanjutnya adalah menunggu persetujuan dari pihak PTIPD, dimana persetujuan akan terlihat pada histori anda. Jangan lupa untuk mengecek akun anda.</p>
        </div>
      </div>
      <div class="col-md-3 text-center">
        <div class="service-media"> <img src="/assets/landscaper/img/services/service-3.jpg" alt=" "> </div>
        <div class="service-desc">
          <h3>Cetak</h3>
          <p>Setelah memandapatkan persetujuan, maka peminjam diharuskan mencetak bukti peminjaman yang sudah
          ditentukan.</p>
        </div>
      </div>
      <div class="col-md-3 text-center">
        <div class="service-media"> <img src="/assets/landscaper/img/services/service-4.jpg" alt=" "> </div>
        <div class="service-desc">
          <h3>Pinjam</h3>
          <p>Tahap terakhir yang dilakukan adalah dengan mendatangi PTIPD dengan membawa surat persetujuan,
          lalu barang dapat dipinjam. Jangan lupa untuk mengembalikannya tepat pada waktunya.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title text-center">
      <h2>Kontak Kami</h2>
      <hr>
    </div>
    <div class="col-md-10 col-md-offset-1 contact-info">
      <div class="col-md-4">
        <h3>Alamat</h3>
        <hr>
        <div class="contact-item">
          <p>Jl. A.H Nasution no.105 Cibiru</p>
          <p>Bandung, Jawa Barat 40614</p>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Jam Kerja</h3>
        <hr>
        <div class="contact-item">
          <p>Senin-Jumat: 07:00 - 15:00</p>
          <p>sabtu dan Minggu: Libur</p>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Info Kontak</h3>
        <hr>
        <div class="contact-item">
          <p>Phone: +1 123 456 1234</p>
          <p>Email: info@company.com</p>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <h3>Leave us a message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
      </form>
    </div>
  </div>
</div>
<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
      <p>&copy; 2016 Landscaper. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="/assets/landscaper/js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/bootstrap.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/SmoothScroll.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/jquery.isotope.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/owl.carousel.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/contact_me.js"></script> 
<script type="text/javascript" src="/assets/landscaper/js/main.js"></script>
</body>
</html>