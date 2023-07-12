@include('Layout.header')

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{ url('register') }}" method="post">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="FirstName" placeholder="First Name" name="FirstName">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastName" placeholder="Last Name" name="LastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="Email" placeholder="Email Address" name="Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Department</label>
                                        <select class="form-control" name="role" style="border-radius: 10rem; height: 3rem;">
                                            <option value="1">Admin</option>
                                            <option value="2">IT</option>
                                            <option value="3">HR</option>
                                            <option value="4">Security</option>
                                            <option value="5">Customer Care</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Password</label>
                                        <input type="password" class="form-control form-control-user" id="Password" placeholder="Password" name="Password">
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                            <div class="text-center">
                                <a class="small" href="{{ url('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


@include('Layout.footer')