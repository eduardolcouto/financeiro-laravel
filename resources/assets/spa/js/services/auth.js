import {Jwt} from './resources';
import LocalStogare from './localStorage';

export default {
    login(email, password){
        return Jwt.accessToken(email, password).then( (response)=>{
            LocalStogare.set('token',response.data.token);  
            return response;         
        });        
        
    }
}