{{-- confirm delete --}}
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="confirmDeleteLabel">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-delete-confirmation" action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <p id="confirm-delete-text"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" value="Hapus" class="btn btn-sm btn-danger" />
                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">
                                Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- add supplier --}}
<div class="modal fade" id="add-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Tambah Supplier</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-supplier" action="{{ url('transaction/add/supplier') }}" method='post'>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="supplier-name">Nama</label>
                                <input type="text" id="supplier-name" autofocus name="name" class="form-control input-md" tabindex="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="supplier-address">Alamat</label>
                                <input type="text" id="supplier-address" name="address" class="form-control input-md" tabindex="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- add goods category --}}
<div class="modal fade" id="add-goods-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Tambah Kategori Barang</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-goods-category" action="{{ url('transaction/add/goodsCategory') }}" method='post'>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="goodsCategory-name">Nama</label>
                                <input type="text" id="goodsCategory-name" autofocus name="name" class="form-control input-md" tabindex="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- add voucher --}}
<div class="modal fade" id="add-voucher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Tambah voucher</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-voucher" action="{{ url('transaction/voucher/add') }}" method='post'>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="voucher-name">Nama voucher</label>
                                <input type="text" resetable=true id="voucher-name" autofocus name="voucher_name" class="form-control input-md" tabindex="3" placeholder="Contoh: Promo Weekend" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="voucher-discount-amount">Diskon (Rp.)</label>
                                <input type="number" resetable=true id="voucher-discount-amount" name="voucher_discount_amount" class="form-control input-md" placeholder="Contoh: 5000" tabindex="3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="voucher-discount-percent">Diskon (%)</label>
                                <input type="number" resetable=true id="voucher-discount-percent" name="voucher_discount_percent" class="form-control input-md" placeholder="Contoh: 10" tabindex="3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- add payment method --}}
<div class="modal fade" id="add-paymentMethod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Tambah metode pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-paymentMethod" action="{{ url('transaction/paymentMethod/add') }}" method='post'>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="paymentMethod-name">Nama</label>
                                <input type="text" resetable=true id="paymentMethod-name" autofocus name="payment_method_name" class="form-control input-md" tabindex="3" placeholder="Contoh: Gopay" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- receipt view --}}
<div class="modal fade" id="receipt" tabindex="-1" role="dialog" aria-labelledby="receiptLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Cetak Nota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="receiptHeaderItemBought">
                    <input type="hidden" id="receiptDetailItemBought">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="receiptTitle">Judul</label>
                            <input type="text" id="receiptTitle" class="form-control input-md" value="SLEEPLESS COFFEE">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="receiptSubtitle">Sub Judul</label>
                            <input type="text" id="receiptSubtitle" class="form-control input-md" value="Jl. Kolonel Sugiono, Susukan Ungaran Timur, Kab. Semarang">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="receiptClosing1">Penutup 1</label>
                            <input type="text" id="receiptClosing1" class="form-control input-md" value="Thank You">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="receiptClosing2">Penutup 2</label>
                            <input type="text" id="receiptClosing2" class="form-control input-md" value="follow our instagram">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="receiptClosing3">Penutup 3</label>
                            <input type="text" id="receiptClosing3" class="form-control input-md" value="sleeplesscoffeestay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row pull-right">
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-md" href="{{ url('transaction') }}">Kembali ke Transaksi</a>
                        <button class="btn btn-default btn-md" id="printReceiptBtn" onclick="printReceipt()">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
