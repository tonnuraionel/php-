
    <h1 class="h2 text-dark mt-4 mb-4">会社情報の登録</h1>
    <form action="create.php" method="POST">
      <?php if(count($errors)) : ?>
        <ul class="text-danger">
          <?php foreach($errors as $error) : ?>
            <li><?php echo $error ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif; ?>
      <div class="form-group">
        <label for="name">会社名</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $company['name'] ?>">
      </div>
      <div class="form-group">
        <label for="establishment">設立日</label>
        <input type="date" id="establishment" name="establishment" class="form-control" value="<?php echo $company['establishment'] ?>">
      </div>
      <div class="form-group">
        <label for="founder">代表者名</label>
        <input type="text" id="founder" name="founder" class="form-control" value="<?php echo $company['founder'] ?>">
      </div>
      <div>
        <button type="submit">登録する</button>
      </div>
    </form>
