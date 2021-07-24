<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-key"></i> Actualizar contraseña
            </div>
            <div class="card-body">

                <form @submit.prevent="save">
                    <div class="form-group row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Contraseña actual</label>
                            <input type="password" name="current_password" class="form-control" id="current_password" v-model="form.current_password" ref="current_password"
                                   required=""/>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Nueva contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" v-model="form.password" ref="password"
                                   required=""/>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Confirmal contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" v-model="form.password_confirmation"
                                   required=""/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-9 col-xl-9"></div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <button type="submit" :disabled="form.processing" class="btn btn-primary btn-block rounded">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PasswordUpdate",

    props: ['user'],

    data() {
        return {
            form: this.$inertia.form({
                current_password: '',
                password: '',
                password_confirmation: '',
            }),
        }
    },

    methods: {
        save() {
            this.form.put(route('user-password.update'), {
                errorBag: 'updatePassword',
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.$toast.success("Solicitud realizada con exito", {duration: 5000, position: "top-right"});
                },
                onError: () => {
                    if (this.form.errors.password) {
                        this.form.reset('password', 'password_confirmation')
                        this.$refs.password.focus()

                        if(this.form.errors.password === "validation.confirmed")
                            this.$toast.error("Las contraseña no coincide", {duration: 5000, position: "top-right"});

                        if(this.form.errors.password === "The password must be at least 8 characters.")
                            this.$toast.error("La contraseña debe tener al menos 8 caracteres.", {duration: 5000, position: "top-right"});
                    }

                    if (this.form.errors.current_password) {
                        this.form.reset('current_password')
                        this.$refs.current_password.focus()

                        if(this.form.errors.current_password === "The provided password does not match your current password.")
                            this.$toast.error("La contraseña proporcionada no coincide con su contraseña actual", {duration: 5000, position: "top-right"});
                    }
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
