<script>
    export default{
        props: ['initialWorkers'],


        data() {
            return {
                result: false,
                workers: false,
                cities: false
            }
        },

        methods: {
            toggleActivation(worker){
                let endpoint = worker.status ? 'inactivate' : 'activate'

                axios.get(`/dashboard/workers/${worker.id}/${endpoint}`).then( response => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه التعطيل بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    })

                    worker.status = !worker.status
                });
            },
            show(worker){
                window.location = "/dashboard/workers/" + worker.id
            },
            confirm(worker) {
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
                        this.destroy(worker)
                    } else {
                        this.$swal({
                            type: 'error',
                            title: 'تمت الإلغاء!',
                            text: 'تم إلغاء عمليه الحذف',
                            timer: 1500,
                            showConfirmButton: false,
                        });
                    }
                })
            },

            destroy(worker){
                axios.delete(`/dashboard/workers/${worker.id}`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه الحذف بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    });

                    this.workers.splice(this.workers.indexOf(worker), 1)
                })
            }
        },

        created(){
            this.workers = this.initialWorkers.data
        }

    }
</script>
<style lang="scss">

</style>