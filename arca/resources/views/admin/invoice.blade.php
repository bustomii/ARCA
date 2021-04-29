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
                        <h4><i class="icon fas fa-list-alt"></i> Invoice !</h4>
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
                                            <th style="text-align: center">TANGGAL</th>
                                            <th>USER</th>
                                            <th style="text-align: center">BARANG</th>
                                            <th style="text-align: center">STATUS</th>
                                            <th style="text-align: center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($invoice as $i)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td style="text-align: center">{{$i->created_at}}</td>
                                            <td>{{$i->iduser}}</td>
                                            <td style="text-align: center"><button style="width:50px" title="view" type="button" id="{{$i->id}}" class="btn btn-outline-primary view"><span class="fas fa-eye"></span> </button></i></td>
                                            <td style="text-align: center"><?php if ($i->status == 1) echo '<span class="badge badge-success">Approval</span>';
                                                                            else if ($i->status == 0) echo '<span class="badge badge-warning">Pending</span>';
                                                                            else echo '<span class="badge badge-danger">Decline</span>' ?></td>
                                            <td style="text-align: center">
                                                <button style="width:50px" title="update" type="button" id="{{$i->id}}" class="btn btn-outline-info editdata"><span class="fas fa-edit"></span> </button>
                                                <button title="delete" style="width:50px" onclick="hapusid('{{$i->id}}')" type="button" class="btn btn-outline-danger"><span class="fas fa-trash-alt"></span></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="20px">NO</th>
                                            <th style="text-align: center">TANGGAL</th>
                                            <th>USER</th>
                                            <th style="text-align: center">BARANG</th>
                                            <th style="text-align: center">STATUS</th>
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


@endsection