<?php include 'partials/_header.php'; ?>




<article>
        <main class="display-budget">
            <div class="section-container">
                <div class="main-section-navbar">
                    <div class="navbar-title">
                        <h1>Transactions</h1>
                       
                    </div>
                    <div class="total-income total">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <p id="total-income">0.00</p>
                    </div>
                    <div class="total-expense total">
                        <i class="fa-solid fa-arrow-trend-down"></i>
                        <p id="total-expense">0.00</p>
                    </div>
                </div>
                <hr>
                <div class="select-dates">

                    <form id="update-table" class="dates" method="post">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                        <div class="start-date date">
                            <label for="first-day">From</label>
                            <div class="input-container">
                                <i class="fa-solid fa-calendar-days icon"></i>
                                <input id="first-day" name="start-date" type="date" placeholder="Start date">
                            </div>             
                        </div>
                        <div class="finish-date date">
                            <label for="current-date">End Date</label>
                            <div class="input-container">
                                <i class="fa-solid fa-calendar-days icon"></i>
                                <input id="current-date" name="finish-date" type="date" placeholder="Finish date">
                            </div>
                        </div>
                        <div class="transaction-type date">
                            <label for="transaction-type">Transaction Type</label>
                            <div class="input-container">
                                <i class="fa-solid fa-money-bill-transfer icon"></i>
                                <select name="transaction" id="transaction-type">
                                    <option  value="income">Income</option>
                                    <option  value="expense">Expense</option>
                                </select>
                            </div>
                        </div>
                        <div class="date">
                            <button type="submit" class="btn" id="display-btn">Display</button>
                        </div>

                    </form>


                    <div class="display-piechart">
                        <p id="display-piechart">Display Pie Chart</p>
                        <p id ></p>
                    </div>
                </div>
                <div class="table-container">
                    <table id="transactionsTable">
                    </table>
                </div>
            </div>
        </main>
    </article>



    <article class="animate">
        <div class="modal" id="id02">
            <div class="modal-content section-container">
                <div class="edit-title">
                    <p>Edit Transaction</p>
                </div>
                <div>
                    <form id="update">
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <div><p class="error error-transaction-date"></p></div>
                        <div class="date">
                            <label for="new-date">Edit Date</label>
                            <div class="input-container">
                                <i class="fa-solid fa-calendar-days icon"></i>
                                <input id="new-date" name="transaction-date" type="date" placeholder="New Date">
                            </div>
                        </div>
                        <div><p class="error error-amount"></p></div>
                        <div class="date">
                            <label for="new-amount">Edit Amount</label>
                            <div class="input-container">
                                <i class="fa-solid fa-dollar-sign icon"></i>
                                <input id="new-amount" name="amount" min="0.00" type="number" step="0.01" placeholder="Amount">
                            </div>
                        </div>
                        <div><p class="error error-comment"></p></div>
                        <div class="date">
                            <label for="new-comment">Edit Comment</label>
                            <div class="input-container">
                                <i class="fa-solid fa-comment icon"></i>
                                <input id="new-comment" name="comment" type="text" placeholder="Comment">
                            </div>
                        </div>
                        
                    
                        <div class="date">
                            <label for="new-comment">Edit Category</label>
                            <div class="input-container">
                                <i class="fa-solid fa-comment icon"></i>
                                <select id="new-category" name="category" type="text" placeholder="Category">
                                </select>
                            </div>
                        </div>

                        <div><p class="error error-payment-methods"></p></div>
                        <div class="date payment-method">
                            <label for="payment-method">Payment Method</label>
                            <div class="input-container">
                                <i class="fa-solid fa-comment icon"></i>
                                <select id="payment-methods" name="payment-methods" type="text" placeholder="Payment Methods">
                                </select>
                            </div>
                        </div>
                       
                        <div class="btn-container">
                            <button type="submit" class="btn" id="save-changes-btn">Save Changes</button>
                            <button  class="btn" id="cancel-btn">Cancel</button>
                        </div>
                        <p id="edit-message" class="message"></p>
                        <input type="hidden" name="transaction_id" value="">
                    </form>
                    <p id="edit-message" class="massage"></p>
                </div>
            </div>
        </div>
    </article>

    <article class="animate">
        <div class="modal" id="id03">
            <div class="modal-content section-container">
                <div class="edit-title">
                    <p>Delete Transaction</p>
                </div>
                <div class="delete-txt">
                    <p>Do you want to delete this transaction permanently?</p>
                </div>
                <div>
                    
                    <form id="delete-form" method="POST">
                      <?php include $this->resolve('partials/_csrf.php'); ?>
                        <div class="btn-container">
                            <button type="submit" class="btn" id="delete-btn">Confirm</button>
                            <button  class="btn" id="delete-cancel-btn">Cancel</button>
                        </div>
                        <p id="delete-message" class="massage"></p>
                        <input type="hidden" name="_METHOD" value="DELETE">
                        <input type="hidden" name="transaction_id" value="">
                    </form>
                </div>
                <p id="delete-message" class="massage"></p>
            </div>
        </div>
    </article>

    <article class="animate">
    <div class="modal" id="id05">
        
        <div class="modal-content section-container">
          <div  class="close">&times;</div>
            <p>Pie Chart</p>
            <div class="piechart-container">
                <canvas id="myChart" style="width: 100%; max-width: 800px; height: 400px; display: block;"></canvas>
            </div>
        </div>
    </div>
    </article>

  



    <?php include 'partials/_footer.php'; ?>


    <script src="https://kit.fontawesome.com/dbe3cc6cfd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="" src="/js/index/links.js"></script>
    <script type="module" src="/js/balance.js"></script>
  
</body>


</html>