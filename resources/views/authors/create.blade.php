@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Create author</div>
    </div>
    <div class="card-body">
        <form action="{{ route('author.store') }}" method="post" class="form-control m-3">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 m-5">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="name" class="form-label">Name:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="datepicker" class="form-label">Select Date:</label>
                        <div class="input-group date" id="datepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datepicker"/>
                            <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="dateofbirth" class="form-label">Date Of Birth:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="date" name="dateofbirth" class="form-control">
                    </div>
                </div>
                    <div class="row mb-3">
                            <div class="col-md-2">
                                <label for="" class="form-label">Born In:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="bornIn" class="form-control">
                        </div>
                    </div>
                <div class="col-md-2"></div>
            </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('author.index') }}" class="btn btn-warning border">Back</a>
                        <button type="submit" class="btn btn-submit bg-success py-2 border">Create</button>
                    </div>

        </form>
    </div>
</div>
<script>
    $(function () {
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            // Additional options as needed
        });
    });
</script>
</body>
</html>

@endsection
