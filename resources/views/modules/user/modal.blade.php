{{-- add shift --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">Tambah Shift</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-shift" action="{{ url('user/add/shift') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shift-name">Nama Shift</label>
                                <input type="text" autofocus name="shift_name" id="shift-name" class="form-control input-md" tabindex="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shift-start">Mulai Shift</label>
                                <input type="time" name="start" id="shift-start" class="form-control input-md" tabindex="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shift-end">Akhir Shift</label>
                                <input type="time" name="end" id="shift-end" class="form-control input-md" tabindex="3" required>
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
                <form id="form-delete-user" action="{{ url('user/delete') }}" method="POST">
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
