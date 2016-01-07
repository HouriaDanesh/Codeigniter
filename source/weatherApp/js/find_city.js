function getAPI() {
    var apiadress = 'http://api.openweathermap.org/data/2.5/find?q=';
    var apikey = '&appid=a7d6e888a07b1af128820088b2fc973b';
    var cityname = document.getElementById("cityname").value;
    //var countryname = document.getElementById("countryname").value;
    var unit = '&units=metric';
    var fullapiaddress = apiadress + cityname + ',' + unit + apikey;

    console.log(fullapiaddress);

//LOADING JSON FILE
    function Get(fullipaddress) {
        var Httpreq = new XMLHttpRequest(); // a new request
        Httpreq.open("GET", fullipaddress, false);
        Httpreq.send(null);
        return Httpreq.responseText;
    }

    //FOR PRINTING OUT JSON DATA

    var json_obj = JSON.parse(Get(fullapiaddress));
    var city_name = ("<p class='city'>City name: " + json_obj.list[0].name + "</p>");
    var current_temperature = ("<p>Current temperature: <strong> " + json_obj.list[0].main.temp + "°C</strong></p>");
    var city_humidity = ("<p>Humidity: <strong>" + json_obj.list[0].main.humidity + "%</strong></p>");
    var city_wind = ("<p>Wind speed: <strong>" + json_obj.list[0].wind.speed + " m/s</strong></p>");
    var weather_description = ("<p>Description: <strong>" + json_obj.list[0].weather[0].description + "</strong></p>");
    var cityid = json_obj.list[0].id;
    var ico_url = 'http://openweathermap.org/img/w/';
    var icon = (json_obj.list[0].weather[0].icon);
    var full_icon = ico_url + icon;
    var weather_icon = ("<img src='" + full_icon + ".png'/>")
    var result = city_name + current_temperature + city_humidity + city_wind + weather_description + weather_icon;

    $.post( "search/cron", { data: cityid } );

    document.getElementById('resultation').innerHTML = result;
}



