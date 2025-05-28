@include("header")
<div class="d-flex justify-content-center align-items-center h-100">
    <form class="p-4 border rounded bg-white shadow" style="min-width: 300px;">
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email.</small>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@include("footer")
