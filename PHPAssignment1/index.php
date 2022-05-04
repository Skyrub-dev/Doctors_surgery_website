<?php
  session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">

  <script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

  <title>Doctors Surgery | Home</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
      <a href="index.php" class="navbar-brand">Doctors Surgery</a>

      <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#navbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="#instructors" class="nav-link">Find us</a>
          </li>
          <li class="nav-item">
          <?php
          if (isset($_SESSION["username"]))
          {
            /*Grabs the username of the user and displays it on the site - looged in called #loggedin*/
            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#who'>
            Book an appointment
            </button>";
            echo "&nbsp;&nbsp;<a class='btn btn-success' href='pending.php' role='button'>View pending appointments</a>";
            echo "&nbsp;&nbsp;<a class='btn btn-danger' href='includes/logout.inc.php' role='button'>Logout</a>";
          }
          else
          {
            echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModalToggle'>
            Book an appointment / Patient login
            </button>";
            echo "&nbsp;&nbsp;<a href='doctorlogin.php' class='btn btn-warning' role='button'>Doctor? login here</a>";
          }
        ?>
            
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!--Warning for users if they're in need call XXX or visit hospital-->
  <section class="vg-primary bg-warning text-dark p-3">
    <div class="container">
      <div class="imga">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
          <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
          <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
        </svg>
      </div>
      <div class="d-md-flex justify-content-between align-items-center">
        <h3 class="mb-3 mb-md-0"><b>Have an emergency? - Contact 999</b></h3>
      </div>
    </div>
  </section>

  <!--Main site desciptor box-->

  <section class="bg-dark text-light p-5 text-center">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
        <?php
          if (isset($_SESSION["username"]))
          {
            /*Grabs the username of the user and displays it on the site*/
            echo "<h1>We're here to help, " . $_SESSION["username"] . "!</span></h1>";
            
          }
          else
          {
            echo "<h1>Here to help!
            </span></h1>";
          }
        ?>
          
        </div>
      </div>
    </div>
  </section>

  <section class="p-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">

              </div>
              <h3 class="card-title mb-3">
                BMI and body weight
              </h3>
              <p class="card-text">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bmi">
                  Calculate
                </button>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
  
                </div>
                <h3 class="card-title mb-3">
                  NHS Health A to Z index
                </h3>
                <p class="card-text">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#health">
                    Find out more
                  </button>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="col-md">
            <div class="col-md">
              <div class="card bg-dark text-light">
                <div class="card-body text-center">
                  <div class="h1 mb-3">
    
                  </div>
                  <h3 class="card-title mb-3">
                    Depression assessment
                  </h3>
                  <p class="card-text">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#depress">
                      Find out more
                    </button>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section id="faq" class="p-5">

</section>

<section id="overview" class="p-5 bg-dark">
  <div class="container">
    <h2 class="text-center text-white">Overview of services we provide:</h2>
    <p class="lead text-center text-white mb-5">
      
    </p>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card bg-warning" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">A&E Services</h5>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Dietics</h5>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Mental Health Services</h5>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">General Surgery</h5>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="search" class="p-5 bg-dark">
  <div class="container">
    <div class="row g-4">
      <div class="col-md">
        <h2 class="text-center text-white">Looking for something specific?</h2>
        <p class="lead text-center text-white mb-5">
          <form>
            <input type="text" size="150" onkeyup="showResult(this.value)">
            <div id="livesearch"></div>
          </form>
          
        </p>
      </div>
    </div>
    
    
  </div>
</section>

<section id="faq" class="p-5 bg-dark">
  <div class="container">
    <h2 class="text-center text white">F.A.Q</h2>
    <p class="lead text-center text-white mb-5">
      F.A.Q
    </p>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <i>Where are we located?</i>
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">We are located at, Furness College, Barrow-in-Furness</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            <i>What services do we provide?</i>
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            Here are some of the services we provide:
            </br>
            - Accident and Emergency
            </br>
            - Dietics
            </br>
            - General Surgery practicies
            </br>
            - Mental Health Services
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            <i>When are we open?</i>
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">We are open between the hours of 9am to 5pm Monday - Friday</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
            <i>How can I contact the surgery?</i>
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">You can contact us through our email at DocSurgery@surgery.com or phone us at 01229 3257382.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingSix">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseThree">
            <i>Help! I have an emergency</i>
          </button>
        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">In the event of an emergency please call 999 or visit your local hospital immidiately.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingSeven">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseThree">
            <i>I've forgotten my login information</i>
          </button>
        </h2>
        <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">In the event of a forgotten password, click here. If you have forgotten your username, you will need to contact us at, 01229 3257382 for verification purposes</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingEight">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
            <i>How does the process work?</i>
          </button>
        </h2>
        <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Once you submit your query for an appointment using the website's appointment maker, one of our doctors will review your information and send you a follow up email discussing a time and</div>
        </div>
      </div>
  </div>
</section>

<section id="instructors" class="p-5 bg-primary">
  <div class="container">
    <div class="row g-4">
      <div class="col-md">
        <h2 class="text-center text-white">Find us</h2>
        <p class="lead text-center text-white mb-5">
          <ul class="list-group list-group-flush lead">
            <li class="list-group-item">
              <span class="fw-bold">Address</span> Furness College Channelside, Barrow-in-Furness, Cumbria, United Kingdom
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Support email</span> Docsurgery@surgery.com
            </li>
            <li class="list-group-item">
              <span class="fw-bold">Phone number</span> 01229 53892938
            </li>
            
          </ul>
        </p>
      </div>
    </div>
    
    
  </div>
</section>

<!--
  Copyright 2021 Google LLC

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->
<!DOCTYPE html>
<html>
  <head>
    <title>Locator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map-container {
        width: 100%;
        height: 100%;
        position: relative;
        font-family: "Roboto", sans-serif;
        box-sizing: border-box;
      }

      #map-container button {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        font-size: inherit;
        cursor: pointer;
      }

      #map {
        position: absolute;
        left: 22em;
        top: 0;
        right: 0;
        bottom: 0;
      }

      #locations-panel {
        position: absolute;
        left: 0;
        width: 22em;
        top: 0;
        bottom: 0;
        overflow-y: auto;
        background: white;
        padding: 0.5em;
        box-sizing: border-box;
      }

      @media only screen and (max-width: 876px) {
        #map {
          left: 0;
          bottom: 50%;
        }

        #locations-panel {
          top: 50%;
          right: 0;
          width: unset;
        }
      }

      #locations-panel-list > header {
        padding: 1.4em 1.4em 0 1.4em;
      }

      #locations-panel-list h1.search-title {
        font-size: 1em;
        font-weight: 500;
        margin: 0;
      }

      #locations-panel-list h1.search-title > img {
        vertical-align: bottom;
        margin-top: -1em;
      }

      #locations-panel-list .search-input {
        width: 100%;
        margin-top: 0.8em;
        position: relative;
      }

      #locations-panel-list .search-input input {
        width: 100%;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3em;
        height: 2.2em;
        box-sizing: border-box;
        padding: 0 2.5em 0 1em;
        font-size: 1em;
      }

      #locations-panel-list .search-input-overlay {
        position: absolute;
      }

      #locations-panel-list .search-input-overlay.search {
        right: 2px;
        top: 2px;
        bottom: 2px;
        width: 2.4em;
      }

      #locations-panel-list .search-input-overlay.search button {
        width: 100%;
        height: 100%;
        border-radius: 0.2em;
        color: black;
        background: transparent;
      }

      #locations-panel-list .search-input-overlay.search .icon {
        margin-top: 0.05em;
        vertical-align: top;
      }

      #locations-panel-list .section-name {
        font-weight: 500;
        font-size: 0.9em;
        margin: 1.8em 0 1em 1.5em;
      }

      #locations-panel-list .location-result {
        position: relative;
        padding: 0.8em 3.5em 0.8em 1.4em;
        border-bottom: 1px solid rgba(0, 0, 0, 0.12);
        cursor: pointer;
      }

      #locations-panel-list .location-result:first-of-type {
        border-top: 1px solid rgba(0, 0, 0, 0.12);
      }

      #locations-panel-list .location-result:last-of-type {
        border-bottom: none;
      }

      #locations-panel-list .location-result.selected {
        outline: 2px solid #4285f4;
      }

      #locations-panel-list button.select-location {
        margin-bottom: 0.6em;
        text-align: left;
      }

      #locations-panel-list .location-result h2.name {
        font-size: 1em;
        font-weight: 500;
        margin: 0;
      }

      #locations-panel-list .location-result .address {
        font-size: 0.9em;
        margin-bottom: 0.5em;
      }

      #location-results-list {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      'use strict';

      /**
       * Defines an instance of the Locator+ solution, to be instantiated
       * when the Maps library is loaded.
       */
      function LocatorPlus(configuration) {
        const locator = this;

        locator.locations = configuration.locations || [];
        locator.capabilities = configuration.capabilities || {};

        const mapEl = document.getElementById('map');
        const panelEl = document.getElementById('locations-panel');
        locator.panelListEl = document.getElementById('locations-panel-list');
        const sectionNameEl =
            document.getElementById('location-results-section-name');
        const resultsContainerEl = document.getElementById('location-results-list');

        const itemsTemplate = Handlebars.compile(
            document.getElementById('locator-result-items-tmpl').innerHTML);

        locator.searchLocation = null;
        locator.searchLocationMarker = null;
        locator.selectedLocationIdx = null;
        locator.userCountry = null;

        // Initialize the map -------------------------------------------------------
        locator.map = new google.maps.Map(mapEl, configuration.mapOptions);

        // Store selection.
        const selectResultItem = function(locationIdx, panToMarker, scrollToResult) {
          locator.selectedLocationIdx = locationIdx;
          for (let locationElem of resultsContainerEl.children) {
            locationElem.classList.remove('selected');
            if (getResultIndex(locationElem) === locator.selectedLocationIdx) {
              locationElem.classList.add('selected');
              if (scrollToResult) {
                panelEl.scrollTop = locationElem.offsetTop;
              }
            }
          }
          if (panToMarker && (locationIdx != null)) {
            locator.map.panTo(locator.locations[locationIdx].coords);
          }
        };

        // Create a marker for each location.
        const markers = locator.locations.map(function(location, index) {
          const marker = new google.maps.Marker({
            position: location.coords,
            map: locator.map,
            title: location.title,
          });
          marker.addListener('click', function() {
            selectResultItem(index, false, true);
          });
          return marker;
        });

        // Fit map to marker bounds.
        locator.updateBounds = function() {
          const bounds = new google.maps.LatLngBounds();
          if (locator.searchLocationMarker) {
            bounds.extend(locator.searchLocationMarker.getPosition());
          }
          for (let i = 0; i < markers.length; i++) {
            bounds.extend(markers[i].getPosition());
          }
          locator.map.fitBounds(bounds);
        };
        if (locator.locations.length) {
          locator.updateBounds();
        }

        // Get the distance of a store location to the user's location,
        // used in sorting the list.
        const getLocationDistance = function(location) {
          if (!locator.searchLocation) return null;

          // Fall back to straight-line distance.
          return google.maps.geometry.spherical.computeDistanceBetween(
              new google.maps.LatLng(location.coords),
              locator.searchLocation.location);
        };

        // Render the results list --------------------------------------------------
        const getResultIndex = function(elem) {
          return parseInt(elem.getAttribute('data-location-index'));
        };

        locator.renderResultsList = function() {
          let locations = locator.locations.slice();
          for (let i = 0; i < locations.length; i++) {
            locations[i].index = i;
          }
          if (locator.searchLocation) {
            sectionNameEl.textContent =
                'Nearest locations (' + locations.length + ')';
            locations.sort(function(a, b) {
              return getLocationDistance(a) - getLocationDistance(b);
            });
          } else {
            sectionNameEl.textContent = `All locations (${locations.length})`;
          }
          const resultItemContext = { locations: locations };
          resultsContainerEl.innerHTML = itemsTemplate(resultItemContext);
          for (let item of resultsContainerEl.children) {
            const resultIndex = getResultIndex(item);
            if (resultIndex === locator.selectedLocationIdx) {
              item.classList.add('selected');
            }

            const resultSelectionHandler = function() {
              selectResultItem(resultIndex, true, false);
            };

            // Clicking anywhere on the item selects this location.
            // Additionally, create a button element to make this behavior
            // accessible under tab navigation.
            item.addEventListener('click', resultSelectionHandler);
            item.querySelector('.select-location')
                .addEventListener('click', function(e) {
                  resultSelectionHandler();
                  e.stopPropagation();
                });
          }
        };

        // Optional capability initialization --------------------------------------
        initializeSearchInput(locator);

        // Initial render of results -----------------------------------------------
        locator.renderResultsList();
      }

      /** When the search input capability is enabled, initialize it. */
      function initializeSearchInput(locator) {
        const geocodeCache = new Map();
        const geocoder = new google.maps.Geocoder();

        const searchInputEl = document.getElementById('location-search-input');
        const searchButtonEl = document.getElementById('location-search-button');

        const updateSearchLocation = function(address, location) {
          if (locator.searchLocationMarker) {
            locator.searchLocationMarker.setMap(null);
          }
          if (!location) {
            locator.searchLocation = null;
            return;
          }
          locator.searchLocation = {'address': address, 'location': location};
          locator.searchLocationMarker = new google.maps.Marker({
            position: location,
            map: locator.map,
            title: 'My location',
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: 12,
              fillColor: '#3367D6',
              fillOpacity: 0.5,
              strokeOpacity: 0,
            }
          });

          // Update the locator's idea of the user's country, used for units. Use
          // `formatted_address` instead of the more structured `address_components`
          // to avoid an additional billed call.
          const addressParts = address.split(' ');
          locator.userCountry = addressParts[addressParts.length - 1];

          // Update map bounds to include the new location marker.
          locator.updateBounds();

          // Update the result list so we can sort it by proximity.
          locator.renderResultsList();
        };

        const geocodeSearch = function(query) {
          if (!query) {
            return;
          }

          const handleResult = function(geocodeResult) {
            searchInputEl.value = geocodeResult.formatted_address;
            updateSearchLocation(
                geocodeResult.formatted_address, geocodeResult.geometry.location);
          };

          if (geocodeCache.has(query)) {
            handleResult(geocodeCache.get(query));
            return;
          }
          const request = {address: query, bounds: locator.map.getBounds()};
          geocoder.geocode(request, function(results, status) {
            if (status === 'OK') {
              if (results.length > 0) {
                const result = results[0];
                geocodeCache.set(query, result);
                handleResult(result);
              }
            }
          });
        };

        // Set up geocoding on the search input.
        searchButtonEl.addEventListener('click', function() {
          geocodeSearch(searchInputEl.value.trim());
        });

        // Add in an event listener for the Enter key.
        searchInputEl.addEventListener('keypress', function(evt) {
          if (evt.key === 'Enter') {
            geocodeSearch(searchInputEl.value);
          }
        });
      }
    </script>
    <script>
      const CONFIGURATION = {
        "locations": [
          {"title":"Furness College","address1":"Channelside","address2":"Barrow-in-Furness LA14 2PJ, UK","coords":{"lat":54.1168204446428,"lng":-3.2424527423278837},"placeId":"ChIJs-ss7CepfEgRuL1nQKNub0I"}
        ],
        "mapOptions": {"center":{"lat":38.0,"lng":-100.0},"fullscreenControl":true,"mapTypeControl":false,"streetViewControl":false,"zoom":4,"zoomControl":true,"maxZoom":17},
        "mapsApiKey": "AIzaSyBP295GahuQUBZM7Ik95NSNMta2XHJmCrk",
        "capabilities": {"input":true,"autocomplete":false,"directions":false,"distanceMatrix":false,"details":false}
      };

      function initMap() {
        new LocatorPlus(CONFIGURATION);
      }
    </script>
    <script id="locator-result-items-tmpl" type="text/x-handlebars-template">
      {{#each locations}}
        <li class="location-result" data-location-index="{{index}}">
          <button class="select-location">
            <h2 class="name">{{title}}</h2>
          </button>
          <div class="address">{{address1}}<br>{{address2}}</div>
        </li>
      {{/each}}
    </script>
  </head>
  <body>
    <div id="map-container">
      <div id="locations-panel">
        <div id="locations-panel-list">
          <header>
            <h1 class="search-title">
              <img src="https://fonts.gstatic.com/s/i/googlematerialicons/place/v15/24px.svg"/>
              Find a location near you
            </h1>
            <div class="search-input">
              <input id="location-search-input" placeholder="Enter your address or zip code">
              <div id="search-overlay-search" class="search-input-overlay search">
                <button id="location-search-button">
                  <img class="icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/search/v11/24px.svg" alt="Search"/>
                </button>
              </div>
            </div>
          </header>
          <div class="section-name" id="location-results-section-name">
            All locations
          </div>
          <div class="results">
            <ul id="location-results-list"></ul>
          </div>
        </div>
      </div>
      <div id="map"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP295GahuQUBZM7Ik95NSNMta2XHJmCrk&callback=initMap&libraries=places,geometry&solution_channel=GMP_QB_locatorplus_v4_cA" async defer></script>
  </body>
</html>
!
<!--end-->
!
<!-- Modal for booking system -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Before you start...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button class="btn btn-primary" data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal">Login</button>
        <button class="btn btn-secondary" data-bs-target="#signup" data-bs-toggle="modal" data-bs-dismiss="modal">Sign up</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="login" aria-hidden="true" aria-labelledby="loginlabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Welcome back!</h5>
      <div class="modal-body">
      <form action ="includes/login.inc.php" method ="post">
            <input type="text" name="uid" placeholder="Username...">
            <br>
            <br>
            <input type="password" name="pass" placeholder="Password...">
            <br>
            <br>
            <button type="submit" name="submit">login</button>
        </form>
      </div>
      <?php
if (isset($_GET["error"]))
{
    if ($_GET["error"] == "emptyinput")
    {
        echo "<script> alert('Missing input in one or more fields, please try again');</script>";
    }
    else if ($_GET["error"] == "wronglogin")
    {
        echo "<script> alert('Incorrect login information');</script>";
    }
    else if ($_GET["error"] == "passnotverified")
    {
        echo "<script> alert('Password is incorrect, remember passwords are case sensitive');</script>";
    }
}
?>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" data-bs-target="#" data-bs-toggle="modal" data-bs-dismiss="modal">Forgot your password?</button>
      <p><em>Remember you can always visit us to book at: Furness College, Barrow-in-Furness</em></p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" name="signup" id="signup" aria-hidden="true" aria-labelledby="loginlabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Welcome!</h5>
      <div class="modal-body">
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username...">
        <br>
        <br>
        <input type="password" name="pass" placeholder="Password...">
        <br>
        <br>
        <input type="password" name="passrepeat" placeholder="Enter Password again...">
        <br>
        <br>
        <input type="text" name="firstname" placeholder="First name">
        <br>
        <br>
        <input type="text" name="lastname" placeholder="Surname">
        <br>
        <br>
        <input type="date" name="dob" placeholder="Date of birth">
        <br>
        <br>
        <input type="email" name="email" placeholder="Email">
        <br>
        <br>
        <button type="submit" name="submit">Sign up</button>
    </form>
      </div>
      <?php
    /*error handlers, each one of these has a function attatched to it in
    functions.inc.php */
if (isset($_GET["error"]))
{
    if ($_GET["error"] == "emptyinput")
    {
      echo "<script> alert('Missing input in one or more fields, please try again');</script>";  
    }
    else if ($_GET["error"] == "invaliduid")
    {
        echo "<script> alert('Username not valid, please do not include any unsuported characters');</script>";
    }
    else if ($_GET["error"] == "passwordsdontmatch")
    {
        echo "<script> alert('Passwords entered do not match, please try again');</script>";
    }
    else if ($_GET["error"] == "stmtfailed")
    {
        echo "<script> alert('Something went wrong, please try again!');</script>";
    }
    else if ($_GET["error"] == "usernametaken")
    {
        echo "<script> alert('Username is already taken!');</script>";
    }
    else if ($_GET["error"] == "none")
    {
        echo "<script> alert('Welcome to Doctor's Surgery! Learn more in the F.A.Q or get right to booking an appointment');</script>";
        session_start();
        header("location: index.php");
        exit();
    }
}
?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="who" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Who are you booking for?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <button class="btn btn-primary" data-bs-target="#loggedin" data-bs-toggle="modal" data-bs-dismiss="modal">Yourself</button>
      <button class="btn btn-primary" data-bs-target="#whomenu" data-bs-toggle="modal" data-bs-dismiss="modal">Someone else</button>
        
      </div>
      
      
    </div>
  </div>
</div>


<div class="modal fade" id="whomenu" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Please enter some information about the person you're booking for...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="includes/otherbooking.inc.php" method="post">
          <label for="fname">First name:</label>
          <input type="text" id="fname" name="fname"><br><br>
          <label for="lname">Last name:</label>
          <input type="text" id="lname" name="lname"><br><br>
          <label for="dob">DOB:</label>
          <input type="date" id="dob" name="dob"><br><br>
          <label for="email">Enter your email:</label>
          <input type="email" id="email" name="email"><br><br>
          <label for="department">Select the department most relavent to your problem</label>
          <select name="department" id="department">
            <option value="AAE">Accident and Emergency (A&E)</option>
            <option value="GS">General Surgery (GS)</option>
            <option value="D">Dietics (D)</option>
            <option value="MHS">Mental Health Services (MHS)</option>
          </select>

          <br>
          <br>
          <label for="descrip">Description of problem:</label>
          <input type="text" id="descrip" name="descrip"><br><br>

          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Please enter some information about yourself...</h5>
          </div>

          <label for="gfname">First name:</label>  
          <input type="text" id="gfname" name="gfname"><br><br>
          <label for="glname">Last name:</label>
          <input type="text" id="glname" name="glname"><br><br>
          <label for="gdob">DOB:</label>
          <input type="date" id="gdob" name="gdob"><br><br>
          <label for="gemail">Enter your email:</label>
          <input type="email" id="gemail" name="gemail"><br><br>
          

          <br>
          <br>
          <label for="gdescrip">Why are you booking on behalf of this person?</label>
          <input type="text" id="gdescrip" name="gdescrip"><br><br>
          
          <button type="submit" name="submit">Submit</button>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="loggedin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Please enter some information about yourself...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="includes/loggedinbook.inc.php" method="post">
          <?php
            $link = mysqli_connect("localhost", "root", "", "doctorsdb");
            /*$link = mysqli_connect("localhost", "admin", "password", "doctorsdb");*/
            if($link === false){
              die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $sqlpatient = "SELECT * FROM login WHERE username='$_SESSION[username]' ";
            $qsqlpatient = mysqli_query($link, $sqlpatient);
            $rspatient = mysqli_fetch_array($qsqlpatient);
            echo "<label for='fname' id='fname'> Firstname: " . $rspatient["firstname"] . "</label>";
            echo "<br>";
            echo "<br>";
            echo "<label for='lname'> Lastname: " . $rspatient["lastname"] . "</label>";
            echo "<br>";
            echo "<br>";
            echo "<label for='dob'> Date of birth: " . $rspatient["dob"] . "</label>";
            echo "<br>";
            echo "<br>";
            echo "<label for='email'> Email: " . $rspatient["email"] . "</label>";
            echo "<br>";
            echo "<br>";

          ?>
          <label for="department">Select the department most relavent to your problem</label>
          <select name="department" id="department">
            <option value="AAE">Accident and Emergency (A&E)</option>
            <option value="GS">General Surgery (GS)</option>
            <option value="D">Dietics (D)</option>
            <option value="MHS">Mental Health Services (MHS)</option>
          </select>
          <br>
          <br>
          <label for="descrip">Description of problem:</label>
          <input type="text" id="descrip" name="descrip"><br><br>
          <button type="submit" name="submit">Submit</button>
        </form> 
      </div>
      <?php
    /*error handlers, each one of these has a function attatched to it in
    functions.inc.php */
if (isset($_GET["error"]))
{
    if ($_GET["error"] == "emptyinput")
    {
        echo "<h1>Fill in all fields</h1>";
        echo "<script> alert('Missing input in one or more fields, please try again');</script>";
    }
    else if ($_GET["error"] == "none")
    {
        header("location: index.php");
        echo "<script> alert('Appointment successfully booked!');</script>";
        exit();
    }
}
?>
      
    </div>
  </div>
</div>


<div class="modal fade" id="bmi" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bmi">BMI checker</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe id="tool_bmi" src="https://assets.nhs.uk/tools/bmi/index.html?syn_id=81c84dc0-6b26-11ec-89f7-e334b33bb930" style = "width:100%;" frameborder="0" scrolling="no" seamless></iframe><script src="https://assets.nhs.uk/tools/bmi/js/iframe_helper.js"></script><!--NHS tool-->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="health" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="health">Health A to Z</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="position: relative; max-width: 500px; height: 300px"><iframe src="https://api-bridge.azurewebsites.net/conditions/?p=all&aspect=name,overview_short,symptoms_short,symptoms_long,treatments_overview_short,other_treatments_long,self_care_long,prevention_short,causes_short&tab=0&uid=81c84dc0-6b26-11ec-89f7-e334b33bb930" title="NHS website - health a-z" style="position: absolute; height: 100%; width: 100%; border: 2px solid #015eb8;"></iframe></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="depress" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="depress">Think you're suffering from depression?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe id="tool_self-assessments_42" src="https://assets.nhs.uk/tools/self-assessments/index.html?variant=42&syn_id=81c84dc0-6b26-11ec-89f7-e334b33bb930" style = "width:100%;" frameborder="0" scrolling="no" seamless></iframe><script src="https://assets.nhs.uk/tools/self-assessments/js/iframe_helper.js"></script>
      </div>
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>