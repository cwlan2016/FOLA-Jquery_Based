    function notif() {
      swal("Berhasil Login!", "Selamat Datang", "success");
    }
    $('#form-login').on("submit",function() { login(); });
    function ke_halaman_user() {
                  window.location = "";
                };
    function login() {
    var username = $('#username').val();
    var password = $('#password').val();
    $('#alert').hide();
    $('#gagal').hide();
    $('#proses-login').fadeIn();
     $.ajax({
       url: 'Auth/index.php',
       type: "POST",
       dataType: "html",
       data: "username="+username+"&password="+password,
       success: function(r) {
           $('#proses-login').fadeOut('slow');
           $('#alert').fadeIn();
           if(r == "success") {
           $('#sukses').fadeIn();
           setTimeout(function() { ke_halaman_user(); }, 1500);
         } else {
           $('#gagal').fadeIn();
         }
       },
    });
    }
    function halaman(data) {
    $('#loading').fadeIn();
    $('#konten-data').fadeOut();
    setTimeout(function() {
    $('#konten-loading').fadeIn();
    }, 2000);
     $.ajax({
       url: 'page/'+data+'.php',
       type: "GET",
       dataType: "html",
       success: function(r) {
           $('#loading').fadeOut();
           $('#konten-loading').fadeOut('fast');
           setTimeout(function() {
            $('#konten-data').html(r); 
            $('#konten-data').fadeIn('slow'); 
        }, 1000);
       },
    });
    }
    function lihatGambar(id) {
      $.ajax({
        url: 'getimage.php',
        data: 'id='+id,
        type: "GET",
        dataType: "html",
        success: function(r) {
          if (r == "salah") {
            $('.modal-body').html(r);
          $('#lihatgambar').modal("show");
          } else {
          $('#modal-body').html(r);
          $('#lihatgambar').modal("show");
          }
        },
        error: function(pesan) { 
          $('.modal-body').html('ERROR ..');
          $('#lihatgambar').modal("show");
        },
       });
    }
    function ubahGambar(id) {
      $('#hidden_id').val(id);
      $('#ubahgambar').modal("show");
    }
            $(function () {
                $('#btn').click(function () {
                    var iddata = $('#hidden_id').val();
                    var myfile = $('#myfile').val();
                    if (iddata == '' || myfile == '') {
                      swal("Gagal !", "Tidak Ada File Untuk Diupload", "warning");
                    } else {
                    $('.myprogress').css('width', '0');
                    $('.msg').text('');
                    var formData = new FormData();
                    formData.append('myfile', $('#myfile')[0].files[0]);
                    formData.append('id', iddata);
                    $('#btn').attr('disabled', 'disabled');
                    $.ajax({
                        url: 'uploadimage.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        // this part is progress bar
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    percentComplete = parseInt(percentComplete * 100);
                                    $('.myprogress').text(percentComplete + '%');
                                    $('.myprogress').css('width', percentComplete + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function (data) {
                            if (data == "no file") {
                              $('#btn').removeAttr('disabled');
                              swal("Gagal !", "Tolong Pilih File", "warning");
                            } else if (data == "file format") {
                              $('#btn').removeAttr('disabled');
                              swal("Gagal !", "Format Gambar Salah", "warning");
                            } else if (data == "file size") {
                              $('#btn').removeAttr('disabled');
                              swal("Gagal !", "Ukuran Gambar Terlalu Besar", "warning");
                            } else if (data == "failed") {
                              $('#btn').removeAttr('disabled');
                              swal("Gagal !", "Gagal Upload Gambar", "warning");
                            } else {
                              $('#btn').removeAttr('disabled');
                              swal("Berhasil !", "Upload Gambar Berhasil", "success");
                            }
                        },
                        error: function(data) { 
                          swal("Gagal !", "Proses Upload Gagal", "warning");
                        }
                    });
                    }
                });
            });