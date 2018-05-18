define([
    'dojo/i18n!./nls/main'
], function (i18n) {

    return {
        map: true,
        editable: true,
        bookmarks: [
            {
                extent: {
                    xmin: 105.026392693,
                    ymin: -6.928413141,
                    xmax: 106.429653805,
                    ymax: -6.106640479,
                    spatialReference: {
                        wkid: 4326
                    }
                },
                name: i18n.bookmarks.banten
            },
            {
                extent: {
                    xmin: 0,
                    ymin: 0,
                    xmax: 0,
                    ymax: 0,
                    spatialReference: {
                        wkid: 4326
                    }
                },
                name: i18n.bookmarks.nullIsland
            }
        ]
    };
});