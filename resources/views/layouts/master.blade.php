
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Formateur</title>
@yield('css')
<link rel="stylesheet" href="{{mix('css/app.css')}}" />
@livewireStyles
<script nonce="17965fa5-9ba3-4a9e-850f-dd4c01140645">(function(w,d){!function(db,dc,dd,de){db[dd]=db[dd]||{};db[dd].executed=[];db.zaraz={deferred:[],listeners:[]};db.zaraz.q=[];db.zaraz._f=function(df){return async function(){var dg=Array.prototype.slice.call(arguments);db.zaraz.q.push({m:df,a:dg})}};for(const dh of["track","set","debug"])db.zaraz[dh]=db.zaraz._f(dh);db.zaraz.init=()=>{var di=dc.getElementsByTagName(de)[0],dj=dc.createElement(de),dk=dc.getElementsByTagName("title")[0];dk&&(db[dd].t=dc.getElementsByTagName("title")[0].text);db[dd].x=Math.random();db[dd].w=db.screen.width;db[dd].h=db.screen.height;db[dd].j=db.innerHeight;db[dd].e=db.innerWidth;db[dd].l=db.location.href;db[dd].r=dc.referrer;db[dd].k=db.screen.colorDepth;db[dd].n=dc.characterSet;db[dd].o=(new Date).getTimezoneOffset();if(db.dataLayer)for(const dp of Object.entries(Object.entries(dataLayer).reduce(((dq,dr)=>({...dq[1],...dr[1]})),{})))zaraz.set(dp[0],dp[1],{scope:"page"});db[dd].q=[];for(;db.zaraz.q.length;){const ds=db.zaraz.q.shift();db[dd].q.push(ds)}dj.defer=!0;for(const dt of[localStorage,sessionStorage])Object.keys(dt||{}).filter((dv=>dv.startsWith("_zaraz_"))).forEach((du=>{try{db[dd]["z_"+du.slice(7)]=JSON.parse(dt.getItem(du))}catch{db[dd]["z_"+du.slice(7)]=dt.getItem(du)}}));dj.referrerPolicy="origin";dj.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(db[dd])));di.parentNode.insertBefore(dj,di)};["complete","interactive"].includes(dc.readyState)?zaraz.init():db.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>

</ul>

<ul class="navbar-nav ml-auto">

<li class="nav-item">

<div class="navbar-search-block">
<form class="form-inline">
<div class="input-group input-group-sm">
<div class="input-group-append">

<i class="fas fa-times"></i>
</button>
</div>
</div>
</form>
</div>
</li>




<li class="nav-item">
<a class="nav-link" data-widget="fullscreen" href="#" role="button">
<i class="fas fa-expand-arrows-alt"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
<i class="fas fa-th-large"></i>
</a>
</li>
</ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link">
<img src="/img/excelence.jpg" class="brand-image img-circle " width="50px" height="50px">
<span class="brand-text font-weight-light">Formateur</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">

<div class="info">
<a href="#" class="d-block">{{ Auth::user()->name }}</a>
</div>
</div>

<div class="form-inline">
<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
</div>

<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item menu-open">
<a href="#" class="nav-link active">
<i class="fa fa-user"></i>
<p>
Utilisateurs
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="/user" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> Liste Utilisateurs</p>
</a>
</li>
</ul>
</li>
<li class="nav-item menu-open">
<a href="#" class="nav-link active">
<i class="fa fa-user-tie"></i>
<p>
Formateurs
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="/formateurs" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> Liste formateur</p>
</a>
</li>
</ul>
</li>

<li class="nav-item menu-open">
<a href="#" class="nav-link active">
<i class="nav-icon fas fa-solid fa-briefcase"></i>

<p>
Offres
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="/recrutementFormation/index" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> Formations</p>
</a>
</li>
<li class="nav-item">
<a href="/recrutement/index" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> emplois</p>
</a>
</li>
<li class="nav-item">
<a href="/recrutementStage/index" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> Stages</p>
</a>
</li>
</ul>
</li>
<li class="nav-item menu-open">
<a href="#" class="nav-link active">
<i class="nav-icon  fas fa-users"></i>
<p>
Candidat
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">

<li class="nav-item">
<a href="/candidat/index" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> emplois</p>
</a>
</li>
<li class="nav-item">
<a href="/candidatStage/index" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p> Stages</p>
</a>
</li>
</ul>
</li>
<li class="nav-item">
<a href="/profile" class="nav-link">
<i class="nav-icon fas fa-th"></i>
<p>
Profile
</p>
</a>
</li>
</ul>
</nav>

</div>

</aside>

<div class="content-wrapper bg-white">



<div class="content mt-5">
@yield('content')

</div>

</div>


<aside class="control-sidebar control-sidebar-dark">
    <div class="bg-dark">
    <div class="card-body  box-profile">
    <div class="text-center">
    </div>
    <img src="/img/excelence.jpg" class=" mx-center" width="200px" height="100px ">

    <h3 class="profile-username text-center ellipsis">{{ Illuminate\Support\Facades\Auth::user()->prenom }} {{ Illuminate\Support\Facades\Auth::user()->name }}</h3>
    <p class="text-muted text-center">{{ Illuminate\Support\Facades\Auth::user()->poste}}</p>
    {{-- {{getRolesName()}} --}}
     <ul class="list-group bg-dark mb-3">
            <li class="list-group-item">
            <a href="" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
            </li>
            <li class="list-group-item">

            <a href="" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
            </li>
        </ul>
      <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                   <b>  Déconnexion</b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
    </div>



    </div>






</aside>


<footer class="main-footer">

<div class="float-right d-none d-sm-inline">
Anything you want
</div>

<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>

@yield('js')
<script src="{{mix('js/app.js')}}"></script>
@livewireScripts
<script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });

  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });


    $(document).on('click','#change_picture_btn', function(){
      $('#admin_image').click();
    });


    $('#admin_image').ijaboCropTool({
          preview : '.admin_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("adminPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });

    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });


  });




</script>
</body>
</html>
