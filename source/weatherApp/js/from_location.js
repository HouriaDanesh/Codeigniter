function checkCheck() {
    
    if (document.getElementById('checkbox').checked){
        
            navigator.geolocation.getCurrentPosition(GetLocation);
                function GetLocation(location) {
                var lat = location.coords.latitude;
                var long = location.coords.longitude;
                var url = 'http://api.openweathermap.org/data/2.5/weather?';
                var lat_cord = 'lat=' + lat;
                var lon_cord = '&lon=' + long;
                var unit = '&units=metric';
                var apikey = '&appid=a7d6e888a07b1af128820088b2fc973b';
                var fullapiaddress = url + lat_cord + lon_cord + unit +apikey;
                console.log(fullapiaddress);
                
                //LOADING JSON FILE
                    function Get(fullipaddress){
                        var Httpreq = new XMLHttpRequest(); // a new request
                        Httpreq.open("GET",fullipaddress,false);
                        Httpreq.send(null);
                        return Httpreq.responseText;          
                    }

                //DISPLAYING INFORMATION 
                    var json_obj = JSON.parse(Get(fullapiaddress));
                    var cityname = ("<p class='city'>City: "+json_obj.name + "</p>");
                    var citytemerature = ("<p>Temperature: "+json_obj.main.temp + "°C</p>");
                    var cityhumidity = ("<p>Humidity: "+json_obj.main.humidity+ "%</p>");
                    var citywind = ("<p>Wind speed: " + json_obj.wind.speed+" m/s</p>");
                    var citydescription = ("<p>Description: " +json_obj.weather[0].description+"</p>");
                    var icon = json_obj.weather[0].icon;
                    var ico_url = 'http://openweathermap.org/img/w/';
                    var full_ico = ico_url + icon;
                    var weathericon = ("<img src='" + full_ico + ".png'/>")
                    var cityid = json_obj.id;

                    console.log(cityid);
                    
                    var result2 = cityname + citytemerature + cityhumidity + citywind + citydescription + weathericon;

                    
                    document.getElementById('resultation').innerHTML = result2;
        }
    }
    else{
         document.getElementById('resultation').innerHTML = "";
    }
}