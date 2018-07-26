<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Judul Form</h2>
        <p>Kegunaan</p>
    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="card card-default">
            <div class="card-header ">
                <div class="card-title">
                    Product Gallery
                </div>
            </div>
            <div class="card-block no-scroll no-padding">
                <div action="<?= base_url('product/upload_file'); ?>" class="dropzone no-margin"
                     id="upload_file">
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>