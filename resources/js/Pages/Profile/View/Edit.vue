<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <generals-details :user="user"></generals-details>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <password-update :user="user"></password-update>
                </div>
            </div>
        </main>
    </app-body>
</template>

<script>
import AppBody from "../../../Components/AppBody";
import GeneralsDetails from "../Form/GeneralsDetails";
import PasswordUpdate from "../Form/PasswordUpdate";

export default {
    name: "Edit",

    props: ['user', 'breadcrumb'],

    components:{
        AppBody,
        GeneralsDetails,
        PasswordUpdate,
    },
}
</script>

<style scoped>

</style>
