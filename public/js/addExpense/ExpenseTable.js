export class ExpenseTable {
    constructor() {
     
        this.displayTable();
    }


    displayTable() {
        
        const  tableHeader = $('#transactionsTable');

        
        tableHeader.append(`
        
            <th>Date</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Payment Method</th>
            <th>Comment</th>
            <th>Action</th>
            
        `);
    }
}