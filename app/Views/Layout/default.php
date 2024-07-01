  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <link rel="website icon" style="width:16px; height:16px;" href="/img/favicon.ico">

    <title><?= $this->renderSection('title') ?></title>
    <style>
      body{
        background-color: #f1f1f1;
        /* font-family: Poppins;  */
      }

      h2{
        /* padding-top: 75px; */
        padding: 75px 0 20px 0;
        text-decoration: underline;
      }

      #commentSection ul {
    list-style-type: none; /* Remove bullet points */
      }
    </style>
    <nav class="navbar navbar-expand-md">
        <div class="navbar-brand">
          <a class="navbar-brand ps-5"href="/">
            <img src="/img/Blog_Logo.png" alt="Logo">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align center" id="main-nav">
        <ul class="navbar-nav">
          <li class="nav-item pe-5">
          <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item pe-5">
          <a class="nav-link" href="/blogs">Blogs</a>
          </li>
          <li class="nav-item pe-5">
          <a class="nav-link" href="/about">About</a>  
          </li>
          <!-- <li class="nav-item pe-5">
          <a class="nav-link" href="/contact">Contact</a> 
          </li>--> 
          <?php if(auth()->loggedIn()): ?>
              <a class="nav-link pe-5" href="<?= url_to("logout") ?>">Logout</a>
              <script>
                var isLoggedIn = 1;
              </script>
          <?php else: ?>
              <a class="nav-link pe-5" href="<?= url_to("login") ?>">Login</a>
              <script>
                var isLoggedIn = 0;
              </script>
          <?php endif; ?>
          <!-- <input type="text" size="20" /> -->
        </ul>
        </div>
    </nav>

    <?= $this->renderSection('main') ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    // jQuery for Bootstrap navbar toggle
  $(document).ready(function() {
    // Toggle the navbar when the hamburger icon is clicked
    $('.navbar-toggler').on('click', function() {
      $(this).toggleClass('active');
    });
  });

  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })
</script>