@include("header")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center">
                <div class="collapse show w-50" id="company1">
                    <div class="display-3">Company 1</div>
                    <div class="w-100 p-3" style="background-color: #eee;">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Example label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Another label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="collapse w-50" id="company2">
                    <div class="display-3">Company 2</div>
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Example label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                   placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Another label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                   placeholder="Another input">
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="collapse w-50" id="company3">
                    <div class="display-3">Company 3</div>
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Example label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                   placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Another label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                   placeholder="Another input">
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid p-2 align-items-center">
                <div class="d-flex justify-content-around">
                    <button
                        class="btn bg-success text-white btn-sm rounded-pill"
                        style="width: 2rem; height: 2rem"
                        data-bs-toggle="collapse"
                        data-bs-target="#company1"
                        aria-expanded="true"
                        aria-controls="company1"
                        onclick="stepFunction(event)">
                        1
                    </button>
                    <span
                        class="bg-success w-25 rounded mt-auto mb-auto me-1 ms-1"
                        style="height: 0.2rem"></span>
                    <button
                        class="btn bg-success text-white btn-sm rounded-pill"
                        style="width: 2rem; height: 2rem"
                        data-bs-toggle="collapse"
                        data-bs-target="#company2"
                        aria-expanded="false"
                        aria-controls="company3"
                        onclick="stepFunction(event)">
                        2
                    </button>
                    <span
                        class="bg-success w-25 rounded mt-auto mb-auto me-1 ms-1"
                        style="height: 0.2rem"></span>
                    <button
                        class="btn bg-success text-white btn-sm rounded-pill"
                        style="width: 2rem; height: 2rem"
                        data-bs-toggle="collapse"
                        data-bs-target="#company3"
                        aria-expanded="false"
                        aria-controls="company3"
                        onclick="stepFunction(event)">
                        3
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function stepFunction(event) {
        debugger;
        var element = document.getElementsByClassName("collapse");
        for (var i = 0; i < element.length; i++) {
            if (element[i] !== event.target.ariaControls) {
                element[i].classList.remove("show");
            }
        }
    }
</script>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
@include("footer")
