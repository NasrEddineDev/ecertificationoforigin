<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Advanced - App Landing Page Template</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="assetsHakim/images/favicon.png" type="image/png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/logo/caci-logo.ico" />

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="assetsHakim/css/animate.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assetsHakim/css/LineIcons.2.0.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assetsHakim/css/bootstrap.4.5.2.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assetsHakim/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assetsHakim/css/style.css">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <section class="header_area">
        <div class="header_navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">الصفحة الرئيسية </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">الخدمات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#video">من نحن</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#blog">إتصل بنا</a>
                                    </li>

                                    <!--  <li class="nav-item">
                                        <a class="page-scroll" href="#blog">dsqdsqd</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#Contact">dsfsdf</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                            class="nav-link ">
                                            تسجيل الدخول
                                        </a>
                                        <div role="menu" class="notification-author dropdown-menu animated zoomIn"
                                            style="left:-300px;">
                                            <form class="px-4 py-3" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="البريد اﻹلكتروني">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" placeholder="كلمة السر">
                                                </div>
                                                <button type="submit" class="wow fadeInUp btn btn-primary col-lg-12"
                                                    style="margin-bottom:10px;">دخول</button>
                                                <div class="form-check col-lg-5" style="float:left">
                                                    <input type="checkbox" class="form-check-input"
                                                        style="margin-right:-20px;" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label
                                                        style="font-size:12px!important;color:#581CCB;margin-left:5px;"
                                                        class="form-check-label" for="dropdownCheck">
                                                        تذكرني
                                                    </label>
                                                </div>
                                                <div class="col-lg-6" style="float:right">
                                                    <a class="dropdown"
                                                        style="padding: 0px;font-size:12px!important;color:#581CCB"
                                                        href="{{ route('password.request') }}">نسيت كلمة المرور</a>
                                                </div>
                                            </form>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                                            <a class="dropdown-item" href="#">Forgot password?</a> -->
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('registration_wizard') }}">حساب
                                            جديد</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            <a class="navbar-brand" href="index.html">
                                <img src="assetsHakim/images/logo1.png" alt="Logo" width="324" height="72">
                            </a>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header navbar -->

        <div id="home" class="header_hero d-lg-flex align-items-center">
            <img class="shape shape-1" src="assetsHakim/images/shape-1.svg" alt="shape">
            <img class="shape shape-2" src="assetsHakim/images/shape-2.svg" alt="shape">
            <img class="shape shape-3" src="assetsHakim/images/shape-3.svg" alt="shape">

            <div class="container">
                <div class="container-li">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="header_hero_content mt-45">
                                <h2 class="header_title wow fadeInLeftBig" data-wow-duration="1.3s"
                                    data-wow-delay="0.2s">شهادة المنشأ الإلكترونية</h2>
                                <p class="wow fadeInLeftBig" id="text1" data-wow-duration="1.3s" data-wow-delay="0.6s"
                                    dir="rtl">هي وثيقة تجارية تسلم بعد ان يتم توقيعها إلكترونيا على المنصة الجديدة
                                    للغرفة الجزائرية للتجارة والصناعة وذلك بناء على طلب من المصدرين المسجلين في هذه
                                    الاخيرة، تسمح شهادة المنشأ الإلكترونية لإثبات منشأ سلعته والاستفادة من المزايا و
                                    التفضيلات التعريفية.</p>

                            </div> <!-- header hero content -->
                        </div>
                    </div> <!-- row -->
                </div>
            </div> <!-- container -->
            <div class="header_image d-flex align-items-end">
                <div class="ima">

                    <img src="assetsHakim/images/dots.svg" class="move1">
                </div> <!-- image -->
            </div> <!-- header image -->
        </div> <!-- header hero -->
    </section>

    <!--====== HEADER PART ENDS ======-->

    <!--====== FEATURES PART START ======-->

    <section id="features" class="features_area pt-35 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_1 text-center wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.2s">
                        <div class="features_icon">
                            <i class="lni lni-timer"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">توفير الوقت و المسافة</h4>
                            <p id="T1">نظرًا لأن توفير الوقت هو الشاغل الرئيسي ، فإن الهدف كله هو تجنب نفقات السفر
                                والوقت. ستتيح هذه المنصة معالجة جميع مستنداتك عبر الإنترنت واعتمادها.</p>
                        </div>
                    </div> <!-- single featuresow -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_2 text-center wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.5s">
                        <div class="features_icon">
                            <i class="lni lni-"><img src="assetsHakim/images/law.png" height="40px"> </i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">القيمة القانونية</h4>
                            <p id="T1">بفضل التصديق ، تم اعتماد مستندات AGCE الخاصة بطرف ثالث والتي تم إنشاؤها من هذا
                                النظام الأساسي وبالتالي فهي قابلة للتطبيق في المحكمة.</p>
                        </div>
                    </div> <!-- single featuresow -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single_features mt-30 features_3 text-center wow fadeInUp" data-wow-duration="1.3s"
                        data-wow-delay="0.9s">
                        <div class="features_icon">
                            <i class="lni lni-ux"></i>
                        </div>
                        <div class="features_content">
                            <h4 class="features_title">سهولة الاستعمال</h4>
                            <p id="T1">مصمم ليكون سهل الاستخدام قدر الإمكان ، يتطلب التطبيق القليل من إدخال المستخدم ،
                                ما عليك سوى ملء المستندات.</p>
                        </div>
                    </div> <!-- single featuresow -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FEATURES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about_area pt-30 pb-80">
        <div class="spacer"></div>
        <div class="container">
            <div class="stepwizard">
                <h2 class="step-head"> مراحل عمل الخدمة؟</h4>
                    <div class="stepwizard-row setup-panel">
                        <div class="row" id="steps">
                            <div class="stepwizard-step col-lg-4 col-sm-12">
                                <button type="button" class="btn btn-primary btn-circle">1</button>
                                <p class="text-primary bold" id="T1"> التسجيل على موقع <br>certest.caci.dz</p>

                                <p class="stepper-description" id="T2">في هاته المرحلة يتم ملأ كل المعلومات الخاصة
                                    بالمصدر و المصادقة عليها
                                    ابدأ بالتسجيل في المنصة
                                    <a href="http://certest.caci.dz">شهادة المنشأ الإلكترونية</a>.
                                </p>
                            </div>
                            <div class="stepwizard-step col-lg-4 col-sm-12"> <button type="button"
                                    class="btn btn-primary btn-circle">2</button>
                                <p class="text-primary bold" id="T1">القيام بالمصادقة على الشروط العامة لانشاء حساب</p>
                                <p class="stepper-description" id="T2">في هاته المرحلة يتم التوقيع على الشروط العامة
                                    عبر الإنترنت عند إنشاء حساب. وبمجرد تنشيط هذا الأخير من قبل الغرفة التجارة، سيتلقى
                                    المصدر معلومات تسجيل دخول تتيح له الوصول إلى المنصة
                                    و طلب الخدمة .
                                </p>
                            </div>
                            <div class="stepwizard-step col-lg-4 col-sm-12"> <button type="button"
                                    class="btn btn-primary btn-circle">3</button>
                                <p class="text-primary bold" id="T1">التقدم بالطلب للحصول على شهادة المنشأ الإلكترونية
                                    و استخراجها</p>
                                <p class="stepper-description" id="T2">و لكي يستفيد المصدر من هاته الخدمة الإلكترونية
                                    المقدمة يتم اختيار نوع الشهادة و إدخال كافة المعلومات العامة للحصول على شهادة المنشأ
                                    و توقيع عليها من طرف المصدر, بعدها يقوم العامل المؤهل من تأكد من المعلومات وقيام
                                    بتوقيع إلكتروني باستخدام المنصة السلطة الحكومية لتوقيع الكتروني و بتالي سيتحصل
                                    المصدر على شهادة المنشأ الإلكترونية المقبولة قانونيا و قابلة لتحقق من صحته .
                                </p>
                            </div>
                        </div>
                    </div>
            </div>

        </div>

        </div>
        <div class="container">

            <h2 class="step-head1"> معاينة شهادت المنشأ</h4>
                <div class="row" id="steps1">

                    <form class="form-inline" id="searching">
                        <input class="form-control mr-sm-2" type="search" placeholder="الرجاء إدخال رقم شهادت المنشأ"
                            aria-label="Search" id="searching">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">التحقق</button>
                    </form>
                </div>
        </div>


        </div>




        </div>

        <div class="col-lg-6 col-md-9">
            <!--
                    <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img class="image" src="assetsHakim/images/about.png" alt="about">
                        <img class="dots" src="assetsHakim/images/dots.svg" alt="dots">
                    </div> 
                </div>
               
                <div class="col-lg-6">
                    <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h4 class="title">Discover New Experience!</h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor invidunt ut labore et dolore malquyam erat, sed diam voluptua. At vero eos et accusam et justo doloes et ea rebum. Stet clita kasd gubergren, nod sea takmaa santus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sitdse ametr consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                        </div>
                        <a class="main-btn" href="#">Discover</a>
                        
                    </div>
                </div>
            -->
        </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== APP FEATURES PART START ======-->

    <section id="app_features">

    </section>

    <!--====== APP FEATURES PART ENDS ======-->

    <!--====== VIDEO PART START ======-->

    <section id="video" class="video_area pt-80 pb-80">
        <div class="spacer3"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center">

                        <div class="stepper-description">
                            <p class="step-head1">من نحن ؟ </p>
                            <div class="inlogo">
                                <a href="https://caci.dz"><img id="lg" src="assetsHakim/images/caci.png" alt=""></a>
                                <a href="https://agce.dz"><img id="lg" src="assetsHakim/images/agce.png" alt=""></a>
                            </div>
                            <div class="infocaci">
                                <h4>الغرفة الجزائرية للتجارة والصناعة</h4>
                                <ul class="pcaci">

                                    <li> تمثل المصالح العامة لقطاعات التجارة والصناعة والخدمات مع الحكومات، بينما تضطلع
                                        بأنشطة تعليمية وتكوينية وتطويرية وإعادة تدريب للأعمال التجارية.</li>
                                    <li>تأسست بموجب المرسوم التنفيذي 94-96 الصادر في 03/03/1996 المعدل والمكمل بالمرسوم
                                        التنفيذي 2000-312 ، وهي مؤسسة صناعية وتجارية عامة (EPIC).</li>

                                </ul>

                                <h4>السلطة الحكومية للتصديق الالكتروني</h4>
                                <ul class="pcaci">
                                    <li> تم إنشاؤه بموجب القانون رقم 15-04 المؤرخ في 11 ربيع الإيثاني 1436 الموافق 1
                                        فبراير 2015 الذي يحدد القواعد العامة المتعلقة بالتوقيع الإلكتروني والتصديق.</li>
                                    <li> وضع سياسة التصديق الإلكتروني الخاصة بها وتقديمها للهيئة الوطنية للمصادقة
                                        الإلكترونية للموافقة عليها والتأكد من تطبيقها.</li>
                                    <li>الموافقة على سياسات الشهادات الصادرة عن جهات خارجية موثوق بها والتأكد من
                                        تطبيقاتها.</li>

                                </ul>
                            </div>
                        </div>

                    </div> <!-- section title -->


                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--
<section id="screenshot">
    
</section>
 -->
    <!--====== PRICNG PART START 

    <section id="pricing" class="pricing_area mt-80 pt-75 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h4 class="title">Choose a Plan</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                    </div> 
                </div>
               
            </div> 
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single_pricing text-center pricing_color_1 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="pricing_top_bar">
                            <h5 class="pricing_title">Startup</h5>
                            <i class="lni lni-coffee-cup"></i>
                            <span class="price">$9.00</span>
                        </div>
                        <div class="pricing_list">
                            <ul>
                                <li>24/7 Support</li>
                                <li>Free Update</li>
                                <li>unimited download</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="main-btn main-btn-2">Get Started</a>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single_pricing text-center pricing_active pricing_color_2 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="pricing_top_bar">
                            <h5 class="pricing_title">Standard</h5>
                            <i class="lni lni-crown"></i>
                            <span class="price">$15.00</span>
                        </div>
                        <div class="pricing_list">
                            <ul>
                                <li>24/7 Support</li>
                                <li>Free Update</li>
                                <li>unimited download</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="main-btn">Get Started</a>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single_pricing text-center pricing_color_3 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="pricing_top_bar">
                            <h5 class="pricing_title">Premium</h5>
                            <i class="lni lni-diamond-alt"></i>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="pricing_list">
                            <ul>
                                <li>24/7 Support</li>
                                <li>Free Update</li>
                                <li>unimited download</li>
                            </ul>
                        </div>
                        <div class="pricing_btn">
                            <a href="#" class="main-btn main-btn-2">Get Started</a>
                        </div>
                    </div> 
                </div>
            </div> 
        </div> 
    </section>
     
    PRICNG PART ENDS ======-->

    <!--====== DOWNLOAD APP PART START 

    <section id="download" class="download_app_area pt-80 mb-80">
        <div class="container">
            <div class="download_app">
                <div class="download_shape">
                    <img src="assetsHakim/images/shape-5.svg" alt="shape">
                </div>
                <div class="download_shape_2">
                    <img src="assetsHakim/images/shape-6.png" alt="shape">
                </div>
                <div class="download_app_content">
                    <h3 class="download_title">Download The App</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod.</p>
                    <ul>
                        <li>
                            <a class="d-flex align-items-center" href="#">
                                <span class="icon">
                                    <i class="lni lni-play-store"></i>
                                </span>
                                <span class="content media-body">
                                    <h6 class="title">Play Store</h6>
                                    <p>Download Now</p>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex align-items-center" href="#">
                                <span class="icon">
                                    <i class="lni lni-apple"></i>
                                </span>
                                <span class="content">
                                    <h6 class="title">App Store</h6>
                                    <p>Download Now</p>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>   
            </div>
        </div> 
        <div class="download_app_image d-none d-lg-flex align-items-end">
            <div class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                <img src="assetsHakim/images/download.png" alt="download">
            </div>
        </div> 
    </section>

     DOWNLOAD APP PART ENDS ======-->

    <!--====== BLOG PART START 

    <section id="blog" class="blog_area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center pb-25">
                        <h4 class="title">From The Blog</h4>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sediam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                    </div> 
                </div>
            </div> 
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="single_blog blog_1 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="blog_image">
                            <img src="assetsHakim/images/blog-1.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <div class="blog_meta d-flex justify-content-between">
                                <div class="meta_date">
                                    <span>20 December, 2023</span>
                                </div>
                                <div class="meta_like">
                                    <ul>
                                        <li><a href="#"><i class="lni lni-comments-alt"></i> 20</a></li>
                                        <li><a href="#"><i class="lni lni-heart"></i> 15</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="blog_title"><a href="#">Unlimited featrues with free updates.</a></h4>
                            <a href="#" class="main-btn">Read More</a>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="single_blog blog_2 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="blog_image">
                            <img src="assetsHakim/images/blog-2.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <div class="blog_meta d-flex justify-content-between">
                                <div class="meta_date">
                                    <span>20 December, 2023</span>
                                </div>
                                <div class="meta_like">
                                    <ul>
                                        <li><a href="#"><i class="lni lni-comments-alt"></i> 20</a></li>
                                        <li><a href="#"><i class="lni lni-heart"></i> 15</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="blog_title"><a href="#">Easy to use and customize the App.</a></h4>
                            <a href="#" class="main-btn">Read More</a>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="single_blog blog_3 mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="blog_image">
                            <img src="assetsHakim/images/blog-3.jpg" alt="blog">
                        </div>
                        <div class="blog_content">
                            <div class="blog_meta d-flex justify-content-between">
                                <div class="meta_date">
                                    <span>20 December, 2023</span>
                                </div>
                                <div class="meta_like">
                                    <ul>
                                        <li><a href="#"><i class="lni lni-comments-alt"></i> 20</a></li>
                                        <li><a href="#"><i class="lni lni-heart"></i> 15</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="blog_title"><a href="#">Super fast and strong security.</a></h4>
                            <a href="#" class="main-btn">Read More</a>
                        </div>
                    </div> 
                </div>
            </div> 
        </div> 
    </section>

    BLOG PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <section id="footer" class="footer_area pt-75 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="footer_subscribe text-center">

                    </div> <!-- footer subscribe -->
                    <div class="footer_social text-center mt-60">
                        <ul>
                            <li><a href="#"><span class="lni lni-facebook-filled"></span></a></li>
                            <li><a href="#"><span class="lni lni-twitter-original"></span></a></li>
                            <li><a href="#"><span class="lni lni-instagram-filled"></span></a></li>
                            <li><a href="#"><span class="lni lni-linkedin-original"></span></a></li>
                        </ul>
                    </div> <!-- footer social -->
                    <div class="footer_copyright text-center mt-55">
                        <p>Copyright &copy; 2021. Developed by <a href="https://caci.dz" rel="nofollow">CACI</a></p>
                    </div> <!-- footer copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="___class_+?242___">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->





    <!--====== Jquery js ======-->
    <script src="assetsHakim/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assetsHakim/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assetsHakim/js/popper.min.js"></script>
    <script src="assetsHakim/js/bootstrap.4.5.2.min.js"></script>


    <!--====== Scrolling Nav js ======-->
    <script src="assetsHakim/js/jquery.easing.min.js"></script>
    <script src="assetsHakim/js/scrolling-nav.js"></script>

    <!--====== wow js ======-->
    <script src="assetsHakim/js/wow.min.js"></script>

    <!--====== Main js ======-->
    <script src="assetsHakim/js/main.js"></script>

</body>

</html>
