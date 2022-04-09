<?php include_once 'aheader.php'; ?>

<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 88vh">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">Welcome Administrator</h5>
    <div class="container-fluid">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
              <a href="addemp.php" class="text-dark">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Employee</span>
                <span class="info-box-number">
                 
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
              </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <a href="departments.php" class="text-dark">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Departments</span>
                <span class="info-box-number">
                    <?= countrecords("departments") ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <a href="staffs.php" class="text-dark">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Employees</span>
                <span class="info-box-number">
                    <?= countrecords("emps") ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
              <a href="attendance.php" class="text-dark">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-secret"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Attendance</span>
                <span class="info-box-number">
                   
                  </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
                  </a>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
              <a href="leaves.php" class="text-dark">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-secret"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Leaves</span>
                <span class="info-box-number">
                   
                  </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
                  </a>
          </div>

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <a href="attendancereport.php" class="text-dark">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Attendance Report</span>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
              </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
            </div>
        </section>
    </div>
        </div>
    </div>
</div>
<?php include_once 'afooter.php'; ?>
