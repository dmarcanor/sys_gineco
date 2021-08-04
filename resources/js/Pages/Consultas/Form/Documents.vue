<template>
    <div class="container-fluid">
        <div class="card">
            <pre>
                {{ documentos }}
            </pre>
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Documentos
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th width="48%" class="text-center">Nombre del documento</th>
                        <th width="48%" class="text-center">Documento</th>
                        <th width="4%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="documento in documentos"
                            :is="Document"
                            :document="documento">
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import JetLabel from '@/Jetstream/Label'
import JetInput from '@/Jetstream/Input'
import Document from "../../Shared/Components/Document"
import {nextTick} from 'vue'

export default {
    name: "GeneralsDetails",

    props: ['form'],

    data() {
        return {
            documentos: []
        }
    },

    mounted: async function () {
        nextTick(() => {
            this.documentos = this.form.documentos;
        })
    },

    watch: {
        documentos(val) {
            this.form['documentos'] = val;
        }
    },

    components: {
        Document,
        JetLabel,
        JetInput,
    }
}
</script>

<style scoped>

</style>
