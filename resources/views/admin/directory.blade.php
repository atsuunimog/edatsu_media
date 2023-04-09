<x-app-layout>
    <!--banner-->
    <div class="px border row">
        <div class="col-sm-12">
            <div class="px-3 py-3">
                <h3 class="fw-bold text-center">Tech Directory</h3>
            </div>
        </div>
    </div>
    <!--banner-->

    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
             <!--menu list-->
        </div>
        <div class="col-sm-9">
            <!--content-->
            <div class="row">
                <div class="col-sm-4">
                    <!--post form-->
                    <div class="border px-3 py-3">
                        <h5 class='fw-bold mb-3'>Company Directory</h5>
                        <form action="{{url('post-opportunity')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class='fw-bold'>Company Logo</label>
                                <input type="file" name="company_logo" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter title">
                            </div>
                            <div class="mb-3">
                                <label class='fw-bold'>About Company</label>
                                <textarea name="about_company" class='d-block form-control' id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Company URL</label>
                                <input type="text" name="company_url" class="form-control" placeholder="Enter title">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Career URL</label>
                                <input type="text" name="career_url" class="form-control" placeholder="Enter title">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Company Email</label>
                                <input type="text" name="company_email" class="form-control" placeholder="Enter title">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Location</label>
                                <textarea name="company_location" class='d-block form-control' id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Industry</label>
                                <select class="form-select" name="industry">
                                    <option></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Region</label>
                                <select class="form-select" name="region">
                                    <option></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Country</label>
                                <select class="form-select" name="country">
                                    <option></option>
                                </select>
                            </div>

                            <button class="btn btn-primary fw-bold w-100 d-block">Create Directory</button>
                        </form>
                    </div>
                    <!---post form-->
                </div>
                <div class="col-sm-8">
                    <!--post content-->
                    <!--post content-->
                </div>
            </div>
            <!--content-->
        </div>
    </div>
</x-app-layout>
