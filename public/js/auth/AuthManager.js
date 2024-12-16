import { AjaxHelper } from "../auxiliary/ajaxHelper.js";

export class AuthManager {

    constructor() {
        this.ajaxHandler = new AjaxHelper();
        
    }



    handleRegister() { 
      

        const form = $("#newuser"); 
        const url = '/register';       

        console.log(form);
      
 
        this.ajaxHandler.sendAjaxRequest('POST', url, form.serialize(),
        
            (response) => {
                console.log("Type of response:", typeof response);
              
                
              /*  $('.message').html('<p class="message_php">' + response.message + '</p>').css("color", "green");
                setTimeout(() => {
                   // window.location.href = response.redirect; 
                }, 1000);*/
            },
            (errorMessage) => {
                
                $('.message').html('<p class="message_php">' + errorMessage + '</p>').css("color", "red");
            }
        )
    }

    


}