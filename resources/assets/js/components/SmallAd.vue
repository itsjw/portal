<template>
    <div class="ad">
        <div class="container">
            <div class="is-flex is-centered">
                <img :src="ad.image" :alt="ad.title" class="ad-thumbnail">
                <img :src="ad.pixel" :alt="ad.title" v-if="ad.pixel">

                <p class="ad-description">
                    <strong v-text="ad.title"></strong>
                    <span v-text="ad.description"></span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ad: {
                    title: '',
                    description: '',
                    image: '',
                    pixel: false,
                    statlink: ''
                }
            }
        },

        created() {
            this.fetchAds();
        },

        methods: {
            fetchAds: function() {
                let self = this;
                jsonp('URL', null, function (err, data) {
                    if (err) {
                        console.error(err.message);
                    } else {
                        self.ad = data.ads[0];
                    }
                });
            }
        }
    };
</script>

<style>
    .ad {
        background: gray;
        color: white;
        padding: 1em 0 ;
    }

    .ad-description {

    }

    .ad-thumbnail {
        width: 30px;
        height: 30px;
        margin-right: 10px;
    }
</style>