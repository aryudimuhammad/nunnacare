@extends('layouts.back.core')
@section('tittle') Produk @endsection
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
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
              <a style="float: right;" href="{{route('cetakproduk')}}"  class="btn btn-outline-info btn-sm">Cetak</a>
<button type="button" style="float: right; margin-right:6px;" class="btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>

</a>
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
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($produk as $d)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama_barang}}</td>
                    <td>{{$d->kategori->nama_kategori}}</td>
                    <td>Rp.{{number_format($d->harga, 0, ',', '.') }},-</td>
                    <td>{{$d->stok}}</td>
                    <td><a href="{{route('detailproduk' , ['id' => $d->id])}}" class="btn btn-xs btn-info" >Detail</a>
                    <button type="button" class="btn btn-xs btn-warning text-white" data-id="{{$d->id}}" data-nama="{{$d->nama_barang}}" data-kategori="{{$d->kategori->id}}" data-supplier="{{$d->supplier->id}}" data-harga="{{$d->harga}}" data-stok="{{$d->stok}}" data-berlaku="{{$d->masa_berlaku}}" data-keterangan="{{$d->keterangan}}" data-gambar="{{$d->gambar}}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                    <button class="delete btn btn-xs btn-danger" data-id="{{$d->id}}"><i class="fas fa-trash"></i> Hapus</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama produk" value="{{old('nama')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-select" name="kategori" id="kategori" aria-label="Default select example">
                        @foreach ($kategori as $d)
                        <option value="{{$d->id}}">{{$d->nama_kategori}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <select class="form-select" name="supplier" id="supplier" aria-label="Default select example">
                        @foreach ($supplier as $d)
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" value="{{old('harga')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan stok" value="{{old('stok')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="masa_berlaku">Masa Berlaku</label>
                        <input type="text" class="form-control" id="berlaku" name="berlaku" placeholder="Masukkan masa berlaku" value="{{old('berlaku')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan " value="{{old('keterangan')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" value="{{old('gambar')}}" required>
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

<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama produk" value="{{old('nama')}}" required>
                        <input type="text" class="form-control" id="id" hidden name="id">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-select" name="kategori" id="kategori" aria-label="Default select example">
                        @foreach ($kategori as $d)
                        <option value="{{$d->id}}">{{$d->nama_kategori}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <select class="form-select" name="supplier" id="supplier" aria-label="Default select example">
                        @foreach ($supplier as $d)
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" value="{{old('harga')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan stok" value="{{old('stok')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="berlaku">Masa Berlaku</label>
                        <input type="text" class="form-control" id="berlaku" name="berlaku" placeholder="Masukkan masa berlaku" value="{{old('berlaku')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan " value="{{old('keterangan')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" value="{{old('gambar')}}">
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
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal.fire({
            title: "Apakah anda yakin?",
            icon: "warning",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('/admin/produk')}}" + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            document.location.reload(true);
                        }, 1000);
                    },
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'data batal dihapus',
                    'error'
                )
            }
        })
    });
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

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let nama = button.data('nama')
        let kategori = button.data('kategori')
        let supplier = button.data('supplier')
        let harga = button.data('harga')
        let stok = button.data('stok')
        let berlaku = button.data('berlaku')
        let keterangan = button.data('keterangan')
        let gambar = button.data('gambar')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nama').val(nama)
        modal.find('.modal-body #kategori').val(kategori)
        modal.find('.modal-body #supplier').val(supplier)
        modal.find('.modal-body #harga').val(harga)
        modal.find('.modal-body #harga').val(harga)
        modal.find('.modal-body #stok').val(stok)
        modal.find('.modal-body #stok').val(stok)
        modal.find('.modal-body #berlaku').val(berlaku)
        modal.find('.modal-body #berlaku').val(berlaku)
        modal.find('.modal-body #keterangan').val(keterangan)
        modal.find('.modal-body #keterangan').val(keterangan)
        modal.find('.modal-body #gambar').attr('src', '/produk/' + gambar);
    })
</script>
@endsection
