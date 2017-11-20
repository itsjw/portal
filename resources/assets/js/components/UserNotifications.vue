<template>
    <div class="navbar-item has-dropdown is-hoverable" v-if="notifications.length">
        <a class="navbar-link" href="#">
            Notifications
        </a>
        <div class="navbar-dropdown is-boxed">
            <a v-for="notification in notifications"
               :href="notification.data.link"
               v-text="notification.data.message"
               @click="markAsRead(notification)"
               class="navbar-item"
            ></a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return { notifications: false }
        },

        created() {
            axios.get('/profiles/' + window.App.user.name + '/notifications')
                .then(response => this.notifications = response.data);
        },

        methods: {
            markAsRead: function (notification) {
                axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification.id)
            }
        }
    }
</script>
