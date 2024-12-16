export class IncomeTable {

    constructor() {
        this.displayTable();
    }

    displayTable() {

       const  tableHeader = $('#transactionsTable');
       
        
        tableHeader.append(`
                <th>Date</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Comment</th>
                <th>Action</th>
            
        `);
    }
}