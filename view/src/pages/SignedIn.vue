<template>
  <container fluid class="px-0">
    <modal cascade class="text-left" v-if="showModal">
      <modal-body class="grey-text">
          <sign-user-card title='Signing you in' text="Just a second..."></sign-user-card>
      </modal-body>
    </modal>
	</container>
</template>

<script>
export default {
  name: 'SignedIn',
  mounted: function(){
      let component = this;
      setTimeout(() => {
        component.showModal = false;
        //window.vuehandler.router.push({ path: '/' })
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
  .modal-content{
    background:green;
  }
</style>
