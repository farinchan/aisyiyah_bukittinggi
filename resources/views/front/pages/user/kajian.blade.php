@extends('front.app')

@section('seo')
    <title>Home</title>
    <meta name="description" content="Home">
    <meta name="keywords" content="Home">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="Home">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <link rel="canonical" href="{{ route('home') }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />

    <style>
        h5 {
            font-size: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.25rem;
            margin-top: 30px;
            background-color: #fff;
            transition: transform 0.2s;

        }

        p {
            font-size: 1rem;
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 1.25rem 0.75rem;
        }


        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
        }

        table {

            padding: 0.5rem;
            margin: 0.5rem;
        }

        .card-title {
            font-size: 2rem;
            padding: 0.5rem;

        }

        .card-footer {
            padding: 1.25rem 0.75rem;
            background-color: #ffffff;
        }

        .form-group {
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .col-form-label {
            font-size: 14px;
            font-weight: 600;
            text-align: right;
            padding-top: 10px;
            padding-right: 10px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            height: 45px;
        }


        .form-select {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            height: 45px;
            width: 100%;
        }

        .select2-container--default .select2-selection--multiple {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            /* height: 45px; */
        }



        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-select:focus-visible {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-select:focus-visible {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

    </style>
@endsection

@section('content')
    <main class="my-5">
        <div class="container">

            <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
                <div class="col-md-4">
                    @include('front.pages.user.__sidebar')

                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title">Kajian</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kajian</th>
                                            <th scope="col" style="width: 117px;">Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div class="btn-group " role="group" aria-label="Basic example"
                                            style="float: right; margin-bottom: 10px;">
                                            <a href="{{ route('user.kajian.create') }}" class="btn btn-secondary"><i
                                                    class="fa fa-plus"></i> Buat Kajian</a>
                                            <a class="btn btn-secondary"><i class="fa fa-file-export"></i> Eksport</a>
                                        </div>
                                        @foreach ($list_kajian as $kajian)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <p class="font-weight-bold"
                                                        style="font-weight: 700; font-size: 14px; margin-bottom: 5px;">
                                                        {{ $kajian->title }}</p>
                                                    <small style="color: #6c757d; margin-bottom: 10px;">
                                                        <i class="fa fa-comments"></i>
                                                        {{ $kajian->kajianComment->count() }} Komentar |
                                                        <i class="fa fa-eye"></i> {{ $kajian->kajianViewer->count() }}
                                                        Dilihat |
                                                        <i class="fa fa-calendar"></i>
                                                        {{ $kajian->created_at->format('d M Y') }}
                                                    </small>
                                                    <p style="font-size: 14px; margin-top: 5px;">
                                                        {{ Str::limit(strip_tags($kajian->content), 200) }}</p>
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.kajian.edit', $kajian->id) }}"
                                                        style="border-radius: 50%; padding: 10px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background-color: #ffc107; margin-bottom: 5px;">
                                                        <i class="fa fa-edit" style="color: #fff;"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#deleteModal{{ $kajian->id }}"
                                                        style="border-radius: 50%; padding: 10px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background-color: #dc3545;">
                                                        <i class="fa fa-trash" style="color: #fff;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    @foreach ($list_kajian as $kajian)
        <div class="modal fade" id="deleteModal{{ $kajian->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px; overflow: hidden;">
                    <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                        <h6 class="modal-title" id="deleteModalLabel" style="font-weight: 600; font-size: 16px;">Hapus
                            Kajian</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="border: none; background: none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-start" style="font-size: 14px; color: #495057;">
                        Apakah Anda yakin ingin menghapus kajian <br>
                        <strong style="font-weight: 600;">{{ $kajian->title }}</strong>
                    </div>
                    <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid #dee2e6;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="border-radius: 5px; padding: 8px 16px;">Batal</button>
                        <form action="{{ route('user.kajian.destroy', $kajian->id) }}" method="POST" style="margin: 0;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"
                                style="border-radius: 5px; padding: 8px 16px;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script>
        $('#datatable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "searching": true,
            "order": [
                [0, "asc"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": 2
            }],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data tidak ditemukan",
                "infoFiltered": "(filter dari _MAX_ total data)",
                "search": "Cari:",
            },
            "lengthMenu": [5, 10, 25, 50, 75, 100],


        });
    </script>
@endsection
