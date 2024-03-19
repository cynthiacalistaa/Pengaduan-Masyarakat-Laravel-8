<nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
           
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
               
                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">User Settings</p></a>
                  <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
                  <!-- <a href="register" class="dropdown-item py-1"><i class="ft-user-plus mr-2"></i><span>Register</span></a>
                  <a href="login" class="dropdown-item py-1"><i class="ft-log-in mr-2"></i><span>Login</span></a> -->
                  <a href="{{ route('profile.edit')}}" class="dropdown-item py-1"><i class="ft-clipboard mr-2"></i><span>Profile</span></a>
                    <div class="dropdown-divider"></div><a href="logout" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>