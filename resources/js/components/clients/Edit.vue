<template>
<nav-bar></nav-bar>
            <div class="m-3">
                <h2>Cadastro de Cliente</h2>
            </div>
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
                      <label for="name">Email</label>
                      <input
                        id="email"
                        v-model="email"
                        type="text"
                        name="email"
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
            email: "",
        }
    },
    mounted() {
        axios.get("/api/clients/"+this.$route.params.id).then((response) => {
            this.name=response.data.client.name
            this.email=response.data.client.email
        });
    },
 
    methods: {

        save(){
            let formData = new FormData();

            formData.append("name", this.name);
            formData.append("email", this.email);

            axios.post("/api/client-edit/"+this.$route.params.id, formData)
            .then((response) => {
                if(response.status===200)
                {
                    this.$router.push('/clients');
                }
            });
        }
    
    }
}
</script>