<?php include 'partials/_header.php'; ?>



<article class="login-form animate">

    <div class="modal" id="id01">
        <form id="login" class="modal-content section-container" method="post">
            
           

        <div class="img-container">
                <img src="/assets/img/pobrane.png" alt="man standing next to safe full of money, carton">
            </div>
            <div class="text-container">
                <h2><span>$</span> Start Saving with BudgetEase <span>$</span></h2>
            </div>
            <div class="form-container">

                <div class="error-message">
                    <?php if (isset($errors) && is_array($errors) && array_key_exists('username', $errors)): ?>
                        <p class="message"><?php echo e($errors['username'][0]); ?></p>
                    <?php endif; ?>

                </div>


                <div class="input-container">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>


                <div class="error-message">
                    <?php if (isset($errors) && is_array($errors) && array_key_exists('password', $errors)): ?>
                        <p class="message"><?php echo e($errors['password'][0]); ?></p>
                    <?php endif; ?>
                </div>


                <div class="input-container">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>


                <div class="login-newAccount">
                    <button class="btn" id="login-btn">Login</button>
                    <a id="open-form-new-account">Create New Account</a>
                </div>
            </div>

        </form>
    </div>
</article>


<?php include 'partials/_footer.php'; ?>





<script src="https://kit.fontawesome.com/dbe3cc6cfd.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module" src="/js/index.js"></script>

</body>

</html>