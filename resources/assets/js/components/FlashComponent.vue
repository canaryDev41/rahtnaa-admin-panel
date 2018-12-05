<template>
    <div class="alert alert-positioning"
         @click="flashClicked"
         :class="'alert-'+type" v-show="visable" role="alert">
        {{body}}
    </div>
</template>
<script>
    export default {
        props: {
            message: {
                default: '',
            },
        },
        data(){
            return {
                body: '',
                clickHandler:function () {

                },
                type: 'success',
                visable: false
            }
        },
        methods: {
            flash(message, type = 'success'){
                this.body = message;
                this.type = type;
                this.visable = true
            },
            hide(time = 5000){
                setTimeout(() => {
                    this.visable = false
                }, time)
            },
            flashClicked(){
              this.clickHandler()
            }
        },
        created(){
            if (this.message) {
                this.flash(this.message);
                this.hide()
            }
            window.events.$on('flash', ({message, type, clouser, time}) => {
                this.clickHandler = clouser;
                this.flash(message, type);
                this.hide(time)
            })
        }
    }
</script>
<style lang="scss">
    .alert-positioning {
        position: fixed;
        left: 10%;
        top: 5%;
        transform: translate(-10%, -5%);
        z-index: 1000000;
        min-width: 250px;
    }
</style>