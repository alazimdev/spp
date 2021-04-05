@extends('layouts.app')

@section('subtitle', 'Dasbor')
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="content">
        <div
            class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
            <div>
                <h1 class="h2 mb-1">
                    Dashboard
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">DataTables</li>
                    </ol>
                </nav>
                <p class="mb-0">
                    Welcome, admin! You have <a class="font-w500" href="javascript:void(0)">5 new
                        notifications</a>.
                </p>
            </div>
            <div class="mt-4 mt-md-0">
                <a class="btn btn-sm btn-alt-primary push" data-toggle="modal" data-target="#modal-default-large">
                    <i class="fa fa-plus-circle"> Create</i>
                </a>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <div class="row row-deck">
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">2,388</div>
                        <div class="text-muted mb-3">Registered Users</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="javascript:void(0)">
                            View all users
                            <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">2,388</div>
                        <div class="text-muted mb-3">Registered Users</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="javascript:void(0)">
                            View all users
                            <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overview -->
        <div class="row row-deck">
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-chart-line text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">386</div>
                        <div class="text-muted mb-3">Confirmed Sales</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="javascript:void(0)">
                            View all sales
                            <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-wallet text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">$4,920</div>
                        <div class="text-muted mb-3">Total Earnings</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="javascript:void(0)">
                            Withdrawal options
                            <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Overview -->

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dynamic Table <small>Export Buttons</small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jeffrey Shaw</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client1<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">VIP</span>
                            </td>
                            <td>
                                <button class="btn btn-primary" style="width: 45%;"><i
                                        class="fa fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" style="width: 45%;"><i
                                        class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Lori Moore</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client2<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-primary">Personal</span>
                            </td>
                            <td>
                                <em class="text-muted">9 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Wayne Garcia</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client3<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-info">Business</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jose Parker</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client4<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Ryan Flores</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client5<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">Trial</span>
                            </td>
                            <td>
                                <em class="text-muted">10 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Ryan Flores</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client6<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-info">Business</span>
                            </td>
                            <td>
                                <em class="text-muted">8 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Henry Harrison</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client7<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">Trial</span>
                            </td>
                            <td>
                                <em class="text-muted">4 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jose Wagner</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client8<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Melissa Rice</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client9<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">VIP</span>
                            </td>
                            <td>
                                <em class="text-muted">3 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Lori Grant</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client10<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td>
                                <em class="text-muted">8 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jesse Fisher</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client11<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-primary">Personal</span>
                            </td>
                            <td>
                                <em class="text-muted">8 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jesse Fisher</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client12<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">Trial</span>
                            </td>
                            <td>
                                <em class="text-muted">9 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Barbara Scott</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client13<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">VIP</span>
                            </td>
                            <td>
                                <em class="text-muted">10 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Susan Day</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client14<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-info">Business</span>
                            </td>
                            <td>
                                <em class="text-muted">6 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Wayne Garcia</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client15<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td>
                                <em class="text-muted">5 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Barbara Scott</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client16<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">Trial</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jeffrey Shaw</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client17<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-primary">Personal</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Carl Wells</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client18<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">VIP</span>
                            </td>
                            <td>
                                <em class="text-muted">4 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Susan Day</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client19<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">VIP</span>
                            </td>
                            <td>
                                <em class="text-muted">5 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Betty Kelley</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client20<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">Trial</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
        <!--  -->
    </div>
    <!-- END Page Content -->

        <!-- Page Content -->
        <div class="content">
            <!-- Elements -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Elements</h3>
                </div>
                <div class="block-content">
                    <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                        <!-- Basic Elements -->
                        <h2 class="content-heading pt-0">Basic</h2>
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label for="example-text-input">Text</label>
                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="Text Input">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input">Email</label>
                                    <input type="email" class="form-control" id="example-email-input" name="example-email-input" placeholder="Emai Input">
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input">Password</label>
                                    <input type="password" class="form-control" id="example-password-input" name="example-password-input" placeholder="Password Input">
                                </div>
                                <div class="form-group">
                                    <label for="example-textarea-input">Textarea</label>
                                    <textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="4" placeholder="Textarea content.."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label for="example-select">Select</label>
                                    <select class="form-control" id="example-select" name="example-select">
                                        <option value="0">Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        <option value="4">Option #4</option>
                                        <option value="5">Option #5</option>
                                        <option value="6">Option #6</option>
                                        <option value="7">Option #7</option>
                                        <option value="8">Option #8</option>
                                        <option value="9">Option #9</option>
                                        <option value="10">Option #10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- END Basic Elements -->
                    </form>
                        <div class="row">
                            <div class="col-lg-8 col-xl-6">
                                <div class="form-row">
                                    <div class="form-group col-xl-7">
                                        <label for="example-flatpickr-default">Default format</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="example-flatpickr-default" name="example-flatpickr-default" placeholder="Y-m-d">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-xl-7">
                                        <label for="example-flatpickr-custom">Custom format</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="example-flatpickr-custom" name="example-flatpickr-custom" placeholder="d-m-Y" data-date-format="d-m-Y">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Flatpickr Datetimepicker -->
        </div>
        <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection