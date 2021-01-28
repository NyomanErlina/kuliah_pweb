@extends('layout/mainku')

@section('title', 'Dashboard')

@section('content')

<div class="card-body " style="background-color: #FFFFE0; width: 100%; height: 100%;">

<div class="chart-layer-2">

  <div class="col-md-6 chart-layer2-left">
    <div class="card-header" style="background-color: #808080 ; width: 600px; height: 100px;">
      <div class="col-md-3" style="padding: 5px 5px 5px 5px;">
        <img src="/images/dashboard-image.jpg" style="width: 150px; height: 90px;">
      </div>
      <div class="col-md-9" style="padding-right: 50px; padding-top: 7px;">
        <h1 class="judul-data" style="text-align: center; font-family: 'Bookman Old Style', serif; font-size: 22px; "><b style="color: white;"> WELCOME TO N.E.L.D STORE  <br> <input type="hidden" name="user_id" value="{{@session('user_id')}}"> {{@session('first_name')}} {{@session('last_name')}} ! </b></h1> 
      </div>
     
    </div>
  </div>

   <div class="col-md-6 chart-layer2-right">
     <!--climate start here-->
<div class="climate">
  <div class="col-md-8 climate-grids">
    <div class="climate-grid1" style="width: 450px; margin-left: 61px; margin-bottom: 0px;">
      <div class="climate-gd1-top" style="height: 100px; margin-bottom: 0px; ">
        <div class="col-md-6 climate-gd1top-left" style="width: 60%">
          <h4 id="date" ></h4>
          <h3 style="color: white;" id="time" ></h3> 
          
            
          
          <script type="text/javascript">
              $(document).ready( function() {
                var date_now = new Date();
                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
                var month = monthNames[date_now.getMonth()];
                var day = date_now.getDate();
                if (day < 10) 
                    day = "0" + day;
                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                var dayName = days[date_now.getDay()];
                var today = dayName+ ", "+ day + " " + month + " " + date_now.getFullYear();
                var date = document.getElementById('date');
                date.innerHTML=today;

              });   

            var today= new Date();
            var minute = today.getMinutes();
            if ( minute < 10) 
                minute = "0" + minute;
            var time = today.getHours() + ":" + minute;
            document.getElementById('time').innerHTML=time;


          </script>
   
        </div>
        <div class="col-md-6 climate-gd1top-right" style="width: 40%; padding-left: 100px " >
            <span class="clime-icon"> 
              <figure class="icons">
                <canvas id="partly-cloudy-day" width="64" height="64">
                </canvas>
              </figure>
            <script>
               var icons = new Skycons({"color": "#fff"}),
                  list  = [
                  "clear-night", "partly-cloudy-day",
                  "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                  "fog"
                  ],
                  i;

                for(i = list.length; i--; )
                icons.set(list[i], list[i]);

                icons.play();
            </script>           
           </span>          
      
        </div>
      
      </div>
     
    </div>
  </div>
 
 
  <div class="clearfix"> </div>
</div>
<!--climate end here-->
  </div>
  <div class="clearfix"> </div>
</div>





    <div class="market-updates">
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-1">
          <div class="col-md-8 market-update-left">
            <h3 style="font-size: 28px; padding-bottom: 10px;">{{ $total_product }} </h3>
            <h4>Total Produk Terjual</h4>
            <!--<p>Other hand, we denounce</p>-->
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
          <h3 style="font-size: 24px; padding-bottom: 10px;">
          Rp{{ number_format($total_penjualan,2,',','.') }}</h3>
          <h4>Total Penjualan</h4>
          <!--<p>Bulan ini</p>-->
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
            <h3 style="font-size: 28px; padding-bottom: 10px;">{{ $jml_customer }}</h3>
            <h4>Customer Terdaftar</h4>
            <!--<p>Other hand, we denounce</p>-->
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
<br>
<!--main page chart start here-->
<div class="main-page-charts">
   <div class="main-page-chart-layer1">
    <div class="col-md-6 chart-layer1-left"> 
      <div class="glocy-chart">
      <div class="span-2c">  
                        <h3 class="tlt">Jumlah Produk Terjual Tahun 2020 </h3>
                        <br>
                        <script type="text/javascript" src="{{ asset('/js/Chart.js')}}"></script>
                         <canvas id="barChart" height="300" width="400" ></canvas>
                        <script>
                          var product_jan = <?php echo json_decode($product_jan); ?>;
                            var product_feb = <?php echo json_decode($product_feb); ?>;
                            var product_mar = <?php echo json_decode($product_mar); ?>;
                            var product_apr = <?php echo json_decode($product_apr); ?>;
                            var product_may = <?php echo json_decode($product_may); ?>;
                          Chart.defaults.global.legend.display = false;
                          var konteks = document.getElementById("barChart").getContext('2d');
                          var myChart = new Chart(konteks, {
                            type: 'bar',
                            data: {
                              labels: ["Jan","Feb","Mar","Apr","May"],
                              datasets: [{
                                //label: '',
                                data: [product_jan,product_feb,product_mar,product_apr,product_may],
                                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(75, 192, 192, 0.2)',    
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 3
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero:true
                                  }
                                }]
                              }
                            }
                          });
                        </script>
                   
            </div>                    
      </div>
    </div>
    <div class="col-md-6 chart-layer1-right"> 
       <div class="prograc-blocks">
         <!--Progress bars-->
          <div class="home-progres-main">
             <h3>Kategori Produk Berdasarkan Penjualan</h3>
           </div>
             <script type="text/javascript" src="{{ asset('/js/Chart.js')}}"></script>
        
              <canvas id="myChart" height="286" width="400"></canvas>
          
           <br><br>
           
            <script>
              var makanan = <?php echo json_decode($makanan); ?>;
              var minuman= <?php echo json_decode($minuman); ?>;
              var pakaian_wnt = <?php echo json_decode($pakaian_wnt); ?>;
              var pakaian_pria = <?php echo json_decode($pakaian_pria); ?>;
              var ctx = document.getElementById("myChart").getContext('2d');

              var myChart = new Chart(ctx, {
                type: 'doughnut',
                  data: {
                   labels: [
                            "Makanan",
                            "Minuman",
                            "Pakaian Wanita",
                            "Pakaian Pria"
                    
                        ],
                        datasets: [
                            {
                                data: [makanan, minuman, pakaian_wnt, pakaian_pria],
                               /* backgroundColor: [
                                    "#FF6384",
                                    "#63FF84",
                                    "#84FF63",
                                    "#8463FF",
                                   
                                ]
                                */
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(255,150,0,0.5)'
                                  ],
                                  borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'orange'
                                  ]
                               
                            }]
                            
                }
              });
             
            </script>
                 

        <!--//Progress bars-->
        </div>
    </div>

   <div class="clearfix"> </div>
  </div>

 </div>
<!--main page chart layer2-->
<div class="chart-layer-2">
  
  <div class="col-md-8 chart-layer2-right" style="margin-left: 195px;">
      <div class="prograc-blocks">
         <!--Progress bars-->
         <div class="home-progres-main col-md-6" >
             <h3>Grafik Penjualan</h3>
           </div>
           <div class="col-md-6" style="padding-left: 145px;">
                <a href="{{ url('/dashboard/cetak_pdf') }}" class="btn btn-pdf"  ><b style="color: black;"><img style="width: 15px; height: 15px; padding-right: 2px;" src="{{ asset('/images/icon-download.png')}}"> Generate Laporan</b></a>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                  -->
           </div>

           <script type="text/javascript" src="{{ asset('/js/Chart.js')}}"></script>
         
              <canvas id="line-chart"></canvas>
        
           
           
            <script>
              var context = $("#line-chart");
              var total_jan = <?php echo json_decode($total_jan); ?>;
              var total_feb = <?php echo json_decode($total_feb); ?>;
              var total_mar = <?php echo json_decode($total_mar); ?>;
              var total_apr = <?php echo json_decode($total_apr); ?>;
              var total_may = <?php echo json_decode($total_may); ?>;

              var lineChart = new Chart(context, {
                type: 'line',
                data: {
                  labels: ["Jan", "Feb", "Mar", "Apr", "May"],
                  datasets: [
                    {
                      label: "2020",
                      data: [total_jan,total_feb,total_mar,total_apr,total_may],
                      borderColor: 'orange',
                      backgroundColor: 'rgba(255,150,0,0.5)',
                      pointBorderColor: 'orange',
                      pointBackgroundColor: 'rgba(255,150,0,0.5)',
                      pointRadius: 4,
                      pointHoverRadius: 10,
                      pointHitRadius: 30,
                      pointBorderWidth: 2,
                      pointStyle: 'rectRounded'
                     
                    }
                  ]
                }
              });
              
            </script>

        <!--//Progress bars-->
        </div>
  </div>
  
  <div class="clearfix"> </div>
</div>



          
     </div>


@endsection






