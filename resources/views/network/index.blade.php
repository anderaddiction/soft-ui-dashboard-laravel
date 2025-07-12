@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>My Network</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            User</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Friends</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Passowrd</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $friends as $friend )
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if($friend->avatar)
                                                    <img src="{{ asset('storage/'.$friend->avatar) }}"
                                                        class="avatar avatar-sm me-3" alt="{{ $friend->name }}">
                                                    @else
                                                    <img src="{{ asset('assets/img/team-2.jpg') }}"
                                                        class="avatar avatar-sm me-3" alt="Default image">
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $friend->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">Age: {{ $friend->age }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @foreach($friend->friends as $friend)
                                                    <li class="mb-0 text-sm">{{ $friend->name }}</li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{ $friend->password
                                                }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('network.show', $friend->id) }}"
                                                class="btn btn-link text-secondary mb-0" data-bs-toggle="tooltip"
                                                data-bs-original-title="View Event">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                            <a href="{{ route('network.edit', $friend->id) }}"
                                                class="btn btn-link text-secondary mb-0" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit Event">
                                                <i class="fas fa-pencil-alt text-secondary"></i>
                                            </a>
                                            <form action="{{ route('network.destroy', $friend->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-link text-danger text-gradient mb-0"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete Event">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
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
    </div>
</main>

@endsection
