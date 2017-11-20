<template>
    <div>
        <div id="map_container"></div>
        <div id="map"></div>
    </div>
</template>

<script>
    var MarkerClusterer = require('marker-clusterer-plus');

    export default {
        props: ['allusers', 'allusergroups'],

        data() {
            return {
                users: [],
                usergroups: [],
                mapLoaded: false,
                map: null,
                markerClusterer: null
            }
        },

        mounted() {
            this.initMap();
        },

        methods: {
            initMap: function () {
                var properties = this.loadMapProperties();
                var mapOptions = {
                    zoom: properties.zoom,
                    center: new google.maps.LatLng(properties.lat, properties.lng),
                    scrollwheel: false
                };

                this.map = new google.maps.Map(document.querySelector('#map'), mapOptions);
                this.createMap();

                google.maps.event.addListener(this.map, 'idle', () => {
                    $('footer').css('margin-top', ($('#map').height() - 160) + 'px');
                });

                google.maps.event.addListener(this.map, 'dragend', () => {
                    this.storeMapProperties();
                });

                google.maps.event.addListener(this.map, 'zoom_changed', () => {
                    this.storeMapProperties();
                });
            },

            createMap: function () {
                axios.get('/public-api/users').then(response => {
                    this.users = response.data.data;
                    var all = response.data.data;
                    var positions = [];
                    var markers = [];
                    var infowindow = new google.maps.InfoWindow({
                        content: ""
                    });

                    all.forEach(function (user) {
                        var usr = {
                            name: user.name,
                            username: user.username,
                            avatar: user.avatar_path,
                            geo: {
                                lat: parseFloat(user.lat),
                                lon: parseFloat(user.lng)
                            }
                        };

                        var position;
                        var randomness = 0.01;

                        while (usr.geo.lat > 0 && usr.geo.lon > 0) {
                            position = usr.geo.lat + "-" + usr.geo.lng;

                            if (positions.indexOf(position) !== -1) {
                                usr.geo.lat += (Math.random() - 0.5) * randomness;
                                usr.geo.lon += (Math.random() - 0.5) * randomness;
                            } else {
                                break;
                            }
                        }

                        positions.push(position);

                        var html = '<div class="profile"><img class="img img-circle" src="' + usr.avatar + '" alt="">&nbsp;<a href="/@' + usr.username + '">' + usr.username + '</a></div>';
                        var userLatLng = new google.maps.LatLng(usr.geo.lat, usr.geo.lon);

                        var marker = new google.maps.Marker({
                            position: userLatLng
                        });

                        markers.push(marker);
                        var infoBox = null;

                        google.maps.event.addListener(marker, 'click', function (evt) {
                            if (infoBox === null) {
                                infoBox = new InfoBox({
                                    latlng: this.getPosition(),
                                    map: this.map,
                                    content: html,
                                    offset: {
                                        vertical: -190,
                                        horizontal: -50
                                    }
                                });
                            } else {
                                infoBox.toggle();
                            }
                        });
                    });

                    var clustererOptions = {
                        imagePath: '/images/map/m'
                    };

                    this.markerClusterer = new MarkerClusterer(this.map, markers, clustererOptions);

                    // Map and markers are loaded, show the map
                    this.mapLoaded = true;

                    // Add the usergroups
                    if (this.usergroups.length > 0) {
                        this.addUserGroupsToMap();
                    }
                });
            },

            loadMapProperties: function () {
                const properties = JSON.parse(localStorage.getItem('HomeMap.properties'));
                return properties ? properties : {lat: 51.165691, lng: 10.451526, zoom: 3};
            },

            storeMapProperties: function () {
                localStorage.setItem('HomeMap.properties', JSON.stringify({
                    lat: this.map.getCenter().lat(),
                    lng: this.map.getCenter().lng(),
                    zoom: this.map.getZoom()
                }));
            },

            addUserGroupsToMap: function () {
                this.usergroups.forEach((usergroup) => {
                    let latLng = new google.maps.LatLng(usergroup.latitude, usergroup.longitude);

                    var image = {
                        url: '/images/elephpant.png',
                        anchor: new google.maps.Point(22, 0)
                    };

                    var marker = new google.maps.Marker({
                        position: latLng,
                        title: "Hello World!",
                        icon: image
                    });

                    let infoBox = null;
                    var tags = "";

                    if (usergroup.tags) {
                        tags = '<div class="tags">';
                        usergroup.tags.forEach((tag) => {
                            tags += '<span>' + tag.name + '</span>';
                        });
                        tags += '</div>';
                    }

                    var html = '<div class="usergroup"><a href="' + usergroup.url + '" target="_blank" class="name">Usergroup ' + usergroup.name + '</a>' + tags + '</div>';

                    google.maps.event.addListener(marker, 'click', function (evt) {
                        if (infoBox === null) {
                            infoBox = new InfoBox({
                                latlng: this.getPosition(),
                                map: this.map,
                                content: html,
                                offset: {
                                    vertical: -10,
                                    horizontal: 30
                                }
                            });
                        } else {
                            infoBox.toggle();
                        }
                    });

                    this.markerClusterer.addMarker(marker);

                });
            },

            loadUserGroups: function () {
                let result = this.allusergroups;
                if (typeof result.groups != 'undefined') {
                    this.usergroups = result.groups;
                    if (this.markerClusterer !== null) {
                        this.addUserGroupsToMap();
                    }
                }
            }
        }
    }
</script>

<style>
    #map_container{
        position: relative;
    }

    #map{
        height: 500px;
        width: 100%;
        overflow: hidden;
        padding-bottom: 22.25%;
        padding-top: 30px;
        position: relative;
    }
</style>