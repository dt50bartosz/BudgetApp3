export class ChartGenerator {
    constructor() {
     
        this.date = null;
    }

    
    setDate(date) {
        this.date = date;
    }

    generateCategoryColors(categories) {
        const predefinedColors = {
            'Ebay Sales': '#FF6384',
            'Other': '#36A2EB',
            'Salary': '#FFCE56'
        };

        return categories.map((category) => 
            predefinedColors[category] || 
            '#' + ('000000' + Math.floor(Math.random() * 16777215).toString(16)).slice(-6)
        );
    }

 
    createPieChart() {


        const response = this.date; 

        console.log(response);
        console.log(this.date);

    
       
        const categories = $.map(response, item => item.category_name || "Unknown");
        const amounts = $.map(response, item => parseFloat(item.amount) || 0);

        console.log("Categories:", categories, "Amounts:", amounts);

       
        const backgroundColors = this.generateCategoryColors(categories);

        
        const ctx = $('#myChart')[0]?.getContext('2d');
        
       
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: categories,
                datasets: [{
                    data: amounts,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                responsive: true,
                plugins: {
                   
                }
            }
        });
    }
}



