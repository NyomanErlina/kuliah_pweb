@extends('layout/mainku')

@section('title', 'Dashboard')

@section('content')

<!--market updates updates-->
   <div class="market-updates">
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-1">
          <div class="col-md-8 market-update-left">
            <h3>83</h3>
            <h4>Registered User</h4>
            <p>Other hand, we denounce</p>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-file-text-o"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-2">
         <div class="col-md-8 market-update-left">
          <h3>135</h3>
          <h4>Daily Visitors</h4>
          <p>Other hand, we denounce</p>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-eye"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-3">
          <div class="col-md-8 market-update-left">
            <h3>23</h3>
            <h4>New Messages</h4>
            <p>Other hand, we denounce</p>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-envelope-o"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
       <div class="clearfix"> </div>
    </div>
<!--market updates end here-->

<!--main page chart start here-->
<div class="main-page-charts">
   <div class="main-page-chart-layer1">
    <div class="col-md-6 chart-layer1-left"> 
      <div class="glocy-chart">
      <div class="span-2c">  
                        <h3 class="tlt">Sales Analytics</h3>
                        <canvas id="bar" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
                        <script>
                            var barChartData = {
                            labels : ["Jan","Feb","Mar","Apr","May","Jun","jul"],
                            datasets : [
                                {
                                    fillColor : "#FC8213",
                                    data : [65,59,90,81,56,55,40]
                                },
                                {
                                    fillColor : "#337AB7",
                                    data : [28,48,40,19,96,27,100]
                                }
                            ]

                        };
                            new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

                        </script>
                    </div>                    
      </div>
    </div>
    <div class="col-md-6 chart-layer1-right"> 
      <div class="user-marorm">
      <div class="malorum-top">       
      </div>
      <div class="malorm-bottom">
        <span class="malorum-pro"> </span>
           <h4>Business Woman</h4>
         <h2>Nyoman Erlina Lani Diana</h2>
        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising.</p>
        <ul class="malorum-icons">
          <li><a href="#"><i class="fa fa-facebook"> </i>
            <div class="tooltip"><span>Facebook</span></div>
          </a></li>
          <li><a href="#"><i class="fa fa-twitter"> </i>
            <div class="tooltip"><span>Twitter</span></div>
          </a></li>
          <li><a href="#"><i class="fa fa-google-plus"> </i>
            <div class="tooltip"><span>Google</span></div>
          </a></li>
        </ul>
      </div>
       </div>
    </div>
   <div class="clearfix"> </div>
  </div>
 </div>
<!--main page chart layer2-->

    
@endsection