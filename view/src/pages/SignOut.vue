<template> 
<container fluid>
    <modal cascade class="text-left" v-if="showModal">
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
      let component = this;
      setTimeout(() => {
        component.showModal = false;
        setTimeout(() => {
          window.firebasehandler.signOut();
        });
      }, 1500);
      this.showModal = true;
  },
  data: function(){
    return {
      showModal: false
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
