<template>
    <div class="bg-green-300 text-green-900 transition duration-500 ease-in-out show right-8 bottom-8 fixed px-5 py-3 rounded-md" 
        role="alert"
        v-show="show"
        v-text="body">
    </div>
</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: this.message,
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash();
            }

            window.events.on('flash', data => this.flash(data));
        },

        methods: {
            flash(data) {
                if (data) {
                    this.body = data.message;
                }

                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 4000);
            }
        }
    }
</script>