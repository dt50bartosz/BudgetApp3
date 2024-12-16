<?php include 'partials/_header.php'; ?>


<article class="signup-form animate">
    <div class="modal" id="id02">
        <form method="post" id="newuser" class="modal-content section-container">
           

            <div class="img-container">
                <img class="img-business-man"
                    src="/assets/img/business-man-cartoon-character-in-formal-suit-vector-22952852.jpg"
                    alt="business-man-cartoon-character-in-formal-suit">
            </div>
            <div class="text-container">
                <h2>Join our community and take charge of your financial future</h2>
            </div>

            <div class="error-message">
                    <?php if (isset($errors['username'])): ?>
                        <p class="message"><?php echo htmlspecialchars($errors['username'][0]); ?></p>
                    <?php endif; ?>
                </div>

            <div class="form-container signup">
                <!-- Username -->
                <div class="input-container">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" name="username" placeholder="Username"
                        value="<?php echo isset($data['username']) ? htmlspecialchars($data['username']) : ''; ?>">
                </div>


                <div class="error-message">
                    <?php if (isset($errors['email'])): ?>
                        <p class="message"><?php echo htmlspecialchars($errors['email'][0]); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div class="input-container">
                    <i class="fa-solid fa-envelope icon"></i>
                    <input type="text" name="email" placeholder="Email"
                        value="<?php echo isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>">
                </div>

                   <!-- Password -->
                <div class="error-message">
                    <?php if (isset($errors['password'])): ?>
                        <p class="message"><?php echo htmlspecialchars($errors['password'][0]); ?></p>
                    <?php endif; ?>
                </div>             
                <div class="input-container">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>


                <div class="create-newaccount">
                    <button class="btn" id="create-newaccount-btn" type="submit">Sign in</button>
                    
                </div>

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