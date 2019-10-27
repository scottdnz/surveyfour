<template>
	<div> 
		<div id="app-user-insert">
			<h2>Enter new User details</h2>

			<form v-on:submit=""> 
				<div class="form-group">
					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptTitle">Title (e.g. Mr)</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptTitle" ref="iptTitle">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptFirstName">First name</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptFirstName" ref="iptFirstName">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptMiddleNames">Middle names</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptMiddleNames">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptLastName">Last name</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptLastName">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptEmail">Email</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="email" v-model="iptEmail">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptPhoneMobile">Phone mobile</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptPhoneMobile">
		  				</div>
					</div>

					<div class="row padElementRow">
						<div class="col-2">
				 			<label for="iptPhoneLandline">Phone Landline</label>
			 			</div>
			 			<div class="col-3">
			  				<input type="text" v-model="iptPhoneLandline">
		  				</div>
					</div>

					<br>
					<div class="row padElementRow">
						<div class="col-2">
							<button class="btn btn-primary" v-on:click="newUserFormSubmit">Submit</button>
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
		msg: "Hello world 4!",
		iptTitle: '',
		iptFirstName: '',
		iptMiddleNames: '',
		iptLastName: '',
		iptEmail: '',
		iptPhoneMobile: '',
		iptPhoneLandline: '',
		msgSubmitStatus: ''
     
    }
  },
  props: ["Axios"], //, "$http"], //, "AdderService"],
  methods: {
	newUserFormSubmit: function() {
		let reqData = {
			title: this.iptTitle,
			first_name: this.iptFirstName,
			middle_names: this.iptMiddleNames,
			last_name: this.iptLastName,
			email: this.iptEmail,
			phone_mobile: this.iptPhoneMobile,
			phone_landline: this.iptPhoneLandline
		};

		let url = "user/insert";	
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