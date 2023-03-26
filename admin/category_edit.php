<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start 
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        Spinner End -->
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
if(!isset ($_GET['category_id'])|| $_GET['category_id']==null){
    echo"<script>window.location = 'category.php'</script?";
}
else{
    $category_id = $_GET['category_id'];
}
    $get_category = $category -> get_category($category_id);
    if($get_category){
        $result = $get_category -> fetch_assoc();
    }
    ?>
<?php 
if($_SERVER['REQUEST_METHOD']=== 'POST'){
 $category_name = $_POST['category_name'];
 $update_category = $category -> update_category($category_name, $category_id );
}
 ?>

            <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Basic Form</h6>
                    <form action="" method="POST" name="category">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category name</label>
                            <input required  name ="category_name" type="text" class="form-control"  placeholder="category" 
                            value="<?php echo $result['category_name'] ?>">
                        </div>
                        <button  type="submit" class="btn btn-primary">Save update</button>
                    </form>
            </div>
            </div>
            </div>
            </div>
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