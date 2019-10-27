<template>
	<div>
		<h3>Survey list - placeholder</h3>
	</div>
</template>

<script>
export default {
	data () {
		return {
			surveys: [],
			msgSubmitStatus: ""
		 
		}
	},
	props: ["Axios"], //, "AdderService"],
	methods: {
		getSurveysList: function() {
			let url = "survey/list";

			let self = this;
			self.Axios.get(url)
		        .then(function (response) {
		        	// alert(response.data);
		        	self.msgSubmitStatus = "Status: " + response.data.status;
		        	self.users = response.data.surveys;
		        })
		        .catch(function (error) {
		        	self.msgSubmitStatus = "Status error: " + error;
		        });

		}
	},

   	mounted() {
    	// this.getSurveysList();
  	},

}
</script>