@extends('layouts_backend.app')



@section('contents')


    @push('csss')
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{asset('blogtemplate/css/coba.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endpush
     <title>Responsive Navigation Menu Bar</title>

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
                <div class="skor"> 
               <p >{{$macth -> skor}}</p>
               
            </div>
                <div class="img8x">
                <img src="{{asset($macth->img_2)}}" alt="" srcset="">
                    <div class="team">
                        <span>{{$macth -> nm_team2}}</span>
                    </div>
                    
                </div>
               
                
            </main>
               @endforeach
        </figure>
    
    </section>
</div>

<div class="wraps">
        <h4>Hero section</h4>
       
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


 <div class="wrap">
    <div class="wraps flex justify-between">
         <h4 >
            Berita
            <div class="border"></div >
        </h4>
        <a href="/semuaberita">Semua berita<a >
</div>
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
</div>
  <!-- area-berita-section -->
    <!-- area-macth -->
<div class="wrapsz flex justify-between">
    <h4>
            Next Macth and after Macth Content
        </h4>
        <a href="/semuapertandingan">Semua pertandingan<a >
        </div>
    <section class="slider-ticket">
        
        <div class="wrapper-slide">
            <ul class="carousel">
                @foreach($ticket as $tickets)
                <li class="card">
                    <h2>{{$tickets ->jenis_macth}}</h2>
                    <div class="tanggal-main">
                        <p>{{$tickets ->hari}}{{$tickets ->tanggal_macth}},</p>
                        <p>{{$tickets ->jam}}{{$tickets ->location}}</p>
                    </div>
                    <div class="macth-containers">
                        <img src="{{$tickets->imageT1}}" alt="" srcset="">
                        <h3 class="hasil-skor">
                        {{$tickets ->jam}}
                        </h3>
                        <img src="{{$tickets->imageT2}}" alt="">
                    </div>
                    
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                @endforeach

                @foreach($datas as $datas)
                <li class="card">
                    <h2>{{$datas ->type_pertandingan}}</h2>
                    <div class="tanggal-main">
                        <p>{{$datas ->hari}}{{$datas ->tanggal_macth}}</p>
                        <p>{{$datas ->jam}}{{$datas ->location}}</p>
                    </div>
                    <div class="macth-containers">
                        <img src="{{$datas->img_1}}" alt="" srcset="">
                        <h3 class="hasil-skors">
                        {{$datas ->skor}}
                        </h3>
                        <img src="{{$datas->img_2}}" alt="">
                    </div>
                    <h1>{{$datas -> nm_team1}}vs{{$datas -> nm_team2}}</h1>
                    <div class="macth-preview">
                        <p>Macth review</p>
                    </div>
                </li>
                @endforeach
                <li class="button-action2">
                    <i class="fa-solid fa-chevron-left "></i>
                    <i class="fa-solid fa-chevron-right "></i>
                </li>
            </ul>
          
            
        </div>
    </section>
    @push('jsss')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('blogtemplate/js/blog.js')}}"></script>
    <script>
      

    </script>
    @endpush
</body>
</html>
@endsection