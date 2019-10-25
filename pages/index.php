<?php $page = "home"; ?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Dashboard</h2>
  </div>
</div>
<section class="no-padding-top no-padding-bottom">
  <div class="alert alert-dark alert-dismissible fade show" role="alert">
    Welcome <strong><?php echo $user['name']; ?>,</strong> have a nice day!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    <div class="row">
      <div class="col-md-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div><strong>New Clients</strong>
            </div>
            <div class="number dashtext-1">27</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-contract"></i></div><strong>New Projects</strong>
            </div>
            <div class="number dashtext-2">375</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>New Invoices</strong>
            </div>
            <div class="number dashtext-3">140</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "footer.php"; ?>