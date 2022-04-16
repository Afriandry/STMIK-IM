@extends('admin/admin')
@section('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('breadcrumb')
Latihan pengulangan dan percabangan
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Perhitungan Gaji</h3>
      </div>
      <!-- /.box-header -->
      <form action="{{url('gaji/save')}}" method="post">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <label>NIK</label>
              <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik">
            </div>
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
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <label>Golongan</label>
              <select class="form-control select2" style="width: 100%;" name="golongan">
                <option selected="selected" disabled="disabled">-- Pilih Golongan --</option>
                <option value="A">Golongan A</option>
                <option value="B">Golongan B</option>
              </select>
            </div>
            <div class="col-md-4">
              <label>Status</label>
              <select class="form-control select2" style="width: 100%;" name="status">
                <option selected="selected" disabled="disabled">-- Pilih Status --</option>
                <option value="sudah">Sudah Menikah</option>
                <option value="belum">Belum Menikah</option>
              </select>
            </div>
            <div class="col-md-4">
              <label>Anak</label>
              <select class="form-control select2" style="width: 100%;" name="anak">
                <option selected="selected" disabled="disabled">-- Pilih Anak --</option>
                <option value="sudah">Sudah Punya Anak</option>
                <option value="belum">Belum Punya Anak</option>
              </select>
            </div>
          </div>
          @if (!empty($data))
            <hr>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> Hasil Perhitungan !</h4>
              <p>NIK          :{{$data['nik']}}</p>
              <p>Nama         :{{$data['nama']}}</p>
              <p>Tanggal Masuk:{{$data['tglmasuk'] . " (" . $data['totaltahun'] . " Tahun)"}}</p>
              <p>Golongan     :{{$data['golongan']}}</p>
              <p>Status       :{{$data['status']}}</p>
              <p>Anak         :{{$data['anak']}}</p>
              <p>Gaji Pokok   :{{"Rp " . number_format($data['gajipokok'],2,',','.')}}</p>
              <p>Tunjangan    :{{"Rp " . number_format($data['tunjangan'],2,',','.')}}</p>
              <p>Potongan     :{{"Rp " . number_format($data['potongan'],2,',','.')}}</p>
              <p>Total Gaji     :{{"Rp " . number_format($data['totalgaji'],2,',','.')}}</p>
            </div>
          @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="{{url("tugas-pertama")}}" class="btn btn-default">Reset</a>
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
