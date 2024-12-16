import {UIGeneral} from './UIGeneral.js';
import {ModalHandler} from '../auxiliary/ModalManager.js';
import {ExpenseManager} from '../addExpense/ExpensiveManager.js'
import {Date} from '../auxiliary/Date.js';


export class UIAddExpense {

    constructor() {
        
         this.uIGeneral = new UIGeneral(); 
         this.expenseManager = new ExpenseManager();
         this.modalManager = new ModalHandler();
         this.date = new Date("#transaction-date");

        this.initFunction();
    }

    initFunction() {

        $(".main-opitions-container").on('click', '.option', (e) => {
            this.expenseManager.clearForm();
             const formId = $("#addExpenseForm");
             const clickedId = $(e.currentTarget).attr('id');
            this.date.setTodayDate()
            this.modalManager.openModal(formId, clickedId);
            
        });

        $('.input-container').on('click', '#input-number',(e) =>{
            this.expenseManager.clearForm();
            $('#submit-expense').prop('disabled', false);
            this.date.setTodayDate();
        });      

        
        $("#submit-expense").click((e) => {
            e.preventDefault();
            this.expenseManager.addExpense();
        });

        $('#close-modal-btn').on('click', (e) => {
            e.preventDefault();
            const formId = $("#addExpenseForm");  
            $("#addExpenseForm input[name='selectedId']").remove();         
            this.modalManager.closeModal(formId);
        });
        
    }
}

