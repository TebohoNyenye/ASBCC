
function test(){
var settings = {
    'cache': false,
    'dataType': "jsonp",
    "async": true,
    "crossDomain": true,
    "url": "https://kf.kobotoolbox.org/api/v2/assets/json",
    "Authorization": "Token[00356ef249a28bba53ce7d0992787fd1e12373ff]",
    "method": "GET",
    "headers": {
        "accept": "application/json",
        "Access-Control-Allow-Origin":"*"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);

});
}