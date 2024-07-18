
@extends('layouts_backend.app')


@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('blogtemplate/css/fixtures.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Ga+Maamli&display=swap" rel="stylesheet"> 

    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <section class="next-macth">
            @foreach($tickets  as $content1)
          
            <figure class="content">
                <h1>Next Match</h1>
                <p>{{$content1 -> hari}}</p>
                <h2>{{$content1 -> tanggal_macth}}</h2>
                <p>{{$content1 -> jenis_macth}}| <i class="fa-solid fa-location-dot"></i>{{$content1 -> location}} </p>
            </figure>
            <figure class="content-team">
                <div class="img8x">
                    <img src="{{asset($content1->imageT1)}}" alt="" srcset="">
                   
                </div>
                <b>VS</b>
                <div class="img8x">
                    <img src="{{asset($content1->imageT2)}}" alt="" srcset="">
                   
                </div>
            </figure>
            @endforeach
        </section>

        <section class="fixtures">
            <div class="Fixtures-head">
                <h2>Fixtures</h2>
                <form action="" class="cari">
                    <input type="search" name="" id="" placeholder="Search by name">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
                
        </div>
            <article class="fixtures-wrapper">
              
                
            @foreach($ticket as $content2)
            
                <figure class="fixtures-box">
                    <div class="drop">
                        <div class="dropdown">
                            <img src="{{asset($content1->imageT1)}}" alt="" srcset="" width="50px">
                            <p>{{$content2 -> jenis_macth}}</p>
                            <div class="btns">
                                <a href="">Tickets news</a>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-down caret" id="toggle-menu"></i>
                    </div>
                    <div class="menus" id="menus">
                        <p>{{$content2 -> hari}}</p>
                        <h1>{{$content2 -> tanggal_macth}}, {{$content2 -> jam}}</h1>
                        <div class="img-macth">
                            <div class="box">
                                <img src="{{asset($content2->imageT1)}}" alt="" srcset="">
                                
                            </div>
                            <h2>VS</h2>
                            <div class="box">
                                <img src="{{asset($content2->imageT2)}}" alt="" srcset="">
                                
                            </div>
                        </div>
                        <div class="content">
                            <p>{{$content2 -> tanggal_macth}}</p>
                            <h1><i class="fa-solid fa-location-dot"></i>{{$content2 -> location}}</h1>
                        </div>
                        <div class="btns">
                            <a href="">Tickets news</a>
                        </div>
                    </div>
                    
                </figure>
                @endforeach

                
            
           
              
                
            @foreach($pertandingan as $content)
            
                <figure class="fixtures-box">
                    <div class="drop">
                        <div class="dropdown">
                            <img src="{{asset($content1->img_1)}}" alt="" srcset="" width="50px">
                            <p>{{$content -> type_pertandingan}}</p>
                            <div class="btns">
                                <a href="">Tickets news</a>
                            </div>
                        </div>
                        <i class="fa-solid fa-angle-down caret" id="toggle-menu"></i>
                    </div>
                    <div class="menus" id="menus">
                       
                        <div class="img-macth">
                            <div class="box">
                                <img src="{{asset($content->img_1)}}" alt="" srcset="" width="30px">
                                <p>{{$content ->nm_team1}}</p>
                            </div>
                            <h2>{{$content -> skor}}</h2>
                            <div class="box">
                                <img src="{{asset($content->img_2)}}" alt="" srcset=""width="30px">
                                <p>{{$content ->nm_team2}}</p>
                            </div>
                        </div>
                        <div class="content">
                            <p>{{$content -> stadium}}</p>
                            <h1><i class="fa-solid fa-location-dot"></i>Gelora Bungkarno Stadium</h1>
                        </div>
                        <div class="btns">
                            <a href="">Tickets news</a>
                        </div>
                    </div>
                   
                </figure>
                @endforeach
         
           
        </section>
    </div>
    <script>
   
   document.addEventListener('DOMContentLoaded', function () {
    // Pilih semua elemen fixtures-box
    const fixturesBoxes = document.querySelectorAll('.fixtures-box');

    fixturesBoxes.forEach(box => {
        const toggleButton = box.querySelector('.fa-angle-down');
        const menu = box.querySelector('.menus');

        toggleButton.addEventListener('click', function () {
            if (menu.classList.contains('show')) {
                menu.classList.remove('show'); // Menyembunyikan menu jika sudah ditampilkan
                toggleButton.classList.remove('rotate'); // Menghapus rotasi
            } else {
                menu.classList.add('show'); // Menampilkan menu jika belum ditampilkan
                toggleButton.classList.add('rotate'); // Menambahkan rotasi
            }
        });
    });
})
    </script>
</body>
</html>
@endsection