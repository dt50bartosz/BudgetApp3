import { AjaxHelper } from "../auxiliary/ajaxHelper.js";
import {ValidationErrorDisplay} from "../auxiliary/DisplayValidationErrors.js";


export class SettingsManager {
    constructor() {       
        this.ajaxHandler = new AjaxHelper();
        this.validationErrorDisplay = new ValidationErrorDisplay;
    }

    getExpensesCategories() {    
        $('#expenseCategories').empty();
        $('#expenseCategories').append('<option value="" disabled selected>Select an Expense Category</option>');
    
        $.get('/getExpenseCategories', function(expense) {   
            expense.categories.forEach(function(category) {
                $('#expenseCategories').append(
                    $('<option>', {
                        value: category.id,
                        text: category.name
                    })
                );
            });
        }).fail(function() {
            console.error('Error fetching expense details');
        });
    }
    

    deleteExpense() {
        const formData = $('#deleteExpense').serializeArray();      
        const categoryId = formData.find(item => item.name === 'DeleteCategory').value;           
        const deleteUrl = `/deleteExpenseCategory/${categoryId}`;



         $.ajax({
            url: deleteUrl,
            type: 'DELETE',
            success: (response) => {
                
                if (response.status === "success") {
                    $('.message-php').html('<p class=".message-php">' + response.message + '</p>').css("color", "green");

                } else {
                    reject(new Error("Failed to delete the transaction.")); 
                }
            },
            error: (xhr, status, error) => {
            
            }
        });
    }


    
    getIncomeCategories() {    
        $('#incomeCategories').empty();
        $('#incomeCategories').append('<option value="" disabled selected>Select an IncomeCategory</option>');
    
        $.get('/incomeCategories', function(income) {   
            income.categories.forEach(function(category) {
                $('#incomeCategories').append(
                    $('<option>', {
                        value: category.id,
                        text: category.name
                    })
                );
            });
        }).fail(function() {
            console.error('Error fetching expense details');
        });
    }

    deleteIncome() {
        const formData = $('#incomeDelete').serializeArray();     
        const categoryId = formData.find(item => item.name === 'incomeDelete').value;           
        const deleteUrl = `/deleteIncomeCategory/${categoryId}`;

        this.ajaxHandler.sendAjaxRequest('DELETE',deleteUrl, formData, 
            (response) => {
                $('.message-php').html('<p class=".message-php">' + response.message + '</p>').css("color", "green");

            }, 
            (response) => {
                console.log(response);
                let errors = response.errors;
                this.validationErrorDisplay.display(errors);
            }
        );

    }


    addIncome() {
        const formData = $('#addIncomeCategoryForm').serializeArray();   
        const addUrl = `/addIncomeCategory`; 
        

        this.ajaxHandler.sendAjaxRequest('POST', addUrl, formData, 
            (response) => {
                $('.message-php').html('<p class=".message-php">' + response.message + '</p>').css("color", "green");

            }, 
            (response) => {
                console.log(response);
                let errors = response.errors;
                this.validationErrorDisplay.display(errors);
            }
        );
    
    }


    
    addExpense() {
        const formData = $('#addExpenseCategoryForm').serializeArray();   
        const addUrl = `/addExpenseCategory`; 
        console.log(formData);

        this.ajaxHandler.sendAjaxRequest('POST', addUrl, formData, 
            (response) => {
                $('.message-php').html('<p class=".message-php">' + response.message + '</p>').css("color", "green");

            }, 
            (response) => {
                console.log(response);
                let errors = response.errors;
                this.validationErrorDisplay.display(errors);
            }
        );
    
    }

}
