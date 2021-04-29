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
                            <div class="card-body">
                                <button style="width:100px" title="update" type="button" class="btn btn-info adddata"><span class="fas fa-plus">
                                        Invoice
                                    </span>
                                </button>
                            </div>
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
                                            <td style="text-align: center"><button style="width:50px" title="view detail" type="button" id="{{$i->id}}" status="{{$i->status}}" class="btn btn-outline-primary view"><span class="fas fa-eye"></span> </button></i></td>
                                            <td style="text-align: center"><?php if ($i->status == 1) echo '<span class="badge badge-success">Approval</span>';
                                                                            else if ($i->status == 0) echo '<span class="badge badge-warning">Pending</span>';
                                                                            else echo '<span class="badge badge-danger">Decline</span>' ?><br /> ( {{$i->reason}} )</td>
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


<!-- Start Modal add -->
<form action="/loadinvoice" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade" id="idadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="nav-icon fas fa-file-invoice"></i> Add Invoice</h4>
                </div>
                <div class="modal-body center">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <select required name="barang[]" class="form-control">
                                <option value="" disabled selected> Pilih Barang</option>
                                @foreach ($barang as $b)
                                <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" name="kuantiti[]" class="form-control" placeholder="Kuantiti" required>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" onclick="createNewElement();" style="width : 50px" class="btn btn-outline-primary" name="tambah" placeholder="TP"><span class="fas fa-plus"></button>
                            <button type="button" onclick="hapusDiv();" style="width : 50px" class="btn btn-outline-danger" name="hapus" placeholder="TP"><span class="fas fa-trash"></button>
                        </div>
                    </div>
                    <div id="newElementId"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                        <button type="submit" name="submit" value="1" class="btn btn-info"> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal add -->


<!-- detail -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Invoice</h4>
            </div>
            <div class="modal-body center">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> Arca Internasional
                            </h4>
                        </div>
                    </div>

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Kuantiti</th>
                                        <th>Barang</th>
                                        <th style="text-align: right">Harga</th>
                                        <th style="text-align: center">Discount (%)</th>
                                        <th style="text-align: right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="getDetail">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Total:</th>
                                        <td>$250.30</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td id="status_"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row no-print">
                        <div class="col-12" id="button_update">
                        </div>
                    </div>
                </div>
                <div class="invoice p-3 mb-3">
                    <div class="" style="margin-bottom: 10px;">
                        <form action="/decline" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-10 float-right">
                                    <input required type="hidden" class="form-control" name="id" id="id_invoice">
                                    <input required type="text" class="form-control" name="reason" placeholder="Reason">
                                </div>
                                <div class="col-2 float-right">
                                    <button type="submit" name="submit" value="2" class="btn btn-danger float-right"> Decline</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end detail -->

<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $(document).ready(function() {
        $('.adddata').on('click', function() {
            $('#idadd').modal('show');
        });

        $('.view').click(function() {
            var id = $(this).attr("id");
            var status = $(this).attr("status");
            $.ajax({
                url: "{{url('detail')}}/" + id,
                method: "GET",
                dataType: "JSON",
                success: function(response) {
                    $('#getDetail').html('');
                    for (var x = 0; x < response.data.length; x++) {
                        var subtotal = [response.data[x].harga * response.data[x].discount / 100];
                        $('#getDetail').append(
                            '<tr>' +
                            '<td style="text-align: center">' + response.data[x].kuantiti + '</td>' +
                            '<td>' + response.data[x].name + '</td>' +
                            '<td style="text-align: right">IDR. ' + response.data[x].harga + '</td>' +
                            '<td style="text-align: center">' + response.data[x].discount + '</td>' +
                            '<td style="text-align: right">IDR. ' + subtotal + '</td>' +
                            '</tr>'
                        );
                    };
                    if (status == 0) {
                        $('#status_').html('<span class="badge badge-warning">Pending</span>');
                        $('#button_update').html(
                            '<form action="/approve" method="POST" enctype="multipart/form-data">' +
                            '{{ csrf_field() }}' +
                            '<input type="hidden" name="id_invoice" value="' + id + '">' +
                            '<input type="hidden" name="submit" value="1">' +
                            '<button type="submit" class="btn btn-success float-right">Approve</button>' +
                            '</form>');
                    } else if (status == 1) {
                        $('#status_').html('<span class="badge badge-success">Approval</span>');
                        $('#button_update').html(
                            '<form action="/approve" method="POST" enctype="multipart/form-data">' +
                            '{{ csrf_field() }}' +
                            '<input type="hidden" name="id_invoice" value="' + id + '">' +
                            '<input type="hidden" name="submit" value="0">' +
                            '<button type="submit" class="btn btn-warning float-right">Cancel Approve</button>' +
                            '</form>');
                    } else {
                        $('#status_').html('<span class="badge badge-danger">Decline</span>');
                    }
                    $('#id_invoice').val(id);
                    $('#myModal').modal("show");
                }
            });
        });
    });
</script>


<script language="javascript">
    function hapusid(hapusid) {
        if (confirm("Yakin Menghapus Invoice")) {
            window.location.href = '/delete/{{$active}}/' + hapusid;
            return true;
        }
    }
</script>

<script>
    function createNewElement() {
        var txtNewInputBox = document.createElement('div');
        txtNewInputBox.innerHTML =
            '<div class="form-group row">' +
            '<div class="col-sm-6">' +
            '<select required name="barang[]" class="form-control">' +
            '<option value="" disabled selected> Pilih Barang</option>' +
            '@foreach ($barang as $b)' +
            '<option value="{{$b->id}}">{{$b->name}}</option>' +
            '@endforeach' +
            '</select>' +
            '</div>' +
            '<div class="col-sm-3">' +
            '<input type="number" name="kuantiti[]" class="form-control" placeholder="Kuantiti" required>' +
            '</div>' +
            '<div class="col-sm-3">' +
            '</div>' +
            '</div>';
        document.getElementById("newElementId").appendChild(txtNewInputBox);
    }
</script>

<script>
    function hapusDiv() {
        var target = document.getElementById("newElementId");
        var akhir = target.lastChild;
        target.removeChild(akhir);
        // document.getElementById("child").classList.remove("child");
    }
</script>

<script>
    $(document).ready(function() {
        $(".reason").hide();
        $("#reason_x").click(function() {
            $(".reason").show();
        })
    });
</script>

@endsection