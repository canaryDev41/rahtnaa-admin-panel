<script>
    export default{
        props:['initialJobs'],


        data() {
            return {
                result: false,

                jobs:false
            }
        },


        methods: {
            confirm(job) {
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
                        this.destroy(job)
                    }else{
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

            destroy(job){
                axios.delete(`/dashboard/jobs/${job.id}`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه الحذف بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    });

                    this.jobs.splice(this.jobs.indexOf(job),1)
                })
            }
        },

        created(){
          this.jobs = this.initialJobs.data
        }

    }
</script>
<style lang="scss">
[v-cloak]{
    visibility: none;
    display: none;
}
</style>