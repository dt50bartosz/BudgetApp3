import { BalanceManager } from "../balance/BalanceManager.js";
import { UIGeneral } from "./UIGeneral.js"


export class UIBalance {

    constructor() {
       this.balanceManager = new BalanceManager();
        this.uIGeneral = new UIGeneral();
        this.initializeEvents();
    

    }


  

    initializeEvents() {
       
        this.initEvents();
        $("#display-btn").trigger("click");
    }



    initEvents() {


        $('#display-piechart').click(() => {
            $("#id05").show();
            this.balanceManager.createPie();
        });

        $('.close').click(() => {
            $("#id05").hide();
            this.balanceManager.createPie();
        });




        $("#transactionsTable").on('click', '#edit', (e) => {
      
            $("#id02").show();            

          let transactionId = $(e.currentTarget).closest('.action').attr('id');
          
           $('input[name="transaction_id"]').val(transactionId);  
            
            this.balanceManager.initEditTransactionForm();
        });


        $("#cancel-btn").click(function(e) {
            $(".message").html(" ");
            e.preventDefault();
            $("#update")[0].reset();
           $(".modal").hide();
          
           
        });

        $("#transactionsTable").on('click', '#delete', function() {
            $("#id03").show();
            let transactionId = $(this).closest('.action').attr('id');
            $("#delete-form input[name='transaction_id']").val(transactionId);
           

           

        }); 

        $("#display-btn").click((e) => {
            e.preventDefault();            
            this.balanceManager.displayTransactions();
        });

        $("#delete-btn").click((e) => {
            e.preventDefault();

           this.balanceManager.deleteTransaction()
                .then(() => {
                $("#delete-message").text("Transaction deleted successfully");
                this.balanceManager.displayTransactions(); 
            });

            
        });




        $("#delete-cancel-btn").click((e) => {
            e.preventDefault();
            $(".massage").html("");
            $(".modal").hide();
        });


        $("#save-changes-btn").click((e) => {
            e.preventDefault();
        
            this.balanceManager.editTransaction()
                .then(() => {
                
                    $("#edit-message").text("Transaction edit successfully");
     
                    this.balanceManager.displayTransactions();
                })
                .catch((error) => {
                   
                    console.error("Error editing transaction:", error);
                    $("#delete-message").text("Failed to edit transaction. Please try again.");
                });
        });
        

            
    
            



    }

}
