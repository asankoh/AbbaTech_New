<?= $this->section("title") ?>AbbaTech - Home 
<?= $this->endSection() ?>
<?= $this->include("Layout/default.php") ?>
   <style>
      .card:hover{
      box-shadow: #4E6AB6 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
      transition: box-shadow 1.0s ease-in-out;
      }
    </style>

<div class="container-fluid">
      <div class="row">
        <div style="padding-top: 75px;"class="col-lg-6 ps-5">
          <h3 class="display-3">Continue to Learn Code with Our Blog!</h3>
          <p class="lead mt-3">
            Starting off learning how to code can be stressful due to the vast amount of knowledge that you need. So, this blog is here to help anyone trying to learn code or even help developers learn something new!
          </p>
          <a href="/blogs">
            <button class="btn btn-outline-primary btn-lg mt-3">Read Blogs</button>
          </a>
        </div>

        <div class="col-6 d-none d-lg-block justify-content-end">
        <img class="img-fluid mt-3"src="/img/undraw_programming_re_kg9v.svg" alt="" />
        </div>
      </div>
    </div>

    <div class="h3" style="border-bottom: 2px solid black; padding:10px; max-width: 1450px; margin: 0 50px">Latest</div>
    
    <div style="max-width: 1450px; margin:auto; padding-bottom:75px;" class="row align-items-center justify-content-center">
      <?php foreach($featured_blog as $blog): ?>
          <div class="col-lg-4 pt-5 ps-4">
            <a style="text-decoration: none;" href="<?= site_url('/featured_blog/'. $blog["id"]) ?>">
            <div class="card border-0" style="max-width: 25rem;">
            <img src="<?= $blog["image"]?> " class="card-img-top" style="height: 200px;" alt="...">
            <div class="card-body" style="cursor:pointer; color:#373232;">
            <h5 class="card-title"> <?= $blog["title"] ?> </h5>
            <h6 class="card-subtitle mb-2" style="color: #4E6AB6;"> By: <?= $blog["author"] ?></h6>
            <p class="card-text"><?= $blog["description"] ?></p>
          </div>
        </a>
            </div>
          </div>
          <?php endforeach; ?>
</div>

