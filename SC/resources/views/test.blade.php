@extends('layouts.home')

@section('content')

{{-- <div class="container mt-5">
    <h2>Activity Log</h2>

    <div class="list-group">

            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"> his lskjf ajklajsd afj </h5>
                    <small>skhfkljashdf sjfha kfh ajkshfd lajfh</small>
                </div>
                <p class="mb-1">jsfhkja hfjhdsajhf askjfhjsahf</p>
                <small>ahfjkhasfdhakhfjasldhfkahsfdkjahsfjhdf fj sdf af fh lsdahf</small>
            </div>

    </div>
</div> --}}

<div class="container mt-4">
    <h2>Activity Log</h2>

    <div class="alert alert-info">
        <strong>Start processing file</strong>
    </div>


        <div class="alert alert-warning">
            <strong>User_id already exists </strong>
        </div>


    <div class="alert alert-success">
        <strong>File processed successfully</strong>
    </div>
</div>

@endsection
