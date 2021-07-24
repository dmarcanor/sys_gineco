<template>
    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item" :class="paginacion.current_page == 1 ? 'disabled' : ''">
                <button type="button" class="page-link" :disabled="paginacion.current_page == 1"
                   @click.prevent="buscar(paginacion.current_page - 1)">Ant</button>
            </li>
            <li class="page-item" v-for="page in pagesNumber" :key="page"
                :class="page === isActived ? 'active' : ''">
                <a class="page-link" href="#" @click.prevent="buscar(page)" v-text="page"></a>
            </li>
            <li class="page-item" :class="paginacion.current_page == paginacion.last_page == 1 ? 'disabled' : ''">
                <button  type="button" class="page-link" :disabled="paginacion.current_page == paginacion.last_page"
                   @click.prevent="buscar(paginacion.current_page + 1)">Sig</button>
            </li>
            <li class="page-item">
                <p class="page-link">Total: {{paginacion.total}}</p>
            </li>
            <li class="page-item">
                <p class="page-link">Paginas: {{paginacion.last_page}}</p>
            </li>
        </ul>
    </nav>
</template>

<script>
import Button from "../Jetstream/Button";
export default {
    name: "paginacion",
    components: {Button},
    props: {
        paginacion: {
            required: true,
        },
        params: {
            required: true,
        }
    },

    data() {
        return {
            offset: 1,
            // paginacion: {
            //     total: 0,
            //     current_page: 0,
            //     per_page: 0,
            //     last_page: 0,
            //     from: 0,
            //     to: 0,
            // }
        }
    },


    computed: {
        pagesNumber() {
            if (!this.paginacion.to) {
                return [];
            }

            let from = this.paginacion.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }

            let to = from + (this.offset * 2);
            if (to >= this.paginacion.last_page) {
                to = this.paginacion.last_page;
            }

            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActived() {
            return this.paginacion.current_page;
        },
    },
    methods: {
        buscar(page) {
            this.params.page = page
            this.$emit('buscar');
        }
    }
}
</script>

<style>

</style>
