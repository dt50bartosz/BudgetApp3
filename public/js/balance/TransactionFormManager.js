import { AjaxHelper } from "../auxiliary/ajaxHelper.js";

export class TransactionFormManager {
    constructor() {
        this.paymentMethodContainer = $('.payment-method');
        this.AjaxHelper = new AjaxHelper();
    }



    setIncomeData() {
        $('.payment-method').hide();
        const transactionId = $('input[name="transaction_id"]').val(); 
        
        $.get('/incomeCategories', function(response){

            if (response.status === "success") {

                
                                 
                const dropdownCategory = $('#new-category');

                response.categories.forEach(function(method){
                    
                    const option = $('<option>').val(method.id).text(method.name);
                    dropdownCategory.append(option);
                });

                $.get(`/getIncome?id=${transactionId}`,function(income){
                    
                    $('#new-date').val(income.transaction.date_of_income);
                    $('#new-amount').val(income.transaction.amount);
                    $('#new-comment').val(income.transaction.income_comment);
                    $('#new-category').val(income.transaction.income_category_assigned_to_user_id);

                });


            }else {
                console.error('Error fetching payment methods');
            }

        });


    }


    
    setExpensesData() {

        const transactionId = $('input[name="transaction_id"]').val();      

        $.get('/paymentMethods', function(response) {
            if (response.status === "success") {
                const dropdown = $('#payment-methods');
                dropdown.empty();
        
                response.payment.forEach(function(method) {
                    const option = $('<option>').val(method.id).text(method.name);
                    dropdown.append(option);
                });


                $.get('/getExpenseCategories', function(categories) 
                {                    
                    const dropdownCategory = $('#new-category');

                    categories.categories.forEach(function(method){
                        
                        const option = $('<option>').val(method.id).text(method.name);
                        dropdownCategory.append(option);

                    })

                });        
                $.get(`/getExpense?id=${transactionId}`, function(expense) {                 
                    $('#payment-methods').val(expense.transaction.payment_method_assigned_to_user_id);
                    $('#new-date').val(expense.transaction.date_of_expense);
                    $('#new-amount').val(expense.transaction.amount);
                    $('#new-comment').val(expense.transaction.expense_comment);
                    $('#new-category').val(expense.transaction.expense_category_assigned_to_user_id);

                }).fail(function() {
                    console.error('Error fetching expense details');
                });
            } else {
                console.error('Error fetching payment methods');
            }
        });
    }
}







