(function () {
    var path = location.pathname.replace(/[^\/]+$/, '');
    var hostname  = window.location.hostname;
    var __http = 'http://';
    window.dojoConfig = {
        async: true,
        packages: [
            {
                name: 'viewer',
                location: __http + hostname + ':'+ window.location.port + '/js/cmv/viewer'
            }, {
                name: 'gis',
                location: __http + hostname + ':'+ window.location.port + '/js/cmv/gis'
            }, {
                name: 'config',
                location: __http + hostname + ':'+ window.location.port + '/js/cmv/config'
            }, {
                name: 'proj4js',
                location: '//cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.15'
            }, {
                name: 'flag-icon-css',
                location: '//cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0'
            },
            {
                name: 'jquery',
                location: '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1',
                main: 'jquery.min'
            }
        ]
    };

    require(window.dojoConfig, [
        'dojo/_base/declare',

        // minimal Base Controller
        'viewer/_ControllerBase',

        // *** Controller Mixins
        // Use the core mixins, add custom mixins
        // or replace core mixins with your own
        'viewer/_ConfigMixin', // manage the Configuration
        'viewer/_LayoutMixin', // build and manage the Page Layout and User Interface
        'viewer/_MapMixin', // build and manage the Map
        'viewer/_WidgetsMixin' // build and manage the Widgets

        // 'viewer/_WebMapMixin' // for WebMaps
        //'config/_customMixin'

    ], function (
        declare,

        _ControllerBase,
        _ConfigMixin,
        _LayoutMixin,
        _MapMixin,
        _WidgetsMixin

        // _WebMapMixin
        //_MyCustomMixin

    ) {
        var App = declare([

            // add custom mixins here...note order may be important and
            // overriding certain methods incorrectly may break the app
            // First on the list are last called last, for instance the startup
            // method on _ControllerBase is called FIRST, and _LayoutMixin is called LAST
            // for the most part they are interchangeable, except _ConfigMixin
            // and _ControllerBase
            //
            _LayoutMixin,
            _WidgetsMixin,
            // _WebMapMixin,
            _MapMixin,

            // configMixin should be right before _ControllerBase so it is
            // called first to initialize the config object
            _ConfigMixin,

            // controller base needs to be last
            _ControllerBase
        ]);
        var app = new App();
        app.startup();
    });
})();
