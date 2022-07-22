@extends('layouts.back.core')
@section('tittle') Pesanan Detail @endsection
@section('head')
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cart Belanja {{$data->name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pesanan</a></li>
              <li class="breadcrumb-item"><a href="#">Detail</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <a style="float: right; margin-left: 8px;" href="{{route('adminpesanan')}}" class="btn btn-sm btn-outline-danger">Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Ketersediaan</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data1 as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->produk->nama_barang}}</td>
                    <td>{{$d->produk->kategori->nama_kategori}}</td>
                    <td>{{$d->produk->harga}}</td>
                    <td>{{$d->jumlah_produk}} Qty</td>
                    <td>{{$d->produk->stok}} Qty</td>
                </tr>
                @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
</section>
</div>













<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ongkir</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{route('ongkiradminpesanan')}}">
          @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ongkir">Masukkan Harga Ongkir</label>
                        <input type="number" required class="form-control" id="ongkir" name="ongkir" placeholder="Masukkan ongkir Produk" value="{{old('ongkir')}}">
                        <input type="text" hidden id="id" name="id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
       </form>
    </div>
  </div>
</div>

<!-- estimasi -->
<div class="modal fade" id="ongkirModal" tabindex="-1" aria-labelledby="ongkirModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ongkirModalLabel">Estimasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('estimasiadminpesanan')}}">
                <div class="modal-body">
                    @csrf
                    <input type="text" hidden id="id" name="id">
                    <div class="form-group">
                        <label for="estimasi">Estimasi</label>
                        <input type="text" class="form-control" id="estimasi" name="estimasi" placeholder="Masukkan Estimasi Pengiriman" value="{{old('estimasi')}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- close ongkir -->
<div class="modal fade" id="closeModal" tabindex="-1" aria-labelledby="closeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
            <div class="swal2-header">
                <ul class="swal2-progress-steps" style="display: none;"></ul>
                <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <div class="swal2-icon swal2-question" style="display: none;"></div>
                <div class="swal2-icon swal2-warning" style="display: none;"></div>
                <div class="swal2-icon swal2-info" style="display: none;"></div>
                <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;">
                <h2 class="swal2-title" id="swal2-title" style="margin-left: 10px;">Masukkan Harga Ongkir Terlebih Dahulu.</h2>
                <div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled btn-danger" aria-label="" data-bs-toggle="modal" data-bs-target="#closeModal" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Close</button></div>
            </div>
        </div>
    </div>
    </div>
</div>


<!-- close tunggubayarModal -->
<div class="modal fade" id="tunggubayarModal" tabindex="-1" aria-labelledby="tunggubayarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-info swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
            <div class="swal2-header">
                <ul class="swal2-progress-steps" style="display: none;"></ul>
                <div class="swal2-icon swal2-info swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <div class="swal2-icon swal2-question" style="display: none;"></div>
                <div class="swal2-icon swal2-warning" style="display: none;"></div>
                <div class="swal2-icon swal2-info" style="display: none;"></div>
                <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;">
                <h2 class="swal2-title" id="swal2-title" style="margin-left: 10px;">Menunggu Customer Melakukan Pembayaran.</h2>
                <div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled btn-danger" aria-label="" data-bs-toggle="modal" data-bs-target="#tunggubayarModal" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">Close</button></div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')

<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>

<script>
    $('#ongkirModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>
@endsection
