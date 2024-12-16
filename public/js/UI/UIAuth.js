import { UIGeneral } from "./UIGeneral.js";
import { ModalHandler } from "../auxiliary/ModalManager.js";
import { AuthManager } from "../auth/AuthManager.js";

export class UIAuth {
    constructor() {
        this.uIGeneral = new UIGeneral(); 
        this.authManager = new AuthManager();
        this.modalHandler = new ModalHandler();
        this.initFunction();
       
    }

    initFunction() {
        this.loginLogic();
        this.registerLogic();
        
    }


    loginLogic() {
        $("#navbar-login-btn").click(() => {

            window.location.href = '/login';
     
        });
    }

    registerLogic() {

        $("#register-btn").click(() => {

            window.location.href = '/register';


      
        });       

    }
    
}
