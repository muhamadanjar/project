define([
    'dojo/i18n!./nls/main',
    'dojo/_base/lang'
], function (i18n, lang) {

    var linkTemplate = '<a href="{url}" target="_blank">{text}</a>';
    function directionsFormatter (noValue, attributes) {
        return lang.replace(linkTemplate, {
            url: 'https://www.google.com/maps/dir/' + attributes.Address + ' Louisville, KY',
            text: 'Get Directions'
        });
    }
    return {
        map: true,
        mapClickMode: true,
        mapRightClickMenu: true,
        identifyLayerInfos: true,
        identifyTolerance: 5,
        draggable: false,

        // config object definition:
        //  {<layer id>:{
        //      <sub layer number>:{
        //          <pop-up definition, see link below>
        //          }
        //      },
        //  <layer id>:{
        //      <sub layer number>:{
        //          <pop-up definition, see link below>
        //          }
        //      }
        //  }

        // for details on pop-up definition see: https://developers.arcgis.com/javascript/jshelp/intro_popuptemplate.html

        identifies: {
            poi: {
                0: {
                    title: 'i18n.identify.louisvillePubSafety.trafficCamera',
                    description: '{Description} lasted updated: {Last Update Date}',
                    mediaInfos: [{
                        title: '',
                        caption: '',
                        type: 'image',
                        value: {
                            sourceURL: '{Location URL}',
                            linkURL: '{Location URL}'
                        }
                    }]
                }
            },


            jaringanjalan:{
                0:{
                    title:'Jaringan Jalan Fungsi',
                    fieldInfos: [{
                        fieldName: 'KODE_RUAS',
                        visible: true,
                    }, {
                        fieldName: 'NAMA_RUAS',
                        visible: true
                    }, {
                        fieldName: 'LEBAR_RUAS',
                        visible: true
                    }, {
                        fieldName: 'PANJANG_RUAS',
                        visible: true
                    }, {
                        fieldName: 'STATUS',
                        visible: true
                    }, {
                        fieldName: 'FUNGSI',
                        visible: true
                    }]
                },
                1:{
                    title:'Jaringan Jalan Status',
                    fieldInfos: [{
                        fieldName: 'NO_RUAS',
                        label:'No Ruas',
                        visible: true,
                    }, {
                        fieldName: 'KODE_RUAS',
                        label:'Kode Ruas',
                        visible: true
                    }, {
                        fieldName: 'NAMA_RUAS',
                        label:'Nama Ruas',
                        visible: true
                    }, {
                        fieldName: 'KECAMATAN',
                        label:'Kecamatan',
                        visible: true
                    }, {
                        fieldName: 'KELURAHAN',
                        label:'Kelurahan',
                        visible: true
                    }, {
                        fieldName: 'TITIK_PANGKAL',
                        label:'Titik Pangkal',
                        visible: true
                    },
                    {
                        fieldName: 'TITIK_AKHIR',
                        label:'Titik Akhir',
                        visible: true
                    },
                    {
                        fieldName: 'LEBAR_RUAS',
                        label:'Lebar Ruas',
                        visible: true
                    },
                    {
                        fieldName: 'PANJANG_RUAS',
                        label:'Panjang',
                        visible: true
                    },
                    {
                        fieldName: 'JENIS_PERKERASAN',
                        label:'Jenis Perkerasan',
                        visible: true
                    },
                    {
                        fieldName: 'TAHUN_RENOVASI',
                        label:'Tahun Renovasi',
                        visible: true
                    },
                    {
                        fieldName: 'ID_KONDISI',
                        label:'ID Kondisi',
                        visible: true
                    },
                    {
                        fieldName: 'KELAS',
                        label:'Kelas',
                        visible: true
                    },
                    {
                        fieldName: 'FUNGSI',
                        label:'Fungsi',
                        visible: true
                    },
                    {
                        fieldName: 'KETERANGAN',
                        label:'Keterangan',
                        visible: true
                    },
                    {
                        fieldName: 'SEMPADAN',
                        label:'Sempadan',
                        visible: true
                    },
                    {
                        fieldName: 'KONDISI_SEMPADAN',
                        label:'Kondisi Sempadan',
                        visible: true
                    },
                    {
                        fieldName: 'DRAINASE',
                        label:'Drainase',
                        visible: true
                    },
                    {
                        fieldName: 'KONDISI_DRAINASE',
                        label:'Kondisi Drainase',
                        visible: true
                    }]
                }
            },
            
            
        }
    };
});
