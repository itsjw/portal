<template>
    <li class="nav-item dropdown" v-if="notifications.length">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Notifications</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a v-for="notification in notifications"
               :href="notification.data.link"
               v-text="notification.data.message"
               @click="markAsRead(notification)"
               class="dropdown-item"
            ></a>
        </div>
    </li>
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
            markAsRead(notification) {
                axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification.id)
            }
        }
    }
</script>
