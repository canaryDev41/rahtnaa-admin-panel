<script>
    export default{
        props:['initialTasks'],


        data() {
            return {
                tasks:false,
                editingMode:false
            }
        },


        methods: {
            confirm(task) {
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
                        this.destroy(task)
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

            destroy(task){
                axios.delete(`/dashboard/tasks/${task.id}`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه الحذف بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    });

                    this.tasks.splice(this.tasks.indexOf(task),1)
                })
            }
        },

        created(){
          this.tasks = this.initialTasks.data
        }

    }
</script>
<style lang="scss">
[v-cloak]{
    visibility: none;
    display: none;
}
</style>