<template>
    <div>
        <ais-index index-name="users"
                   app-id="window"
                   api-key="YourSearchAPIKey"
                   :query-parameters="{
             distinct: true,
             attributeForDistinct: 'product_id'
           }"
        >
            <!-- Add your InstantSearch components here. -->
        </ais-index>
    </div>
</template>

<script>
    import { Component } from 'vue-instantsearch';


    export default {
        mixins: [Component],
        computed: {
            query() {
                return this.searchStore.query;
            },
        },
    };
</script>