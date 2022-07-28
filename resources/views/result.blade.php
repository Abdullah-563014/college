@extends('dashboard')
@section('user_dashboard_child_content')
<div x-data="resultPage" x-init="loadFinished" class="admin_dashboard_product_management_page">
    <div class="container">
        <div class="row">
            <h3 style="margin: 30px auto;">Spring, 2022</h3>
        </div>
        <div class="row">
            <div class="products_list">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Intake Sec</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(result, index) in resultList">
                            <tr>
                                <td x-text="result.course_code"></td>
                                <td x-text="result.course_name"></td>
                                <td x-text="result.credit"></td>
                                <td x-text="result.intake_sec"></td>
                                <td x-text="result.type"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>



@push("js")
<script src="<?php echo siteUrl(); ?>/js/user/result.js"></script>
@endpush
@endsection