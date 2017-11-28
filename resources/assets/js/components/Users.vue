<template>
    <ais-index
            app-id="9JUTOYSC0P"
            api-key="ace6d2005127d3008fc06fc188a172b1"
            index-name="users">

        <ais-search-box placeholder="Find users..." :autofocus="true"></ais-search-box>

        <ais-results>
            <template slot-scope="{ result }">
                <h2>
                    <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                </h2>
            </template>
        </ais-results>

        <ais-no-results>
            <template slot-scope="props">
                No results found for <i>{{ props.query }}</i>.
            </template>
        </ais-no-results>
    </ais-index>
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