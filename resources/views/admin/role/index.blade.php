@extends('layouts.admin-master')
@section('admin-content')
@section('role') active show-sub @endsection
@section('all-role') active @endsection

     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Dashboard</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
            <div class="col-md-10 m-auto">
              <div class="card">
                <div class="card-header">Role List</div>
                <div class="card-body">
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-30p">Sl</th>
                        <th class="wd-25p">Name</th>
                        <th class="wd-20p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $item)
                      <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                          <div class="row">
                            <div class="col-6">
                            <a href="{{ route('role.edit',$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>
                          </div>
                          <div class="col-6">
                            <form action="{{ route('role.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                          <button class="btn btn-sm btn-danger"  title="delete data"><i class="fa fa-trash"></i></button>
                        </form>
                          </div>
                          </div>
                          
                          
                        
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div>
              </div><!-- card -->
            </div>

          </div>
        </div>


    </div>
@endsection
