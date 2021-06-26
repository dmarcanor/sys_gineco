<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Dashboard
                    </div>
                    <div class="card-body">
                        <pre>{{user}}</pre>
                    </div>
                </div>
            </div>
        </main>
    </app-body>
</template>

<script>
    import AppBody from "@/Components/AppBody";

    export default {
        props: ['user', 'breadcrumb'],

        components: {
            AppBody,
        },
    }
</script>
