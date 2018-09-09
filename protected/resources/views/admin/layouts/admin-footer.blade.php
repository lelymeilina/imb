  
    <!-- AdminLTE for demo purposes -->
        <!--jQuery Include-->
    <!-- jQuery 2.1.4 -->
    {!! Html::script('assets/plugins/jQuery/jQuery-2.1.4.min.js') !!}
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.js') !!}
    <!-- FastClick -->
    {!! Html::script('assets/plugins/fastclick/fastclick.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('assets/dist/js/app.min.js') !!}
    <!-- Sparkline -->
    {!! Html::script('assets/plugins/sparkline/jquery.sparkline.min.js') !!}
    <!-- jvectormap -->
    {!! Html::script('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
    {!! Html::script('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    <!-- SlimScroll 1.3.0 -->
    {!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
    <!-- ChartJS 1.0.1 -->
    {!! Html::script('assets/plugins/chartjs/Chart.min.js') !!}
    <!-- datatables -->
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/plugins/select2/select2.full.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {!! Html::script('assets/dist/js/demo.js') !!}
    <!-- jquery -->
    {!! Html::script('assets/js/datepicker.js') !!}
    {!! Html::script('assets/js/jquery.nicescroll.min.js') !!}

    <!-- inputmask -->
    {!! Html::script('assets/plugins/input-mask/jquery.inputmask.js') !!}
    {!! Html::script('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}
    {!! Html::script('assets/plugins/input-mask/jquery.inputmask.extensions.js') !!}
    {!! Html::script('assets/plugins/input-mask/jquery.inputmask.numeric.extensions.js') !!}
    {!! Html::script('assets/plugins/input-mask/jquery.inputmask.phone.extensions.js') !!}
    {!! Html::script('assets/plugins/input-mask/jquery.inputmask.regex.extensions.js') !!}
    

    
    {!! Html::script('assets/js/jquery-confirm.min.js') !!}

    <script type="text/javascript">
        var baseUrl = "{{ URL('/') }}";
    </script>

    {!! Html::script('assets/plugins/bootstrap-wysihtml5/summernote.js') !!}
    <meta name="_token" content="{!! csrf_token() !!}">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height:200,
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                        // upload image to server and create imgNode...
                        sendFile(files[0], editor, welEditable);
                    },
                    onMediaDelete : function($target, editor, $editable) {
                        delFile($target[0].src);
                    }
                }
            });
            $('#slimbox').slimScroll({
                height: '500px',
                color: '#473eec',
                alwaysVisible: true,
                railVisible: true
            });
        });
        function delFile(link){
            data = new FormData();
            data.append("link",link);
            $.ajax({
                data: data,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: "ajaxdelimage",
                cache: false,
                contentType: false,
                processData: false,
            })
        }
        function sendFile(file, editor, welEditable){
            data = new FormData();
            data.append("file",file);
            data.append("id_category",$('#id_category').val());
            $.ajax({
                data: data,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: "ajaximage",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url){
                    $('#summernote').summernote('insertImage', url, function ($image){
                        $image.css('padding-right', '10px');
                        $image.css('padding-bottom', '10px');
                        $image.css('padding-top', '5px');
                    });
                }
            })
        }
    </script>

    {!! Html::script('assets/js/main.js') !!}