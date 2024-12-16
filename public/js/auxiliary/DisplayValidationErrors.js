export class ValidationErrorDisplay {

    display(errors) {

        for (let field in errors) {
            let errorMessages = errors[field];
            let errorContainer = $('.error-' + field);  
    
            if (errorContainer.length) {
               
                errorContainer.empty();
    
        
                errorMessages.forEach(function(message) {
                    let errorMessage = $('<p></p>').text(message);  
                    errorContainer.append(errorMessage);  
                });
            }
        }
    }


    }



