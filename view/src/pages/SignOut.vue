<template> 
<container fluid>
    <modal cascade class="text-left" v-if="modal">
      <modal-body class="grey-text">
          <sign-user-card title='Signing out' text="You'll be signed out shortly"></sign-user-card>
      </modal-body>
    </modal>
	</container>
</template>

<script>
export default {
  name: 'SignOut',
  mounted: function(){
      this
        .showModal()
        .then(window.firebasehandler.signOut)
        .then(this.hideModal)
        .then(() => window.vuehandler.router.push({ path: '/' }));
  },
  data: function(){
    return {
      modal: false
    };
  },
  methods: {
    showModal(){
      this.modal = true;
      return Promise.prototype.delay(1000);
    },
    hideModal(){
      this.modal = false;
      return Promise.prototype.delay(1000);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
