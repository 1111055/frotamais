<template>
                <div class="controls">
                 <div class="main_input_box">
                      <form v-on:submit.prevent="sendForm"  class="form-vertical" >
                         <div class="control-group normal_text"> <h3><img src="img/register.jpeg" style="max-heigth: 250px;max-width: 250px;" alt="Logo" /></h3></div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="add-name_user" v-model="name_user" v-validate="'required'" name="name_user" placeholder="Nome" >
                            <div class="help-block alert alert-danger errorcompany" v-show="errors.has('name_user')">{{ errors.first('name_user')}}</div>
                          </div>
                           <div class="form-group">
                            <input type="text" class="form-control" id="add-email_user" v-model="email_user" v-validate="'required|email'" name="email_user" placeholder="Email">
                            <div class="help-block alert alert-danger errorcompany" v-show="errors.has('email_user')">{{ errors.first('email_user')}}</div>
                          </div>
                          <div class="form-group"> 
                            <input type="text" class="form-control" id="add-name_empresa" v-validate="'required'" v-model="name_empresa" name="name_empresa" placeholder="Empresa">
                            <div class="help-block alert alert-danger errorcompany" v-show="errors.has('name_empresa')">{{ errors.first('name_empresa')}}</div>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"id="add-nif" v-model="nif" v-validate="'required|min:9|max:9'" name="nif" placeholder="Nif">
                            <div class="help-block alert alert-danger errorcompany" v-show="errors.has('nif')">{{ errors.first('nif')}}</div>
                          </div>
                          <div class="form-group">
                          <input type="submit" class="btn btn-success btn-block"  value="Enviar pedido de registo">
                          </div>
                      </form>
                  </div>
                </div>
</template>

<script>

import { Validator } from 'vee-validate';
const dictionary = {
  en: {
    attributes: {
      name_user: 'Name',
      email_user: 'Email',
      name_empresa: 'Company Name',
      nif: 'NIF'
    }
  },
  pt: {
    attributes: {
      name_user: 'Nome',
      email_user: 'Email',
      name_empresa: 'Nome Empresa',
      nif: 'NIF'
    }
  }
};

Validator.localize(dictionary);

Validator.localize('pt'); // now this validator will generate messages in arabic.
 export default {
 
 data(){
    return {
        name_user: '', // initialise this to an empty string
        email_user: '', // same thing
        name_empresa: '',
        nif:'',
      }
    },

    methods: {
        sendForm() {

          this.$validator.validateAll().then((result)=> {


                if(result){

                    axios.post('users/savecompany', {
                        name_user: this.name_user,
                        email_user: this.email_user,
                        name_empresa: this.name_empresa,
                        nif: this.nif
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