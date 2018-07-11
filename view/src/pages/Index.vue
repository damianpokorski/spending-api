<template>
	<container fluid class="px-0">
    <btn @click.native="showModal = true" color="info" block>Launch modal contact form</btn>
    <modal v-if="showModal" @close="showModal = false" cascade class="text-left">
      <modal-header class="primary-color white-text">
        <h4 class="title"><fa class="fa fa-pencil" /> Contact form</h4>
      </modal-header>
      <modal-body class="grey-text">
        <md-input size="sm" label="Your name" icon="user" group type="text" validate error="wrong" success="right"/>
        <md-input size="sm" label="Your email" icon="envelope" group type="email" validate error="wrong" success="right"/>
        <select class="form-control form-control-lg">
          <option>Large select</option>
        </select>
      </modal-body>
      <modal-footer>
        <btn color="secondary" @click.native="showModal = false">Close</btn>
        <btn color="primary">Save changes 3</btn>
      </modal-footer>
    </modal>
	</container>
</template>

<script>
import { Container, Column, Row} from 'mdbvue';
import { Tbl, TblHead, TblBody } from 'mdbvue';
import { MdInput, MdTextarea } from 'mdbvue';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'mdbvue';
import { Btn, Fa } from 'mdbvue';
export default {
  name: 'Index',
  components: {
    Container, Column, Row,
    Tbl, TblHead, TblBody,
    MdInput, MdTextarea,
    Modal, ModalHeader, ModalBody, ModalFooter, 
    Btn, Fa
  },
  data() {
    return {
      showModal: false
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
