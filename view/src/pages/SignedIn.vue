<template>
  <container fluid>
    <modal cascade class="text-left" v-if="modal">
      <modal-body class="grey-text">
          <sign-user-card title='Signing you in' text="Just a second..."></sign-user-card>
      </modal-body>
    </modal>
	</container>
</template>

<script>
let firebase = () => window.helpers.firebasehandler;

export default {
  name: 'SignedIn',
  mounted: function(){
      let component = this;
      this
        .showModal()
        .then(firebase().onSignedIn)
        .then(this.hideModal)
        .then(() => window.vue.router.push({ path: '/' }));

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
