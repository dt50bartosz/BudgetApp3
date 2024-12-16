
    <?php include 'partials/_header.php'; ?>
    
    


    <article class="middle section">
    <main class="about-section">
        <div class="section-container">
            <div class="heading-container">
                <div class="text-heading">
                    <h1>New dimension of budget management!</h1>
                    <p>Save, control expenses, and achieve financial success with the BudgetEasy app</p>                
                    <button id="register-btn" class="btn" onclick="window.location.href='/register'">Register</button>                  
                 </div>
                <div class="img-heading">
                    <img src="/assets/img/94afcdbd10118d92aeb71049925235a3.jpg" alt="">
                </div>
            </div>
        </div>
    </main>
</article>

<article class="budget-calculator">
    <div class="section-container">
        <div class="calculator">
            <div class="user-input">
                <p>Calculate Your Monthly Saving Target</p>
                <form action="#">
                    <div class="input-container">
                        <i class="fa-solid fa-bullseye icon"></i>
                        <input type="text" id="goal" name="goal" placeholder="e.g., vacation">
                    </div>
                    <div class="input-container">
                        <i class="fa-solid fa-money-bill icon"></i>
                        <input type="number" id="target-amount" name="target-amount" placeholder="$1000" required>
                    </div>
                    <div class="input-container">
                        <i class="fa-regular fa-calendar-days icon"></i>
                        <input type="number" id="timeframe" 
                            placeholder="Enter number of months, e.g., 12 months" required>
                    </div>                        
                </form>
        
                <button id="calculate-btn" class="btn btn-image">Calculate</button>
            </div>
            <div class="calculator-output">
                <div class="text-output">
                    <p>To save for your dream <span id="item">item</span>, you need to save monthly:</p>
                    <p id="target-amount-output">$0.00</p>
                </div>
                <div class="output-img">
                    <img src="/assets/img/773a60dc44693a76ef272018b0ccf18b.jpg" alt="">
                </div>
            </div>               
        </div>
     </div>
</article>


    <?php include 'partials/_footer.php'; ?>
    




    <script src="https://kit.fontawesome.com/dbe3cc6cfd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="" src="/js/index/links.js"></script>
    <script type="module" src="/js/index.js"></script>

</body>

</html>