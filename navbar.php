<nav id = "navbar-container" class="navbar navbar-inverse navbar-fixed-top">
  <table id = "table-view" width = "100%">
    <tr>
      <div class="container">
        <td class="navbar-item-containers" width="5%">
            <form action="home.php">
              <button id="nav-button1" name="home-button" type="submit" class="btn nav-btn"></button>
            </form>
        </td>
        <td class="navbar-item-containers" width="5%">
          <form action="profile.php">
            <button id="nav-button2" name="profile-button" type="submit" class="btn nav-btn"></button>
          </form>
        </td>
        <td class="navbar-item-containers" width="5%">
          <form action="messages.php">
            <button id="nav-button3" name="messages-button" type="submit" class="btn nav-btn"></button>
          </form>
        </td>
        <td class="navbar-item-containers" width="75%">
            <form action="search.php">
                <input id="search-bar" class="form-control" type="text" name="search-query" placeholder="Search..."> 
        </td>
        <td class="navbar-item-containers" width="5%">
                <button id="nav-button4" name="search-init" type="submit" class="btn nav-btn"></button>
                <!-- <a href="http://mizseng.centralus.cloudapp.azure.com/index.php"><font size="2">Log Out</font></a> -->
          </form>
        </td>
        <td class="navbar-item-containers" width="5%">
          <form action="/controllers/logout-controller.php">
            <button id="nav-button5" name="logout-button" type="submit" class="btn nav-btn"></button>
          </form>
        </td>
      </div>
    </tr>
  </table>
</nav>