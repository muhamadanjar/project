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

    var table_jenislampu = $('#table_jenislampu').DataTable({
        "ajax": "/kategori/jenislampu/array",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "id" },
            { "data": "jenis_lampu" },
            
        ],
        'sDom': 'lt<pi>',

    });

    var table_kinformasi = $('#table_kinformasi').DataTable({
        "ajax": "/kategori/informasi/array",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "id" },
            { "data": "nama_kategori" },
            
        ],
        'sDom': 'lt<pi>' 
    });
    $('.box').on('click','.cari_category',function(e){
        $('#formPjuSearch').modal('show');
    })
    var menu_list_pju = '';
    if (hasRole('edit.pju')) {
        menu_list_pju += '<li><a href="#" class="edit">Edit</a></li>';
    }
    if (hasRole('delete.pju')) {
        menu_list_pju += '<li><a href="#" class="hapus">Hapus</a></li>';
    }
    menu_list_pju += '<li><a href="#" class="lihat">Lihat</a></li>';
    var table_pju = $('#table_pju').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url:'/pju/array',
            type:'get',

        },
        //"ajax": "/pju/array",
        "columns": [
            {
                //"className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent":   
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                menu_list_pju +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            { "data": "nama_kecamatan" },
            { "data": "nama_kelurahan" },
            { "data": "nama_jalan" },
            { "data": "status_jalan" },
            { "data": "tipe_pju" },
            { "data": "lengan_pju" },
            { "data": "tiang_pju" },
            { "data": "jenis_lampu" },
            { "data": "tahun" },
            { "data": "kondisi_pju" },
            
        ],
        "columnDefs": [
            {
                "targets": 0,
                "orderable": false,
            },
        ],
        "order": [[1, 'asc']],
        responsive: true,
        initComplete: function () {
            
            this.api().columns().every( function (colIndex,e) {
                var column = this;
                var kec_filter = $("#kecamatan_filter");
                var kel_filter = $("#kelurahan_filter");
                if (colIndex == 0) {
                    
                }else if(colIndex == 1){
                    
                    var select = $("#kecamatan_filter")
                        .on( 'change', function (e) {
                            var id = $(this).val();
                            if (id != "") {
                            var kecamatan_json = getjson('/getKecamatanID/'+id);                       
                            var val = $.fn.DataTable.util.escapeRegex(kecamatan_json.nama_kecamatan);
                            column.search(val).draw();
                            
                            var options = '<option value="">Pilih Kelurahan..</option>';
                            var data_kelurahan = getjson('/getDesa/'+kecamatan_json.kode_kec);
                            for (var x = 0; x < data_kelurahan.length; x++) {
                                options += '<option value="' + data_kelurahan[x]['kode_kel'] + '">' + data_kelurahan[x]['nama_kelurahan'] + '</option>';
                            }
                            kel_filter.html(options);
                            }else{
                                column.search("").draw();
                            }
                        } );

                        var options = '<option value="">Pilih Kecamatan..</option>';
                        var data_kecamatan = getjson('/getKecamatan');
                        for (var x = 0; x < data_kecamatan.length; x++) {
                            options += '<option value="' + data_kecamatan[x]['kode_kec'] + '">' + data_kecamatan[x]['nama_kecamatan'] + '</option>';
                        }
                        kec_filter.html(options);
                        
                }else if(colIndex == 2){
                    kel_filter.on( 'change', function (e) {
                        var id = $(this).val();
                        if (id != "") {
                            var kelurahan_json = getjson('/getDesaID/'+id);                       
                            var val_kelurahan = $.fn.DataTable.util.escapeRegex(kelurahan_json.nama_kelurahan);
                            column.search(val_kelurahan).draw();
                        }else{
                            column.search("").draw();
                        }
                    });
                }else if(colIndex == 3){
                    var select = $('#namajalan_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 4){
                    var select = $('#statusjalan_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 5){
                    var select = $('#tipepju_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 6){
                    var select = $('#jenislengan_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 7){
                    var select = $('#jenistiang_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 8){
                    var select = $('#jenislampu_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 9){
                    
                }else if(colIndex == 10){
                    var select = $('#kondisi_filter')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }
            } );
            
        },
        "footerCallback": function(tfoot, data, start, end, length , display ) {
            //console.log("Data",table_pju.page.info());
            
        },
        "drawCallback": function( settings ) {
            var api = this.api();
     
            // Output the data for the visible rows to the browser's console
            //console.log( api.rows().data() );
        },
        //'sDom': 'lt<pi>'
        
    });

    var table_user = $('#table_user').DataTable();
    

   
                
                
                
      
    
    
    $('#table_pju tbody').on('click', 'a',function(e) {
        var data =  table_pju.row($(this).parents('tr')).data();
        var idpju = data.id;
        //console.log(data);
        if ($(this).hasClass('edit')) {
            document.location ='/pju/'+data.id+'/edit';
        }else if ($(this).hasClass('lihat')) {
            document.location ='/pju/'+data.id+'/lihat';
        }else if($(this).hasClass('hapus')){
            e.preventDefault();
            
            var el = $(this).parent();
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');
           
            var newForm = jQuery('<form>', {
                'action': '/pju/'+idpju+'/delete',
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
        table_pju.draw();
    });
    var menu_list_lpm = '';
    menu_list_lpm += '<li><a href="#" class="lihatgambar">Lihat Gambar</a></li>';
    if (hasRole('delete.lpm')) {
        menu_list_lpm += '<li><a href="#" class="hapus">Hapus</a></li>';
    }

    var table_lpm = $('#table_lpm').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url:'/lpm/array',
            type:'get',

        },
        
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                //"data":           null,
                "defaultContent":   
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                menu_list_lpm +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
                
            },
            { "data": "pelapor" },
            { "data": "waktu" },
            { "data": "status" },
            { "data": "keterangan" },
            { "data": "posisi" },
            
        ],
        "columnDefs": [
            {
                "targets": 0,
                "orderable": false,
            },
        ],
        "order": [[1, 'asc']],
        responsive: true,

        //'sDom': 'lt<pi>'
        
    });
    $('#table_lpm tbody').on('click', 'a',function(e) {
        var data =  table_lpm.row($(this).parents('tr')).data();
        var idlpm = data.id;
        
        if ($(this).hasClass('lihatgambar')) {
            $('#lpmModal')
            .find('#frm_body').html('<div class="row"><div class="col-md-12"><img class="img-rounded" src="/files/'+data.gambar+'" width="100%"/></div></div>')
            .end().find('#frm_title').html(data)
            .end().modal('show');
        }else if($(this).hasClass('hapus')){
            e.preventDefault();
            
            var el = $(this).parent();
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');
           
            var newForm = jQuery('<form>', {
                'action': '/lpm/'+idlpm+'/delete',
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
    });
    //var info = table_pju.page.info();
    var menu_list_kwh = '';
    if (hasRole('edit.kwh')) {
        
        menu_list_kwh += '<li><a href="#" class="edit">Edit</a></li>';
    }
    if (hasRole('delete.kwh')) {
        menu_list_kwh += '<li><a href="#" class="hapus">Hapus</a></li>';
    }
    var table_kwh = $('#table_kwh').DataTable({
        "ajax": "/kwh/array",
        "columns": [
            {
                //"className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent":   /*'<a class="btn btn-sm btn-flat edit btn-primary">Edit</a>'+
                                    '<a class="btn btn-sm btn-flat btn-primary hapus">Hapus</a>'*/
                    

                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                menu_list_kwh +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            { "data": "nama_pju" },
            { "data": "alamat" },
            { "data": "nama_kecamatan" },
            { "data": "nama_kelurahan" },
            { "data": "nama_gardu" },
            { "data": "tarif" },
            { "data": "daya" },
            { "data": "tgl_cabut_pasang" },
        ],
        "order": [[1, 'asc']],
        responsive: true,
    });
    $('#table_kwh tbody').on('click', 'a',function(e) {
        var data =  table_kwh.row($(this).parents('tr')).data();
        var idkwh = data.id;
        //console.log(data);
        if ($(this).hasClass('edit')) {
            document.location ='/kwh/'+data.id+'/edit';
        }else if($(this).hasClass('hapus')){
            e.preventDefault();
            
            var el = $(this).parent();
            var title = el.attr('data-title');
            var msg = el.attr('data-message');
            var dataForm = el.attr('data-form');
           
            var newForm = jQuery('<form>', {
                'action': '/kwh/'+idkwh+'/delete',
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
                newForm.submit();
            });
        }
        
        table_pju.draw();
    });

    $('.box').on('click','.cari_category_pengawasan',function(e){
        $('#formPengawasanSearch').modal('show');
    });
    var menu_list_pengawsan = '';
    console.log(hasRole('edit.pengawasan'));
    if (hasRole('edit.pengawasan')) {
        menu_list_pengawsan += '<li><a href="#" class="update">Update</a></li>';
    }
    menu_list_pengawsan += '<li><a href="#" class="detail">Detail</a></li>';
    
    var table_pengawasan = $('#table_pengawasan').DataTable({
        "ajax": "/pengawasan/array",
        "columns": [
            {
                //"className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent":  
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                menu_list_pengawsan +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            { "data": "nama_kecamatan" },
            { "data": "nama_kelurahan" },
            { "data": "nama_jalan" },
            { "data": "status_jalan" },
            { "data": "kondisi_pju" },
            { "data": "keterangan" },
            { "data": "sumber_info" },
        ],
        "order": [[1, 'asc']],
        responsive: true,
        initComplete: function () {
            
            this.api().columns().every( function (colIndex,e) {
                var column = this;
                var kec_filter = $("#kecamatan_filter_pengawasan");
                var kel_filter = $("#kelurahan_filter_pengawasan");
                if (colIndex == 0) {
                }else if(colIndex == 1){
                    
                    kec_filter
                        .on( 'change', function (e) {
                            var id = $(this).val();
                            if (id != "") {
                            var kecamatan_json = getjson('/getKecamatanID/'+id);                       
                            var val = $.fn.DataTable.util.escapeRegex(kecamatan_json.nama_kecamatan);
                            column.search(val).draw();
                            
                            var options = '<option value="">Pilih Kelurahan..</option>';
                            var data_kelurahan = getjson('/getDesa/'+kecamatan_json.kode_kec);
                            for (var x = 0; x < data_kelurahan.length; x++) {
                                options += '<option value="' + data_kelurahan[x]['kode_kel'] + '">' + data_kelurahan[x]['nama_kelurahan'] + '</option>';
                            }
                            kel_filter.html(options);
                            }else{
                                column.search("").draw();
                            }
                        } );

                        var options = '<option value="">Pilih Kecamatan..</option>';
                        var data_kecamatan = getjson('/getKecamatan');
                        for (var x = 0; x < data_kecamatan.length; x++) {
                            options += '<option value="' + data_kecamatan[x]['kode_kec'] + '">' + data_kecamatan[x]['nama_kecamatan'] + '</option>';
                        }
                        kec_filter.html(options);
                }else if(colIndex == 2){
                    kel_filter.on( 'change', function (e) {
                        var id = $(this).val();
                        if (id != "") {
                            var kelurahan_json = getjson('/getDesaID/'+id);                       
                            var val_kelurahan = $.fn.DataTable.util.escapeRegex(kelurahan_json.nama_kelurahan);
                            column.search(val_kelurahan).draw();
                        }else{
                            column.search("").draw();
                        }
                    });
                }else if(colIndex == 3){
                    var select = $('#namajalan_filter_pengawasan')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }else if(colIndex == 5){
                    var select = $('#kondisi_filter_pengawasan')
                        .on( 'change', function () {
                            var val = $.fn.DataTable.util.escapeRegex($(this).val());
                            column.search( val ? '^'+val+'$' : '', true, true ).draw();
                        } );
                        column.data().unique().sort().each( function ( d, j ) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        } );
                }
            } );
            
        },
    });

    $('#table_pengawasan tbody').on('click','a',function(e) {
        var data =  table_pengawasan.row($(this).parents('tr')).data();
        var idpju = data.id;
        //console.log(data);
        if ($(this).hasClass('update')) {
            document.location ='/pengawasan/'+idpju+'/edit';
        }else if($(this).hasClass('detail')){
            e.preventDefault();
            document.location ='/pengawasan/'+idpju+'/lihat';
        }
    });

    var table_hpengawasan = $('#table_hpengawasan').DataTable({
        "ajax": "/pengawasan/hp_array",
        "columns": [
            {
                //"className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent":  
                    '<div class="input-group margin">' +
                        '<div class="input-group-btn">' +
                            '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">' +
                            '<span class="fa fa-caret-down"></span></button>' +
                            '<ul class="dropdown-menu">' +
                                '<li><a href="#" class="edit">Edit</a></li>' +
                                '<li><a href="#" class="hapus">Hapus</a></li>' +
                            '</ul>' +
                        '</div>' +
                    '</div>' 
                ,
            },
            { "data": "nama_kecamatan" },
            { "data": "nama_kelurahan" },
            { "data": "nama_jalan" },
            { "data": "status_jalan" },
            { "data": "kondisi_pju" },
            { "data": "keterangan" },
            { "data": "sumber_info" },
            { "data": "tgl_pemeliharaan" },
            { "data": "tahun_pemeliharaan" },
            { "data": "status_kondisi" },
        ],
        "order": [[1, 'asc']],
    });

    var table_role = $('#table_role').DataTable();
    
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
    $('.loader').hide();
    /*provinsi.select2(); 
    //$('select#kabkota').html("<option value=''>Pilih Kota..</option>"); 
    //$('select#kabkota').select2();
    
    $('select#provinsi').on('change', function (){
        $('select#kabkota').html("<option value=''>Pilih Kota..</option>");// add this on each call then add the options when data receives from the request
        $.ajax({
            url: '/getKabKota/'+$(this).val(),
            dataType: "json",
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(data) {
                $('select#kabkota').empty(); 
            
                var options = '<option value="0">Pilih Kota..</option>';
                for (var x = 0; x < data.length; x++) {
                    options += '<option value="' + data[x]['kode_kabupaten'] + '">' + data[x]['kabupaten'] + '</option>';    
                }
                $('select#kabkota').select2();
                $('select#kabkota').html(options);
                $("#kabkota").trigger("chosen:updated");
            },
            complete: function() {
                $('.loader').hide();
            }
        });
    });
    //$('select#kecamatan').html("<option value=''>Pilih Kecamatan..</option>"); 
    //$('select#kecamatan').select2();
    $('select#kabkota').on('change', function (){
        $('select#kecamatan').html("<option value=''>Pilih Kecamatan..</option>");// add this on each call then add the options when data receives from the request
        
        $.ajax({
            url: '/getKecamatan/'+$(this).val(),
            dataType: "json",
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(data) {
                $('select#kecamatan').empty(); 
            
                var options = '<option value="0">Pilih Kecamatan..</option>';
                for (var x = 0; x < data.length; x++) {
                    //console.log($('#jenis_usulan').val());
                    if ($('#jenis_usulan').val() == 2 || $('#jenis_usulan').val() == 3) {
                        if (data[x]['lokpri'] == 1) {
                            options += '<option value="' + data[x]['kode_kecamatan'] + '">' + data[x]['kecamatan'] + '</option>';        
                        }
                    }else{
                        options += '<option value="' + data[x]['kode_kecamatan'] + '">' + data[x]['kecamatan'] + '</option>';
                    }
                }
                $('select#kecamatan').select2();
                $('select#kecamatan').html(options);
            },
            complete: function() {
                $('.loader').hide();
            }
        });
    });*/

    //Load data Kecamatan
    $.ajax({
        url: '/getKecamatan',
        dataType: "json",
        beforeSend: function() {
            $('.loader').show();
            $("#loader-wrapper").show();
        },
        success: function(data) {
            kecamatan.empty(); 
            var options = '<option value="0">Pilih Kecamatan..</option>';
            for (var x = 0; x < data.length; x++) {
                var selected = (data[x]['kode_kec'] == $('#kode_kec').val()) ? "selected":"";
                options += '<option value="' + data[x]['kode_kec'] + '"'+ selected +'>' + data[x]['nama_kecamatan'] + '</option>';
            }
            kecamatan.html(options);
            
        },
        complete: function() {
            $('.loader').hide();
            $("#loader-wrapper").hide();
        }
    });
    kecamatan.select2();

    //$('select#desa').html("<option value=''>Pilih Desa..</option>");
    //$('select#desa').select2();
    kecamatan.on('change', function (){
        $('select#desa').html("<option value=''>Pilih Desa..</option>");// add this on each call then add the options when data receives from the request
        
        $.ajax({
            url: '/getDesa/'+$(this).val(),
            dataType: "json",
            beforeSend: function() {
                $('.loader').show();
                $("#loader-wrapper").show();
            },
            success: function(data) {
                $('select#desa').empty(); 
            
                var options = '<option value="0">Pilih Desa..</option>';
                for (var x = 0; x < data.length; x++) {
                   options += '<option value="' + data[x]['kode_kel'] + '">' + data[x]['nama_kelurahan'] + '</option>';
                }
                $('select#desa').select2();
                $('select#desa').html(options);
            },
            complete: function() {
                $('.loader').hide();
                $("#loader-wrapper").hide();
            }
        });
    });
        if ($('#kode_kec').val() !== null) {
            $.ajax({
                url: '/getDesa/'+$('#kode_kec').val(),
                dataType: "json",
                beforeSend: function() {
                    $('.loader').show();
                },
                success: function(data) {
                    $('select#desa').empty(); 
                
                    var options = '<option value="0">Pilih Desa..</option>';
                    for (var x = 0; x < data.length; x++) {
                        var selected = (data[x]['kode_kel'] == $('#kode_kel').val()) ? "selected":"";
                        options += '<option value="' + data[x]['kode_kel'] + '" '+selected+'>' + data[x]['nama_kelurahan'] + '</option>';
                    }
                    $('select#desa').select2();
                    $('select#desa').html(options);
                },
                complete: function() {
                    $('.loader').hide();
                }
            });
        } 

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
