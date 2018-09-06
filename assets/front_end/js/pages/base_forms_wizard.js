/*
 *  Document   : base_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */

var BaseFormWizard = function() {
    // Init simple wizard, for more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/
    /*var initWizardSimple = function(){
        jQuery('.js-wizard-simple').bootstrapWizard({
            'tabClass': '',
            'firstSelector': '.wizard-first',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'lastSelector': '.wizard-last',
            'onTabShow': function($tab, $navigation, $index) {
		var $total      = $navigation.find('li').length;
		var $current    = $index + 1;
		var $percent    = ($current/$total) * 100;

                // Get vital wizard elements
                var $wizard     = $navigation.parents('.block');
                var $progress   = $wizard.find('.wizard-progress > .progress-bar');
                var $btnPrev    = $wizard.find('.wizard-prev');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

                // Update progress bar if there is one
		if ($progress) {
                    $progress.css({ width: $percent + '%' });
                }

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            }
        });
    };*/

    // Init wizards with validation, for more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/
    var initWizardValidation = function(){
        // Get forms
        /*var $form1 = jQuery('.js-form1');*/
        var $form2 = jQuery('.js-form2');

        // Prevent forms from submitting on enter key press
        /*$form1.add($form2).on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });*/

        // Init form validation on classic wizard form
        /*var $validator1 = $form1.validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'validation-classic-firstname': {
                    required: true,
                    minlength: 2
                },
                'validation-classic-lastname': {
                    required: true,
                    minlength: 2
                },
                'validation-classic-email': {
                    required: true,
                    email: true
                },
                'validation-classic-details': {
                    required: true,
                    minlength: 5
                },
                'validation-classic-city': {
                    required: true
                },
                'validation-classic-skills': {
                    required: true
                },
                'validation-classic-terms': {
                    required: true
                }
            },
            messages: {
                'validation-classic-firstname': {
                    required: 'Please enter a firstname',
                    minlength: 'Your firtname must consist of at least 2 characters'
                },
                'validation-classic-lastname': {
                    required: 'Please enter a lastname',
                    minlength: 'Your lastname must consist of at least 2 characters'
                },
                'validation-classic-email': 'Please enter a valid email address',
                'validation-classic-details': 'Let us know a few thing about yourself',
                'validation-classic-skills': 'Please select a skill!',
                'validation-classic-terms': 'You must agree to the service terms!'
            }
        });*/

        // Init form validation on the other wizard form
        var $validator2 = $form2.validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'jenjang': {
                    required: true
                },
                'prodi': {
                    required: true
                },
                'konsentrasi': {
                    required: true
                },
                'validation-fullname': {
                    required: true,
                    minlength: 3
                },
                'validation-tempatlahir': {
                    required: true
                },
                'validation-tgllahir': {
                    required: true
                },
                'validation-namaibu': {
                    required: true
                },
                'validation-nik': {
                    required: true,
                    minlength: 5
                },
                'validation-jeniskelamin': {
                    required: true
                },
                'validation-tahunmasuks1': {
                    required: true,
                    maxlength: 4,
                    minlength: 4,
                    digits: true
                },
                'validation-tahunluluss1': {
                    required: true,
                    maxlength: 4,
                    minlength: 4,
                    digits: true
                },
                'validation-gelars1': {
                    required:true
                },
                'validation-ipks1' : {
                    required:true
                },
                'validation-universitass1' : {
                    required:true
                },
                'validation-prodis1' : {
                    required:true
                },
                'validation-tahunmasuks2': {
                    required: true,
                    maxlength: 4,
                    minlength: 4,
                    digits: true
                },
                'validation-tahunluluss2': {
                    required: true,
                    maxlength: 4,
                    minlength: 4,
                    digits: true
                },
                'validation-gelars2': {
                    required:true
                },
                'validation-ipks2' : {
                    required:true
                },
                'validation-universitass2' : {
                    required:true
                },
                'validation-prodis2' : {
                    required:true
                }
            },
            messages: {
                'jenjang': 'Jenjang studi harus dipilih',
                'prodi': 'Program harus diplih',
                'konsentrasi'     : 'Konsentrasi harus diplih',
                'validation-fullname': {
                    required: 'Nama lengkap belum terisi',
                    minlength: 'Nama lengkap harus lebih dari 3 huruf'
                },
                'validation-tempatlahir': 'Tempat lahir belum terisi',
                'validation-tgllahir'   : 'Belum memilih tanggal lahir',
                'validation-namaibu'    : 'Nama gadis ibu kandung belum terisi',
                'validation-nik': {
                    required: 'NIK belum terisi',
                    minlength: 'NIK harus lebih dari 5 karakter'
                },
                'validation-jeniskelamin': 'Jenis kelamin belum dipilih',
                'validation-agama': 'Agama belum dipilih',
                'validation-tahunmasuks1': {
                    required: 'Tahun masuk S1 belum diisi',
                    maxlength: 'Tahun masuk harus 4 digit angka',
                    minlength: 'Tahun masuk harus 4 digit angka',
                    digits: 'Input hanya boleh angka'
                },
                'validation-tahunluluss1': {
                    required: 'Tahun lulus S1 belum diisi',
                    maxlength: 'Tahun lulus harus 4 digit angka',
                    minlength: 'Tahun lulus harus 4 digit angka',
                    digits: 'Input lulus boleh angka'
                },
                'validation-gelars1' : 'Gelar S1 belum diisi',
                'validation-ipks1' : 'IPK S1 belum diisi',
                'validation-universitass1' : 'Universitas S1 belum diisi',
                'validation-prodis1' : 'Program studi S1 belum diisi',
                'validation-tahunmasuks2': {
                    required: 'Tahun masuk S2 belum diisi',
                    maxlength: 'Tahun masuk harus 4 digit angka',
                    minlength: 'Tahun masuk harus 4 digit angka',
                    digits: 'Input hanya boleh angka'
                },
                'validation-tahunluluss2': {
                    required: 'Tahun lulus S2 belum diisi',
                    maxlength: 'Tahun lulus harus 4 digit angka',
                    minlength: 'Tahun lulus harus 4 digit angka',
                    digits: 'Input lulus boleh angka'
                },
                'validation-gelars2' : 'Gelar S2 belum diisi',
                'validation-ipks2' : 'IPK S2 belum diisi',
                'validation-universitass2' : 'Universitas S2 belum diisi',
                'validation-prodis2' : 'Program studi S2 belum diisi'
                
            }
        });

        // Init classic wizard with validation
       /* jQuery('.js-wizard-classic-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
		var $total      = $nav.find('li').length;
		var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form1.valid();

                if(!$valid) {
                    $validator1.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
		return false;
            }
        });*/

        // Init wizard with validation
        jQuery('.js-wizard-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
		var $total      = $nav.find('li').length;
		var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form2.valid();

                if(!$valid) {
                    $validator2.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
		return false;
            }
        });
    };

    return {
        init: function () {
            // Init simple wizard
            /*initWizardSimple();*/

            // Init wizards with validation
            initWizardValidation();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormWizard.init(); });