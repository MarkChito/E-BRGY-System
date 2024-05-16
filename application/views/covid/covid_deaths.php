<div class="row">
    <div class="col-md-9">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title"><?= $title ?></h4>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="deathTable">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Age</th>
                            <th>Civil Status</th>
                            <th>Gender</th>
                            <th>Alived/Deceased</th>
                            <th>Covid Status</th>
                            <th>Details</th>
                            <th>Remarks</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Fullname</th>
                            <th>Age</th>
                            <th>Civil Status</th>
                            <th>Gender</th>
                            <th>Alived/Deceased</th>
                            <th>Covid Status</th>
                            <th>Details</th>
                            <th>Remarks</th>
                            <th>Address</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row colorbox-group-widget">
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media" style="background-color:black">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format($resident) ?>
                            <span class="pull-right"><i class="fa fa-frown-o"></i></span></h3>
                            <p class="info-text font-16 text-white">Total Covid19 Deaths</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
