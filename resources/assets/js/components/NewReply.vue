<template>
    <div>
        <div class="card" v-if="signedIn">
            <div class="card-content" >
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img v-bind:src="user.avatar_path">
                        </p>
                    </figure>

                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" placeholder="Have something to say?" rows="5" name="body" id="body" required v-model="body"></textarea>
                            </p>
                            <small>Use Markdown with <a href="https://help.github.com/categories/writing-on-github/">GitHub-flavored</a> code blocks.</small>
                        </div>

                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <a type="submit" class="button is-small" @click="addReply">Leave Reply</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </article>
            </div>
        </div>

        <p v-else>
            Please <a href="/login">sign in</a> to participate in this
            discussion.
        </p>
    </div>
</template>

<script>
    import 'jquery.caret';
    import 'at.js';

    export default {
        data() {
            return {
                body: '',
                user: window.App.user
            };
        },

        mounted() {
            $('#body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                        $.getJSON("/public/users", {username: query}, function(usernames) {
                            callback(usernames)
                        });
                    }
                }
            });
        },

        methods: {
            addReply: function () {
                axios.post(location.pathname + '/replies', {body: this.body})
                    .catch(error => {
                        flash(error.response.data, 'danger');
                    })
                    .then(({data}) => {
                        this.body = '';

                        flash('Your reply has been posted.');

                        this.$emit('created', data);
                    });
            }
        }
    }
</script>
