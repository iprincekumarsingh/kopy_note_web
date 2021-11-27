<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <span class="navbar-brand mb-0 h1 kp_logo_text">KOPY NOTE </span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        </li>
        <li class="nav-item">
        </li>
       
        
      </ul>
      <a class="ac_name nav-link active" aria-current="page" href="index.php">Home</a>

      <a class="ac_name nav-link" onclick="create_note()" id="create_note_click" href="#">Create Note</a>
  
      <a disabled class="ac_name nav-link" href="#"><?php
       echo $_SESSION['name'];
      ?></a>

        <!-- <a class="nav-link btn btn-outline-danger" href="../logout.php">Logout</a> -->
      </form>
    </div>
  </div>
</nav>