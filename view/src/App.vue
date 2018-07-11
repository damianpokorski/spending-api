<template>
  <div id="app" class="flyout">
    <navbar dark position="top" class="indigo" name="MDB Vue" href="#/" scrolling brandStyle="font-weight: bolder;">
      <navbar-collapse>
        <navbar-nav>
          <navbar-item href="#/" waves-fixed active>Home</navbar-item>
          <navbar-item href="#/add" waves-fixed>Add</navbar-item>
          <navbar-item href="#/history" waves-fixed>History</navbar-item>
        </navbar-nav>
        <navbar-nav right>
          <navbar-item href="#/advanced" waves-fixed>Settings</navbar-item>
          <navbar-item href="#/sign-out" v-if="signedIn" waves-fixed >Sign Out</navbar-item>
          <navbar-item href="#/sign-in" v-if="!signedIn"  waves-fixed >Sign In</navbar-item>
        </navbar-nav>
      </navbar-collapse>
    </navbar>
    <main :style="{marginTop: '60px'}">
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue';
import NavbarItem from '@/components/NavbarItem.vue';
import NavbarNav from '@/components/NavbarNav.vue';
import NavbarCollapse from '@/components/NavbarCollapse.vue';

export default {
  name: 'app',
  components: {
    Navbar,
    NavbarItem,
    NavbarNav,
    NavbarCollapse
  },
  mounted: function(){
    var component = this;
    window.firebasehandler.onSignedInUpdate((user) => {
      component.signedIn = !(user == null);
    });
  },
  methods: {
    signOut: () => {
        console.log('Signing out!');
        //window.firebasehandler.signOut();
    }
  },
  data:() =>{
    return {
      signedIn: false
    }
  }
};

</script>

<style>
.flyout {
	display:flex;
	flex-direction: column;
	min-height:100vh;
	justify-content: space-between;
}

</style>
