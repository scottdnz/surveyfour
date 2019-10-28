<template>
	<div>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>First name</th>
				<th>Middle names</th>
				<th>Last name</th>
				<th>Email</th>
				<th>Phone Mobile</th>
				<th>Phone Landline</th>
			</tr>

			<tr v-for="user in users" v-bind:key="user.id">
				<td>{{ user.id }}</td>
				<td>{{ user.title }}</td>
				<td>{{ user.first_name }}</td>
				<td>{{ user.middle_names }}</td>
				<td>{{ user.last_name }}</td>
				<td>{{ user.email }}</td>
				<td>{{ user.phone_mobile }}</td>
				<td>{{ user.phone_landline }}</td>
			</tr>
		</table>

		<br><br>
		<p>{{ msgSubmitStatus }}</p>
	</div>
</template>

<script>
export default {
	data () {
		return {
			users: [],
			msgSubmitStatus: ""
		 
		}
	},
	props: ["Axios"], //, "AdderService"],
	methods: {
		getUsersList: function() {
			let url = "/survey4/user/list";

			let self = this;
			self.Axios.get(url)
		        .then(function (response) {
		        	// alert(response.data);
		        	self.msgSubmitStatus = "Status: " + response.data.status;
		        	self.users = response.data.users;
		        })
		        .catch(function (error) {
		        	self.msgSubmitStatus = "Status error: " + error;
		        });

		}
	},

   	mounted() {
    	this.getUsersList();
  	},

}
</script>