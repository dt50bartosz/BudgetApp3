import {UIGeneral} from '../UI/UIGeneral.js';
import {ModalHandler} from '../auxiliary/ModalManager.js';
import {Date} from '../auxiliary/Date.js'
import {IncomeManager} from '../addIncome/IncomeManager.js';

export class UIAddIncome {
    constructor() {
        this.uIGeneral = new UIGeneral(); 
        this.incomeManager = new IncomeManager();
        this.modalHandler = new ModalHandler();
        this.date = new Date('#transaction-date');
        this.initFunction();
       
    }

    initFunction() {

        $(".main-opitions-container").on('click', '.option', (e) => {
            this.incomeManager.clearForm();
           $("#addIncomeForm input[name='selectedId']").remove();
           const form = $("#addIncomeForm");
           this.date.setTodayDate();
           const selectedId = $(e.currentTarget).attr('id');
           this.modalHandler.openModal(form,selectedId);
           
           
        });

        $("#submit-income").click((e) => {
            e.preventDefault();
           this.incomeManager.addIncome();           
        });

        
        $('.input-container').on('click', '#input-number',(e) =>{
            this.incomeManager.clearForm();
            $('#submit-expense').prop('disabled', false);
            this.date.setTodayDate();
        });        

        $('#close-modal-btn').on('click', (e) => {
            e.preventDefault();
            const form = $("#addIncomeForm");
            const message =  "message-php";
            $("#addIncomeForm input[name='selectedId']").remove(); 
            this.modalHandler.closeModal(form,message)
            
        });
        
    }
}
