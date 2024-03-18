@extends('landing.layout.app')

@section('title')
@endsection

@push('addons-css')
        <style>
        .image {
            position: absolute;
            text-align: right; 
            top: -25px; 

        }

        /*gambar pertama */
        .image img:first-child {
            right: auto; 
            padding-right: 5%;
        }

        /*gambar kedua */
        .image img:last-child {
            right: -25px; 
            padding-right: 5%;
        }


        
   </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-bottom: 10px; margin-top:50px; position: relative;">
   <div class="image">
    <img src="{{ asset('./assets/dist/img/Delive.png') }}" class="img-fluid" style="width: 689px; max-width: 100%; height: auto; position: absolute; right: auto; bottom: 0;">
    <img src="{{ asset('./assets/dist/img/Order.png') }}" class="img-fluid" style="width: 500px; max-width: 100%; height: auto; position: absolute; right: 20px; bottom: 0;">
   </div>
    <!-- Main content -->
    <div class="text-center">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4" style="color: #008080; font-weight: bold; font-family: 'Calibri';">Trace &amp; Track</h1>
            <p class="lead font-weight-normal" style="@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');">
                 Masukkan nomor resi untuk tracking pengiriman barang kamu disini secara real time dan akurat.</p>
            <br>
            <form action="" method="GET" style="max-width: 80%; margin: auto;">
                <input type="resi" name="resi" value="{{ $resi }}" class="form-control" id="resi" style="width: 100%; height: 70%; text-align: center; font-size: 16px;" placeholder="Input Nomor Resi Anda"> 
                <br>
                <button type="submit" id="search" class="btn btn-primary" style="background-color: #0F7567; border-radius: 20px; width: 100%; font-size: 16px;">Search</button>
            </form>
          
        </div>
    </div>
</div>

    <div>
        @if ($resi)
            @if ($trackingData)
                @include('landing.result')
            @else
                <center>
                    <h3 id="scroll"><b>Nomor Resi Tidak Ditemukan</b></h3>
                </center>
            @endif
        @endif
        <!-- /.content -->
    </div>
<!-- /.content-wrapper -->
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>

<!-- ======= Footer ======= -->
     
     
    <footer id="newsletter" style="position: relative;">
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position: absolute; top: 0; left: 0; z-index: 70px;">
        <path fill="#1e8183" fill-opacity="1" d="M0,64L80,80C160,96,320,128,480,128C640,128,800,96,960,85.3C1120,75,1280,85,1360,90.7L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        <path fill="#1e8183" fill-opacity="1" d="M0,320L1440,256L1440,0L0,0Z"></path>
    </svg>

    
    
    <div class="container"  style="margin-top: 100px">
    <!-- your footer content here -->
   <div class="row" style="@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');">

        <div class="col-lg-3 col-md-6">
            <div class="footer-widget" style="text-align: left;">
                <h4 style="color: white;">About Our Company</h4>
               
                    <img src="{{ asset('./assets/dist/img/ecomepet.png') }}" alt="logo">
            
                <p style="color: white;">EcoHero Cargo International streamlines and oversees the transportation of your goods. 
                                        Our expertise lies in organizing various cargo services, spanning air freight, inland transportation, 
                                        and sea freight, ensuring smooth transit from the point of origin to the final destination.”.</p>
            </div>

            <!-- Tambahkan ikon-ikon media sosial di bawah konten "About" -->
            <div class="elementor-element elementor-element-b66faef elementor-icon-list--layout-inline elementor-align-left elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="b66faef" data-element_type="widget" data-widget_type="icon-list.default">
                <div class="elementor-widget-container">
                    <ul class="elementor-icon-list-items elementor-inline-items">
                        <!-- Ikon-ikon Anda disini -->
                        <a href="https://www.facebook.com/Ecoheroworld/" target="_blank" class="elementor-icon-list-item elementor-inline-item">
                                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-facebook-square" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg>						</span>
                                    <span class="elementor-icon-list-text"></span>
                                </a>
                            <a href="https://www.bing.com/ck/a?!&&p=7299b8827d5d5f06JmltdHM9MTcxMDM3NDQwMCZpZ3VpZD0wOTM2OWUyMi00NGQ2LTY0ZjctM2E4Ny04ZWIxNDU4MDY1YTQmaW5zaWQ9NTMwMA&ptn=3&ver=2&hsh=3&fclid=09369e22-44d6-64f7-3a87-8eb1458065a4&psq=twitter+ecohero.world&u=a1aHR0cHM6Ly90d2l0dGVyLmNvbS9lY2hvd29ybGRjbw&ntb=1" target="_blank" class="elementor-icon-list-item elementor-inline-item">
                                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-twitter-square" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg>						</span>
                                    <span class="elementor-icon-list-text"></span>
                                </a>
                            <a href="https://www.linkedin.com/company/eco-hero-world" target="_blank" class="elementor-icon-list-item elementor-inline-item">
                                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-linkedin" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>						</span>
                                    <span class="elementor-icon-list-text"></span>
                                </a>
                            <a href="https://www.instagram.com/ecoheroworld/" target="_blank" class="elementor-icon-list-item elementor-inline-item">
                                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-instagram" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>						</span>
                                    <span class="elementor-icon-list-text"></span>
                                </a>
                    </ul>
                </div>
            </div>
        </div>

        


        <div class="col-lg-3 col-md-6">
            <div class="footer-widget" style="text-align: left;">
                <h4 style="color: white;">Navigation</h4>
                <p style="color: black;"><a href="https://ecoherocargo.world/" style="color:white ;">Home</a></p> 
                <p style="color: black;"><a href="https://ecoherocargo.world/services/" style="color: white;">Services</a></p>
                <p style="color: black;"><a href="https://ecoherocargo.world/about-us/" style="color: white;">About Us</a></p>
                <p style="color: black;"><a href="https://ecoherocargo.world/blog/" style="color: white;">Blog</a></p>
                <p style="color: black;"><a href="https://ecoherocargo.world/personal-shopper/" style="color: white;">Personal Shopper</a></p>
 

            </div>
            
        </div>
         <div class="col-lg-3 col-md-6">
            <div class="footer-widget" style="text-align: left;">
                <h4 style="color: white;">Contact Us</h4>
                <p style="color: white;">
                <p style="color: white;">Feel free to reach out to us anytime,Contact us without hesitation.</p>
                    <i class="fas fa-map-marker-alt"></i> <a href="#" style="color: white;">Europe</a>
                </p>
                <p style="color: white;">
                    <i class="fas fa-phone"></i> <a href="#" style="color: white;">+111</a>
                </p>
                <p style="color: white;">
                    <i class="fas fa-envelope"></i> <a href="#" style="color: white;">cs@ecoherocargo.world</a>
                </p>
               <p style="color: white;">
                    <i class="fas fa-clock" style="color: white;"></i> <a href="#" style="color: white;">Office Hour</a>
                </p>

                

               
            </div>
        </div>
    </div>
</div>    
     
</footer>
<footer id="news" style="background-color: #0d6d69; padding: 5px;">
            <div class="container">
                <div class="row">        
                    <div class="col-lg-3">
                        <div class="container text-center" style="color: #FFFFFF;">
                            <p><strong>©2024 EcoHero. All Rights Reserved.</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
 

   

<style>

        /* Gaya CSS untuk menata posisi ikon-ikon media sosial */
    .footer-widget {
        margin-bottom: 30px; /* Menambahkan ruang antara konten "About" dan ikon-ikon */
    }

    /* Gaya CSS untuk ikon-ikon media sosial */
    .elementor-icon-list-items {
        display: flex; /* Mengatur tata letak item menjadi flexbox */
        justify-content: flex-start; /* Mengatur penyebaran item dari kiri ke kanan */
        align-items: left; /* Mengatur penyejajaran item secara vertikal */
        margin-top: 20px; /* Menambahkan ruang di atas ikon-ikon */
        
    }

    .elementor-icon-list-item {
        margin-right: 15px; /* Menambahkan ruang antara setiap ikon */
    }

    /* Memperbesar ikon-ikon */
    .elementor-icon-list-icon svg {
        fill: white; /* Mengatur warna ikon menjadi putih */
        width: 30px; /* Mengatur lebar ikon */
        height: 30px; /* Mengatur tinggi ikon */
        stroke: none; /* Menonaktifkan efek stroke */
    }



    /* Add your custom styles here */
    footer {
        background-color: #1e8183;
        color: #fff;
        padding: 50px 0;
        text-align: left;
    }

    .footer-widget h4 {
        font-weight: bold;
    }

    .footer-widget p {
        margin-bottom: 20px;
    }

    .footer-widget ul li {
        list-style: none;
    }

    /* Media queries for responsiveness */
    @media (max-width: 992px) {
        .footer-widget {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 768px) {
        .footer-widget {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .footer-widget {
            margin-bottom: 10px;
        }
    }

    .h1{
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    }

    

     /* Efek hover pada tautan di dalam elemen navigasi */
    .footer-widget a:hover {
        color: #000; /* Ubah warna teks saat hover */
        text-decoration: underline; /* Tambahkan garis bawah saat hover */
       
    }

  #news {
    position: relative;
    background-color: #0d6d69;
    padding: 1px;
    width: 100%; /* Menetapkan lebar footer 100% */
}

.container {
    position: relative;
}

.row {
    display: flex;
    flex-direction: row; /* Mengatur konten di dalam row menjadi horizontal */
    justify-content: center; /* Mengatur konten di tengah */
}

.col-lg-3 {
    margin: 0 1.2cm; /* Memberikan jarak 1.10cm ke kiri dan kanan */
}


/* Menyesuaikan ukuran font dalam footer */

#newsletter {
    font-size: 20px; /* Misalnya, ukuran font 16 piksel */
}

/* Jika ingin memperbesar ukuran font pada seluruh elemen dalam footer */
#news * {
    font-size: 15px; /* Misalnya, ukuran font 16 piksel */
}




    
</style>
       

<!-- End Footer -->
@endsection
@push('addons-js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ganti 'targetId' dengan ID elemen yang ingin di-scroll
            var targetId = "scroll";

            // Cek apakah elemen dengan ID yang ditentukan ada di halaman
            var targetElement = document.getElementById(targetId);

            // Jika elemen ditemukan, lakukan scroll otomatis
            if (targetElement) {
                // Ganti 'behavior' dan 'block' sesuai kebutuhan
                targetElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        });
    </script>
@endpush