@include('admin.layouts.header')
@include('admin.layouts.sidebar')

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                    <div class="page-header d-md-flex justify-content-between">

@yield('content')
            </div>
        </div>
    </div>
            </div>
            <!-- ./ Content -->

@include('admin.layouts.footer')
