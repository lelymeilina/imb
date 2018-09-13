        <!-- Start Footer Section -->
        <footer>
            <div class="container">
                
                <!-- Start Copyright -->
                <div class="copyright-section">
                    <div class="row">
                        <div align="center">
                            <p>&copy; 2018 IMB Karangasem -  All Rights Reserved <a target="_blank" href="http://karangasemkab.go.id">Kabupaten Karangasem</a> </p>
                        </div><!-- .col-md-6 -->
                      
                    </div><!-- .row -->
                </div>
                <!-- End Copyright -->

            </div>
        </footer>
        <!-- End Footer Section -->

    {!! Html::script('assets/plugins/select2/select2.full.min.js') !!}
    <div id="reloadSelect2">
        <!-- <script type="text/javascript">
            $(".select2").select2();
        </script> -->
    </div>
    <script type="text/javascript">
        $(".select2").select2();
        var isLogin = '{{Auth::check()}}';
        var baseUrlFoot = '{{URL("/")}}';
        var get = [];
        location.search.replace('?','').split('&').forEach(function(val){
            split = val.split("=",2);
            get[split[0]] = split[1];
        });

        var url = window.location;
        //hanya akan bekerja pada href string yg matches dengan lokasi
        if($('ul li a[href="'+ url +'"]').length < 1){
            $('ul li a[href="{{URL("")}}"]').addClass('active');
        }else{
            $('ul li a[href="'+ url +'"]').addClass('active');
        }

	if(url == baseUrlFoot+"/hasil-suara" || url == baseUrlFoot+"/hasil-suara?pemilu=0" || url == baseUrlFoot+"/hasil-suara?pemilu=1" || url == baseUrlFoot+"/hasil-suara?pemilu=2"){
		setTimeout(function() {
			location.reload();
        	}, 20000);
	}

    $('.addButton').on('click', function() {
        var index = $(this).data('index');
        if (!index) {
            index = 1;
            $(this).data('index', 1);
        }
        index++;
        $(this).data('index', index);
        var template     = $(this).attr('data-template'),
            $templateEle = $('#' + template + 'Template'),
            $row         = $templateEle.clone().attr('id','ele_wrap'+index).insertBefore($templateEle).removeClass('hide'),
            $el1         = $row.find('input.tmp_volume').eq(0).attr('name', 'volume[]').attr('id','volume'+index),
            $el2         = $row.find('select.fungsi_bangunan').eq(0).attr('name', 'id_harga_bangunan_prasarana[]').attr('id','id_harga_bangunan_prasarana'+index).addClass('select2');

        $(".select2").select2({
           /* placeholder: "Select an option"*/
         });

        $row.on('click', '.removeButton', function(e) {

            $row.remove();
        });
    });

    // $(function()
    // {
    //     $(document).on('click', '.btn-add', function(e)
    //     {
    //         e.preventDefault();

    //         var controlForm = $('.controls:first'),
    //             currentEntry = $(this).parents('.entry:first'),
    //             newEntry = $(currentEntry.clone()).appendTo(controlForm);

    //         newEntry.find('input').val('');
    //         controlForm.find('.entry:not(:last) .btn-add')
    //             .removeClass('btn-add').addClass('btn-remove')
    //             .removeClass('btn-success').addClass('btn-danger')
    //             .html('<span class="glyphicon glyphicon-minus"></span>');
    //         select2 select2-container select2-container--default select2-container--above
    //         $('.select2').select2();

    //     }).on('click', '.btn-remove', function(e)
    //     {
    //       $(this).parents('.entry:first').remove();

    //         e.preventDefault();
    //         // $('.select2').select2();
    //         return false;
    //     });
    // });

    </script>

        
