function addMarker(latlng, i=0) {
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
        //category:data.id_pju,
        //kondisi:data.id_kondisi,
        //icon: icon,
    });
    
    markers.push(marker);
    google.maps.event.addListener(marker, "click", function () {
        openModal(this.data);
    });
}
function addPolygon(polygon,i=0) {
    var polygon = new google.maps.Polygon({
      paths: polygon,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 3,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      data:i
    });
    //polygons.push(polygon);
    polygon.setMap(map);

    google.maps.event.addListener(polygon, "click", function () {
        console.log(this.data);
        openModal(this.data);
    });
}
function openModal(data) {
    var table = $("<table/>").addClass('table');
    var row = $("<tr/>");
    row.append($("<th/>").append($("<i/>").text(data.nama_jalan)));
    table.append(row);

    var row_gambar = $("<tr/>");
    row_gambar.append($("<td/>").append($("<img />")
        .attr("src","/assets/foto/"+data.foto)
        .attr("width","50%")
        .attr("class","img-thumbnail")

        )
    );
    table.append(row_gambar);

    var row_sj = $("<tr/>");
    row_sj.append($("<td/>").text("Nama"));
    row_sj.append($("<td/>").text(data.name));
    table.append(row_sj);

    /*var a = $("<a/>");
    a.attr("class","btn btn-success");
    a.attr("href","/pju/"+data.id+"/lihat");
    a.text("Lihat Detil");
    table.append(a);*/
    $('#formModalMap')

        .find('#frm_body').html(table)
        .end().modal('show');
}