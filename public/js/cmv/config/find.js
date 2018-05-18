/*eslint no-console: 0, no-alert: 0*/
define([
    'dojo/i18n!./nls/main'
], function (i18n) {

    return {
        map: true,
        zoomExtentFactor: 2,
        queries: [
            {
                description: i18n.find.jaringanjalanstatus,
                url: 'http://simjalapandeglang.com/arcgis/rest/services/PANDEGLANG/Peta_Jaringan_Jalan/MapServer',
                layerIds: [0],
                searchFields: ['STATUS'],
                minChars: 2,
                gridColumns: [
                    {
                        field: 'NAMA_RUAS',
                        label: 'Nama Ruas'
                    },
                    {
                        field: 'STATUS',
                        label: 'Status',
                        width: 100,
                        sortable: false,
                        resizable: false
                    }
                ],
                sort: [
                    {
                        attribute: 'NAMA_RUAS',
                        descending: false
                    }
                ],
                prompt: 'Status',
                selectionMode: 'single'
            },
            {
                description: i18n.find.jaringanjalanfungsi,
                url: 'http://simjalapandeglang.com/arcgis/rest/services/PANDEGLANG/Peta_Jaringan_Jalan/MapServer',
                layerIds: [1],
                searchFields: ['JENIS_PERKERASAN'],
                minChars: 4,
                gridColumns: [
                    {
                        field: 'NAMA_RUAS',
                        label: 'Layer',
                        width: 100,
                        sortable: false,
                        resizable: false
                    },
                    {
                        field: 'PANJANG_RUAS',
                        label: 'PANJANG RUAS',
                        width: 100
                    },
                    {
                        field: 'STATUS',
                        label: 'Status'
                    },

                ],
                sort: [
                    {
                        attribute: 'STATUS',
                        descending: false
                    }
                ],
                prompt: 'Nama Ruas, Keterangan.',
                customGridEventHandlers: [
                    {
                        event: '.dgrid-row:click',
                        handler: function (event) {
                            alert('You clicked a row!');
                            console.log(event);
                        }
                    }
                ]
            }
        ],
        selectionSymbols: {
            polygon: {
                type: 'esriSFS',
                style: 'esriSFSSolid',
                color: [255, 0, 0, 62],
                outline: {
                    type: 'esriSLS',
                    style: 'esriSLSSolid',
                    color: [255, 0, 0, 255],
                    width: 3
                }
            },
            point: {
                type: 'esriSMS',
                style: 'esriSMSCircle',
                size: 25,
                color: [255, 0, 0, 62],
                angle: 0,
                xoffset: 0,
                yoffset: 0,
                outline: {
                    type: 'esriSLS',
                    style: 'esriSLSSolid',
                    color: [255, 0, 0, 255],
                    width: 2
                }
            }
        },
        selectionMode: 'extended'
    };
});