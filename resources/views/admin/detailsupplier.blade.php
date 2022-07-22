@extends('layouts.back.core')
@section('tittle') Detail Supplier @endsection
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
            <h1>Detail Supplier {{$data->nama}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Supplier</a></li>
              <li class="breadcrumb-item"><a href="#">Detail Supplier</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                 <a style="float: right;" href="{{route('cetaksupplier1',['id' => $data->id])}}" class="btn btn-outline-info btn-sm">Cetak</a>
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
                    <th>Masa Berlaku</th>
                    <th>Jumlah Produk</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($produk as $d)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama_barang}}</td>
                    <td>{{$d->kategori->nama_kategori}}</td>
                    <td>{{$d->harga}}</td>
                    <td>{{$d->masa_berlaku}}</td>
                    <td>{{$d->stok}}</td>
                    <td>
                        <button type="button" class="btn btn-xs btn-warning text-white" data-id="{{$d->id}}" data-bs-toggle="modal" data-bs-target="#exampModal">Refund</button>
                    </td>
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
<div class="modal fade" id="exampModal" tabindex="-1" aria-labelledby="exampModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="refund">Masukkan Jumlah Barang Yang ingin di Refund</label>
                        <input type="text" class="form-control" id="refund" name="refund" placeholder="Masukkan Jumlah Barang Yang ingin di Refund" value="{{old('refund')}}">
                        <input type="text" id="id" hidden name="id">
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


@endsection
@section('script')

<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $('#exampModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>

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
@endsection
