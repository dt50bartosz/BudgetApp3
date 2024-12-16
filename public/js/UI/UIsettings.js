import {UIGeneral} from '../UI/UIGeneral.js';
import {ModalHandler} from '../auxiliary/ModalManager.js';
import {SettingsManager} from '../settings/SettingsManager.js';

export class UISettings {
    constructor() {
        this.uIGeneral = new UIGeneral(); 
        this.modalHandler = new ModalHandler();
        this.settingsManager = new SettingsManager();
        this.initFunction();
       
    }

    initFunction() { 
        
        //             Expense                       //

        $("#delete-expense").click((e) => {
           e.preventDefault();
           $("#id01").show();
           this.settingsManager.getExpensesCategories();

           
        });


        $("#deleteExpenseBtn").click((e) => {
            e.preventDefault();
            this.settingsManager.deleteExpense();

        });
        

       $('#close-modal-btn').on('click', (e) => {
            const form = $("#deleteExpense");
            const message =  (".message-php");
            e.preventDefault();
            this.modalHandler.closeModal(form,message)
        });
        

        //        Income             //

        $("#delete-income").click((e) => {
            e.preventDefault();
            $("#id02").show();
            this.settingsManager.getIncomeCategories();
            
 
            
         });
 
 
         $("#deleteIncomeBtn").click((e) => {
             e.preventDefault();
             this.settingsManager.deleteIncome();
            
 
         });
         
 
        $('.offId02').on('click', (e) => {
             const form = $("#incomeDelete");
             const message =  (".message-php");
             e.preventDefault();
             this.modalHandler.closeModal(form,message)
        });
    

    //  AddIncome             //

    $("#add-income").click((e) => {
        e.preventDefault();
        $("#id03").show();      

    });

    $('.offId03').on('click', (e) => {
        const form = $("#incomeDelete");
        const message =  (".message-php");
        e.preventDefault();
        this.modalHandler.closeModal(form,message)
   });


   $("#addIncomeCategory").click((e) => {
         e.preventDefault();
         this.settingsManager.addIncome();
    });


    // Add Expense // 

    $("#add-expense").click((e) => {
        e.preventDefault();
        $("#id04").show();      

    });


    $('.offId04').on('click', (e) => {
        const form = $("#addExpenseCategoryForm");
        const message =  (".message-php");
        e.preventDefault();
        this.modalHandler.closeModal(form,message)
   });


   $("#addExpenseCategory").click((e) => {
    e.preventDefault();
    this.settingsManager.addExpense();
    });

    }

    

   



   



    
}
