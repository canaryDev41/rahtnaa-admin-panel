<template>
    <div class="modal-content">

        <div class="modal-body p-0">

            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white pb-1">
                    <div class="text-muted text-center mb-3">
                        <small>تسجيل مستخدمة جديده</small>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                    <form role="form">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-user"></i></span>
                                </div>
                                <input class="form-control"
                                       required
                                       v-model="name"
                                       placeholder="الاسم" type="text">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fa fa-phone-square"></i></span>
                                </div>
                                <input class="form-control"
                                       v-model="phone"
                                       required
                                       placeholder="رقم الجوال"
                                       type="text" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-map-marker-alt"></i></span>
                                </div>
                                <select class="form-control" v-model="city" required>
                                    <option :value="city"
                                            v-for="city in cities" v-text="city.name"></option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button @click.prevent="submitForm"
                                    class="btn btn-primary my-4">حفظ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { required, minLength, between } from 'vuelidate/lib/validators';

    export default {

        props: ['cities'],
        data () {
            return {
                name: '',
                phone: '',
                city: '',
                status: 1,
            }
        },

        validations: {
            name: {
                required,
                minLength: minLength(2)
            },
            phone: {
                required,
                minLength: minLength(10)
            }
        },

        methods: {
            setName(value) {
                this.name = value;
                this.$v.name.$touch()
            },
            setPhone(value) {
                this.phone = value;
                this.$v.phone.$touch()
            },
            submitForm(){
                axios.post('/dashboard/users/', {
                    name: this.name,
                    phone: this.phone,
                    city_id: this.city.id,
                    status: this.status
                }).then(res => {
                    console.log(res.data);
                });
            }
        },
        created () {

        }
    }
</script>
<style lang="scss">

</style>