<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ACCESSIBLE CARE HUB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="img/WhatsApp Image 2023-11-20 at 6.26.56 AM.jpeg">
    <style>
        #logo {
            display: block;
            float: left;
            width: 50px;
            height: 50px;
            margin: auto;
        }

        .colour {
            color: #007bff;
            font-size: 150%;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <img id="logo" src="img/WhatsApp Image 2023-11-20 at 6.26.56 AM.jpeg" alt="logo" />
            <h1 class="m-0 text-primary"> </i>ACCESSIBLE CARE HUB</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="#section_1" class="nav-item nav-link active">Home</a>
                <a href="#section_2" class="nav-item nav-link">About</a>
                <a href="#section_4" class="nav-item nav-link">Motto</a>
                <a href="#section_5" class="nav-item nav-link">Our Clinics And Hospitals</a>
                <a href="developer.html" class="nav-item nav-link">Developers</a>
                <?php 
                session_start();
                if(!isset($_SESSION['user'])){
                    echo '
                    <a class="nav-item nav-link">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Login
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button" onclick="user()">User Login</button></li>
                                <li><button class="dropdown-item" type="button" onclick="admin()">Admin Login</button></li>
                            </ul>
                        </div>
                    </a>
                    ';
                }
                else{
                    echo '
                    <a href="reg.php" class="nav-item nav-link">For Registration</a>
                    ';
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Carousel Start -->
    <section>
        <div class="container-fluid p-0" id="section_1">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h1 class="text-white text-uppercase mb-3 animated slideInDown"><span
                                        class="colour">C</span>onnect With Us <span class="colour">A</span>nd <span
                                        class="colour">RE</span>store Your Dentition</h1>
                                <h5>Your search for wheel chair accessible dental clinics in Calicut is here</h5>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h1 class="text-white text-uppercase mb-3 animated slideInDown"><span
                                        class="colour">C</span>onnect With Us <span class="colour">A</span>nd <span
                                        class="colour">RE</span>store Your Dentition</h1>
                                <h5>Your search for wheel chair accessible dental clinics in Calicut is here</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <!-- Banner Start -->


    <!-- About Start -->
    <section>
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="section_2">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <div class="section-title mb-4">
                            <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                            <h1 class="display-5 mb-0"></h1>
                        </div>
                        <h4 class="text-body fst-italic mb-4"></h4>
                        <p class="mb-4"> Indian Dental Association (IDA) is an independent and recognized voice of
                            dental professionals in India.
                            IDA represents more than 75,000 dental professionals and has 35 state branches and 450 local
                            branches.
                            IDA MALABAR branch, is one of the largest branches in the country, and we are committed to
                            improving public oral health by promoting advanced, science-based dentistry that puts the
                            patient at the centre.
                            We acknowledge that oral health is an integral part of general health and well-being.
                            Through various initiatives and campaigns, IDA Malabar branch reaches out to the public to
                            safeguard and promote optimal oral healthcare. Our latest initiative is a first of its kind
                            website called as ACCESSIBLE CARE HUB.</p>
                        <div class="row g-3">
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">

                                <h1>Mission</h1>
                                <p>Our mission is optimal oral health for all.

                                    With this mission in mind, we have come up with a new project targeting differently
                                    abled individuals, especially those who are wheel chair bound and have limited
                                    access to dental care. ACCESSIBLE CARE HUB- Connect with us And Restore your
                                    dentition
                                    is, Is focused to rehabilitate the dentition of such individuals.

                                </p>
                            </div>
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">

                                <h1>Vision</h1>
                                <p>The association's vision is to improve oral health and quality of life and achieve
                                    optimal oral health for all. We also aim to represent the dental profession and
                                    support members in the provision of comprehensive and quality oral health care.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                                src="WhatsApp Image 2023-10-31 at 8.01.14 AM.jpeg" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    </section>

    <!-- Appointment Start -->




    <!-- Offer Start -->

    <!-- Offer End -->



    <!-- Pricing End -->


    <!-- Testimonial Start -->
    <section>
        <div class="container-fluid bg-primary bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s"
            id="section_4">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                            <div class="testimonial-item text-center text-white">

                                <h4 class="text-white mb-0">Motto - ACCESSIBLE CARE HUB</h4>
                                <hr class="mx-auto w-25">
                                <p class="fs-5">ACCESSIBLE CARE HUB-Connect with us And Restore your dentition is the
                                    brain
                                    child of our branch focused to deliver dental care to physically challenged
                                    individuals. Through this venture, we aim to provide the link to the wheel chair
                                    friendly dental clinics of our members located in CALICUT.

                                    Those clinics in Calicut which are in ground floor,having ramp or lift facility,
                                    that are amenable for wheelchair locomotion are registered in this web page.

                                    A concerned individual can access this web page, check out the wheel chair friendly
                                    clinics that are in their vicinity, book an appointment and get quality treatment
                                    done through our members.

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <div class="col-12">
        <button class="btn btn-dark w-100 py-3"></button>
    </div>

    <!-- Team Start -->

    <section>

        <div class="container-fluid py-5" id="section_5">
            <div class="container">


                <div class="section-title bg-light rounded h-100 p-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Instruction</h5>
                    <h6>തടസ്സം കൂടാതെ ദന്ത പരിശോധന, ദന്ത ചികിത്സ എന്നിവ ലഭിക്കാൻ മുൻകൂർ ബുക്കിംഗ് നിർബന്ധമാണ്</h6>
                    <h6>Advance booking is mandatory to get hassle-free dental check-up and dental treatment</h6>
                    <a href="team.php" class="btn btn-primary py-3 px-5">Details Of Our Clinics And Hospitals</a>
                </div>
            </div>
        </div>
        </div>
        </div>

    </section>




    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        function user(){
            window.location.href = 'register.php';
        }
        function admin(){
            window.location.href = 'account.php';
        }
    </script>
</body>

</html>
