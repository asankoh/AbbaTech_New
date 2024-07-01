<?= $this->section("title") ?><?= $blog["title"] ?> 
<?= $this->endSection() ?>

<?= $this->include("Layout/default.php") ?>

<div class="container" style="max-width:900px;">
    <h1 class="mt-5"><?= $blog["title"] ?> </h1>
    <img style="width:100%;"src="<?= $blog["image"] ?>" alt="">
    <p class="my-3"> Written By: <b> <?= $blog["author"] ?></b> | <?= $blog["date"] ?></p>

    <div class="blog-content" style="font-family:Montserrat; line-height:2">
    <?= $styledContent ?>

      <div class="col-md-8">
        <h2 class="mb-3">Comments: </h2>
        <!-- Comment Form -->
    <form id="commentForm">
    <div class="form-group">
        <label for="comment">Enter your comment:</label>
        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Type your comment here..." required></textarea>
    </div>
    <input type="hidden" id="blogId" name="blog_id" value="<?= $blog['id'] ?>">
    <button type="button" class="btn btn-primary mt-3" onclick="submitComment()">Submit</button>
</form>

<div id="commentSection" class="comment-box mt-4">
    <hr>
    <ul>
        <?php if (!empty($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="container">
                    <img src="/img/default_profile.png" style="width:50px; height:50px; border-radius:50%;" alt="profile image">
                    <h5><?= lang('Auth.username') ?></h5>
                    <li><?= $comment['comment'] ?></li>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <li>No comments yet.</li>
        <?php endif; ?>
    </ul>
</div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>  
    function submitComment() {
      if(isLoggedIn == 1){
        // Get comment and blog_id values from form
        var comment = $('#comment').val();
        var blogId = $('#blogId').val();
        console.log(isLoggedIn);
        // AJAX request to submit comment data
        $.ajax({
            type: 'POST',
            url: '/comment/create',
            data: {
                comment: comment,
                blog_id: blogId
            },
            success: function(response) {
                // Handle success response (e.g., update comment section)
                $('#comment').val('');
                if ($('#commentSection ul li').length == 1 && $('#commentSection ul li').text() == 'No comments yet.') {
                $('#commentSection ul li').remove();
              }
                $('#commentSection ul').append('<li>' + response.comment + '</li>');   
            },
            error: function(xhr, status, error) {
                // Handle error (optional)
                console.error(error);
            }
        });
      }else{
        Swal.fire({
        icon: 'error',
        title: 'Access Limit Error',
        text: 'Please Login to access page',
      }).then(function() {
        window.location.href = '/login';
    });
      }
    }
</script>



