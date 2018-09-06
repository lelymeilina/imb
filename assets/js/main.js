
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

        // $("html").niceScroll({
        //     scrollspeed: 100,
        //     mousescrollstep: 38,
        //     cursorwidth: 5,
        //     cursorborder: 0,
        //     cursorcolor: '#9b0000',
        //     autohidemode: true,
        //     zindex: 99999,
        //     horizrailenabled: false,
        //     cursorborderradius: 0,
        // });

        // $(".main-sidebar").mouseenter(function(){
        //     $("html").getNiceScroll().remove(); 
        //     $("body").css("overflow","hidden")
        // }).mouseleave(function(){
        //     $("html").niceScroll({
        //         scrollspeed: 100,
        //         mousescrollstep: 38,
        //         cursorwidth: 5,
        //         cursorborder: 0,
        //         cursorcolor: '#9b0000',
        //         autohidemode: true,
        //         zindex: 99999,
        //         horizrailenabled: false,
        //         cursorborderradius: 0,
        //     });
        // });

        // $('.modal').on('hide.bs.modal', function(e){

        //   $("html").niceScroll({
        //     scrollspeed: 100,
        //     mousescrollstep: 38,
        //     cursorwidth: 5,
        //     cursorborder: 0,
        //     cursorcolor: '#9b0000',
        //     autohidemode: true,
        //     zindex: 99999,
        //     horizrailenabled: false,
        //     cursorborderradius: 0,
        //   });   
        //   $(this).getNiceScroll().remove();
        // });


        // $('.modal').on('shown.bs.modal', function(e){
        //   $("html").getNiceScroll().remove(); 
        //   $(this).niceScroll({
        //     scrollspeed: 100,
        //     mousescrollstep: 38,
        //     cursorwidth: 5,
        //     cursorborder: 0,
        //     cursorcolor: '#ffffff',
        //     autohidemode: true,
        //     zindex: 99999,
        //     horizrailenabled: false,
        //     cursorborderradius: 0,
        //   });
        // });

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



        // -------------------------TAMBAHAN TABEL DOSEN ----------------------------//


            var tbdosen = $('#tbdosen').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbdosen',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'nidn', name: 'nidn'},
                        {data: 'nama',name:'d.nama'},
                        {data: 'jabatan', name:'j.nama'},
                        {data: 'jurusan', name:'p.nama'},
                        {data: 'email', name:'d.email'},
                        {data: 'telp',name:'telp'},
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
                        
            $('#tbdosen_filter input').unbind();
            $('#tbdosen_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                        tbdosen.fnFilter(this.value);
                 }
            }); 


        $(document).on('submit', '#tambahdosen', function() {
                // post the data from the form
                $('#modaltambahDosen').modal('hide');
                $('.overlay').css('display','block');
                $.post("dosen", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbdosen.api().ajax.reload();
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


            $(document).on('submit', '#ubahdosen', function() {
                $('#modalUbahDosen').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("dosen/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbdosen.api().ajax.reload();
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

            
        $('#modalUbahDosen').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('dosen/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusdosen', function() {
                $('#modalHapusDosen').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("dosen/"+id, $(this).serialize())
                    .done(function(data) {
                            tbdosen.api().ajax.reload();
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


            $('#modalHapusDosen').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('dosen/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
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




// -------------------------TAMBAHAN TABEL PEGAWAI ----------------------------//


            var tbpegawai = $('#tbpegawai').dataTable( {
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: 'tbpegawai',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'kode', name: 'kode'},
                        {data: 'nama',name:'nama'},
                        {data: 'is_pegawai', name:'is_pegawai'},
                        {data: 'telp',name:'telp'},
                        {data: 'action', name: 'id',orderable: false, searchable: false}
                    ]

            } );
                        
            $('#tbpegawai_filter input').unbind();
            $('#tbpegawai_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbpegawai.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahpegawai', function() {
                // post the data from the form
                $('#modaltambahDosen').modal('hide');
                $('.overlay').css('display','block');
                $.post("pegawai", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbpegawai.api().ajax.reload();
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


            $(document).on('submit', '#ubahpegawai', function() {
                $('#modalUbahPegawai').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("pegawai/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbpegawai.api().ajax.reload();
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

            
        $('#modalUbahPegawai').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('pegawai/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapuspegawai', function() {
                $('#modalHapusPegawai').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("pegawai/"+id, $(this).serialize())
                    .done(function(data) {
                            tbpegawai.api().ajax.reload();
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


            $('#modalHapusPegawai').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('pegawai/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });



        // -------------------------TAMBAHAN PEGAWAI ----------------------------//





        // -------------------------TAMBAHAN TABEL RUMPUN ILMU ----------------------------//


            var tbrumpun = $('#tbrumpun').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbrumpun',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'nama',name:'r.nama'},
                        {data: 'nama_singkat', name:'r.nama_singkat'},
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
                        
            $('#tbrumpun_filter input').unbind();
            $('#tbrumpun_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbrumpun.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahrumpunilmu', function() {
                // post the data from the form
                $('#modaltambahRumpunilmu').modal('hide');
                $('.overlay').css('display','block');
                $.post("rumpun", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbrumpun.api().ajax.reload();
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


            $(document).on('submit', '#ubahrumpun', function() {
                $('#modalUbahRumpunilmu').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("rumpun/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbrumpun.api().ajax.reload();
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

            
        $('#modalUbahRumpunilmu').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('rumpun/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusrumpun', function() {
                $('#modalHapusRumpunilmu').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("rumpun/"+id, $(this).serialize())
                    .done(function(data) {
                            tbrumpun.api().ajax.reload();
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


            $('#modalHapusRumpunilmu').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('rumpun/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });



        // -------------------------TAMBAHAN TABEL JENIS NILAI ----------------------------//


            var tbjenisnilai = $('#tbjenisnilai').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbjenisnilai',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'label_nilai',name:'j.label_nilai'},
                        {data: 'keterangan', name:'j.keterangan'},
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
                        
            $('#tbjenisnilai_filter input').unbind();
            $('#tbjenisnilai_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbjenisnilai.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahJenisNilai', function() {
                // post the data from the form
                $('#modaltambahJenisNilai').modal('hide');
                $('.overlay').css('display','block');
                $.post("jenisnilai", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbjenisnilai.api().ajax.reload();
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


            $(document).on('submit', '#ubahJenisNilai', function() {
                $('#modalUbahJenisNilai').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("jenisnilai/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbjenisnilai.api().ajax.reload();
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

            
        $('#modalUbahJenisNilai').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('jenisnilai/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusJenisNilai', function() {
                $('#modalHapusJenisNilai').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("jenisnilai/"+id, $(this).serialize())
                    .done(function(data) {
                            tbjenisnilai.api().ajax.reload();
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


            $('#modalHapusJenisNilai').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('jenisnilai/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


        // -------------------------TAMBAHAN TABEL KETUA ----------------------------//


        $(document).on('submit', '#tambahKetua', function() {
                // post the data from the form
                $('#modaltambahKetua').modal('hide');
                $('.overlay').css('display','block');
                $.post("ketua", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            setTimeout(function() {
                                    //alert($("#reloadJs").html());
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();

                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });


        $(document).on('submit', '#ubahKetua', function() {
                $('#modalUbahKetua').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("ketua/"+ id, $(this).serialize())
                    .done(function(data) {
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
        });

            
        $('#modalUbahKetua').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('ketua/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusKetua', function() {
                $('#modalHapusKetua').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("ketua/"+id, $(this).serialize())
                    .done(function(data) {
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


            $('#modalHapusKetua').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('ketua/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });




        // -------------------------TAMBAHAN TABEL MENYETUJUI ----------------------------//


        $(document).on('submit', '#tambahMenyetujui', function() {
                // post the data from the form
                $('#modaltambahMenyetujui').modal('hide');
                $('.overlay').css('display','block');
                $.post("menyetujui", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            setTimeout(function() {
                                    //alert($("#reloadJs").html());
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();

                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });


        $(document).on('submit', '#ubahMenyetujui', function() {
                $('#modalUbahMenyetujui').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("menyetujui/"+ id, $(this).serialize())
                    .done(function(data) {
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
        });

            
        $('#modalUbahMenyetujui').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('menyetujui/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusMenyetujui', function() {
                $('#modalHapusMenyetujui').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("menyetujui/"+id, $(this).serialize())
                    .done(function(data) {
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


            $('#modalHapusMenyetujui').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('menyetujui/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });



        // -------------------------TAMBAHAN TABEL MENGETAHUI ----------------------------//


        $(document).on('submit', '#tambahMengetahui', function() {
                // post the data from the form
                $('#modaltambahMengetahui').modal('hide');
                $('.overlay').css('display','block');
                $.post("mengetahui", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            setTimeout(function() {
                                    //alert($("#reloadJs").html());
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();

                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });


        $(document).on('submit', '#ubahMengetahui', function() {
                $('#modalUbahMengetahui').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("mengetahui/"+ id, $(this).serialize())
                    .done(function(data) {
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
        });

            
        $('#modalUbahMengetahui').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('mengetahui/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusMengetahui', function() {
                $('#modalHapusMengetahui').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("mengetahui/"+id, $(this).serialize())
                    .done(function(data) {
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                                    location.reload();
                            }, 1000);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                return false;
            });


            $('#modalHapusMengetahui').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('mengetahui/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });



        // -------------------------TAMBAHAN TABEL PERIODE ----------------------------//


            var tbperiode = $('#tbperiode').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbperiode',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'nama_singkat',name:'s.nama_singkat'},
                        {data: 'tahun_usulan',name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan', name:'tahun_pelaksanaan'},
                        {data: 'batas_kumpul1', name:'batas_kumpul1'},
                        {data: 'batas_kumpul2', name:'batas_kumpul2'},
                        {data: 'is_internal', name:'is_internal'},
                        {data: 'is_pengabdian', name:'is_pengabdian'},
                        {data: 'is_kreatifitas', name:'is_kreatifitas'},
                        {data: 'status', name:'status'},
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
                        
            $('#tbperiode_filter input').unbind();
            $('#tbperiode_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbperiode.fnFilter(this.value);
             }
        }); 


        //input master skim     
          $(document).on('submit', '#tambahPeriode', function() {
              // post the data from the form
              $('#modaltambahPeriode').modal('hide');
              $('.overlay').css('display','block');
              $.post("periode", $(this).serialize())
                .done(function(data) {
                    tbperiode.api().ajax.reload();
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


          //ubah Master skim
          $(document).on('submit', '#ubahperiode', function() {
              $('#modalUbahPeriode').modal('hide');
              $('.overlay').css('display','block');
              var id = $("#id").val();
              $.put("periode/"+id, $(this).serialize())
                .done(function(data) {
                    tbperiode.api().ajax.reload();
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
            
          $('#modalUbahPeriode').on('shown.bs.modal', function (e) {
              //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
              $('.overlay2').css('display','block');
              var id = $(e.relatedTarget).data('id');
              $('#isi').load('periode/'+ id +'/edit');
          });



          //hapus skim

            $(document).on('submit', '#hapusperiode', function() {
              $('#modalHapusPeriode').modal('hide');
              $('.overlay').css('display','block');
              var id = $("#id").val();
              $.delete("periode/"+id, $(this).serialize())
                .done(function(data) {
                    tbskim.api().ajax.reload();
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

            $('#modalHapusPeriode').on('shown.bs.modal', function (e) {
                //$('#id_surat').val($(e.relatedTarget).data('id'));
                $('.overlay2').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('periode/'+ id +'/hapus');
            });

        // ----------------------------- **  End Periode ** ---------------------------------// 



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
                    ]

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





        // ------------------------- MONITORING INTERNAL ----------------------------//

        // Monitoring Usulan Internal
             var tbMonitoringUsulanInternal = $('#tbMonitoringUsulanInternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringusulaninternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringUsulanInternal_filter input').unbind();
            $('#tbMonitoringUsulanInternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringUsulanInternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailUsulanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailUsulanInternal').load('daftarusulaninternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileUsulanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileUsulanInternal').load('daftarusulaninternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiUsulanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiUsulanInternal').load('daftarusulaninternal/'+ id +'/showValidasi', function(){
                    $(".repeater-delete").css('display','none');
                });
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiUsulanInternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiUsulanInternal();

                if(($('.statusProposal-required').hasClass('has-error') || 
                   $('.danaDisetujui-required').hasClass('has-error') ||
                   $('.req-nilai').hasClass('has-error') ||
                   $('.req-ket').hasClass('has-error')) && ($('#statusProposal').val() != 2)){
                    //
                }else{
                    $('#monitoringModalValidasiUsulanInternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("daftarusulaninternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringUsulanInternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaUsulanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaUsulanInternal').load('daftarusulaninternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            
            // Monitoring Kemajuan Internal
             var tbMonitoringKemajuanInternal = $('#tbMonitoringKemajuanInternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringkemajuaninternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringKemajuanInternal_filter input').unbind();
            $('#tbMonitoringKemajuanInternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringKemajuanInternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailKemajuanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailKemajuanInternal').load('kemajuaninternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileKemajuanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileKemajuanInternal').load('kemajuaninternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiKemajuanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiKemajuanInternal').load('kemajuaninternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiKemajuanInternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiKemajuanInternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiKemajuanInternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("kemajuaninternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringKemajuanInternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaKemajuanInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaKemajuanInternal').load('kemajuaninternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Akhir Internal
             var tbMonitoringAkhirInternal = $('#tbMonitoringAkhirInternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringakhirinternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringAkhirInternal_filter input').unbind();
            $('#tbMonitoringAkhirInternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringAkhirInternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailAkhirInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailAkhirInternal').load('akhirinternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileAkhirInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileAkhirInternal').load('akhirinternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiAkhirInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiAkhirInternal').load('akhirinternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiAkhirInternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiAkhirInternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiAkhirInternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("akhirinternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringAkhirInternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaAkhirInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaAkhirInternal').load('akhirinternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Anggaran Internal
            var tbMonitoringAnggaranInternal = $('#tbMonitoringAnggaranInternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringanggaraninternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringAnggaranInternal_filter input').unbind();
            $('#tbMonitoringAnggaranInternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringAnggaranInternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailAnggaranInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailAnggaranInternal').load('anggaraninternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileAnggaranInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileAnggaranInternal').load('anggaraninternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiAnggaranInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiAnggaranInternal').load('anggaraninternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiAnggaranInternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiAnggaranInternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiAnggaranInternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("anggaraninternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringAnggaranInternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaAnggaranInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaAnggaranInternal').load('anggaraninternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Belanja Internal
             var tbMonitoringBelanjaInternal = $('#tbMonitoringBelanjaInternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringbelanjainternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringBelanjaInternal_filter input').unbind();
            $('#tbMonitoringBelanjaInternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringBelanjaInternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailBelanjaInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailBelanjaInternal').load('belanjainternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileBelanjaInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileBelanjaInternal').load('belanjainternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiBelanjaInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiBelanjaInternal').load('belanjainternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiBelanjaInternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiBelanjaInternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiBelanjaInternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("belanjainternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringBelanjaInternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaBelanjaInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaBelanjaInternal').load('belanjainternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Publikasi Internal
            var tbMonitoringPublikasiInternal = $('#tbMonitoringPublikasiInternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringpublikasiinternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringPublikasiInternal_filter input').unbind();
            $('#tbMonitoringPublikasiInternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringPublikasiInternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailPublikasiInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailPublikasiInternal').load('publikasiinternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFilePublikasiInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFilePublikasiInternal').load('publikasiinternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiPublikasiInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiPublikasiInternal').load('publikasiinternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiPublikasiInternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiPublikasiInternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiPublikasiInternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("publikasiinternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringPublikasiInternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaPublikasiInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaPublikasiInternal').load('publikasiinternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // ------------------------- END OF MONITORING INTERNAL ----------------------------//


        // ------------------------- MONITORING EKSTERNAL ----------------------------//

        // Monitoring Usulan Eksternal
           var tbMonitoringUsulanEksternal = $('#tbMonitoringUsulanEksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringusulaneksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringUsulanEksternal_filter input').unbind();
            $('#tbMonitoringUsulanEksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringUsulanEksternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailUsulanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailUsulanEksternal').load('daftarusulaneksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileUsulanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileUsulanEksternal').load('daftarusulaneksternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiUsulanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiUsulanEksternal').load('daftarusulaneksternal/'+ id +'/showValidasi', function(){
                    $(".repeater-delete").css('display','none');
                });
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiUsulanEksternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiUsulanEksternal();

                if(($('.statusProposal-required').hasClass('has-error') || 
                   $('.danaDisetujui-required').hasClass('has-error') ||
                   $('.req-nilai').hasClass('has-error') ||
                   $('.req-ket').hasClass('has-error')) && ($('#statusProposal').val() != 2)){
                    //
                }else{
                    $('#monitoringModalValidasiUsulanEksternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("daftarusulaneksternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringUsulanEksternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaUsulanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaUsulanEksternal').load('daftarusulaneksternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            
            // Monitoring Kemajuan Eksternal
            var tbMonitoringKemajuanEksternal = $('#tbMonitoringKemajuanEksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringkemajuaneksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringKemajuanEksternal_filter input').unbind();
            $('#tbMonitoringKemajuanEksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringKemajuanEksternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailKemajuanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailKemajuanEksternal').load('kemajuaneksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileKemajuanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileKemajuanEksternal').load('kemajuaneksternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiKemajuanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiKemajuanEksternal').load('kemajuaneksternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiKemajuanEksternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiKemajuanEksternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiKemajuanEksternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("kemajuaneksternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringKemajuanEksternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaKemajuanEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaKemajuanEksternal').load('kemajuaneksternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Akhir Eksternal
            var tbMonitoringAkhirEksternal = $('#tbMonitoringAkhirEksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringakhireksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringAkhirEksternal_filter input').unbind();
            $('#tbMonitoringAkhirEksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringAkhirEksternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailAkhirEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailAkhirEksternal').load('akhireksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileAkhirEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileAkhirEksternal').load('akhireksternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiAkhirEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiAkhirEksternal').load('akhireksternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiAkhirEksternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiAkhirEksternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiAkhirEksternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("akhireksternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringAkhirEksternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaAkhirEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaAkhirEksternal').load('akhireksternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Anggaran Eksternal
            var tbMonitoringAnggaranEksternal = $('#tbMonitoringAnggaranEksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringanggaraneksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringAnggaranEksternal_filter input').unbind();
            $('#tbMonitoringAnggaranEksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringAnggaranEksternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailAnggaranEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailAnggaranEksternal').load('anggaraneksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileAnggaranEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileAnggaranEksternal').load('anggaraneksternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiAnggaranEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiAnggaranEksternal').load('anggaraneksternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiAnggaranEksternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiAnggaranEksternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiAnggaranEksternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("anggaraneksternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringAnggaranEksternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaAnggaranEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaAnggaranEksternal').load('anggaraneksternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Belanja Eksternal
             var tbMonitoringBelanjaEksternal = $('#tbMonitoringBelanjaEksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringbelanjaeksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringBelanjaEksternal_filter input').unbind();
            $('#tbMonitoringBelanjaEksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringBelanjaEksternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailBelanjaEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailBelanjaEksternal').load('belanjaeksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFileBelanjaEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFileBelanjaEksternal').load('belanjaeksternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiBelanjaEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiBelanjaEksternal').load('belanjaeksternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiBelanjaEksternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiBelanjaEksternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiBelanjaEksternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("belanjaeksternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringBelanjaEksternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaBelanjaEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaBelanjaEksternal').load('belanjaeksternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            // Monitoring Publikasi Eksternal
           var tbMonitoringPublikasiEksternal = $('#tbMonitoringPublikasiEksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbmonitoringpublikasieksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
                        {data: 'jenis_usulan',name:'jenis_usulan'},
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
                        
            $('#tbMonitoringPublikasiEksternal_filter input').unbind();
            $('#tbMonitoringPublikasiEksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringPublikasiEksternal.fnFilter(this.value);
                }
            });

            $('#monitoringModalDetailPublikasiEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringDetailPublikasiEksternal').load('publikasieksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalFilePublikasiEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringFilePublikasiEksternal').load('publikasieksternal/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#monitoringModalValidasiPublikasiEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentMonitoringValidasiPublikasiEksternal').load('publikasieksternal/'+ id +'/showValidasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $(document).on('submit', '#monitoringValidasiPublikasiEksternal', function() {
                //Check Required
                checkRequiredMonitoringValidasiPublikasiEksternal();

                if($('.statusProposal-required').hasClass('has-error')){
                    //
                }else{
                    $('#monitoringModalValidasiPublikasiEksternal').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#validasiIdUsulan").val();
                    $.put("publikasieksternal/"+ id, $(this).serialize())
                        .done(function(data) {
                                tbMonitoringPublikasiEksternal.api().ajax.reload();
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        $("#infotambah").fadeIn(300);
                                }, 1000);
                                setTimeout(function() {
                                        $("#infotambah").fadeOut(2500);
                                }, 2500);
                        });
                }
                return false;
            });

            $('#modalLaporanBelanjaPublikasiEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaPublikasiEksternal').load('publikasieksternal/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // ------------------------- END OF MONITORING EKSTERNAL ----------------------------//


        // <*******************Halaman Usulan Internal*******************>

        // <-------------------Tambah Usulan Proposal Internal Halaman Dosen------------------->

            $(document).on('submit', '#formusulanInternal', function() { 
                // post the data from the form
                // $('#modaltambah').modal('hide');
                // CheckRequired();
                var formData = new FormData($(this)[0]);
                $('.overlay').css('display','block');
                    $.ajax({
                        url: 'usulanInternal',
                        type: 'POST',
                        headers: {
                             'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: formData,
                        async: true,
                        error: function(xhr, data, error) {alert(data);alert(xhr.responseText);},
                        success: function (data) {
                            // tbfooter.api().ajax.reload(); 
                            window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';
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

        // <-------------------End Tambah Usulan Proposal Internal Halaman Dosen------------------->

        // <-------------------Ubah Usulan Proposal Internal Halaman Dosen------------------->

            $(document).on('submit', '#ubahinternal', function() { 
                // post the data from the form
                // $('#modalUbahContent').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        // tbcontent.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                            //      //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#updateUsulan').on('click', function (e) {
                //$('#id_fakultas').val($(e.relatedTarget).data('id'));
                // $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#myTabContent').load('usulanInternal/edit'+id);
                // setTimeout(function() {
                //         $('.overlay').css('display','none');
                // }, 1500);
            });

        // <-------------------Ubah Usulan Proposal Internal Halaman Dosen------------------->

        // <-------------------Tampil Tabel Usulan Internal Dosen------------------->

            var tbMonitoringUsulanInternalDosen = $('#tbMonitoringUsulanInternalDosen').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbMonitoringUsulanInternalDosen',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
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
                        
            $('#tbMonitoringUsulanInternalDosen_filter input').unbind();
            $('#tbMonitoringUsulanInternalDosen_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringUsulanInternalDosen.fnFilter(this.value);
                }
            });

        // <-------------------End Of Tampil Tabel Usulan Internal Dosen------------------->

        // <-------------------Tampil Detail Usulan Internal Dosen------------------->

            $('#daftarModalDetailUsulanInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarDetailUsulanInternalDosen').load('daftarusulaninternaldosen/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#daftarModalHapusUsulanInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentHapusUsulanInternal').load('hapususulaninternaldosen/'+ id +"/hapus");
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-------------------End Of Tampil Detail Usulan Internal Dosen------------------->

        // <-------------------Tampil File Detail Usulan Internal Dosen------------------->

            $('#daftarModalFileUsulanInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarFileUsulanInternalDosen').load('daftarusulaninternaldosen/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-------------------End Of Tampil File Detail Usulan Internal Dosen------------------->

        // <-------------------Tampil Upload File Kemajuan Usulan Internal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanInternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanInternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id + '/uploadFileKemajuan',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanInternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadKemajuanUsulanInternalDosen').load('daftarusulaninternaldosen/'+ id +'/upload');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Kemajuan Usulan Internal Dosen----------------->

        // <-------------------Tampil Upload File Akhir Usulan Internal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanAkhirInternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanAkhirInternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id + '/uploadFileAkhir',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanInternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanAkhirInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanAkhirInternalDosen').load('daftarusulaninternaldosen/'+ id +'/uploadAkhir');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Akhir Usulan Internal Dosen----------------->

        // <-------------------Tampil Upload File Anggaran Usulan Internal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanAnggaranInternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanAnggaranInternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id + '/uploadFileAnggaran',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanInternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanAnggaranInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanAnggaranInternalDosen').load('daftarusulaninternaldosen/'+ id +'/uploadAnggaran');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Anggaran Usulan Internal Dosen----------------->

        // <--------------Tampil Upload File Tanggung Jawab Belanja Usulan Internal Dosen-------------->

            $(document).on('submit', '#monitoringDetailUsulanTanggungJawabInternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanTanggungJawabInternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id + '/uploadFileTanggungJawab',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanInternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanTanggungJawabInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanTanggungJawabInternalDosen').load('daftarusulaninternaldosen/'+ id +'/uploadTanggungJawab');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <----------End Of Tampil Upload File Tanggung Jawab Belanja Usulan Internal Dosen---------->

        // <-------------------Tampil Upload File Publikasi Usulan Internal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanPublikasiInternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanPublikasiInternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id + '/uploadFilePublikasi',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanInternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanPublikasiInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanPublikasiInternalDosen').load('daftarusulaninternaldosen/'+ id +'/uploadPublikasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Publikasi Usulan Internal Dosen----------------->

        $('#modalLaporanBelanjaInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaInternalDosen').load('daftarusulanInternaldosen/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <*******************End Of Halaman Usulan Internal*******************>

                // <*******************Halaman Usulan Eksternal*******************>

        // <-------------------Tambah Usulan Proposal Eksternal Halaman Dosen------------------->

            $(document).on('submit', '#formusulanEksternal', function() { 
                // post the data from the form
                // $('#modaltambah').modal('hide');
                var formData = new FormData($(this)[0]);
                $('.overlay').css('display','block');
                    $.ajax({
                        url: 'usulaneksternal',
                        type: 'POST',
                        headers: {
                             'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: formData,
                        async: true,
                        error: function(xhr, data, error) {alert(data);alert(xhr.responseText);},
                        success: function (data) {
                            // tbfooter.api().ajax.reload(); 
                            window.location.href=baseUrl + '/admin/daftarusulaneksternaldosen';
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

        // <-------------------End Tambah Usulan Proposal Eksternal Halaman Dosen------------------->

        // <-------------------Ubah Usulan Proposal Eksternal Halaman Dosen------------------->

            $(document).on('submit', '#ubaheksternal', function() { 
                // post the data from the form
                // $('#modalUbahContent').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/' + id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        // tbcontent.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                            //      //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        window.location.href=baseUrl + '/admin/daftarusulaneksternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#updateUsulan').on('click', function (e) {
                //$('#id_fakultas').val($(e.relatedTarget).data('id'));
                // $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#myTabContent').load('usulaneksternal/edit'+id);
                // setTimeout(function() {
                //         $('.overlay').css('display','none');
                // }, 1500);
            });

        // <-------------------Ubah Usulan Proposal Eksternal Halaman Dosen------------------->

        // <-------------------Tampil Tabel Usulan Eksternal Dosen------------------->

            var tbMonitoringUsulanEksternalDosen = $('#tbMonitoringUsulanEksternalDosen').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbMonitoringUsulanEksternalDosen',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
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
                        
            $('#tbMonitoringUsulanEksternalDosen_filter input').unbind();
            $('#tbMonitoringUsulanEksternalDosen_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbMonitoringUsulanEksternalDosen.fnFilter(this.value);
                }
            });

        // <-------------------End Of Tampil Tabel Usulan Eksternal Dosen------------------->

        // <-------------------Tampil Detail Usulan Eksternal Dosen------------------->

            $('#daftarModalDetailUsulanEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarDetailUsulanEksternalDosen').load('daftarusulaneksternaldosen/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#daftarModalHapusUsulanEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentHapusUsulanEksternal').load('hapususulaneksternaldosen/'+ id +"/hapus");
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-------------------End Of Tampil Detail Usulan Eksternal Dosen------------------->

        // <-------------------Tampil File Detail Usulan Eksternal Dosen------------------->

            $('#daftarModalFileUsulanEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarFileUsulanEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/file');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-------------------End Of Tampil File Detail Usulan Eksternal Dosen------------------->

        // <-------------------Tampil Upload File Kemajuan Usulan Eksternal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanEksternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanEksternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/' + id + '/uploadFileKemajuan',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadKemajuanUsulanEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/upload');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Kemajuan Usulan Eksternal Dosen----------------->

        // <-------------------Tampil Upload File Kemajuan Usulan Internal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanInternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanInternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaninternaldosen/' + id + '/uploadFileKemajuan',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanInternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanInternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadKemajuanUsulanInternalDosen').load('daftarusulaninternaldosen/'+ id +'/upload');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Kemajuan Usulan Eksternal Dosen----------------->

        // <-------------------Tampil Upload File Akhir Usulan Eksternal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanAkhirEksternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanAkhirEksternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/' + id + '/uploadFileAkhir',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanAkhirEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanAkhirEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/uploadAkhir');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Akhir Usulan Eksternal Dosen----------------->

        // <-------------------Tampil Upload File Anggaran Usulan Eksternal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanAnggaranEksternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanAnggaranEksternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/' + id + '/uploadFileAnggaran',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanAnggaranEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanAnggaranEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/uploadAnggaran');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Anggaran Usulan Eksternal Dosen----------------->

        // <--------------Tampil Upload File Tanggung Jawab Belanja Usulan Eksternal Dosen-------------->

            $(document).on('submit', '#monitoringDetailUsulanTanggungJawabEksternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanTanggungJawabEksternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/' + id + '/uploadFileTanggungJawab',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanTanggungJawabEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanTanggungJawabEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/uploadTanggungJawab');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <----------End Of Tampil Upload File Tanggung Jawab Belanja Usulan Eksternal Dosen---------->

        // <-------------------Tampil Upload File Publikasi Usulan Eksternal Dosen------------------->

            $(document).on('submit', '#monitoringDetailUsulanPublikasiEksternal', function() { 
                // post the data from the form
                $('#daftarModalUploadFileUsulanPublikasiEksternalDosen').modal('hide');

                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/' + id + '/uploadFilePublikasi',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false; 
            });

            $('#daftarModalUploadFileUsulanPublikasiEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentDaftarUploadUsulanPublikasiEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/uploadPublikasi');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <-----------------End Of Tampil Upload File Publikasi Usulan Internal Dosen----------------->

        $('#modalLaporanBelanjaEksternalDosen').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentLaporanBelanjaEksternalDosen').load('daftarusulaneksternaldosen/'+ id +'/belanja');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

        // <*******************End Of Halaman Usulan Eksternal*******************>


        var i = 1;
        $('.nexttab').click(function(){
            var curStep = $(this).closest("#step"+i),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='file'],textarea,select"),
            isValid = true;
            // console.log(curInputs.length);
            $(".form-group").removeClass("has-error");
            for(var index=0; index<curInputs.length; index++){
                if (!curInputs[index].validity.valid){

                    isValid = false;
                    // console.log(!curInputs[index].validity.valid + " Valid " + index);
                    $(curInputs[index]).closest(".form-group").addClass("has-error");
                }
            }
            if(isValid){
                $('#proses'+i).removeClass('active');
                $('#proses'+i).addClass('complete');
                i++;
                $('#proses'+i).removeClass('disabled');
                $('#proses'+i).addClass('active');
                activaTab("step"+i);
            }
        });

        $('.prevtab').click(function(){
            $('#proses'+i).removeClass('active');
            $('#proses'+i).addClass('disabled');
            i--;
            $('#proses'+i).removeClass('complete');
            $('#proses'+i).addClass('active');
            activaTab("step"+i);
            
        });

        $('#fungsi_detail2').hide();
        $('#delete_detail').hide();


        $('#add_detail').click(function(){
            $( "#fungsi_detail2" ).slideDown( "slow", function() {
            // Animation complete.
            });

            $('#add_detail').hide();
            $('#delete_detail').show();

        });

        $('#delete_detail').click(function(){
            $( "#fungsi_detail2" ).slideUp( "slow", function() {
            // Animation complete.
            });

            $('#add_detail').show();
            $('#delete_detail').hide();

        });


        $('.upload').hide()

        $('#pilihubahProposal').change(function(){

            if ($('#pilihubahProposal').val() == 1) {
                $( ".upload" ).slideDown( "fast", function() {
                    // Animation complete.
                });
            }else{
                $( ".upload" ).slideUp( "fast", function() {
                    // Animation complete.
                });
            }

        });

        // script pkm //
            var tbpkm = $('#tbpkm').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbpkm',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'periode', name: 'periode'},
                        {data: 'semester',name:'semester'},
                        {data: 'nama', name:'r.nama'},
                        {data: 'judul', name:'u.judul'},
                        {data: 'tempat', name:'u.tempat'},
                        {data: 'batas_kumpul1',name:'p.batas_kumpul1'},
                        {data: 'batas_kumpul2',name:'p.batas_kumpul2'},
                        {data: 'nomor_sk',name:'u.nomor_sk'},
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
                        

        $(document).on('submit', '#tambahpkm', function() {
                // post the data from the form
                $('#modalTambahPkm').modal('hide');
                $('.overlay').css('display','block');
                var formData = new FormData($(this)[0]);
                var id = $('#id').val();
                // var id = $(e.relatedTarget).data('id');
                // alert(formData);
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/pkm',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        // tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            tbpkm.api().ajax.reload();
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false;
            });


            $(document).on('submit', '#ubahpkm', function() {
                $('#modalUbahPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                var formData = new FormData($(this)[0]);
                // var id = $(e.relatedTarget).data('id');
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/pkm/'+ id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        // tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            tbpkm.api().ajax.reload();
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false;
        });

            $(document).on('submit', '#peranpkm', function() {
                $('#modalPeranPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                var formData = new FormData($(this)[0]);
                // var id = $(e.relatedTarget).data('id');
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/pkm/'+ id +'/peran',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        // tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            tbpkm.api().ajax.reload();
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false;
        });

            $(document).on('submit', '#docpkm', function() {
                $('#modalDocPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                var formData = new FormData($(this)[0]);
                // var id = $(e.relatedTarget).data('id');
                $('.overlay').css('display','block');
                $.ajax({
                    url: baseUrl + '/admin/pkm/'+ id +'/doc',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: formData,
                    async: true,
                    success: function (data) {
                        //console.log(data);
                        // tbMonitoringUsulanEksternalDosen.api().ajax.reload();
                        // $(".loadFoto").attr('src',''+base_url+'/'+data+'?'+Math.random()+'');
                        setTimeout(function() {
                                 //alert($("#reloadJs").html());
                            tbpkm.api().ajax.reload();
                            $('.overlay').css('display','none');
                                 $("#infotambah").fadeIn(300);
                        }, 1000);
                        setTimeout(function() {
                                 $("#infotambah").fadeOut(2500);
                        }, 2500);
                        // window.location.href=baseUrl + '/admin/daftarusulaninternaldosen';

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });             
                return false;
        });

        $('#modalUbahPkm').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('pkm/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapuspkm', function() {
                $('#modalHapusPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("pkm/"+id, $(this).serialize())
                    .done(function(data) {
                            tbpkm.api().ajax.reload();
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

            $('#modalHapusPkm').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('pkm/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#modalPeranPkm').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiPeran').load('pkm/'+ id +'/peran');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

            $('#modalDocPkm').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiDoc').load('pkm/'+ id +'/doc');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });


            $(document).on('submit', '#cetakpkm', function() {
                    $('#modalCetakPkm').modal('hide');
                    $('.overlay').css('display','block');
                    var id = $("#id_surat").val();
                    var formData = new FormData($(this)[0]);
                    // var id = $(e.relatedTarget).data('id');
                    $('.overlay').css('display','block');
                    $.ajax({
                        url: baseUrl + '/admin/pkm/'+ id +'/cetak',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: formData,
                        async: true,
                        success: function (data) {
                            setTimeout(function() {
                                if (data.jenis == 1) {
                                    window.open(baseUrl + '/admin/pkm/'+ id +'/cetak-sk?tgl='+data.tgl, '_blank')
                                } else {
                                    window.open(baseUrl + '/admin/pkm/'+ id +'/cetak-st?tgl='+data.tgl, '_blank')
                                }
                                $('.overlay').css('display','none');
                            }, 1000);
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });             
                    return false;
            });


            $('#modalCetakPkm').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#id_surat').val(id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });
        var jumlahPeran = 1;
        $(document).on('click', '.tambahPeran', function() {
            jumlahPeran++;
            $(this).parent().parent().hide();
            $('#peran_blok').clone()
                            .show()
                            .find('input')
                            .attr('name', 'peran_'+jumlahPeran)
                            .attr('id', 'peran_'+jumlahPeran)
                            .end()
                            .appendTo($('#body-tambah'));
            $('#dosen_blok').clone()
                            .show()
                            .find('select')
                            .attr('name', 'dosenTambah_'+jumlahPeran+'[]')
                            .attr('id', 'dosenTambah_'+jumlahPeran)
                            .select2()
                            .end()
                            .appendTo($('#body-tambah'));
            $('#action_blok').clone()
                            .show()
                            .find('button')
                            .attr('id', 'action_'+jumlahPeran)
                            .end()
                            .appendTo($('#body-tambah'));
            $('#jumlahPeran').val(jumlahPeran);
            return false;
        });

        $(document).on('click', '.hapusPeran', function() {
            if (jumlahPeran > 1) {
                $('#peran_'+jumlahPeran).parent().parent().remove();
                $('#dosenTambah_'+jumlahPeran).parent().parent().remove();
                $(this).parent().parent().remove();
                jumlahPeran--;
                $('#action_'+jumlahPeran).parent().parent().show();
                $('#jumlahPeran').val(jumlahPeran);
            }
            return false;
        });

        $('#periode').change(function() {
            $.get("pkm/"+ $(this).val() +"/periode")
                    .done(function(data) {
                            $('#tanggal_mulai').val(data.batas_kumpul1);
                            $('#tanggal_akhir').val(data.batas_kumpul2);
                    });
        });
        // end script pkm //


        var tbcetakinternal = $('#tbcetakinternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbcetakinternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
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
                        
            $('#tbcetakinternal_filter input').unbind();
            $('#tbcetakinternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbcetakinternal.fnFilter(this.value);
                }
            });


            $('#suratKontrakInternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentsuratKontrakInternal').load('cetakinternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });




            var tbcetakeksternal = $('#tbcetakeksternal').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url:'tbcetakeksternal',
                        data:function(d){
                            d.jenis_usulan = $('#filterJenisUsulan').val();
                            d.tahun_usulan = $('#filterTahunUsulan').val();
                        }
                    },
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'progress', name: 'progress',orderable: false, searchable: false},
                        {data: 'peneliti',name:'peneliti'},
                        {data: 'judul', name:'judul'},
                        {data: 'tahun_usulan', name:'tahun_usulan'},
                        {data: 'tahun_pelaksanaan',name:'tahun_pelaksanaan'},
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
                        
            $('#tbcetakeksternal_filter input').unbind();
            $('#tbcetakeksternal_filter input').bind('keyup', function(e) {
                if(e.keyCode == 13) {
                    tbcetakeksternal.fnFilter(this.value);
                }
            });


            $('#suratKontrakEksternal').on('shown.bs.modal', function (e) {
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#contentsuratKontrakEksternal').load('cetakeksternal/'+ id);
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });



            
            // ----------------------------- **  Master skim ** ---------------------------------// 

           var tbskim = $('#tbskim').dataTable( {
                  "scrollX": "100%",
                  processing: true,
                  serverSide: true,
                  ajax: 'tbskim',
                  columns: [
                      {data: 'no', name: 'no',width:"2%"},
                      {data: 'nama_singkat', name: 'd.nama_singkat'},
                      {data: 'nama_lengkap', name: 'd.nama_lengkap'},
                      {data: 'action', name: 'id',orderable: false, searchable: false}
                  ]

           });
                  
            $('#tbskim_filter input').unbind();
            $('#tbskim_filter input').bind('keyup', function(e) {
             if(e.keyCode == 13) {
                tbskim.fnFilter(this.value);
             }
          }); 

          //input master skim     
          $(document).on('submit', '#tambahskim', function() {
              // post the data from the form
              $('#modaltambahskim').modal('hide');
              $('.overlay').css('display','block');
              $.post("skim", $(this).serialize())
                .done(function(data) {
                    tbskim.api().ajax.reload();
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


          //ubah Master skim
          $(document).on('submit', '#ubahskim', function() {
              $('#modalUbahskim').modal('hide');
              $('.overlay').css('display','block');
              var id = $("#id").val();
              $.put("skim/"+id, $(this).serialize())
                .done(function(data) {
                    tbskim.api().ajax.reload();
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
            
          $('#modalUbahskim').on('shown.bs.modal', function (e) {
              //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
              $('.overlay2').css('display','block');
              var id = $(e.relatedTarget).data('id');
              $('#isi').load('skim/'+ id +'/edit');
          });



          //hapus skim

            $(document).on('submit', '#hapusskim', function() {
              $('#modalHapusskim').modal('hide');
              $('.overlay').css('display','block');
              var id = $("#id").val();
              $.delete("skim/"+id, $(this).serialize())
                .done(function(data) {
                    tbskim.api().ajax.reload();
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

            $('#modalHapusskim').on('shown.bs.modal', function (e) {
                //$('#id_surat').val($(e.relatedTarget).data('id'));
                $('.overlay2').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('skim/'+ id +'/hapus');
            });

        // ----------------------------- **  End Master skim ** ---------------------------------// 

        // ----------------------------- **  Master Jenis PKM ** ---------------------------------// 

        var tbjenispkm = $('#tbjenispkm').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbjenispkm',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'nama',name:'nama'},
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
                        
            $('#tbjenisnilai_filter input').unbind();
            $('#tbjenisnilai_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbjenispkm.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahJenisPkm', function() {
                // post the data from the form
                $('#modaltambahJenisPkm').modal('hide');
                $('.overlay').css('display','block');
                $.post("jenisPkm", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbjenispkm.api().ajax.reload();
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


            $(document).on('submit', '#ubahJenisPkm', function() {
                $('#modalUbahJenisPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("jenisPkm/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbjenispkm.api().ajax.reload();
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

            
        $('#modalUbahJenisPkm').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('jenisPkm/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusJenisPkm', function() {
                $('#modalHapusJenisPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("jenisPkm/"+id, $(this).serialize())
                    .done(function(data) {
                            tbjenispkm.api().ajax.reload();
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


            $('#modalHapusJenisPkm').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('jenisPkm/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

             // ----------------------------- **  End Master Jenis PKM ** ---------------------------------// 


        // ----------------------------- **  Master Jenis Publikasi ** ---------------------------------// 

        var tbjenispublikasi = $('#tbjenispublikasi').dataTable( {
                    processing: true,
                    serverSide: true,
                    ajax: 'tbjenispublikasi',
                    columns: [
                        {data: 'no', name: 'no'},
                        {data: 'nama',name:'nama'},
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
                        
            $('#tbjenisnilai_filter input').unbind();
            $('#tbjenisnilai_filter input').bind('keyup', function(e) {
           if(e.keyCode == 13) {
                    tbjenispublikasi.fnFilter(this.value);
             }
        }); 


        $(document).on('submit', '#tambahJenisPublikasi', function() {
                // post the data from the form
                $('#modaltambahJenisPublikasi').modal('hide');
                $('.overlay').css('display','block');
                $.post("publikasi", $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            tbjenispublikasi.api().ajax.reload();
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


            $(document).on('submit', '#ubahJenisPublikasi', function() {
                $('#modalUbahJenisPublikasi').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("publikasi/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbjenispublikasi.api().ajax.reload();
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

            
        $('#modalUbahJenisPublikasi').on('shown.bs.modal', function (e) {
            //$('#id_jalur_masuk').val($(e.relatedTarget).data('id'));
            $('.overlay').css('display','block');
            var id = $(e.relatedTarget).data('id');
            $('#isi').load('publikasi/'+id+'/edit');
            setTimeout(function() {
                    $('.overlay').css('display','none');
            }, 1000);
        }); 

         $(document).on('submit', '#hapusJenisPublikasim', function() {
                $('#modalHapusJenisPkm').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.delete("publikasi/"+id, $(this).serialize())
                    .done(function(data) {
                            tbjenispublikasi.api().ajax.reload();
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


            $('#modalHapusJenisPublikasi').on('shown.bs.modal', function (e) {
                //$('#id_menu').val($(e.relatedTarget).data('id'));
                $('.overlay').css('display','block');
                var id = $(e.relatedTarget).data('id');
                $('#isiHapus').load('publikasi/'+ id +'/hapus');
                setTimeout(function() {
                        $('.overlay').css('display','none');
                }, 1000);
            });

             // ----------------------------- **  End Master Jenis Publikasi ** ---------------------------------// 


            // var chTahunUsulan = $('#tahunUsulan').select2('data');
            // // alert(chTahunUsulan[0].text);
            // var n = chTahunUsulan[0].text.search("Pengabdian");
            // // alert(n);
            // if (n == -1) {
            //     document.getElementById("choose3").style.display = "none";
            //     // document.getElementById("choose4").style.display = "none";
            // }
            // else{
            //     document.getElementById("choose3").style.display = "";
            //     // document.getElementById("choose4").style.display = "";
            // }

            $('#periodeKeputusan').change(function() { 
                $('#prosesCetakSuratKeputusanInternal').attr('href',baseUrl+'/admin/cetaksuratkeputusaninternal?periode='+$('#periodeKeputusan').val()+'&tgl='+$('.tanggalSuratKeputusanInternal').val());
            });

            $('.tanggalSuratKeputusanInternal').change(function() { 
                $('#prosesCetakSuratKeputusanInternal').attr('href',baseUrl+'/admin/cetaksuratkeputusaninternal?periode='+$('#periodeKeputusan').val()+'&tgl='+this.value);
            });

            $('.tanggalSuratKeputusanEksternal').change(function() { 
                $('#prosesCetakSuratKeputusanEksternal').attr('href',baseUrl+'/admin/cetaksuratkeputusaninternal?periode='+$('#periodeKeputusan').val()+'&tgl='+this.value);
            });
            

            $(document).on('submit', '#ubahPassword', function() {
            // post the data from the form
                $('#modalUbahPass').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put(baseUrl+"/admin/ubahpass/"+id, $(this).serialize())
                    .done(function(data) {
                        // 'data' is the text returned, you can do any conditions based on that
                            setTimeout(function() {
                                    $('.overlay').css('display','none');
                                    $("#infotambah").fadeIn(300);
                            }, 1500);
                            setTimeout(function() {
                                    $("#infotambah").fadeOut(2500);
                            }, 2500);
                    });
                        
                return false;
            });


            $(document).on('submit', '#hapusUsulanEksternal', function() {
                $('#daftarModalHapusUsulanEksternalDosen').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("hapususulaneksternal/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbMonitoringUsulanEksternalDosen.api().ajax.reload();
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

            $(document).on('submit', '#hapusUsulanInternal', function() {
                $('#daftarModalHapusUsulanInternalDosen').modal('hide');
                $('.overlay').css('display','block');
                var id = $("#id").val();
                $.put("hapususulaninternal/"+ id, $(this).serialize())
                    .done(function(data) {
                            tbMonitoringUsulanInternalDosen.api().ajax.reload();
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


    function filterJenisUsulanInternal(){
        $('#tbMonitoringUsulanInternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanKemajuanInternal(){
        $('#tbMonitoringKemajuanInternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanAkhirInternal(){
        $('#tbMonitoringAkhirInternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanAnggaranInternal(){
        $('#tbMonitoringAnggaranInternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanBelanjaInternal(){
        $('#tbMonitoringBelanjaInternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanPublikasiInternal(){
        $('#tbMonitoringPublikasiInternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanEksternal(){
        $('#tbMonitoringUsulanEksternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanKemajuanEksternal(){
        $('#tbMonitoringKemajuanEksternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanAkhirEksternal(){
        $('#tbMonitoringAkhirEksternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanAnggaranEksternal(){
        $('#tbMonitoringAnggaranEksternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanBelanjaEksternal(){
        $('#tbMonitoringBelanjaEksternal').dataTable().api().ajax.reload();
    }

    function filterJenisUsulanPublikasiEksternal(){
        $('#tbMonitoringPublikasiEksternal').dataTable().api().ajax.reload();
    }
    function filterJenisRiwayatInternal(){
        $('#tbMonitoringUsulanInternalDosen').dataTable().api().ajax.reload();
    }
    function filterJenisRiwayatEksternal(){
        $('#tbMonitoringUsulanEksternalDosen').dataTable().api().ajax.reload();
    }
    function filterCetakInternal(){
        $('#tbcetakinternal').dataTable().api().ajax.reload();
    }
    function filterCetakEksternal(){
        $('#tbcetakeksternal').dataTable().api().ajax.reload();
    }

    function checkRequiredMonitoringValidasiUsulanInternal(){
        for (var i = $('.repeater-nilai').length; i >= 1; i--) {
            if($('#keterangan'+i).val() == ""){
                $('#keterangan-required'+i).addClass('has-error');
                $('#keterangan'+i).focus();
            }

            if($('#nilai'+i).val() == ""){
                $('#nilai-required'+i).addClass('has-error');
                $('#nilai'+i).focus();
            }
        }

        if($('#danaDisetujui').val() == ""){
            $('.danaDisetujui-required').addClass('has-error');
            $('#danaDisetujui').focus();
        } 

        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiUsulanEksternal(){
        for (var i = $('.repeater-nilai').length; i >= 1; i--) {
            if($('#keterangan'+i).val() == ""){
                $('#keterangan-required'+i).addClass('has-error');
                $('#keterangan'+i).focus();
            }

            if($('#nilai'+i).val() == ""){
                $('#nilai-required'+i).addClass('has-error');
                $('#nilai'+i).focus();
            }
        }

        if($('#danaDisetujui').val() == ""){
            $('.danaDisetujui-required').addClass('has-error');
            $('#danaDisetujui').focus();
        } 

        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiKemajuanInternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiKemajuanEksternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiAkhirInternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiAkhirEksternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiAnggaranInternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiAnggaranEksternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiBelanjaInternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiBelanjaEksternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiPublikasiInternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }


    function checkRequiredMonitoringValidasiPublikasiEksternal(){
        if($('#statusProposal').val() == ""){
            $('.statusProposal-required').addClass('has-error');
            $('#statusProposal').focus();
        }  
    }





    function showPengesahan()
     {
        idprodi = document.getElementById("programStudi").value;
        
        $.ajax({
            url : "usulanInternal/showPengesahan/"+idprodi,
            dataType : "json",
            success : function(data){
             $("#jabatanMengetahui").val(data.jabatan);
             $("#namaMengetahui").val(data.nama);
             $("#idMengetahui").val(data.id);
             }
         });
         
         return false;
     }

     function showPengesahanEksternal()
     {
        idprodi = document.getElementById("programStudi").value;
        
        $.ajax({
            url : "usulaneksternal/showPengesahan/"+idprodi,
            dataType : "json",
            success : function(data){
             $("#jabatanMengetahui").val(data.jabatan);
             $("#namaMengetahui").val(data.nama);
             $("#idMengetahui").val(data.id);
             }
         });
         
         return false;
     }

    function showPengesahan2()
     {
        idUsulan = $('#idUsulan').val();
        idprodi = document.getElementById("programStudis").value;

        // alert(idUsulan);
        $.ajax({
            url : idUsulan+"/showPengesahan2/"+idprodi,
            dataType : "json",
            success : function(data){
             $("#jabatanMengetahuis").val(data.jabatan);
             $("#namaMengetahuis").val(data.nama);
             $("#idMengetahuis").val(data.id);
             }
         });
         
         return false;
     }

     function showPengesahaneksternal2()
     {
        idUsulan = $('#idUsulan').val();
        idprodi = document.getElementById("programStudis").value;

        // alert(idUsulan);
        $.ajax({
            url : idUsulan+"/showPengesahaneksternal2/"+idprodi,
            dataType : "json",
            success : function(data){
             $("#jabatanMengetahuis").val(data.jabatan);
             $("#namaMengetahuis").val(data.nama);
             $("#idMengetahuis").val(data.id);
             }
         });
         
         return false;
     }

     function showTahunPelaksanaan(baseUrl)
     {
        idTahunUsulan = document.getElementById("tahunUsulan").value;

        $.ajax({
            url : "usulanInternal/showTahunPelaksanaan/"+idTahunUsulan,
            dataType : "json",
            success : function(data){
             if(data.status == true){
                window.location = baseUrl+"/admin/alreadyexist";
             }else{
                $("#tahunPelaksanaan").val(data.tahun_pelaksanaan);
             }
             // alert(data.tahun_pelaksanaan);
             }
         });
         
        var chTahunUsulan = $('#tahunUsulan').select2('data');
        // alert(chTahunUsulan[0].text);

        var n = chTahunUsulan[0].text.search("Pengabdian");
        // alert(n);
        if (n == -1) {
            document.getElementById("choose1").style.display = "none";
        }
        else{
            document.getElementById("choose1").style.display = "";
        }
        
         return false;
     }

     function showTahunPelaksanaanEksternal(baseUrl)
     {
        idTahunUsulan = document.getElementById("tahunUsulan").value;

        $.ajax({
            url : "usulaneksternal/showTahunPelaksanaan/"+idTahunUsulan,
            dataType : "json",
            success : function(data){
             if(data.status == true){
                window.location = baseUrl+"/admin/alreadyexist";
             }else{
                $("#tahunPelaksanaan").val(data.tahun_pelaksanaan);
             }
             // alert(data.tahun_pelaksanaan);
             }
         });

        var chTahunUsulan = $('#tahunUsulan').select2('data');
        // alert(chTahunUsulan[0].text);
        var n = chTahunUsulan[0].text.search("Pengabdian");
        // alert(n);
        if (n == -1) {
            document.getElementById("choose2").style.display = "none";
        }
        else{
            document.getElementById("choose2").style.display = "";
        }
         
         return false;
     }

    function showTahunPelaksanaan2()
     {
        idPeriode = $('#id_periode').val();
        idTahunUsulan = document.getElementById("tahunUsulan").value;

        $.ajax({
            url : idPeriode+"/showTahunPelaksanaan2/"+idTahunUsulan,
            dataType : "json",
            success : function(data){
                 if(data.status == true){
                    window.location = baseUrl+"/admin/alreadyexist";
                 }else{
                    $("#tahunPelaksanaan").val(data.tahun_pelaksanaan);
                 }
             }
         });

        var chTahunUsulan = $('#tahunUsulan').select2('data');
        // alert(chTahunUsulan[0].text);
        var n = chTahunUsulan[0].text.search("Pengabdian");
        // alert(n);
        if (n == -1) {
            document.getElementById("choose3").style.display = "none";
        }
        else{
            document.getElementById("choose3").style.display = "";
        }
         
         return false;
     }


    function showTahunPelaksanaanEksternal2()
     {
        idPeriode = $('#id_periode').val();
        idTahunUsulan = document.getElementById("tahunUsulan").value;

        $.ajax({
            url : idPeriode+"/showTahunPelaksanaanEksternal2/"+idTahunUsulan,
            dataType : "json",
            success : function(data){
                if(data.status == true){
                    window.location = baseUrl+"/admin/alreadyexist";
                }else{
                    $("#tahunPelaksanaan").val(data.tahun_pelaksanaan);
                }
             }
         });

        var chTahunUsulan = $('#tahunUsulan').select2('data');
        // alert(chTahunUsulan[0].text);
        var n = chTahunUsulan[0].text.search("Pengabdian");
        // alert(n);
        if (n == -1) {
            document.getElementById("choose4").style.display = "none";
        }
        else{
            document.getElementById("choose4").style.display = "";
        }
         
         return false;
     }



     //----------------------------------untuk tombol APPROVE---------------------------------------

    //-------------------taruh di paling bawah file.jsnya setelah document ready------------------------

    function approveUsulan(id_usulan, id_dosen, judul, peneliti){
        $.confirm({
        title: 'Konfirmasi Approve',
        content: 'Apakah Anda Ingin Bergabung Dalam Penelitian dengan Judul "'+judul+'" dan '+peneliti+' sebagai Ketua Peneliti ?',
        buttons: {
            Ya: {
                text: 'Setuju',
                btnClass: 'btn-green',
                keys: ['enter', 'shift'],
                action: function () {
                    $('.overlay').css('display','block');
                    $.ajax({
                        url: baseUrl + '/admin/daftarusulaninternaldosen/ajaxApproveUsulan',
                        type: 'POST',
                        headers: {
                                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                                },
                        data: {id_usulan: id_usulan,
                               id_dosen: id_dosen},
                        success: function(result){    
                            if(result == "Success"){
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        alert("Selamat Anda Telah Bergabung Dengan Tim");
                                }, 1000);
                                $('#tbMonitoringUsulanInternalDosen').dataTable().api().ajax.reload();
                            }
                        } 
                    });
                }
            },
            Tidak: {
                text: 'Tidak Setuju',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
                action: function () {
                    $('.overlay').css('display','block');
                    $.ajax({
                        url: baseUrl + '/admin/daftarusulaninternaldosen/ajaxApproveUsulan2',
                        type: 'POST',
                        headers: {
                                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                                },
                        data: {id_usulan: id_usulan,
                               id_dosen: id_dosen},
                        success: function(result){    
                            if(result == "Success"){
                                setTimeout(function() {
                                        $('.overlay').css('display','none');
                                        alert("Anda Menolak Untuk Bergabung");
                                }, 1000);
                                $('#tbMonitoringUsulanInternalDosen').dataTable().api().ajax.reload();
                            }
                        } 
                    });
                }
            },
            somethingElse: {
                text: 'Batal',
                // btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    
                }
            }
        }
    });
    }

    function approveUsulanEksternal(id_usulan, id_dosen){
        $.confirm({
        title: 'Konfirmasi Approve',
        content: 'Apakah Anda Ingin Bergabung?',
        buttons: {
            Ya: function () {
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/ajaxApproveUsulanEksternal',
                    type: 'POST',
                    headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },
                    data: {id_usulan: id_usulan,
                           id_dosen: id_dosen},
                    success: function(result){    
                        if(result == "Success"){
                            alert("Selamat Anda Telah Bergabung Dengan Tim");
                            $('#tbMonitoringUsulanEksternalDosen').dataTable().api().ajax.reload();
                        }
                    } 
                });
            },
            Tidak: function () {
                $.ajax({
                    url: baseUrl + '/admin/daftarusulaneksternaldosen/ajaxApproveUsulanEksternal2',
                    type: 'POST',
                    headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },
                    data: {id_usulan: id_usulan,
                           id_dosen: id_dosen},
                    success: function(result){    
                        if(result == "Success"){
                            alert("Anda Menolak Untuk Bergabung");
                            $('#tbMonitoringUsulanEksternalDosen').dataTable().api().ajax.reload();
                        }
                    } 
                });
            },
            somethingElse: {
                text: 'Batal',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    
                }
            }
        }
    });
    }
    //----------------------------------untuk tombol APPROVE---------------------------------------


    $(function()
    {
        var count = 1;
        $(document).on('click', '.btn-add4', function(e)
        {
            e.preventDefault();

            var controlForm = $('.controls4:first'),
                currentEntry = $(this).parents('.entry4:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');

            controlForm.find('.entry4:not(:last) .btn-add4')
                .removeClass('btn-add4').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-minus"></span>');
                
        }).on('click', '.btn-remove', function(e)
        {
          $(this).parents('.entry4:first').remove();
            count = count - 1;
            e.preventDefault();
            return false;
        });

    });


    function dontValidateUsulan(){
        alert("Anggota 1 atau anggota 2 belum melakukan approve");
    }

    // function CheckRequired(event) {
    //     var $form = $(this);

    //     if ($form.find('.required').filter(function(){ return this.value === '' }).length > 0) {
    //         event.preventDefault();
    //         alert("Pastikan Tidak Ada Data Yang Kosong, Cek Kembali Di Step Sebelumnya");
    //         return false;
    //     }
    // }

    function activaTab(tab){
        $('.bs-wizard a[href="#' + tab + '"]').tab('show');
    };


/*
     * LetterAvatar
     * 
     * Artur Heinze
     * Create Letter avatar based on Initials
     * based on https://gist.github.com/leecrossley/6027780
     */
    (function(w, d){


        function LetterAvatar (name, size) {

            name  = name || '';
            size  = size || 60;

            var colours = [
                    "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
                    "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ],

                nameSplit = String(name).toUpperCase().split(' '),
                initials, charIndex, colourIndex, canvas, context, dataURI;


            if (nameSplit.length == 1) {
                initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
            } else {
                initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
            }

            if (w.devicePixelRatio) {
                size = (size * w.devicePixelRatio);
            }
                
            charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
            colourIndex   = charIndex % 20;
            canvas        = d.createElement('canvas');
            canvas.width  = size;
            canvas.height = size;
            context       = canvas.getContext("2d");
             
            context.fillStyle = colours[colourIndex - 1];
            context.fillRect (0, 0, canvas.width, canvas.height);
            context.font = Math.round(canvas.width/2)+"px Arial";
            context.textAlign = "center";
            context.fillStyle = "#FFF";
            context.fillText(initials, size / 2, size / 1.5);

            dataURI = canvas.toDataURL();
            canvas  = null;

            return dataURI;
        }

        LetterAvatar.transform = function() {

            Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
                name = img.getAttribute('avatar');
                img.src = LetterAvatar(name, img.getAttribute('width'));
                img.removeAttribute('avatar');
                img.setAttribute('alt', name);
            });
        };


        // AMD support
        if (typeof define === 'function' && define.amd) {
            
            define(function () { return LetterAvatar; });
        
        // CommonJS and Node.js module support.
        } else if (typeof exports !== 'undefined') {
            
            // Support Node.js specific `module.exports` (which can be a function)
            if (typeof module != 'undefined' && module.exports) {
                exports = module.exports = LetterAvatar;
            }

            // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
            exports.LetterAvatar = LetterAvatar;

        } else {
            
            window.LetterAvatar = LetterAvatar;

            d.addEventListener('DOMContentLoaded', function(event) {
                LetterAvatar.transform();
            });
        }

    })(window, document);

//Penambahan Christ


    var max_fields      = 7; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrapsss"); //Fields wrapper
    var add_button      = $(".add_fieldsss"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label class="col-md-2 control-label">Nama Mitra</label><div class="col-md-8"><input type="text" class="file1 form-control" multiple="multiple" id="fileUpload1" name="mitra[]" placeholder="Nama Mitra"/></div><button class="remove_field btn btn-danger"><i class="fa fa-minus"></i></button></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    var max_fields2      = 7; //maximum input boxes allowed
    var wrapper2        = $(".input_fields_wrapsss2"); //Fields wrapper
    var add_button2      = $(".add_fieldsss2"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button2).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields2){ //max input box allowed
            x++; //text box increment
            $(wrapper2).append('<div class="form-group"><label class="col-md-2 control-label">Nama Mitra</label><div class="col-md-8"><input type="text" class="file1 form-control" multiple="multiple" id="fileUpload1" name="mitra[]" placeholder="Nama Mitra"/></div><button class="remove_field btn btn-danger"><i class="fa fa-minus"></i></button></div>'); //add input box
        }
    });
    
    $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    var max_fields3      = 7; //maximum input boxes allowed
    var wrapper3        = $(".input_fields_wrapsss3"); //Fields wrapper
    var add_button3      = $(".add_fieldsss3"); //Add button ID
    var wrap = $(".tes1").length;

    // alert(wrap);

    var x = wrap; //initlal text box count
    $(add_button3).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields3){ //max input box allowed
            x++; //text box increment
            $(wrapper3).append('<div class="form-group"><label class="col-md-2 control-label">Nama Mitra</label><div class="col-md-8"><input type="text" class="file1 form-control" multiple="multiple" id="fileUpload1" name="mitra[]" placeholder="Nama Mitra"/></div><button class="remove_field btn btn-danger"><i class="fa fa-minus"></i></button></div>'); //add input box
        }
    });
    
    $(wrapper3).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })


