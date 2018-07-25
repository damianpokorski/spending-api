<template>
	<container fluid class="px-0">
    <modal cascade class="text-left" v-if="showModal" @close="close()">
      <modal-header class="primary-color white-text">
        <h4 class="title"><fa class="fa fa-pencil" /> Add an expense</h4>
      </modal-header>
      <modal-body class="grey-text">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">£ / $</label>
            <input type="text" class="form-control" v-model="form.delta" placeholder="100.00">
          </div>
          <div class="form-group">
            <label for="recurrence">Recurrence</label>
            <select class="form-control" id="recurrence" v-model="form.recurrence">
              <option selected>None</option>
              <option>Weekly</option>
              <option>Monthly</option>
              <option>Quarterly</option>
              <option>Yearly</option>
            </select>
          </div>
          <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" id="details" rows="3" placeholder="Groceries"  v-model="form.details"></textarea>
          </div>
          <div class="form-group">
            <label for="recurrence">Vendor</label>
            <v-select name="vendor" v-model="form.vendor" placeholder='I.E. Tesco' taggable>
            </v-select>
          </div>
          <div class="form-group">
            <label for="labels">Labels</label>
            <v-select name="labels" v-model="form.labels" placeholder='I.E. Groceries' multiple="multiple" :options="labels" taggable>
            </v-select>
          </div>
        </form>
      </modal-body>
      <modal-footer>
        <btn color="primary" @click.native="add()"><fa class="fa fa-dollar mr-3" />Add</btn>
        <btn color="secondary" @click.native="close()"><fa class="fa fa-times mr-3" />Close</btn>
      </modal-footer>
    </modal>
	</container>
</template>

<script>
let firebase = () => window.helpers.firebasehandler;
export default {
  name: 'ExpenseAdd',
  mounted: function(){
    this.showModal = true;
      // Get list if labels available
      window.helpers.api.label.getAll().then(() => {
        console.log('hmm');
      });
  },
  methods: {
    show(){
      this.showModal = true;
    },
    close(){
      this.showModal = false;
      Promise.prototype.delay(500).then(() => window.vue.router.push({ path: '/' }));
    },
    add(){
       window.helpers.api.label.getAll().then(() => {
        console.log('hmm');
      });
      // window.helpers.api.label.getAll().then(existingLabels => {
      //   console.log(['labels', existingLabels]);
      //   // find out which labels dont exist
      //   var missingLabels = this.form.labels.filter(formLabel => existingLabels.filter(existingLabel => existingLabel.name == formLabel));
      // });
      //window.helpers.api.expense.post(this.form);
    }
  },
  data: function(){
    return {
      showModal: false,
      labels: ["1","2","3"],
      form: {
        delta: null,
        recurrence:"None",
        details:null,
        vendor:null,
        labels:[]
      }
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
