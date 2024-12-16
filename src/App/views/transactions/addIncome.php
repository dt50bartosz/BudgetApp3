<?php

function displayCategories($categories) {
    foreach ($categories as $category) {
       
        echo '<div class="option" id="' . htmlspecialchars($category['id']) . '">';
        echo '<i class="' . htmlspecialchars($category['icon']) . '"></i>';
        echo '<p>' . htmlspecialchars($category['name']) . '</p>';
        echo '</div>';
    }
}


?>


<?php include $this->resolve('partials/_header.php'); ?>


<article class="main-section">
        <main>
            <div class="section-container">

                <div class="title">
                    <h1>Add Income</h1>
                </div>
                <div class="main-opitions-container">
                    <?php displayCategories($categories);?>
                </div>
            </div>
        </main>
    </article>

    <article class="add-income animate">
        <div class="modal" id="id01">
            <form id="addIncomeForm" class="modal-content section-container">
                <div class="close-modal">
                    <button id="close-modal-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="title-h2">
                    <h2>Add Income</h2>
                </div>
                <div class="form-container">

                    <div><p class="error error-amount"></p></div>

                    <div class="input-container">
                        <label for="amount"></label>
                        <i class="fa-solid fa-dollar-sign icon"></i>
                        <input type="number" id = "input-number" step="0.01" placeholder="Please Enter Amount" name="amount" >
                    </div>

                    <div><p class="error error-transaction-date"></p></div>
                    <div class="input-container">
                        <i class="fa-solid fa-calendar-days icon"></i>
                        <input type="date" id="transaction-date" placeholder="Please Enter Date" name="transaction-date">
                    </div>

                    <div><p class="error error-comment"></p></div>
                    <div class="comment">
                        <div class="question">
                            <label>Do you want to add a comment?</label>
                        </div>
                        <div class="anwser">
                            <input type="radio" id="commentYes" name="addComment" value="yes">
                            <label for="commentYes">Yes</label>
                            <input type="radio" id="commentNo" name="addComment" value="no" checked>
                            <label for="commentNo">No</label>
                        </div>
                    </div>

                    <div class="input-container" id="comment-section">
                        <i class="fa-solid fa-comment icon"></i>
                        <input type="text" placeholder="Comment" name="comment">
                    </div>


                </div>
                <input class="btn" id="submit-income" type="submit" value="Submit">
                <div class="message-php" id="form-message"></div>
            </form>
        </div>
    </article>


    

    <?php include $this->resolve('partials/_footer.php'); ?>

    <script src="https://kit.fontawesome.com/dbe3cc6cfd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="" src="/js/index/links.js"></script>
    <script type="module" src="/js/addIncome.js"></script>

</body>

</html>