<template>
    <v-app>
        <v-row
            align="center"
            justify="space-around"
        >
            <v-btn @click="redirect('/product')">
                จัดการรายการสินค้า
            </v-btn>

        </v-row>
    </v-app>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        mounted() {
            this.initialize()
            console.log('Initialized')
        },
        methods:{
            redirect(url){
                window.location.href = url
            },
            initialize(){

            },
        }
    }
</script>
