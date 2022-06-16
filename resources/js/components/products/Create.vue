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
                      >
                    </p>
                    <input type="submit" class="btn btn-primary" @click="save">
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

        }
    },
    mounted() {
        
    },
 
    methods: {

        save(){
            let formData = new FormData();

            formData.append("name", this.name);
            formData.append("bar_code", this.bar_code);
            formData.append("unitary_value", this.unitary_value);


            axios.post("/api/products", formData)
            .then((response) => {
                if(response.status===200)
                {
                    this.$router.push('/products');
                }
            });
        }
    
    }
}
</script>