import axios from "axios";

export class UserApi{
    static serverUrl= `http://127.0.0.1:8000`;

    static allUser() {
        let dataUrl=`${this.serverUrl}/api/user/`;
        return axios.get(dataUrl);
    }

    static storeUser(detail){
        let dataUrl=`${this.serverUrl}/store-user`;
        return axios.post(dataUrl,detail);
    }
    static singleData(id){
        let dataUrl=`${this.serverUrl}/single-user`;
        return axios.post(dataUrl,{id:id});
    }
    static deleteUser(id){
        let dataUrl=`${this.serverUrl}/destroy-user`;
        return axios.post(dataUrl,{id:id});
    }
}