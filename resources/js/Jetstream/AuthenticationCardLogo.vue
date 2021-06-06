<template>
    <inertia-link :href="'/'">
        <img :src="logo" alt="ginecologia" style="width: 120px!important;height: 120px!important;"/>
    </inertia-link>
</template>
<script>
export default {
    data() {
        return {
            logo: '/assert/imagenes/ginecologia.png',
        }
    },
}
</script>
