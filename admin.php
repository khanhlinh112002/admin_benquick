<?php
session_start();
include 'db_connect.php';
include 'admin_class.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="adminStyle.css">
    <title>Admin</title>
    <link rel="icon" style="color:#fff" href="https://cdn1.iconfinder.com/data/icons/users-pack-mino-io/24/user-3-settings-512.png">
    <link href="./css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .column {
            float: left;
            width: 100%;
            padding: 10px;
        }

        .column img,
        .column video {
            margin-top: 12px;
            max-width: 100px;
            max-height: 20vh;
            background-size: cover;
        }

        .c-row {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
        }

        .badge-primary {
            color: #fff;
            background-color: #007bff;
        }
    </style>


</head>


<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus bx-tada'></i>
            <span class="logo_name">Photo</span>
        </div>
        <ul class="nav-links">
            <li>
                <!-- <a href="#" class="active"> -->
                <a href="#" onclick="dashboard()">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="userManager()">
                    <i class='bx bx-user-circle'></i>
                    <span class="links_name">Acount user</span>
                </a>

            </li>
            <li>
                <a href="#" onclick="postManager()">
                    <i class='bx bx-photo-album'></i>
                    <span class="links_name">Post</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="contactManager()">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Contact</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Messenger</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Ben Quick</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link " id="login" href="#" role="button" data-bs-toggle="modal" data-bs-target="#c__login"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" onclick="logout()">Logout</a> -->
                    </div>
                </li>
            </ul>
            </div>
        </nav>
        </ul>
        </div>
        <div class="col-10">
            <div class="tab-pane" id="product">
                <div>
                    <h3 class="display-4">Post</h3>
                    <button id="create" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-right: 10%">
                        <a href='#' ;><i class=" fas fa-plus mr-2"> Add post</i></a>
                    </button>
                </div>
                <hr style="border: 1px solid rgb(0, 0, 0); ">
                <div class="bookroom">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tittle</th>
                                <th scope="col">Content</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM post;";
                            $res = mysqli_query($conn, $sql);
                            if ($res) {
                                while ($row = mysqli_fetch_assoc($res)) {

                            ?>
                                    <tr>
                                        <td><?php echo $row['idPost'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['descriptions'] ?></td>
                                        <td><?php echo $row['location'] ?></td>
                                        <td>
                                            <button type="button" id="<?php echo $row["idPost"] ?>" class="btn btn-info btn-xs view_datapost" data-bs-toggle="modal">View
                                                detail</button>
                                            <button class="btn btn-info"><a href="deletePost.php?idPost=<?php echo $row["idPost"]; ?>">Delete</a></button>

                                    <?php
                                }
                            }
                                    ?>
                                        </td>
                                    </tr>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="tab-pane active" id="user">
                <h3 class="display-4">Accoutn user</h3>
                <hr style="border: 1px solid rgb(0, 0, 0); ">
                <div class="customer">
                <div class="customer">
                    <!--=============== copy paste lại cả thẻ table ====================-->
                    <table class="table table-striped table-hover mb-0">


                        <thead class="table-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Phonenumber</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "select * from users";
                                $results = $conn->query($sql);
                                while ($row = $results->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row["idUser"] ?></td>
                                <td><?php echo $row["username"] ?></td>
                                <td><?php echo $row["phonenumber"] ?></td>
                                <td>
                                    <button type="button" id="<?php echo $row["idUser"]?>"
                                        class="btn btn-info btn-xs view_dataaccount" data-bs-toggle="modal">View
                                        detail</button>
                                </td>

                            </tr>

                            <?php }
                                ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane active" id="bill">
                <h3 class="display-4">Contact</h3>
                <hr style="border: 1px solid rgb(0, 0, 0); ">
                <div>
                <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $selectContact = "select * from contact";
                                $results = $conn->query($selectContact);
                                while ($row = $results->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $row["idContact"] ?></td>
                                <td><?php echo $row["fullname"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><button type="button" id="<?php echo $row["idContact"]?>"
                                        class="btn btn-info btn-xs view_datacontact" data-bs-toggle="modal">View
                                        detail</button></td>
                            </tr>
                            <?php }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="home-content">
            <div class="overview-boxes">
                <div class="box" onclick="postManager()">
                    <div class="right-side" onclick="postManager()">
                        <div class="box-topic" onclick="postManager()">Post</div>
                        <div id="totalBill" class="number"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt' onclick="postManager()"></i>
                            <span id="updateTotalBill" class="text"></span>
                        </div>
                    </div>
                    <img class="img" src="./Img/bill.png" alt="">
                    <!-- <i class='bx bx-cart-alt cart'></i> -->
                </div>
                <div class="box" onclick="userManager()">
                    <div class="right-side" onclick="userManager()">
                        <div class="box-topic" onclick="userManager()">Account user</div>
                        <div id="totalUsers" class="number"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt' onclick="userManager()"></i>
                            <span id="updateTotalUser" class="text"></span>
                        </div>
                    </div>
                    <img class="img" src="./Img/user.png" alt="">
                    <!-- <i class='bx bxs-cart-add cart two'></i> -->
                </div>
                <div class="box" onclick="contactManager() ">
                    <div class="right-side" onclick="contactManager() ">
                        <div class="box-topic" onclick="contactManager()">Contact</div>
                        <div id="turnover" class="number"></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt' onclick="contactManager()"></i>
                            <span id="updateTotalTurnover" class="text"></span>
                        </div>
                    </div>
                    <img class="img" src="./Img/budget.png" alt="">
                    <!-- <i class='bx bx-cart cart three'></i> -->
                </div>


            </div>

        </div>
        <!-- ---------------------------------modal---------------------------------------------------------- -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-row" id="manage_post" method="POST">
                            <div class="col-12 mt-3">
                                <input class="form-control" type="text" name="title" placeholder="Title">
                            </div>
                            <div class="col-12 mt-3">
                                <input class="form-control" type="text" name="location" placeholder="Location">
                            </div>
                            <div class="col-12 mt-3">
                                <textarea class="form-control" rows="5" type="text" name="content" placeholder="Content"></textarea>
                            </div>
                            <div class="col-12 mt-3">

                                <div class="imgF" style="display: none " id="img-clone">
                                    <div class="col-12 mt-3">
                                        <input class="form-control" type="text" name="namePhoto[]" placeholder="Name of photo">
                                    </div>
                                    <label for="category">Choose the type of photo:</label>
                                    <select id="category" name="category[]">
                                        <option value="1">Portrait</option>
                                        <option value="2">Landscape</option>
                                        <option value="3">City</option>
                                        <option value="4">Contryside</option>
                                        <option value="5">Street</option>
                                    </select>
                                    <br>
                                    <span class="rem badge badge-primary" onclick="rem_func($(this))" style="cursor: pointer;"><i class="fa fa-times"></i></span>
                                </div>

                                <!-- <form action="" class="form-row"> -->
                                <div id="file-display" class="column">
                                </div>
                                <input type="file" name="file[]" multiple="multiple" onchange="" id="postF" onchange="displayUpload(this)" class="d-none" accept="image/*">
                                <div class="card solid">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small>Add to Your Post</small>
                                            <span>
                                                <label for="postF" style="cursor: pointer;"><a class="rounded-circle"><i class="fas fa-images"></i></a></label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- </form> -->

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button name='post' type="submit" class="btn btn-primary" form="manage_post">Post </button>
                        <button type="button" class="btn btn-danger" onclick="reset()" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL BOOKSTRAP -->
        <div class="modal fade" id="c__login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <fieldset>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkRemember">
                                            <label class="form-check-label" for="checkRemember">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--===================== Thêm cả div modal  account -->
        <div id="dataModalpost" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Post Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="post_detail">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="dataModaldeletePost" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="confirmdeletePost">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
                <!--==============Thêm cả div  Modal contact -->
                <div id="dataModalcontact" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contact Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="contact_detail">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--===================== Thêm cả div modal  account -->
        <div id="dataModalaccount" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Account Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="account_detail">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="adminjs.js"></script>
</body>

</html>