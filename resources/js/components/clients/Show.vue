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
                      <label for="name">Email</label>
                      <input
                        id="email"
                        v-model="email"
                        type="text"
                        name="email"
                        class="form-control"
                        disabled=""
                      >
                    </p>

                    <p>
                      <label for="name">Data de Criação</label>
                      <input
                        id="data"
                        v-model="data"
                        type="text"
                        name="email"
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
            email: "",
            data:""

        }
    },
    mounted() {
        

        axios.get("/api/clients/"+this.$route.params.id).then((response) => {
            this.name=response.data.client.name
            this.email=response.data.client.email
            this.data=response.data.client.formatted_date
        });
    },

}
</script>