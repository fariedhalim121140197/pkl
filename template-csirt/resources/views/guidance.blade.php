@extends('layouts.main')

@section('container')
    <!-- Service Section -->
    <div class="container" style="margin-top:4rem">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <section>
                    <div class="row mb-3">
                        <div class="col-md-10 mx-auto text-center">
                            <h1 class="display-5">Panduan Penanganan Insiden Siber</h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card flex rounded-lg">
                        </div>
                    </div> 
                </section>
                
                <article class="fs-3">
                    <section class="pt-10 pb-10 bg-gray-100">
                        <div class="mx-auto pl-7 pr-7 col-auto" data-sr-id="2">
                            <table class="table table-auto table-sm">
                                <thead class="table-dark">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Size</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($guidances as $key => $guidance)
                                    <tr>
                                    <td>{{ $guidances->firstItem() + $key }}</td>
                                    <td> <a href="{{ 'storage/' .  $guidance->path }}" target="_blank">{{ $guidance->name }}</a> </td>
                                    <td>{{ number_format(round($guidance->size / 1024, 2),2,",",".") }} Kb</td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mb-3">
                                    Showing 
                                    {{ $guidances->firstItem() }}
                                    to
                                    {{ $guidances->lastItem() }}
                                    of 
                                    {{ $guidances->total() }}
                                    enteries
                                </div>
                                <div class="pagination pagination-sm">
                                    {{ $guidances->links() }}
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </div> 
    <!-- End Service Section -->
@endsection