@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Liquor Stores Nearby!</div>

                    <div class="panel-body">
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXxdfrQrBDYjzVHpnAi3eaPRTPNGbUh00&libraries=places&callback=searchResturants" async defer></script>
                        <div id="liquor_store"></div>
                        <div id="map"></div>
                        <script>
                            // This example requires the Places library. Include the libraries=places
                            // parameter when you first load the API. For example:
                            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                            var map;

                            function searchResturants() {
                                var browserLocation;
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -34.397, lng: 150.644},
                                    zoom: 15
                                });
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                        var pos = {
                                          lat: position.coords.latitude,
                                          lng: position.coords.longitude
                                        };
                                        map.setCenter(pos);
                                    var service = new google.maps.places.PlacesService(map);
                                service.nearbySearch({
                                    location: map.getCenter(),
                                    radius: 500,
                                    type: ['liquor_store']
                                }, callback);
                                      }, function() {
                                      });
                                }
                            }

                            function callback(results, status) {
                                if (status === google.maps.places.PlacesServiceStatus.OK) {
                                    for (var i = 0; i < results.length; i++) {
                                        var div = document.getElementById('liquor_store');
                                        var id = results[i].place_id;
                                        var addedText = "<a id = "+results[i].place_id+">"+results[i].name+"</a>";
                                        div.innerHTML = div.innerHTML + addedText;
                                        div.innerHTML = div.innerHTML + "<hr>"
                                    }
                                    $("a").click(function(){
                                        window.location = "{{ url('/places/info') }}"+"/"+$(this).attr('id')+"/"+$(this).text();
                                    });
                                }
                            }
                        </script>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection