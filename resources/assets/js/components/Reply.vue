<template>
    <div>
        <div :id="'reply-'+id" class="card">
            <div class="card-content">
                <div v-if="editing">
                    <form @submit="update">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" v-model="body" required></textarea>
                            </div>
                        </div>

                        <button class="button is-small">Update</button>
                        <button class="button is-small" @click="editing = false" type="button">Cancel</button>
                    </form>
                </div>

                <article class="media" v-if="! editing">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img v-bind:src="reply.owner.avatar_path" v-bind:alt="reply.owner.username">
                        </p>
                    </figure>

                    <div class="media-content">
                        <div class="content">
                            <a :href="'/@' + reply.owner.username"><strong>{{ reply.owner.name }}</strong></a> <small><span v-text="ago"></span></small>
                            <br>
                            <vue-markdown v-html="body"></vue-markdown>
                        </div>

                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item" v-if="authorize('owns', reply) || authorize('owns', reply.thread)" @click="destroy">
                                    <div v-if="authorize('owns', reply)">
                                        <span class="icon is-small"><i class="fa fa-trash"></i></span>
                                    </div>
                                </a>

                                <a class="level-item" v-if="authorize('owns', reply) || authorize('owns', reply.thread)" @click="editing = true">
                                   <div v-if="authorize('owns', reply)">
                                       <span class="icon is-small"><i class="fa fa-pencil-square-o"></i></span>
                                   </div>
                                </a>

                                <a class="level-item" v-if="signedIn">
                                    <favorite :reply="reply"></favorite>
                                </a>
                            </div>
                        </nav>

                    </div>

                    <div class="media-right">
                        <a @click="markBestReply" v-if="authorize('owns', reply.thread)">
                            <span class="icon is-small"><i class="fa fa-star-o"></i></span>
                        </a>
                    </div>
                </article>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    import Favorite from './Favorite.vue';
    import moment from 'moment';

    export default {
        props: ['reply'],

        components: { Favorite },

        data() {
            return {
                editing: false,
                id: this.reply.id,
                body: this.reply.body,
                isBest: this.reply.isBest,
            };
        },

        computed: {
            ago: function () {
                return moment(this.reply.created_at).fromNow() + '...';
            }
        },

        created () {
            window.events.$on('best-reply-selected', id => {
                this.isBest = (id === this.id);
            });
        },

        methods: {
            update: function () {
                axios.patch(
                    '/replies/' + this.id, {
                        body: this.body
                    })
                    .catch(error => {
                        flash(error.response.data, 'danger');
                    });

                this.editing = false;

                flash('Updated!');
            },

            destroy: function () {
                axios.delete('/replies/' + this.id);

                this.$emit('deleted', this.id);
            },

            markBestReply: function () {
                axios.post('/replies/' + this.id + '/best');

                window.events.$emit('best-reply-selected', this.id);
            }
        }
    }
</script>
