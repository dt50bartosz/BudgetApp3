<?php include $this->resolve('partials/_header.php'); ?>



<article class="main-section">
    <main>


        <div class="main-opitions-container">


            <div class="section-container">
                <div class="main-options-container">
                    <div class="option" id="delete-income">
                        <i class="fa-solid fa-list"></i>
                        <p>Delete Income Category</p>
                    </div>
                </div>
            </div>


            <div class="section-container">
                <div class="main-options-container">
                    <div class="option" id="delete-expense">
                        <i class="fa-solid fa-list"></i>
                        <p>Delete Expense Category</p>
                    </div>
                </div>
            </div>

            <div class="section-container">
                <div class="main-options-container">
                    <div class="option" id="add-income">
                        <i class="fa-solid fa-list"></i>
                        <p>Add Income Category</p>
                    </div>
                </div>
            </div>

            <div class="section-container">
                <div class="main-options-container">
                    <div class="option" id="add-expense">
                        <i class="fa-solid fa-list"></i>
                        <p>Add Expense Category</p>
                    </div>
                </div>
            </div>
</article>

<!--         Delete Expense      --> 

<block class="delete-expense animate">
    <div class="modal" id="id01">
        <form method="POST" id="deleteExpense" class="modal-content section-container">
        
            <div class="close-modal">
                <button type="button" id="close-modal-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="title-h2">
                <h2>Delete Expense Category</h2>
            </div>
            <div class="form-container">
                <div>
                    <p class="error error-category"></p>
                </div>

                <label for="DeleteCategory">Delete Category</label>
                <div class="input-container">
                    <i class="fa-solid fa-trash icon"></i>
                    <select id="expenseCategories" placeholder="Expenses Category" name="DeleteCategory">
                    </select>

                </div>
            </div>
            <input type="hidden" name="_METHOD" value="DELETE">
            <input class="btn submit" id="deleteExpenseBtn" type="submit" value="Delete">
            <div class="message-php" id="form-message"></div>
        </form>
    </div>
</block>




<!-- Delete Income Category -->
<block class="delete-income animate">
    <div class="modal" id="id02">
        <form method="POST" id="incomeDelete" class="modal-content section-container">
            <div class="close-modal offId02">
                <button type="button" class="close-btn" id="close-modal-btn">
                    <i class="fa-solid fa-xmark "></i>
                </button>
            </div>
            <div class="title-h2">
                <h2>Delete Income Category</h2>
            </div>
            <div class="form-container">
                <div>
                    <p class="error error-category"></p>
                </div>
                <label for="incomeDelete">Income Category</label>
                <div class="input-container">
                    <i class="fa-solid fa-trash icon"></i>
                    <select id="incomeCategories" name="incomeDelete">
                    </select>
                </div>
            </div>
            <input type="hidden" name="_METHOD" value="DELETE">
            <input class="btn submit" id="deleteIncomeBtn" type="submit" value="Delete">
            <div class="message-php" id="form-message"></div>
        </form>
    </div>
</block>



<!-- Add Income Category -->


<block class="add-income animate">
    <div class="modal" id="id03">
        <form method="POST" id="addIncomeCategoryForm" class="modal-content section-container">
            <div class="close-modal offId02">
                <button type="button" class="close-btn" id="close-modal-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="title-h2">
                <h2>Add Income Category</h2>
            </div>
            <div class="form-container">
                <div>
                    <p class="error error-addIncome"></p>
                </div>

                <label for="addIncome">Income Category</label>
                <div class="input-container">
                    <i class="fa-solid fa-plus icon"></i>
                    <select id="incomeCategories" name="addIncomeCategory">
                        <option value="fa-solid fa-wallet" data-icon="fa-solid fa-wallet">Salary</option>
                        <option value="fa-solid fa-chart-line" data-icon="fa-solid fa-chart-line">Investment</option>
                        <option value="fa-solid fa-briefcase" data-icon="fa-solid fa-briefcase">Freelance</option>
                        <option value="fa-solid fa-house" data-icon="fa-solid fa-house">Rental</option>
                        <option value="fa-solid fa-gift" data-icon="fa-solid fa-gift">Gift</option>
                        <option value="fa-solid fa-star" data-icon="fa-solid fa-star">Bonus</option>
                        <option value="fa-solid fa-ellipsis" data-icon="fa-solid fa-ellipsis">Other</option>
                    </select>
                </div>

                <div>
                    <p class="error error-addIncomeName"></p>
                </div>

                <label for="incomeAddCategories">Income Category</label>
                <div class="input-container">
                    <i class="fa-solid fa-pen icon"></i>
                    <input id="incomeAddCategories" name="addIncomeName" type="text">
                </div>

            </div>           
            <input class="btn submit" value="Submit" id="addIncomeCategory" type="submit">
            <div class="message-php" id="form-message"></div>
        </form>
    </div>
</block>



<!-- Add Expense Category -->


<block class="add-expense animate">
    <div class="modal" id="id04">
        <form method="POST" id="addExpenseCategoryForm" class="modal-content section-container">
            <div class="close-modal offId04">
                <button type="button" class="close-btn" id="close-modal-btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="title-h2">
                <h2>Add Expense Category</h2>
            </div>
            <div class="form-container">
                <div>
                    <p class="error error-addExpense"></p>
                </div>

                <label for="addExpense">Expense Category</label>
                <div class="input-container">
                    <i class="fa-solid fa-plus icon"></i>
                    <select id="expenseCategories" name="addExpenseCategory">
                        <option value="fa-solid fa-cart-shopping" data-icon="fa-solid fa-cart-shopping">Groceries</option>
                        <option value="fa-solid fa-car" data-icon="fa-solid fa-car">Transportation</option>
                        <option value="fa-solid fa-utensils" data-icon="fa-solid fa-utensils">Dining Out</option>
                        <option value="fa-solid fa-heart" data-icon="fa-solid fa-heart">Health</option>
                        <option value="fa-solid fa-book" data-icon="fa-solid fa-book">Education</option>
                        <option value="fa-solid fa-home" data-icon="fa-solid fa-home">Rent</option>
                        <option value="fa-solid fa-ellipsis" data-icon="fa-solid fa-ellipsis">Other</option>
                    </select>
                </div>

                <div>
                    <p class="error error-addExpenseName"></p>
                </div>

                <label for="expenseAddCategories">Expense Category</label>
                <div class="input-container">
                    <i class="fa-solid fa-pen icon"></i>
                    <input id="expenseAddCategories" name="addExpenseName" type="text">
                </div>

            </div>           
            <input class="btn submit" value="Submit" id="addExpenseCategory" type="submit">
            <div class="message-php" id="form-message"></div>
        </form>
    </div>
</block>



</main>
</article>




<?php include $this->resolve('partials/_footer.php'); ?>

<script src="https://kit.fontawesome.com/dbe3cc6cfd.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module" src="/js/settings.js"></script>
<script type="" src="/js/index/links.js"></script>

</body>

</html>












</html>