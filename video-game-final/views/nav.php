<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href=".">VGList</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!-- Home in this case, means showing all games -->
        <a class="nav-link active" aria-current="page" href="./?action=list">Show All Games</a>

        <!-- Add a game -->
        <a class="nav-link" aria-current="page" href="./?action=add">Add Game</a>
       
      </div>
    </div>
  </div>
</nav>
<!-- initially i was going to use this because i thought the GET action was really neat, but this project didn't really need a navbar -->