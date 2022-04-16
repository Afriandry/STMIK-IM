@extends('admin/admin')
@section('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('breadcrumb')
Tambah Data THR
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data THR</h3>
      </div>
      <!-- /.box-header -->
      <form action="{{url('thr/save')}}" method="post">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
            </div>
            <div class="col-md-4">
              <label>Tanggal Masuk</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" placeholder="dd/mm/yyyy" name="tglmasuk">
              </div>
            </div>
            <div class="col-md-4">
              <label>Golongan</label>
              <select class="form-control select2" style="width: 100%;" name="golongan">
                <option selected="selected" disabled="disabled">-- Pilih Golongan --</option>
                <option value="Manajerial">Manajerial</option>
                <option value="Guru">Guru</option>
                <option value="Pelaksana">Pelaksana</option>
              </select>
            </div>
          </div>
          <br>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="{{url("thr/tambah")}}" class="btn btn-default">Reset</a>
          <button type="submit" class="btn btn-info">Hitung</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
    
  </div>
  <!-- /.col -->
</div>
@endsection

@section('js')

<!-- bootstrap datepicker -->
<script src="{{ asset('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    });

</script>
    
@endsection
