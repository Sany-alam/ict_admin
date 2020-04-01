<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets') }}\vendors\datatables\dataTables.bootstrap.min.css">

    {{-- required css --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.min.css">

    {{-- required js --}}
    <script src="{{ asset('assets') }}/js/vendors.min.js"></script>
    <script src="{{ asset('assets') }}/js/app.min.js"></script>

    {{-- page js --}}<!-- page js -->
    <script src="{{ asset('assets') }}/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatables/datatables.js"></script>

    <title>ICT - Add Questions</title>
</head>
<body>
    <div class="container my-4">
        {{-- add chapters --}}
        <div class="card">
            <div class="row m-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter Chapter name" id="ChapterName">
                </div>
                <div class="col">
                    <button class="btn btn-primary" id="AddChapter">Add chapter</button>
                </div>
                <div class="col">
                    <div class="dropdown" id="ChapterList">

                    </div>
                </div>
            </div>
        </div>
        {{-- add chapters --}}
        <div class="card">
            <div class="row m-3">
                <div class="col">
                    <select id="Topic-chapter" class="form-control"></select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter topic" id="Topic-name">
                </div>
                <div class="col">
                    <button class="btn btn-primary" id="AddTopics">Add topic</button>
                </div>
                <div class="col">
                    <div class="dropdown" id="TopicList"></div>
                </div>
            </div>
        </div>
        {{-- add question --}}
        <div class="card"></div>

        </div>
        {{-- question table --}}
        <div class="card p-4">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- custom js --}}
    <script src="{{ asset('assets') }}/js/custom.js"></script>
</body>
</html>
