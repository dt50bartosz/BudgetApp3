import { BalanceAdditionalFunctions } from "./BalanceAdditionalFunctions.js";
import { AjaxHelper } from "../auxiliary/ajaxHelper.js";
import { TransactionRenderer } from "./TransactionRendere.js";
import { IncomeManager } from "../addIncome/IncomeManager.js";
import { ExpenseManager } from "../addExpense/ExpensiveManager.js";
import { TransactionFormManager } from "./TransactionFormManager.js";
//import { TotalAmount } from "../JS/TotalAmount.js";


export class BalanceManager {
    constructor() {
      this.ajaxHandler = new AjaxHelper();
        this.additionalFunction = new BalanceAdditionalFunctions();
        this.incomeManager = new IncomeManager();
        this.expenseManager = new ExpenseManager();
        this.transactionRenderer = new TransactionRenderer();     
        this.transactionFormManager = new TransactionFormManager();
     //  this.totalAmount = new TotalAmount();
        
        
     this.transactionStrategies = {
        income: {
            display: (transactions) => this.transactionRenderer.displayIncomesTable(transactions),
            loadCategory: () => this.transactionFormManager.setIncomeData(),
            delete: () => this.incomeManager.deleteTransaction(),
            edit: () => this.incomeManager.updateIncomeTable()
        },
        expense: {
            display: (transactions) => this.transactionRenderer.displayExpensesTable(transactions),
            loadCategory: () => this.transactionFormManager.setExpensesData(),
            edit: () => this.expenseManager.editExpense(),
            delete: () => this.expenseManager.deleteExpense()
        }
    };
    
        
        
        
    }

    createPie() {
        this.additionalFunction.createPie();
    }

    


    deleteTransaction() {
        let transactionType = this.additionalFunction.getTransactionType();
        let strategy = this.transactionStrategies[transactionType];
        console.log(strategy.delete());
       

      // return strategy.delete();

    }

    displayTransactions() {
       // this.totalAmount.setTotalAmount();  
       
    
       $('#transactionsTable').empty();
        let transactionType = this.additionalFunction.getTransactionType();
        
        let strategy = this.transactionStrategies[transactionType];
        
        this.additionalFunction.loadTransactions()
                    .then((transactions) => {               
                    strategy.display(transactions);
            })
            .catch((error) => {
                console.error("Error loading transactions:", error);
            });
    }

    initEditTransactionForm() {
        let transactionType = this.additionalFunction.getTransactionType();        
        
        transactionType === 'expense' ? $('.payment-method').css('display', 'block') : $('.payment-method').hide();
    

        let strategy = this.transactionStrategies[transactionType];
      
        strategy.loadCategory();
    }

    editTransaction() {

        let transactionType = this.additionalFunction.getTransactionType();        
        let strategy = this.transactionStrategies[transactionType]; 
        
        
       
        return strategy.edit();

    }
}
