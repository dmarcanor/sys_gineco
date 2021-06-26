<template>
    <ol class="breadcrumb">
        <li class="breadcrumb-item" v-for="value in breadcrumb">
            <template v-if="value.link">
                <inertia-link :href="route(value.route)">{{ value.name }}</inertia-link>
            </template>
            <template v-else>{{ value.name }}</template>
        </li>
    </ol>
</template>

<script>
export default {
    name: "Breadcrumb",

    props: ['breadcrumb'],
}
</script>

<style scoped>

</style>
