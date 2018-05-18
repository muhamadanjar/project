/*eslint no-alert: 0*/
define([
    'dojo/on',
    'dojo/_base/lang',
    'dojo/date/locale'
], function (on, lang, locale) {

    function formatDateTime (value) {
        if (value instanceof Date) {
            return locale.format(value, {
                formatLength: 'short'
            });
        }
        return '';
    }

    function formatDate (value) {
        if (value instanceof Date) {
            return locale.format(value, {
                selector: 'date',
                formatLength: 'medium'
            });
        }
        return '';
    }

    function getDateTime (value) {
        if (isNaN(value) || value === 0 || value === null) {
            return null;
        }
        return new Date(value);
    }

    return {
        map: true,
        mapClickMode: true,

        queryStringOptions: {
            valueParameter: 'NAME'
        },
        proxy_url: 'http://localhost:9080/proxy/proxy.php',
        GeometryService_url: 'http://tasks.arcgisonline.com/ArcGIS/rest/services/Geometry/GeometryServer',
        layers: [
            {
                name: 'Status Jalan',
                findOptions: {
                    url: 'http://simjalapandeglang.com/arcgis/rest/services/PANDEGLANG/Peta_Jaringan_Jalan/MapServer',
                    layerIds: [0],
                    searchFields: ['STATUS']
                },
                attributeSearches: [
                    {
                        name: 'Rekapitulasi Status Jalan',
                        searchFields: [
                            {
                                name: 'STATUS',
                                label: 'Pilih Status Jalan',
                                expression: '[value]',
                                values: ['Jalan Kabupaten','Jalan Kabupaten/ Kolektor','Jalan Nasional'],
                                placeholder: 'Pilih Status',
                                required: true
                                //minChars: 3
                            }
                        ],

                        title: 'Rekapitulasi Status',
                        topicID: 'findstatus',
                        gridOptions: {
                            columns: [
                            {
                                label: 'Kode Ruas',
                                field: 'KODE_RUAS ',
                                width: 50,
                                exportable: true,
                            }, {
                                label: 'Nama Ruas',
                                field: 'NAMA_RUAS',
                                width: 100,
                                exportable: true,
                            }, {
                                label: 'Lebar',
                                field: 'LEBAR_RUAS',
                                exportable: true,
                                width: 50
                            }, {
                                label: 'Panjang',
                                field: 'PANJANG_RUAS',
                                exportable: true,
                            }, {
                                label: 'Status',
                                field: 'STATUS',
                                width: 250,
                                exportable: true,
                            }, {
                                label: 'Keterangan',
                                field: 'KETERANGAN',
                                width: 250,
                                exportable: true,
                            }],
                            sort: [
                                {
                                    attribute: 'NAMA_RUAS',
                                    descending: false
                                }
                            ]
                        }
                    }
                ]
            },
            {
                name: 'Fungsi Jalan',
                findOptions: {
                    url: 'http://simjalapandeglang.com/arcgis/rest/services/PANDEGLANG/Peta_Jaringan_Jalan/MapServer',
                    layerIds: [1],
                    searchFields: ['FUNGSI']
                },
                attributeSearches: [
                    {
                        name: 'Rekapitulasi Fungsi Jalan',
                        searchFields: [
                            {
                                name: 'FUNGSI',
                                label: 'Pilih Fungsi Jalan',
                                expression: '[value]',
                                values: ['Jalan Kolektor','Jalan Lokal'],
                                placeholder: 'Pilih Fungsi',
                                required: true
                                //minChars: 3
                            }
                        ],

                        title: 'Rekapitulasi Fungsi Jalan',
                        topicID: 'findfungsi',
                        gridOptions: {
                            columns: [
                            {
                                label: 'Kode Ruas',
                                field: 'KODE_RUAS ',
                                width: 50
                            }, {
                                label: 'Nama Ruas',
                                field: 'NAMA_RUAS',
                                width: 100
                            }, {
                                label: 'Lebar',
                                field: 'LEBAR_RUAS',
                                width: 50
                            }, {
                                label: 'Panjang',
                                field: 'PANJANG_RUAS',
                                width: 50
                            }, {
                                label: 'Status',
                                field: 'STATUS',
                                width: 250
                            }, {
                                label: 'Keterangan',
                                field: 'KETERANGAN',
                                width: 250
                            }],
                            sort: [
                                {
                                    attribute: 'NAMA_RUAS',
                                    descending: false
                                }
                            ]
                        }
                    }
                ]
            },
           
        ]
    };
});