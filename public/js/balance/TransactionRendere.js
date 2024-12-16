import { IncomeTable } from "../addIncome/IncomeTable.js";
import {ExpenseTable} from "../addExpense/ExpenseTable.js";

export class TransactionRenderer {

    addTransactionToTable(date, amount, type, comment, transactionId) {
        $("#transactionsTable").append(
            `<tr>
                <td>${date}</td>
                <td>${amount}</td>
                <td>${type}</td>
                <td>${comment}</td>
                <td>
                    <p class="action" id="${transactionId}" value="${type}" style="cursor: pointer; display: inline-flex; align-items: center;">
                        <span id="edit"><i class="fa-solid fa-pen"></i></span>
                        <i id="delete" class="fa-solid fa-trash" style="margin-left: 20px;"></i>
                    </p>
                </td>
            </tr>`
        );
    }

    addExpenseToTable(date, amount, type, payment_method,comment,transactionId) {
        $("#transactionsTable").append(
            `<tr>
                <td>${date}</td>
                <td>${amount}</td>
                <td>${type}</td>
                <td>${payment_method}</td>
                <td>${comment}</td>
                <td>
                    <p class="action" id="${transactionId}" value="${type}" style="cursor: pointer; display: inline-flex; align-items: center;">
                        <span id="edit"><i class="fa-solid fa-pen"></i></span>
                        <i id="delete" class="fa-solid fa-trash" style="margin-left: 20px;"></i>
                    </p>
                </td>
                
                
  
            </tr>`
        );
    }

    displayIncomesTable(transactions) {


        $("#transactionsTable").empty();
        const incomeTable = new IncomeTable(); 

        

        if (transactions.length === 0) {
            $('#transactionsTable').append(
                `<tr>
                    <td colspan="5" style="text-align: center;">No transactions found</td>
                </tr>`
            );
        } else {
            transactions.forEach((transaction) => {
                const { date_of_income: date, amount, income_comment: comment, category_name: type, id: transactionId} = transaction;
                this.addTransactionToTable(date, amount, type, comment,transactionId);
            });
        }
    }

    displayExpensesTable(transactions) {


        $("#transactionsTable").empty();
        const incomeTable = new ExpenseTable(); 
        

        if (transactions.length === 0) {
            $('#transactionsTable').append(
                `<tr>
                    <td colspan="6" style="text-align: center;">No transactions found</td>
                </tr>`
            );
        } else {
            
            transactions.forEach((transaction) => {
                const { date_of_expense: date, amount, category_name: type, payment_method,expense_comment:comment
                    ,id: transactionId
                } = transaction;
                this.addExpenseToTable(date, amount, type, payment_method,comment,transactionId);
            }); 
        }
    }

    displayMessage(elementSelector, message, color) {
        $(elementSelector).html(`<p>${message}</p>`).css("color", color);
    }
}
