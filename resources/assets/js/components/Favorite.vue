<template>
    <div>
        <span class="icon is-small" @click="toggle"><i :class="classes"></i></span>
        <span v-text="count"></span>
    </div>
</template>

<script>
    export default {
        props: ['reply'],

        data() {
            return {
                count: this.reply.favoritesCount,
                active: this.reply.isFavorited
            }
        },

        computed: {
            classes: function () {
                return [
                    'btn',
                    this.active ? 'fa fa-heart' : 'fa fa-heart-o'
                ];
            },

            endpoint: function () {
                return '/replies/' + this.reply.id + '/favorites';
            }
        },

        methods: {
            toggle: function () {
                this.active ? this.destroy() : this.create();
            },

            create: function () {
                axios.post(this.endpoint);

                this.active = true;
                this.count++;
            },

            destroy: function () {
                axios.delete(this.endpoint);

                this.active = false;
                this.count--;
            }
        }
    }
</script>