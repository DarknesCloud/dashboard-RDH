
      <!-- partial:../../partials/_navbar.html -->
      
      <!-- Codigo php header -->

      <?php include_once('./template/header.php') ?>

      <!-- Codigo php header -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
       
    <!-- *********************************************************************************************************************** -->

        <!-- Codigo php sidebar -->
        <?php include_once('./template/sidebar.php') ?>
        <!-- Codigo php sidebar -->

        <!-- *********************************************************************************************************************** -->


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h1>Configuracion</h1>
            <br/>

            <?php include_once('./conf_user/update_user.php') ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->

          <?php include_once('./template/footer.php'); ?>