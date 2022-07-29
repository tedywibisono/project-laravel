@extends('layouts.main')
@section('container')
    
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-4">
            
            <main class="form-registration">
                <form action="register" method="POST">
                @csrf
                {{-- csrf adalah protected yang ada di laravel untuk melindungi request post dari web lain penjelasan lebih lengkap ada di documentasi laravel cari dengam keyword csrf--}}
                  <img class="mb-4" src="img/Circle.jpg" alt="" width="72" height="57">
                  <h1 class="h3 mb-3 fw-normal ">Registrasi</h1>
                 
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                    {{-- value old('name ') adalah dalah satu fitur yang di miliki oleh laravel untuk user jika melakukan kesa;ahan dalm mengisi data dalam form register tapi hanya satu yang salah tidak mengulamgi kembali semua tapi niali yang tadi masih tersimpan agar tidak mengulang dari 0 lagi untuk memudahkan user untuk mengisi data register--}}
                    {{-- @error ('name') is-invalid @enderror adalah suatu fungsi untuk memberitahu ijak syarat isi form register salah dengan cara membuat form mrnjadi warna merah --}}
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{-- invalid feed back adalah salah satu fungsi dari boostrap yang memiliki fungsi untuk menampilkan pesan error dalam mengisi form regristrasi contoh nya adalah nama disana terdapat satu pedan jika eror munculkan pesan eror --}}
                            {{ $message }}
                            {{-- $message adalah dimana kita menampilkan isi pesan yang salah contoh nya jika dia tidak mengisi form nama akan muncuk kalau form nama required tergantung dengan validasi nya --}}
                        </div>
                    @enderror
                  </div>

                  <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
              
                  <div class="form-floating">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                      <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password"required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                     @enderror
                </div>
                    <input type="hidden" id="role" name="role" value="2">
              
                  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already registered? <a href="{{ url('login') }}">Login</a></small>
              </main>
        </div>
    </div>
   

@endsection