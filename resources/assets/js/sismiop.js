$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});
$.fn.rowCount = function() {
    return $('tr', $(this).find('tbody')).length;
};

var permission;
$.extend({
    getValues: function(url) {
        var result = null;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            async: false,
            success: function(data) {
                result = data;
            }
        });
        return result;
    }
});

function getjson(url){
    var result = null;
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        async: false,
        success: function(data) {
            result = data;
        }
    });
     return result;
} 
function numeralsOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
    ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode != 46)) {
            alert("Hanya Nomor yang bisa di input pada kolom ini.");
            console.log(evt);
            return false;
        }
    return true;
}
function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        alert("hanya huruf saja.");
        return false;
    }
    return true;
}
function ynOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 31 && charCode != 78 && charCode != 89 && charCode != 110 && charCode != 121) {
    alert("Masukan hanya \"Y\" atau \"N\".");

    return false;
    }
    return true;
}
function rangeNumber(evt) {

    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
    ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Hanya Nomor yang bisa di input pada kolom ini.");
                $(this).val(0);
            return false;
        }
        var max = 100;
        var min = 0;
        if ($(this).val() > max){
             $(this).val(max);
        }else if($(this).val() < min){
             $(this).val(min);
        }
    return true;
}
function hasRole(name){
    permission = getjson('/api/checkpermission');
    var ret = null;
    for(i in permission){
        console.log(permission[i]);
        if (permission[i] == name) {
                return true;
        }
    }        
}
function base64image(resFile) {
    var reader = new FileReader();
    reader.readAsDataURL(resFile);
    reader.onloadend = function(evt) {
      return (evt.target.result);
    }
}

function loaddatawilayah(url,data=''){
    console.log('Load adata')
    return $.ajax({
        url: url,
        dataType: "json",
        beforeSend: function() {
            $('.loader').show();
            $("#loader-wrapper").show();
        },
    });
    
}
(function($, window, document){
    $("#loader-wrapper").hide();
}(jQuery, window, document));

(function($, window, document){
    $('.formConfirm').on('click', function(e) {
        
        e.preventDefault();
        
        if($(this).hasClass('disabled')) return;

        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html('<h6>'+msg+'</h6>')
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
    });

    $('#formConfirm').on('click', '#frm_submit', function(e) {
        var id = $(this).attr('data-form');
        console.log(id);
        $(id).submit();
    });

    
}(jQuery, window, document));
//Jam Online
(function($, window, document){
    if( $( '.rt-clock' ).length > 0 ){
        var monthNames = [ 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember' ];
        var dayNames= [ 'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu' ];

        var newDate = new Date();

        newDate.setDate(newDate.getDate());

        var date = dayNames[ newDate.getDay() ] + ', ' + newDate.getDate() + ' ' + monthNames[ newDate.getMonth() ] + ' ' + newDate.getFullYear();

        $( '.rt-clock .date' ).html( date );

        setInterval(
            function() {
                var seconds = new Date().getSeconds();
                $(".rt-clock .seconds").html(( seconds < 10 ? "0" : "" ) + seconds);
            },1000 );

        setInterval(
            function() {
                var minutes = new Date().getMinutes();
                $(".rt-clock .minutes").html(( minutes < 10 ? "0" : "" ) + minutes);
            },1000);

        setInterval(
            function() {
                var hours = new Date().getHours();
                $(".rt-clock .hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);
    }
}(jQuery, window, document));
//Upload
(function($, window, document){
    var hasChanged = false;
    $(window).bind('beforeunload', function(){
      if(hasChanged){
        return "You have unsaved changes";
        hasChanged = false;
      } 
    });
    $('input[type=text]').change(function(){
        hasChanged = true;
    });
   
    $('.formUpload').on('click', function(e) {
        var bangunan_file = $(this).closest('span').find('.bangunan_file');
        
        if (bangunan_file.length > 0) {
            bangunan_file.trigger('click');
        }
    });
    $('.fileupload:file').change(function(){
        var fileinput = $(this);
        var file = this.files[0];
        name = file.name;
        size = file.size;
        type = file.type;
        
        if(file.name.length < 1) {
        }else if(file.size > 209715200) {
            alert("File Terlalu Besar, Maksimal 200 Mb");
        }else if(file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg' && file.type != 'application/pdf' && file.type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            alert("File tidak diijinkan untuk di upload");
            $(this).val('');
        }else { 
            var formData = new FormData($('*formId*')[0]);
            if(!!file.type.match(/.*/)){
                formData.append("images", file);
            }
                
            $.ajax({
                url: "/kuesioner/bangunan/upload",
                type: "POST",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType:'json',
                beforeSend: function(){
                    $("#loader-wrapper").show();
                },
                complete: function(){   
                    $("#loader-wrapper").hide();
                },
                success: function(data){
                    if($('.bangunan_foto').length > 0) {
                        fileinput.closest('div.controlupload').find('.bangunan_foto')
                            .css({"color": "peru", "border": "2px solid blue"}).val(data.filename);
                        fileinput.parent().parent().parent().find('img._foto').attr('src','/files/foto/bangunan/'+data.filename);
                    }
                },
                error: errorHandler = function() {
                    alert("Something went wrong!");
                },
            });
        }
    });
}(jQuery, window, document));

//Table
(function($, window, document){
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        pagingType: 'full_numbers',
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            "decimal":        "",
            "emptyTable":     "Tidak ada data",
            "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered":   "(dari _MAX_ total data)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Data _MENU_ ",
            "loadingRecords": "Tunggu Sebentar...",
            "processing":     "Proses...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ada data yang dicari..",
            "paginate": {
                "first":      "<<",
                "last":       ">>",
                "next":       ">",
                "previous":   "<"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        
        }

    });

    var table_user = $('#table_user').DataTable();
    var table_role = $('#table_role').DataTable();
    var table_layer = $('#table_layer').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/layers/getdata',
        columns: [
            {
                //"className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent":   
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                '<li><a class="edit">Edit</a></li>' +
                                '<li data-title="Hapus Layer" data-message="Hapus Layer ??"><a class="hapus">Hapus</a></li>' +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            {data: 'layername'},
            {data: 'layerurl'},
            {data: 'layer'},
            
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
        }
        
    });
    $('#table_layer tbody').on('click', 'a',function(e) {
        var data =  table_layer.row($(this).parents('tr')).data();
        var id = data.id_layer;
        //console.log(data);
        if ($(this).hasClass('edit')) {
            document.location ='/layers/'+id+'/ubah';
        }else if ($(this).hasClass('lihat')) {
            document.location ='/layers/'+id+'/lihat';
        }else if($(this).hasClass('hapus')){
            e.preventDefault();
            var el = $(this).parent();
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');
           
            var newForm = jQuery('<form>', {
                'action': '/layers/'+id+'/hapus',
                'target': '_top',
                'method' : 'post',
            }).append(jQuery('<input>', {
                'name': '_method',
                'value': 'DELETE',
                'type': 'hidden'
            })).append($('<input />',{
                'name': '_token',
                'value': $('meta[name="_token"]').attr('content'),
                'type': 'hidden'
            }));

            $('#formConfirm')
            .find('#frm_body').html('<h6>'+msg+'</h6>').append(newForm)
            .end().find('#frm_title').html(title)
            .end().modal('show');
            
            $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);

            
            $('#formConfirm').on('click', '#frm_submit', function(e) {
                //var id = $(this).attr('data-form');
                //console.log(newForm);
                newForm.submit();
                //$(id).submit();
            });
        }
        table_layer.draw();
    });
    var table_bangunan = $('#table_bangunan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/kuesioner/bangunan/getdata',
        columns: [
            {
                //"className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent":   
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                '<li><a class="edit">Edit</a></li>' +
                                '<li data-title="Hapus Bangunan" data-message="Hapus Bangunan ??"><a class="hapus">Hapus</a></li>' +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            {data: 'no_responden', name: 'no_responden'},
            {data: 'nama', name: 'nama'},
            {data: 'jeniskontruksi', name: 'jeniskontruksi'},
            {data: 'pemanfaatanbangunan', name: 'pemanfaatanbangunan'},
            {data: 'sumberinformasi', name: 'sumberinformasi'}
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
        }
    });
    $('#table_bangunan tbody').on('click', 'a',function(e) {
        var data =  table_bangunan.row($(this).parents('tr')).data();
        var id = data.id;
        //console.log(data);
        if ($(this).hasClass('edit')) {
            document.location ='/kuesioner/bangunan/'+id+'/ubah';
        }else if ($(this).hasClass('lihat')) {
            document.location ='/kuesioner/bangunan/'+id+'/lihat';
        }else if($(this).hasClass('hapus')){
            e.preventDefault();
            var el = $(this).parent();
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');
           
            var newForm = jQuery('<form>', {
                'action': '/kuesioner/bangunan/'+id+'/hapus',
                'target': '_top',
                'method' : 'post',
            }).append(jQuery('<input>', {
                'name': '_method',
                'value': 'DELETE',
                'type': 'hidden'
            })).append($('<input />',{
                'name': '_token',
                'value': $('meta[name="_token"]').attr('content'),
                'type': 'hidden'
            }));

            $('#formConfirm')
            .find('#frm_body').html('<h6>'+msg+'</h6>').append(newForm)
            .end().find('#frm_title').html(title)
            .end().modal('show');
            
            $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);

            $('#formConfirm').on('click', '#frm_submit', function(e) {
                //var id = $(this).attr('data-form');
                //console.log(newForm);
                newForm.submit();
                //$(id).submit();
            });
        }
        table_bangunan.draw();
    });

    $('#table_bangunankotaciawi').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/kuesioner/bangunankotaciawi/getdata',
        columns: [
            {
                //"className":      'details-control',
                "orderable":      false,
                "searchable":      false,
                "data":           null,
                "defaultContent":   
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                '<li><a class="edit">Edit</a></li>' +
                                '<li><a class="hapus">Hapus</a></li>' +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            {data: 'nama'},
            {data: 'sumber'},
            {data: 'tahun'},
            
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
            });
        }
        
    });
    
}(jQuery, window, document));

//Form
(function($, window, document){
    $('.datepicker').datepicker({
        autoclose: true,
        format:'yyyy-mm-dd',
        startDate:'-3d'
    });
    $('input.numberonly').bind('keypress', function(e) {
        return numeralsOnly(e);
    });
    $('input.letteronly').bind('keypress', function(e) {
        return lettersOnly(e);
    });
    var checkall = 'th.check-all';
    $(checkall).on('change', function() {
        var $this = $(this),
            index= $this.index() + 1,
            checkbox = $this.find('input[type="checkbox"]'),
            table = $this.parents('table');
        // Make sure to affect only the correct checkbox column
        table.find('tbody > tr > td:nth-child('+index+') input[type="checkbox"]')
          .prop('checked', checkbox[0].checked);
    });

    var provinsi = $('select#provinsi');
    var kabkota = $('select#kabkota');
    var kecamatan = $('select#kecamatan');
    var desa = $('select#desa');
    
    loaddatawilayah('/api/getprovinsi').then(function(data){
        var options = '<option value="0">Pilih Provinsi..</option>';
        for (var x = 0; x < data.length; x++) {
            var selected = (data[x]['kode_prov'] == $('#kode_prov').val()) ? "selected":"";
            options += '<option value="' + data[x]['kode_prov'] + '"'+ selected +'>' + data[x]['nama_provinsi'] + '</option>';
        }
        provinsi.html(options);
        $("#loader-wrapper").hide();
    });

    provinsi.on('change', function (){
        kabkota.html("<option value=''>Pilih Kota..</option>");
        loaddatawilayah('/api/getkabupaten/'+$(this).val()).then(function(data){
            var options = '<option value="0">Pilih Kota..</option>';
            for (var x = 0; x < data.length; x++) {
                options += '<option value="' + data[x]['kode_kab'] + '">' + data[x]['nama_kabupaten'] + '</option>';    
            }
            kabkota.select2();
            kabkota.html(options);
            $("#loader-wrapper").hide();
        });
        
        
    });
    kabkota.on('change', function (){
        kecamatan.html("<option value=''>Pilih Kota..</option>");
        loaddatawilayah('/api/getkecamatan/'+$(this).val()).then(function(data){
            var options = '<option value="0">Pilih Kecamatan..</option>';
            for (var x = 0; x < data.length; x++) {
                options += '<option value="' + data[x]['kode_kec'] + '">' + data[x]['nama_kecamatan'] + '</option>';    
            }
            kecamatan.select2();
            kecamatan.html(options);
            $("#loader-wrapper").hide();
        });
        
        
    });
    kecamatan.on('change', function (){
        desa.html("<option value=''>Pilih Desa/Kelurahan..</option>");
        loaddatawilayah('/api/getdesa/'+$(this).val()).then(function(data){
            var options = '<option value="0">Pilih Desa..</option>';
            for (var x = 0; x < data.length; x++) {
                options += '<option value="' + data[x]['kode_kel'] + '">' + data[x]['nama_kelurahan'] + '</option>';    
            }
            desa.select2();
            desa.html(options);
            $("#loader-wrapper").hide();
        });
        
        
    });
    

    $('#checkmap').click(function(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            $('input[name=latitude]').val(position.coords.latitude);
            $('input[name=longitude]').val(position.coords.longitude);
          }, function() {
            
          });
        } else {
          // Browser doesn't support Geolocation
          alert('Browser anda tidak mendukung Geolocation');
         
        }        
    });

    if ($(".tinymce_sismiop").length > 0) {
        tinymce.init({
            selector: ".tinymce_sismiop",
            theme: "modern",
                        //skin: "light",
            //width: 600,
            //height: 200,    
            /*plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code "
            ],*/
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount media nonbreaking spellchecker",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code "
            ],
            relative_urls: false,
            browser_spellcheck : true ,
            filemanager_title:"Responsive Filemanager",
            external_filemanager_path:"http://"+window.location.hostname+":"+window.location.port+"/filemanager/",
            external_plugins: { "filemanager" : "../../../filemanager/plugin.min.js"},
            codemirror: {
                indentOnInit: true, // Whether or not to indent code on init. 
                path: 'CodeMirror'
            },  
            image_advtab: true,
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview code  | youtube | qrcode | flickr | picasa | easyColorPicker"
        });    
    }

    
}(jQuery, window, document));

