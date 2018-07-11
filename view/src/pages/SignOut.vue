<template>
	<container fluid>
    <row class="pt-5 d-flex justify-content-center">
      <column sm="12" md="6" lg="3" className="">
        <card testimonial>
          <card-up color="indigo" class="lighten-1"></card-up>
          <card-img color="white" v-bind:src="photoURL"></card-img>
          <card-body>
            <card-title>{{name}}- Signing out</card-title>
            <hr/>
            <p>
              We'll redirect you shortly...
            </p>
          </card-body>
        </card>
      </column>
    </row>
	</container>
</template>

<script>
import {  Container, Row, Column, Card, CardImg, CardHeader, CardBody, CardTitle, CardText, CardFooter, CardUp, CardAvatar, CardGroup, Btn, ViewWrapper, MdMask, Fa} from 'mdbvue';
export default {
  name: 'SignOut',
  created: function(){
    var component = this;
    window.firebasehandler.onSignedInUpdate(function(user){
      component.name = user.displayName;
      component.photoURL = user.photoURL;
    });
    window.firebasehandler.signOut();
    setTimeout(() => {
      window.vuehandler.router.push({ path: '/' })
    }, 3000);
  },
  components: {
     Container, Row, Column, Card, CardImg, CardHeader, CardBody, CardTitle, CardText, CardFooter, CardUp, CardAvatar, CardGroup, Btn, ViewWrapper, MdMask, Fa
  },
  updated:function(){
    console.log('supposedly updated..?');
  },
  data: function () {
    return {
      count: 0,
      name: null,
      photoURL: null,
      test: 'a'
    }
  },
  methods: {
    updateData:function(name, photoURL, test){
      console.log('Updating data');
      this.name = name;
      this.data = photoURL;
      this.test = test;
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
