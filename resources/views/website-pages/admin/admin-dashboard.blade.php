@extends('dashboard-layouts.body')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin Dashboard')
@section('body')


    <div class="content-wrapper ">
        <!-- Contact Start -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Patients Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=" ">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-xxl">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                {{-- <h2 style="font-family: Open Sans;">Pending Projects</h2> --}}
                                <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient Name</th>
                                            <th>Mobile Number</th>
                                            <th>Age</th>
                                            <th>Date of Vist</th>
                                            <th>Complain</th>
                                            <th>Investigations</th>
                                            <th>Treatments</th>
                                            <th>Charge</th>


                                            <th>Actions</th>




                                        </tr>



                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>dd</td>
                                            <td>
                                                <a href=" " class="btn btn-outline-success">Edit</a>
                                                <a href=" "class="btn btn-outline-danger gap-2">Delete</a>
                                            </td>


                                        </tr> --}}



                                        @foreach ($allpatients as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>


                                            <td>{{ $item->patient_name }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->age }}</td>
                                            <td>{{ $item->date_visit }}</td>
                                            <td>{{ $item->complain }}</td>
                                            <td>{{ $item->investigation }}</td>
                                            <td>{{ $item->treatments }}</td>
                                            <td>{{ $item->charges }}</td>


                                            <td>
                                                <div style="display: flex; align-items: center; gap: 10px;">
                                                    <a href="{{ route('edit.patient', $item->id) }}" class="btn btn-outline-success">Edit</a>

                                                    @if ($item->deleted == 'no')
                                                            <form method="POST" action="{{ route('remove.patient', $item->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        @endif
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach


                                        </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Contact End -->
    </div>




@endsection
