<template>
  <div id="app" class="flyout">
    <navbar dark position="top" class="indigo" name="TinySpendings" href="#/" scrolling brandStyle="font-weight: bolder;">
      <navbar-collapse v-if="signedIn">
        <!-- User is signed in -->
        <navbar-nav>
          <navbar-item href="#/expense-add" waves-fixed><fa class="fa fa-plus" />Add Expense</navbar-item>
        </navbar-nav>
        <navbar-nav right>
          <navbar-item href="#/advanced" waves-fixed>Settings</navbar-item>
          <navbar-item href="#/sign-out" waves-fixed >Sign Out</navbar-item>
        </navbar-nav>
      </navbar-collapse>
      <navbar-collapse v-if="!signedIn">
        <!-- User is not signed in -->
        <navbar-nav>
          <navbar-item href="#/" waves-fixed active>Home</navbar-item>
        </navbar-nav>
        <navbar-nav right>
          <navbar-item href="#/sign-in" waves-fixed >Sign In</navbar-item>
        </navbar-nav>
      </navbar-collapse>
    </navbar>
    <main :style="{marginTop: '60px'}" class="gray">
      <router-view></router-view>
    </main>
  </div>
</template>

<script>

let firebase = () => window.helpers.firebasehandler;

export default {
  name: 'app',
  mounted: function(){
    firebase().onSignedInChanged((user) => {
      firebase().onSignedIn().then(() => this.signedIn = true);
      firebase().onSignedOut().then(() => this.signedIn = false);
    });
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
input::placeholder, textarea::placeholder{
  color:lightgray !important;
}
</style>
