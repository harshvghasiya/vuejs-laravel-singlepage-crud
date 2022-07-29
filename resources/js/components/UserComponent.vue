<template>
    <div class="container mt-5">
        <div class="alert alert-success" v-if="this.success != null" role="alert">
            {{ this.success }}
        </div>
        <div class="alert alert-danger" v-if="this.error != null" role="alert">
            {{ this.error }}
        </div>
        <form @submit.prevent="submitUser">
            <input type="hidden" value="{{this.data.id}}" />
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input v-model="data.email" type="email" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Email address</label>
            </div>
            <div class="form-outline mb-4">
                <input v-model="data.name" type="text" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">Name</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input v-model="data.password" type="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">{{ this.buttonTxt }}</button>
        </form>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody v-if="details != null">
                <tr v-for="detail in details" :key="detail">
                    <td>{{ detail.name }}</td>
                    <td>{{ detail.email }}</td>
                    <td>
                        <button class="btn btn-primary" @click="edituser(detail.id)">Edit</button>
                        <button class="btn btn-danger" @click="deleteuser(detail.id)">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</template>
<script>
import { UserApi } from "../services/UserApi.js";
export default {
    name: "UserComponent",
    data: function () {
        return {
            details: [],
            isError: null,
            isSuccess: null,
            data: {
                name: "",
                email: "",
                password: "",
                id: null
            },
            id: null,
            isupdate: false,
            error: null,
            success: null,
            deleted:false,
            buttonTxt: 'Submit',
        }
    },
    created: async function () {
        try {
            let response = await UserApi.allUser();
            //    console.log(response.data[0])
            this.details = response.data;
            console.log(this.details)


        } catch (error) {

            this.isError = error.data;
        }
    },
    methods: {
        submitUser: async function () {
            try {
                let response = await UserApi.storeUser(this.data);
                this.error = null;
                this.success = response.data.msg;
                try {
                    let response = await UserApi.allUser();
                    //    console.log(response.data[0])
                    this.details = response.data;
                    console.log(this.details)


                } catch (error) {

                    this.isError = error.data;
                }
            } catch (error) {

                this.success = null
                this.error = error.message
            }
        },
        edituser: async function (id) {
            try {
                let response = await UserApi.singleData(id);
                this.data.name = response.data.name
                this.buttonTxt = "Update";
                this.data.id = response.data.id;
                console.log(response.data)
                this.data.email = response.data.email
            } catch (error) {
                console.log(error)
                this.isError = error
            }

        },
        deleteuser:async function(id){
            try{
                let responses = await UserApi.deleteUser(id);
                console.log(responses);
                if(responses !=  null){

                    this.success = responses.data.msg;
                }
                 try {
                    let response = await UserApi.allUser();
                    //    console.log(response.data[0])
                    this.details = response.data;
                    console.log(this.details)
                } catch (error) {
                    this.isError = error.data;
                }
            }catch(error){
                console.log(error)
                this.isError=error;
            }
        }
    }
}
</script>