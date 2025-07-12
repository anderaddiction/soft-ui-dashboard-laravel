@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                    class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Events</h5>
                        </div>
                        <a href="{{ route('events.create') }}" class="btn bg-gradient-primary btn-sm mb-0"
                            type="button">+&nbsp; New Event</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Event
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Guests
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    @foreach ($events as $event)
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $event->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        @foreach ($event->friends as $guest)
                                        <p class="text-xs font-weight-bold mb-0">{{ $guest->name }}</p>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $event->date }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $event->description }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('events.show', $event->id) }}"
                                            class="btn btn-link text-secondary mb-0" data-bs-toggle="tooltip"
                                            data-bs-original-title="View Event">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </a>
                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="btn btn-link text-secondary mb-0" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit Event">
                                            <i class="fas fa-pencil-alt text-secondary"></i>
                                        </a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger text-gradient mb-0"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete Event">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
