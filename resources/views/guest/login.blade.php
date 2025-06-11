@include("layout.header")
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4 mx-auto">
            <form class="p-4 border rounded bg-white shadow" action="/login" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email.</small>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>

                @if(session('error'))
                    <hr>
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>


@include("layout.footer")
