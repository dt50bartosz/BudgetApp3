import { AjaxHelper } from "../auxiliary/ajaxHelper.js";
import {ValidationErrorDisplay} from "../auxiliary/DisplayValidationErrors.js";

export class IncomeManager {

    constructor() {
        this.ajaxHandler = new AjaxHelper();
        this.validationErrorDisplay = new ValidationErrorDisplay;
      
       
    }  


    
    deleteTransaction() {
     
        const formData = $('#delete-form').serializeArray();
        const transactionId = formData.find(item => item.name === 'transaction_id').value;
        const deleteUrl = `/deleteIncome/${transactionId}`;

        return new Promise((resolve, reject) => {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                success: (response) => {
                    if (response.status === "success") {
                        resolve(); 
                    } else {
                        reject(new Error("Failed to delete the transaction.")); 
                    }
                },
                error: (xhr, status, error) => {
                    reject(new Error(error)); //
                }
            });
        });
    }

    

    updateIncomeTable() {
        const data = $("#update").serialize();
        const editIncomeUrl = "/editIncome";
    
        return new Promise((resolve, reject) => {
            this.ajaxHandler.sendAjaxRequest('POST', editIncomeUrl, data, 
                (response) => {

                    resolve();
                }, 
                (errorMessage) => {
                    alert(errorMessage);
                    console.log(errorMessage);
                    reject(errorMessage); 
                }
            );
        });

    }
    

    addIncome() {
            const formData = $('#addIncomeForm').serialize();
            const addExpenseUrl = "/addIncome";
            
            this.ajaxHandler.sendAjaxRequest('DELETE', addExpenseUrl, formData, 
                (response) => {
                    $('.message-php').html('<p class=".message-php">' + response.message + '</p>').css("color", "green");
                    $('#submit-expense').prop('disabled', false);    
                }, 
                (response) => {
                    let errors = response.errors;
                    this.validationErrorDisplay.display(errors);
                }
            );
    }

    clearForm() {
        
        $('#addIncomeForm input[type="number"], #addIncomeForm input[type="date"], #addIncomeForm input[type="text"], #addIncomeForm select').val('');
        
        $('#addIncomeForm input[name="addComment"]:checked').prop('checked', false);
        $('#commentNo').prop('checked', true);
        
  
        

        $('.error').text('');
        $('#form-message').text('');

        
    }

 
}
