<template>
	<container fluid class="white">
    <row>
      <column col="" xs="4" sm="4">
        <img v-bind:src="photoURL" class="img-fluid rounded-circle"/>
      </column>
      <column>
        <h3 class="black-text">{{name}}</h3>
        <h3 class="black-text">{{title}}</h3>
        <p>
            {{text}}
        </p>
      </column>
    </row>
	</container>
</template>

<script>
let firebase = () => window.helpers.firebasehandler;

export default {
  name: 'SignUserCard',
  props:['title', 'text'],
  mounted: function(){
      // Pull logged in user details
      this.name = firebase().user.displayName;
      this.photoURL = firebase().user.photoURL;
  },
  data: function () {
    return {
      name: null,
      photoURL: null,
    }
  },
};
</script>

<style scoped>

</style>
