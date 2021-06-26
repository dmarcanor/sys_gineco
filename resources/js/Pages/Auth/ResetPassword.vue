<template>

    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group mb-0">
                        <div class="card p-4">
                            <div class="card-body">
                                <form @submit.prevent="submit">

                                    <h3>Inserte su nueva contraseña</h3>

                                    <hr>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="email" required="" v-model="form.email">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control"
                                               placeholder="password" required="" v-model="form.password">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                               placeholder="New password" required="" v-model="form.password_confirmation">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3 justify-content-center">
                                        <button type="submit" :class="{ 'opacity-25': form.processing }"
                                                :disabled="form.processing" class="btn btn-primary px-4">
                                            Reset Password
                                        </button>
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
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.update'), {
                    onSuccess: (response) => {
                    },
                    onError: (error) => {
                    },
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
