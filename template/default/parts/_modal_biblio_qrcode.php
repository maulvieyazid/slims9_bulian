<div class="modal fade" id="biblioQrcodeModal" tabindex="-1" role="dialog" aria-labelledby="biblioQrcodeModal" aria-hidden="true">
    <div class="modal-dialog modal-xs vertical-align-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= __('Share QRCode') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="biblioQrcodeModalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="printQrcode()"><?= __('Print') ?></button>

                <script>
                    function printQrcode() {
                        const frame = document.getElementById('frameQrcodeBiblio');
                        if (!frame.contentWindow) return;
                        frame.contentWindow.focus();
                        frame.contentWindow.print();
                    }
                </script>
            </div>
        </div>
    </div>
</div>