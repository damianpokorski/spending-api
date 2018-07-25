<template>
	<container fluid class="px-0">
    <modal cascade class="text-left" v-if="showModal" @close="close()">
      <modal-header class="primary-color white-text">
        <h4 class="title"><fa class="fa fa-pencil" /> Sign In</h4>
      </modal-header>
      <modal-body class="grey-text">
        <btn color="red mb-1" block @click.native="signInWithGoogle()">
          <fa icon="google" class="mr-1"/> Google
        </btn>
        <btn color="indigo mb-1" block @click.native="signInWithFacebook()">
          <fa icon="facebook" class="mr-1"/> Facebook
        </btn>
        <btn color="teal mb-1" block @click.native="signInWithTwitter()">
          <fa icon="twitter" class="mr-1"/> Twitter
        </btn>
        <btn color="black mb-1" block @click.native="signInWithGithub()">
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
let firebase = () => window.helpers.firebasehandler;
export default {
  name: 'SignIn',
  mounted: function(){
    firebase().onSignedIn().then((user) => {
        this.signedIn();
    });
    this.showModal = true;
  },
  methods:{
    close(){
      this.showModal = false;
      Promise.prototype.delay(500).then(() => window.vue.router.push({ path: '/' }));
    },
    signedIn: function(){
      window.vue.router.push({ path: '/signed-in' })
    },
    signInWithGoogle: () =>{
     firebase().signInWithGoogle();
    },
    signInWithFacebook: () =>{
      firebase().signInWithFacebook();
    },
    signInWithTwitter: () =>{
      firebase().signInWithTwitter();
    },
    signInWithGithub: () =>{
      firebase().signInWithGithub();
    },
  },
  data: function(){
    return {
      modal_signing:{
        title: 'Signing in',

      },
      modal_pre_sign:{
        title: 'Sign in'
      },
      showModal: false
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
