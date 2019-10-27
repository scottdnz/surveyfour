<template>
	<div>
		<h3>Survey create - placeholder</h3>
	</div>
</template>

<script>
export default {
  data () {
    return {
		msgSubmitStatus: ''
    }
  },
  props: ["Axios"], //, "AdderService"],
  methods: {
	newUserFormSubmit: function() {
		let reqData = {
			title: this.iptTitle,
			
		};

		let url = "survey/insert";	
		var self = this;
		self.Axios.post(url, reqData)
	        .then(function (response) {
	        	// alert(response.data);
	        	self.msgSubmitStatus = "Status: " + response.data.status;
	        })
	        .catch(function (error) {
	        	self.msgSubmitStatus = "Status error: " + error;
	        });
        
	}
  }
}
</script>

