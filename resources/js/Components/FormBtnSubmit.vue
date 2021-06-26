<template>
    <div class="md:grid md:grid-cols-6 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-6">
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-md">
                <jet-button-href :href="linkRoute">Cancelar</jet-button-href>
                <jet-button :type="'submit'" :disabled="disabled">Guardar</jet-button>
            </div>
        </div>
    </div>
</template>

<script>
import JetButtonHref from '@/Jetstream/ButtonHref'
import JetButton from '@/Jetstream/Button'

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
    },
    components: {
        JetButtonHref,
        JetButton
    }
}
</script>

<style scoped>

</style>
