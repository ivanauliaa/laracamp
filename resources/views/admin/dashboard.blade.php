@extends('layouts.app')

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Camp Checkouts
                        </div>
                        <div class="card-body">
                            @include('components.alert')
                            <table class="table">
                                <thead>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($checkouts as $checkout)
                                        <tr>
                                            <td>{{ $checkout->user->name }}</td>
                                            <td>{{ $checkout->camp->title }}</td>
                                            <td>${{ $checkout->camp->price }}</td>
                                            <td>{{ $checkout->created_at->format('F d, Y') }}</td>
                                            <td>

                                                @if ($checkout->status === 'PAID')
                                                    <span class="badge bg-success">PAID</span>
                                                @else
                                                    <span class="badge bg-warning">PENDING</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($checkout->status !== 'PAID')
                                                    <form action="{{ route('admin.checkout.update', $checkout->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-sm btn-primary">Set to Paid</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">No camp checkouts registered</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
