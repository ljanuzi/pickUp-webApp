var eventArray = {};
var marker;
function initMap() {
    //TODO: add a search bar for map focus
    var map;
    var thessaloniki = { lat: 40.6401, lng: 22.9444 };
    var options = {
        zoom: 14,
        center: thessaloniki
    }
    //Dictionary object to allow for events placed in the same location to have 1 common pin
    var infoWindowArray = {};

    var pins = [];
    map = new google.maps.Map(document.getElementById('map'), options);
    if(eventArray!=null){
    for (let  i = 0; i <eventArray.length; i++) {
        let ea = eventArray[i];
        let name = (ea.lat+ea.lng).toString();
        //console.log("test1");
        
        
        
        if(pins[name] == null){
            infoWindowArray[name]= new google.maps.InfoWindow({
                content: "<a style ='color:blue' href='event.php?str="+ea.event_id +"'>"+ea.title+"</a><br>"+ea.date+"<br>"
            });
            pins[name] = new google.maps.Marker({ position: { lat: Number(ea.lat), lng: Number(ea.lng) }, map: map });
            
        }else{
            content = infoWindowArray[name].content + "<a style='color:blue' href='event.php?str="+ea.event_id +"'>"+ea.title+"</a><br>"+ea.date+"<br>";
            infoWindowArray[name].setContent(content);
            //infoWindowArray[name].content= infoWindowArray[name].content+"<hr>"+"<a href='event.php?str="+ea.event_id +"'>"+ea.title+"</a><br>"+ea.date+"<br>"
        }
        pins[name].addListener('click',function(){
            infoWindowArray[name].open(map,pins[name]);
            console.log(infoWindowArray[name].content);    
        });
    }
}
    


    map.addListener('click', function (event) {
        //console.log("test2");
        if (marker != null)
            marker.setMap(null);

        

         //Used by landing.php to extract the coordinates for the post-event form
         if(document.getElementById("budget-4")!=null){
            marker = new google.maps.Marker({
                position: event.latLng,
                map:map,
                icon:'images/bluemarker1.png'
             });
            var value = document.getElementById("budget-4");
            console.log(marker.position.lat()); 
            value.setAttribute("value",marker.position.lat()+","+marker.position.lng());
         }
         console.log(eventArray);
    });

}