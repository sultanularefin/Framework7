// Dom7
var $ = Dom7;

// Theme
var theme = 'auto';
if (document.location.search.indexOf('theme=') >= 0) {
    theme = document.location.search.split('theme=')[1].split('&')[0];
}

// Init App
var app = new Framework7({
    id: 'io.framework7.testapp',
    root: '#app',
    name:'My App',
    theme: theme,
    data: function () {
        return {
            user: {
                userEmail: 'John',
                password: 'Doe',
            },
        };
    },
    // Enable swipe panel
    panel: {
        swipe: 'left',
    },
    methods: {
        helloWorld: function () {
            app.dialog.alert('Hello World!');
        },
    },
    routes: routes,
    on: {
        init: function () {
            // console.log('App initialized');
        },
        pageInit: function () {
            // console.log('Page initialized');
        },
    },
    vi: {
        placementId: 'pltd4o7ibb9rc653x14',
    },
});

var mainView = app.views.create('.view-main');
