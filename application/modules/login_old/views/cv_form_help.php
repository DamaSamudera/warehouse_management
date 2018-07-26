<!-- Modal -->
<div class="modal fade fill-in" id="modal_bantuan" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><?= $this->lang->line('login_h_title'); ?></h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("login/send_help"); ?>" method="post">
                        <div class="form-group form-group-default required" aria-required="true">
                            <label>Judul Pertanyaan</label>
                            <input type="text" class="form-control" name="judul" required="" aria-required="true"
                                   aria-invalid="true" data-original-title="" title="" aria-describedby="popover984051">
                        </div>
                    <textarea class="form-control edit-froala" name="masalah" required="" aria-required="true" style="height: 150px;"></textarea>
                    <button class="m-t-10 col-md-12 btn btn-default">Kirim</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal -->