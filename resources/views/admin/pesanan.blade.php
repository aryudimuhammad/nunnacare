@extends('layouts.back.core')
@section('tittle') Pesanan @endsection
@section('head')
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pesanan</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <!-- <a style="float: right; margin-left: 8px;" href="{{route('cetakkeuangan')}}" class="btn btn-sm btn-outline-info">Keuangan</a> -->
                <button style="float: right; margin-left: 8px;" data-bs-toggle="modal" data-bs-target="#cetakModal" href="{{route('cetakkeuangan')}}" class="btn btn-sm btn-outline-info">Keuangan</button>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakbarangtransaksi')}}" class="btn btn-sm btn-outline-info">Transaksi</a>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakbarangtidaklaris')}}" class="btn btn-sm btn-outline-info">Barang Kurang Laris</a>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakbaranglaris')}}" class="btn btn-sm btn-outline-info">Barang Laris</a>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakpesanankiriman')}}" class="btn btn-sm btn-outline-info">Paket Telah Diterima</a>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakpesananprosespengiriman')}}" class="btn btn-sm btn-outline-info">Dalam Pengiriman</a>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakpesanantelahsampai')}}" class="btn btn-sm btn-outline-info">Telah Sampai</a>
                <a style="float: right; margin-left: 8px;" href="{{route('cetakpesananditerima')}}" class="btn btn-sm btn-outline-info">Terjual</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Notransaksi</th>
                    <th>Metode</th>
                    <th>Jasa</th>
                    <th>Status</th>
                    <th>Ongkir</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->user->name}}</td>
                    <td>{{$d->notransaksi}}</td>
                    <td>{{$d->metode_pembayaran}}</td>
                    <td>{{$d->courier->nama}}</td>
                    @if ($d->status == 1)
                    <td> <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#closeModal">Verifikasi</button></td>
                    @elseif ($d->status == 2)
                    <td><button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tunggubayarModal">Terverifikasi</button></td>
                    @elseif ($d->status == 3)
                    <td><button class="btn btn-sm btn-outline-danger" data-id="{{$d->id}}" data-bs-toggle="modal" data-bs-target="#ongkirModal">Barang Perlu Dikirim</button></td>
                    @elseif ($d->status == 4)
                    <td><button class="btn btn-sm btn-outline-info" data-id="{{$d->id}}" data-bs-toggle="modal" data-bs-target="#statuspengirimanModal">Paket Telah diterima oleh pihak pengiriman</button></td>
                    @elseif ($d->status == 11)
                    <td><button class="btn btn-sm btn-outline-info" data-id="{{$d->id}}" data-bs-toggle="modal" data-bs-target="#statuspengirimanModal">Paket Dalam Proses Pengiriman</button></td>
                    @elseif ($d->status == 12)
                    <td><button class="btn btn-sm btn-outline-info">Paket Telah Sampai</button></td>
                    @else
                    <td><button class="btn btn-sm btn-secondary">Terjual</button></td>
                    @endif


                    @if ($d->ongkir == null)
                    <td><button type="button" class="btn btn-primary btn-sm" data-id="{{$d->id}}" data-bs-toggle="modal"  data-bs-target="#exampleModal">Ongkir</button</td>
                    @else
                    <td>Rp.{{number_format($d->ongkir, 0, ',', '.') }},-</td>
                    @endif


                    @if ($d->bukti == null)
                        <td>-</td>
                        @else
                        <td><img src="{{asset('storage/' . $d->bukti)}}" class="product-image" alt="Product Image"></td>
                    @endif

                    <td>
                        <a href="{{route('cetakcart',['id' => $d->notransaksi , 'idu' => $d->user_id])}}" class="btn btn-xs btn-warning text-white">Cetak</a>
                        <form action="{{route('adminpesanandetail',['id' => $d->notransaksi , 'idu' => $d->user_id])}}">
                        <button type="submit" class="btn btn-xs btn-info">Detail</button>
                        </form>
                        <form method="POST" action="{{route('adminpesanandelete',['id' => $d->id])}}">
                            {{method_field('DELETE')}}
                            @csrf
                        <button class="btn btn-xs btn-danger" data-id="{{$d->id}}"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
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
<div class="modal fade" id="cetakModal" tabindex="-1" aria-labelledby="cetakModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakModalLabel">Pilih Tanggal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <form method="get" action="{{route('cetakkeuangan')}}" target="_blank">
                    {{ method_field('put') }}
                    @csrf
                    <div class=" modal-body">
                        <div class="form-group">
                            <label for="start">Dari Tanggal</label>
                            <input type="date" class="form-control" name="start" id="start" required>
                        </div>
                        <div class="form-group">
                            <label for="end">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="end" id="end" required>
                        </div>
                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary"> <i class="feather icon-printer"></i> Cetak</button>
                    </div>
                </form>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
  </div>
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

<!-- statuspengiriman -->
<div class="modal fade" id="statuspengirimanModal" tabindex="-1" aria-labelledby="statuspengirimanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statuspengirimanModalLabel">Status Pengiriman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('statuspengiriman')}}">
                <div class="modal-body">
                    @csrf
                    <input type="text" hidden id="id" name="id">
                    <div class="form-group">
                        <label for="statuspengiriman">Status</label>
                        <select class="form-select" name="statuspengiriman" id="statuspengiriman" aria-label="Default select example">
                        <option value="11">Paket Dalam Proses Pengiriman</option>
                        <option value="12">Paket Telah Sampai</option>
                        </select>
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
                    <div class="form-group">
                        <label for="nama_courier">Nama Courier</label>
                        <input type="text" class="form-control" id="nama_courier" name="nama_courier" placeholder="Masukkan Estimasi Pengiriman" value="{{old('nama_courier')}}">
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

<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


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
                    url: "{{ url('/admin/pesanan/delete')}}" + '/' + id,
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

<script>
    $('#statuspengirimanModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
    })
</script>

@endsection
