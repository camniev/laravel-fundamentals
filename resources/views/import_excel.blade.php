@extends('layouts.app')
@section('content')
<h3 align="center">Import Excel File in Laravel</h3>
<br />
@if(count($errors) > 0)
    <div class="alert alert-danger">
        Upload Validation Error <br/><br/>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ message }}</strong>
</div>
@endif
<form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
    <!-- {{ @csrf_field() }} post data to server -->
    {{ @csrf_field() }}
    <div class="form-group">
        <table class="table">
            <tr>
                <td width="40%" align="right"><label>Select File for Upload</label></td>
                <td width="30%"><input type="file" name="select_file" /></td>
                <td width="30%" align="left">
                    <input type="submit" name="upload" class="btn btn-primary" value="Upload" />
                </td>
            </tr>
            <tr>
                <td width="40%" align="right"></td>
                <td width="30%"><span class="text-muted">.xls, .xlsx</span></td>
                <td width="30%" align="left"></td>
            </tr>
        </table>
    </div>
</form>

<br />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Stock Library</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Stock Code</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Expense Item Category</th>
                </tr>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row->stock_code }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->unit }}</td>
                        <td>{{ $row->expense_category }}</td>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection