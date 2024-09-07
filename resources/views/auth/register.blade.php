@extends('layout.main')

@section('title')
    Реєстрація
@endsection

@section('main_content')
    <div class="row">
        <div>
            <h1>
                Реєстрація
            </h1>


        </div>

        <div class="col-md-8 offset-md-2">
            <ul>
                {{-- @foreach ($errors->all() as $message)
                <li>{{$message}}</li>
            @endforeach --}}
            </ul>
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="mb-3 form-group">
                    <i class="{{ $errors->has('name') ? 'bi bi-person-circle text-danger' : 'bi bi-person-circle' }}"></i>
                    <label for="name" class="form-label">Імя</label>
                    <input type="text" name="name" id="name" value="{{ old('name')}}" placeholder="Імя" class="form-control" autofocus required>
                    @error('name')
                        <p class="alert alert-danger mt-2" role="alert"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <i class="{{ $errors->has('name') ? 'bi bi-envelope-fill text-danger' : 'bi bi-envelope-fill' }}"></i>
                    <label for="email" class="form-label">Електронна почта</label>
                    <input type="text" name="email" id="email" value="{{ old('email')}}" placeholder="Електронна почта" class="form-control" required>
                    @error('email')
                        <p class="alert alert-danger mt-2" role="alert"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <i class="{{ $errors->has('name') ? 'bi bi-lock-fill text-danger' : 'bi bi-lock-fill' }}"></i>
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password" placeholder="Пароль" class="form-control" required>
                    @error('password')
                        <p class="alert alert-danger mt-2" role="alert"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <i class="{{ $errors->has('name') ? 'bi bi-lock-fill text-danger' : 'bi bi-lock-fill' }}"></i>
                    <label for="password_confirmation" class="form-label">Підтвердження Паролю</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Підтвердження паролю " class="form-control" required>
                    @error('password_confirmation')
                        <p class="alert alert-danger mt-2" role="alert"> {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Реєстрація</button>
            </form>
        </div>
    </div>
@endsection
