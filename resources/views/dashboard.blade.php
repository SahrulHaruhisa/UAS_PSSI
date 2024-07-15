@extends('layouts_backend.app')



@section('contents')
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{asset('blogtemplate/css/coba.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

     <title>Responsive Navigation Menu Bar !!!</title>
</head>
<body>


<div class="box">
    <section class="pssi-section">
        <figure class="Sliderhome">
            @foreach($data as $row)
            <main class="item active">

               <img src="{{asset($row->image)}}" alt="">

           <div class="content">
               <p>{{$row -> desc1}}</p>

           </div>
       </main>
            @endforeach

            <div class="navigation-button">
                <i class="fa-solid fa-chevron-left prev-button"></i>
                <i class="fa-solid fa-chevron-right next-button"></i>
            </div>
            <div class="navigation-invisible">
                @foreach($data as $row)
                <div class="slide-icon ">
                <img src="{{asset($row->image)}}" alt="" width="250px">
                </div>
                @endforeach

            </div>

        </figure>
        <figure class="hasil-macth">
            <main class="wrapper">
                <h1>Hasil Pertandingan</h1>
            </main>
            @foreach($datas as $macth)
            <main class="wrapper-hsl">
                <div class="img8x">
                    <div class="team">
                        <span>{{$macth -> nm_team1}}</span>
                    </div>
                    <img src="{{asset($macth->img_1)}}" alt="" srcset="">
                </div>
                <h2 class="skor">6-1</h2>
                <div class="img8x">
                    <div class="team">
                        <span>{{$macth -> nm_team2}}</span>
                    </div>
                    <img src="{{asset($macth->img_2)}}" alt="" srcset="">
                </div>
            </main>
               @endforeach
        </figure>

    </section>
</div>

<!-- area-shintaeyong-section -->
 <section class="shintaeyong-section">
    @foreach($beritahome as $beritahome)
    @endforeach
    <img src="{{asset($beritahome ->img_bg)}}" alt="" srcset="">
    <div class="content-hero">
        <div class="border"></div >
        <h2>{{$beritahome -> title}}</h2>
        <p>{{$beritahome -> created_at}}</p>
    </div>
 </section>
 <!-- end-shintaeyong-section -->
  <section class="berita-section">
    @foreach($berita as $berita)

    <figure class="boxberita boom ">
        <img src="{{asset($berita ->img_bg)}}" alt="" srcset="">
        <div class="content">
            <div class="border"></div >
            <h2>{{$berita -> type_umur}}</h2>
        <p>{{$berita -> title}}</p>
        <p>{{$berita -> created_at}}</p>

    </div>
    </figure>
    @endforeach

    @foreach($beritas as $beritas)
            <figure class="boxberita">
                <img src="{{asset($beritas ->img_bg)}}" alt="" srcset="">
                <div class="content">
                <div class="border"></div >
                <h2>{{$beritas -> type_umur}}</h2>
            <p>{{$beritas -> title}}</p>
            <p>{{$beritas -> created_at}}</p>
        </div>
            </figure>
            @endforeach
  </section>
  <!-- area-berita-section -->
    <!-- area-macth -->
    <section class="slider-ticket">
        <div class="wrapper-slide">
            <ul class="carousel">
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers" draggable="false">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers" draggable="false">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers" draggable="false">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers" draggable="false">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers" draggable="false">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="card">
                    <h2>Jenis liga</h2>
                    <div class="tanggal-main">
                        <p>Thursday 16 mei 2024</p>
                        <p>02.00,Gelora Bungkarno</p>
                    </div>
                    <div class="macth-containers" draggable="false">
                        <img src="img/indo.png" alt="" srcset="">
                        <h3 class="hasil-skor">
                            3-2
                        </h3>
                        <img src="img/itali.png" alt="">
                    </div>
                    <h1>Indonesia u16 vs italia u16</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                <li class="button-action2">
                    <i class="fa-solid fa-chevron-left "></i>
                    <i class="fa-solid fa-chevron-right "></i>
                </li>
            </ul>


        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('blogtemplate/js/blog.js')}}"></script>
    <script>


    </script>
</body>
</html>
@endsection
