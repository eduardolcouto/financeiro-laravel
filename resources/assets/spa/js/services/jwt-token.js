import {Jwt} from './resources';
import LocalStorage from './localStorage';
import {User} from '../services/resources';

const TOKEN = 'token';

export default {
    get token(){
        return LocalStorage.get(TOKEN);
    },
    set token(value){
        return value ? LocalStorage.set(TOKEN,value) : localStorage.removeItem(TOKEN);
    },
    accessToken(email,password){
        return Jwt.accessToken(email, password).then((response) => {
            this.token =  response.data.token;
            return response;
        });
    },
    refreshToken(){
        return Jwt.refreshToken().then((response) => {
            this.token =  response.data.token;
            return response;
        });
    },
    revokeToken(){
        let afterRevokeToken = () =>{
            this.token = null;
        };

        return Jwt.logout()
            .then(afterRevokeToken())
            .catch(afterRevokeToken());
    },

    getAuthorizationHeader() {
        return `Bearer ${LocalStorage.get(TOKEN)}`;
    },
}