<template>
    <div class="container-fluid">
        <div class="form-group row">
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-10"></div>
            <div class="form-group col-md-2 col-lg-2 col-xl-1">
                <inertia-link :href="linkRoute" class="btn btn-secondary btn-block rounded">Cancelar</inertia-link>
            </div>
            <div class="form-group col-md-2 col-lg-2 col-xl-1">
                <button type="submit" :disabled="disabled" class="btn btn-primary btn-block rounded">Guardar</button>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    name: "FormBtnSubmit",

    props: {
        linkRoute: {
            required: true,
        },
        disabled: {
            required: false,
            default: false
        }
    }
}
</script>

<style scoped>

</style>
