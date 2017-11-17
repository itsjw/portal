<template>
    <gmap-map
            :center="center"
            :zoom="7"
            style="width: 500px; height: 300px"
    >
        <gmap-marker
                :key="index"
                v-for="(m, index) in markers"
                :position="m.position"
                :clickable="true"
                :draggable="true"
                @click="center=m.position"
        ></gmap-marker>
    </gmap-map>
</template>

<script>
    /////////////////////////////////////////
    // New in 0.4.0
    import * as VueGoogleMaps from 'vue2-google-maps';
    import Vue from 'vue';

    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyDlDS7KYdMMQd_CynknFWTxhZwUwMhnZAg',
        }
    });

    export default {
        data () {
            return {
                center: {lat: 10.0, lng: 10.0},
                markers: [],
                users: []
            }
        },

        created() {
            this.fetchUsers();
        },

        methods: {
            fetchUsers: function() {
                axios.get('/api/users')
                    .then(function (response) {
                        this.users = response.data.data;
                        this.setMarkers();
                    }.bind(this));
            },

            setMarkers: function() {
                const users = this.users;
                users.forEach(function(user) {
                    const position = [{
                        lat: user.lat,
                        lng: user.lng
                    }];

                    this.markers.push([position]);
                });
            }
        }
    }
</script>