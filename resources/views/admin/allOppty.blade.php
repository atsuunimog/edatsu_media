<x-app-layout>
<link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.3/af-2.7.0/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/fc-5.0.1/fh-4.0.1/r-3.0.2/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.4/datatables.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
            <!--menu list-->
        </div>
        <div class="col-sm-9">

            <!--banner-->
            <div class="px-3 py-2 rounded border text-center bg-white my-3">
                <h2 class="fw-bold m-0 p-0 py-3">All Posts</h2>
            </div>
            <!--banner-->

            <!--dashboard panel-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="px-3 py- border my-3 bg-white">
                        <!--add post table -->
                        <table  id="example" class="table text-left fs-9">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Views</th>
                                    <th>Date Posted</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!--add post table-->
                    </div>
                </div>
            </div>
            <!--dashboard panel-->
        </div>
    </div>
</div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.3/af-2.7.0/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/fc-5.0.1/fh-4.0.1/r-3.0.2/sc-2.4.3/sb-1.7.1/sp-2.3.1/sl-2.0.4/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            ajax: {
                url: '/fetch-all-opp',
                dataSrc: 'data'  // Assuming your JSON response has a 'data' key
            },
            columns: [
                { data: 'id', title: 'No' },
                { data: 'title', title: 'Title' },
                { data: 'views', title: 'Views' },
                { data: 'created_at', title: 'Date' },
                { data: 'deadline', deadline: 'Deadline' },
                { data: 'status', title: 'Status' },
                {
                    data: null,
                    title: 'Edit',
                    render: function(data, type, row) {
                        return '<a href="/admin-edit-opportunity/' + row.id + '">Edit</a>';
                    }
                },

                {
                    data: null,
                    title: 'Delete',
                    render: function(data, type, row) {
                        return '<a href="/admin-delete-opportunity/' + row.id + '">Delete</a>';
                    }
                }
            ],
            // Add any additional DataTable options here
            responsive: true,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
