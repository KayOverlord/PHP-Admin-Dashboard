<?php 
include 'config.php';
$result=''; 

$orders = mysqli_query($conn,"SELECT*FROM orders") ;
$orderNumrows = mysqli_num_rows($orders);

$servicing = mysqli_query($conn,"SELECT * FROM servicing");
$servicingNumrows = mysqli_num_rows($servicing);

$brandT = mysqli_query($conn,"SELECT * FROM products WHERE product_title = 'Toyota' ");
$brandTnum = mysqli_num_rows($brandT);

$brandV = mysqli_query($conn,"SELECT * FROM products WHERE product_title = 'Volkswagen' ");
$brandVnum = mysqli_num_rows($brandV);

$brandA = mysqli_query($conn,"SELECT * FROM products WHERE product_title = 'Audi' ");
$brandAnum = mysqli_num_rows($brandA);

$query = "SELECT user_time, count(*) as number FROM user_info GROUP BY user_time";  
$result = mysqli_query($conn, $query); 

$queryC = "SELECT COUNT(*) FROM user_info ";  
$resultC = mysqli_query($conn, $queryC); 



?>
<!doctype html>
<html lang="en">
  <head>
    <title>Motoserve</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript" >

 google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);


 function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Table');
    data.addColumn('number', 'Rows');
    data.addRows([
      ['Car Parts',<?=$orderNumrows; ?>],
      ['Car Servicing',<?=$servicingNumrows; ?>],
    ]);

    // Set chart options
    var options = {'title':'Motoserve Site Activity',
                   'width':800,
                   'height':900,
                   'is3D': true};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    google.visualization.events.addListener(chart, 'ready', function () {
    btnSave.disabled = false;
  });
  



// Create the data table.
var bdata = new google.visualization.DataTable();
bdata.addColumn('string', 'Brand');
bdata.addColumn('number', 'Products sold');
bdata.addRows([
  ['Toyota',<?=$brandTnum; ?>],
  ['Volkswagen',<?=$brandVnum; ?>],
  ['Audi',<?=$brandAnum; ?>],
]);

// Set chart options
var options = {'title':'Motoserve Product Sales',
               'width':800,
               'height':900,
               };

// Instantiate and draw our chart, passing in some options.
var bchart = new google.visualization.BarChart(document.getElementById('bchart_div'));
bchart.draw(bdata, options);
google.visualization.events.addListener(bchart, 'ready', function () {
    btnSave.disabled = false;
  });

  var ldata = google.visualization.arrayToDataTable([  
                          ['Date', 'Users'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["user_time"]."', ".$row["number"]."],";  
                          }  
                          ?> 
                          
                     ]);  
                var options = {  
                  title: 'User Registration',
                  'width':800,
                  'height':700,
                  hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
                  vAxis: {minValue: 0}
                     };  
                var lchart = new google.visualization.AreaChart(document.getElementById('piechart'));  
                lchart.draw(ldata, options);  
                google.visualization.events.addListener(lchart, 'ready', function () {
    btnSave.disabled = false;
  });

  var btnSave = document.getElementById('save-pdf');
btnSave.addEventListener('click', function () {
    var doc = new jsPDF();
    doc.setFontSize(40);
    doc.text(70, 40, 'MotoServe');

    doc.setFontSize(13);
    doc.text(24, 80, 'MotoServes a trademark of Online Car Parts (PTY) Ltd. Any logos or emblems or');
    doc.text(24,85,'trademarks displayed on this website are the property of their respective trademark');
     doc.text(24,90,'holders. These trademarks are for information purposes only. Note - Manufacturer');
      doc.text(24,95,'names and OE numbers are used strictly for identification of the correct aftermarket');
       doc.text(24,100,'parts and does not imply that the product is Genuine OEM unless specifically stated.');
    doc.addPage();
    
   doc.addImage(chart.getImageURI(), 0, 0);
   doc.addPage();

    doc.addImage(bchart.getImageURI(),0, 0);
    doc.addPage();

    doc.addImage(lchart.getImageURI(),0, 0);
    

    doc.save('motoservereport.pdf');
  });
}

    </script>
  <body class="bg-dark">
  <ul class="nav nav-tabs nav-stacked bg-light">
      <li class="nav-item">
          <a href="main.php"  class="nav-link">|ADD/UPDATE user|</a>
      </li>
      <li class="nav-item">
        <a href="product.php" class="nav-link">|ADD/UPDATE products|</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link active">|UPDATE services|</a>
      </li>
      
      <li class="nav-item ">
        <a href="orders.php" class="nav-link ">|UPDATE orders|</a>
      </li>

       <li class="nav-item">
        <a href="Towing.php" class="nav-link">|UPDATE towing|</a>
      </li>
     
      <li class="nav-item ">
        <a href="Cart.php" class="nav-link">|UPDATE cart|</a>
      </li>
	  <li class="nav-item">
        <a href="FeedBack.php" class="nav-link">|UPDATE feedback|</a>
      </li>
      <li class="nav-item">
        <a href="Payment.php"class="nav-link">|UPDATE payment|</a>
      </li>
      <li class="nav-item">
        <a href="Reports.php" class="nav-link active"><img src="./upload/33-dashboard-chart-report-annual-512.png" width="30" height="30"/></a>
      </li>
	  <li class="nav-item">
        <a href="../index.php" class="nav-link">|log out|</a>
      </li>
    </ul>
    <button type="button" id="save-pdf" value="Save as PDF" class="btn btn-success btn-lg w-100">
        Download Report
    </button>
    <div class="offset-2 pl-5 pt-2 ">
   
    <table class="table">
        
      <tr>
        <tr><div id="chart_div" ></div></tr>
        <tr><div id="bchart_div" ></div></tr>
        <tr><div id="piechart"></div></tr>
      </tr>
    </table>
    
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>