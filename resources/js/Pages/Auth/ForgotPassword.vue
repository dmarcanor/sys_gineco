<template>

    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group mb-0">
                        <div class="card p-4">
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <h3>¿Olvidaste tu contraseña?</h3>
                                    <p class="text-muted">No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="email" required="" v-model="form.email">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing" class="btn btn-primary px-4">
                                                Email Password Reset Link
                                            </button>
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
        components: {
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'), {
                    onSuccess: (response) => {
                    },
                    onError: (error) => {
                    },
                })
            }
        }
    }
</script>
