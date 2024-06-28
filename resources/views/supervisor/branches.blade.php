@extends('layouts.sidebar')

@section('title', 'Branches')

@section('content')
    <div class="container mt-5 main">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h1 class="supervisor-title">الأفرع</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($sections as $section)
                <div class="col-md-4 col-12 mb-4">
                    <div class="card position-relative">
                        <div class="card-body">
                            <p class="card-text"><strong>الفرع:</strong> {{ $section->address->name }}</p>
                            <p class="card-text"><strong>مدير الفرع:</strong> {{ $section->admin->name }}</p>
                            <p class="card-text"><strong>وقت العمل :</strong> {{ $section->time_opened }}</p>
                            <p class="card-text"><strong>وقت الإغلاق :</strong> {{ $section->time_closed }}</p>
                            <button type="button" class="btn mt-3" data-bs-toggle="modal" data-bs-target="#deleteBranchModal" data-id="{{ $section->id }}" data-name="{{ $section->name }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Floating Button for adding new branch -->
    <button class="btn btn-add-branch" data-bs-toggle="modal" data-bs-target="#addBranchModal">
        <i class="bi bi-plus" style="color: black"></i>
    </button>

    <!-- Modal لإضافة فرع جديد -->
    <div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: linear-gradient(135deg, #f0f8ff, #e6e6fa, #dcdcdc);">
                <div class="modal-header">
                    <button type="button" class="btn-close move-right" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('sections.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-center">
                            <label for="time_opened" class="form-label">وقت العمل</label>
                            <input type="time" class="form-control text-center mx-auto" id="time_opened" name="time_opened" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="time_closed" class="form-label">وقت الإغلاق</label>
                            <input type="time" class="form-control text-center mx-auto" id="time_closed" name="time_closed" required>
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary-custom me-3 px-4" style="color: black;">إضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('sections.update', ['section' => $section]) }}" method="POST">
        @csrf
        @method('Post')
    
        <input type="text" name="name" value="{{ $section->name }}" required>
        <!-- أضف حقول أخرى كما هو مطلوب -->
    
        <button type="submit">حفظ التعديلات</button>
    </form>
@endsection
