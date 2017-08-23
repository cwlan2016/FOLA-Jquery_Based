<?php
include("core.php"); 
if ($_GET['page'] == "tiang") { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Fiber Optik Lintasarta</title>
    <link rel="icon" type="image/png" href="dist/android-icon-192x192.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="dist/sweetalert.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      #map {
        height: 100%;
      }
    </style>
</head>
    <?php if (empty($uname)): ?>
<body>
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-md-offset-4">
                  <div class="login-panel panel panel-default">
                      <div class="panel-body">
                          <form id="form-login" action="javascript:void(0);">
                                <div class="form-group">
                                  <center><img src="dist/logo.png"></center>
                                  <div id="alert">
                                     <div class="alert alert-danger" id="gagal" style="display:none; text-align:center">
                                       <strong>404</strong> :
                                        Password / Username kamu salah.
                                     </div>
                                     <div class="alert alert-success" id="sukses" style="display:none; text-align:center">
                                       <strong>Login Berhasil!</strong><br>
                                        Tunggu untuk refresh halaman ...
                                     </div>
                                   </div>
                                </div>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Username Kamu" id="username" type="text" autofocus>
                                  </div>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Password Kamu" id="password" type="password" value="">
                                  </div>
                                  <div class="form-group">
                                    <div class="progress progress-striped active" id="proses-login" style="display:none;">
                                        <div class="progress-bar progress-bar-info" style="width: 100%"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary btn-block">Kirim Permintaan</button>
                                  </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <?php else: ?>
    <body onload="notif();">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../home"><img src="dist/logo.png" width="50%"></a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a></li>
                        <li><a href="index.php?page=tiang"><i class="fa fa-map-marker fa-fw"></i> Tiang Lintasarta</a></li>
                        <li><a href="#"><i class="fa fa-list-alt fa-fw"></i> OTB Central<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript:;" onclick="halaman('otbikt')">OTB IKT</a></li>
                                <li><a href="javascript:;" onclick="halaman('otbtku')">OTB TKU</a></li>
                                <li><a href="javascript:;" onclick="halaman('otbigs')">OTB IGS</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-list-alt fa-fw"></i> Splitter<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript:;" onclick="halaman('splitikt')">Splitter IKT</a></li>
                                <li><a href="javascript:;" onclick="halaman('splittku')">Splitter TKU</a></li>
                                <li><a href="javascript:;" onclick="halaman('splitigs')">Splitter IGS</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;" onclick="halaman('datapelanggan')"><i class="fa fa-list-alt fa-fw"></i> Data Pelanggan</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php 
                                      $query = mysqli_query($connect,"SELECT * FROM otb");
                                      echo mysqli_num_rows($query);
                                      ?>
                                    </div>
                                    <div>Jumlah OTB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php 
                                      $query = mysqli_query($connect,"SELECT * FROM splitter");
                                      echo mysqli_num_rows($query);
                                      ?>
                                    </div>
                                    <div>Jumlah Splitter</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php 
                                      $query = mysqli_query($connect,"SELECT * FROM datapelanggan");
                                      echo mysqli_num_rows($query);
                                      ?>
                                    </div>
                                    <div>Jumlah Pelanggan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" id="loading">
              <div class="col-lg-8 col-md-offset-2">
                <div class="progress progress-striped active" id="konten-loading" style="display:none;">
                    <div class="progress-bar progress-bar-info" style="width: 100%"></div>
                </div>
              </div>
            </div>
            <div class="row" id="konten-data">
                <div class="col-lg-8">
                  <div class="panel panel-default">
                      <div class="panel-body" style="height: 500px">
                        <div id="map"></div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Latitude</label>
                    <input id="txtLatitude" maxlength="11" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Longitude</label>
                    <input id="txtLongitude" maxlength="11" type="text" class="form-control">
                    <input id="txtLevel" type="text" size=3 value="3" hidden="true">
                  </div>
                  <div class="form-group">
                    <input type="button" value="Add Location" class="btn btn-primary" onclick="addLocationFromInput()"/>
                  </div>
                  <div class="form-group">
                    <select multiple class="form-control" id="locations" size="14" onchange="highlight(this.selectedIndex)"
        ondblclick="jumpToLocation()">
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-6">
                      <input type="button" class="btn btn-primary" value="Delete Selected" onclick="deleteLocation()"/>
                    </div>
                    <div class="col-lg-6">
                      <input type="button" class="btn btn-primary" value="Delete All" onclick="deleteAllLocations()"/>
                    </div>
                  </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lihatgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" id="modal-body">
                  <img id="gambar" src="image/default.jpg" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ubahgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                  <form id="myform" method="post">
                          <input type="text" id="hidden_id" hidden="true" />
                      <div class="form-group">
                          <label>Select file: </label>
                          <input class="form-control" type="file" id="myfile" />
                      </div>
                      <div class="form-group">
                          <div class="progress">
                              <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                          </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" id="btn" class="btn btn-success" value="Upload" />
                  </form>
                </div>
            </div>
        </div>
    </div>
  <?php endif; ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="sb-admin.js"></script>
    <script src="dist/sweetalert.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0yAKxfG_qB4p8DCP_VLbhniYICERatZI&callback=initialize"
  type="text/javascript"></script>
    <script src="google.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    </body>
</html>
<?php 
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Fiber Optik Lintasarta</title>
    <link rel="icon" type="image/png" href="dist/android-icon-192x192.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="dist/sweetalert.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      #map {
        height: 100%;
      }
    </style>
</head>
    <?php if (empty($uname)): ?>
<body>
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-md-offset-4">
                  <div class="login-panel panel panel-default">
                      <div class="panel-body">
                          <form id="form-login" action="javascript:void(0);">
                                <div class="form-group">
                                  <center><img src="dist/logo.png"></center>
                                  <div id="alert">
                                     <div class="alert alert-danger" id="gagal" style="display:none; text-align:center">
                                       <strong>404</strong> :
                                        Password / Username kamu salah.
                                     </div>
                                     <div class="alert alert-success" id="sukses" style="display:none; text-align:center">
                                       <strong>Login Berhasil!</strong><br>
                                        Tunggu untuk refresh halaman ...
                                     </div>
                                   </div>
                                </div>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Username Kamu" id="username" type="text" autofocus>
                                  </div>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Password Kamu" id="password" type="password" value="">
                                  </div>
                                  <div class="form-group">
                                    <div class="progress progress-striped active" id="proses-login" style="display:none;">
                                        <div class="progress-bar progress-bar-info" style="width: 100%"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary btn-block">Kirim Permintaan</button>
                                  </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <?php else: ?>
    <body onload="notif();">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../home"><img src="dist/logo.png" width="50%"></a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a></li>
                        <li><a href="index.php?page=tiang"><i class="fa fa-map-marker fa-fw"></i> Tiang Lintasarta</a></li>
                        <li><a href="#"><i class="fa fa-list-alt fa-fw"></i> OTB Central<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript:;" onclick="halaman('otbikt')">OTB IKT</a></li>
                                <li><a href="javascript:;" onclick="halaman('otbtku')">OTB TKU</a></li>
                                <li><a href="javascript:;" onclick="halaman('otbigs')">OTB IGS</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-list-alt fa-fw"></i> Splitter<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="javascript:;" onclick="halaman('splitikt')">Splitter IKT</a></li>
                                <li><a href="javascript:;" onclick="halaman('splittku')">Splitter TKU</a></li>
                                <li><a href="javascript:;" onclick="halaman('splitigs')">Splitter IGS</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;" onclick="halaman('datapelanggan')"><i class="fa fa-list-alt fa-fw"></i> Data Pelanggan</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php 
                                      $query = mysqli_query($connect,"SELECT * FROM otb");
                                      echo mysqli_num_rows($query);
                                      ?>
                                    </div>
                                    <div>Jumlah OTB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-database fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php 
                                      $query = mysqli_query($connect,"SELECT * FROM splitter");
                                      echo mysqli_num_rows($query);
                                      ?>
                                    </div>
                                    <div>Jumlah Splitter</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php 
                                      $query = mysqli_query($connect,"SELECT * FROM datapelanggan");
                                      echo mysqli_num_rows($query);
                                      ?>
                                    </div>
                                    <div>Jumlah Pelanggan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" id="loading">
              <div class="col-lg-8 col-md-offset-2">
                <div class="progress progress-striped active" id="konten-loading" style="display:none;">
                    <div class="progress-bar progress-bar-info" style="width: 100%"></div>
                </div>
              </div>
            </div>
            <div class="row" id="konten-data">
                <div class="col-lg-12">
                        <div class="form-group">
                        <div class="row">
                          <div class="col-lg-5">
                            <label>Latitude, Longitude</label>
                            <input id="lat" type="text" class="form-control" placeholder="Pisahkan Dengan Koma">
                          </div>
                          <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input id="submit" type="button" value="Cari Lokasi" class="btn btn-md btn-primary btn-block">
                          </div>
                          </div>
                        </div>
                    <div class="panel panel-default">
                        <div class="panel-body" style="height: 500px">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lihatgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" id="modal-body">
                  <img id="gambar" src="image/default.jpg" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ubahgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                  <form id="myform" method="post">
                          <input type="text" id="hidden_id" hidden="true" />
                      <div class="form-group">
                          <label>Select file: </label>
                          <input class="form-control" type="file" id="myfile" />
                      </div>
                      <div class="form-group">
                          <div class="progress">
                              <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                          </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" id="btn" class="btn btn-success" value="Upload" />
                  </form>
                </div>
            </div>
        </div>
    </div>
  <?php endif; ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="sb-admin.js"></script>
    <script src="dist/sweetalert.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAo3i49zgX7U8yog66BQAuE8nExjhgPYc&libraries=places&callback=initMap" async defer></script>
    <script type="text/javascript">
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -8.6704582, lng: 115.2126293}
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        document.getElementById('submit').addEventListener('click', function() {
          geocodeLatLng(geocoder, map, infowindow);
        });
      }

      function geocodeLatLng(geocoder, map, infowindow) {
        var input = document.getElementById('lat').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(17);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
    </script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    </body>
</html>
<?php } ?>