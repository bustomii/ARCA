@extends('admin.layouts.footer')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <section class="content">
            <div class="container-fluid">
                @if ($message = Session::get('success'))
                <br />
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
                @endif
                <div class="card card-info">
                    <div class="card-header">
                        <h4><i class="icon fas fa-list-alt"></i> {{$active}} !</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20px">NO</th>
                                            <th>NAMA BARANG</th>
                                            <th style="text-align: center">HARGA</th>
                                            <th style="text-align: center">STOCK</th>
                                            <th style="text-align: center">DISCOUNT</th>
                                            <th style="text-align: center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($barang as $b)
                                        <tr>
                                            <td style="text-align: right">{{$no++}}</td>
                                            <td>{{$b->name}}</td>
                                            <td style="text-align: right">{{$b->harga}}</td>
                                            <td style="text-align: center">{{$b->stok}}</td>
                                            <td style="text-align: center">{{$b->discount}}</td>
                                            <td style="text-align: center">
                                                <button style="width:50px" title="update" type="button" id="{{$b->id}}" class="btn btn-outline-info editdata"><span class="fas fa-edit"></span> </button>
                                                <button title="delete" style="width:50px" onclick="hapusid('{{$b->id}}')" type="button" class="btn btn-outline-danger"><span class="fas fa-trash-alt"></span></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="20px">NO</th>
                                            <th>NAMA BARANG</th>
                                            <th style="text-align: center">HARGA</th>
                                            <th style="text-align: center">STOCK</th>
                                            <th style="text-align: center">DISCOUNT</th>
                                            <th style="text-align: center">ACTION</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
</div>

<!-- Start Modal Edit -->
<form action="/edit_barang" method="POST">
    <div class="modal fade" id="idedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="nav-icon fas fa-briefcase"></i> Edit Barang</h4>
                </div>
                <div class="modal-body center">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="id" id="id_edit" class="form-control" placeholder="Enter ..." required>
                            <input type="text" name="nama_barang" id="nama_barang_edit" class="form-control" placeholder="Enter ..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" name="harga" id="harga_edit" class="form-control" placeholder="Enter ..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="text" name="stok" id="stok_edit" class="form-control" placeholder="Enter ..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Discount</label>
                        <div class="col-sm-8">
                            <input type="text" name="discount" id="discount_edit" class="form-control" placeholder="Enter ..." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                        <button type="submit" name="edit" class="btn btn-info"> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit -->

<script>
    $(document).ready(function() {
        $('.editdata').on('click', function() {
            $('#idedit').modal('show');
            var id = $(this).attr('id');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // console.log(id);
            $('#id_edit').val(id);
            $('#nama_barang_edit').val(data[1]);
            $('#harga_edit').val(data[2]);
            $('#stok_edit').val(data[3]);
            $('#discount_edit').val(data[4]);
        });
    });
</script>

@endsection