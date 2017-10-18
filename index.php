<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("button").click(function(){
            $.ajax({url: "//api.pse.tools/api/stock/v2/APX", success: function(result){
                // $("#div1").html(result);
                 var targetPrice = document.getElementById('targetPrice').value;
                var sharesNumber = document.getElementById('sharesNumber').value;
                
                var computedCurrentPrice = sharesNumber * result.last;
                var computedTargetPrice = sharesNumber * targetPrice;

                 document.getElementById('computedCurrentPriceLabel').innerHTML = computedCurrentPrice;
                 document.getElementById('computedTargetPriceLabel').innerHTML = computedTargetPrice;
            }});
        });
    });

    </script>
    <?php include 'php_script.php'; ?>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>Basic Panel</h2>
        <div class="panel panel-default col-md-3">
            <div class="panel-body">
                This is the sidebar
            </div>
        </div>
        <div class="panel panel-default col-md-9">
            <div class="panel-body">
                This is the main container<br/>
                <?php
                    $callApi = new ApiCall();
                    $jsonResponse = $callApi->getResponse();
                    $response = json_decode($callApi->getResponse(), true);
                ?>
                <span>Symbol: <?php echo $response['symbol']; ?></span><br/>
                <span>Name: <?php echo $response['name']; ?></span><br/>
                <span>Last price: <?php echo $response['last']; ?></span><br/>
                <span>Highest price: <?php echo $response['high']; ?></span><br/>
                <span>Lowest price: <?php echo $response['low']; ?></span><br/>
                <span>Average price: <?php echo $response['average']; ?></span><br/>

                Price: <input type="text" id="targetPrice" /><br/>
                Number of Shares: <input type="text" id="sharesNumber" /><br/>
                 <button onclick="compute()" value="Compute">Click me</button> 
                 <button id="testbtn" value="Compute">Click me</button> <br/>

                  Computed current price: <label id="computedCurrentPriceLabel"></label><br/>
                  Computed price as projected: <label id="computedTargetPriceLabel"></label><br/>
                
                <div id="div1"></div>

                <script>
                   
                </script>
            </div>
        </div>
    </div>

  </body>
</html>