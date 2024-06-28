@extends('layouts.sidebar')
@section('title', 'Supervisors')
@section('content')
    <div class="container mt-5 main">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h1 class="supervisor-title">المشرفين</h1>
            </div>
        </div>

        <div class="row">
            @foreach ($supervisors as $supervisor)
            <div class="col-md-4 col-12 mb-4">
                <div class="card position-relative">
                    <div class="card-body">
                            <img src="{{ asset('images/11.png') }}" class="supervisor-image">
                            <h5 class="card-title">{{ $supervisor->name }}</h5> 
                            <div class="supervisor-info-box">
                            <p class="card-text"><strong>الايميل :</strong> {{ $supervisor->email }}</p> </div>
                            <div class="supervisor-info-box">
                            <p class="card-text"><strong>رقم الهاتف :</strong> {{ $supervisor->phone }}</p></div>
                            @if($supervisor->section && $supervisor->section->address)
                            <div class="supervisor-info-box">
                            <p class="card-text"><strong>مدير فرع :</strong> {{ $supervisor->section->address->name }}</p></div>
                            @else
                            <div class="supervisor-info-box">
                            <p class="card-text"><strong>مدير فرع :</strong> غير محدد</p></div>
                            @endif
                            <div class="mt-4 d-flex justify-content-center">
                                <button type="button" class="btn edit-button me-2" data-bs-toggle="modal" data-bs-target="#editSupervisorModal"
                                data-id="{{ $supervisor->id }}" data-name="{{ $supervisor->name }}">
                                <i class="bi bi-pencil"></i> 
                            </button>
                            <button type="button" class="btn delete-button" style="margin-top: -34px" data-bs-toggle="modal" data-bs-target="#deleteSupervisorModal"
                                data-id="{{ $supervisor->id }}" data-name="{{ $supervisor->name }}">
                                <i class="bi bi-trash"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            
            @endforeach            
        </div>
    </div>

    <!-- Floating Button for adding new supervisor -->
    <button class="btn-add-supervisor" data-bs-toggle="modal" data-bs-target="#addSupervisorModal">
        <i class="bi bi-plus" style="color: black"></i>
    </button>

    <!-- Modal لإضافة مشرف جديد -->
    <div class="modal fade"  id="addSupervisorModal" tabindex="-1" aria-labelledby="addSupervisorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style=" background: linear-gradient(135deg, #f0f8ff, #e6e6fa, #dcdcdc);">
                <div class="modal-header" >
                    <button type="button" class="btn-close move-right" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('supervisors.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-center">
                            <label for="name" class="form-label">الاسم الكامل</label>
                            <input type="text" class="form-control text-center mx-auto" id="name" name="name" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="email" class="form-label">الايميل</label>
                            <input type="text" class="form-control text-center mx-auto" id="email" name="email" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="password" class="form-label">باسوورد</label>
                            <input type="text" class="form-control text-center mx-auto" id="password" name="password" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control text-center mx-auto" id="phone" name="phone" required>
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn me-3 px-4" style="color: black" >إضافة</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

  <!-- Modal لحذف المشرف -->
<div class="modal fade" id="deleteSupervisorModal" tabindex="-1" aria-labelledby="deleteSupervisorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style=" background: linear-gradient(135deg, #f0f8ff, #e6e6fa, #dcdcdc);">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-trash" style="font-size: 2rem;"></i>
                <h5 class="mt-3">هل متأكد من حذف المشرف (<span id="supervisor-name"></span>)؟</h5>
                <form id="deleteSupervisorForm" action="{{ route('supervisors.destroy', ['supervisor' => 0]) }}" method="POST">
                    @csrf
                    @method('Post')
                    <input type="hidden" name="supervisor_id" id="supervisor-id">
                    <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger me-3 px-4">تأكيد</button>
                        {{-- <button type="button" class="bbtn btn-outline-secondary px-4" data-bs-dismiss="modal">إلغاء</button> --}}
                    </div>
                </form>

                @if (Session::has('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
