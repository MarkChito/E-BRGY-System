<div class="row">
    <div class="col-md-9">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title">Resident COVID19 Status</h4>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="covidTable">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Age</th>
                            <th>Civil Status</th>
                            <th>Gender</th>
                            <th>Alived/Deceased</th>
                            <th>Covid Status</th>
                            <th>Details</th>
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
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format(count($nega)) ?>
                            <span class="pull-right"><i class="icon-check"></i></span></h3>
                            <p class="info-text font-16 text-white">Negative</p>
                            <p class="info-ot font-13"><a  href="javascript:void(0)" id="allNega" class="text-white">All Negative Residents</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format(count($fully)) ?>
                            <span class="pull-right"><i class="fa fa-shield"></i></span></h3>
                            <p class="info-text font-16 text-white">Fully Vaccinated</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="allFully" class="text-white">All Vaccinated Residents</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format(count($vac)) ?>
                            <span class="pull-right"><i class="fa fa-shield"></i></span></h3>
                            <p class="info-text font-16 text-white">1st Vaccine</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="allVac" class="text-white">All 1st Vaccine</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format(count($posi)) ?>
                            <span class="pull-right"><i class="icon-close"></i></span></h3>
                            <p class="info-text font-16 text-white">Positive</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="allPosi" class="text-white">All Positive Residents</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format(count($fullyP)) ?>
                            <span class="pull-right"><i class="icon-shield"></i></span></h3>
                            <p class="info-text font-16 text-white">Fully Vaccine - Positive</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="allFullyP" class="text-white">All Fully Vaccinated - Positive</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"> <?= number_format(count($vacP)) ?>
                            <span class="pull-right"><i class="icon-shield"></i></span></h3>
                            <p class="info-text font-16 text-white">1st Vaccine - Positive</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="allVacP" class="text-white">All 1st Vaccine - Positive</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
