<?php require "includes/header.php"  ; ?>

<?php require "includes/form.php"  ; ?>

<div class="container">
<div class="row mt-5" >
<h2>Contact</h2>

<?php if ($sent)  : ?>
      <p>Message sent.</p>
      <?php else : ?>

<?php endif  ; ?>

<form action="" method="POST" id="formContact">

      <?php if (!empty($errors))  : ?>
            <ul>
                  <?php foreach ($errors as $error)  : ?>
                        <li><?php echo $error  ; ?></li>
                  <?php endforeach  ; ?>      
            </ul>
      <?php endif  ; ?>      

      <div class="form-group mt-5">
      <label for="firstname">Firstname</label>
      <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname)?>" >
      </div>

      <div class="form-group mt-5 mb-5">
      <label for="email">Email</label>
      <input  class="form-control" type="email" name="email" id="email" value="<?php echo htmlspecialchars($email)?>">
      </div>

      <button class="btn btn-primary">Send</button>

</form>
</div>
</div>
<?php require "includes/footer.php"  ; ?>