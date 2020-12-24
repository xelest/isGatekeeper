<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="account.css">-->
  <!--=============HEADERS========== -->
  <?php include ('headerinclude.php'); ?>
  <style type="text/css">
      .table{
          background-color: white;
          font-family: 'Rubik', sans-serif;
          padding: 20px 0 0;
          box-shadow: 1px 1px 15px 0 rgba(0,0,0,0.2);
          position: relative;

      }

      #table tr.header, #table tr:hover{
          background-color: gray;
      }
      .form-horizontal{
          background-color: white;
          font-family: 'Rubik', sans-serif;
          padding: 20px 0 0;
          box-shadow: 1px 1px 15px 0 rgba(0,0,0,0.2);
          position: relative;
      }
      .form-horizontal .heading{
          color: #666;
          font-size: 35px;
          text-align: center;
          margin: 0 0 30px 0;
      }
      .form-horizontal .form-group{
          width: 80%;
          margin: 0 auto 10px;
          position: relative;
      }
      .form-horizontal .form-group>i{
          color: rgba(0,0,0,0.2);
          font-size: 25px;
          position: absolute;
          left: 8px;
          top: 7px;
      }
      .form-horizontal .form-control{
          color: #3FA9F2;
          font-size: 14px;
          height: 42px;
          padding: 6px 8px 6px 40px;
          box-shadow: none;
          border-radius: 0;
      }
      .form-control::placeholder{
          color: rgba(0,0,0,0.2);
          font-size: 15px;
          text-transform: uppercase;
      }
      .form-horizontal .form-control:focus{
          box-shadow: none;
          border-color: #3FA9F2;
      }


      .form-horizontal .btn{
          color: #fff;
          background-color: #3FA9F2;
          font-size: 16px;
          padding: 7px 30px;
          margin: 0 0 10px;
          border-radius: 25px;
          border: 2px solid transparent;
          display: inline-block;
          float: left;
          transition: all 0.5s;
      }

      .form-horizontal .btn:focus,
      .form-horizontal .btn:hover{
          color: #3FA9F2;
          background-color: #fff;
          border: 2px solid #3FA9F2;
      }
      @media screen and (max-width:576px) {
          .form-horizontal .form-group .btn,
          .form-horizontal .form-group {
              text-align: center;
              display: block;
              float: none;
              margin: 0 auto 15px;
          }
      }
      .table{
          width: 100%;
          margin: 0 auto 10px;
          position: relative;
      }
  </style>

</head>
<body>
<!--=============Top nav========== -->
<?php include('nav_top.php'); ?>
<!--=============Sidenav========== -->
<?php include('nav_side.php'); ?>

<div class="main-content">
<h1>ACCOUNTS</h1>
<p>This page is for account creation for system users and mobile users and password reset requests. </p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#create">Create</a></li>
    <li><a data-toggle="tab" href="#update">Update</a></li>
    <li><a data-toggle="tab" href="#change">Change Password</a></li>
  </ul>

  <div class="tab-content">
      <div id="create" class="tab-pane fade in active">
          <form  method="post" class="form-horizontal">
           <div class="heading">Register User</div>
              <div class="form-group">
                  <i class="fa fa-id-card-o"></i><input class="form-control" type="text" placeholder="ID Number">
              </div>
              <div class="form-group">
                  <i class="fa fa-user"></i><input class="form-control" type="text" placeholder="Username">
              </div>
              <div class="form-group">
                  <i class="fa fa-lock"></i><input class="form-control" type="password" placeholder="Password">
              </div>
              <div class="form-group">
                  <i class="fa fa-check-circle-o"></i><input class="form-control" type="password" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary  btn-block" >Submit</button>
                  <button type="reset" class="btn btn-primary  btn-block ">Clear</button>
              </div>
              
              <br>
          </form>
      </div>
 

      <div id="update" class="tab-pane fade">
        <form  method="post" class="form-horizontal">
           <div class="heading">Update User Account</div>
              <div class="form-group">
                  <i class="fa fa-search"></i><input class="form-control" type="text" placeholder="Search Username">
                  <br>
                  <button type="search" class="btn btn-primary  btn-block" >Search</button>
              </div>
              <br>
        </form>
        <table class="table table-hover">
              <thead>
                  <tr>
                      
                      <th>Username</th>
                      <th>Password</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      
                      <td>Mark</td>
                      <td>wpjekwoj</td>
                      <td>
                        <form>
                          <select class="form-control ">
                            <option>Activate</option>
                            <option>Deactivate</option>
                          </select>
                        </form>
                          
                      </td>
                  </tr>
                  <tr>
                      
                      <td>Jacob</td>
                      <td>hfudhjsbn</td>
                      <td>
                          <form>
                          <select class="form-control ">
                            <option>Activate</option>
                            <option>Deactivate</option>
                          </select>
                        </form>
                      </td>
                  </tr>
                  <tr>
                     
                      <td>Larry</td>
                      <td>vbeeu876e8g</td>
                      <td>
                          <form>
                          <select class="form-control ">
                            <option>Activate</option>
                            <option>Deactivate</option>
                          </select>
                        </form>
                      </td>
                  </tr>
              </tbody>
        </table>
      </div>

      <div id="change" class="tab-pane fade">
        <form  method="post" class="form-horizontal">
           <div class="heading">Change User Password</div>
              <div class="form-group">
                  <i class="fa fa-search"></i><input class="form-control" type="text" placeholder="Search Username">
                  <br>
                  <button type="search" class="btn btn-primary  btn-block" >Search</button>
              </div>
              <div class="form-group">
                  <i class="fa fa-id-card-o"></i><input class="form-control" type="text" placeholder="ID Number">
              </div>
              <div class="form-group">
                  <i class="fa fa-unlock-alt"></i><input class="form-control" type="password" placeholder="Old Password">
              </div>
              <div class="form-group">
                  <i class="fa fa-lock"></i><input class="form-control" type="password" placeholder="New Password">
              </div>
              <div class="form-group">
                  <i class="fa fa-check-circle-o"></i><input class="form-control" type="password" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary  btn-block" >Submit</button>
                  <button type="reset" class="btn btn-primary  btn-block ">Clear</button>
              </div>
              
              <br>
          </form>
      </div>
</div>
<!--=============MODAL========== -->
<?php include('modal_logout.php'); ?>
<!--================= this script is for the collapsable=============-->
<script src="nav.js"></script>

</body>
</html>