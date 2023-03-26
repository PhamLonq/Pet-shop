<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
         <!-- Spinner End -->
        <?php include_once('database.php');?>
        <?php include 'class/category-class.php';?>
        <!-- Sidebar Start -->
        <?php include_once('sidebar.php'); ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">

        <!-- Navbar Start -->
        <?php include 'nav-bar.php'; ?>
        <!-- Navbar End -->

        <!-- Form Start -->
 <?php 
$category = new category;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
 $category_name = $_POST['category_name'];
 $insert_category = $category -> insert_category($category_name);
}

$category = new category;
$show_category = $category->show_category();
 ?>
            <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Basic Form</h6>
                    <form action="" method="POST" name="category">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category name</label>
                            <input name ="category_name" type="text" class="form-control"  placeholder="category">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
            </div>
            </div>
            </div>
            </div>
                        <!-- Table Start -->
                        <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Category Table</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <?php 
                                    if($show_category){
                                        while($result = $show_category->fetch_assoc()){                         
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $result['category_id'] ?></td>
                                        <td><?php echo $result['category_name'] ?></td>
                                        <td><a href="category_edit.php?category_id=<?php echo $result['category_id']?>"><button>edit</button></a></td>
                                        <td><a href="category_delete.php?category_id=<?php echo $result['category_id']?>"><button>delete</button></a></td>
                                    </tr>

                                    <?php 
                                    }
                                }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- Table End -->
            <!-- Form End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>