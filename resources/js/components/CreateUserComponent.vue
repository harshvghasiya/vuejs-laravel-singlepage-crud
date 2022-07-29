<template>
    <div class="container mt-5">
        <div class="alert alert-success" v-if="this.success != null" role="alert">
         {{this.success}}
        </div>
        <div class="alert alert-danger" v-if="this.error != null" role="alert">
         {{this.error}}
        </div>
        <form @submit.prevent="submitUser">
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
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</template>
<script>
import {UserApi} from "../services/UserApi.js";

export default {
    name: "CreateUserComponent",
    data(){
        return{
            data:{
                name:"",
                email:"",
                password:""
            },
            error:null,
            success:null
        }
    },
    methods:{
        submitUser:async function(){
            try{
                let response=await UserApi.storeUser(this.data);
                this.error=null;
                this.success=response.data.msg;
            }catch(error){
                
                this.success=null
                this.error=error.message
            }
        }
    }
}
</script>