<template>
  <div> 
      <h3>User Maintenance</h3>

      <p>Message: {{ msg }}</p>
  </div>
</template>

<script>
export default {
	data () {
	return {
		msg: "A default UserAdmin area placeholder!"
	 
	}
	},
	props: ["Axios"], //, "AdderService"],
	methods: {

	},

	/*
	tryAdderService: function() {
		this.adderResponse = this.AdderService.add(5, 4);
	}
	*/

}
</script>