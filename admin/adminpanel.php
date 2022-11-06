<!DOCTYPE html>
<html>

<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/adminpanel.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <section>
    <div class="sidebar">
      <a href="index.php">
        <h1 class="logo">ThriftBooth</h1>
      </a>

      <ul class="nav">
        <li><a href="adminpanel.php"><i class="fa fa-windows"></i> Dashboard</a></li>
        <li class=""><a href="#"><i class="fa fa-shopping-bag"></i> Orders</a></li>
        <li><a href="add-user.php"><i class="fa fa-plus"></i> Add User</a></li>
        <li><a href="manage-users.php"><i class="fa fa-user"></i> Manage Users</a></li>
        <li><a href="add-product.php"><i class="fa fa-plus"></i> Add products</a></li>
        <li><a href="manage-products.php"><i class="fa fa-cube"></i> Manage Product</a></li>
        <li class=""><a href="add-category.php"><i class="fa fa-plus"></i> Add Category</a></li>
        <li class=""><a href="manage-categories.php"><i class="fa fa-cube"></i> Manage Categories</a></li>
        <li><a href="#"><i class="fa fa-pie-chart"></i> Statistic</a></li>
        <li><a href="#"><i class="fa fa-tag"></i> Offer</a></li>

      </ul>


    </div>
    <div class="main">

      <div class="head-section">
        <div class="col-6">
          <h2>Order</h2>
          <p>30 orders found</p>
        </div>

        <div class="col-6" style="text-align: right;">
          <i class="fa fa-bell-o hicon"></i>
          <input type="text" class="search">
          <i class="fa fa-search hicon sicon"></i>

          <img src="image/user.png" class="user">

          <div class="profile-div">
            <p><i class="fa fa-user"></i> Profile</p>
            <p><i class="fa fa-cog"></i> Settings</p>
            <p><i class="fa fa-power-off"></i> Log Out</p>
          </div>

          <div class="notification-div">
            <p>Success!Your registration is now complete!</p>
            <p>Here's some information you may find useful!</p>
          </div>

        </div>

        <div class="clearfix"></div>
      </div>

      <br><br>
      <div class="content">
        <p>All orders</p><br><br>


        <table>

          <thead>
            <tr>
              <th scope="col" width="50px">ID</th>
              <th scope="col" width="100px">Name</th>
              <th scope="col" width="290px">Address</th>
              <th scope="col">Date</th>
              <th scope="col">Price</th>
              <th scope="col">Status</th>
              <th scope="col" width="70px">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-label="Account">#3412</td>
              <td data-label="Due Date"><img src="image/user.png" class="tab-img">Manoj</td>
              <td data-label="Amount">Lorem ispum dummy text industry.</td>
              <td data-label="Period">03/01/2022</td>
              <td data-label="Due Date">$64.00</td>
              <td data-label="Amount" style="position: relative;"><span class="pe"></span>Pending</td>
              <td data-label="Period"><i class="fa fa-gear ticon"></i>

                <i class="fa fa-angle-down ticon"></i>
              </td>
            </tr>


          </tbody>
        </table>
      </div>



    </div>
  </section>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".user").click(function() {
        $(".profile-div").toggle(1000);
      });
      $(".hicon:nth-child(1)").click(function() {
        $(".notification-div").toggle(1000);
      });
      $(".sicon").click(function() {
        $(".search").toggle(1000);
      });
    });
  </script>

  <script type="text/javascript">
    $('li').click(function() {
      $('li').removeClass("active");
      $(this).addClass("active");
    });
  </script>
</body>

</html>