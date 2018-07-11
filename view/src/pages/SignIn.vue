<template>
	<container fluid class="px-0">
    <modal cascade class="text-left">
      <modal-header class="primary-color white-text">
        <h4 class="title"><fa class="fa fa-pencil" /> Sign In</h4>
      </modal-header>
      <modal-body class="grey-text">
        <btn color="red mb-1" block @click.native="signInWithGoogle()">
          <fa icon="google" class="mr-1"/> Google
        </btn>
        <btn color="indigo mb-1" block>
          <fa icon="facebook" class="mr-1"/> Facebook
        </btn>
        <btn color="teal mb-1" block>
          <fa icon="twitter" class="mr-1"/> Twitter
        </btn>
        <btn color="black mb-1" block>
          <fa icon="github" class="mr-1"/> Github
        </btn>
      </modal-body>
      <modal-footer>
        <btn color="secondary" @click.native="close()">Close</btn>
      </modal-footer>
    </modal>
	</container>
</template>

<script>
import { Container, Column, Row} from 'mdbvue';
import { Tbl, TblHead, TblBody } from 'mdbvue';
import { MdInput, MdTextarea } from 'mdbvue';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'mdbvue';
import { Btn, Fa } from 'mdbvue';
export default {
  name: 'SignIn',
  components: {
    Container, Column, Row,
    Tbl, TblHead, TblBody,
    MdInput, MdTextarea,
    Modal, ModalHeader, ModalBody, ModalFooter, 
    Btn, Fa
  },
  data() {
    return {
      showModal: false
    };
  },
  mounted: function(){
    window.firebasehandler.onSignedInUpdate((user) => {
      if(!(user == null)){
        window.vuehandler.router.push({ path: '/' })
      }
    });
  },
  methods:{
    close:() => {
      window.vuehandler.router.push({ path: '/' })
    },
    signInWithGoogle: () =>{
      window.firebasehandler.signInWithGoogle();
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
