<template>
    <!--<b-container class="bv-example-row">
        <b-row class="vw-100 row-login">
            <b-col sm="5" class="d-flex justify-content-center align-items-center left-login">
            <div class="col-8">
                <h2 class="text-center mb-5 title-login">Faça o login</h2>
                <b-form>
                <b-form-group
                    label="E-mail"
                    label-for="email"
                    >
                    <b-form-input
                        id="email"
                        type="email"
                        placeholder="joaosilva@email.com"
                        autocomplete="off"
                        v-model="form.email"
                    ></b-form-input>
                    </b-form-group>
        
                    <b-form-group
                    label-for="password"
                    >
                    <label class="d-flex justify-content-between">
                        Senha
                        <small><a href="#">Esqueceu sua senha?</a></small>
                    </label>
        
                    <b-form-input
                        id="password"
                        type="password"
                        placeholder="Digite sua senha"
                        v-model="form.password"
                    ></b-form-input>
                    </b-form-group>
        
                    <b-button
                    type="button"
                    variant="primary"
                    block
                    @click="login">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                    </b-button>
        
                    <hr>
        
                    <b-button
                    type="button"
                    variant="outline-secondary"
                    block
                    @click="register">
                    <i class="fas fa-user-plus"></i> Não tenho conta
                    </b-button>
                </b-form>
            </div>
            </b-col>
            <b-col sm="7"></b-col>
        </b-row>
    </b-container>-->
    <div>
      <div id="app">

   <div class="login-page">
      <transition name="fade">
         <div v-if="!registerActive" class="wallpaper-login"></div>
      </transition>
      <div class="wallpaper-register"></div>

      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
               <div v-if="!registerActive" class="card login" v-bind:class="{ error: emptyFields }">
                  <h1>Register</h1>
                  <!--<form class="form-group">
                     <input v-model="emailLogin" type="email" class="form-control" placeholder="Email" required>
                     <input v-model="passwordLogin" type="password" class="form-control" placeholder="Password" required>
                     <input type="submit" class="btn btn-primary" @click="doLogin">
                     <p>Don't have an account? <a href="#" @click="registerActive = !registerActive, emptyFields = false">Sign up here</a>
                     </p>
                     <p><a href="#">Forgot your password?</a></p>
                  </form>-->

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
                    <p>
                      <label for="name">Senha</label>
                      <input
                        id="password"
                        v-model="password"
                        type="password"
                        name="password"
                        class="form-control"
                      >
                    </p>
                    <p>
                      <label for="name">Confirmação de Senha</label>
                      <input
                        id="confirm_password"
                        v-model="confirm_password"
                        type="password"
                        name="confirm_password"
                        class="form-control"
                      >
                    </p>
                    <input type="submit" class="btn btn-primary" @click="doRegister">
                    <p>Don't have an account? <a href="#" @click="registerActive = !registerActive, emptyFields = false">Sign up here</a>
                    </p>
                    <p><a href="#">Forgot your password?</a></p>
                  </form>
               </div>

               <!--<div v-else class="card register" v-bind:class="{ error: emptyFields }">
                  <h1>Sign Up</h1>
                  <form class="form-group">
                     <input v-model="emailReg" type="email" class="form-control" placeholder="Email" required>
                     <input v-model="passwordReg" type="password" class="form-control" placeholder="Password" required>
                     <input v-model="confirmReg" type="password" class="form-control" placeholder="Confirm Password" required>
                     <input type="submit" class="btn btn-primary" @click="doRegister">
                     <p>Already have an account? <a href="#" @click="registerActive = !registerActive, emptyFields = false">Sign in here</a>
                     </p>
                  </form>
               </div>-->
            </div>
         </div>

      </div>
   </div>

</div>
    </div>
</template>
 
<script>
 
const axios = require('axios');

export default {
    components: {
        //BButton,
        
    },
    data() {
        return {
        form: {
                name: "",
                email: "",
                password: "",
                confirm_password: ""
            }
        }
    },
 
  methods: {
    checkForm: function (e) {
      if (this.name && this.email && this.password && this.confirm_password) {
        return true;
      }

      this.errors = [];

      if (!this.name) {
        this.errors.push('O nome é obrigatório.');
      }
      if (!this.email) {
        this.errors.push('Insira um email.');
      }

      if (!this.password) {
        this.errors.push('A senha é obrigatória.');
      }

      if (!this.confirm_password) {
        this.errors.push('A confirmação de senha é obrigatória.');
      }

      if (this.confirm_password != this.confirm_password) {
        this.errors.push('Confirme a mesma senha.');
      }
      
      this.register();

      e.preventDefault();
    },

    login() {},
 
    register(){
      let formData = new FormData();

      formData.append("name", this.name);
      formData.append("email", this.email);
      formData.append("password", this.password);
      formData.append("password_confirmation", this.confirm_password);

      axios.post("/api/register", formData)
      .then((response) => {
        if(response.status===201)
        {
          this.$router.push('/login');
          
        }
      });
    },

    
 
  }
}
</script>
 
<style>
 
*, /*resetar o estilo da página*/
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
}
 
.row-login {
  margin-left: 0;
}
 
.left-login {
  background-color: #F2F2F2;
}
 
.title-login {
  font-weight: bold;
}
 
</style>

<style lang="scss">
@import './scss/login.scss';
</style>