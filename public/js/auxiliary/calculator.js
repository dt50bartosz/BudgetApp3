
export class Calculator {
    constructor() {
        this.initEvents(); 
    }


    initEvents() {
        $("#calculate-btn").click((e) => this.handleCalculate(e)); 
    }

    
    handleCalculate(event) {
        event.preventDefault(); 

        
        const amountNeed = parseFloat($("#target-amount").val()); 
        const months = parseInt($("#timeframe").val()); 
        const userItem = $("#goal").val(); 

    
        if (isNaN(amountNeed) || isNaN(months) || amountNeed <= 0 || months <= 0) {
            alert("Please enter valid amount and months."); 
        } else {
           
            const monthlyAmount = this.calculateMonthlyAmount(amountNeed, months);
            
            $("#target-amount-output").text(monthlyAmount);
            $("#item").text(userItem);
            $(".text-output").show(); 
            $(".output-img").hide(); 
        }
    }


    calculateMonthlyAmount(amountNeed, months) {
        const monthlyAmount = (amountNeed / months).toFixed(2); 
        return monthlyAmount; 
    }
}
