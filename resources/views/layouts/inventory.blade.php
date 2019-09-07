<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="css/admin_style.css">
  <title>Inventory</title>
</head>
<body>
  <div class="page-content-body-wrapper">
      <div class="row info-cards-wrapper">
          <!-- Info-Cards-Wrapper -->
          <div class="col-xl-3 col-md-6  mb-2">
              <!-- Info-Card-Start -->
              <div class="info-card-container">
                  <div class=" info-card-header row">
                      <!-- <div class="col-3 info-card-icon">
                          <i class="material-icons info-card-icon-customized">attach_money</i>
                      </div> -->
                      <div class="col-9 info-card-title" align="right">
                          <h1>Total SKUs</h1>
                      </div>
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-10 info-card-footer">
                          <h3>10,000</h3>
                      </div>
                  </div>
              </div>
          </div><!-- Info-card-End -->
          <div class="col-xl-3 col-md-6  mb-2">
              <!-- Info-Card-Start -->
              <div class="info-card-container">
                  <div class=" info-card-header row">
                      <!-- <div class="col-3 info-card-icon">
                          <i class="material-icons info-card-icon-customized">attach_money</i>
                      </div> -->
                      <div class="col-9 info-card-title" align="right">
                          <h1>Total Qty</h1>
                      </div>
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-10 info-card-footer">
                          <h3>10,000</h3>
                      </div>
                  </div>
              </div>
          </div><!-- Info-card-End -->
          <div class="col-xl-3 col-md-6  mb-2">
              <!-- Info-Card-Start -->
              <div class="info-card-container">
                  <div class=" info-card-header row">
                      <!-- <div class="col-3 info-card-icon">
                          <i class="material-icons info-card-icon-customized">attach_money</i>
                      </div> -->
                      <div class="col-9 info-card-title" align="right">
                          <h1>Low Stocks</h1>
                      </div>
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-10 info-card-footer">
                          <h3>10,000</h3>
                      </div>
                  </div>
              </div>
          </div><!-- Info-card-End -->
          <div class="col-xl-3 col-md-6  mb-2">
              <!-- Info-Card-Start -->
              <div class="info-card-container">
                  <div class=" info-card-header row">
                      <!-- <div class="col-3 info-card-icon">
                          <i class="material-icons info-card-icon-customized">attach_money</i>
                      </div> -->
                      <div class="col-9 info-card-title" align="right">
                          <h1>Expired</h1>
                      </div>
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-10 info-card-footer">
                          <h3>10,000</h3>
                      </div>
                  </div>
              </div>
          </div><!-- Info-card-End -->
      </div>

  @yield('content')
</body>
</html>
