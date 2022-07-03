@extends('layout.app')

@section('title', 'Show Orders')

@section('content')
    @include('partials.header')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="alert alert-success alert-block hidden text-center" id="responded-true">
                    <strong>You have marked that you have replied to this message.</strong>
                </div>
                <div class="alert alert-warning alert-block hidden text-center" id="responded-false">
                    <strong>You noted that you did not respond to this message.</strong>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Message</th>
                                <th scope="col">Name Client</th>
                                <th scope="col">Email Client</th>
                                <th scope="col">Link to File</th>
                                <th scope="col">Time</th>
                                <th scope="col">Answer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{$order->id}}</th>
                                        <td>{{$order->title}}</td>
                                        <td>{{$order->message}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->user->email}}</td>
                                        <td>
                                            <a href="{{ $order->file }}">File</a>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i')}}</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input form-change-answer" type="checkbox" value="{{$order->id}}" id="change-answer"
                                                    {{ ($order->answer == 1) ? 'checked' : ''}}>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
