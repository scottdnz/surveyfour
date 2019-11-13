<template>
	<div>
		<div id="app-user-insert">
			<h2>Enter new Survey details</h2>

			<form v-on:submit=""> 
				<div class="form-group">
					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptName">Name</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptName" ref="iptName">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptCreated">Created</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptCreated" ref="iptCreated">
		  				</div>
					</div>



					<br>
					<div class="row padElementRow">
						<div class="col-2">
							<button class="btn btn-primary" v-on:click="newSurveyFormSubmit">Submit</button>
							<!-- v-on:click.prevent="submit" -->

						</div>
					</div>
				</div>
			</form>
						
			<br><br>
			<p>{{ msgSubmitStatus }}</p>

		</div>
	</div>
</template>

<script>
export default {
  data () {
    return {
		msgSubmitStatus: "",
		iptName: "",
		iptCreated: this.Moment().format('DD/MM/YYYY hh:mma')
    }
  },
  props: ["Axios", "Moment"], //, "AdderService"],
  methods: {
	newSurveyFormSubmit: function() {
		let reqData = {
			title: this.iptName,
			
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

