@extends('layouts_backend.app')



@section('contents')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('blogtemplate/css/player.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Ga+Maamli&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <div class="container">
        <figure class="photo">
            <img src="{{asset('blogtemplate/img/thom.jpg')}}" alt="" srcset="">
            <div class="content">
                <h1>#Indonesia Menuju Piala Dunia</h1>
                <p>Timnas Senior 2024</p>
            </div>
        </figure>
        <figure class="team-seaction">
            <h2>Team</h2>
            <section class="team-grid">

                   @foreach($player as $player)
                   <a href="/playershow/{{$player -> id}}">
    <article class="card-box">
        <img src="{{asset($player->fotoprofile)}}" alt="" srcset="" ">
    <div class="content-card">
        <h3>{{$player -> nama_depan}}{{$player -> nama_belakang}}</h3>
        <p><span>{{$player -> tanggal_lahir}}</span>   <span>{{$player -> no_punggung}}</span> </p>
    </div>
    
</article>
</a>
@endforeach
            </section>
        </figure>
    </div>
</body>
</html>


@endsection