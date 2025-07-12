@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create a Friend</h6>
                    </div>
                    <div class="card-body px-4 pt-4 pb-2">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('network.update', $friend->id) }}" method="POST" enctype="">
                                    @csrf
                                    @method('PUT')
                                    @include('network._form', ['buttonText' => 'Create Friend'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
