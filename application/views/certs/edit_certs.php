<div class="white-box">
    <div class="row m-b-30">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
    </div>

    <form method="POST" action="<?= site_url('certificates/update_cert') ?>" id="edit-certIDform" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <label class="control-label">Picture</label>
                <div class="text-center">
                    <div id="my_camera">
                        <input name="editimg" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-1" data-default-file="<?= empty($cert->pic) ? site_url() . 'assets/img/person.png' : site_url() . 'assets/uploads/' . $cert->pic ?>" />
                        <input type="hidden" id="picData" value="<?= preg_match('/data:image/i', $cert->pic) ? $cert->pic : null ?>">
                    </div>
                </div>
                <div class="row text-center m-b-40 m-t-10">
                    <button class="btn btn-danger waves-effect btn-rounded waves-light" type="button" id="open_cam" data-toggle="tooltip" data-original-title="Open Camera"> <i class="fa fa-camera"></i> </button>
                    <button type="button" class="btn btn-primary waves-effect btn-rounded waves-light" onclick="save_photo()" data-toggle="tooltip" data-original-title="Capture"><i class="fa fa-crosshairs"></i></button>
                </div>
                <div id="profileImage">
                    <input type="hidden" name="profileimg">
                </div>
            </div>
            <div class="col-md-8 col-sm-8"></div>
        </div>
        <div class="form-group">
            <label class="control-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Certificate Title" required value="<?= $cert->title ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Salutation</label>
            <input type="text" class="form-control" name="salutation" placeholder="Enter Certificate Salutation" required value="<?= $cert->salutation ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Content</label>
            <textarea id="summernote" name="message" required><?= $cert->content ?></textarea>
        </div>
        <input type="hidden" value="<?= $cert->id ?>" name="id">
        <div class="form-actions m-t-30">
            <button class="btn btn-primary waves-effect waves-light" type="submit"> <i class="fa fa-check"></i> Update</button>
            <a type="button" href="<?= site_url('certificates') ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
        </div>
    </form>
</div>