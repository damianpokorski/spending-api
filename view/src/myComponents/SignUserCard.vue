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
export default {
  name: 'SignUserCard',
  props:['title', 'text'],
  mounted: function(){
      // Pull logged in user details
      this.name = window.firebasehandler.user.displayName;
      this.photoURL = window.firebasehandler.user.photoURL;
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
