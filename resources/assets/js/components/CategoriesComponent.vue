<script>
    export default{
        props: ['initialCategories'],


        data() {
            return {
                result: false,

                categories: false
            }
        },


        methods: {
            toggleActivation(worker){
                let endpoint = worker.status ? 'inactivate' : 'activate';

                this.$swal({
                    type: 'question',
                    title: 'هل انت متأكد ؟',
                    confirmButtonText: 'نعم, انا متأكد',
                    cancelButtonText: 'لا',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.value) {
                        axios.get(`/dashboard/categories/${worker.id}/${endpoint}`).then(response => {
                            worker.status = !worker.status
                        });

                        this.$swal({
                            type: 'success',
                            title: 'تمت العمليه!',
                            text: 'اكتملت العمليه بنجاح',
                            timer: 1500,
                            showConfirmButton: false,
                        });

                    }
                });
            },
            confirm(category) {
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
                        this.destroy(category)
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

            destroy(category){
                axios.delete(`/dashboard/categories/${category.id}`).then(respose => {
                    this.$swal({
                        type: 'success',
                        title: 'تمت العمليه!',
                        text: 'اكتملت عمليه الحذف بنجاح',
                        timer: 1500,
                        showConfirmButton: false,
                    });

                    this.categories.splice(this.categories.indexOf(category), 1)
                })
            }
        },

        created(){
            this.categories = this.initialCategories.data
        }

    }
</script>
<style lang="scss">
    [v-cloak] {
        visibility: none;
        display: none;
    }
</style>