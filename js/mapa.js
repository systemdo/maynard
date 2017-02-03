var map;
var myLatLng = {lat: -12.579738, lng: -41.7007272};
var placeSearch, autocomplete;

googleMaps = {
      map:[],
      myLatLng: {lat: -18.8800397, lng: -47.05878999999999},
      zoom: 5,
      center: this.myLatLng,
      mapTypeId:'',
      elementId:"mapa",
      actualLongitude: 0,
      actualLatitude: 0,

    getCurrentPosition: function(){
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
              this.actualLongitude = position.coords.longitude; 
              this.actualLatitude = position.coords.latitude;
            },function(error){ // callback de erro
              alert('Erro ao obter localização!');
              console.log('Erro ao obter localização.', error);
            });
        }    
    },
    
    getLocal: function(objHtml){
       // var geocoder = new google.maps.Geocoder();
           autocomplete = 
           new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById(objHtml)),
            {types: ['geocode']}
          );
         //geocoder.geocode({address: endereco});
    }
    
}


var initAutocomplete = function () {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      //autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} *///(document.getElementById('local_saida')),
      //{types: ['geocode']});

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      //autocomplete.addListener('place_changed', fillInAddress);
    }

/**
  http://www.princiweb.com.br/blog/programacao/google-apis/google-maps-api-v3-busca-de-endereco-e-autocomplete.html
  https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform?hl=pt-br
*/


