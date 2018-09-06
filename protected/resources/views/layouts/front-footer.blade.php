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


    <script type="text/javascript">
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

    </script>

        
