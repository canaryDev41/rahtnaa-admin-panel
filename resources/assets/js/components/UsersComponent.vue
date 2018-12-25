<script>
    export default{
        props: ['initialUsers'],

        data() {
            return {
                result: false,
                users: false,
                cities: false
            }
        },

        methods: {
            toggleActivation(user){
                let endpoint = user.status ? 'inactivate' : 'activate';

                axios.get(`/dashboard/users/${user.id}/${endpoint}`).then( response => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت العمليه بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    });

                    user.status = !user.status
                });
            },
            show(user){
                window.location = "/dashboard/users/" + user.id
            },
            confirm(user) {
                // $swal function calls SweetAlert into the application with the specified configuration.
                this.$swal({
                    type: 'question',
                    title: 'هل تريد الحذف بالفعل؟',
                    confirmButtonText: 'نعم, انا متأكد',
                    cancelButtonText: 'لا',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.value) {
                        this.destroy(user)
                    } else {
                        this.$swal({
                            type: 'error',
                            title: 'تم الإلغاء!',
                            text: 'تم إلغاء عمليه الحذف',
                            timer: 1500,
                            showConfirmButton: false,
                        });
                    }
                })
            },

            destroy(user){
                axios.delete(`/dashboard/users/${user.id}`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه الحذف بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    });

                    this.users.splice(this.users.indexOf(user), 1)
                })
            },

            showToast(){
                this.$toast.success({
                    title:'طلب جديد!',
                    message:'مرحبا هذا طلب جديد ! الرجاء معالجته في اقرب وقت ممكن!'
                });
            }
        },

        created(){
            this.users = this.initialUsers.data
        }

    }
</script>
<style lang="scss">

</style>