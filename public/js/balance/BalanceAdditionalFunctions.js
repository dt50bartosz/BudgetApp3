import { AjaxHelper } from "../auxiliary/ajaxHelper.js";
import { ChartGenerator } from "../auxiliary/pieChart.js";

export class BalanceAdditionalFunctions {

    constructor() {
         this.ajaxHandler = new AjaxHelper();
         this.setDate();
         this.pie = new ChartGenerator();
    }



    createPie() {
        this.pie.createPieChart();
    }

        

   loadTransactions() {

    return new Promise((resolve, reject) => {
        this.clearTable();
        const formData = $('#update-table').serialize();
        const loadTransactionsUrl = "/balance";        

        this.ajaxHandler.sendAjaxRequest('POST', loadTransactionsUrl,formData,
            (response) => {                      
                resolve(response.transactions.transactions);
                this.pie.setDate(response.transactions.transactions);
                          },
            (errorMessage) => {
                console.log(errorMessage);
                reject(errorMessage); 
            }
        )
    });
    }    


   getTransactionType() {
      var form =  $("#transaction-type").val();
     return form;
   }

   setDate() {
        var newDate1;
        var newDate2;
    
        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
        var day = ("0" + currentDate.getDate()).slice(-2);
        var dayOne = "01";
        var formattedDate = year + '-' + month + '-' + day;
        var formattedDate2 = year + '-' + month + '-' + dayOne;
  
        $('#current-date').val(formattedDate);
        $('#first-day').val(formattedDate2);
    
        newDate1 = formattedDate2; 
        newDate2 = formattedDate;
        
    }
   




        
    appendCategories(response) {
        let categories = response.categories;
        $("#new-category").empty();
      
        $("#new-category").append(`
          <option value="" disabled selected>Select Category</option>
        `);
      
        categories.forEach(function(category) {
          $("#new-category").append(`
            <option value="${category.id}">${category.name}</option>
          `);
        });
      
      
    }


    
    
    getTransactionsCategory(url) {
    

        this.ajaxHandler.sendAjaxRequest('POST', url, {}, 
            (response) => {
                this.appendCategories(response); 
     
        }, (errorMessage) => {
            console.log("AJAX Error: " + errorMessage );
            alert("Failed to fetch categories, please try again later.");
        });
    }

    


    clearTable() {
        $('#transactionsTable').empty(); 
    }

   
    
}
