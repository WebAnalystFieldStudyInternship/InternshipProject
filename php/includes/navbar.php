<!-- Navbar -->
    <div class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#">DROP Logo</a>
        </div>
        <div class="navbar-collapse collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
              <li>
                <div class="navbar-form">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal">Basic Usage</button>
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <form action="php/includes/login.php" method="post" class="navbar-form">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default">Admin Login</button>
                      <input type="hidden" name="action" value="login">
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="password">
                  </div>
                </form>
              </li>
            </ul>
        </div>  
      </div>
    </div>