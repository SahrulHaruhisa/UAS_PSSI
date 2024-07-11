@extends('admin.appadmin')
@push('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
<figure class="product-management">
                <header class="product-head">
                  <div class="product-title">
                    <h2>Product</h2>
                    <p>Let's grow to your business!Create your product and upload here</p>
                  </div>
                  <div class="col-md-6 mb-3">
                <form action="/admin/macth_ticket" method="GET">
                 <input type="search" name="search"  class="form-control" id="inputPassword4" placeholder="Search heree bro">
                </form>
                 </div>
                    <a href="/admin/tambahmacth_ticket" class="Add-data">
                        +create data
                    </a>
                    <a href="#" class="Delete-data" id="deleteAllSelect">
                        Delete
                    </a>
                </header>
            </figure>
            <figure class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                        <th><input type="checkbox" name="" id="select_all_ids" ></th>
                            <th>Jenis Pertandingan</th>
                            <th>imageT1</th>
                            <th>ImageT2</th>
                            <th>Jam</th>
                            <th>Location</th>
                            <th>Tanggal macth</th>
                            <th>Hari</th>
                            <th>Action</th>
                            <th>Crafted</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $ticket)
                        <tr id="slider_ids{{$ticket ->id}}">
                            <td><input type="checkbox" name="ids" id="checkbox_ids" class="checkbok_ids" value="{{$ticket ->id}}"></td>
                            <td>
                            {{$ticket ->jenis_macth}}</td>
                            <td><img src="{{asset($ticket->imageT1)}}" alt="" srcset=""></td>
                            <td><img src="{{asset($ticket->imageT2)}}" alt="" srcset=""></td>
                            <td>{{$ticket ->jam}}</td>
                            <td>{{$ticket ->location}}</td>
                            <td>{{$ticket ->tanggal_macth}}</td>
                            <td>{{$ticket ->hari}}</td>
                            <td><a href="/admin/editmacth_ticket/{{$ticket->id}}" class="Edit"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                <a href="" class="Show"><i class="fa-solid fa-eye"></i>Show</a>
                                <a href="#" class="Delete" data-id="{{$ticket->id}}"><i class="fa-regular fa-trash-can"></i>Delete</a></td>
                            <td>{{$ticket-> created_at->format('D M Y')}}</td>
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
                        window.location ="/admin/deletemacth_tiket/"+sliderid+""
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