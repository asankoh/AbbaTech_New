<?= $this->section("title") ?><?= $blog["title"] ?> 
<?= $this->endSection() ?>

<?= $this->include("Layout/default.php") ?>

<div class="container" style="max-width:900px;">
    <h1 class="mt-5"><?= $blog["title"] ?> </h1>
    <img style="width:100%;"src="<?= $blog["image"] ?>" alt="">
    <p class="my-3"> Written By: <b> <?= $blog["author"] ?></b> | <?= $blog["date"] ?></p>

    <div class="blog-content" style="font-family:Montserrat; line-height:2; padding-bottom:5rem;">
    <?= $styledContent ?>

      <!-- <div class="col-md-8">
        <h2 class="mb-3">Comments: </h2>
        <form>
          <div class="form-group">
            <textarea class="form-control" id="comment" rows="3" placeholder="Enter your comment"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        <hr>
        <div class="comment-box">
          <h5>User1</h5>
          <p>This is a great comment!</p>
        </div>
      </div> -->

</div>