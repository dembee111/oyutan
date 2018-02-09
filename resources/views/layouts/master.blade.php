<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Сургууль Менежмент</title>

  {!! Html::style('website/css/bootstrap.min.css') !!}
  {!! Html::style('website/css/bootstrap-theme.css') !!}
  {!! Html::style('website/css/elegant-icons-style.css') !!}
  {!! Html::style('website/css/font-awesome.min.css') !!}
  {!! Html::style('website/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') !!}
  {!! Html::style('website/assets/fullcalendar/fullcalendar/fullcalendar.css') !!}
  {!! Html::style('website/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') !!}
  {!! Html::style('website/css/owl.carousel.css') !!}
  {!! Html::style('website/css/jquery-jvectormap-1.2.2.css') !!}
  {!! Html::style('website/css/fullcalendar.css') !!}
  {!! Html::style('website/css/widgets.css') !!}
  {!! Html::style('website/css/style.css') !!}
  {!! Html::style('website/css/style-responsive.css') !!}
  {!! Html::style('website/css/xcharts.min.css') !!}
  {!! Html::style('website/css/jquery-ui-1.10.4.min.css') !!}
  @yield('style')
</head>
<body>

   <section id="container" class="">
     @include('layouts.header.header')
     @include('layouts.sidebars.sidebar')
     <section id="main-content">
          
     </section>
   </section>

  {!! Html::script('website/js/jquery.js') !!}
  {!! Html::script('website/js/jquery-ui-1.10.4.min.js') !!}
  {!! Html::script('website/js/jquery-1.8.3.min.js') !!}
  {!! Html::script('website/js/jquery-ui-1.9.2.custom.min.js') !!}
  {!! Html::script('website/js/bootstrap.min.js') !!}
  {!! Html::script('website/js/jquery.scrollTo.min.js') !!}
  {!! Html::script('website/js/jquery.nicescroll.js') !!}
  {!! Html::script('website/assets/jquery-knob/js/jquery.knob.js') !!}
  {!! Html::script('website/js/jquery.sparkline.js') !!}
  {!! Html::script('website/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') !!}
  {!! Html::script('website/js/owl.carousel.js') !!}
  {!! Html::script('website/js/fullcalendar.min.js') !!}
  {!! Html::script('website/assets/fullcalendar/fullcalendar/fullcalendar.js') !!}
  {!! Html::script('website/js/calendar-custom.js') !!}
  {!! Html::script('website/js/jquery.rateit.min.js') !!}
  {!! Html::script('website/js/jquery.customSelect.min.js') !!}
  {!! Html::script('website/assets/chart-master/Chart.js') !!}
  {!! Html::script('website/js/scripts.js') !!}
  {!! Html::script('website/js/sparkline-chart.js') !!}
  {!! Html::script('website/js/easy-pie-chart.js') !!}
  {!! Html::script('website/js/jquery-jvectormap-1.2.2.min.js') !!}
  {!! Html::script('website/js/jquery-jvectormap-world-mill-en.js') !!}
  {!! Html::script('website/js/xcharts.min.js') !!}
  {!! Html::script('website/js/jquery.autosize.min.js') !!}
  {!! Html::script('website/js/jquery.placeholder.min.js') !!}
  {!! Html::script('website/js/gdp-data.js') !!}
  {!! Html::script('website/js/morris.min.js') !!}
  {!! Html::script('website/js/sparklines.js') !!}
  {!! Html::script('website/js/charts.js') !!}
  {!! Html::script('website/js/jquery.slimscroll.min.js') !!}

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
</body>
</html>
