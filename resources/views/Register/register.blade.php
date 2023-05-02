<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Eden Garden</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Register Infomation</h2>
                    <form action="{{ url('Register/register') }}" method="POST">
                        @if (Session::has('fail'))
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Aletr</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center" style="color: yellow; font-weight: bold;">
                                                {{ Session::get('fail') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" style="color: yellow; font-weight: bold;"
                                                data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#myModal').modal('show');
                                });
                            </script>
                        @endif
                        @csrf
                        <div class="input-group">
                            @error('id')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="text" placeholder="Enter your ID" name="id">
                        </div>
                        <div class="input-group">
                            @error('name')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="text" placeholder="Enter your FullName"
                                name="name">
                        </div>
                        <div class="input-group">
                            @error('birthday')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="text" placeholder="yyyy/mm/dd" name="birthday">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                @error('gender')
                                    <p style="color: yellow; font-weight: bold;">
                                        <mark><em>{{ $message }}</em></mark>
                                    </p>
                                @enderror
                                <select name="gender">
                                    <option disabled="disabled" selected="selected">Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            @error('password')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="password" placeholder="Enter your Password"
                                name="password">
                        </div>
                        <div class="input-group">
                            @error('address')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="text" placeholder=" Enter your Address "
                                name="address">
                        </div>
                        <div class="input-group">
                            @error('email')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            @error('phone')
                                <p style="color: yellow; font-weight: bold;">
                                    <mark><em>{{ $message }}</em></mark>
                                </p>
                            @enderror
                            <input class="input--style-3" type="text" placeholder="Phone number" name="phone">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
