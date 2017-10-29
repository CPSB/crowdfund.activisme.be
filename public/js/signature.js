new Vue({
    // https://cdnjs.cloudflare.com/ajax/libs/vue/0.11.0/vue.js
    el: '#app',

    data: {
        newMessage: {
            name: '',
            email: '',
            country: '',
            postal_code: '',
            city_name: '',
        },

        submitted: false
    },

    computed: {
        errors: function() {
            for (var key in this.newMessage) {
                if ( ! this.newMessage[key]) return true;
            }

            return false;
        }
    },
});