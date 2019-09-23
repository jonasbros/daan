const axios = require('axios');

//fetch cities of a province the user selected, blyat
window.getCities = function (provinceID) {
    let citySelect = document.getElementById('route-city');

    axios.get('/routes/getprovincecities/' + provinceID)
        .then( function(response) {
            console.log(response);
            //remove elements first
            while(citySelect.firstChild.nextSibling) {
                citySelect.removeChild(citySelect.firstChild.nextSibling);
            }            
            //create option based on province selected            
            response.data.forEach(function(el) {
                let newOption = document.createElement('option'); // create option element
                let newOptionCity = document.createTextNode(el.city); // creat text for element. the city name in this case
                newOption.appendChild(newOptionCity); // add text to our new option element
                newOption.value = el.id; // add the id of the city that was fetched from DB.

                citySelect.appendChild(newOption); // append new option to our city select element
            });
        } )
        .catch( function() {
            console.log('something went wrong');
            //remove cities if no data or error'd
            while(citySelect.firstChild.nextSibling) {
                citySelect.removeChild(citySelect.firstChild.nextSibling);
            }
        } );
}