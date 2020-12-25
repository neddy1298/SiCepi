@extends('layouts.app')

@section('title', 'Template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Template</h1>
        <div class="section-header-breadcrumb">
            {{ request()->path() }}
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Basic DataTables</h4>
                        <div class="card-header-form">
                            <form action="#" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-info"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Catalog -> Template</th>
                                        <th>Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $template)
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center"><a href="#">{{ $template->catalog }} ->
                                                {{ $template->template }}</a></td>
                                        <td>{{ substr($template->text, 0,100) }}...</td>
                                        <td>
                                            <div>
                                                <a href="" class="btn btn-info">Action</a>
                                            </div>
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
</section>

@endsection
