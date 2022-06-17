<template>
    <nav-bar></nav-bar>
            <div class="p-5">
                <form
                    id="form"
                    @submit="checkForm"
                    @submit.prevent="register"
                    method="post"
                    class="form-group"
                  >
                    <p>
                      <label for="name">Nome</label>
                      <input
                        id="name"
                        v-model="name"
                        type="text"
                        name="name"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Codigo de Barras</label>
                      <input
                        id="bar_code"
                        v-model="bar_code"
                        type="text"
                        name="bar_code"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Valor Unitario</label>
                      <input
                        id="unitary_value"
                        v-model="unitary_value"
                        type="text"
                        name="unitary_value"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                    <p>
                      <label for="name">Data de realização</label>
                      <input
                        id="date"
                        v-model="date"
                        type="text"
                        name="date"
                        class="form-control"
                        disabled=""
                      >
                    </p>
                </form>
            </div>
</template>

<script>
const axios = require('axios');
import NavBar from "../navbar/NavBar.vue"

export default {
    components: {
        NavBar
    },
    data() {
        return {

            name: "",
            bar_code: "",
            unitary_value: "",
            date: "",

        }
    },
    mounted() {
        

        axios.get("/api/products/"+this.$route.params.id).then((response) => {
            this.name=response.data.product.name
            this.bar_code=response.data.product.bar_code
            this.unitary_value=response.data.product.unitary_value
            this.date=response.data.product.formatted_date
        });
    },

}
</script>