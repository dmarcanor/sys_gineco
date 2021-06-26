<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group mb-0">
                        <div class="card p-4">
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <h1>Acceder</h1>
                                    <p class="text-muted">Control de acceso al sistema</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="email" required="" v-model="form.email">
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" name="clave" id="clave" class="form-control"
                                               placeholder="Password" required="" v-model="form.password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary px-4">Acceder</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <inertia-link v-if="canResetPassword"
                                                          :href="route('password.request')" class="btn btn-link px-0">
                                                Olvidaste tu password?
                                            </inertia-link>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    components: {},

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onSuccess: (response) => {
                    },
                    onError: (error) => {
                    },
                    onFinish: () => this.form.reset('password'),
                })
        }
    }
}
</script>
