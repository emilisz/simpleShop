<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->



    <link href="{{ asset('themes/krajee-uni/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}">{{ __('Shop') }}</a>
                            </li>
                            @if(Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">{{ __('Admin') }}</a>
                            </li>
                            @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a  class="nav-link disabled" href="#"  >
                                   Hi,  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a  class="nav-link " href="/logout" role="button" >
                                  Logout <span class="caret"></span>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
               
                @if($errors->any())
                 <div class="alert alert-danger" role="alert">
                 {{$errors->first()}}
                </div>
                @endif
               @if (Session::has('message'))
                   <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
   <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>
 <!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->

<script src="{{ asset('themes/krajee-uni/theme.js') }}" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

    

<script type="text/javascript">

   $(document).on('click','#submit',function(){
var id = $("input[name=id]").val();
        var rating = $("input[name=rating]").val();
var token = $('meta[name="csrf-token"]').attr('content');
$.ajax({

    type:'POST',
    url:"/rating",
    dataType: 'JSON',
    data: {
        "_method": 'POST',
        "_token": token,
        "id": id,
        "rating": rating
    },
    success:function(data){
        // alert(data.success);
    },
    error:function(){

    },
});
});

</script>

   
    <script>
        $(document).ready(function () {
            $.noConflict();
             $('#product').DataTable();
             $('.kv-ltr-theme-uni-star').rating({
        hoverOnClear: false,
        theme: 'krajee-uni'
    });
             $('#summernote').summernote({
                tabsize: 2,
                height: 100
             });
        });
    </script>

    <script type="text/javascript">

    $(document).ready(function () {
        $('#check_all').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".checkbox").prop('checked', true);  
         } else {  
            $(".checkbox").prop('checked',false);  
         }  
        });

         $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
         });

        $('.delete-all').on('click', function(e) {
            var idsArr = [];  
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).attr('data-id'));
            });  

            if(idsArr.length <=0)  
            {  
                alert("Please select at least one record to delete.");  
            }  else {  
                if(confirm("Are you sure, you want to delete the selected products?")){  
                    var strIds = idsArr.join(","); 
                    $.ajax({
                        url: "{{ route('products.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },

                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }  
            }  
        });


        
    });

</script>
</body>
</html>
