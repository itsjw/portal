<template>
    <button :class="classes" @click="subscribe">Subscribe</button>
</template>

<script>
    export default {
        props: ['active'],

        computed: {
            classes() {
                return ['btn', this.active ? 'button is-small is-info is-outlined' : 'button is-small is-outlined'];
            }
        },

        methods: {
            subscribe: function () {
                axios[
                    (this.active ? 'delete' : 'post')
                    ](location.pathname + '/subscriptions');

                this.active = !this.active;
            }
        }
    }
</script>
