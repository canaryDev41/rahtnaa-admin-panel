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
            activate(worker){
                axios.get(`/dashboard/workers/${worker.id}/activate`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه التفعيل بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    })
                })

                setTimeout(function () {
                    location.reload();
                }, 1490);
            },
            inactivate(worker){
                axios.get(`/dashboard/workers/${worker.id}/inactivate`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه التعطيل بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    })
                });

                setTimeout(function () {
                    location.reload();
                }, 1490);
            },
            addModal(){
//                axios.get(`/dashboard/cities`).then(respose => {
//                    console.log(respose.data)
//                })
                console.log('test')
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