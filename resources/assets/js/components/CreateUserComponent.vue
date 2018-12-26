<template>
    <modal name="create-user" :pivot-x="0.5" :pivot-y="0.5">

        <div slot="top-right">
            <button @click="$modal.hide('foo')">
                ❌
            </button>
        </div>

        Hello, ☀️!

    </modal>
</template>

<script>
    export default {
        data () {
            return {
                name: null,
                phone: null,
                city: null,
                status: null,
            }
        },
        created () {
            console.log('test')
        }
    }
</script>
<style lang="scss">

</style>