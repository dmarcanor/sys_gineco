<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-address-card"></i> Datos Generales
            </div>
            <div class="card-body">
                <form @submit.prevent="save">
                    <div class="form-group row">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" v-model="form.name"
                                   required=""/>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Correo</label>
                            <input type="text" name="email" class="form-control" id="email" v-model="form.email"
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
import FormBtnSubmit from "../../../Components/FormBtnSubmit";

export default {
    name: "GeneralsDetails",

    props: ['user'],

    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                name: this.user.name,
                email: this.user.email,
            }),
        }
    },

    methods: {
        save() {
            this.form.post(route('user-profile-information.update'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.success("Solicitud realizada con exito", {duration: 5000, position: "top-right"});
                },
                onError: (e) => {
                    this.$toast.error(e, {duration: 5000, position: "top-right"});
                }
            });
        }
    },

    components: {
        FormBtnSubmit,
    }
}
</script>

<style scoped>

</style>
