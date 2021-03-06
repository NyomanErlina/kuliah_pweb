<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script> 
<!--icons-css-->
<link href="{{ asset('/css/font-awesome.css')}}" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<!--<script src="{{ asset('js/Chart.min.js')}}"></script>-->
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
   <!-- <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script> -->
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="{{ asset('/js/chartinator.js')}}" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="{{ asset('/js/skycons.js')}}"></script>
<!--//skycons-icons-->
@yield('head')

</head>
<body style="background-color: #000000">  
<div class="page-container">  
   <div class="left-content">
     <div class="mother-grid-inner">
            <!--header start here-->
        <div class="header-main">
          <div class="header-left" >
              <div class="logo-name"style="width: 900px;" >
                   <div class="row" ><h1 style="font-family: Jazz LET, fantasy; font-size: 50px;">N.E.L.D STORE</h1> </div>
                
                              
              </div>
             
              <div class="clearfix"> </div>
             </div>
             <div class="header-right">

              <div class="profile_details">   
                <ul>
                  <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <div class="profile_img">
                        @if(session('job_status') == 'Administrator')
                        <span class="prfil-img"><img style="width: 70px; height: 70px" src="{{ asset('/images/fotonyom.png')}}" alt=""> </span> 
                        @else
                          <span class="prfil-img"><img style="width: 70px; height: 70px" src="{{ asset('/images/user.png')}}" alt=""> </span> 
                        @endif

                        <div class="user-name">
                           
                          <p>{{@session('first_name')}} {{@session('last_name')}} </p>
                          @if(session('job_status') == 'Administrator')
                            <span>Administrator</span>
                            @elseif(session('job_status') == 'Product Manager')
                            <span>Product Manager</span>
                            @else
                             <span>Cashier</span>
                          @endif 
                        </div>
                        <i class="fa fa-angle-down lnr"></i>
                        <i class="fa fa-angle-up lnr"></i>
                        <div class="clearfix"></div>  
                      </div>  
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                      <!--
                      <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                      <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                    -->
                      <li> <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="clearfix"> </div>       
            </div>
             <div class="clearfix"> </div>  
        </div>
<!--heder end here-->
<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
       var navoffeset=$(".header-main").offset().top;
       $(window).scroll(function(){
        var scrollpos=$(window).scrollTop(); 
        if(scrollpos >=navoffeset){
          $(".header-main").addClass("fixed");
        }else{
          $(".header-main").removeClass("fixed");
        }
       });
       
    });
    </script>
    <!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

@yield('content')

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights" style="background-color: #202020 ">
   <p style="color: white">~ N.E.L.D STORE ~</p>
</div>  
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> </div>     
        <div class="menu">
          <ul id="menu" >
            <li id="menu-home" ><a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>

           
            <li><a href="#"><i class="fa fa-book nav_icon"></i><span>Data Master</span><span class="fa fa-angle-right" style="float: right"></span></a>
                

              <ul>
                 @if(session('job_status') == 'Administrator' || session('job_status') == 'Product Manager')
                  <li><a href="{{ url('/categories') }}">Categories</a></li>
                @endif 
                
                  <li id="menu-arquivos" ><a href="{{ url('/products') }}">Products</a></li> 
                

                @if(session('job_status') == 'Administrator' || session('job_status') == 'Cashier')
                  <li><a href="{{ url('/customers') }}">Customers</a></li>
                @endif  

                @if(session('job_status') == 'Administrator')
                  <li><a href="{{ url('/users') }}">Users</a></li> 
                @endif              
              </ul>
            </li>
          

            @if(session('job_status') == 'Administrator' || session('job_status') == 'Cashier')
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Data Transaction</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-comunicacao-sub" >

                 <li id="menu-arquivos" ><a href="{{ url('/sales') }}">Sales</a></li>
                 <li id="menu-arquivos" ><a href="{{ url('/salesdet') }}">Sales Detail</a></li>
                
              </ul>
            </li>
            @endif 


             

<!--
            <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
                  <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
                 </ul>
             </li>


              <li><a href="maps.html"><i class="fa fa-map-marker"></i><span>Maps</span></a></li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Pages</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-academico-sub" >
                 <li id="menu-academico-boletim" ><a href="login.html">Login</a></li>
                <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>               
              </ul>
            </li>
            
            <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="inbox.html">Inbox</a></li>
                  <li id="menu-academico-boletim" ><a href="inbox-details.html">Compose email</a></li>
                 </ul>
            </li>
             <li><a href="#"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="404.html">404</a></li>
                  <li id="menu-academico-boletim" ><a href="blank.html">Blank</a></li>
                 </ul>
             </li>

-->
             <li class="nav-item has-treeview">
                <a class="nav-link" href="/logout">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>

             
          </ul>
        </div>
   </div>
  <div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
    <script src="{{ asset('/js/jquery.nicescroll.js')}}"></script>
    <script src="{{ asset('/js/scripts.js')}}"></script>
    <!--//scrolling js-->
<script src="{{ asset('/js/bootstrap.js')}}"> </script>
<!-- mother grid end here-->



</body>

@yield('tambahan')


</html>                     

