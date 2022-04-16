@extends('admin/admin')
@section('css')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('breadcrumb')
Kelompok
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tugas Kelompok</h3>
        <div class="pull-right">
          <a href="{{URL::to('/thr/tambah')}}" class="btn btn-block btn-success btn-flat"><span class="btn-label"><i class="fa fa-plus"></i></span> Tambah</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i> Informasi</h4>
          <div class="row">
              <div class="col-lg-6">
                THR 
                <br>
                <ul>
                  <li>Manajerial Rp. 5.000.000</li>
                  <li>Guru Rp. 4.000.000</li>
                  <li>Pelaksana Rp. 3.000.000</li>
                </ul>
              </div>
              <div class="col-lg-6">
                Ketentuan : 
                <br>
                <ul>
                  <li>Lama Kerja Sampai dengan 1 tahun mendapat thr 50%</li>
                  <li>Lama Kerja 1 Sampai dengan 3 tahun mendapat thr 75%</li>
                  <li>Lama Kerja Lebih Dari 3 tahun mendapat thr 100%</li>
                </ul>
              </div>
          </div>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Golongan</th>
            <th>Lama Kerja</th>
            <th>THR</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @if (count($thr) > 0)
              @foreach($thr as $key => $p)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->golongan }}</td>
                  <td>{{ $p->lama_kerja }} Tahun</td>
                  <td>{{"Rp " . number_format($p->thr,2,',','.')}}</td>
                  <td>
                    <a href="{{URL::to('/thr/hapus/'.$p->id.'')}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box -->
    
  </div>
  <!-- /.col -->
</div>
@endsection

@section('js')
<!-- DataTables -->
<script src="{{ asset('lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    });

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

</script>
    
@endsection
