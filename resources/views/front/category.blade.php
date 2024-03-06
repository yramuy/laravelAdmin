@extends('layouts.default')

@section('title', 'Category')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add
                            Category</a>
                        <table id="example1" class="table table-bordered table-striped mt-5">
                            <thead>
                                <tr>

                                    <th>Sno</th>
                                    <th>Category Id</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sno = 1; ?>
                                @foreach ($categories as $res)
                                    <tr>
                                        <td>{{ $sno }}</td>
                                        <td>{{ $res['id'] }}</td>
                                        <td>{{ $res['name'] }}</td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onClick="editCategory('<?php echo $res['id']; ?>')"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger" onClick="deleteItem()"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $sno++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('category/store') }}" id="category_form">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name <em
                                        class="star">*</em></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="category" name="category" value="<?php if(isset($id)) {echo $id; } else {echo "";}?>"
                                        placeholder="Category">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
