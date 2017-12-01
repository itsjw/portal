<template>
    <div class="columns is- is-marginless is-centered">
        <div class="column">
            <nav class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Dashboard
                    </p>
                </header>

                <div class="card-content">
                    You are logged in!
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                feedItems: []
            }
        },

        created() {
            this.fetchFeed();
        },

        methods: {
            fetchFeed: function() {
                let self = this;
                axios.get('/api/users/profile-feed')
                    .then(function (response) {
                        self.feedItems = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    };
</script>