<!--suppress ALL -->
<script>
    export default{
        props: ['initialCities', 'initialCategories'],
        data() {
            return {
                cities: [],
                city: null,
                users: [],
                workers: [],
                user: null,
                worker: null,
                category: null,
                categories: [],
                job: null,
                total: 0,
                jobs: [],
                tasks: [],
                total: 0,
                query: "",
                start_date: null,
                cart: [],
            }
        },

        computed: {
            filteredTasks() {
                return this.tasks.filter((task) => {
                    return task.name.includes(this.query) ? task : ''
                })
            },

            cartTotal(){
                return this.total = this.cart.reduce(function(accumlutor, currentValue) {
                    return accumlutor + (currentValue.price * currentValue.quantity)
                }, 0)
            }
        },

        methods: {
            getUsers(city){
                this.workers = [];
                this.worker = [];
                this.users = [];
                this.user = [];

                axios.get(`/api/getWorkers/${city}`).then(res => {
                    this.workers = res.data
                })

                axios.get(`/api/getUsers/${city}`).then(res => {
                    this.users = res.data
                })
            },

            getTasks(job){
                axios.get(`/api/getTasks/${job.id}`).then(res => {
                    this.tasks = res.data
                })
            },

            addToCart(task){
                if (this.taskExistInCart(task)) return task.quantity++;
                task.quantity = 1;
                return this.cart.push(task);
            },

            taskExistInCart(task){
                return !!this.cart.find(item => item.id == task.id)
            },

            increaseQuantity(task){
                return task.quantity++;
            },

            decreaseQuantity(task){
                task.quantity--

                if (task.quantity === 0) {
                    this.cart.splice(this.cart.indexOf(task), 1)
                }

            },

            deleteItem(index){
                this.cart.splice(index, 1);
            },

            submitOrder(){

                let headers = {
                    'Content-Type': 'application/json;charset=utf8',
                }

                axios.post(`/api/order/`, {
                    'worker_id': this.worker ? this.worker.id : null,
                    'user_id': this.user.id ? this.user.id : null,
                    'job_id': this.job.id,
                    'total': this.total,
                    'start_date': this.start_date + ' 00:00:00',
                    'end_date': '0000-00-00 00:00:00',
                    'tasks': this.cart,
                    'lat': 0.00,
                    'lng': 0.00,
                    'status': 1
                }, {headers: headers}).then(res => {
                    res.data.status == 201 ? flash(`تم انشاء الطلب بنجاح !`, 'info') : flash(`عذرا لم يتم انشاء الطلب !`, 'warning');
                })
            }
        },

        created(){
            this.cities = this.initialCities
            this.categories = this.initialCategories
        }

    }
</script>
<style>
    [v-cloak] {
        display: none;
    }
</style>