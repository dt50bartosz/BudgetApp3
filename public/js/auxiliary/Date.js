
export class Date {

    constructor(selector) {
        this.selector = selector;
    }

    setDate(date) {
        const element = $(this.selector);    
        element.val(date);
    }

    getTodayDate() {
        const today = new window.Date();  
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const year = today.getFullYear();
        return `${year}-${month}-${day}`;
    }

    setTodayDate() {
        const todayDate = this.getTodayDate();
        this.setDate(todayDate);
    }
}


