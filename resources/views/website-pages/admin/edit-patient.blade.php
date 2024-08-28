@extends('dashboard-layouts.body')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Patient Details')
@section('body')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Patient Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href=" ">Back</a></li> --}}
                            <li class="breadcrumb-item active">Edit Patient Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content ">
            <div class="container-fluid ">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="tab-content">


                                    <div class="active tab-pane" id="settings">
                                        <form method="POST" action="{{ route('update.patient', ['id' => $patient->id]) }}" class="form-horizontal"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" class="form-control" name="id"
                                            value="{{ $patient->id }}">



                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Patient Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control @error('patient_name') is-invalid @enderror"
                                                        name="patient_name" value="{{ $patient->patient_name }}"  required>
                                                    @error('patient_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Mobile Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control @error('mobile') is-invalid @enderror"
                                                        name="mobile" value="{{ $patient->mobile }}"  required>
                                                    @error('mobile')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Age</label>
                                                <div class="col-sm-4">
                                                    <input type="number"
                                                        class="form-control @error('age') is-invalid @enderror"
                                                        name="age" value="{{ $patient->age }}"  required id="age">
                                                    @error('age')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2 col-form-label">Date of Visit</label>
                                                <div class="col-sm-4">
                                                    <input type="date"
                                                        class="form-control @error('date_visit') is-invalid @enderror"
                                                        name="date_visit" value="{{ $patient->date_visit }}"  required id="date_visit">
                                                    @error('date_visit')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>





                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Compain</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="2" class="form-control @error('complain') is-invalid @enderror" name="complain"
                                                        placeholder="Compain">{{ old('comment', $patient->complain) }}</textarea>
                                                    @error('complain')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Investigation</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="2" class="form-control @error('investigation') is-invalid @enderror" name="investigation"
                                                        placeholder="Investigation">{{ old('comment', $patient->investigation) }}</textarea>
                                                    @error('investigation')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Treatments</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="2" class="form-control @error('treatments') is-invalid @enderror" name="treatments"
                                                        placeholder="Treatments">{{ old('comment', $patient->treatments) }}</textarea>
                                                    @error('treatments')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Charges</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control @error('charges') is-invalid @enderror"
                                                        name="charges" value="{{ $patient->charges }}"  required>
                                                    @error('charges')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Update Details</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
