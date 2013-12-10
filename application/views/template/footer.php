    <footer style="height: auto !important; text-align:center">
      <p>
        Hakcipta terpelihara © 2013 - 2020. Jabatan Kerja Raya Malaysia.<br />
Sesuai dilayari dengan menggunakan Google Crome, Mozilla Firefox versi 3 atau Internet Explorer versi 8 di atas (dengan resolusi 1024x768).
      </p>
    </footer>

    <script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
	<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url() . 'asset/'; ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.scrollUp.js"></script>
    <script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'asset/'; ?>js/date-picker/date.js"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'asset/'; ?>js/date-picker/daterangepicker.js"></script>
    <!-- Google Visualization JS -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
   	<!-- Sparkline JS -->
	<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.sparkline.js"></script>
    <!-- Tiny Scrollbar JS -->
	<script src="<?php echo base_url() . 'asset/'; ?>js/tiny-scrollbar.js"></script>
  <script src="<?php echo base_url() . 'asset/'; ?>js/jquery.dataTables.js">
    </script>
     
    <script type="text/javascript" src="<?php echo base_url() . 'asset/'; ?>js/alertify.min.js"></script>

<script src="<?php echo base_url() . 'asset/'; ?>js/jquery-ui.js"></script>
    <script>
   $(function() {
      var elem = document.createElement('input');
      elem.setAttribute('type', 'date');

      if ( elem.type === 'text' ) {
         $('#date').datepicker({
            dateFormat: 'yy-mm-dd',
            // defaultDate: +5
           // maxDate : +3
         }); 
      }

      if ( elem.type === 'text' ) {
         $('#date2').datepicker({
            dateFormat: 'yy-mm-dd',
            // defaultDate: +5
           // maxDate : +3
         }); 
      }
   })();

</script>
    
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Skrol Atas', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });

     //

     //Data Tables
      $(document).ready(function () {
        $('#data-table').dataTable({
          "sPaginationType": "full_numbers"
        });
      });
      $(document).ready(function () {
        $('#data-table2').dataTable({
          "sPaginationType": "full_numbers"
        });
      });
$(document).ready(function () {
        $('#data-table3').dataTable({
          "sPaginationType": "full_numbers"
        });
      });
      jQuery('.delete-row').click(function () {
        var conf = confirm('Continue delete?');
        if (conf) jQuery(this).parents('tr').fadeOut(function () {
          jQuery(this).remove();
        });
          return false;
        });
     
      //edited by yan,seri,fatin,zura-8/7/13
      $('#wysiwyg').wysihtml5();
      $('#wysiwyg2').wysihtml5();
      $('#wysiwyg3').wysihtml5();
      $('#wysiwyg4').wysihtml5();
      $('#wysiwyg5').wysihtml5();
      $('#wysiwyg6').wysihtml5();
      $('#wysiwyg7').wysihtml5();

     //wysiwyg for ukuran dan sasaran
	 $('#wysiwyg8').wysihtml5();
      $('#wysiwyg9').wysihtml5();
      $('#wysiwyg10').wysihtml5();
      $('#wysiwyg11').wysihtml5();
      $('#wysiwyg12').wysihtml5();
	  $('#wysiwyg13').wysihtml5();
      $('#wysiwyg14').wysihtml5();
      $('#wysiwyg15').wysihtml5();
      $('#wysiwyg16').wysihtml5();
      $('#wysiwyg17').wysihtml5();
	   $('#wysiwyg18').wysihtml5();
      $('#wysiwyg19').wysihtml5();
      $('#wysiwyg20').wysihtml5();
      $('#wysiwyg21').wysihtml5();
      $('#wysiwyg22').wysihtml5();
	   $('#wysiwyg23').wysihtml5();
      $('#wysiwyg24').wysihtml5();
      $('#wysiwyg25').wysihtml5();
      $('#wysiwyg26').wysihtml5();
      

      google.load("visualization", "1", {
        packages: ["corechart"]
      });

      $(document).ready(function () {
        drawChart1();
        drawChart2();
      })

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Week', 'product-1', 'product-2', 'product-3', 'product-4'],
          ['Sun', 300, 1900, 900, 2900],
          ['Mon', 1170, 3860, 1220, 1564],
          ['Tue', 260, 1120, 2870, 2340],
          ['Wed', 1030, 540, 3830, 1200],
          ['Thu', 200, 700, 1700, 770],
          ['Fri', 700, 1200, 2200, 2870],
          ['Sat', 1170, 2160, 3920, 800], ]);

        var options = {
          width: 'auto',
          height: '200',
          backgroundColor: 'transparent',
          colors: ['#b5799e', '#579da9', '#e26666', '#1e825e', '#dba26b'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 60,
            top: 10,
            height: '80%'
          },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
        chart.draw(data, options);
      }


      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Google+', 'Facebook'],
          ['2005', 90, 30],
          ['2006', 400, 200],
          ['2007', 1050, 320],
          ['2008', 1940, 550],
          ['2009', 2910, 770],
          ['2010', 970, 1960],
          ['2011', 1660, 2520],
          ['2012', 1030, 3940]
          ]);

        var options = {
          width: 'auto',
          pointSize: 7,
          lineWidth: 1,
          height: '180',
          backgroundColor: 'transparent',
          colors: ['#b5799e', '#579da9', '#e26666', '#1e825e', '#dba26b'],
          tooltip: {
            textStyle: {
              color: '#666666',
              fontSize: 11
            },
            showColorCode: true
          },
          legend: {
            textStyle: {
              color: 'black',
              fontSize: 12
            }
          },
          chartArea: {
            left: 40,
            top: 10,
            height: "80%"
          }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('area_chart'));
        chart.draw(data, options);
      }

      //Tooltip
      $('a').tooltip('hide');
      $('i').tooltip('hide');

       //Popover
      $('.popover-pop').popover('hide');
      
       //Collapse
      $('#myCollapsible').collapse({
        toggle: false
      })

      //Tiny Scrollbar
      $('#scrollbar').tinyscrollbar();
      $('#scrollbar-one').tinyscrollbar();
      $('#scrollbar-two').tinyscrollbar();
      $('#scrollbar-three').tinyscrollbar();
      //edited by yan,seri,fatin,zura-8/7/13
          $('#scrollbar1').tinyscrollbar();
          $('#scrollbar2').tinyscrollbar();
          $('#scrollbar3').tinyscrollbar();
          $('#scrollbar4').tinyscrollbar();
          $('#scrollbar5').tinyscrollbar();
          $('#scrollbar6').tinyscrollbar();
          $('#scrollbar7').tinyscrollbar();
          $('#scrollbar8').tinyscrollbar();
          $('#scrollbar9').tinyscrollbar();
          $('#scrollbar10').tinyscrollbar();



      //Tabs
      $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      })

      // SparkLine Graphs-Charts
      $(function () {
        $('#unique-visitors').sparkline('html', {
          type: 'bar',
          barColor: '#e26666',
          barWidth: 6,
          height: 30,
        });
        $('#monthly-sales').sparkline('html', {
          type: 'bar',
          barColor: '#b5799e',
          barWidth: 6,
          height: 30,
        });
        $('#current-balance').sparkline('html', {
          type: 'bar',
          barColor: '#579da9',
          barWidth: 6,
          height: 30,
        });
        $('#registrations').sparkline('html', {
          type: 'bar',
          barColor: '#dba26b',
          barWidth: 6,
          height: 30,
        });
      });


      //Range Date Picker

      $('.report_range').daterangepicker({
        ranges: {
          'Today': ['today', 'today'],
          'Yesterday': ['yesterday', 'yesterday'],
          'Last 7 Days': [Date.today().add({
            days: -6
          }), 'today'],
          'Last 30 Days': [Date.today().add({
            days: -29
          }), 'today'],
          'This Month': [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
          'Last Month': [Date.today().moveToFirstDayOfMonth().add({
            months: -1
          }), Date.today().moveToFirstDayOfMonth().add({
            days: -1
          })]
        },
        opens: 'left',
        format: 'MM/dd/yyyy',
        separator: ' to ',
        startDate: Date.today().add({
          days: -29
        }),
        endDate: Date.today(),
        minDate: '01/01/2012',
        maxDate: '12/31/2013',
        locale: {
          applyLabel: 'Submit',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom Range',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          firstDay: 1
        },
        showWeekNumbers: true,
        buttonClasses: ['btn-danger']
      },

      function (start, end) {
        $('.report_range span').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));
      });

      //Set the initial state of the picker label
      $('.report_range span').html(Date.today().add({
        days: -29
      }).toString('MMMM d, yyyy') + ' - ' + Date.today().toString('MMMM d, yyyy'));


      //Main menu navigation
      
      $('.submenu > a').click(function(e){
        e.preventDefault();
        var submenu = $(this).siblings('ul');
        var li = $(this).parents('li');
        var submenus = $('#mainnav li.submenu ul');
        var submenus_parents = $('#mainnav li.submenu');
        if(li.hasClass('open'))
        {
          if(($(window).width() > 768) || ($(window).width() < 479)) {
            submenu.slideUp();
          } else {
            submenu.fadeOut(250);
          }
          li.removeClass('open');
        } else 
        {
          if(($(window).width() > 768) || ($(window).width() < 479)) {
            submenus.slideUp();     
            submenu.slideDown();
          } else {
            submenus.fadeOut(250);      
            submenu.fadeIn(250);
          }
          submenus_parents.removeClass('open');   
          li.addClass('open');  
        }
      });
      
      var ul = $('#mainnav > ul');
      
      $('#mainnav > a').click(function(e)
      {
        e.preventDefault();
        var mainnav = $('#mainnav');
        if(mainnav.hasClass('open'))
        {
          mainnav.removeClass('open');
          ul.slideUp(250);
        } else 
        {
          mainnav.addClass('open');
          ul.slideDown(250);
        }
      });

      </script>
      
      
    </body>
    </html>
