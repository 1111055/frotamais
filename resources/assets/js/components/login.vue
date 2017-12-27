<template>
      <form v-on:submit.prevent="sendFormLogin" class="form-vertical" >
     <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
              <div class="controls">
               <div class="main_input_box">
                 <span class="add-on bg_lg"><i class="icon-user"></i></span>
                    <input  type="email" id="add-email" v-model="email" v-validate="'required|email'" class="form-control" name="email" placeholder="Username">
                 </div>
              </div>
        </div>
        <div class="form-group">
             <div class="controls">
               <div class="main_input_box">
                <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                <input id="add-password" type="password"  v-model="password" v-validate="'required|password'" class="form-control" name="password" placeholder="Password">
                 <button type="submit" class="btn btn-primary" style="width: 38%">
                    Login
                  </button>
                    <a href="" class="btn btn-info" id="to-recover" style="width: 45%;">Recuperar Password </a>
              </div>
             </div>
         </div>
      </form>
</template>

<script>

import { Validator } from 'vee-validate';
const dictionary = {
  en: {
    attributes: {
      password: 'PassWord',
      email: 'Email'

    }
  },
  pt: {
    attributes: {
      password: 'PassWord',
      email: 'Email'
    }
  }
};

Validator.localize(dictionary);

Validator.localize('pt'); // now this validator will generate messages in arabic.
 export default {
 
 data(){
    return {
      password: '',
      email: ''
      }
    },

    methods: {
        sendFormLogin() {



          this.$validator.validateAll().then((result)=> {

                
                if(result){
                        alert();
                    axios.post('login', {
                        password: this.password,
                        email: this.email                       
                    }).then((reponse) => {
                      $('.companyregister').hide();
                      $('.sucessmsg').show();
                    });
               }

          })

        }
    }

 }
</script>