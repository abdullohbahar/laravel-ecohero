<div class="modal fade" id="edit" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Timeline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.update.timeline') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="modal" value="edit">
                    <input type="hidden" name="timelineID" id="timelineID" value="{{ old('timelineID') }}">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Tanggal</label>
                            <input type="date" class="form-control @error('editTanggal') is-invalid @enderror"
                                name="editTanggal" value="{{ old('editTanggal') }}" id="editTanggal">
                            @error('editTanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">Jam</label>
                            <input type="time" class="form-control @error('editJam') is-invalid @enderror"
                                name="editJam" id="editJam">
                            @error('editJam')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">Status</label>
                            <input type="text" class="form-control @error('editStatus') is-invalid @enderror"
                                name="editStatus" id="editStatus" value="{{ old('editStatus') }}">
                            @error('editStatus')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">Asal</label>
                            <input type="text" class="form-control @error('editAsal') is-invalid @enderror"
                                name="editAsal" id="editAsal" value="{{ old('editAsal') }}">
                            @error('editAsal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">Tujuan</label>
                            <input type="text" class="form-control @error('editTujuan') is-invalid @enderror"
                                name="editTujuan" id="editTujuan" value="{{ old('editTujuan') }}">
                            @error('editTujuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-success" style="width:100%;">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
