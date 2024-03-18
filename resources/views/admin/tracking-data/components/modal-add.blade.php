 <!-- Modal -->
 <div class="modal fade" id="add" aria-labelledby="addLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addLabel">Tambah Timeline</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('admin.store.timeline', $trackingData->id) }}" method="POST">
                     @csrf
                     <input type="hidden" name="modal" value="add">
                     <div class="row">
                         <div class="col-12">
                             <label for="">Tanggal</label>
                             <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                 name="tanggal" id="">
                             @error('tanggal')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="">Jam</label>
                             <input type="time" class="form-control @error('jam') is-invalid @enderror"
                                 name="jam" id="jam">
                             @error('jam')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="">Status</label>
                             <input type="text" class="form-control @error('status') is-invalid @enderror"
                                 name="status" id="">
                             @error('status')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="">Asal</label>
                             <input type="text" class="form-control @error('asal') is-invalid @enderror"
                                 name="asal" id="">
                             @error('asal')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="">Tujuan</label>
                             <input type="text" class="form-control @error('tujuan') is-invalid @enderror"
                                 name="tujuan" id="">
                             @error('tujuan')
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
