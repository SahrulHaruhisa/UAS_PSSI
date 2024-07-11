@extends('admin.appadmin')
@push('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
<figure class="product-management">
                <header class="product-head">
                  <div class="product-title">
                    <h2>Player</h2>
                    <p>Let's grow to your business!Create your player and upload here</p>
                  </div>
                  
                <form action="/admin/player" method="GET">
                 <input type="search" name="search"  class="form-control" id="inputPassword4" placeholder="Search heree bro">
                </form>
                <div class="flex gap-9">
                    <a href="/admin/tambahberita" class="Add-data">
                        +create data
                    </a>
                    <a href="#" class="Delete-data" id="deleteAllSelect">
                        Delete
                    </a>
                    </div>
                </header>
            </figure>
            <figure class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                        <th><input type="checkbox" name="" id="select_all_ids" ></th>
                            <th>title</th>
                            <th>type umur</th>
                            <th>par1</th>
                            <th>par2</th>
                            <th>par3</th>
                            <th>par4</th>
                            <th>par5</th>
                            <th>foto1</th>
                            <th>foto2</th>
                            <th>foto3</th>
                            <th>img bg</th>
                            <th>Action</th>
                            <th>Crafted</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $berita)
                        <tr id="slider_ids{{$berita ->id}}">
                            <td><input type="checkbox" name="ids" id="checkbox_ids" class="checkbok_ids" value="{{$berita ->id}}"></td>
                            <td>{{$berita ->title}}</td>
                            <td>{{$berita ->type_umur}}</td>
                            <td>{{$berita ->par1}}</td>
                            <td>{{$berita ->par2}}</td>
                            <td>{{$berita ->par3}}</td>
                            <td>{{$berita ->par4}}</td>
                            <td>{{$berita ->par5}}</td>
                            <td><img src="{{asset($berita->img_bg)}}" alt="" srcset=""></td>
                            <td><img src="{{asset($berita->foto_1)}}" alt="" srcset=""></td>
                            <td><img src="{{asset($berita->foto_2)}}" alt="" srcset=""></td>
                            <td><img src="{{asset($berita->foto_3)}}" alt="" srcset=""></td>
                            <td><a href="/admin/editslide/{{$berita->id}}" class="Edit"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                <a href="" class="Show"><i class="fa-solid fa-eye"></i>Show</a>
                                <a href="#" class="Delete" data-id="{{$berita->id}}"><i class="fa-regular fa-trash-can"></i>Delete</a></td>
                            <td>{{$berita-> created_at->format('D M Y')}}</td>
                        </tr>
                        @endforeach
                        
                        
                       
                    </tbody>
                </table>
             
            </figure>
        </article>
        @push('js')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
            <script>
                $('.Delete').click(function(){
                    var sliderid= $(this).attr('data-id');
                    swal({
                 title: "Are you sure?",
                 text: "Once deleted, you will not be able to recover this imaginary file "+sliderid+"",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location ="/admin/deleteplayer/"+sliderid+""
                      swal("Poof! Your imaginary file has been deleted!", {
                       icon: "success",
                 });
                } else {
                  swal("Your imaginary file is safe!");
         }
        });
                });

                $(function(e){
                $("#select_all_ids").click(function(){
                      $('.checkbok_ids').prop('checked',$(this).prop('checked'));
                });
                $('#deleteAllSelect').click(function(e){
                  e.preventDefault();
                  var all_ids =[];
                  $('input:checkbox[name=ids]:checked').each(function(){
                    all_ids.push($(this).val());
                  });
                  $.ajax({
                    url:"{{route('admin.delete')}}",
                    type:"DELETE",
                    data:{
                      ids:all_ids,
                      _token:'{{csrf_token()}}'
                    },
                    success:function(response){
                      $.each(all_ids,function(key,val){
                        $('#slider_ids'+val).remove();
                      })
                     if(response.status == 200){
                      alertify.set('notifier','position', 'top-right');
                      alertify.success(response.message);;
                        }
                    }
                  })
                });
            });
            </script>
      
                 @if(Session::has('success'))
                 <script>
                    toastr.options={
                        "progessBar" :true,
                        "closeButton" :true,
                    }
                    toastr.success("{{Session::get('success')}}")
                    </script>
                @endif
            

@endpush('js')

@endsection