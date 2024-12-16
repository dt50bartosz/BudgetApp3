import { AjaxHelper } from "../auxiliary/ajaxHelper.js";
import {ValidationErrorDisplay} from "../auxiliary/DisplayValidationErrors.js";


export class ExpenseManager {

    constructor() {        
        this.ajaxHandler = new AjaxHelper();
        this.validationErrorDisplay = new ValidationErrorDisplay;       
       
    }



    editExpense() {
        const editExpenseUrl = '/editExpense';
        const data = $("#update").serialize();  
            console.log(data);
        
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: editExpenseUrl,
                    type: 'POST',
                    data: data,
                    success: (response) => {
                        console.log(response);
                        if (response.status === "success") {
                            resolve();
                        } else {
                            reject(new Error(response.message || "Failed to update the expense.")); 
                        }
                    },
                    error: (xhr, status, error) => {
                        const errorMessage = xhr.responseJSON?.message || error; 
                        reject(new Error(errorMessage)); 
                    }
                });
            });
    }

    addExpense() {
        const formData = $('#addExpenseForm').serialize();
        
        const addExpenseUrl = "/addExpense";
        
        this.ajaxHandler.sendAjaxRequest('POST', addExpenseUrl, formData, 
            (response) => {
                $('.message-php').html('<p class=".message-php">' + response.message + '</p>').css("color", "green");
            }, 
            (response) => {
                let errors = response.errors;
                this.validationErrorDisplay.display(errors);
            }
        );
    }

    deleteExpense() {

        const formData = $('#delete-form').serializeArray();
        const transactionId = formData.find(item => item.name === 'transaction_id').value;
        const deleteUrl = `/deleteExpense/${transactionId}`;

        return new Promise((resolve, reject) => {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                success: (response) => {
                    console.log(response);
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


   clearForm() {

    $('#addExpenseForm input[type="number"], #addExpenseForm input[type="date"], #addExpenseForm input[type="text"], #addExpenseForm select').val('');

        
        $('#addIncomeForm input[name="addComment"]:checked').prop('checked', false);
        $('#commentNo').prop('checked', true); 
        $('.error').text('');
        
        
        $('#form-message').text('');
   }
    
}
    


    
 
