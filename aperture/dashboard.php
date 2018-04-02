<?php include ('head.php'); ?>

<body>
  <header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header" style="padding-left: 50px;">
          <a href="" class="navbar-brand">
            <img src="assets/new-img/aphead.png" width="160">
          </a>
        </div>

        <div class="nav navbar-nav navbar-right" style="float: right;">
          <div class="col-md-12">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 50px;">
              <li style="margin-top: 6px; margin-right: -10px;">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" id="ddProfile">
                  <img src="assets/img/ui-danro.jpg" class="img-circle" width="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-left" name="ddProfile">
                  <li class="dropdown-header" style="padding-left: 8px;">Alex Alcantara</li>
                  <li style="padding-left: 8px;">
                    <a href="">Your Messages</a>
                  </li>
                  <li style="padding-left: 8px;">
                    <a href="">Your To-Do List</a>
                  </li>
                  <li class="divider"></li>
                  <li class="padding-left: 8px;">
                    <a href="">Settings</a>
                  </li>
                  <li class="padding-left: 8px;">
                    <a href="">Logout</a>
                  </li>
                </ul>
              </li>
              <li class="input-group" style="padding-top: 15px;">
                <form class="navbar-form">
                  <fieldset>
                    <input class="form-control" type="text" name="searchString" placeholder="Search">
                    <button type="submit" class="btn btn-default" style="height: 34px;">
                      <i class="fa fa-search"></i>
                    </button>
                  </fieldset>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="main-content" style="padding-top: 90px; margin-left: 62px;">
    <h2 style="color: #1d1d1d;">Product Maintenance</h2>
    <p style="margin-left: 10px;">This is where you can add, view, edit or delete a selected product.</p>
    <hr style="margin-right: 80px;">

    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <a href="" class="btn" data-toggle="modal" data-target="#addProduct">
              <span class="li_lab"></span>
              <h3>Add</h3>
            </a>
          </div>
          <p>Add new product</p>
          <!--MODAL -->
          <div id="addProduct" class="modal fade" tabindex="-1">
            <div class="modal-dialog cascading-modal" role="document">
              <div class="modal-content">
                <div class="modal-header primary-color white-text text-center">
                  <h4 class="modal-title  font-weight-bold">Add Product</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  </button>
                </div>


                <div class="modal-body">

                  <form method="POST" enctype="multipart/form-data">
                    <fieldset>
                      <div class="md-form">
                        <label data-error="wrong" data-success="right" for="name">
                          Product Name:</label>
                        <input type="text" name="name" class="form-control validate">
                        <!--name -->
                      </div>

                      <div class="md-form">
                        <label data-error="wrong" data-success="right" for="desc">
                          Product Description:</label>
                        <input type="text" name="desc" class="form-control validate">
                      </div>

                      <div class="md-form">
                        <label data-error="wrong" data-success="right" for="price">Price:</label>
                        <input type="number" name="price" class="form-control validate">
                      </div>

                      <div class="md-form">
                        <label data-error="wrong" data-success="right" for="stock">
                          In-stock:</label>
                        <input type="number" name="stock" class="form-control validate">
                      </div>

                      <div class="md-form">
                        <label data-error="wrong" data-success="right" for="image">
                          Upload Picture:</label>
                        <input type="file" name="image" class="form-control validate">
                      </div>

                      <div class="text-center mt-4">
                        <button class="btn btn-primary" type="submit" id="addCreate" name="addCreate" value="ADD">ADD</button>
                      </div>
                      <?php
                          
                            if (isset(($_POST["addCreate"]))) {
								              include ('select.php');
                              
                              $name=$_POST['name'];
                              $desc=$_POST['desc'];
                              $price=$_POST['price'];
                              $stock=$_POST['stock'];
                              $pic=addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
                              $error= mysqli_error($con);

                              if (empty($error)){
                                $_POST = array();
                                //TODO remove placeholder
                                $insert="INSERT INTO prod_tbl(name, proddesc, price, stock, pic) VALUES ('$name', '$desc', '$price', '$stock', '$pic')";
                                $q= mysqli_query($con, $insert) or die(mysqli_error($con));
                                

                                

                                $result= mysqli_query($con, $q);

                                if ($result) {
                                  echo "Succesfully Added!";
                                  mysqli_close();
                                }
                              } else echo "Failed :c " .mysqli_error($con);
                          } 
    
  

                          ?>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include ('connect.php'); ?>
  </section>

</body>

</html>