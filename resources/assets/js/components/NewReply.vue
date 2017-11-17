<template>
    <div>
        <br>
        <div class="card" v-if="signedIn">
            <div class="card-body" >
                <div class="form-group">
                <textarea name="body"
                          id="body"
                          class="form-control"
                          placeholder="Have something to say?"
                          rows="5"
                          required
                          v-model="body"></textarea>
                </div>

                <button type="submit"
                        class="btn btn-primary"
                        @click="addReply">Reply</button>
            </div>
        </div>

        <div class="card text-center" role="alert" v-else>
            <div class="card-body">
                Please <a href="/login">sign in</a> to participate in this
                discussion.
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    import 'jquery.caret';
    import 'at.js';

    export default {
        data() {
            return {
                body: ''
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
            addReply() {
                axios.post(location.pathname + '/replies', { body: this.body })
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
