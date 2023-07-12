@include('Layout.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('Layout.sidenav')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            
            <div id="content">
                @include('Layout.topnav')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('Layout.footer')
    
</body>

</html>