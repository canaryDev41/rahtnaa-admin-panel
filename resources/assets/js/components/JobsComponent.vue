<script>
    export default{
        data() {
            return {

            }
        },
        mounted() {

        },
        methods: {
            show () {
                this.$modal.show('hello-world');
            },
            hide () {
                this.$modal.hide('hello-world');
            }
        }
    }
</script>
<style lang="scss">

</style>