function addMarker(latlng, i=0) {
    /*var offset = Math.floor(Math.random() * 3) * 16; // pick one of the three icons in the sprite

    // Calculate desired pixel-size of the marker
    var size = Math.floor(4*(count-1) + 8);
    var scaleFactor = size/16;*/
    
    var data = i;
    
    var icon = {
      url: 'assets/img/marker/point/'+data.icon_pju,
      scaledSize: new google.maps.Size(20, 20), // scaled size
      // This marker is 20 pixels wide by 32 pixels high.
      size: new google.maps.Size(32, 35),
      // The origin for this image is (0, 0).
      origin: new google.maps.Point(0, 0),
      // The anchor for this image is the base of the flagpole at (0, 32).
      anchor: new google.maps.Point(0, 35)
    };
    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        //draggable: true,
        data:data,
        category:data.id_pju,
        kondisi:data.id_kondisi,
        icon: icon,
    });
    //marker.setMap(map);
    markers.push(marker);
    arrMakers.push(marker);
    google.maps.event.addListener(marker, "click", function () {
        console.log(this.data);
        openModal(this.data);
        //t.openModal({poi:data});
    });
}

function openModal(data) {
    var table = $("<table/>").addClass('table');
    var row = $("<tr/>");
    row.append($("<th/>").append($("<i/>").text(data.nama_jalan)));
    table.append(row);

    var row_gambar = $("<tr/>");
    row_gambar.append($("<td/>").append($("<img />")
        .attr("src","/assets/foto/"+data.gambar)
        .attr("width","50%")
        .attr("class","img-thumbnail")

        )
    );
    table.append(row_gambar);

    var row_sj = $("<tr/>");
    row_sj.append($("<td/>").text("Status Jalan"));
    row_sj.append($("<td/>").text(data.status_jalan));
    table.append(row_sj);

    var row_kecamatan = $("<tr/>");
    row_kecamatan.append($("<td/>").text("Kecamatan"));
    row_kecamatan.append($("<td/>").text(data.nama_kecamatan));
    table.append(row_kecamatan);

    var row_kelurahan = $("<tr/>");
    row_kelurahan.append($("<td/>").text("Kelurahan"));
    row_kelurahan.append($("<td/>").text(data.nama_kelurahan));
    table.append(row_kelurahan);
    
    var a = $("<a/>");
    a.attr("class","btn btn-success");
    a.attr("href","/pju/"+data.id+"/lihat");
    a.text("Lihat Detil");
    table.append(a);
    $('#formModalMap')
        .find('#frm_body').html(table)
        .end().modal('show');
}
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