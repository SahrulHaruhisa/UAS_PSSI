@extends('layouts_backend.app')
@push('csss')
<link rel="stylesheet" href="{{asset('blogtemplate/css/coba.css')}}">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
@endpush

@section('contents')


<div class=" nave ">
         <a href="dashboard" >
            Back
            <div class="border"></div >
        </a>
</div>

<section class="berita-sections">
  

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
                @foreach($pertandingan as $datas)
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
</section>

@endsection

@push('jsss')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('blogtemplate/js/blog.js')}}"></script>
    @endpush('jsss')