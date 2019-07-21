
    $(window).load(function() {
                $('#loader').delay(1000).fadeOut(500);
    });

    $(document).ready(function(){

        $('.currency').inputmask({
            alias:"decimal",
            digits:0,
            groupSeparator: '.',
            rightAlign: false,
            autoGroup: true,
            allowMinus:false   
        });

        $('.decimal').inputmask({
            alias:"decimal",
            digits:2,
            allowMinus:false    
        });

        // $('.selectpicker').selectpicker();
        
        $('#listRole').change(function() {
            $('.overlay').css('display','block');
            $.ajax({
                url: baseUrl+"/admin/ajaxChangePermision/"+this.value,
                success: function(result){
                    $('.overlay').css('display','none');
                    // location.reload();
                    window.location.href = base_url + '/admin';
                } 
            });
        }); 

        $('#filterTahun').val($('#getTahun').val());
        $('#filterSemester').val($('#getSemester').val());

        var getTahun = $('#getTahun').val();
        var getSemester = $('#getSemester').val();
      

        $("[data-hover='tooltip']").tooltip();

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $(".select2").select2();

        var get = [];
        location.search.replace('?','').split('&').forEach(function(val){
            split = val.split("=",2);
            get[split[0]] = split[1];
        });


        var url = window.location;
        //hanya akan bekerja pada href string yg matches dengan lokasi
        $('ul li a[href="'+ url +'"]').parent().addClass('active');

        $('ul .treeview .treeview-menu li a[href="'+ url +'"]').parent().addClass('active');

        $('ul .treeview .treeview-menu li a[href="'+ url +'"]').parent().addClass('aktif');

        $('.aktif').parent('.treeview-menu').parent('.treeview').addClass('active');

        $('.aktif').parent('.treeview-menu').addClass('menu-open');

        $('.aktif').parent('.treeview-menu').css('display','block');

        

    jQuery.each( [ "put", "delete" ], function( i, method ) {
      jQuery[ method ] = function( url, data, callback, type ) {
        if ( jQuery.isFunction( data ) ) {
          type = type || callback;
          callback = data;
          data = undefined;
        }

        return jQuery.ajax({
          url: url,
          type: method,
          dataType: type,
          data: data,
          success: callback
        });
      };
    });

    $('.date').datepicker({
            format: "yyyy/mm/dd",
            startDate: "2000-01-01",
            endDate: "2050-01-01",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
    });



        // -------------------------TAMBAHAN TABEL ADMIN ----------------------------//


            var tbadmin = $('#tbadmin').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbadmin',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'nama',name:'a.nama'},
                        {data: 'email', name:'a.email'},
                        {data: 'no_telp',name:'no_telp'},
                        {data: 'action', name: 'id',orderable: false, searchable: false}
                    ],
                    rowCallback: function( row, data, iDisplayIndex ) {
                    var api = this.api();
                    var info = api.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:eq(0)', row).html(index);
                }

            } );
                        
            $('#tbadmin_filter input').unbind();
            $('#tbadmin_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbadmin.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahadmin', function() {
                // post the data from the form
                $('#modaltambahAdmin').modal('hide');
                $('.overlay').css('display','block');
                $.post("admin", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbadmin.api().ajax.reload();
                            setTimeout(function() {
                                    //alert($("#reloadJs").html());
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });


            $(document).on('submit', '#ubahadmin', function() {
                $('#modalUbahAdmin').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("admin/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbadmin.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
        });

            
        $('#modalUbahAdmin').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('admin/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusadmin', function() {
                $('#modalHapusAdmin').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("admin/"+id, $(this).serialize())
                    .done(function(data) {
                            tbadmin.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


            $('#modalHapusAdmin').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('admin/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });




    // ------------------------- TABEL USER ----------------------------//

        var tbuser = $('#tbuser').dataTable( {
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: 'tbuser',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'username', name: 'username'},
                        {data: 'telp', name: 'telp'},
                        {data: 'role_title', name: 'role_title'},
                        {data: 'action', name: 'id',orderable: false, searchable: false}
                    ],
                          rowCallback: function( row, data, iDisplayIndex ) {
                          var api = this.api();
                          var info = api.page.info();
                          var page = info.page;
                          var length = info.length;
                          var index = (page * length + (iDisplayIndex +1));
                          $('td:eq(0)', row).html(index);
                      }

            } );
                        
            $('#tbuser_filter input').unbind();
            $('#tbuser_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbuser.fnFilter(this.value);
             }
        }); 



    $(document).on('submit', '#tambahuser', function() {
                // post the data from the form
                $('#modaltambahuser').modal('hide');
                $('.overlay').css('display','block');
                $.post("user", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbuser.api().ajax.reload();
                            setTimeout(function() {
                                    //alert($("#reloadJs").html());
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });

         $(document).on('submit', '#ubahuser', function() {
                $('#modalUbahuser').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("user/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbuser.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
        });

            
        $('#modalUbahuser').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isiuser').load('user/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 


         $(document).on('submit', '#hapususer', function() {
                $('#modalHapusUser').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("user/"+id, $(this).serialize())
                    .done(function(data) {
                            tbuser.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


        $('#modalHapusUser').on('shown.bs.modal', function (e) {
            //$('#id_menu').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isiHapusUser').load('user/'+ id +'/hapus');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        });

            // tamabah 
        $('#roleid').change(function() { 
            var id = $(this).val();
            $.ajax({
                url: "ajaxNama/"+id,
                dataType : "json",
                success: function(result){
                    $('.selectNama').empty();
                    $('.selectNama').append("<option value='0'>Pilih Nama User</option>");                    
                    $.each(result, function(key, value) {
                        $('.selectNama').append("<option value='" + key +"'>" + value + "</option>");
                    });
                } 
            });
        });
        // 1, 2, 5 = dosen
        // 3, 4 = pegawai
        // 6 = mahasiswa
        $('#namePilih').change(function() { 
            var role_id = $('#roleid').val();
            var id = $(this).val();
            if(role_id == 1 ){
                $.ajax({
                    url: "ajaxPegawai/"+id,
                    dataType : "json",
                    success: function(result){
                        $('#username').val(result.kode);
                        $('#identifier').val(result.kode);
                        $('#telp').val(result.telp);
                        $('#name').val(result.nama);
                    } 
                });
                
            }else if(role_id == 2 ){
                $.ajax({
                    url: "ajaxDosen/"+id,
                    dataType : "json",
                    success: function(result){
                        $('#username').val(result.nidn);
                        $('#identifier').val(result.nidn);
                        $('#telp').val(result.telp);
                        $('#name').val(result.nama);
                    } 
                });
            }else if(role_id == 3){
                $.ajax({
                    url: "ajaxMahasiswa/"+id,
                    dataType : "json",
                    success: function(result){
                        $('#username').val(result.nim);
                        $('#identifier').val(result.nim);
                        $('#telp').val(result.telp);
                        $('#name').val(result.nama);
                    } 
                });
            }
        });


        $('#modalUbahPass').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isiUbahPass').load(baseUrl+'/admin/password/'+ id +'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1500);
        });

        $('#listRole').change(function() {
            $('.overlay').css('display','block');
            $.ajax({
                url: baseUrl+"/admin/ajaxChangePermision/"+this.value,
                success: function(result){
                    $('.overlay').css('display','none');
                    window.location = baseUrl + '/admin';
                } 
            });
        }); 


            // -------------------------TAMBAHAN TABEL SLIDER ----------------------------//


            var tbslider = $('#tbslider').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbslider',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'judul',name:'r.judul'},
                        {data: 'katakunci', name:'r.katakunci'},
                        {data: 'content', name:'r.content'},
                        {data: 'action', name: 'id',orderable: false, searchable: false}
                    ],
                    rowCallback: function( row, data, iDisplayIndex ) {
                    var api = this.api();
                    var info = api.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:eq(0)', row).html(index);
                }

            } );
                        
            $('#tbslider_filter input').unbind();
            $('#tbslider_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbslider.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahslider', function() {
                // post the data from the form
                $('#modaltambahSlider').modal('hide');
                $('.overlay').css('display','block');
                var formData = new FormData($(this)[0]);
                $('.overlay').css('display','block');
                $.ajax({
                    url: 'slider',
                    type: 'POST',
                    cache: false,
                    async: true,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbslider.api().ajax.reload();
                        $('#tambahslider')[0].reset();
                        setTimeout(function() {
                            $('.overlay').css('display','none');
                        }, 1000);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false; 
        });


        $(document).on('submit', '#ubahslider', function() {
                $('#modalUbahSlider').modal('hide');
                $('.overlay').css('display','block');
                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                $('.overlay').css('display','block');
                $.ajax({
                    url: 'slider/'+id+'/update',
                    type: 'POST',
                    cache: false,
                    async: true,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbslider.api().ajax.reload();
                        $('#tambahslider')[0].reset();
                        setTimeout(function() {
                            $('.overlay').css('display','none');
                        }, 1000);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false; 
        });

            
        $('#modalUbahSlider').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('slider/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusslider', function() {
                $('#modalHapusSlider').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("slider/"+id, $(this).serialize())
                    .done(function(data) {
                            tbslider.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


            $('#modalHapusSlider').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('slider/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


    // -------------------------TAMBAHAN TABEL PROFILE ----------------------------//


            var tbprofile = $('#tbprofile').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbprofile',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'judul',name:'r.judul'},
                        {data: 'katakunci', name:'r.katakunci'},
                        {data: 'content', name:'r.content'},
                        {data: 'action', name: 'id',orderable: false, searchable: false}
                    ],
                    rowCallback: function( row, data, iDisplayIndex ) {
                    var api = this.api();
                    var info = api.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:eq(0)', row).html(index);
                }

            } );
                        
            $('#tbprofile_filter input').unbind();
            $('#tbprofile_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbprofile.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahprofile', function() {
                // post the data from the form
                $('#modaltambahProfile').modal('hide');
                $('.overlay').css('display','block');
                $.post("profile", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbprofile.api().ajax.reload();
                            setTimeout(function() {
                                    //alert($("#reloadJs").html());
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });


            $(document).on('submit', '#ubahprofile', function() {
                $('#modalUbahProfile').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("profile/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbprofile.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
        });

            
        $('#modalUbahProfile').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('profile/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusprofile', function() {
                $('#modalHapusProfile').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("profile/"+id, $(this).serialize())
                    .done(function(data) {
                            tbprofile.api().ajax.reload();
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


            $('#modalHapusProfile').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapusProfile').load('profile/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


    });//end doc ready //end doc ready //end doc ready //end doc ready //end doc ready //end doc ready



