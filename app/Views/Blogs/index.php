<?= $this->section("title") ?>AbbaTech Blogs 
<?= $this->endSection() ?>
<?= $this->include("Layout/default.php") ?>

<style>
      .card:hover{
      box-shadow: #4E6AB6 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
      transition: box-shadow 1.0s ease-in-out;
      }
    </style>
    
<div class="container pt-5">
    <div class="justify-content-center text-center">
        <h3 class="display-4">All Blogs</h3>
        <p class="lead-2"></p>
    </div>
</div>
 
<div style="max-width: 1450px; margin:auto; padding-bottom: 75px;" class="row align-items-center justify-content-center">
      <?php foreach($blogs as $blog): ?>
          <div class="col-lg-4 pt-5 ps-4">
            <a style="text-decoration: none;" href="<?= site_url('/blogs/'. $blog["id"]) ?>">
            <div class="card border-0" style="max-width: 25rem; min-height:25rem;">
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