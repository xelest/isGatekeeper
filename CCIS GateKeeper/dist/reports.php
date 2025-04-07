<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCIS | </title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

    <link href="assets/vendor/airdatepicker/dist/css/datepicker.min.css" rel="stylesheet">


    
  <script src="js/script_date_time.js"></script>

</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-7"><h3>Dashboard </h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time">asd</span></div></div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-3 col-md-4">
                                <div class="row">
                                    <div class="col-6" style="padding: 3px;">
                                        <input type="text" class="form-control datepicker-here" data-range="true" data-multiple-dates-separator="-" id="myTextbox" data-language="en" data-position="bottom left" aria-describedby="daterange" placeholder="Date Range">
                                    </div>
                                    <div class="col-4" style="padding: 3px;">
                                        <input type="text" class="form-control" data-range="false" data-multiple-dates-separator="-" id="myTextbox2" data-language="en" data-position="bottom left" aria-describedby="daterange" placeholder="ID No.">
                                    </div>
                                    <div class="col-2" style="padding: 3px;">
                                        <button class="btn btn-primary" id="test" onClick="test()"> TESTTESTTEST </button>
                                    </div>
  
                            </div>

                    </div>
                    <div class="col-5 col-md-4"></div>
                     <div class="col-5 col-md-4">
                        <div class="row">
                            <div class="col-6">
                            <select class="form-control">
                              <option>Default select</option>
                            </select></div>

                            <div class="col-6">
                            <select class="form-control">
                              <option>Default select</option>
                            </select></div>
                        </div>
                         </div> 
                </div>
                <div class="row">
                    

                </div>
            </div>

        </div>

    </div>

    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>


    <script src="assets/js/fullcalendar-script.js"></script>
        <script src="assets/vendor/airdatepicker/dist/js/datepicker.min.js"></script>
    <script src="assets/vendor/airdatepicker/dist/js/i18n/datepicker.en.js"></script>

    <script>
        
        $('#myTextbox').on('input', function() {
            var x = document.getElementById("myTextbox").value; 
            alert(x);
        });

        $('#myTextbox2').on('input', function() {
            var y = document.getElementById("myTextbox2").value;
        });

         
        function test()
        {
             var y = document.getElementById("myTextbox2").value; 
             alert(y);
        }

    </script>

</body>

</html>