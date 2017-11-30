
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./extra/bulma');

require('./global_components');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('user-notifications', require('./components/UserNotifications.vue'));
Vue.component('avatar-form', require('./components/AvatarForm.vue'));
Vue.component('thread-view', require('./pages/Thread.vue'));
Vue.component('php-map', require('./components/PHPMap.vue'));

Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

Vue.component('users', require('./components/Users.vue'));

Vue.component('small-ad', require('./components/SmallAd'));

import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

import VueMarkdown from 'vue-markdown';
Vue.use(VueMarkdown);
Vue.component('vue-markdown', VueMarkdown);

const app = new Vue({
    el: '#app'
});
